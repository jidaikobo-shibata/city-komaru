<?php require ('../init.php'); ?><!DOCTYPE html>
<?php echoPracticeHtml('3.1.1')  ?>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
<?php echoPracticeHtml('2.4.2') ?>
	<style>
<?php echoPracticeHtml('2.4.7') ?>
	</style>
</head>
<body>
<h1>駒留市 地球温暖化防止課</h1>
<p>カルーセルだったり、なかったり</p>
<?php echoPracticeHtml('3.2.3') ?>

<p>駒留市は、持続可能な社会の実現に向け、気候変動問題への対応、廃棄物対策、生物多様性の保全などさまざまな取組を行っています。</p>

<h2>あなたにもできる取り組み</h2>

<h2>問い合わせフォーム</h2>
<p>駒留市の温暖化防止の取り組みについてのお問い合わせはこちらのフォームからお寄せください。</p>

<form action="./do-not-test.php" method="POST">
<p><label for="shimei">お名前</label><br />
<input type="text" name="shimei" id="shimei" size="20" value="" /></p>

<p><label for="email">メールアドレス</label><br />
<input type="text" name="email" id="email" size="20" value="" /></p>

<p><label for="content">お問い合わせ内容</label><br />
<textarea name="content" id="content" cols="35" rows="7"></textarea></p>

<input type="submit" value="送信" />
</form>

<aside>
<h1>駒留市の本日のCO<sub>2</sub>排出量</h1>
<p>自動的に動く数字</p>
<p>場合によると一時停止ボタン</p>
</aside>

<?php echoPracticeHtml('1.1.1a') ?>

<footer>
駒留市 地球温暖化防止課<br>
City of Komaru. All rights reserved.
</footer>
</body>
</html>
