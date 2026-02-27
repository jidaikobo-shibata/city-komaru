<?php

namespace Kontiki;

class SessionBucket
{
    /**
     * Add value to bucket and sync to $_SESSION mirror.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @param mixed $vals
     * @return void
     */
    public static function add(&$staticValues, &$sessionValues, $realm, $key, $vals)
    {
        $staticValues[$realm][$key][] = $vals;

        self::mergeSessionValueIfExists($staticValues, $sessionValues, $realm, $key);
        $staticValues[$realm][$key] = array_unique($staticValues[$realm][$key]);
        $sessionValues[$realm] = $staticValues[$realm];
    }

    /**
     * Remove values by realm/key/index.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string|int $key
     * @param string|int $cKey
     * @return void
     */
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

    /**
     * Fetch values and optionally remove them.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @param bool $isOnce
     * @return array|false
     */
    public static function fetch(&$staticValues, &$sessionValues, $realm, $key = '', $isOnce = true)
    {
        $vals = empty($key) ?
            self::fetchRealmValues($staticValues, $sessionValues, $realm, $isOnce) :
            self::fetchKeyValues($staticValues, $sessionValues, $realm, $key, $isOnce);

        return self::normalizeFetchedValues($vals);
    }

    /**
     * Show values without removing by default.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @return array|false
     */
    public static function show(&$staticValues, &$sessionValues, $realm = '', $key = '')
    {
        if (empty($realm)) {
            return array_merge($staticValues, $sessionValues);
        }
        return self::fetch($staticValues, $sessionValues, $realm, $key, false) ?: false;
    }

    /**
     * Fetch values for whole realm.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param bool $isOnce
     * @return array
     */
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

    /**
     * Fetch values for single key.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @param bool $isOnce
     * @return array
     */
    private static function fetchKeyValues(&$staticValues, &$sessionValues, $realm, $key, $isOnce)
    {
        if (! self::hasKeyValues($staticValues, $sessionValues, $realm, $key)) {
            return array();
        }

        $vals = self::collectSessionValues($sessionValues, $realm, $key);
        $vals = self::mergeStaticKeyValues($vals, $staticValues, $realm, $key);
        self::removeFetchedKeyIfNeeded($staticValues, $sessionValues, $realm, $key, $isOnce);
        return $vals;
    }

    /**
     * Check key existence in any storage.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @return bool
     */
    private static function hasKeyValues(&$staticValues, &$sessionValues, $realm, $key)
    {
        return isset($staticValues[$realm][$key]) || isset($sessionValues[$realm][$key]);
    }

    /**
     * Collect key values from session storage.
     *
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @return array
     */
    private static function collectSessionValues(&$sessionValues, $realm, $key)
    {
        if (! isset($sessionValues[$realm][$key])) {
            return array();
        }
        return $sessionValues[$realm][$key];
    }

    /**
     * Merge static key values onto current value list.
     *
     * @param array $vals
     * @param array $staticValues
     * @param string $realm
     * @param string $key
     * @return array
     */
    private static function mergeStaticKeyValues($vals, &$staticValues, $realm, $key)
    {
        if (! isset($staticValues[$realm])) {
            return $vals;
        }

        $staticValues[$realm][$key] = empty($staticValues[$realm][$key]) ? array() : $staticValues[$realm][$key];
        return array_merge($vals, $staticValues[$realm][$key]);
    }

    /**
     * Remove fetched key when one-time fetch is enabled.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @param bool $isOnce
     * @return void
     */
    private static function removeFetchedKeyIfNeeded(&$staticValues, &$sessionValues, $realm, $key, $isOnce)
    {
        if (! $isOnce) {
            return;
        }
        self::remove($staticValues, $sessionValues, $realm, $key);
    }

    /**
     * Normalize fetched values as unique list.
     *
     * @param array $vals
     * @return array|false
     */
    private static function normalizeFetchedValues($vals)
    {
        $vals = array_unique($vals);
        return $vals ?: false;
    }

    /**
     * Merge existing session values into static bucket.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @return void
     */
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

    /**
     * Remove entire realm.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @return void
     */
    private static function removeRealm(&$staticValues, &$sessionValues, $realm)
    {
        if (isset($sessionValues[$realm])) {
            unset($sessionValues[$realm]);
        }
        if (isset($staticValues[$realm])) {
            unset($staticValues[$realm]);
        }
    }

    /**
     * Remove one key in a realm.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @return void
     */
    private static function removeKey(&$staticValues, &$sessionValues, $realm, $key)
    {
        if (isset($sessionValues[$realm][$key])) {
            unset($sessionValues[$realm][$key]);
        }
        if (isset($staticValues[$realm][$key])) {
            unset($staticValues[$realm][$key]);
        }
    }

    /**
     * Remove one indexed value in a key list.
     *
     * @param array $staticValues
     * @param array $sessionValues
     * @param string $realm
     * @param string $key
     * @param string|int $cKey
     * @return void
     */
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
