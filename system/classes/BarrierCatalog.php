<?php

namespace Komarushi;

class BarrierCatalog
{
    /**
     * Build criterion => suffix list map from parts directory.
     *
     * @param string $partsPath
     * @return array
     */
    public static function codePatterns($partsPath)
    {
        $codePattern = array();
        foreach (glob($partsPath . '*.php') as $path) {
            $filename = basename($path);
            $codes = explode('_', substr($filename, 0, strrpos($filename, '.')));
            $criterion = $codes[0];
            $error = $codes[1];
            if (! isset($codePattern[$criterion])) {
                $codePattern[$criterion] = array();
            }
            $codePattern[$criterion][] = $error;
        }

        foreach ($codePattern as $criterion => $errors) {
            usort($errors, function ($a, $b) {
                return strnatcmp(str_replace('ok', '_ok', $a), str_replace('ok', '_ok', $b));
            });
            $codePattern[$criterion] = $errors;
        }

        return $codePattern;
    }

    /**
     * Extract comment messages from part files.
     *
     * @param string $partsPath
     * @param array $codePattern
     * @return array
     */
    public static function patternMessages($partsPath, $codePattern)
    {
        $messages = array();
        foreach ($codePattern as $criterion => $errors) {
            $messages[$criterion] = array();
            foreach ($errors as $suffix) {
                $str = file_get_contents($partsPath . $criterion . '_' . $suffix . '.php');
                if ($str === false) {
                    continue;
                }
                if (! preg_match('/\/\*(.+?)\*\//is', $str, $ms)) {
                    continue;
                }
                $messages[$criterion][$suffix] = trim($ms[1]);
            }
        }
        return $messages;
    }
}
