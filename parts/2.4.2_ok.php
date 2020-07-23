<?php
$html = '';
switch ($file)
{
  case 'index';
  	$html = '<title>駒留市 地球温暖化防止課 | トップページ</title>';
  	break;
  case 'fact';
  	$html = '<title>駒留市 地球温暖化防止課 | 温暖化の状況</title>';
  	break;
  default;
  	$html = '<title>駒留市 地球温暖化防止課 | 会員登録</title>';
  	break;
}
echo $html;
