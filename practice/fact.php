<?php require ('../functions/init.php'); ?><!DOCTYPE html>
<?php echoPracticeHtml('3.1.1') ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php echoPracticeHtml('2.4.2') ?>
<?php echoPracticeHtml('1.3.1e')?>
</head>
<body class="fact">
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
<div class="inner-wrapper">
	<div id="utilities">
	<?php echoPracticeHtml('2.4.1') ?>
	<?php echoPracticeHtml('2.4.5') ?>
	</div>
	<div id="logo"><a href="./"><?php echoPracticeHtml('1.1.1b') ?> 地球温暖化防止課</a></div>
	<div id="menu">
		<?php echoPracticeHtml('3.2.3') ?>
		<nav id="langage-nav">
			<button type="button" class="bttn-menu bttn" id="bttn-lang" aria-expanded="false" aria-controls="lang-menu" title="Language"><span class="fa fa-globe" aria-hidden="true"></span><span class="visually-hidden" lang="en">Language</span></button>
			<div id="wrapper-lang-menu" class="wrapper-menu">
				<ul id="lang-menu" class="menu-list" style="display:none">
					<?php echoPracticeHtml('3.1.2a') ?>
				</ul>
			</div>
		</nav>
		<?php echoPracticeHtml('2.1.1a') ?>
		<?php echoPracticeHtml('2.4.3') ?>
	</div>
</div>
</header>
<main id="main">
<div id="page-header" class="full-width">
	<div class="inner-wrapper">
		<<?php echo isset($h_element) ? $h_element : 'h1' ?> class="heading">温暖化の状況</<?php echo isset($h_element) ? $h_element : 'h1' ?>>
	</div>
</div>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?>>世界の平均気温の上昇</<?php echo isset($h_element) ? $h_element : 'h2' ?>>
<p>気候変動に関する政府間パネル（IPCC）の第5次評価報告書によると、世界の平均気温は、1880年から2012年にかけて、0.85℃上昇しています。</p>

<?php echoPracticeHtml('1.1.1c') ?>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?>><?php echoPracticeHtml('2.4.6a') ?></<?php echo isset($h_element) ? $h_element : 'h2' ?>>

<?php echoPracticeHtml('1.2.1b') ?>

<details open="open">
<summary>アニメーション表示切り替え</summary>
<img src="./images/mechanism_gif_small.gif" alt="温暖化のメカニズムを説明したGIFアニメ">
</details>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?>>各地の気温の上昇</<?php echo isset($h_element) ? $h_element : 'h2' ?>>
<p>温暖化対策をとらないまま、現在のペースで温暖化が進むと、日本の各都市の真夏日の日数が増加することが予測されています。東京では、現在、年間約46日の真夏日がありますが、21世紀末には年間約103日が真夏日になると言われています。</p>
<?php echoPracticeHtml('1.3.1b') ?>

<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?>>教材の貸し出し</<?php echo isset($h_element) ? $h_element : 'h2' ?>>

<p>学校、企業などで地球温暖化について学ぶための資料の貸出を行っております。以下手順で申請してください。</p>
<?php echoPracticeHtml('1.3.1a') ?>

</main>

<?php include(__DIR__.'/inc_footer.php'); ?>
