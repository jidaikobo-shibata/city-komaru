<?php
require (__dir__.'/system/init.php');

$test_pattern_str = \Komarushi\Main::generateTestPatternCode();
\Komarushi\Main::setTestPatternCode(\Kontiki\Input::post('test_pattern_code', ''));

?><!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>駒瑠市〜アクセシビリティ上の問題の体験サイト〜</title>
	<!--Google analytics-->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-2627567-53', 'auto');
		ga('send', 'pageview');
	</script>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="images/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">

	<!-- js -->
	<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="js/script.js"></script>

	<!-- CSS -->
	<link rel="preconnect" href="//fonts.gstatic.com">
	<link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/layout.css?v=0" media="all">
<?php
$share_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'] .dirname($_SERVER['REQUEST_URI']).'/';
?>
	<!-- OGP -->
	<meta property="og:locale" content="ja_JP" />
	<meta property="og:title" content="駒瑠市〜アクセシビリティ上の問題の体験サイト〜" />
	<meta property="og:description" content="アクセシビリティ上の問題を意図的に仕込んだサイトを生成します" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $share_url ?>" />
	<meta property="og:site_name" content="駒瑠市〜アクセシビリティ上の問題の体験サイト〜" />
	<meta property="og:image" content="<?php echo $share_url ?>images/ogimage.png" />
	<meta name="twitter:card" content="summary" />

</head>
<body>
<div class="header">
	<div class="wrapper">
		<h1>
			 <ruby>駒瑠市<rp>（</rp><rt>こまるし</rt><rt lang="en" translate="no">Komaru City</rt><rp>）</rp></ruby>
			 <span class="sub">アクセシビリティ上の問題の体験サイト</span>
		</h1>
		<img src="images/site_image.png" alt="体験サイトのイメージ画像" width="600" height="333">
	</div>
</div>
<div class="wrapper">
<ul class="list summary">
	<li class="accessibility">アクセシビリティ上の問題を仕込んだサイトを生成します</li>
	<li class="assignment">勉強の教材、業務の資料としてお使いいただけます</li>
	<li class="free">用途にかかわらず無料でお使いいただけます</li>
</ul>
</div>
<section id="setting">
	<div class="wrapper">
		<h2>障壁（バリア）の設定</h2>
		<section id="setting_preset">
			<h3>プリセット版</h3>
			<p class="ac">問題をあらかじめ設定（プリセット）した駒瑠市サイトです。カスタマイズ版にのみ存在する障壁もあります。</p>

		<?php
		$presets = \Kontiki\Util::s(\Komarushi\Main::$message_presets);
		$preset_html = '';
		$preset_html.= '<ul id="preset" class="list">';
		foreach ($presets as $k => $v):
			if ($k[0] == '_') continue;
			$preset_html.= '<li><a href="practice/?preset='.\Kontiki\Util::s($k).'">'.$v[0].'</a><p>'.$v[1].'</p></li>';
		endforeach;
		$preset_html.= '</ul>';
		echo $preset_html;
		?>
		</section>
		<section id="setting_customize">
			<h3>カスタマイズ版</h3>
			<p class="ac">パターンコードからサイトを生成します</p>
		<ol class="list">
			<li><strong>障壁の設定</strong> サイトに実装する障壁の設定を行います。ランダムな問題生成か個別指定を選んでください</li>
			<li><strong>障壁パターンコードの出力</strong> 「障壁パターンコードを生成」のボタンを押すと、障壁パターンコードがこのページのtextareaに出力されます</li>
			<li><strong>サイトを生成</strong> 「サイトを生成する」を押すことで、設定に応じたサイトが生成されます</li>
		</ol>
		<p>※設定した障壁を使いまわしたい時には、この障壁パターンコードを保存しておいてください。ふたたびこのページのtextareaに貼付することで、おなじ障壁を再現できます<br />
