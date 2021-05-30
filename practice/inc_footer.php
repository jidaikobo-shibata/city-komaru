<div class="full-width">
<footer id="site-footer" class="clearfix">
<div class="inner-wrapper col">
<div class="content">
<p>駒瑠市 地球温暖化防止課<br>
City of Komaru. All rights reserved.<br>
<a href="../index.php">config</a></p>
<details>
<summary>current setting</summary>
<ul>
<?php
foreach (\Komarushi\Main::$test_pattern as $k => $v):
  if ($v === 'ok') continue;
	echo '<li>'.\kontiki\Util::s($k).'</li>';
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
</div>
</div>
</footer>
</div>
</div>
</div>
</body>
</html>
