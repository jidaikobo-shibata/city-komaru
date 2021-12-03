<?php /* 可視ラベルがわかりやすい位置に配置されている（トップページ問い合わせ） */ ?>
<form action="./do-not-test.php" method="POST">
<?php
komaruHtml('3.3.2b');
$label_onamae  = '<label for="shimei">お名前※</label>';
$label_email   = '<label for="email">メールアドレス※</label>';
$label_content = '<label for="content">お問い合わせ内容※</label>';
if (\Komarushi\Main::getBarrierStatus('1.3.1g') == 'ng'):
	$label_onamae  = 'お名前※';
	$label_email   = 'メールアドレス※';
	$label_content = 'お問い合わせ内容※';
endif;
?>

<p><?php echo $label_onamae ?><br />
<input type="text" name="shimei" id="shimei" size="20" value="" /></p>

<p><?php echo $label_email ?><br />
<input type="text" name="email" id="email" size="20" value="" /></p>

<p><?php echo $label_content ?><br />
<textarea name="content" id="content" cols="35" rows="7"></textarea></p>

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信" />
</form>
