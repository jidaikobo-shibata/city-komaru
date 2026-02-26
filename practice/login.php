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
	<a href="./login.php<?php echo \Komarushi\Main::modeString() ?>">会員ログイン</a>
	<?php komaruHtml('2.4.5a') ?>
	</div>
	<div id="logo"><a href="./<?php echo \Komarushi\Main::modeString() ?>"><?php komaruHtml('1.1.1b') ?></a> 地球温暖化防止課</div>
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
		<h1 class="heading">会員ログイン</h1>
	</div>
</div>

<div class="inner-wrapper">

<h2>駒瑠市エコサポーター ログイン</h2>
<p>会員向けサービスを利用するにはログインが必要です。</p>

<?php
$your_id = \Kontiki\Util::s(filter_input(INPUT_GET, 'your-id'));
$is_redundant = \Komarushi\Main::getBarrierStatus('3.3.7a') === 'ng';
$id_disabled = ! $is_redundant && ! empty($your_id);
$id_value = $id_disabled ? $your_id : '';
$id_note = $id_disabled ? '<p>登録内容変更のため、会員IDは引き継がれています。</p>' : '';
?>
<?php echo $id_note; ?>

<form action="./do-not-test.php" method="POST" id="form-login">
	<input type="hidden" name="preset" value="<?php echo \Kontiki\Util::s(filter_input(INPUT_GET, 'preset')) ?>" />
	<input type="hidden" name="criteria" value="<?php echo \Kontiki\Util::s(filter_input(INPUT_GET, 'criteria')) ?>" />

	<p><label for="login-id">会員ID</label><br />
	<input type="text" name="login-id" id="login-id" size="20" autocomplete="username" value="<?php echo $id_value ?>"<?php echo $id_disabled ? ' disabled="disabled"' : '' ?> required />
	<?php if ($id_disabled): ?>
	<input type="hidden" name="login-id" value="<?php echo $id_value ?>" />
	<?php endif; ?>
	</p>

	<p><label for="login-password">パスワード</label><br />
	<input type="password" name="login-password" id="login-password" size="20" autocomplete="current-password" required /></p>

	<?php komaruHtml('3.3.7a') ?>
	<?php komaruHtml('3.3.8a') ?>

	<input type="submit" value="ログイン" />
</form>

</div>
</main>

<?php include(__DIR__.'/inc_footer.php'); ?>
