<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>駒瑠市〜アクセシビリティ上の問題の体験サイト〜</title>
	<style type="text/css">
		#readme_vendor li
		{
			margin: 0;
			display: inline-block;
			vertical-align: top;
			width: 170px;
			text-align: center;
			list-style: none;
			font-size: 100%;
		}

		#readme_vendor li img
		{
			height: 100px;
			display: block;
			margin: 5px auto;
		}

		footer
		{
			border-top: 1px #aaa solid;
			padding: 25px 0 0;
		}
	</style>

	<!--Google analytics-->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-2627567-53', 'auto');
		ga('send', 'pageview');
	</script>

</head>
<body>
<h1>駒瑠市〜アクセシビリティ上の問題の体験サイト〜</h1>
<ul>
	<li>意図的なアクセシビリティ上の問題を仕込んだサイトを生成します</li>
	<li>JIS X 8341-3:2016やWCAGの勉強に使ってもらっても良いですし、「困ったサイト」のサンプルとしてお使いいただいても構いません</li>
	<li>以下の「障壁の設定を行う」から、サイトの生成に進むことができます</li>
	<li>フォームの送信後のページなど、対象外の箇所には「試験対象外」というテキストが付与されています</li>
	<li>無料でお使いいただけます</li>
</ul>

<h2>注意事項</h2>
<ul>
	<li>このサイトは「架空の地方自治体（駒瑠市・こまるし）のとある課のサイト」という設定でできています</li>
	<li>サイトには意図的にアクセシビリティ上の問題が仕込んであります。利用には不快感を伴うことがあります</li>
	<li>PDFによる情報提供が存在します。当然ながらHTMLで情報提供した方が良いのですが、このサイトでは、「『お知らせ』はPDFによる添付しかできない困ったCMSを使っている」というような設定だとご理解ください</li>
	<li>ブラウザで音声の自動再生をオフにしている場合で、自動再生の不具合を確認したい場合は、ブラウザの設定を調整してください</li>
	<li>「障壁の設定」では便宜上達成基準の番号ごとのまとまりを持っていますが、システムの都合上、必ずしもバリアの内容と達成基準の番号は一致しません</li>
	<li>現時点では、障壁はWCAG 2.0 AA（ダブルA）までの問題を実装しています</li>
	<li>意図的にアクセシビリティ上の問題を生成するため、HTMLの文法に誤った箇所が含まれている場合があります。「4.1.1 構文解析」に関しては、対象としないようにしてください</li>
	<li>いくつかの達成基準の項目について、障壁が実装されていないものがありますが、「2.3.1 3回の閃光又は閾値以下」の障壁については、将来的にも実装の予定はありません</li>
	<li>現在も制作を続けておりますので、バグが含まれている可能性があることをご了承ください</li>
</ul>

<h2>障壁の設定へ</h2>
<ul>
	<li><a href="./config.php">障壁の設定を行う</a></li>
</ul>

<h2>問い合わせ等</h2>
<ul id="readme_vendor">
	<li><a href="http://www.jidaikobo.com"><img src="./images/logo_author.png" class="a11yc_logo_author" alt="ロゴマーク">有限会社時代工房</a></li>
	<li><a href="https://twitter.com/jidaikobo"><img src="./images/Twitter_Logo_Blue.png" class="a11yc_logo_author" alt="Twitter Logo">時代工房のTwitter</a></li>
</ul>

<h2>Google Analyticsについて</h2>
<p>このページのみ、<a href="https://marketingplatform.google.com/intl/ja/about/analytics/">Google Analytics</a>をつかってアクセス解析を行っています</p>

<footer>
制作：<a href="https:/www.jidaikobo.com">有限会社時代工房</a><br>
ライセンス：<a href="https://github.com/jidaikobo-shibata/city-komaru/blob/master/LICENSE.txt">MIT</a><br>
動画・GIFアニメ作成協力：<a href="http://functiontales.com">FUNCTION TALES</a><br>
使っている音源は<a href="https://www.zapsplat.com">https://www.zapsplat.com</a>で取得しました。
</footer>
</body>
</html>
