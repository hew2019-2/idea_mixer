<?php
session_start();

$memo = '';
$memo_range = '';

$range = $_SESSION['range'];
$category = $_SESSION['category'];
$text1 = $_SESSION['text1'];
$text2 = $_SESSION['text2'];
$radio = $_SESSION['radio'];
if (isset($_SESSION['memo_range'])) {
  $memo_range = $_SESSION['memo_range'];
}
if (isset($_SESSION['memo'])) {
  $memo = $_SESSION['memo'];
}
else{
  $memo = 'なし';
}



require_once '../../tpl/contribution/contribution_confirm.php';

 ?>
