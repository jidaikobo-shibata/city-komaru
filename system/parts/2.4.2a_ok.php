<?php

/* 妥当なtitle要素を提供 */
$parthtml = '';
switch (\Komarushi\Main::whoAmI()) {
    case 'index':
        $parthtml = '<title>駒瑠市 地球温暖化防止課 | トップページ</title>';
        break;
    case 'fact':
        $parthtml = '<title>駒瑠市 地球温暖化防止課 | 温暖化の状況</title>';
        break;
    default:
        $parthtml = '<title>駒瑠市 地球温暖化防止課 | 会員登録</title>';
        break;
}
echo $parthtml;
