<?php

namespace Komarushi;

class TestPatternGenerator
{
    /**
     * Generate base64 encoded test pattern string.
     *
     * @param string $codeType
     * @param array $codePattern
     * @param array $excludedCriteria
     * @return string
     */
    public static function generate($codeType, $codePattern, $excludedCriteria)
    {
        $testPattern = array();
        foreach ($codePattern as $criterion => $errors) {
            if (self::shouldSkipCriterion($codeType, $criterion, $excludedCriteria)) {
                continue;
            }

            $suffix = self::resolveSuffix($codeType, $criterion, $errors);
            if (empty($suffix) || $suffix === 'ok') {
                continue;
            }
            $testPattern[$criterion] = $suffix;
        }

        return base64_encode(json_encode($testPattern));
    }

    /**
     * Determine whether criterion should be skipped for this code type.
     *
     * @param string $codeType
     * @param string $criterion
     * @param array $excludedCriteria
     * @return bool
     */
    private static function shouldSkipCriterion($codeType, $criterion, $excludedCriteria)
    {
        return $codeType === 'ng' && in_array(substr($criterion, 0, -1), $excludedCriteria);
    }

    /**
     * Resolve suffix from post or random selection.
     *
     * @param string $codeType
     * @param string $criterion
     * @param array $errors
     * @return string|null
     */
    private static function resolveSuffix($codeType, $criterion, $errors)
    {
        if ($codeType === 'individual') {
            $criterion4post = str_replace('.', '_', $criterion);
            return \Kontiki\Input::post($criterion4post);
        }

        $errorsShuffled = $errors;
        shuffle($errorsShuffled);
        return $errorsShuffled[0];
    }
}
