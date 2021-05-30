<?php
require (__dir__.'/system/init.php');

$test_pattern_str = \Komarushi\Main::generateTestPatternCode();
\Komarushi\Main::setTestPatternCode(\Kontiki\Input::post('test_pattern_code', ''));

?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>駒瑠市〜アクセシビリティ上の問題の体験サイト〜</title>
	<style type="text/css">
		#preset li p
		{
			margin: 0 0 0.8em;
		}

		#readme_vendor li
		{
			margin: 0;
			display: inline-block;
			vertical-align: top;
			width: 170px;
			text-align: center;
			list-style: none;
			font-size: 100%;
		}

		#readme_vendor li img
		{
			height: 100px;
			display: block;
			margin: 5px auto;
		}

		footer
		{
			border-top: 1px #aaa solid;
			padding: 25px 0 0;
		}
	</style>

	<!--Google analytics-->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-2627567-53', 'auto');
		ga('send', 'pageview');
	</script>

	<!-- jQuery -->
	<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>
<body>
<h1>駒瑠市〜アクセシビリティ上の問題の体験サイト〜</h1>

<ul>
	<li>意図的なアクセシビリティ上の問題を仕込んだサイトを生成します</li>
	<li>JIS X 8341-3:2016やWCAGの勉強に使ってもらっても良いですし、「困ったサイト」のサンプルとしてお使いいただいても構いません</li>
	<li>以下の「障壁（バリア）の設定」から、サイトの生成に進むことができます</li>
	<li>フォームの送信後のページなど、対象外の箇所には「試験対象外」というテキストが付与されています</li>
	<li>無料でお使いいただけます</li>
</ul>

<h2>障壁（バリア）の設定</h2>

<h3>プリセット版 駒瑠市</h3>
<p>問題をあらかじめ設定（プリセット）した駒瑠市サイトです。カスタマイズ版にのみ存在する障壁もあります。</p>

<?php
$presets = \Kontiki\Util::s(\Komarushi\Main::$message_presets);
$preset_html = '';
$preset_html.= '<ul id="preset">';
foreach ($presets as $k => $v):
	if ($k[0] == '_') continue;
	$preset_html.= '<li><a href="practice/?preset='.\Kontiki\Util::s($k).'">'.$v[0].'</a><p>'.$v[1].'</p></li>';
endforeach;
$preset_html.= '</ul>';
echo $preset_html;
?>

<h3>カスタマイズ版 駒瑠市</h3>

<ol>
	<li>サイトに実装する障壁の設定を行います。ランダムな問題生成か個別指定を選んでください</li>
	<li>「障壁パターンコードを生成」のボタンを押すと、障壁パターンコードがこのページのtextareaに出力されます</li>
	<li>「サイトを生成する」を押すことで、設定に応じたサイトが生成されます</li>
	<li>設定したバリアを使いまわしたい時には、この障壁パターンコードを保存しておいてください。ふたたびこのページのtextareaに貼付することで、おなじ障壁を再現できます</li>
	<li>開発中のサービスですので、バリアの種類や箇所は随時変更があります。障壁パターンコードがうまく機能しなくなった場合は、障壁パターンコードを再生成してください</li>
</ol>

<form action="" method="POST">
<?php $ng_checked = \Kontiki\Input::post('code_type') != 'individual' ? ' checked="checked"' : ''; ?>
<label><input type="radio" name="code_type" value="ng"<?php echo $ng_checked ?>> アクセシビリティ上のランダムな問題を含んだ障壁パターンコードを生成</label>

<details id="individual_set">
<summary tabindex="-1"><label><input type="radio" name="code_type" value="individual"> 障壁を個別に指定する</label></summary>
<?php

$criteria_path = __DIR__.'/resources/criteria.json';
$criteria = file_exists($criteria_path) ?
					json_decode(file_get_contents($criteria_path), true) :
					array();

$html = '';
$patterns = \Kontiki\Util::s(\Komarushi\Main::$message_patterns);
$prev_criterion = '';

foreach ($patterns as $cat => $messages):
	$criterion = preg_replace("/[a-z]/", "", $cat);
	$is_critreion_open = $prev_criterion != $criterion;

	if ($is_critreion_open && isset($criteria[$criterion])):
		if ( ! empty($prev_criterion)):
			$html.= '</ul>';
			$html.= '</fieldset>';
		endif;

		$html.= '<fieldset>';
		$html.= '<legend>'.$criterion.' '.$criteria[$criterion]['name'].'</legend>';
		$html.= '<ul>';
	endif;

	$html.= '<li>'.$cat.'<ul>';
	$n = 0;
	foreach ($messages as $file => $message):
		$checked = $n == 0 ? ' checked="checked"' : '';
		$n++;
		$cat4post = str_replace('.', '_', $cat);
		$html.= '<li><label><input'.$checked.' type="radio" name="'.$cat4post.'" value="'.$file.'">';
