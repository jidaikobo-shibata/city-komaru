<?php /* メニューの名称が一貫していない */?>
<?php if (\Komarushi\Main::whoAmI() == 'fact'):  ?>
	<li><a href="./fact.php<?php echo \Komarushi\Main::modeString() ?>">ページ２</a></li>
<?php else: ?>
	<li><a href="./fact.php<?php echo \Komarushi\Main::modeString() ?>">温暖化の状況</a></li>
<?php endif; ?>
