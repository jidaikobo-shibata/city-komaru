<?php
require (__dir__.'/init.php');

// generate test pattern code
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
			shuffle($errors);
			$test_pattern[$page][$criterion] = $errors[0];
		}
	}

	// generate test pattern strings
	$json = json_encode($test_pattern);
	$test_pattern_str = base64_encode($json);
}

// set test pattern code
if (\Kontiki\Input::post('test_pattern_code'))
{
	$path = explode('/', $_SERVER['REQUEST_URI']);
	array_pop($path);
	$path_str = join('/', $path).'/practice/';
	setcookie('test_pattern_code', \Kontiki\Input::post('test_pattern_code'), time()+86400*7, '/');
	header('location: '.$path_str);
	exit();
}

?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>アクセシビリティ試験練習用サイト設定</title>
</head>
<body>
<h1>アクセシビリティ試験練習用サイト設定</h1>

<ul>
	<li>試験パターンコードを設定します</li>
	<li>試験パターンコードは1週間Cookieに保存されます</li>
	<li>試験パターンコードを保存しておくと、あとで同じ状態のサイトで試験できます</li>
	<li>現在は試験パターンコードの生成はランダム生成のみです</li>
</ul>

<h2>試験パターンコードを生成</h2>
<form action="" method="POST">
<p><input type="submit" name="gen_test_pattern_code" value="試験パターンコードを生成"></p>
</form>

<h2>試験パターンコードがある場合</h2>
<form action="" method="POST">
<?php if (empty($test_pattern_str)): ?>
<p><label for="test_pattern_code">試験パターンコードを入力してください</label></p>
<?php else: ?>
<p><label for="test_pattern_code">「試験を開始」を押してください</label></p>
<?php endif; ?>
<textarea name="test_pattern_code" id="test_pattern_code" cols="35" rows="7"><?php echo $test_pattern_str ?></textarea>
<p><input type="submit" value="試験を開始"></p>
</form>

<p><a href="./">アクセシビリティ試験練習用サイトのトップページ</a></p>

</body>
</html>
