<?php
/* CO₂カウンタの自動更新を止められない */
komaruHtml('1.4.3'); // コントラスト問題
?>
<div id="co2aday-wrapper">
<span id="co2aday"></span><span class="unit">t</span>
</div>
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
