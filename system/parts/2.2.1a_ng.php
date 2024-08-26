<?php /* むりやり時間切れするフォーム */ ?>
<script>
const timeout_val = 2 * 60 * 1000,
			new_area = $('#new-area'),
			renew_area = $('#renew-area');
var timeout = function() {
				alert('入力時間が切れました');
//					document.registration.reset();
				$(document.registration).find("textarea, :text, select").val("").end().find(":checked").prop("checked", false);
				$('#registration-new').prop("checked", true);
				renew_area.hide().find(':input').attr('disabled', true);
				new_area.show().find(':input').removeAttr('disabled');
				setTimeout(timeout, timeout_val);
}
setTimeout(timeout, timeout_val);
</script>
