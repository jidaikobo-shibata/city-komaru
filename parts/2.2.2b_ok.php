<style>
#toppage-message .text .marquee {
	display: block;
	animation-name: marquee;
	animation-duration: 12s;
	animation-timing-function: linear;
	animation-iteration-count: infinite;

	-webkit-animation-name: marquee;
	-webkit-animation-duration: 12s;
	-webkit-animation-timing-function: linear;
	-webkit-animation-iteration-count: infinite;

	-ms-animation-name: marquee;
	-ms-animation-duration: 12s;
	-ms-animation-timing-function: linear;
	-ms-animation-iteration-count: infinite;

	-moz-animation-name: marquee;
	-moz-animation-duration: 12s;
	-moz-animation-timing-function: linear;
	-moz-animation-iteration-count: infinite;

	-o-animation-name: marquee;
	-o-animation-duration: 12s;
	-o-animation-timing-function: linear;
	-o-animation-iteration-count: infinite;
}
@keyframes marquee {
	from {
		margin-left: 100%;
	}
	to {
		margin-left: -150%;
	}
}
#toppage-message .text.pause .marquee {
  animation-play-state: paused;
}

#toppage-message .bttn {
	position: absolute;
	right: 14px;
	top: 50%;
	transform: translateY(-50%);
	padding: 6px 8px;
}
#toppage-message .fa::before {
	content: "\f04c";
}
#toppage-message .pause .fa::before {
	content: "\f04b";
}
#toppage-message .text:not(.pause) .bttn .play,
#toppage-message .text.pause .bttn .stop {
	display: none;
}
</style>
 	<div class="text">
			<p class="inner-text"><span class="marquee">こんにちは！駒留市の地球温暖化防止課のこまるだよ！駒留市では2020年7月1日からレジ袋有料サービスがスタートしたよ！</span></p>
			<button type="button" id="message-bttn" class="bttn"><span aria-hidden="true" class="fa"></span><span class="visually-hidden">スクロール</span><span class="visually-hidden stop">一時停止</span><span class="visually-hidden play">再開</span></button>
		</div>
<script>
jQuery(function($){
  var bttn = $('#message-bttn'),
      parent = bttn.closest('.text');
  bttn.on('click', function(){
    parent.toggleClass('pause');
  });
});
</script>
