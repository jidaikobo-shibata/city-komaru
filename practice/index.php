<?php require ('../system/init.php'); ?><!DOCTYPE html>
<?php komaruHtml('3.1.1a')  ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php komaruHtml('2.4.2a') ?>
</head>
<body class="toppage">
<?php komaruHtml('1.4.2a') ?>
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
	<div id="utilities">
	<?php komaruHtml('2.4.1b') ?>
	<?php komaruHtml('2.4.5a') ?>
	</div>
	<h1 id="logo"><?php komaruHtml('1.1.1b') ?> 地球温暖化防止課</h1>
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
</header>
<main id="main">
<div id="toppage-image" class="full-width">
<?php komaruHtml('2.1.1b') ?>
</div>
<div id="toppage-message">
	<div class="image"><img src="./images/mascot-chikyu-kun.png" width="153" height="184" alt="ちきゅうくん"></div>
	<?php komaruHtml('2.2.2b') ?>
 	<div class="image"><img src="./images/mascot-komaru-kun.png" width="138" height="184" alt="こまるくん"></div>
</div>

<div id="toppage-news">
<h2 class="heading">お知らせ</h2>
<div class="content">
	<ul class="news-list">
		<li><?php komaruHtml('1.3.1d') ?></li>
	</ul>
</div>
</div>

<div id="toppage-top">
	<?php komaruHtml('1.3.1c') ?>
</div>

<div class="movie"><?php komaruHtml('1.2a') ?></div>

<div id="toppage-bottom" class="full-width">
	<div id="toppage-bottom-inner" class="inner-wrapper">
		<section id="contact-us-area">
			<div class="content">
				<h2>問い合わせフォーム</h2>
			 	<p>駒瑠市の温暖化防止の取り組みについてのお問い合わせはこちらのフォームからお寄せください。</p>
		<?php komaruHtml('3.3.2a') ?>
			 </div>
		</section>

		<section id="co2aday-area">
			<div class="content">
				<h2>駒瑠市の本日のCO<sub>2</sub>排出量</h2>
				<?php komaruHtml('2.2.2a') ?>
				<?php komaruHtml('1.4.5a') ?>
			</div>
		</section>
	</div>
</div>
</main>
<?php include(__DIR__.'/inc_footer.php'); ?>
