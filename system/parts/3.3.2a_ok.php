<?php /* <label>による適切な関係付けのできているフォーム */ ?>
<form action="./do-not-test.php" method="POST">
<?php komaruHtml('3.3.2b') ?>

<p><label for="shimei">お名前※</label><br />
<input type="text" name="shimei" id="shimei" size="20" value="" /></p>

<p><label for="email">メールアドレス※</label><br />
<input type="text" name="email" id="email" size="20" value="" /></p>

<p><label for="content">お問い合わせ内容※</label><br />
<textarea name="content" id="content" cols="35" rows="7"></textarea></p>

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信" />
</form>
