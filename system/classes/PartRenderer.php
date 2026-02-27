<?php

namespace Komarushi;

class PartRenderer
{
    public static function render(
        $criterion,
        $is_include,
        $return,
        $test_pattern,
        $wcagver,
        $added_criteria_21,
        $added_criteria_22,
        $parts_path
    ) {
        if (self::shouldSkipCriterion($criterion, $test_pattern, $wcagver, $added_criteria_21, $added_criteria_22)) {
            return '';
        }

        $partfile = self::resolvePartfile($criterion, $test_pattern, $parts_path);
        if (! file_exists($partfile)) {
            return '';
        }

        if ($is_include) {
            include($partfile);
            return '';
        }

        if ($return) {
            return self::captureIncludedHtml($partfile, false);
        }

        if (self::isNormalCall()) {
            return self::captureIncludedHtml($partfile, true);
        }

        include($partfile);
        return '';
    }

    private static function shouldSkipCriterion(
        $criterion,
        $test_pattern,
        $wcagver,
        $added_criteria_21,
        $added_criteria_22
    ) {
        if (! isset($test_pattern[$criterion])) {
            return true;
        }

        $criterion_chk = substr($criterion, 0, -1);
        return in_array($criterion_chk, self::excludedCriteriaByWcagVersion($wcagver, $added_criteria_21, $added_criteria_22));
    }

    private static function excludedCriteriaByWcagVersion($wcagver, $added_criteria_21, $added_criteria_22)
    {
        if ($wcagver == 22) {
            return array();
        }

        $added_criteria = $added_criteria_22;
        if ($wcagver == 20) {
            $added_criteria = array_merge($added_criteria, $added_criteria_21);
        }
        return $added_criteria;
    }

    private static function resolvePartfile($criterion, $test_pattern, $parts_path)
    {
        return $parts_path . $criterion . '_' . $test_pattern[$criterion] . '.php';
    }

    private static function isNormalCall()
    {
        $backtrace = debug_backtrace();
        return count($backtrace) <= 2;
    }

    private static function captureIncludedHtml($partfile, $drainAll = false)
    {
        ob_start();
        include($partfile);
        if (! $drainAll) {
            return ob_get_clean();
        }

        $html = '';
        while (ob_get_level() > 0) {
            $html .= ob_get_clean();
        }
        return $html;
    }
}
