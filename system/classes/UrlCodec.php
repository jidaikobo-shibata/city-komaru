<?php

namespace Kontiki;

class UrlCodec
{
    /**
     * Encode url-like string with project specific behavior.
     *
     * @param string $url
     * @return string
     */
    public static function encode($url)
    {
        $url = self::stripLineBreaks($url);
        $url = Util::s($url); // & to &amp;
        $url = str_replace(' ', '%20', $url);
        return self::encodeUrlKeepingEscapedString($url);
    }

    /**
     * Decode previously encoded url-like string.
     *
     * @param string $url
     * @return string
     */
    public static function decode($url)
    {
        $url = self::stripLineBreaks($url);
        $url = trim($url);
        $url = rtrim($url, '/');
        $url = self::encode($url);
        $url = urldecode($url);
        return str_replace('&amp;', '&', $url);
    }

    /**
     * Remove line break characters from string.
     *
     * @param string $str
     * @return string
     */
    private static function stripLineBreaks($str)
    {
        return str_replace(array("\n", "\r"), '', $str);
    }

    /**
     * Keep escaped strings as-is while encoding raw values.
     *
     * @param string $url
     * @return string
     */
    private static function encodeUrlKeepingEscapedString($url)
    {
        if (strpos($url, '%') === false) {
            return urlencode($url);
        }
        return str_replace('://', '%3A%2F%2F', $url);
    }
}
