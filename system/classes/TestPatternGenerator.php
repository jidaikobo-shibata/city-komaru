<?php

namespace Komarushi;

class TestPatternGenerator
{
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

    private static function shouldSkipCriterion($codeType, $criterion, $excludedCriteria)
    {
        return $codeType === 'ng' && in_array(substr($criterion, 0, -1), $excludedCriteria);
    }

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
