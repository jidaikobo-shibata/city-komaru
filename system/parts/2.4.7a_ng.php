<?php /* 部分的に見えなくなるフォーカスインジケータ */ ?>
<style>
#menu :focus, .menu-list :focus {
	outline: none !important;
}
.menu-list a:focus {
	background-color: #ffffff !important;
}
.menu-list a:focus::before {
	border-color: rgba(0, 0, 0, .4) !important;
}
</style>
