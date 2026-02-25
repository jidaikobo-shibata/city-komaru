<?php /* 十分な情報を提供していると判断しうるalt（「温暖化の状況」ページのグラフ） */ ?>
<?php
$alt = '右肩上がりのグラフ。0.85℃上昇 1880-2012年。地球の気温はどのくらい上がったの？ 地球の地上気温の経年変化（年平均）出典）IPCC第5次評価報告書 WGI Figure SPM.1 ※偏差の基準は1961-1990年平均（縦軸は1961-1990年平均を0℃とする）' ;
$alt = \Komarushi\Main::getBarrierStatus('1.1.1g') == 'ng' ? '画像1' : $alt;
?>
<p><img width="450" src="./images/ipcc_graph.jpg" alt="<?php echo $alt ?>"></p>
<p>出典）<cite>温室効果ガスインベントリオフィス</cite><br>
全国地球温暖化防止活動推進センターウェブサイト（<a href="https://www.jccca.org/">https://www.jccca.org/</a>）より</p>
