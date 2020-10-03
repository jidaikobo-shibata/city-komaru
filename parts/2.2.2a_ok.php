<?php /* 自動更新を止めるボタン */ ?>
<div id="co2aday-button-area" class="clearfix"><a onclick="ctrl_auto_updating()" id="co2aday-button"><span class="fa fa-pause" aria-hidden="true"></span><span class="visually-hidden" id="co2aday-button-label">一時停止</span></a></div>
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
