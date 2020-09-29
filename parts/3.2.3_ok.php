<nav id="global-nav">
<button type="button" aria-expanded="false" aria-controls="main-menu" id="bttn-nav">メニュー</button>
<div id="wrapper-menu">
<ul id="main-menu" style="display:none">
	<li><a href="./">トップページ</a></li>
	<li><a href="./fact.php">温暖化の状況</a></li>
	<li><a href="./register.php">会員登録</a></li>
</ul>
</div>
</nav>
<script>
	 jQuery (function($){
		 const $bttn = $('#bttn-nav'),
				 $menu = $('#'+$bttn.attr('aria-controls'));
		 $bttn.on('click', function(){
			 $menu.slideToggle(function(){
				 $bttn.attr('aria-expanded', $(this).is(':visible') );
			 });
		 });
	 });
</script>
