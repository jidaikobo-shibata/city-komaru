<?php

namespace Komarushi;

class RequestContext
{
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

    public static function postedWcagVersion($default = 22)
    {
        return self::normalizeWcagVersion(\Kontiki\Input::post('wcagver', $default));
    }

    public static function resolvePreset($presets, $preset)
    {
        return in_array($preset, $presets) ? $preset : '';
    }

    public static function resolveCriteria($criteria)
    {
        return $criteria;
    }

    public static function normalizeWcagVersion($wcagver)
    {
        $wcagver = intval($wcagver);
        return in_array($wcagver, array(20, 21, 22)) ? $wcagver : 22;
    }
}
