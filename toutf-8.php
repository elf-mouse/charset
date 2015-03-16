<?php
define('RN', '<br>');
define('LINE', '<hr>');

header('Content-Type: text/html;charset=gbk');

$text = 'PHP：中文（简体）';

echo 'Page charset : GBK', LINE;
echo 'String encoding : ', mb_detect_encoding($text, 'ASCII, GB2312, GBK, BIG5, UTF-8'), RN;

echo 'Original : ', $text, LINE;
echo 'UTF-8 -> GB2312 : ', iconv('UTF-8', 'GBK', $text), RN;
echo 'UTF-8 -> GB2312 : ', iconv('UTF-8', 'GB2312//IGNORE', $text), RN;
