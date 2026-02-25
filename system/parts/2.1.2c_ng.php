<?php /* キーボードトラップ（ハンバーガーメニュー） */ ?>

<script>

document.getElementById('menu3').addEventListener('keydown', function (event) {
    if (event.key === 'Tab' && !event.shiftKey) {
        event.preventDefault();
        document.getElementById('menu1').focus();
    }
});

document.getElementById('menu1').addEventListener('keydown', function (event) {
    if (event.key === 'Tab' && event.shiftKey) {
        event.preventDefault();
        document.getElementById('menu3').focus();
    }
});

</script>
