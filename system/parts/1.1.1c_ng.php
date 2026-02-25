<?php /* 情報が不足したalt（「温暖化の状況」ページのグラフ） */ ?>
<?php $alt = \Komarushi\Main::getBarrierStatus('1.1.1g') == 'ng' ? '画像1' : 'グラフ'; ?>
<p><img width="450" src="./images/ipcc_graph.jpg" alt="<?php echo $alt ?>"></p>
<p>出典）<cite>温室効果ガスインベントリオフィス</cite><br>
全国地球温暖化防止活動推進センターウェブサイト（<a href="https://www.jccca.org/">https://www.jccca.org/</a>）より</p>
