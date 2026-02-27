<?php

namespace Kontiki;

class UrlCodec
{
    public static function encode($url)
    {
        $url = self::stripLineBreaks($url);
        $url = Util::s($url); // & to &amp;
        $url = str_replace(' ', '%20', $url);
        return self::encodeUrlKeepingEscapedString($url);
    }

    public static function decode($url)
    {
        $url = self::stripLineBreaks($url);
        $url = trim($url);
        $url = rtrim($url, '/');
        $url = self::encode($url);
        $url = urldecode($url);
        return str_replace('&amp;', '&', $url);
    }

    private static function stripLineBreaks($str)
    {
        return str_replace(array("\n", "\r"), '', $str);
    }

    private static function encodeUrlKeepingEscapedString($url)
    {
        if (strpos($url, '%') === false) {
            return urlencode($url);
        }
        return str_replace('://', '%3A%2F%2F', $url);
    }
}