//		$status = strpos($file, 'ok') !== false ? 'OK' : 'NG';
		$status = \Kontiki\Util::s(strtoupper($file));
		$html.= $status.': '.$message.'</label></li>';
	endforeach;
	$html.= '</ul></li>';

	$prev_criterion = $criterion;

endforeach;

$html.= '</ul>';
$html.= '</fieldset>';

echo $html;
?>
</details>


<p><input type="submit" name="gen_test_pattern_code" value="障壁パターンコードを生成"></p>
</form>

<h4 id="test-pattern-str-exists">障壁パターンコードがある場合</h4>
<form action="" method="POST">
<?php if (empty($test_pattern_str)): ?>
<p><label for="test_pattern_code">障壁パターンコードを入力してください</label></p>
<?php else: ?>
<p><label for="test_pattern_code">「サイトを生成する」を押してください</label></p>
<?php endif; ?>
<textarea name="test_pattern_code" id="test_pattern_code" cols="35" rows="7"><?php echo $test_pattern_str ?></textarea>
<p><input type="submit" value="サイトを生成する"></p>
</form>

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

<h2 id="customize-by-url">URLによるカスタマイズ</h2>

<p><code>?criteria=</code>の形式のURLを使うことで、個別に障壁や達成事例を設定できます。<code>criteria</code>が受け付けるのは、以下のような形式です。</p>

<ul>
	<li><a href="./practice/?criteria=2.2.2">2.2.2全般の不具合を確認する（?criteria=2.2.2）</a></li>
	<li><a href="./practice/register.php?criteria=2.2.1a_ok2">簡単な操作で制限時間を延長できる（?criteria=2.2.1a_ok2）</a></li>
	<li><a href="./practice/register.php?criteria=3.3.1a_ok,3.3.3a_ng">エラーの特定ができるが、エラー修正の提案ができていない（?criteria=3.3.1a_ok,3.3.3a_ng）</a></li>
</ul>

<h2>注意事項</h2>
<ul>
	<li>このサイトは「架空の地方自治体（駒瑠市・こまるし）のとある課のサイト」という設定でできています</li>
	<li>サイトには意図的にアクセシビリティ上の問題が仕込んであります。利用には不快感を伴うことがあります</li>
	<li>PDFによる情報提供が存在します。当然ながらHTMLで情報提供した方が良いのですが、このサイトでは、「『お知らせ』はPDFによる添付しかできない困ったCMSを使っている」というような設定だとご理解ください</li>
	<li>ブラウザで音声の自動再生をオフにしている場合で、自動再生の不具合を確認したい場合は、ブラウザの設定を調整してください</li>
	<li>「障壁の設定」では便宜上達成基準の番号ごとのまとまりを持っていますが、システムの都合上、必ずしもバリアの内容と達成基準の番号は一致しません</li>
	<li>現時点では、障壁はWCAG 2.0 AA（ダブルA）までの問題を実装しています</li>
	<li>意図的にアクセシビリティ上の問題を生成するため、HTMLの文法に誤った箇所が含まれている場合があります。「4.1.1 構文解析」に関しては、対象としないようにしてください</li>
	<li>いくつかの達成基準の項目について、障壁が実装されていないものがありますが、「2.3.1 3回の閃光又は閾値以下」の障壁については、将来的にも実装の予定はありません</li>
	<li>現在も制作を続けておりますので、バグが含まれている可能性があることをご了承ください</li>
</ul>

<h2>問い合わせ等</h2>
<ul id="readme_vendor">
	<li><a href="https://www.jidaikobo.com"><img src="./images/logo_author.png" class="a11yc_logo_author" alt="ロゴマーク">有限会社時代工房</a></li>
	<li><a href="https://twitter.com/jidaikobo"><img src="./images/Twitter_Logo_Blue.png" class="a11yc_logo_author" alt="Twitter Logo">時代工房のTwitter</a></li>
</ul>

<h2>Google Analyticsについて</h2>
<p>このページのみ、<a href="https://marketingplatform.google.com/intl/ja/about/analytics/">Google Analytics</a>をつかってアクセス解析を行っています</p>

<footer>
制作：<a href="https://www.jidaikobo.com">有限会社時代工房</a><br>
ライセンス：<a href="https://github.com/jidaikobo-shibata/city-komaru/blob/master/LICENSE.txt">MIT</a><br>
動画・GIFアニメ作成協力：<a href="http://functiontales.com">FUNCTION TALES</a><br>
使っている音源は<a href="https://www.zapsplat.com">https://www.zapsplat.com</a>で取得しました。<br>
不具合報告協力：<a href="https://twitter.com/momdo_">@momdo_</a>
</footer>
</body>
</html>
