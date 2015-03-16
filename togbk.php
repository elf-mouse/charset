<?php
define('RN', '<br>');
define('LINE', '<hr>');

header('Content-Type: text/html;charset=utf-8');

$text = iconv('UTF-8', 'GBK', 'PHP：中文（简体）');

echo 'Page charset : UTF-8', LINE;
echo 'String encoding : ', mb_detect_encoding($text, 'ASCII, GB2312, GBK, BIG5, UTF-8'), RN;

echo 'Original : ', $text, LINE;
echo 'GB2312 -> UTF-8 : ', iconv('GBK', 'UTF-8', $text), RN;
