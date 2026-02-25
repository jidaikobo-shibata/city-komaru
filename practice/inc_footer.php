<?php
if (in_array(\Komarushi\Main::whoAmI(), ['fact', 'register', 'information-each1'])): ?>
<aside id="feedback">

<?php
if (\Komarushi\Main::getBarrierStatus('1.3.1e') == 'ng'):
	$h_element = 'p';
endif;
?>
<<?php echo isset($h_element) ? $h_element.' class="h2"' : 'h2' ?>>よりよい情報提供のために、このページのご感想をお寄せください。</<?php echo isset($h_element) ? $h_element : 'h2' ?>>

<form action="./do-not-test.php" method="POST">

<?php komaruHtml('3.3.2c') ?>

<label for="feedback-text" class="heading">このページについてご意見がありましたらご記入ください</label>
<textarea id="feedback-text"></textarea>
<?php komaruHtml('2.1.2b') ?>

<?php komaruHtml('4.1.2a') ?>

</form>
</aside>
<?php endif; ?>

<div class="full-width">
<footer id="site-footer" class="clearfix">
<div class="inner-wrapper col">
<div class="content">
<?php if (strpos(\Kontiki\Input::get('preset', ''), 'story') !== false): ?>
<nav id="foot-menu"><a href="./accessibility.php<?php echo \Komarushi\Main::modeString() ?>">アクセシビリティ方針</a></nav>
<?php endif; ?>
<p>駒瑠市 地球温暖化防止課<br>
City of Komaru. All rights reserved.<br>
<a href="../index.php#config">障壁（バリア）の設定</a></p>
<details>
<summary>current setting</summary>
<ul>
<?php
foreach (\Komarushi\Main::$test_pattern as $k => $v):
  if ($v === 'ok') continue;
	echo '<li>'.\kontiki\Util::s($k). '_' . \kontiki\Util::s($v) . '</li>';
endforeach;;
?>
</ul>
</details>
</div>
<div class="content">
<?php komaruHtml('1.1.1a') ?>
<?php komaruHtml('2.4.7a') ?>
<?php komaruHtml('1.4.1b') ?>
<?php komaruHtml('1.4.3c') ?>
<?php komaruHtml('1.4.3d') ?>
<?php komaruHtml('1.4.3e') ?>
</div>
</div>
</footer>
</div>
</div>
</div>
<?php komaruHtml('1.4.13a') ?>
<?php komaruHtml('2.1.2c') ?>
</body>
</html>
