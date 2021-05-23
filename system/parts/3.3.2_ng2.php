<?php /* <label>を用いた情報の関連付けのないラベル */ ?>
<form action="./do-not-test.php" method="POST">
<?php komaruHtml('3.3.2b') ?>

<p>お名前※<br />
<input type="text" name="shimei" size="20" value="" /></p>

<p>メールアドレス※<br />
<input type="text" name="email" size="20" value="" /></p>

<p>お問い合わせ内容※<br />
<textarea name="content" cols="35" rows="7"></textarea></p>

<?php komaruHtml('3.2.1') ?>

<input type="submit" value="送信" />
</form>
