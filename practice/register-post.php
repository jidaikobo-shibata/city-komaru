<?php
require('../system/init.php');

// 値の保存
$vals = [];
$vals['type'] = filter_input(INPUT_POST, 'type');
$vals['your-id'] = filter_input(INPUT_POST, 'your-id');
$vals['shimei'] = filter_input(INPUT_POST, 'shimei');
$vals['email'] = filter_input(INPUT_POST, 'email');
$vals['phone'] = filter_input(INPUT_POST, 'phone');
$vals['registration-captcha'] = filter_input(INPUT_POST, 'captcha');
$vals['registration-captcha-math'] = filter_input(INPUT_POST, 'captcha_math');
$vals['agree_privacypolicy'] = filter_input(INPUT_POST, 'agree_privacypolicy');
setcookie('vals', json_encode($vals), (time() + 86400), "/");

// エラーの準備
$errors = [
    'email' => '',
    'phone' => '',
    'registration-captcha' => '',
    'agree_privacypolicy' => '',
];
$is_error = false;

// 3.3.1 エラーの特定
$is_331_ok = isset(\Komarushi\Main::$test_pattern['3.3.1a']) && \Komarushi\Main::$test_pattern['3.3.1a'] == 'ok';

// 3.3.3 エラー修正の提案
$is_333_ok = isset(\Komarushi\Main::$test_pattern['3.3.3a']) && \Komarushi\Main::$test_pattern['3.3.3a'] == 'ok';

//if (filter_input(INPUT_POST, 'captcha') !== 'uRab4?p')
if ($vals['type'] == 'new') {
    $captcha_input = trim((string)filter_input(INPUT_POST, 'captcha'));
    $captcha_math_input = trim((string)filter_input(INPUT_POST, 'captcha_math'));
    $is_captcha_ok = $captcha_input !== '' && strtolower($captcha_input) === 'urab4?p';

    $is_111i_ok = isset(\Komarushi\Main::$test_pattern['1.1.1i']) &&
        preg_match('/^ok/', \Komarushi\Main::$test_pattern['1.1.1i']);
    if ($is_111i_ok) {
        $math_answers = \Kontiki\Session::show('captcha', 'math_answer');
        $math_answer = is_array($math_answers) && ! empty($math_answers) ? end($math_answers) : null;
        if ($math_answer !== null && $captcha_math_input !== '' && $captcha_math_input === (string)$math_answer) {
            $is_captcha_ok = true;
        }
    }

    if (! $is_captcha_ok) {
        $errors['registration-captcha'] = $is_331_ok ?
                            '画像の文字または計算問題の答えを確認してください' :
                            '入力内容が間違っています';
        $errors['registration-captcha'] .= $is_333_ok ? '。文字と一致していません' : '';
        $is_error = true;
    }
}

// 新規登録
if ($vals['type'] == 'new') {
    if (! strpos(filter_input(INPUT_POST, 'email'), '@')) {
        $errors['email'] = $is_331_ok ?
                            'メールアドレスを確認してください' :
                            '入力内容が間違っています';
        $errors['email'] .= $is_333_ok ? '。@がありません' : '';
        $is_error = true;
    }
    if (preg_match('/^[0-9-]+$/', filter_input(INPUT_POST, 'phone')) === 0) {
        $errors['phone'] = $is_331_ok ?
                            '電話番号を確認してください' :
                            '入力内容が間違っています';
        $errors['phone'] .= $is_333_ok ? '。数字とハイフンのみを入力してください' : '';
        $is_error = true;
    }
}

if (strtolower(filter_input(INPUT_POST, 'agree_privacypolicy')) !== 'on') {
    $errors['agree_privacypolicy'] = $is_331_ok ?
                        '個人情報保護方針への同意について確認してください' :
                        '入力内容が間違っています';
// 不要でしょう。
//  $errors['agree_privacypolicy'].= $is_333_ok ? '' : '';
    $is_error = true;
}

// エラーを積んで元のページに追い返す
$preset = './register.php' . \Komarushi\main::modeString();

if ($is_error) {
    setcookie('errors', json_encode($errors), (time() + 86400), "/");
    header('location: ' . $preset);
    exit();
}

// 登録内容変更の場合はログインへ
if ($vals['type'] == 'renew') {
    $mode_string = \Komarushi\Main::modeString(false);
    $sep = empty($mode_string) ? '?' : '&';
    $your_id = rawurlencode((string)$vals['your-id']);
    $login = './login.php' . $mode_string . $sep . 'your-id=' . $your_id;
    header('location: ' . $login);
    exit();
}

// 3.3.4 エラー回避の十分な達成方法
$is_334_ok = isset(\Komarushi\Main::$test_pattern['3.3.4b']) && \Komarushi\Main::$test_pattern['3.3.4b'] == 'ok2';
if (isset($is_334_ok)) {
 // とりあえず何もしない
}

// 入力内容が正しいので、confirmに進む（開発中）
if (($_SERVER['REMOTE_ADDR'] == '180.235.36.239')) {
    $preset = './register-confirm.php' . \Komarushi\main::modeString();
    header('location: ' . $preset);
    exit();
}

// 入力内容が正しいので、Cookieを空にして、完了画面を表示する
setcookie('vals', '', time() - 10, "/");
setcookie('errors', '', time() - 10, "/");
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>フォームによる操作は成功しました：テスト対象外ページ</title>
</head>
<body>
<h1>フォームによる操作は成功しました：テスト対象外ページ</h1>
<p>このページはテスト対象外ページです。</p>
<p><a href="<?php echo $preset ?>">フォームに戻る</a></p>
</body>
</html>
