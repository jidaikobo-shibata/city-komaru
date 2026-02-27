<?php

namespace Komarushi;

class PartRenderer
{
    /**
     * Render part html by criterion and current pattern.
     *
     * @param string $criterion
     * @param bool $is_include
     * @param bool $return
     * @param array $test_pattern
     * @param int $wcagver
     * @param array $added_criteria_21
     * @param array $added_criteria_22
     * @param string $parts_path
     * @return string
     */
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

    /**
     * Determine whether this criterion should be skipped.
     *
     * @param string $criterion
     * @param array $test_pattern
     * @param int $wcagver
     * @param array $added_criteria_21
     * @param array $added_criteria_22
     * @return bool
     */
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

    /**
     * Return excluded criteria list by WCAG version.
     *
     * @param int $wcagver
     * @param array $added_criteria_21
     * @param array $added_criteria_22
     * @return array
     */
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

    /**
     * Resolve part file path.
     *
     * @param string $criterion
     * @param array $test_pattern
     * @param string $parts_path
     * @return string
     */
    private static function resolvePartfile($criterion, $test_pattern, $parts_path)
    {
        return $parts_path . $criterion . '_' . $test_pattern[$criterion] . '.php';
    }

    /**
     * Whether this call is from normal template context.
     *
     * @return bool
     */
    private static function isNormalCall()
    {
        $backtrace = debug_backtrace();
        return count($backtrace) <= 2;
    }

    /**
     * Include part file and capture output.
     *
     * @param string $partfile
     * @param bool $drainAll
     * @return string
     */
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
