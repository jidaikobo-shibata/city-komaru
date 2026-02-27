<?php

namespace Kontiki;

class SessionBucket
{
    public static function add(&$staticValues, &$sessionValues, $realm, $key, $vals)
    {
        $staticValues[$realm][$key][] = $vals;

        self::mergeSessionValueIfExists($staticValues, $sessionValues, $realm, $key);
        $staticValues[$realm][$key] = array_unique($staticValues[$realm][$key]);
        $sessionValues[$realm] = $staticValues[$realm];
    }

    public static function remove(&$staticValues, &$sessionValues, $realm, $key = '', $cKey = '')
    {
        if ($key === '' && $cKey === '') {
            self::removeRealm($staticValues, $sessionValues, $realm);
            return;
        }
        if ($cKey === '') {
            self::removeKey($staticValues, $sessionValues, $realm, $key);
            return;
        }
        self::removeEachValue($staticValues, $sessionValues, $realm, $key, $cKey);
    }

    public static function fetch(&$staticValues, &$sessionValues, $realm, $key = '', $isOnce = true)
    {
        $vals = empty($key) ?
            self::fetchRealmValues($staticValues, $sessionValues, $realm, $isOnce) :
            self::fetchKeyValues($staticValues, $sessionValues, $realm, $key, $isOnce);

        return self::normalizeFetchedValues($vals);
    }

    public static function show(&$staticValues, &$sessionValues, $realm = '', $key = '')
    {
        if (empty($realm)) {
            return array_merge($staticValues, $sessionValues);
        }
        return self::fetch($staticValues, $sessionValues, $realm, $key, false) ?: false;
    }

    private static function fetchRealmValues(&$staticValues, &$sessionValues, $realm, $isOnce)
    {
        $vals = array();
        if (isset($sessionValues[$realm])) {
            $vals = $sessionValues[$realm];
        }
        if (isset($staticValues[$realm])) {
            $vals = array_merge($vals, $staticValues[$realm]);
        }
        if ($isOnce) {
            self::remove($staticValues, $sessionValues, $realm);
        }
        return $vals;
    }

    private static function fetchKeyValues(&$staticValues, &$sessionValues, $realm, $key, $isOnce)
    {
        if (! isset($staticValues[$realm][$key]) && ! isset($sessionValues[$realm][$key])) {
            return array();
        }

        $vals = array();
        if (isset($sessionValues[$realm][$key])) {
            $vals = $sessionValues[$realm][$key];
        }
        if (isset($staticValues[$realm])) {
            $staticValues[$realm][$key] = empty($staticValues[$realm][$key]) ? array() : $staticValues[$realm][$key];
            $vals = array_merge($vals, $staticValues[$realm][$key]);
        }
        if ($isOnce) {
            self::remove($staticValues, $sessionValues, $realm, $key);
        }
        return $vals;
    }

    private static function normalizeFetchedValues($vals)
    {
        $vals = array_unique($vals);
        return $vals ?: false;
    }

    private static function mergeSessionValueIfExists(&$staticValues, &$sessionValues, $realm, $key)
    {
        if (isset($sessionValues[$realm][$key])) {
            $staticValues[$realm][$key] = array_merge(
                $sessionValues[$realm][$key],
                $staticValues[$realm][$key]
            );
            return;
        }
        if (isset($sessionValues[$realm])) {
            $staticValues[$realm] = array_merge(
                $sessionValues[$realm],
                $staticValues[$realm]
            );
        }
    }

    private static function removeRealm(&$staticValues, &$sessionValues, $realm)
    {
        if (isset($sessionValues[$realm])) {
            unset($sessionValues[$realm]);
        }
        if (isset($staticValues[$realm])) {
            unset($staticValues[$realm]);
        }
    }

    private static function removeKey(&$staticValues, &$sessionValues, $realm, $key)
    {
        if (isset($sessionValues[$realm][$key])) {
            unset($sessionValues[$realm][$key]);
        }
        if (isset($staticValues[$realm][$key])) {
            unset($staticValues[$realm][$key]);
        }
    }

    private static function removeEachValue(&$staticValues, &$sessionValues, $realm, $key, $cKey)
    {
        if (isset($sessionValues[$realm][$key][$cKey])) {
            unset($sessionValues[$realm][$key][$cKey]);
        }
        if (isset($staticValues[$realm][$key][$cKey])) {
            unset($staticValues[$realm][$key][$cKey]);
        }
    }
}
