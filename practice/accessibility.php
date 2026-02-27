<?php require('../system/init.php'); ?><!DOCTYPE html>
<?php komaruHtml('3.1.1a') ?>
<head>
<?php include(__DIR__ . '/inc_header.php'); ?>
<?php komaruHtml('2.4.2a') ?>
</head>
<body class="register">
<?php komaruHtml('1.4.2a') ?>
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
<div class="inner-wrapper">
    <div id="utilities">
    <?php komaruHtml('2.4.1a') ?>
    <a href="./login.php<?php echo \Komarushi\Main::modeString() ?>">会員ログイン</a>
    <?php komaruHtml('2.4.5a') ?>
    </div>
    <div id="logo"><a href="./<?php echo \Komarushi\Main::modeString() ?>"><?php komaruHtml('1.1.1b') ?></a> 地球温暖化防止課</div>
    <div id="menu">
        <?php komaruHtml('3.2.3a') ?>
        <nav id="langage-nav">
            <button type="button" class="bttn-menu bttn" id="bttn-lang" aria-expanded="false" aria-controls="lang-menu" title="Language"><span class="fa fa-globe" aria-hidden="true"></span><span class="visually-hidden" lang="en">Language</span></button>
            <div id="wrapper-lang-menu" class="wrapper-menu">
                <ul id="lang-menu" class="menu-list" style="display:none">
                    <?php komaruHtml('3.1.2a') ?>
                </ul>
            </div>
        </nav>
        <?php komaruHtml('2.1.1a') ?>
        <?php komaruHtml('2.4.3a') ?>
    </div>
</div>
</header>
<main id="main">
<div id="page-header" class="full-width">
    <div class="inner-wrapper">
        <h1 class="heading">アクセシビリティ</h1>
    </div>
</div>

<div class="inner-wrapper">

<?php
// level check
$preset = \Kontiki\Input::get('preset', '');

if ($preset == 'ok-aa') :
    $minus_year = 1;
elseif ($preset == 'ok-a') :
    $minus_year = 2;
else :
    preg_match("/\d/", $preset, $m);
    $minus_year = isset($m[0]) ? intval($m[0]) : 1;
endif;
$this_year = date('Y') - $minus_year;

// year

// guideline
if ($minus_year == 4) :
    $guideline = 'ウェブコンテンツのJIS X 8341-3:2016 対応度表記ガイドライン - 2016年3月版（https://waic.jp/docs/jis2016/compliance-guidelines/201603/）';
elseif ($minus_year != 1) :
    $guideline = '<a href="https://waic.jp/docs/jis2016/compliance-guidelines/201603/">ウェブコンテンツのJIS X 8341-3:2016 対応度表記ガイドライン - 2016年3月版</a>';
else :
    $guideline = '<a href="https://waic.jp/docs/jis2016/compliance-guidelines/202104/">ウェブコンテンツのJIS X 8341-3:2016 対応度表記ガイドライン - 2021年4月版</a>';
endif;
?>

<?php if ($minus_year <= 2) :  ?>
<h2>ご挨拶</h2>

<p>駒瑠市地球温暖化防止課では、<?php echo $this_year - 2 ?>年より、駒瑠市市民の方に地球温暖化を防止するための情報や施策について紹介を始めました。しかし、地球温暖化を防止し、住みよい環境を維持していくためには、より多くの方に本ページの内容を知っていただき、より多くの方が温暖化防止に向けてできることを増やしていくことが重要だと考えました。</p>
<p>そのため、ウェブページの内容を充実させるのと同時に、ウェブページから誰でもどんなときも同じように情報を知ることができるように、ウェブページそのものについても改修を行うことにしました。改修にあたっては、アクセシビリティの日本産業規格にしたがって、いつでも誰でもウェブページの情報を得られるようになっているかどうかを確認する方針を作成し、試験を実施することとしました。試験結果は本ページで公開し、問題がある箇所が見つかった場合は、改善計画を作成した上で、公表しています。</p>

    <?php if ($minus_year == 1) :  ?>
<p><?php echo $this_year ?>年の試験では、JIS X 8341-3:2016適合レベルAAの試験を行い、地球温暖化防止のページすべてについて、基準を満たしている状態であることを確認できました。今後は、AAよりもさらに上の基準を目指すために、レベルAAAの基準についても試験を行う予定です。（「<a href="#additional-criteria">追加するAAAの達成基準</a>」参照）</p>
<p>駒瑠市では、市民の皆さまにより便利にウェブページを利用していただけるよう、また、より多くの方に駒瑠市について知っていただけるよう、駒瑠市ホームページについてもアクセシビリティ対応をすすめる予定です。</p>
<p>詳細については、決まり次第発表します。</p>
<p>また、試験に合格したページであっても、使いにくかったり、試験結果通りの状態ではないページを見つけた方は、ぜひ駒瑠市へお知らせください（<a href="#feedback">ご感想フォーム</a>）。</p>
        <?php
    endif;
endif;
?>

<h2>アクセシビリティ方針</h2>

<p>駒瑠市地球温暖化防止課ウェブサイトは、JIS X 8341-3:2016「高齢者・障害者等配慮設計指針－情報通信における機器、ソフトウェア及びサービス－第3部：ウェブコンテンツ」に基づき、ウェブアクセシビリティの向上を目指しています。</p>

