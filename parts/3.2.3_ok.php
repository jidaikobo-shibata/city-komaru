<?php /* メニューの順序は一貫している */ ?>
<nav id="global-nav">
<button type="button" id="bttn-nav" class="bttn bttn-menu" aria-controls="main-menu" aria-expanded="false">メニュー</button>
<div id="wrapper-menu" class="wrapper-menu">
<ul id="main-menu" class="menu-list" style="display:none">
	<li><a href="./">トップページ</a></li>
<?php echoPracticeHtml('3.2.4b', $file); ?>
	<li><a href="./register.php">会員登録</a></li>
</ul>
</div>
</nav>
