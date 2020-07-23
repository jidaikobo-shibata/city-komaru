<?php
echoPracticeHtml('1.4.3', '', 'index');

// 人口70万人都市の年間CO2排出量が5,332,000,000kgだったので、駒留市の人口を半分とし、356で割った数字を基本とした。
?>
<div id="co2aday-wrapper">
<span id="co2aday"></span><span class="unit">t</span>
</div>
<?php echoPracticeHtml('2.2.2a', '', 'index');  ?>
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
