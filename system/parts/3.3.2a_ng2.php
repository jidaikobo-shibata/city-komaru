<?php /* labelによる関連付けのないラベル（トップページ問い合わせ） */ ?>
<form action="./do-not-test.php" method="POST" id="komaru-contact-form">
<?php
// 3.3.2
komaruHtml('3.3.2b');

// 1.3.5
global $ac_onamae, $ac_email, $ac_tel;
komaruHtml('1.3.5a', true);
?>

<?php komaruHtml('1.3.2a') ?>
<p><input type="text" name="shimei"<?php echo $ac_onamae ?> id="shimei" size="20" value="" required /></p>

メールアドレス※
<p><input type="text" name="email"<?php echo $ac_email ?> id="email" size="20" value="" required /></p>

お問い合わせ内容※
<p><textarea name="content" id="content" cols="35" rows="7" required></textarea></p>

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信" />
</form>
