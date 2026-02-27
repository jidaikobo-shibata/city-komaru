<?php

namespace Komarushi;

class RequestContext
{
    /**
     * Build request context values used by Main.
     *
     * @param array $presets
     * @return array
     */
    public static function fromRequest($presets)
    {
        return array(
            'preset' => self::resolvePreset(
                $presets,
                \Kontiki\Input::get('preset', \Kontiki\Input::post('preset'))
            ),
            'criteria' => self::resolveCriteria(
                \Kontiki\Input::get('criteria', \Kontiki\Input::post('criteria'))
            ),
            'wcagver' => self::normalizeWcagVersion(
                \Kontiki\Input::get('wcagver', \Kontiki\Input::post('wcagver'))
            ),
        );
    }

    /**
     * Resolve posted WCAG version with fallback.
     *
     * @param int $default
     * @return int
     */
    public static function postedWcagVersion($default = 22)
    {
        return self::normalizeWcagVersion(\Kontiki\Input::post('wcagver', $default));
    }

    /**
     * Resolve preset key from allow list.
     *
     * @param array $presets
     * @param string $preset
     * @return string
     */
    public static function resolvePreset($presets, $preset)
    {
        return in_array($preset, $presets) ? $preset : '';
    }

    /**
     * Resolve criteria string from request.
     *
     * @param string $criteria
     * @return string
     */
    public static function resolveCriteria($criteria)
    {
        return $criteria;
    }

    /**
     * Normalize WCAG version to supported values.
     *
     * @param mixed $wcagver
     * @return int
     */
    public static function normalizeWcagVersion($wcagver)
    {
        $wcagver = intval($wcagver);
        return in_array($wcagver, array(20, 21, 22)) ? $wcagver : 22;
    }
}
