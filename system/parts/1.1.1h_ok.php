<?php /* トップページの「あなたにもできる取り組み」のツールチップはaria-describedbyで画像と紐付けられているので、スクリーンリーダでも読み上げることができる */

function e111h ($id)
{
    $aria_describedbys = [
        1 => ' aria-describedby="tooltip-effor1"',
        2 => ' aria-describedby="tooltip-effor2"',
        3 => ' aria-describedby="tooltip-effor3"',
        4 => ' aria-describedby="tooltip-effor4"',
    ];
    echo $aria_describedbys[$id];
}
