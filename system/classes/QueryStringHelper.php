<?php

namespace Kontiki;

class QueryStringHelper
{
    /**
     * Append query strings to uri.
     *
     * @param string $uri
     * @param array $queryStrings
     * @return string
     */
    public static function add($uri, $queryStrings = array())
    {
        $delimiter = strpos($uri, '?') !== false ? '&amp;' : '?';
        $queries = array();
        foreach ($queryStrings as $query) {
            $queries[] = $query[0] . '=' . $query[1];
        }
        return $uri . $delimiter . join('&amp;', $queries);
    }

    /**
     * Remove query strings from uri by key.
     *
     * @param string $uri
     * @param array $queryStrings
     * @return string
     */
    public static function remove($uri, $queryStrings = array())
    {
        if (strpos($uri, '?') === false) {
            return $uri;
        }

        $keysToRemove = $queryStrings ?: array_keys($_GET);
        list($baseUrl, $queries) = self::splitUriAndQueries($uri);
        $filteredQueries = self::filterQueries($queries, $keysToRemove);
        return $filteredQueries ? $baseUrl . '?' . join('&amp;', $filteredQueries) : $baseUrl;
    }

    /**
     * Split uri into base url and query array.
     *
     * @param string $uri
     * @return array
     */
    private static function splitUriAndQueries($uri)
    {
        $uri = str_replace('&amp;', '&', $uri);
        $pos = strpos($uri, '?');
        $baseUrl = substr($uri, 0, $pos);
        $queries = explode('&', substr($uri, $pos + 1));
        return array($baseUrl, $queries);
    }

    /**
     * Filter query list by key exclusion list.
     *
     * @param array $queries
     * @param array $keysToRemove
     * @return array
     */
    private static function filterQueries($queries, $keysToRemove)
    {
        foreach ($queries as $k => $query) {
            if (in_array(self::extractQueryKey($query), $keysToRemove)) {
                unset($queries[$k]);
            }
        }
        return $queries;
    }

    /**
     * Extract query key from `key=value` string.
     *
     * @param string $query
     * @return string
     */
    private static function extractQueryKey($query)
    {
        $equalPos = strpos($query, '=');
        if ($equalPos === false) {
            return $query;
        }
        return substr($query, 0, $equalPos);
    }
}
