<?php

namespace Kontiki;

class Arr
{
    /**
     * Get value from array by key.
     *
     * @param array $array
     * @param string|int $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($array, $key, $default = null)
    {
        if (! is_array($array)) {
            return $default;
        }

        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}
