<?php /* フォーカスしただけでページ移動してしまう実装 */ ?>

<?php
$vals = include('../practice/register-vals.php');
$checked = $vals['agree_privacypolicy'] === 'on' ? ' checked="checked"' : '';

$label_open = '<label>';
$label_close = '</label>';
if (\Komarushi\Main::getBarrierStatus('1.3.1g') == 'ng'):
    $label_open = '';
    $label_close = '';
endif;
?>

<p><?php echo $label_open ?><input type="checkbox" name="agree_privacypolicy"<?php echo $checked ?> onfocus="document.location='./privacypolicy.php';" /><?php komaruHtml('3.2.4a') ?>に同意する<?php echo $label_close ?></p>
