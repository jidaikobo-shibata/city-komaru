<?php
/*
 * echo practice HTML
 * param String $critetrion
 * param String $parent
 * return Void
 */
function echoPracticeHtml ($critetrion, $parent = '')
{
	// from where
	if (empty($parent))
	{
		$backtrace = debug_backtrace();
		$path = explode('/', $backtrace[0]['file']);
		$file = array_pop($path);
		$file = substr($file, 0, strrpos($file, '.'));
	}
	else
	{
		$file = $parent;
	}

	$test_pattern_code = \Kontiki\Input::cookie('test_pattern_code');
	if (empty($test_pattern_code))
	{
		echo '';
		return;
	}
	$set = json_decode(base64_decode($test_pattern_code));

	if ( ! isset($set->$file->$critetrion))
	{
		echo '';
		return;
	}
	$partfile = CPATH.$critetrion.'_'.$set->$file->$critetrion.'.php';

	$html = '';
	if (file_exists($partfile))
	{
		if (empty($parent))
		{
			ob_start();

			// use $file to judge condition
			include($partfile);

			$levels = ob_get_level();

			for ($i = 0; $i < $levels; $i++)
			{
				$html .= ob_get_clean();
			}
		} else {
			include($partfile);
		}
	}

	echo $html;
}
