<?php /* 必須項目を色のみで通知しているフォーム */ ?>

<?php
$vals = include('../practice/register-vals.php');
?>

<p><em>赤字</em>の項目は必須入力です。</p>
<div id="renew-area">
<p><label for="your-id"><em>ID</em></label><br />
<input type="text" name="your-id" id="your-id" size="20" value="<?php echo $vals['your-id'] ?>" /></p>
</div>

<div id="new-area">
<p><label for="shimei"><em>お名前</em></label><br />
<input type="text" name="shimei" id="shimei" size="20" value="<?php echo $vals['shimei'] ?>" /></p>

<p><label for="email"><em>メールアドレス</em></label><br />
<input type="text" name="email" id="email" size="20" value="<?php echo $vals['email'] ?>" /></p>

<p><label for="phone"><em>電話番号</em></label><br />
<input type="text" name="phone" id="phone" size="20" value="<?php echo $vals['phone'] ?>" /></p>
</div>
