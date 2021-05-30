<?php /* フォーカスしただけでページ移動してしまう実装 */ ?>

<?php
$vals = include('../practice/register-vals.php');
$checked = $vals['agree_privacypolicy'] === 'on' ? ' checked="checked"' : '';
?>

<p><label for="str"><input type="checkbox" name="agree_privacypolicy"<?php echo $checked ?> onfocus="document.location='./privacypolicy.php';" /><?php komaruHtml('3.2.4a') ?>に同意する</label></p>
