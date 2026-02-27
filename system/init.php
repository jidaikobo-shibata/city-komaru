<?php

//init
mb_internal_encoding('UTF-8');
date_default_timezone_set('ASIA/Tokyo');
ini_set('display_errors', "On");
error_reporting(E_ALL);

//class
require(__DIR__ . '/classes/util.php');
require(__DIR__ . '/classes/input.php');
require(__DIR__ . '/classes/session.php');
require(__DIR__ . '/classes/main.php');

//forge
\Komarushi\Main::forge();

//function
function komaruHtml($critetrion, $parent = '')
{
    \Komarushi\Main::komaruHtml($critetrion, $parent);
}

//session start
\Kontiki\Session::forge();
