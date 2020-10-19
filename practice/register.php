<?php require ('../functions/init.php'); ?><!DOCTYPE html>
<?php echoPracticeHtml('3.1.1') ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php echoPracticeHtml('2.4.2') ?>
</head>
<body class="register">
<?php echoPracticeHtml('1.4.2') ?>
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
<div class="inner-wrapper">
	<div id="utilities">
	<?php echoPracticeHtml('2.4.1') ?>
	<?php echoPracticeHtml('2.4.5') ?>
	<?php echoPracticeHtml('2.1.2') ?>
	</div>
	<div id="logo"><a href="./"><?php echoPracticeHtml('1.1.1b') ?> 地球温暖化防止課</a></div>
	<div id="menu">
		<?php echoPracticeHtml('3.2.3') ?>
		<nav id="langage-nav">
			<button type="button" class="bttn-menu bttn" id="bttn-lang" aria-expanded="false" aria-controls="lang-menu" title="Language"><span class="fa fa-globe" aria-hidden="true"></span><span class="visually-hidden" lang="en">Language</span></button>
			<div id="wrapper-lang-menu" class="wrapper-menu">
				<ul id="lang-menu" class="menu-list" style="display:none">
					<?php echoPracticeHtml('3.1.2a') ?>
				</ul>
			</div>
		</nav>
		<?php echoPracticeHtml('2.1.1a') ?>
		<?php echoPracticeHtml('2.4.3') ?>
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
<p>「駒留市エコサポーター」に登録いただくと、駒留市の環境教育イベントの開催のお知らせや会員限定のイベントへの参加をできるようになります。</p>
<p>収集する個人情報は、駒留市エコサポーターの活動の目的以外では利用されません。駒留市の<a href="./do-not-test.php">個人情報保護方針</a>をご覧ください。</p>

<form action="./do-not-test.php" method="POST" name="registration" id="form-registration">

<fieldset id="select-registration-type" class="clearfix">
<legend class="visually-hidden">種別の選択</legend>
<input type="radio" name="type" id="registration-new" value="new" data-target="new-area" checked="checked" /><label for="registration-new">新規登録</label>
<input type="radio" name="type" id="registration-renew" value="renew" data-target="renew-area" /><label for="registration-renew">登録内容変更</label>
</fieldset>
<?php echoPracticeHtml('1.4.1a') ?>

<?php echoPracticeHtml('3.2.1', 'register') ?>

<input type="submit" value="送信" />
</form>
<script>
jQuery (function($){
	let area_show = $('#new-area'),
			area_hide = $('#renew-area');
	const areas = area_show.add(area_hide);
	toggle_area();
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
	}
});
</script>
<?php echoPracticeHtml('2.2.1a') ?>

</div>
</main>

<?php include(__DIR__.'/inc_footer.php'); ?>
