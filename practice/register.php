<?php require ('../system/init.php'); ?><!DOCTYPE html>
<?php komaruHtml('3.1.1a') ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php komaruHtml('2.4.2a') ?>
</head>
<body class="register">
<?php komaruHtml('1.4.2a') ?>
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
<div class="inner-wrapper">
	<div id="utilities">
	<?php komaruHtml('2.4.1a') ?>
	<?php komaruHtml('2.4.5a') ?>
	</div>
	<div id="logo"><a href="./<?php echo \Komarushi\Main::modeString() ?>"><?php komaruHtml('1.1.1b') ?> 地球温暖化防止課</a></div>
	<div id="menu">
		<?php komaruHtml('3.2.3a') ?>
		<nav id="langage-nav">
			<button type="button" class="bttn-menu bttn" id="bttn-lang" aria-expanded="false" aria-controls="lang-menu" title="Language"><span class="fa fa-globe" aria-hidden="true"></span><span class="visually-hidden" lang="en">Language</span></button>
			<div id="wrapper-lang-menu" class="wrapper-menu">
				<ul id="lang-menu" class="menu-list" style="display:none">
					<?php komaruHtml('3.1.2a') ?>
				</ul>
			</div>
		</nav>
		<?php komaruHtml('2.1.1a') ?>
		<?php komaruHtml('2.4.3a') ?>
	</div>
</div>
</header>
<main id="main">
<div id="page-header" class="full-width">
	<div class="inner-wrapper">
		<h1 class="heading">会員登録</h1>
	</div>
</div>

<div class="inner-wrapper">

<h2>駒瑠市市長からのご挨拶</h2>

<audio src="./audio/greeting.mp3" controls></audio>
<?php komaruHtml('1.2.1a') ?>
<?php komaruHtml('1.4.5b') ?>

<h2>駒瑠市エコサポーター</h2>

<p>「駒瑠市エコサポーター」に登録いただくと、駒瑠市の環境教育イベントの開催のお知らせや会員限定のイベントへの参加ができるようになります。</p>
<p>収集する個人情報は、駒瑠市エコサポーターの活動の目的以外では利用されません。駒瑠市の<a href="./do-not-test.php">個人情報保護方針</a>をご覧ください。</p>

<?php
// 値の保存
$vals = include('./register-vals.php');

// エラーメッセージ
$errors = [];
if (isset($_COOKIE['errors']))
{
	$errors = json_decode($_COOKIE['errors'], true);
	$errors = is_array($errors) ? $errors : [];
}

$err_html = '';
if ( ! empty($errors))
{
	foreach ($errors as $k => $v)
	{
		if (empty($v)) continue;
		$is_331_ok = isset(\Komarushi\Main::$test_pattern['3.3.1a']) ?
						 \Komarushi\Main::$test_pattern['3.3.1a'] :
						 'ok' ;
		$err_html.= '<li>';
		$err_html.= $is_331_ok === 'ok2' ? '<a href="#'.$k.'">' : '';
		$err_html.= $v;
		$err_html.= $is_331_ok === 'ok2' ? '</a>' : '';
		$err_html.= '</li>';
		if (strpos($is_331_ok, 'ng') !== false) break; // 「エラーの特定」が妥当でないため、エラーの数も伝えないようにしている
	}
	$err_html = empty($err_html) ? '' : '<div id="error_exists"><h3>エラーがあります</h3><ul>'.$err_html.'</ul></div>';
}
echo $err_html;
?>

<form action="./register-post.php" method="POST" name="registration" id="form-registration">
<fieldset id="select-registration-type" class="clearfix">
<?php
$checked = ' checked="checked"';
$is_type_new = $vals['type'] === 'new' || empty($vals['type']) ? $checked : '';
$is_type_renew = $vals['type'] === 'renew' ? $checked : '';
?>
<legend class="visually-hidden">種別の選択</legend>
<input type="radio" name="type" id="registration-new" value="new" data-target="new-area" <?php echo $is_type_new; ?> /><label for="registration-new">新規登録</label>
<input type="radio" name="type" id="registration-renew" value="renew" data-target="renew-area" <?php echo $is_type_renew; ?> /><label for="registration-renew">登録内容変更</label>
</fieldset>
<?php komaruHtml('1.4.1a') ?>

<p><label for="registration-captcha">画像に表示されている文字を入力してください。</label><br>
<img src="./images/captcha.png" width="300" height="80" alt="画像"><br>
<input type="text" name="captcha" size="12" id="registration-captcha" aria-describedby="registration-captcha-description" value="<?php echo $vals['registration-captcha']; ?>"> <span id="registration-captcha-description"><br>大文字小文字は区別されません。</span>
</p>
<input type="hidden" name="preset" value="<?php echo \Kontiki\Util::s(filter_input(INPUT_GET, 'preset')) ?>" />
<input type="hidden" name="criteria" value="<?php echo \Kontiki\Util::s(filter_input(INPUT_GET, 'criteria')) ?>" />

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信"<?php komaruHtml('3.3.4a') ?> />
</form>
<script>
jQuery (function($){
	// toggle area
	let area_show = $('#new-area'),
			area_hide = $('#renew-area'),
			flg = false;
	const areas = area_show.add(area_hide);
	toggle_area();
<?php komaruHtml('3.2.2a') ?>
	$('input[name=type]').change(function(){
		toggle_area($('#'+$(this).data('target')));
	});
	function toggle_area(target){
		if( target ) {
			area_show = target;
			area_hide = areas.not(target);
		}
		area_show.show().find(':input').removeAttr('disabled');
		area_hide.hide().find(':input').attr('disabled', true);

		if(flg){
			area_show.find(':input:visible').eq(0).focus();
		}
	}
});
</script>
<?php komaruHtml('2.2.1a') ?>

</div>
</main>

<?php include(__DIR__.'/inc_footer.php'); ?>
