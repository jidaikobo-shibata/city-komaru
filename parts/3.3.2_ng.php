<form action="./do-not-test.php" method="POST">
<?php echoPracticeHtml('3.3.2b', '', 'index') ?>

<p><input type="text" name="shimei" id="shimei" size="20" value="" placeholder="お名前※" /></p>

<p><input type="text" name="email" id="email" size="20" value="" placeholder="メールアドレス※" /></p>

<p><textarea name="content" id="content" cols="35" rows="7" placeholder="お問い合わせ内容※"></textarea></p>

<?php echoPracticeHtml('3.2.1', '', 'index') ?>

<input type="submit" value="送信" />
</form>
