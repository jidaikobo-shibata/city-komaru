<?php require ('../init.php'); ?><!DOCTYPE html>
<?php echoPracticeHtml('3.1.1')  ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php echoPracticeHtml('2.4.2') ?>
	<style>
<?php echoPracticeHtml('2.4.7') ?>
	</style>
</head>
<body>
<div id="outer-wrapper">
<div id="wrapper">
<div>
	<div id="utilities">
	<?php echoPracticeHtml('2.4.1') ?>
	<?php echoPracticeHtml('2.1.2') ?>
	</div>
	<h1><?php echoPracticeHtml('1.1.1b') ?> 地球温暖化防止課</h1>
	<?php echoPracticeHtml('3.2.3') ?>
</div>
<p>カルーセルだったり、なかったり。</p>
<main id="main">
<div id="toppage-image" class="full-width">
	<img src="./images/main-image1-alt.jpg" class="main-image" alt="〜すべての人にやさしいまちづくりを〜 持続可能な社会の実現に向け、気候変動問題への対応、廃棄物対策、生物多様性の保全などさまざまな取組を行っています。">
</div>
<div id="toppage-message">
	<div class="image"><img src="./images/mascot-chikyu-kun.png" width="153" alt="ちきゅうくん"></div>
	<?php echoPracticeHtml('2.2.2b') ?>
 	<div class="image"><img src="./images/mascot-komaru-kun.png" width="138" alt="こまるくん"></div>
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
