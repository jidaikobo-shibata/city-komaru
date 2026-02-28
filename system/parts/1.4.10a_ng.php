<?php

/* 画面幅が狭くても固定幅表示を維持し、横スクロールを誘発する */ ?>
<script>
    (function() {
        const viewport = document.querySelector('meta[name="viewport"]');

        if (viewport) {
            viewport.setAttribute('content', 'width=1000');
        }
    })();
</script>
<style>
    @media all and (max-width: 1000px) {
        #wrapper,
        .full-width .inner-wrapper {
            width: 1000px;
            max-width: none;
        }

        .full-width {
            width: 1000px;
            margin: 0 -20px;
            left: 0;
            transform: none;
        }
    }
</style>
