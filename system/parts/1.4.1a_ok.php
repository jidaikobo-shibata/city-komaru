<?php /* 必須項目を適切に通知しているフォーム */ ?>

<?php
$vals = [];
$vals['type'] = '';
$vals['your-id'] = '';
$vals['shimei'] = '';
$vals['email'] = '';
$vals['phone'] = '';
if (\Komarushi\Main::getBarrierStatus('3.3.7a') == 'ok'):
	$vals = include('../practice/register-vals.php');
endif;

// 1.3.5
global $ac_onamae, $ac_email, $ac_tel;
komaruHtml('1.3.5a', true);
?>

<p><em>※印のついた赤字の項目</em>は必須入力です。</p>

<div id="renew-area">
<p><label for="your-id"><em>ID※</em></label><br />
<input type="text" name="your-id" autocomplete="username" id="your-id" size="20" value="<?php echo $vals['your-id'] ?>" /></p>
</div>

<div id="new-area">
<p><label for="shimei"><em>お名前※</em></label><br />
<input type="text" name="shimei"<?php echo $ac_onamae; ?> id="shimei" size="20" value="<?php echo $vals['shimei'] ?>" /></p>

<p><label for="email"><em>メールアドレス※</em></label><br />
<input type="text" name="email"<?php echo $ac_email; ?> id="email" size="20" value="<?php echo $vals['email'] ?>" /></p>

<p><label for="phone"><em>電話番号※</em></label><br />
<span id="registration-phone-description">数字とハイフンのみ。市外局番から記入ください。</span><br />
<input type="text" name="phone"<?php echo $ac_tel; ?> id="phone" size="20" value="<?php echo $vals['phone'] ?>" aria-describedby="registration-phone-description" /></p>
<?php komaruHtml('1.1.1i') ?>
</div>
