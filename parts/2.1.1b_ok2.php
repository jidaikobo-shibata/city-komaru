<?php /* altが妥当でキーボード操作可能なスライドショー */ ?>
	<div id="main-slide">
		<div id="slide-utilities">
			<button type="button" id="slide-prev" class="bttn slide-ctrl"><span class="visually-hidden">前のスライド</span></button>
			<button type="button" id="slide-next" class="bttn slide-ctrl"><span class="visually-hidden">次のスライド</span></button>
<?php echoPracticeHtml('2.2.2c', '', 'index') ?>
		</div>
		<div id="slide-wrapper">
			<img src="./images/main-image-2_a.jpg" class="main-image" alt="スライド１：「すべての人にやさしいまちづくりを」持続可能な社会の実現に向け、気候変動問題への対応、廃棄物対策、生物多様性の保全など、さまざまな取組を行っています。" width="1366" height="520">
			<img src="./images/main-image-2_b.jpg" class="main-image" alt="スライド２：「未来の笑顔のために」市民一人一人の小さな取り組みが、未来の笑顔につながっています。今、あなたにできることからはじめてみましょう！" width="1366" height="520">
			<img src="./images/main-image-2_c.jpg" class="main-image" alt="画像３" width="1366" height="520">
		</div>
	</div>
<script>
jQuery(function($){
	const interval      = 5000,
				speed         = 500,
				slide_wrapper = $('#slide-wrapper'),
				bttn_slide    = $('#slide-utilities').find('.slide-ctrl'),
				bttn_play     = $('#slide-play');
	let slides = slide_wrapper.find('.main-image'),
			current = slides.eq(0),
			flg = false,
			flg_pause = false,
			dir = false,
			timeoutID;
	slide_wrapper.prepend(slides.not(current).clone()).append(current.clone());
	slides = slide_wrapper.find('.main-image');
	slides.not(current).attr({'aria-hidden':true});
	slide_wrapper.addClass('on');
	timeoutID = setTimeout(() => {slide_play()}, interval);

	bttn_slide.on('click', slide_play);
	bttn_play.on('click', toggle_play);

	function slide_play(){
		let is_slide_ctrl = event && $(event.target).hasClass('slide-ctrl');
		if( (flg_pause && ! is_slide_ctrl) || ( ! flg_pause && flg) ) return;
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

		clearTimeout(timeoutID);
		timeoutID = setTimeout(() => {slide_play()}, interval);
	}
	function toggle_play(){
		bttn_play.toggleClass('bttn-play fa-play bttn-pause fa-pause');
		flg_pause = bttn_play.hasClass('bttn-play');
		if(! flg_pause){
			slide_play()
		}
	}
});
</script>
