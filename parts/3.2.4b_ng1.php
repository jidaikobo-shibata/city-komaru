<?php /* メニューの名称が一貫していない */
$parthtml = '';
switch ($file)
{
  case 'fact';
  	$parthtml = '	<li><a href="./fact.php">ページ２</a></li>';
  	break;
  default;
  	$parthtml = '	<li><a href="./fact.php">温暖化の状況</a></li>';
  	break;
}
echo $parthtml;
