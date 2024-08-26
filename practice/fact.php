<?php require ('../system/init.php'); ?><!DOCTYPE html>
<?php komaruHtml('3.1.1a') ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php komaruHtml('2.4.2a') ?>
<?php komaruHtml('1.3.1e')?>
</head>
<body class="fact">
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
<div class="inner-wrapper">
	<div id="utilities">
	<?php komaruHtml('2.4.1a') ?>
	<?php komaruHtml('2.4.5a') ?>
	</div>
	<div id="logo"><a href="./<?php echo \Komarushi\Main::modeString() ?>"><?php komaruHtml('1.1.1b') ?></a> 地球温暖化防止課</div>
	<div id="menu">
		<?php komaruHtml('3.2.3a') ?>
		<nav id="langage-nav">
			<button type="button" class="bttn-menu bttn" id="bttn-lang" aria-expanded="false" aria-controls="lang-menu" title="Language"><span class="fa fa-globe" aria-hidden="true"></span><span class="visually-hidden" lang="en">Language</span></button>
			<div id="wrapper-lang-menu" class="wrapper-menu">
				<ul id="lang-menu" class="menu-list" style="display:none">
					<?php komaruHtml('3.1.2a') ?>
				</ul>
			</div>
		</nav>
		<?php komaruHtml('2.1.1a') ?>
		<?php komaruHtml('2.4.3a') ?>
	</div>
</div>
</header>
<main id="main">
<?php
// 見出し
if (\Komarushi\Main::getBarrierStatus('1.3.1e') == 'ng'):
	$h_element = 'p';
endif;
?>

<div id="page-header" class="full-width">
	<div class="inner-wrapper">
		<<?php echo isset($h_element) ? $h_element : 'h1' ?> class="heading">温暖化の状況</<?php echo isset($h_element) ? $h_element : 'h1' ?>>
	</div>
</div>

<?php
// idの重複
$id1 = 'sekai-no-heikinkion-no-josho';
$id2 = 'chikyuondanka-no-mechanism';
$id3 = 'kakuchi-no-kion-no-josho';
$id4 = 'kyozai-no-kashidashi';
if (\Komarushi\Main::getBarrierStatus('4.1.1a') == 'ng'):
	$id1 = 'menu1';
	$id2 = 'menu1';
	$id3 = 'menu1';
	$id4 = 'menu1';
endif;
?>

<ul class="toc nomarker">
	<li><a href="#<?php echo $id1 ?>">世界の平均気温の上昇</a></li>
	<li><a href="#<?php echo $id2 ?>">地球温暖化のメカニズム</a></li>
	<li><a href="#<?php echo $id3 ?>">各地の気温の上昇</a></li>
	<li><a href="#<?php echo $id4 ?>">教材の貸し出し</a></li>
</ul>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?> id="<?php echo $id1 ?>">世界の平均気温の上昇</<?php echo isset($h_element) ? $h_element : 'h2' ?>>
<!-- <p>気候変動に関する政府間パネル（IPCC）の第5次評価報告書によると、世界の平均気温は、1880年から2012年にかけて、0.85℃上昇しています。</p> -->
<p>気候変動に関する政府間パネル（IPCC）の第5次評価報告書によると、世界の平均気温は、確実に上昇しています。</p>

<?php komaruHtml('1.1.1c') ?>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?> id="<?php echo $id2 ?>"><?php komaruHtml('2.4.6a') ?></<?php echo isset($h_element) ? $h_element : 'h2' ?>>

<?php komaruHtml('1.2.1b') ?>

<?php
$gif_animation = '<img src="./images/mechanism_gif_small.gif" alt="温暖化のメカニズムを説明したGIFアニメ">';
if (\Komarushi\Main::getBarrierStatus('2.2.2d') == 'ok'):
	$gif_animation = '<details open="open"><summary>アニメーション表示オン/オフ切り替え</summary>'.$gif_animation.'</details>';
