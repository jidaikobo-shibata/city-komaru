<?php /* CAPTCHAが画像のみにならないよう、テキスト代替を用意 */ ?>
<?php
$vals = include(__DIR__ . '/../../practice/register-vals.php');
$math_a = random_int(1, 9);
$math_b = random_int(1, 9);
$math_answer = $math_a + $math_b;
\Kontiki\Session::remove('captcha', 'math_answer');
\Kontiki\Session::add('captcha', 'math_answer', $math_answer);
$math_question = $math_a . ' + ' . $math_b . ' = ?';
?>
<p>
    <label for="registration-captcha">画像に表示されている文字を入力してください。</label><br>
    <img src="./images/captcha.png" width="300" height="80" alt="画像"><br>
    <input type="text" name="captcha" size="12" id="registration-captcha" aria-describedby="registration-captcha-description" value="<?php echo $vals['registration-captcha']; ?>">
    <span id="registration-captcha-description"><br>大文字小文字は区別されません。</span>
</p>
<p>
    <label for="registration-captcha-math">画像が見えない場合は、計算問題の答えを入力してください。</label><br>
    <span id="registration-captcha-math-problem">計算問題：<?php echo $math_question; ?></span><br>
    <input type="text" name="captcha_math" size="12" id="registration-captcha-math" aria-describedby="registration-captcha-math-problem" value="<?php echo $vals['registration-captcha-math']; ?>">
</p>
