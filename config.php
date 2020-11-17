<?php
require (__dir__.'/functions/init.php');
require (__dir__.'/functions/config.php');

$test_pattern_str = generateTestPatternCode();
setTestPatternCode(\Kontiki\Input::post('test_pattern_code', ''));

?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>障壁（バリア）の設定：駒瑠市〜アクセシビリティ上の問題の体験サイト〜</title>
	<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
<h1>障壁（バリア）の設定</h1>

<ul>
	<li>障壁パターンコードを生成します</li>
	<li>障壁パターンコードは1週間Cookieに保存されます</li>
	<li>障壁パターンコードを保存しておくと、あとで同じ状態のサイトで試験できます</li>
	<li>開発中のサービスですので、バリアの種類や箇所は随時変更があります。障壁パターンコードがうまく機能しなくなった場合は、設定においてパターンコードを再生成してください</li>
</ul>

<h2>障壁パターンコードを生成</h2>
<ol>
	<li>サイトに実装する障壁の設定を行います。ランダム生成か個別指定を選んでください</li>
	<li>「障壁パターンコードを生成」のボタンを押すと、障壁パターンコードがこのページのtextareaに出力されます</li>
	<li>「サイトを生成する」を押すことで、設定に応じたサイトが生成されます</li>
	<li>設定したバリアを使いまわしたい時には、この障壁パターンコードを保存しておいてください。ふたたびこのページのtextareaに貼付することで、おなじ障壁を再現できます</li>
</ol>

<form action="" method="POST">
<?php $ng_checked = \Kontiki\Input::post('code_type') != 'individual' ? ' checked="checked"' : ''; ?>
<ul>
	<li><label><input type="radio" name="code_type" value="ng"<?php echo $ng_checked ?>> アクセシビリティ上のランダムな問題を含んだ障壁パターンコードを生成</label></li>
<li>
<details id="individual_set">
<summary tabindex="-1"><label><input type="radio" name="code_type" value="individual"> 障壁を個別に指定する</label></summary>
<?php
$html = '';
$html.= '<ul>';
$patterns = \Kontiki\Util::s(getCodePatternMessages());
foreach ($patterns as $cat => $messages):
	$html.= '<li>'.$cat.'<ul>';
	$n = 0;
	foreach ($messages as $file => $message):
		$checked = $n == 0 ? ' checked="checked"' : '';
		$n++;
		$cat4post = str_replace('.', '_', $cat);
		$html.= '<li><label><input'.$checked.' type="radio" name="'.$cat4post.'" value="'.$file.'">';
		$status = strpos($file, 'ok') !== false ? 'OK' : 'NG';
		$html.= $status.': '.$message.'</label></li>';
	endforeach;
	$html.= '</ul></li>';
endforeach;
$html.= '</ul>';
echo $html;
?>
</details>
</li>
</ul>

<p><input type="submit" name="gen_test_pattern_code" value="障壁パターンコードを生成"></p>
</form>

<h2>障壁パターンコードがある場合</h2>
<form action="" method="POST">
<?php if (empty($test_pattern_str)): ?>
<p><label for="test_pattern_code">障壁パターンコードを入力してください</label></p>
<?php else: ?>
<p><label for="test_pattern_code">「サイトを生成する」を押してください</label></p>
<?php endif; ?>
<textarea name="test_pattern_code" id="test_pattern_code" cols="35" rows="7"><?php echo $test_pattern_str ?></textarea>
<p><input type="submit" value="サイトを生成する"></p>
</form>

<p><a href="./">駒瑠市〜アクセシビリティ上の問題の体験サイト〜のトップページ</a></p>


<script>
$(function() {
/*
 * バリアを個別に指定する、を選択時、ディスクロージャオープン。
 * 問題を含んだ〜を選択時には、ディスクロージャクローズ。
 * もともとのディスクロージャの機能は殺す。
 */
	const radioButton = $('input[name="code_type"]')
				detailsArea = $('#individual_set'),
				detailsSummary = $('#individual_set summary');
	radioButton.on({
		'change' : toggleIndividualSet,
		'click'  : function(){event.stopPropagation()}
	});
	detailsSummary.on('click', function(){
		radioButton.eq(1).prop('checked', true).trigger('change');
		return false;
	});
	function toggleIndividualSet(event){
		target = !event ? radioButton.eq(1): $(event.target);
		if(target.val() == 'individual'){
			detailsArea.attr('open', '');
		}else{
			detailsArea.removeAttr('open');
		}
	}
});
</script>
</body>
</html>
