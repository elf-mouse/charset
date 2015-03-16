<?php
header('Content-Type: text/html;charset=utf-8'); // 页头最好加上

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'test';

mysql_connect($host, $user, $pass) or die('Could not connect: ' . mysql_error());
mysql_select_db($db);
mysql_query('set names utf8'); // 在执行CRUD操作前先执行一下

$result = mysql_query('SELECT 1 FROM test_charset_table WHERE id = id LIMIT 1'); // 效率检查是否有数据
$row = mysql_fetch_array($result);
if (empty($row)) {
  $str = 'CHN 软件开发有限公司,JPN ソフトウェア開発株式会社,KOR 소프트웨어 개발 유한 공사,RUS Суд программного обеспечения' . time();
  $sql = "insert into test_charset_table (varchar1,varbinary1) values ('".$str."','".$str."')";
  echo $sql . '<hr>';
  mysql_query($sql);
}

if ($result = mysql_query('SELECT id,varchar1,varbinary1 FROM test_charset_table')) {
  while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
    printf('ID: %s,<br> varchar1: %s,<br> varbinary1: %s<hr>', $row[0], $row['varchar1'], $row['varbinary1']);
  }
  mysql_free_result($result);
}
