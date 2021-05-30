<?php /* フォーカスするだけではページ移動しない */ ?>

<?php
$vals = include('../practice/register-vals.php');
$checked = $vals['agree_privacypolicy'] === 'on' ? ' checked="checked"' : '';
?>

<p><a href="./privacypolicy.php"><?php komaruHtml('3.2.4a') ?>を読む</a></p>
<p><label><input type="checkbox" name="agree_privacypolicy"<?php echo $checked ?> /><?php komaruHtml('3.2.4a') ?>に同意する</label></p>