※開発中のサービスですので、障壁の種類や箇所は随時変更があります。障壁パターンコードがうまく機能しなくなった場合は、障壁パターンコードを再生成してください</p>
		<form action="#test-pattern-str-exists" method="POST">
			<?php $ng_checked = \Kontiki\Input::post('code_type') != 'individual' ? ' checked="checked"' : ''; ?>
			<label class="block"><input type="radio" name="code_type" value="ng"<?php echo $ng_checked ?>> ランダムな問題を含んだ障壁パターンコードを生成</label>

			<details id="individual_set" class="block">
				<summary tabindex="-1"><label><input type="radio" name="code_type" value="individual"> 障壁を個別に指定</label><span id="summary_desc" class="description">設定項目を表示します<span></summary>
				<?php

				$criteria_path = __DIR__.'/system/resources/criteria.json';
				$criteria = file_exists($criteria_path) ?
									json_decode(file_get_contents($criteria_path), true) :
									array();

				$html = '';
				$patterns = \Kontiki\Util::s(\Komarushi\Main::$message_patterns);
				$prev_criterion = '';
				$html.= '<ul class="list">';
				foreach ($patterns as $cat => $messages):
					$criterion = preg_replace("/[a-z]/", "", $cat);
					$is_critreion_open = $prev_criterion != $criterion;
					if ($is_critreion_open && isset($criteria[$criterion])):
						if ( ! empty($prev_criterion)):
							$html.= '</ul>';
							$html.= '</fieldset>';
							$html.= '</li>';
						endif;

						$html.= '<li>';
						$html.= '<fieldset>';
						$html.= '<legend>'.$criterion.' '.$criteria[$criterion]['name'].'</legend>';
						$html.= '<ul>';
					endif;

					$html.= '<li>'.$cat.'<ul>';
					$n = 0;
					foreach ($messages as $file => $message):
						$checked = $n == 0 ? ' checked="checked"' : '';
						$n++;
						$cat4post = str_replace('.', '_', $cat);
						$html.= '<li><input'.$checked.' type="radio" name="'.$cat4post.'" value="'.$file.'" id="'.$cat4post.'_'.$file.'"><label for="'.$cat4post.'_'.$file.'">';
				//		$status = strpos($file, 'ok') !== false ? 'OK' : 'NG';
						$status = \Kontiki\Util::s(strtoupper($file));
						$html.= $status.': '.$message.'</label></li>';
					endforeach;
					$html.= '</ul></li>';

					$prev_criterion = $criterion;

				endforeach;

				$html.= '</ul>';
				$html.= '</fieldset>';

				echo $html;
				?>
			</details>
			<p><input type="submit" name="gen_test_pattern_code" value="障壁パターンコードを生成"></p>
		</form>
<section id="">
		<form action="./" method="POST">
		<h4 id="test-pattern-str-exists"><label for="test_pattern_code">障壁パターンコード</label></h4>
		<p id="test_pattern_code_description">※設定した障壁を使いまわしたい時には、障壁パターンコードを保存しておいてください。ふたたびこのtextareaに貼付することで、おなじ障壁を再現できます<br>
		※開発中のサービスですので、障壁の種類や箇所は随時変更があります。障壁パターンコードによるサイトの生成がうまく機能しなくなった場合は、障壁パターンコードを再生成してください</p>
<?php /* ?>
			<?php if (empty($test_pattern_str)): ?>
			<p><label for="test_pattern_code">障壁パターンコードを入力してください</label></p>
			<?php else: ?>
			<p><label for="test_pattern_code">「サイトを生成する」を押してください</label></p>
			<?php endif; ?>
<?php */ ?>
			<textarea name="test_pattern_code" id="test_pattern_code" aria-describedby="test_pattern_code_description" cols="35" rows="8"><?php echo $test_pattern_str ?></textarea>
			<p><input type="submit" value="サイトを生成する"></p>
		</form>
</section>
</section>
	</div>
