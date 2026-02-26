<?php /* 可視ラベルがわかりやすい位置に配置されている（トップページ問い合わせ） */ ?>
<form action="./do-not-test.php" method="POST" id="komaru-contact-form">
<?php
komaruHtml('3.3.2b');

// 1.3.1
$label_onamae_text = \Komarushi\Main::komaruHtml('1.3.2a', false, true);
$label_onamae  = '<label for="shimei">'.$label_onamae_text.'</label>';
$label_email   = '<label for="email">メールアドレス※</label>';
$label_content = '<label for="content">お問い合わせ内容※</label>';
if (\Komarushi\Main::getBarrierStatus('1.3.1g') == 'ng'):
	$label_onamae  = \Komarushi\Main::komaruHtml('1.3.2a', false, true);
	$label_email   = 'メールアドレス※';
	$label_content = 'お問い合わせ内容※';
endif;

// 1.3.5
global $ac_onamae, $ac_email, $ac_tel;
komaruHtml('1.3.5a', true);
?>

<p><?php echo $label_onamae ?><br />
<input type="text" name="shimei"<?php echo $ac_onamae ?> id="shimei" size="20" value="" required /></p>

<p><?php echo $label_email ?><br />
<input type="text" name="email"<?php echo $ac_email ?> id="email" size="20" value="" required /></p>

<p><?php echo $label_content ?><br />
<textarea name="content" id="content" cols="35" rows="7" required></textarea></p>

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信" />
</form>
