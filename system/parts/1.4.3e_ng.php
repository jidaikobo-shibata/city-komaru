<?php

/* コントラスト上の問題のある情報提供（テーマカラーの赤） */ ?>
<style>
#bttn-nav,
#your-effort,
input[type=submit],
button:not([type=button]),
body:not(.toppage) h2,
body:not(.toppage) .h2,
#select-registration-type :checked + label {
    background-color: #E83828;
    color: #fff;
}
form em,
form strong,
#bttn-nav:hover,
#bttn-nav[aria-expanded=true],
#bttn-nav.on {
    color: #E83828;
}
#bttn-nav:hover,
#bttn-nav[aria-expanded=true],
#bttn-nav.on {
    background-image: url(./images/_icon_menu_open.svg);
}
</style>