endif;
echo $gif_animation;
?>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?> id="<?php echo $id3 ?>">各地の気温の上昇</<?php echo isset($h_element) ? $h_element : 'h2' ?>>
<?php

$copied_style = '';
if (\Komarushi\Main::getBarrierStatus('1.4.4b') == 'ng'):
	$copied_style = ' style="font-size:12px;font-family: \'ＭＳ 明朝\',serif;"';
endif;
?>
<p<?php echo $copied_style ?>>温暖化対策をとらないまま、現在のペースで温暖化が進むと、日本の各都市の真夏日の日数が増加することが予測されています。東京では、現在、年間約46日の真夏日がありますが、21世紀末には年間約103日が真夏日になると言われています。</p>
<?php komaruHtml('1.3.1b') ?>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?> id="<?php echo $id4 ?>">教材の貸し出し</<?php echo isset($h_element) ? $h_element : 'h2' ?>>

<p>学校、企業などで地球温暖化について学ぶための教材の貸出を行っております。以下手順で申請してください。</p>
<?php komaruHtml('1.3.1a') ?>

<?php
// scopeの有無
$scope_row = ' scope="row"';
$scope_col = ' scope="col"';
if (\Komarushi\Main::getBarrierStatus('1.3.3f') == 'ng'):
	$scope_row = '';
	$scope_col = '';
endif;
?>
<<?php echo isset($h_element) ? $h_element.' class="h3"' : 'h3' ?> id="<?php echo $id4 ?>">教材の貸し出し状況</<?php echo isset($h_element) ? $h_element : 'h3' ?>>

<?php
// 感覚的な特徴
$sensory = false;
$sensory1 = '在庫多数';
$sensory2 = '在庫あり';
$sensory3 = '在庫なし';
if (\Komarushi\Main::getBarrierStatus('1.3.3a') == 'ng'):
	$sensory = true;
	$sensory1 = '<img src="./images/chikyu_1.png" width="30" height="30" alt="在庫状況" style="vertical-align: middle;">';
	$sensory2 = '<img src="./images/chikyu_2.png" width="30" height="30" alt="在庫状況" style="vertical-align: middle;">';
	$sensory3 = '<img src="./images/chikyu_3.png" width="30" height="30" alt="在庫状況" style="vertical-align: middle;">';
endif;
?>

<?php if ($sensory): ?>
<p>「ちきゅうくん」が隠れている資料は借りづらい資料です。</p>
<?php endif; ?>

<table class="table even">
<thead>
<tr>
	<th<?php echo $scope_col ?>>種別</th>
	<th<?php echo $scope_col ?>>名前</th>
	<th<?php echo $scope_col ?>>説明</th>
	<th<?php echo $scope_col ?>>貸出</th>
</tr>
</thead>
<tr>
	<th<?php echo $scope_row ?> style="white-space: nowrap;">パネル</th>
	<td>地球温暖化の仕組み</td>
	<td>地球温暖化の仕組みを解説したA1サイズのパネルです</td>
	<td style="white-space: nowrap;"><?php echo $sensory1 ?></td>
</tr>
<tr>
	<th<?php echo $scope_row ?>>DVD</th>
	<td>地球温暖化捏造説</td>
	<td>地球温暖化は起こってないってホント？</td>
	<td><?php echo $sensory3 ?></td>
</tr>
<tr>
	<th<?php echo $scope_row ?>>紙芝居</th>
	<td style="white-space: nowrap;">フードマイレージってなあに？</td>
	<td>地球温暖化とフードマイレージの関係を小学生にもわかりやすく伝えます</td>
	<td><?php echo $sensory2 ?></td>
</tr>
</table>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?> id="<?php echo $id3 ?>">参考資料「2021年度 家庭からの二酸化炭素排出量（燃料種別内訳）」</<?php echo isset($h_element) ? $h_element : 'h2' ?>>

<?php komaruHtml('1.4.1c') ?>
<?php komaruHtml('1.1.1e') ?>

</main>

<?php include(__DIR__.'/inc_footer.php'); ?>
