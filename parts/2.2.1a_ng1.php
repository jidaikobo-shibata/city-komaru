<script>
const timeout_val = 10000;
// むりやり時間切れバージョン
var timeout = function() {
				alert('入力時間が切れました');
				document.registration.reset();
				setTimeout(timeout, timeout_val);
}
setTimeout(timeout, timeout_val);
</script>
