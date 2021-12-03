<?php /* メニュー項目の順序が一貫していない実装 */ ?>
<nav id="global-nav">
<button type="button" id="bttn-nav" class="bttn bttn-menu" aria-controls="main-menu" aria-expanded="false">メニュー</button>
<div id="wrapper-menu" class="wrapper-menu">
<ul id="main-menu" class="menu-list" style="display:none">
	<li><a id="menu1" href="./<?php echo \Komarushi\Main::modeString() ?>">トップページ</a></li>
<?php if (\Komarushi\Main::whoAmI() == 'register'): ?>
	<li><a id="menu3" href="./register.php<?php echo \Komarushi\Main::modeString() ?>">会員登録</a></li>
	<?php komaruHtml('3.2.4b'); ?>
<?php else: ?>
	<?php komaruHtml('3.2.4b'); ?>
	<li><a id="menu3" href="./register.php<?php echo \Komarushi\Main::modeString() ?>">会員登録</a></li>
<?php endif; ?>
</ul>
</div>
</nav>
