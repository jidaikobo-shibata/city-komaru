<?php /* placeholderによるラベルの提供（トップページ問い合わせ） */ ?>
<form action="./do-not-test.php" method="POST">
<?php komaruHtml('3.3.2b') ?>

<p><input type="text" name="shimei" id="shimei" size="20" value="" placeholder="お名前※" required /></p>

<p><input type="text" name="email" id="email" size="20" value="" placeholder="メールアドレス※" required /></p>

<p><textarea name="content" id="content" cols="35" rows="7" placeholder="お問い合わせ内容※" required></textarea></p>

<?php komaruHtml('3.2.1a') ?>

<input type="submit" value="送信" />
</form>
