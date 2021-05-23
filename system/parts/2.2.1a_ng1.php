<?php /* むりやり時間切れするフォーム */ ?>
<script>
const timeout_val = 2 * 60 * 1000;
var timeout = function() {
				alert('入力時間が切れました');
				document.registration.reset();
				$('#form-registration :input').removeAttr('disabled');
				setTimeout(timeout, timeout_val);
}
setTimeout(timeout, timeout_val);
</script>
