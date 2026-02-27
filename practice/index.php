<?php require('../system/init.php'); ?><!DOCTYPE html>
<?php komaruHtml('3.1.1a')  ?>
<head>
<?php include(__DIR__ . '/inc_header.php'); ?>
<?php komaruHtml('2.4.2a') ?>
</head>
<body class="toppage">

<?php if (\Komarushi\Main::getBarrierStatus('1.3.4a') == 'ng') : ?>
  <div class="portrait-warning">
    <p>駒瑠市のサイトはデバイスの向きを変更してご覧ください。</p>
  </div>
<?php endif; ?>

<?php include(__DIR__ . '/inc_error.php'); ?>
<?php komaruHtml('1.4.2a') ?>
<div id="outer-wrapper">
<div id="wrapper">
<header id="site-header">
    <div id="utilities">
    <?php komaruHtml('2.4.1b') ?>
    <a href="./login.php<?php echo \Komarushi\Main::modeString() ?>">会員ログイン</a>
    <?php komaruHtml('2.4.5a') ?>
    </div>
    <h1 id="logo"><?php komaruHtml('1.1.1b') ?> 地球温暖化防止課</h1>
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
</header>
<main id="main">
<div id="toppage-image" class="full-width">
<?php komaruHtml('2.1.1b') ?>
</div>
<div id="toppage-message">
    <div class="image"><img src="./images/mascot-chikyu-kun.png" width="153" height="184" alt="ちきゅうくん"></div>
    <?php komaruHtml('2.2.2b') ?>
    <div class="image"><img src="./images/mascot-komaru-kun.png" width="138" height="184" alt="こまるくん"></div>
</div>

<div id="toppage-news">
<h2 class="heading">お知らせ</h2>
<div class="content">
    <ul class="news-list">
        <li><a href="./information-each1.php<?php echo \Komarushi\Main::modeString() ?>">「駒瑠市環境イベント エこ・まるシェ」のお知らせ</a></li>
        <li><?php komaruHtml('1.3.1d') ?></li>
    </ul>
</div>
</div>

<div id="toppage-top">
    <?php komaruHtml('1.3.1c') ?>
</div>

<div class="movie">
    <iframe<?php komaruHtml('2.4.1c') ?> width="600" height="370" src="./inc_movie.php<?php echo \Komarushi\Main::modeString() ?>"></iframe>
    <?php if (\Komarushi\Main::getBarrierStatus('1.2a') == 'ok3') : ?>
    <details>
        <summary>動画「地球温暖が防止のためにあなたができること」テキスト</summary>
        <p>ナレータ：家庭から出る二酸化炭素の3割は照明や家電製品を使う時の電気です。</p>
        <p>（画面には、照明器具、電子レンジ、冷蔵庫、エアコンなどの家電製品）</p>
        <p>ナレータ：家電製品の付けっ放しを止めることから始めましょう。</p>
        <p>（画面では、人のいない部屋の照明の消灯、エアコンのスイッチオフ。テロップでは「エアコンの利用は気温に注意し無理な我慢をしないようにしてください」）</p>
        <p>ナレータ：自家用車からの持参か炭素の排出量は2割程度です。</p>
        <p>（画面には、空ぶかししている乗用車。エンジンキーを回し、空ぶかしを止める様子）</p>
        <p>ナレータ：公共交通機関の利用や、近場は自家用車を使わないなどの取り組みをしてみましょう</p>
        <p>（画面には、車を使わず、歩いている人の様子）</p>
        <p>ナレータ：お風呂の給湯は家庭から排出される二酸化炭素のうち2割程度です。節約を心がけましょう。</p>
        <p>（画面には、十分にお湯の溜まったお風呂。キュッと蛇口を閉じる音がして給湯が止まる）</p>
        <p>ナレータ：身近なことから始めましょう 駒瑠市。</p>
        <p>（画面には、駒瑠市のロゴ、身近なことから始めましょうのテロップ）</p>
    </details>
    <?php endif; ?>
</div>

<div id="toppage-bottom" class="full-width">
    <div id="toppage-bottom-inner" class="inner-wrapper">
        <section id="contact-us-area">
            <div class="content">
                <h2>問い合わせフォーム</h2>
                <p>駒瑠市の温暖化防止の取り組みについてのお問い合わせはこちらのフォームからお寄せください。</p>
        <?php komaruHtml('3.3.2a') ?>
             </div>
        </section>

        <section id="co2aday-area">
            <div class="content">
                <h2>駒瑠市の本日のCO<sub>2</sub>排出量</h2>
                <?php komaruHtml('2.2.2a') ?>
                <?php komaruHtml('1.4.5a') ?>
            </div>
        </section>
    </div>
</div>
</main>
<?php include(__DIR__ . '/inc_footer.php'); ?>
