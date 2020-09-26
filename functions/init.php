<?php
//init
mb_internal_encoding('UTF-8');
date_default_timezone_set('ASIA/Tokyo');
ini_set('display_errors', "On");
error_reporting(E_ALL);

//class
require(dirname(__dir__).'/classes/util.php');
require(dirname(__dir__).'/classes/input.php');
require(dirname(__dir__).'/classes/session.php');

//function
require(__dir__.'/main.php');

//constant
define('CPATH', dirname(__dir__).'/parts/');

//session
\Kontiki\Session::forge();

// routing
$request_uris = explode('/', $_SERVER['REQUEST_URI']);
$tail = array_pop($request_uris);
$tail = strpos($tail, '?') !== false ? substr($tail, 0, strpos($tail, '?')) : $tail ;
$files = array(
	'',
	'index.php',
	'fact.php',
	'register.php',
);

//setcookie('test_pattern_code', '', time() - 60, '/');

if (in_array($tail, $files))
{
	if (empty(\Kontiki\Input::cookie('test_pattern_code')))
	{
		$path = explode('/', $_SERVER['REQUEST_URI']);
		array_pop($path);
		array_pop($path);
		$path_str = join('/', $path).'/config.php';
		header('location: '.$path_str);
		exit();
	}
}
