<?php /* 誤ったautocomplete属性が適用されたお問い合わせフォーム */

global $ac_onamae, $ac_email, $ac_tel;

$ac_onamae  = ' autocomplete="name"'; // ここ、間違えるのが難しいので、正しいままで
$ac_email   = ' autocomplete="mail"';
$ac_tel     = ' autocomplete="tel"'; // 国番号を含めるもの
