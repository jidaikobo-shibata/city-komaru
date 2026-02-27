<?php

/**
 * Komarushi\Main
 *
 * @author     Jidaikobo Inc.
 * @license    The MIT License (MIT)
 * @copyright  Jidaikobo Inc.
 * @link       http://www.jidaikobo.com
 */

namespace Komarushi;

class Main
{
    public static $files = array(
        'index',
        'fact',
        'register',
        'information-each1'
    );
    public static $test_pattern = array();
    public static $message_patterns = array();
    public static $message_presets = array();
    public static $is_test_pattern_code_failed = false;
    public static $added_criteria_21 = array(
        '1.3.4', '1.3.5', '1.3.6', '1.4.10', '1.4.11', '1.4.12', '1.4.13',
        '2.1.4', '2.2.6', '2.3.3', '2.5.1', '2.5.2', '2.5.3', '2.5.4',
        '2.5.5', '2.5.6', '4.1.3'
    );
    public static $added_criteria_22 = array(
        '2.4.11', '2.4.12', '2.4.13', '2.5.7', '2.5.8', '3.2.6', '3.3.7',
        '3.3.8', '3.3.9'
    );

    /**
     * construct
     * set constant:
     * KOMARUSHI_PARTS_PATH, KOMARUSHI_PRESETS_PATH, KOMARUSHI_PRESET, KOMARUSHI_CRITERIA
     * @return Void
     */
    public static function forge()
    {
        self::defineBaseConstants();
        $presets = self::loadPresetsAndMessages();
        $context = RequestContext::fromRequest($presets);
        define('KOMARUSHI_PRESET', $context['preset']);
        define('KOMARUSHI_CRITERIA', $context['criteria']);
        define('KOMARUSHI_WCAGVER', $context['wcagver']);

        // current test pattern
        $test_pattern_code = \Kontiki\Input::cookie('test_pattern_code');
        static::$test_pattern = self::getPatternSet($test_pattern_code);

        // pattern messages
        static::$message_patterns = self::getPatternMessages();
    }

    private static function defineBaseConstants()
    {
        define('KOMARUSHI_PARTS_PATH', dirname(__DIR__) . '/parts/');
        define('KOMARUSHI_PRESETS_PATH', dirname(__DIR__) . '/presets/');
    }

    private static function loadPresetsAndMessages()
    {
        $presets = array();
        foreach (glob(KOMARUSHI_PRESETS_PATH . '*.php') as $path) {
            $presetname = self::extractPresetName($path);
            $presets[] = $presetname;
            self::loadPresetMessage($path, $presetname);
        }

        return $presets;
    }

    private static function extractPresetName($path)
    {
        $pathes = explode('/', $path);
        $file = array_pop($pathes);
        return substr($file, 0, strrpos($file, '.'));
    }

    private static function loadPresetMessage($path, $presetname)
    {
        $str = file_get_contents($path);
        if (! $str || ! preg_match('/\/\*(.+?)\*\//is', $str, $ms)) {
            return;
        }
        static::$message_presets[$presetname] = explode("::", trim($ms[1]));
    }

    /**
     * generate test pattern code
     * @return String
     */
    public static function generateTestPatternCode()
    {
        if (! \Kontiki\Input::post('gen_test_pattern_code')) {
            return '';
        }

        $codePattern = self::getCodePatterns();
        $wcagver = RequestContext::postedWcagVersion(22);
        $excludedCriteria = self::getExcludedCriteriaByWcagVersion($wcagver);
        $codeType = \Kontiki\Input::post('code_type');

        return TestPatternGenerator::generate($codeType, $codePattern, $excludedCriteria);
    }

    private static function getExcludedCriteriaByWcagVersion($wcagver)
    {
        if ($wcagver == 22) {
            return array();
        }

        $excluded_criteria = static::$added_criteria_22;
        if ($wcagver == 20) {
            $excluded_criteria = array_merge($excluded_criteria, static::$added_criteria_21);
        }
        return $excluded_criteria;
    }

