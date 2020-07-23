<?php
function echoPracticeHtml ($critetrion, $specify = '')
{
	// from where
	$backtrace = debug_backtrace();
	$path = explode('/', $backtrace[0]['file']);
	$file = array_pop($path);
	$file = substr($file, 0, strrpos($file, '.'));

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
	$partfile = empty($specify) ?
						  CPATH.$critetrion.'_'.$set->$file->$critetrion.'.php' :
						  CPATH.$critetrion.'_'.$specify.'.php';

	$html = '';
	if (file_exists($partfile))
	{
		ob_start();

		// use $file to judge condition
		include($partfile);

		$levels = ob_get_level();

		for ($i = 0; $i < $levels; $i++)
		{
			$html .= ob_get_clean();
		}
	}

	echo $html;
}