<p>本方針における「準拠」という対応度の表記は、情報通信アクセス協議会ウェブアクセシビリティ基盤委員会「<?php echo $guideline; ?>」で定められた表記によります。</p>

<?php if ($minus_year != 4) : ?>
<h2>対象範囲</h2>
<p>https://a11yc.com/city-komaru/practice/ 以下のページ。</p>

    <?php if ($minus_year == 2) : ?>
    <p>PDFは試験の対象から除外しますが、PDF以外のコンテンツで内容を理解できるように努めます。</p>
    <?php elseif ($minus_year == 3) : ?>
    <p>PDFは対応が難しいため、試験の対象から除外します。</p>
    <?php endif; ?>

<h2>達成目標日</h2>
    <?php echo $this_year ?>年3月末日
<?php endif; ?>

<?php if ($minus_year == 1) : ?>
<h2 id="additional-criteria">追加するレベルAAAの達成基準</h2>
<ul>
    <li>2.2.3 タイミング非依存</li>
    <li>2.3.2 3回のせん（閃）光</li>
    <li>3.1.3 一般的ではない用語</li>
    <li>3.1.4 略語</li>
</ul>
<?php endif; ?>

<?php if ($minus_year != 4) : ?>
<h2>これまでの取組み</h2>
<ul>
    <?php $tmp_year = $minus_year == 3 ? $this_year : ($minus_year == 2 ? $this_year - 1 : $this_year - 2 ); ?>
    <li><?php echo $tmp_year ?>年、アクセシビリティ改修を行う。この年の改修では動画以外のアクセシビリティの改善を行い、試験結果はA一部準拠となった</li>
    <?php if ($minus_year <= 2) : ?>
    <li><?php echo $tmp_year + 1 ?>年、動画について予算内で行える対応（書き起こしテキストの付与）を行った。試験結果はAA一部準拠となった</li>
        <?php if ($minus_year == 1) : ?>
    <li><?php echo $tmp_year + 2 ?>年、動画とPDFについてアクセシビリティの改善を行い、AA準拠となった。</li>
        <?php endif; ?>
    <?php endif; ?>
</ul>
<?php endif; ?>

<?php
if ($minus_year == 4) :
    ?>
<b>アクセシビリティ方針</b>
<p>・アクセシビリティの適合レベルAA<br>
・対象範囲 全ページ</p>
    <?php
else :
    ?>
<h2>試験結果</h2>
<table class="table auto">
<tr>
    <th>表明日</th>
    <td><?php echo $this_year ?>年3月31日</td>
</tr>
<tr>
    <th>規格の規格番号及び改正年</th>
    <td>JIS X 8341-3:2016</td>
</tr>
<tr>
    <th>目標とする適合レベル</th>
    <td>AA</td>
</tr>
<tr>
    <th>満たしている適合レベル</th>
    <td><?php if ($minus_year == 3) :
        ?>A一部準拠<?php
        elseif ($minus_year == 2) :
            ?>AA一部準拠<?php
        else :
            ?>AA準拠<?php
        endif; ?>
</td>
</tr>
<tr>
    <th>対象となるウェブページに関する簡潔な説明</th>
    <td>駒瑠市地球温暖化防止課のウェブサイト</td>
</tr>
<tr>
    <th>試験対象のウェブページを選択した方法</th>
    <td>全てのウェブページを選択</td>
</tr>
<tr>
    <th>依存したウェブコンテンツ技術のリスト</th>
    <td>HTML / CSS / JavaScript<?php if ($minus_year == 1) :
        ?> / PDF<?php
                               endif; ?></td>
</tr>
<tr>
    <th>試験実施期間</th>
    <td><?php echo $this_year ?>年2月1日から<?php echo $this_year ?>年2月10日</td>
</tr>
</table>
<?php endif; ?>

<?php if ($minus_year != 4) : ?>
<h3>試験の記録</h3>
<ul>
    <?php $tmp_year = $minus_year == 3 ? $this_year : ($minus_year == 2 ? $this_year - 1 : $this_year - 2 ); ?>
    <li><a href="./download/accessibility-report-01.xlsx"><?php echo $tmp_year ?>年の達成基準チェックリストと試験対象のウェブページ（Excel形式, 30KB）</a></li>
    <?php if ($minus_year <= 2) : ?>
    <li><a href="./download/accessibility-report-02.xlsx"><?php echo $tmp_year + 1 ?>年の達成基準チェックリストと試験対象のウェブページ（Excel形式, 29KB）</a></li>
        <?php if ($minus_year == 1) : ?>
    <li><a href="./download/accessibility-report-03.xlsx"><?php echo $tmp_year + 2 ?>年の達成基準チェックリストと試験対象のウェブページおよび実装チェックリスト（Excel形式, 105KB）</a></li>
        <?php endif; ?>
    <?php endif; ?>
</ul>
<?php endif; ?>

<?php if ($minus_year == 1) : ?>
<h2>ウェブアクセシビリティ方針取組確認・評価結果</h2>
<ul>
    <li><a href="./download/hyoukahyo.pdf">ウェブアクセシビリティ方針取組確認・評価結果（PDF, 73KB）</a></li>
</ul>
<?php endif; ?>

</div>
</main>

<?php include(__DIR__ . '/inc_footer.php'); ?>
