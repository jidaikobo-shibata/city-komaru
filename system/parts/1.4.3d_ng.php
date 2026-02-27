<?php

/* コントラスト上の問題のある情報提供（トップページ以外のページヘッダー） */ ?>
<style>
#page-header {
    color: #fff;
}
#page-header .inner-wrapper::before {
    content: none;
}
</style>
