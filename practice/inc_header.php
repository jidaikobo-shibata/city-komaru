	<!-- Global site tag (gtag.js) - Google Analytics 4 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-DHXC51JFPG"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-DHXC51JFPG');
	</script>

	<!-- Google analytics 3 -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-2627567-53', 'auto');
		ga('send', 'pageview');
	</script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=1000">
	<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />
	<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="./js/script.js"></script>
<?php komaruHtml('2.5.2a') ?>
	<link href="//use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
	<link rel="icon" href="./images/favicon.ico" />
<?php komaruHtml('1.4.4b') ?>

<?php
$share_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$share_title = $share_desc = '';

$share_strs  = \Komarushi\Main::getPresetMessages();
$share_title = $share_strs['title'] ?: '駒瑠市〜アクセシビリティ上の問題の体験サイト〜';
$share_desc  = $share_strs['description'] ?: 'アクセシビリティ上の問題を意図的に仕込んだサイトを生成します';
?>

<?php komaruHtml('2.1.4a') ?>

	<!-- OGP -->
	<meta property="og:locale" content="ja_JP" />
	<meta property="og:title" content="<?php echo $share_title ?>" />
	<meta property="og:description" content="<?php echo $share_desc ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $share_url ?>" />
	<meta property="og:site_name" content="駒瑠市〜アクセシビリティ上の問題の体験サイト〜" />
	<meta property="og:image" content="<?php echo dirname(dirname($share_url)) ?>/images/ogimage.png" />
	<meta name="twitter:card" content="summary" />
