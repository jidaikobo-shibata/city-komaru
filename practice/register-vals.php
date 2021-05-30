<?php
// 値の保存
$vals = [
	'your-id'              => '',
	'type'                 => '',
	'shimei'               => '',
	'email'                => '',
	'phone'                => '',
	'registration-captcha' => '',
	'agree_privacypolicy'  => '',
];
if (isset($_COOKIE['vals']))
{
	$cookie_vals = json_decode($_COOKIE['vals'], true);
	$cookie_vals = is_array($cookie_vals) ? $cookie_vals : [];
	$cookie_vals = \Kontiki\Util::s($cookie_vals);
	foreach ($vals as $k => $v)
	{
		$vals[$k] = isset($cookie_vals[$k]) ? $cookie_vals[$k] : $v;
	}
}

return $vals;
