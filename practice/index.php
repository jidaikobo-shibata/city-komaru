<?php require ('../functions/init.php'); ?><!DOCTYPE html>
<?php echoPracticeHtml('3.1.1')  ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php echoPracticeHtml('2.4.2') ?>
	<style>
<?php echoPracticeHtml('2.4.7') ?>
	</style>
</head>
<body class="toppage">
<?php echoPracticeHtml('1.4.2') ?>
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
	<div id="utilities">
	<?php echoPracticeHtml('2.4.1b') ?>
	<?php echoPracticeHtml('2.4.5') ?>
	</div>
	<h1 id="logo"><?php echoPracticeHtml('1.1.1b') ?> 地球温暖化防止課</h1>
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
</header>
<main id="main">
<div id="toppage-image" class="full-width">
<?php echoPracticeHtml('2.1.1b') ?>
</div>
<div id="toppage-message">
	<div class="image"><img src="./images/mascot-chikyu-kun.png" width="153" height="184" alt="ちきゅうくん"></div>
	<?php echoPracticeHtml('2.2.2b') ?>
 	<div class="image"><img src="./images/mascot-komaru-kun.png" width="138" height="184" alt="こまるくん"></div>
</div>

<div id="toppage-news">
<h2 class="heading">お知らせ</h2>
<div class="content">
	<ul class="news-list">
		<li><?php echoPracticeHtml('1.3.1d') ?></li>
	</ul>
</div>
</div>

<div id="toppage-top">
	<?php echoPracticeHtml('1.3.1c') ?>
</div>

<div id="toppage-bottom" class="full-width">
	<div id="toppage-bottom-inner" class="inner-wrapper">
		<section id="contact-us-area">
		<h2>問い合わせフォーム</h2>
		<p>駒留市の温暖化防止の取り組みについてのお問い合わせはこちらのフォームからお寄せください。</p>
		<?php echoPracticeHtml('3.3.2') ?>
		</section>

		<section id="co2aday-area">
		<h2>駒留市の本日のCO<sub>2</sub>排出量</h2>
		<?php echoPracticeHtml('2.2.2') ?>
		<?php echoPracticeHtml('1.4.5') ?>
		</section>
	</div>
</div>
</main>
<?php include(__DIR__.'/inc_footer.php'); ?>
