<?php /* CAPTCHAが画像のみで、代替手段がない */ ?>
<?php
$vals = include(__DIR__ . '/../../practice/register-vals.php');
?>
<p>
    <label for="registration-captcha">画像に表示されている文字を入力してください。</label><br>
    <img src="./images/captcha.png" width="300" height="80" alt="画像"><br>
    <input type="text" name="captcha" size="12" id="registration-captcha" aria-describedby="registration-captcha-description" value="<?php echo $vals['registration-captcha']; ?>">
    <span id="registration-captcha-description"><br>大文字小文字は区別されません。</span>
</p>
