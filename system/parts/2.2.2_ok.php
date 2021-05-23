<?php /* CO₂カウンタの自動更新を止めるボタンがあり機能する */ ?>
<?php
komaruHtml('1.4.3'); // コントラスト問題
?>
<div id="co2aday-wrapper">
<span id="co2aday"></span><span class="unit">t</span>
</div>
<div id="co2aday-button-area" class="clearfix"><a href="javascript:void(0)" onclick="ctrl_auto_updating()" id="co2aday-button"><span class="fa fa-pause" aria-hidden="true"></span><span class="visually-hidden" id="co2aday-button-label">一時停止</span></a></div>

<script>
var date = new Date();
var co2 = date.getHours() < 12 ? 2000 : 6000;
$('#co2aday').html(co2.toLocaleString());

var countup = function() {
	co2++;
	if ($('#co2aday-button span').hasClass('fa-pause')) {
		$('#co2aday').html(co2.toLocaleString());
	}
}
setInterval(countup, 1000);
</script>

<script>
function ctrl_auto_updating ()
{
	if ($('#co2aday-button span').hasClass('fa-pause')) {
		$('#co2aday-button span').removeClass('fa-pause');
		$('#co2aday-button span').addClass('fa-play');
		$('#co2aday-button-label').html('再生');
	} else {
		$('#co2aday-button span').removeClass('fa-play');
		$('#co2aday-button span').addClass('fa-pause');
		$('#co2aday-button-label').html('一時停止');
	}
}
</script>
