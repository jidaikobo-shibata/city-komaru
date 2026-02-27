<?php

//init
mb_internal_encoding('UTF-8');
date_default_timezone_set('ASIA/Tokyo');
ini_set('display_errors', "On");
error_reporting(E_ALL);

//autoload
require(__DIR__ . '/../vendor/autoload.php');

//forge
\Komarushi\Main::forge();

//function
function komaruHtml($critetrion, $parent = '')
{
    \Komarushi\Main::komaruHtml($critetrion, $parent);
}

//session start
\Kontiki\Session::forge();
