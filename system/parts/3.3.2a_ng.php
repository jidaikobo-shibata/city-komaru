<?php /* placeholderによるラベルの提供 */ ?>
<form action="./do-not-test.php" method="POST">
<?php komaruHtml('3.3.2b') ?>

<p><input type="text" name="shimei" id="shimei" size="20" value="" placeholder="お名前※" /></p>

<p><input type="text" name="email" id="email" size="20" value="" placeholder="メールアドレス※" /></p>

<p><textarea name="content" id="content" cols="35" rows="7" placeholder="お問い合わせ内容※"></textarea></p>

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信" />
</form>
