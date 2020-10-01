<script>
const timeout_val = 10000;
var timeout = function() {
				var response = window.confirm('入力時間が切れました。制限時間を延長しますか？');
				if( ! response ){
					document.registration.reset();
				}
				setTimeout(timeout, timeout_val);
}
setTimeout(timeout, timeout_val);
</script>