    /**
     * set test pattern code
     * @param String $test_pattern_str
     * @return Void
     */
    public static function setTestPatternCode($test_pattern_str)
    {
        if (empty($test_pattern_str)) {
            return;
        }
        $path = explode('/', $_SERVER['REQUEST_URI']);
        array_pop($path);
        $path_str = join('/', $path) . '/practice/';
        setcookie('test_pattern_code', $test_pattern_str, time() + 86400 * 7, '/');
        header('location: ' . $path_str);
        exit();
    }

    /**
     * get code patterns
     * @return Array
     */
    public static function getCodePatterns()
    {
        return BarrierCatalog::codePatterns(KOMARUSHI_PARTS_PATH);
    }

    /**
     * get pattern messages
     * @return Array
     */
    private static function getPatternMessages()
    {
        $code_pattern = self::getCodePatterns();
        return BarrierCatalog::patternMessages(KOMARUSHI_PARTS_PATH, $code_pattern);
    }

    /**
     * whoAmI
     * @return String
     */
    public static function whoAmI()
    {
        $who = 'index';
        foreach (self::$files as $v) {
            if (strpos(\Kontiki\Input::server('REQUEST_URI'), $v) !== false) {
                $who = $v;
                break;
            }
        }
        return $who;
    }

    /**
     * modeString
     * @param Bool escape
     * @return String
     */
    public static function modeString($escape = true)
    {
        $mode_strings = [];
        $mode_string = '';
        if (! empty(KOMARUSHI_PRESET)) {
            $mode_strings[] = 'preset=' . KOMARUSHI_PRESET;
        }
        if (! empty(KOMARUSHI_CRITERIA)) {
            $mode_strings[] = 'criteria=' . KOMARUSHI_CRITERIA;
        }
        if (! empty(KOMARUSHI_WCAGVER)) {
            $mode_strings[] = 'wcagver=' . KOMARUSHI_WCAGVER;
        }
        if (! empty($mode_strings)) {
            $ampersand = $escape ? '&amp;' : '&';
            $mode_string = '?' . join($ampersand, $mode_strings);
        }
        return $mode_string;
    }

    /**
     * get pattern set
     * @param String $test_pattern_code
     * @return Array
     */
    private static function getPatternSet($test_pattern_code)
    {
        static $retval = array();
        if (! empty($retval)) {
            return $retval;
        }

        $result = PatternResolver::resolve(
            $test_pattern_code,
            KOMARUSHI_PRESET,
            KOMARUSHI_PRESETS_PATH,
            KOMARUSHI_CRITERIA,
            self::getCodePatterns()
        );

        if ($result['failed']) {
            static::$is_test_pattern_code_failed = true;
            setcookie('test_pattern_code', base64_encode(json_encode(array())), time() + 86400 * 7, '/');
            return $result['oks'];
        }

        $retval = array_merge($result['oks'], $result['pattern']);
        return $retval;
    }

    /**
     * echo practice HTML - komaruHtml
     * @param String $critetrion
     * @param String $is_include
     * @param Bool $return
     * @return Void
     */
    public static function komaruHtml($critetrion, $is_include = false, $return = false)
    {
        $html = PartRenderer::render(
            $critetrion,
            $is_include,
            $return,
            static::$test_pattern,
            KOMARUSHI_WCAGVER,
            static::$added_criteria_21,
            static::$added_criteria_22,
            KOMARUSHI_PARTS_PATH
        );

        if ($return) {
            return $html;
        }
        echo $html;
    }

    /**
     * get barrier status
     * @param String $barrier_id
     * @return String [ok, ng1...]
     */
    public static function getBarrierStatus($barrier_id)
    {
        if (! isset(static::$test_pattern[$barrier_id])) {
            return '';
        }
        return static::$test_pattern[$barrier_id];
    }

    /**
     * get preset messages
     * @param String $preset_id
     * @return Array
     */
    public static function getPresetMessages($preset_id = '')
    {
        $message = array(
            'title' => '',
            'description' => '',
        );
        $preset_id = empty($preset_id) ? \Kontiki\Input::get('preset', '') : $preset_id;
        $message['title'] = isset(static::$message_presets[$preset_id][0]) ?
                                              static::$message_presets[$preset_id][0] :
                                              '';
        $message['description'] = isset(static::$message_presets[$preset_id][1]) ?
                                              static::$message_presets[$preset_id][1] :
                                              '';
        return $message;
    }
}