</section>
<div class="wrapper">
	<div class="inner">
	<section>
		<h2 id="customize-by-url">URLによるカスタマイズ</h2>

		<p><code>?criteria=</code>の形式のURLを使うことで、個別に障壁や達成事例を設定できます。<code>criteria</code>が受け付けるのは、以下のような形式です。</p>

		<ul>
			<li><a href="./practice/?criteria=2.2.2">2.2.2全般の不具合を確認する（?criteria=2.2.2）</a></li>
			<li><a href="./practice/register.php?criteria=2.2.1a_ok2">簡単な操作で制限時間を延長できる（?criteria=2.2.1a_ok2）</a></li>
			<li><a href="./practice/register.php?criteria=3.3.1a_ok,3.3.3a_ng">エラーの特定ができるが、エラー修正の提案ができていない（?criteria=3.3.1a_ok,3.3.3a_ng）</a></li>
		</ul>
	</section>
	<section>
		<h2>注意事項</h2>
		<ul>
			<li>このサイトは「架空の地方自治体（駒瑠市・こまるし）のとある課のサイト」という設定でできています</li>
			<li>サイトには意図的にアクセシビリティ上の問題が仕込んであります。利用には不快感を伴うことがあります</li>
			<li>フォームの送信後のページなど、対象外の箇所には「試験対象外」というテキストが付与されています</li>
			<li>PDFによる情報提供が存在します。当然ながらHTMLで情報提供した方が良いのですが、このサイトでは、「『お知らせ』はPDFによる添付しかできない困ったCMSを使っている」というような設定だとご理解ください</li>
			<li>ブラウザで音声の自動再生をオフにしている場合で、自動再生の不具合を確認したい場合は、ブラウザの設定を調整してください</li>
			<li>「障壁の設定」では便宜上達成基準の番号ごとのまとまりを持っていますが、システムの都合上、必ずしも障壁の内容と達成基準の番号は一致しません</li>
			<li>現時点では、障壁はWCAG 2.0 AA（ダブルA）までの問題を実装しています</li>
			<li>意図的にアクセシビリティ上の問題を生成するため、HTMLの文法に誤った箇所が含まれている場合があります<!-- 。「4.1.1 構文解析」に関しては、対象としないようにしてください --></li>
			<li>いくつかの達成基準の項目について、障壁が実装されていないものがありますが、「2.3.1 3回の閃光又は閾値以下」の障壁については、将来的にも実装の予定はありません</li>
			<li>現在も制作を続けておりますので、バグが含まれている可能性があることをご了承ください</li>
		</ul>
	</section>
	<section>
		<h2>問い合わせ等</h2>
		<ul id="readme_vendor">
			<li><a href="https://www.jidaikobo.com"><img src="./images/logo_author.svg" class="a11yc_logo_author" alt="ロゴマーク" width="140" height="140">有限会社時代工房</a></li>
			<li><a href="https://twitter.com/jidaikobo"><img src="./images/Twitter_Logo_Blue.png" class="a11yc_logo_author" alt="Twitter Logo" width="140" height="140">時代工房のTwitter</a></li>
		</ul>
	</section>
	<section>
		<h2>Google Analyticsについて</h2>
		<p class="ac"><a href="https://marketingplatform.google.com/intl/ja/about/analytics/">Google Analytics</a>をつかってアクセス解析を行っています。</p>
	</section>
</div>
</div>
<footer>
	<div class="wrapper">
<div class="inner">
<div class="content">
制作：<a href="https://www.jidaikobo.com">有限会社時代工房</a><br>
ライセンス：<a href="https://github.com/jidaikobo-shibata/city-komaru/blob/master/LICENSE.txt">MIT</a><br>
動画・GIFアニメ作成協力：<a href="http://functiontales.com">FUNCTION TALES</a><br>
使っている音源は<a href="https://www.zapsplat.com">https://www.zapsplat.com</a>で取得しました。<br>
ご協力：<a href="https://twitter.com/momdo_">@momdo_</a>, <a href="https://twitter.com/securecat">@securecat</a>, <a href="https://twitter.com/yocco405">@yocco405</a>, naiki

</div>
	</div>
	</div>
</footer>
</body>
</html>
