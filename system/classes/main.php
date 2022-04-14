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
		'register'
	);
	public static $test_pattern = array();
	public static $message_patterns = array();
	public static $message_presets = array();
	public static $is_test_pattern_code_failed = false;

	/**
	 * construct
	 * set constant:
	 * KOMARUSHI_PARTS_PATH, KOMARUSHI_PRESETS_PATH, KOMARUSHI_PRESET, KOMARUSHI_CRITERIA
	 * @return Void
	 */
	public static function forge()
	{
		// parts path
		define('KOMARUSHI_PARTS_PATH', dirname(__DIR__).'/parts/');

		// preset
		define('KOMARUSHI_PRESETS_PATH', dirname(__DIR__).'/presets/');
		$presets = array();
		foreach (glob(KOMARUSHI_PRESETS_PATH.'*.php') as $v)
		{
			// pathes
			$pathes = explode('/', $v);
			$file = array_pop($pathes);
			$presetname = substr($file, 0, strrpos($file, '.'));
			$presets[] = $presetname;

			// message
			if ($str = file_get_contents($v))
			{
				if ( ! preg_match('/\/\*(.+?)\*\//is', $str, $ms)) continue;
				static::$message_presets[$presetname] = explode("::", trim($ms[1]));
			};
		}
		$preset = \kontiki\Input::get('preset', \kontiki\Input::post('preset')); // post or get
		$preset = in_array($preset, $presets) ? $preset : '' ;
		define('KOMARUSHI_PRESET', $preset);

		// criteria
		$criteria = \kontiki\Input::get('criteria', \kontiki\Input::post('criteria')); // post or get
		define('KOMARUSHI_CRITERIA', $criteria);

		// current test pattern
		$test_pattern_code = \Kontiki\Input::cookie('test_pattern_code');
		static::$test_pattern = self::getPatternSet($test_pattern_code);

		// pattern messages
		static::$message_patterns = self::getPatternMessages();
	}

	/**
	 * generate test pattern code
	 * @return String
	 */
	public static function generateTestPatternCode()
	{
		$test_pattern_str = '';
		if (\Kontiki\Input::post('gen_test_pattern_code'))
		{
			$test_pattern = array();
			$code_pattern = self::getCodePatterns();

			// set errors
			foreach ($code_pattern as $criterion => $errors)
			{
				if (\Kontiki\Input::post('code_type') == 'individual')
				{
					$criterion4post = str_replace('.', '_', $criterion);
					$suffix = \Kontiki\Input::post($criterion4post);
					if ($suffix == 'ok') continue;
					$test_pattern[$criterion] = \Kontiki\Input::post($criterion4post);
				}
				else
				{
					shuffle($errors);
					$suffix = $errors[0];
					if ($suffix == 'ok') continue;
					$test_pattern[$criterion] = $errors[0];
				}
			}

			// generate test pattern strings
			$json = json_encode($test_pattern);
			$test_pattern_str = base64_encode($json);
		}
		return $test_pattern_str;
	}

	/**
	 * set test pattern code
	 * @param String $test_pattern_str
	 * @return Void
	 */
	public static function setTestPatternCode($test_pattern_str)
	{
		if (empty($test_pattern_str)) return;
		$path = explode('/', $_SERVER['REQUEST_URI']);
		array_pop($path);
		$path_str = join('/', $path).'/practice/';
		setcookie('test_pattern_code', $test_pattern_str, time()+86400*7, '/');
		header('location: '.$path_str);
		exit();
	}

	/**
	 * get code patterns
	 * @return Array
	 */
	public static function getCodePatterns()
	{
		foreach (glob(KOMARUSHI_PARTS_PATH.'*.php') as $v)
		{
			$pathes = explode('/', $v);
			$file = array_pop($pathes);
			$codes = explode('_', substr($file, 0, strrpos($file, '.')));
			$critetrion = $codes[0];
			$error = $codes[1];
			if ( ! isset($code_pattern[$critetrion])) $code_pattern[$critetrion] = array();
			$code_pattern[$critetrion][] = $error;
		}
		foreach($code_pattern as $k => $v)
		{
			usort($v, function($a, $b){
				return strnatcmp(str_replace('ok', '_ok', $a), str_replace('ok', '_ok', $b));
			});
			$code_pattern[$k] = $v;
		}
		return $code_pattern;
	}

	/**
	 * get pattern messages
	 * @return Array
	 */
	private static function getPatternMessages()
	{
		$code_pattern = self::getCodePatterns();
		$messages = array();
		foreach ($code_pattern as $k => $v)
		{
			$messages[$k] = array();
			foreach ($v as $vv)
			{
				$str = file_get_contents(KOMARUSHI_PARTS_PATH.$k.'_'.$vv.'.php');
				if ($str === false) continue;
				if ( ! preg_match('/\/\*(.+?)\*\//is', $str, $ms)) continue;
				$messages[$k][$vv] = trim($ms[1]);
			}
		}
		return $messages;
	}

	/**
	 * whoAmI
	 * @return String
	 */
	public static function whoAmI()
	{
		$who = 'index';
		foreach (self::$files as $v)
		{
			if (strpos(\kontiki\Input::server('REQUEST_URI'), $v) !== false)
			{
				$who = $v;
				break;
			}
		}
		return $who;
	}

	/**
	 * modeString
	 * @return String
	 */
	public static function modeString()
	{
		$mode_strings = [];
		$mode_string = '';
		if ( ! empty(KOMARUSHI_PRESET))
		{
			$mode_strings[] = 'preset='.KOMARUSHI_PRESET;
		}
		if ( ! empty(KOMARUSHI_CRITERIA))
		{
			$mode_strings[] = 'criteria='.KOMARUSHI_CRITERIA;
		}
		if ( ! empty($mode_strings))
		{
			$mode_string = '?'.join('&amp;', $mode_strings);
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
		if ( ! empty($retval)) return $retval;

		$retval = ! empty($test_pattern_code) ?
						json_decode(base64_decode($test_pattern_code), true) :
						array();

		// preset overwrite
		if ( ! empty(KOMARUSHI_PRESET))
		{
			$retval = include(KOMARUSHI_PRESETS_PATH.KOMARUSHI_PRESET.'.php');
		}

		// criteria overwrite
		if ( ! empty(KOMARUSHI_CRITERIA))
		{
			$given_criteria = explode(',', KOMARUSHI_CRITERIA);
			foreach ($given_criteria as $criterion)
			{
				// アンダーバーがある時はエラーまで特定したい時
				$each_criterions = explode('_', $criterion);
				if (count($each_criterions) >= 2)
				{
					if ( ! isset(self::getCodePatterns()[$each_criterions[0]])) continue;
					if ( ! in_array($each_criterions[1], self::getCodePatterns()[$each_criterions[0]])) continue;
					$retval[$each_criterions[0]] = $each_criterions[1];
					continue;
				}
				else
				{
					// アンダーバーがないので、達成基準をまとめて指定したいパターン。最初のNGのみ
					foreach (self::getCodePatterns() as $k => $v)
					{
						if (strpos($k, $each_criterions[0]) === false) continue;
						if ( ! isset($v[1])) continue;
						$retval[$k] = $v[1];
					}
				}
			}
		}

		$oks = array();
		foreach (self::getCodePatterns() as $k => $v)
		{
			$oks[$k] = $v[0];
		}
		if ( ! is_array($retval))
		{
			static::$is_test_pattern_code_failed = TRUE;
			setcookie('test_pattern_code', base64_encode(json_encode(array())), time()+86400*7, '/');
			return $oks;
		}

		$retval = array_merge($oks, $retval);
		return $retval;
	}

	/**
	 * echo practice HTML - komaruHtml
	 * @param String $critetrion
	 * @return Void
	 */
	public static function komaruHtml($critetrion)
	{
		// test pattern code
		$test_pattern_code = \Kontiki\Input::cookie('test_pattern_code');

		// each html
		if ( ! isset(static::$test_pattern[$critetrion]))
		{
			echo '';
			return;
		}
		$partfile = KOMARUSHI_PARTS_PATH.$critetrion.'_'.static::$test_pattern[$critetrion].'.php';


		// is normal or internal call
		$backtrace = debug_backtrace();
		$is_normal = count($backtrace) <= 2;

		// output
		$html = '';
		if (file_exists($partfile))
		{
			// narmal call
			if ($is_normal)
			{
				ob_start();
				include($partfile);
				$levels = ob_get_level();
				for ($i = 0; $i < $levels; $i++)
				{
					$html .= ob_get_clean();
				}
			// internal call
			}
			else
			{
				include($partfile);
			}
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
		if ( ! isset(static::$test_pattern[$barrier_id])) return '';
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
