<?php
/*
 * generate test pattern code
 * return String
 */
function generateTestPatternCode ()
{
	$test_pattern_str = '';
	if (\Kontiki\Input::post('gen_test_pattern_code'))
	{
		$test_pattern = array(
			'index'    => array(),
			'fact'     => array(),
			'register' => array(),
		);
		$code_pattern = array();

		// prepare errors
		foreach (glob(CPATH.'*.php') as $v)
		{
			$pathes = explode('/', $v);
			$file = array_pop($pathes);
			$codes = explode('_', substr($file, 0, strrpos($file, '.')));
			$critetrion = $codes[0];
			$error = $codes[1];
			if ( ! isset($code_pattern[$critetrion])) $code_pattern[$critetrion] = array();

			$code_pattern[$critetrion][] = $error;
		}

		// set errors
		foreach ($code_pattern as $criterion => $errors)
		{
			foreach (array_keys($test_pattern) as $page)
			{
				if (\Kontiki\Input::post('code_type') == 'ok')
				{
					$okkey = array_search('ok', $errors);
					$test_pattern[$page][$criterion] = $errors[$okkey];
				}
				else
				{
					shuffle($errors);
					$test_pattern[$page][$criterion] = $errors[0];
				}
			}
		}

		// generate test pattern strings
		$json = json_encode($test_pattern);
		$test_pattern_str = base64_encode($json);
	}
	return $test_pattern_str;
}

/*
 * set test pattern code
 * param String $test_pattern_str
 * return Void
 */
function setTestPatternCode ($test_pattern_str)
{
	if (empty($test_pattern_str)) return;
	$path = explode('/', $_SERVER['REQUEST_URI']);
	array_pop($path);
	$path_str = join('/', $path).'/practice/';
	setcookie('test_pattern_code', $test_pattern_str, time()+86400*7, '/');
	header('location: '.$path_str);
	exit();
}
