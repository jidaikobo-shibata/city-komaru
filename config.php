<?php
require (__dir__.'/functions/init.php');
require (__dir__.'/functions/config.php');

$test_pattern_str = generateTestPatternCode();
setTestPatternCode(\Kontiki\Input::post('test_pattern_code', ''));

?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>アクセシビリティ試験練習用サイト設定</title>
</head>
<body>
<h1>アクセシビリティ試験練習用サイト設定</h1>

<ul>
	<li>試験パターンコードを生成します</li>
	<li>試験パターンコードは1週間Cookieに保存されます</li>
	<li>試験パターンコードを保存しておくと、あとで同じ状態のサイトで試験できます</li>
	<li>現在は試験パターンコードの生成はランダム生成のみです</li>
</ul>

<h2>試験パターンコードを生成</h2>
<form action="" method="POST">
<?php
$ng_checked = $ok_checked = ' checked="checked"';
if (\Kontiki\Input::post('code_type') == 'ok'):
	$ng_checked = '';
else:
	$ok_checked = '';
endif;
?>
<ul>
	<li><label><input type="radio" name="code_type" value="ng"<?php echo $ng_checked ?>> アクセシビリティ上の問題を含んだ試験パターンコードを生成</label></li>
	<li><label><input type="radio" name="code_type" value="ok"<?php echo $ok_checked ?>> アクセシビリティ上の問題を解消した試験パターンコードを生成</label></li>
</ul>
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
