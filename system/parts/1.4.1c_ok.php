<?php /* 色の違いに依存していない円グラフ */ ?>
<?php
$alt = '2021年度 家庭からの二酸化炭素排出量（燃料種別内訳）の円グラフ。';
$alt .= \Komarushi\Main::getBarrierStatus('1.1.1e') == 'ng' ? '' : '内訳は続く表の通り。';
$alt = \Komarushi\Main::getBarrierStatus('1.1.1g') == 'ng' ? '画像3' : $alt;
$img = \Komarushi\Main::getBarrierStatus('1.4.3f') == 'ng' ? '1.4.3_ng_a' : '1.4.1_ok1';
?>
<p style="text-align: center;"><img src="./images/chart_<?php echo $img ?>.jpg" alt="<?php echo $alt ?>"></p>
