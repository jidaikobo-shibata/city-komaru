<?php

/**
 * Kontiki\Util
 *
 * @package    part of Kontiki
 * @author     Jidaikobo Inc.
 * @license    The MIT License (MIT)
 * @copyright  Jidaikobo Inc.
 * @link       http://www.jidaikobo.com
 */

namespace Kontiki;

class Util
{
    /**
     * get current uri
     *
     * @return string
     */
    public static function uri()
    {
        $http_host = Input::server("HTTP_HOST");
        $request_uri = Input::server("REQUEST_URI");

        if ($http_host && $request_uri) {
            $uri = static::isSsl() ? 'https' : 'http';
            $uri .= '://' . $http_host . rtrim($request_uri, '/');
            return static::s($uri);
        }
        return '';
    }

    /**
     * add query strings
     * this medhod doesn't apply sanitizing
     *
     * @param string $uri
     * @param Array $query_strings array(array('key', 'val'),...)
     * @return string
     */
    public static function addQueryStrings($uri, $query_strings = array())
    {
        return QueryStringHelper::add($uri, $query_strings);
    }

    /**
     * remove query strings
     *
     * @param string $uri
     * @param Array $query_strings array('key',....)
     * @return string
     */
    public static function removeQueryStrings($uri, $query_strings = array())
    {
        return QueryStringHelper::remove($uri, $query_strings);
    }

    /**
     * is ssl
     *
     * @return bool
     */
    public static function isSsl()
    {
        return (Input::server("HTTPS") == 'on');
    }

    /**
     * sanitiz html
     *
     * @param string|Array|bool $str
     * @return string|Array
     */
    public static function s($str)
    {
        if ($str === null) {
            return '';
        }
        if (is_bool($str)) {
            return $str;
        }
        if (is_object($str)) {
            return $str;
        }
        if (is_array($str)) {
            return array_map(array('\Kontiki\Util', 's'), $str);
        }
        return htmlentities($str, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * truncate
     *
     * @param string $str
     * @param int $len
     * @param string $lead
     * @return string
     */
    public static function truncate($str, $len, $lead = '...')
    {
        $target_len = mb_strlen($str);
        return $target_len > $len ? mb_substr($str, 0, $len) . $lead : $str;
    }

    /**
     * urlenc
     *
     * @param string $url
     * @return string
     */
    public static function urlenc($url)
    {
        return UrlCodec::encode($url);
    }

    /**
     * urldec
     *
     * @param string $url
     * @return string
     */
    public static function urldec($url)
    {
        return UrlCodec::decode($url);
    }

    /**
     * redirect
     *
     * @param string $url
     * @return void
     */
    public static function redirect($url)
    {
        $url = self::urldec($url);
        if (strpos($url, Input::server('HTTP_HOST')) === false) {
            self::error();
        }
        header('location: ' . $url);
        exit();
    }

    /**
     * error
     *
     * @param string $message
     * @return void
     */
    public static function error($message = '')
    {
        if (! headers_sent()) {
            header('Content-Type: text/plain; charset=UTF-8', true, 403);
        }
        die(Util::s($message));
    }

    /**
     * byte2Str
     *
     * @param int|string $bytes
     * @return string|int
     * @link http://qiita.com/git6_com/items/ecaafb1afb42fc207814
     */
    public static function byte2Str($bytes)
    {
        if (! is_numeric($bytes)) {
            return $bytes;
        }

        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 1) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 1) . ' KB';
        } elseif ($bytes === 0) {
            $bytes = '0 bytes';
        } else {
            $bytes .= $bytes == 1 ? ' byte' : ' bytes';
        }
        return $bytes;
    }

    /**
     * multisort
     *
     * @param Array $array
     * @param string $by
     * @param string $order
     * @return Array
     */
    public static function multisort($array, $by = 'seq', $order = 'asc')
    {
        $order = strtolower($order) == 'asc' ? SORT_ASC : SORT_DESC ;

        $keys = array();
        foreach ($array as $key => $value) {
            if (! isset($array[$key])) {
                return $array;
            }
            $keys[$key] = Arr::get($value, $by);
        }
        array_multisort($keys, $order, $array);

        return $array;
    }

    /**
     * keyByColumn
     * array_column() lower compatible
     *
     * @param Array $arr
     * @param string $column
     * @return Array
     */
    public static function keyByColumn($arr, $column = 'id')
    {
        reset($arr);
        if (! isset($arr[key($arr)][$column])) {
            return array();
        }
        $vals = array();
        foreach ($arr as $v) {
            $id = $v[$column];
            unset($v[$column]);
            $vals[$id] = $v;
        }
        return $vals;
    }
}
