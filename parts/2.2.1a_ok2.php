<?php /* 簡単な方法で制限時間を延長できるフォーム */ ?>
<script>
const timeout_val = 10000,
			new_area = $('#new-area'),
			renew_area = $('#renew-area');
var timeout = function() {
				var response = window.confirm('入力時間が切れました。制限時間を延長しますか？');
				if( ! response ){
					document.registration.reset();
					if( $(new_area, renew_area).is(':hidden') ){
						renew_area.hide();
						new_area.show();
					}
				}
				setTimeout(timeout, timeout_val);
}
setTimeout(timeout, timeout_val);
</script>
