<?php /* ポインタのダウンで即送信（トップページの送信フォームのボタン） */ ?>
<script>
	(function() {
		function bindPointerCancellationBarrier() {
			var form = document.getElementById('komaru-contact-form');
			if (!form) return;
			var submit = form.querySelector('input[type="submit"], button[type="submit"]');
			if (!submit) return;

			var handler = function(event) {
				if (event && event.preventDefault) event.preventDefault();
				form.submit();
			};

			submit.addEventListener('pointerdown', handler);
			submit.addEventListener('mousedown', handler);
			submit.addEventListener('touchstart', handler, { passive: false });
		}

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', bindPointerCancellationBarrier);
		} else {
			bindPointerCancellationBarrier();
		}
	})();
</script>
