<?php

namespace Komarushi;

class PatternResolver
{
    public static function resolve(
        $test_pattern_code,
        $preset,
        $preset_path,
        $criteria,
        $codePatterns
    ) {
        $pattern = self::decodeTestPattern($test_pattern_code);
        $pattern = self::overwriteWithPreset($pattern, $preset, $preset_path);
        self::overwriteWithCriteria($pattern, $criteria, $codePatterns);

        return array(
            'pattern' => $pattern,
            'oks' => self::buildOkPatternSet($codePatterns),
            'failed' => ! is_array($pattern),
        );
    }

    private static function decodeTestPattern($test_pattern_code)
    {
        if (empty($test_pattern_code)) {
            return array();
        }

        return json_decode(base64_decode($test_pattern_code), true);
    }

    private static function overwriteWithPreset($pattern, $preset, $preset_path)
    {
        if (empty($preset)) {
            return $pattern;
        }

        return include($preset_path . $preset . '.php');
    }

    private static function overwriteWithCriteria(&$pattern, $criteria, $codePatterns)
    {
        if (empty($criteria)) {
            return;
        }

        $given_criteria = explode(',', $criteria);

        foreach ($given_criteria as $criterion) {
            $each_criterions = explode('_', $criterion);
            if (count($each_criterions) >= 2) {
                self::applySpecificCriterion($pattern, $each_criterions, $codePatterns);
                continue;
            }
            self::applyCriterionGroup($pattern, $each_criterions[0], $codePatterns);
        }
    }

    private static function applySpecificCriterion(&$pattern, $each_criterions, $codePatterns)
    {
        $criterion = $each_criterions[0];
        $suffix = $each_criterions[1];

        if (! isset($codePatterns[$criterion])) {
            return;
        }
        if (! in_array($suffix, $codePatterns[$criterion])) {
            return;
        }

        $pattern[$criterion] = $suffix;
    }

    private static function applyCriterionGroup(&$pattern, $criterion, $codePatterns)
    {
        foreach ($codePatterns as $k => $v) {
            if (strpos($k, $criterion) === false) {
                continue;
            }
            if (! isset($v[1])) {
                continue;
            }
            $pattern[$k] = $v[1];
        }
    }

    private static function buildOkPatternSet($codePatterns)
    {
        $oks = array();
        foreach ($codePatterns as $k => $v) {
            $oks[$k] = $v[0];
        }
        return $oks;
    }
}
