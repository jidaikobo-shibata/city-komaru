<?php require ('../init.php'); ?><!DOCTYPE html>
<?php echoPracticeHtml('3.1.1') ?>
<head>
<?php include(__DIR__.'/inc_header.php'); ?>
<?php echoPracticeHtml('2.4.2') ?>
</head>
<body>
<?php echoPracticeHtml('1.4.2') ?>
<div id="wrapper">
<div class="inner-wrapper">
	<div id="utilities">
	<?php echoPracticeHtml('2.4.1') ?>
	<?php echoPracticeHtml('2.4.5') ?>
	<?php echoPracticeHtml('2.1.2') ?>
	</div>
	<h1><?php echoPracticeHtml('1.1.1b') ?> 地球温暖化防止課 | 会員登録</h1>
	<?php echoPracticeHtml('3.2.3') ?>
</div>

<main id="main">
<div class="inner-wrapper">
<p>「駒留市エコサポーター」に登録いただくと、駒留市の環境教育イベントの開催のお知らせや会員限定のイベントへの参加をできるようになります。</p>
<p>収集する個人情報は、駒留市エコサポーターの活動の目的以外では利用されません。駒留市の<a href="./do-not-test.php">個人情報保護方針</a>をご覧ください。</p>

<script>
var timeout-val = 6000;
var timeout = function() {
//	timeout-val++;

}
setInterval(timeout, 30000);
//制限時間の実装


</script>






<form action="./do-not-test.php" method="POST">

<label><input type="radio" name="type" value="new" checked="checked" /> 新規登録</label>
<label><input type="radio" name="type" value="renew" /> 登録内容変更</label>

<p id="renew-area"><label for="your-id">ID※</label><br />
<input type="text" name="your-id" id="your-id" size="20" value="" /></p>

<div id="new-area">
<p><label for="shimei">お名前※</label><br />
<input type="text" name="shimei" id="shimei" size="20" value="" /></p>

<p><label for="email">メールアドレス※</label><br />
<input type="text" name="email" id="email" size="20" value="" /></p>
</div>

<?php echoPracticeHtml('3.2.1', '', 'register') ?>

<input type="submit" value="送信" />
</form>
<script>
$('#renew-area').hide();
$('input[name=type]').change(function(){
	if ($(this).attr('value') == 'renew') {
		$('#renew-area').show();
		$('#new-area').hide();
	} else {
		$('#renew-area').hide();
		$('#new-area').show();
	}
});
</script>

</div>
</main>

<?php include(__DIR__.'/inc_footer.php'); ?>
