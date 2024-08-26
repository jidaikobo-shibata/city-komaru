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

<div id="page-header" class="full-width">
	<div class="inner-wrapper">
		<<?php echo isset($h_element) ? $h_element : 'h1' ?> class="heading">駒瑠市環境イベント エこ・まるシェ</<?php echo isset($h_element) ? $h_element : 'h1' ?>>
	</div>
</div>

<h2>知って、遊んで、持続可能なみらいを考えよう！</h2>

<?php
$flyeralt = \Komarushi\Main::getBarrierStatus('1.1.1f') == 'ok' ? '。同等の内容を以下に記します。' : '';
$flyerimg = \Komarushi\Main::getBarrierStatus('1.4.3g') == 'ok' ? '_ok' : '_ng';
?>
<p style="text-align: center;"><img src="./images/eco-komaru-marche_1.4.3<?php echo $flyerimg ?>.png" alt="チラシ画像<?php echo $flyeralt ?>"></p>

<table class="table">
<tr>
	<th>日時</th>
	<td>11月8日（土）10時〜16時</td>
</tr>
<tr>
	<th>場所</th>
	<td>市民活動センター</td>
</tr>
<tr>
	<th>参加費</th>
	<td>入場無料</td>
</tr>
</table>

<?php if (\Komarushi\Main::getBarrierStatus('1.1.1f') == 'ok'): ?>
<h2>会場案内</h2>
<ul>
	<li>市民活動センターで会場を確認してください</li>
	<li>会場入口左手に受付があります</li>
	<li>会場入口付近にトイレがあります</li>
	<li>会場入口側にはフリマスペースがあり、16の出展者が出展しています</li>
	<li>会場奥には休憩・飲食スペースとキッズエリアがあります。休憩・飲食スペースの付近にステージを設営しています。</li>
	<li>会場の奥にはパネル展示があります</li>
</ul>

<h2>フリマ出展者</h2>

<table class="table">
<thead>
<tr>
	<th scope="col">出展場所番号</th>
	<th scope="col">出展者名</th>
	<th scope="col">内容</th>
	<th scope="col">種類</th>
</tr>
</thead>
<tr>
	<th scope="row">1</th>
	<td>こまるエネルギー研究所</td>
	<td>自転車発電体験</td>
	<td>体験・ワークショップ</td>
</tr>
<tr>
	<th scope="row">2</th>
	<td>あそび工房</td>
	<td>工作教室</td>
	<td>体験・ワークショップ</td>
</tr>
<tr>
	<th scope="row">3</th>
	<td>エコサポーターズ</td>
	<td>オリジナルエコバッグ</td>
	<td>体験・ワークショップ</td>
</tr>
<tr>
	<th scope="row">4</th>
	<td>こどものくに</td>
	<td>木のおもちゃ</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">5</th>
	<td>KOFUKU</td>
	<td>古着</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">6</th>
	<td>もったいない市場</td>
	<td>古道具</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">7</th>
	<td>こどもえほん館</td>
	<td>絵本</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">8</th>
	<td>竹の道具 こまたけ</td>
	<td>竹細工</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">9</th>
	<td>Re: Acc</td>
	<td>手作りアクセサリー</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">10</th>
	<td>手織りやOlly</td>
	<td>ストール・布製品</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">11</th>
	<td>アロマラボ</td>
	<td>手作り石鹸</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">12</th>
	<td>まちの八百屋</td>
	<td>有機栽培野菜</td>
	<td>販売</td>
</tr>
<tr>
	<th scope="row">13</th>
	<td>ワールドカフェ</td>
	<td>コーヒー・軽食</td>
	<td>飲食</td>
</tr>
<tr>
	<th scope="row">14</th>
	<td>屋台ごはん</td>
	<td>カレー</td>
	<td>飲食</td>
</tr>
<tr>
	<th scope="row">15</th>
	<td>おやつ屋わくわく</td>
	<td>ドーナツ・クッキー</td>
	<td>飲食</td>
</tr>
<tr>
	<th scope="row">16</th>
	<td>にこさんベーカリー</td>
	<td>パン</td>
	<td>飲食</td>
</tr>
</table>
<p>フリマスペースは会場入口付近にあります。入口から向かって左端の列に出展場所番号1〜4。2列目に5〜8。通路を挟んで3列目に9〜12。右端の4列目に13〜16の出展者が並びます。</p>

<h2>ステージイベント</h2>
<table class="table">
<thead>
<tr>
	<th scope="col">時刻</th>
	<th scope="col">イベント</th>
	<th scope="col">登壇</th>
</tr>
</thead>
<tr>
	<th scope="row">10:30</th>
	<td>バンド演奏</td>
	<td>駒瑠中学校吹奏楽部のみなさん</td>
</tr>
<tr>
	<th scope="row">11:00</th>
	<td>科学実験ショー</td>
	<td>こまる環境未来センター ミラセンかがくのお姉さん</td>
</tr>
<tr>
	<th scope="row">13:30</th>
	<td colspan="2">こまるくん登場！ 撮影タイム</td>
</tr>
<tr>
	<th scope="row">14:00</th>
	<td>くらしのSDGs講座</td>
	<td>駒瑠市環境アドバイザー 大地 里美さん</td>
</tr>
<tr>
	<th scope="row">15:00</th>
	<td>環境らくご</td>
	<td>駒瑠市落語会のみなさん</td>
</tr>
<tr>
	<th scope="row">15:30</th>
	<td colspan="2">こまるくん登場！ 撮影タイム</td>
</tr>
</table>

<h2>ご来場の注意事項</h2>
<ul>
	<li>マイバッグ・マイボトルを持参して、環境にやさしいお買い物を心がけましょう。</li>
	<li>駐車場のご用意はございません。ご来場の際は、公共交通機関をご利用ください。</li>
	<li>自転車でご来場の方には駐輪場をご案内しますので、会場スタッフにお声がけください。</li>
</ul>
<?php endif; ?>

<h2>実施主体</h2>

<h3>主催</h3>
<ul>
	<li>駒瑠市 地球温暖化防止課</li>
</ul>

<h3>共催</h3>
<ul>
	<li>こまる環境未来センター</li>
	<li>NPO法人 駒瑠市環境会議</li>
</ul>

</main>
<?php include(__DIR__.'/inc_footer.php'); ?>
