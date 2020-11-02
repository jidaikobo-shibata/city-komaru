<?php
$backtrace = debug_backtrace();
$path = explode('/', $backtrace[0]['file']);
$file = array_pop($path);
$file = substr($file, 0, strrpos($file, '.'));
?>
<div class="full-width">
<footer id="site-footer" class="clearfix">
<div class="inner-wrapper col">
<div class="content">
<p>駒瑠市 地球温暖化防止課<br>
City of Komaru. All rights reserved.</p>
</div>
<div class="content">
<?php echoPracticeHtml('1.1.1a', 'index') ?>
<?php echoPracticeHtml('2.4.7b', $file) ?>

</div>
</div>
</footer>
</div>
</div>
</div>
</body>
</html>
