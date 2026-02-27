<?php

/* 認証情報のコピペを禁止する */ ?>
<script>
    (function() {
        function disablePaste(el) {
            if (!el) return;
            ['paste', 'drop', 'contextmenu'].forEach(function(type) {
                el.addEventListener(type, function(event) {
                    event.preventDefault();
                    alert('ペースト禁止です');
                });
            });
        }

        function bind() {
            disablePaste(document.getElementById('login-id'));
            disablePaste(document.getElementById('login-password'));
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', bind);
        } else {
            bind();
        }
    })();
</script>
