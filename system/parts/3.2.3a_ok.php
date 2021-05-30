<?php /* メニューの順序は一貫している */ ?>
<nav id="global-nav">
<button type="button" id="bttn-nav" class="bttn bttn-menu" aria-controls="main-menu" aria-expanded="false">メニュー</button>
<div id="wrapper-menu" class="wrapper-menu">
<ul id="main-menu" class="menu-list" style="display:none">
	<li><a href="./<?php echo \Komarushi\Main::modeString() ?>">トップページ</a></li>
<?php komaruHtml('3.2.4b'); ?>
	<li><a href="./register.php<?php echo \Komarushi\Main::modeString() ?>">会員登録</a></li>
</ul>
</div>
</nav>
