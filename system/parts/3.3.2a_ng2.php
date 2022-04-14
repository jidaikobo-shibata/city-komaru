<?php /* labelによる関連付けのないラベル（トップページ問い合わせ） */ ?>
<form action="./do-not-test.php" method="POST">
<?php komaruHtml('3.3.2b') ?>

お名前※
<p><input type="text" name="shimei" id="shimei" size="20" value="" /></p>

メールアドレス※
<p><input type="text" name="email" id="email" size="20" value="" /></p>

お問い合わせ内容※
<p><textarea name="content" id="content" cols="35" rows="7"></textarea></p>

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信" />
</form>
