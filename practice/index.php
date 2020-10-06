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
<div>
	<div id="utilities">
	<?php echoPracticeHtml('2.4.1') ?>
	<?php echoPracticeHtml('2.1.2') ?>
	</div>
	<h1 id="logo"><?php echoPracticeHtml('1.1.1b') ?> 地球温暖化防止課</h1>
	<?php echoPracticeHtml('3.2.3') ?>
	<?php echoPracticeHtml('2.1.1a') ?>
	<?php echoPracticeHtml('2.4.3') ?>
<main id="main">
<div id="toppage-image" class="full-width">
<?php // echoPracticeHtml('2.1.1b') ?>
	<div id="main-slide">
		<div id="slide-utilities">
			<button type="button" id="slide-prev" class="bttn slide-ctrl"><span class="visually-hidden">前のスライド</span></button>
			<button type="button" id="slide-next" class="bttn slide-ctrl"><span class="visually-hidden">次のスライド</span></button>
			<button type="button" id="slide-play" class="bttn bttn-pause fa fa-pause"><span class="visually-hidden pause">一時停止</span><span class="visually-hidden play">再生</span></button>
		</div>
		<div id="slide-wrapper">
			<img src="./images/main-image-2_a.jpg" class="main-image" alt="スライド１：「すべての人にやさしいまちづくりを」持続可能な社会の実現に向け、気候変動問題への対応、廃棄物対策、生物多様性の保全など、さまざまな取組を行っています。" width="1366" height="520">
			<img src="./images/main-image-2_b.jpg" class="main-image" alt="画像２" width="1366" height="520">
			<img src="./images/main-image-2_c.jpg" class="main-image" alt="画像３" width="1366" height="520">
		</div>
	</div>
<script>
jQuery(function($){
	const interval      = 7000,
				speed         = 500,
				slide_wrapper = $('#slide-wrapper'),
				bttn_slide    = $('#slide-utilities').find('.slide-ctrl'),
				bttn_play     = $('#slide-play');
	let slides = slide_wrapper.find('.main-image'),
			current = slides.eq(0),
			flg = false,
			dir = false,
			timeoutID;
	slide_wrapper.prepend(slides.not(current).clone()).append(current.clone());
	slides = slide_wrapper.find('.main-image');
	slides.not(current).attr({'aria-hidden':true});
	slide_wrapper.addClass('on');

	timeoutID = setTimeout(() => {slide_play()}, interval);
	bttn_slide.on('click', slide_play);

	bttn_play.on('click', function(){
		$(this).toggleClass('bttn-play fa-play bttn-pause fa-pause');
		flg = $(this).hasClass('bttn-play');
		if(! flg){
			slide_play()
		}
	});

	function slide_play(){
		if(flg) return;
		flg = true;
		dir = event && event.target.id == 'slide-prev';
		slides.css({
			transform : 'translate3d('+(dir ? '' : '-')+'100%, 0, 0) ',
			transition: 'transform '+speed+'ms ease-out'
		});
		setTimeout(function(){
			slides.css({transition: 'transform 0s'})
			if(dir){
				slides.eq(-1).prependTo(slide_wrapper);
				current = slides.eq(slides.index(current)-1);
			}else{
				slides.eq(0).appendTo(slide_wrapper);
				current = slides.eq(slides.index(current)+1);
			}
			slides = slide_wrapper.find('.main-image').css({transform: 'translate3d(0,0,0)'}).attr({'aria-hidden':true});
			current.removeAttr('aria-hidden');
			flg = false;
		}, speed);

		// for autoplay
		if(!(event && $(event.target).hasClass('.slide-ctrl'))){
			clearTimeout(timeoutID);
			timeoutID = setTimeout(() => {slide_play()}, interval);
		}
	}
});
</script>
</div>
<div id="toppage-message">
	<div class="image"><img src="./images/mascot-chikyu-kun.png" width="153" height="184" alt="ちきゅうくん"></div>
	<?php echoPracticeHtml('2.2.2b') ?>
 	<div class="image"><img src="./images/mascot-komaru-kun.png" width="138" height="184" alt="こまるくん"></div>
</div>

<div id="toppage-news">
<ul>
	<li><?php echoPracticeHtml('1.3.1d') ?></li>
</ul>
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
