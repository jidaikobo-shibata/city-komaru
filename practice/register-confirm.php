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
	</div>
	<div id="logo"><a href="./<?php echo \Komarushi\Main::modeString() ?>"><?php komaruHtml('1.1.1b') ?></a> 地球温暖化防止課</div>
</div>
</header>
<main id="main">
<div id="page-header" class="full-width">
	<div class="inner-wrapper">
		<h1 class="heading">会員登録 - 登録内容の確認</h1>
	</div>
</div>

<div class="inner-wrapper">

<h2>登録内容の確認</h2>

<p>登録内容の確認を行います。確認をお願いします。</p>

<form action="./register-complete.php" method="POST" name="registration" id="form-registration">

<input type="hidden" name="preset" value="<?php echo \Kontiki\Util::s(filter_input(INPUT_GET, 'preset')) ?>" />
<input type="hidden" name="criteria" value="<?php echo \Kontiki\Util::s(filter_input(INPUT_GET, 'criteria')) ?>" />

<?php komaruHtml('1.4.1a') ?>

<p><label for="zip">郵便番号</label><br />
<input type="text" id="zip" name="zip" size="8" autocomplete="postal-code"  /></p>

<p><label for="state">都道府県:</label><br />
<input type="text" id="state" name="state" size="8" autocomplete="address-level1" required></p>

<p><label for="city">市区町村:</label><br />
<input type="text" id="city" name="city" autocomplete="address-level2" required></p>

<p><label for="street-address">住所（丁目・番地）:</label><br />
<input type="text" id="street-address" name="street-address" autocomplete="street-address" required></p>



<input type="submit" value="登録"<?php komaruHtml('3.3.4a') ?> />
</form>

</div>
</main>

<?php include(__DIR__.'/inc_footer.php'); ?>
