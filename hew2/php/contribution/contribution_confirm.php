<?php
require_once '../../config.php';
require_once '../../function/dbacces.php';
session_start();
//
//セッションの値を変数に保管
//
$user_id = $_SESSION['user_id'];
$range = $_SESSION['range'];
switch ($range) {
   case 1:
      $range_set = '全体に公開';
      break;
   case 2:
      $range_set = 'チーム内に公開';
      break;
   case 3:
      $range_set = '自分だけに公開';
      break;
}
$category = $_SESSION['category'];
switch ($category) {
   case 1:
      $category_set = 'IT';
      break;
   case 2:
      $category_set = 'ファッション';
      break;
   case 3:
      $category_set = '一発芸';
      break;
   case 4:
      $category_set = '旅行';
      break;
   case 5:
      $category_set = 'ゲーム';
      break;
   case 6:
      $category_set = '絵';
      break;
   case 7:
      $category_set = '料理';
}
$text1 = $_SESSION['text1'];
$text2 = $_SESSION['text2'];
$radio = $_SESSION['radio'];
switch ($radio) {
   case 1:
      $radio_set = '内容が面白そうだったから';
      break;
   case 2:
      $radio_set = '内容が斬新だったから';
      break;
   case 3:
      $radio_set = 'なんかピンときたから';
      break;
   case 4:
      $range_set = '新しいものが作れそうだから';
      break;
   case 5:
      $range_set = 'その他';
      break;
}
$other = $_SESSION['other'];
//
//変数の初期化
//
$group_id = 0;
$memo = '';
$memo_range = 0;
//
//メモが書かれていた際変数に保存
//
if ($_SESSION['memo_range'] != 0 ) {
  $memo_range = $_SESSION['memo_range'];
}
switch ($memo_range) {
   case 0:
      $memo_range_set = '未選択';
      break;
   case 1:
      $memo_range_set = '全体に公開';
      break;
   case 2:
      $memo_range_set = 'チーム内に公開';
      break;
   case 3:
      $memo_range_set = '自分だけに公開';
      break;
}
//
//メモの値を保存値が入っていなかったらなしを保存
//
if (isset($_SESSION['memo'])) {
  $memo = $_SESSION['memo'];
}
else{
  $memo = 'なし';
}
//
//データベース接続
//
$dbh = database();
$dbh -> SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$mes = 'point';
$point = 0;
$status = 0;
if (!empty($_GET['back'])) {
   header('Location:contribution_form.php');
}
if (isset($_POST['next'])) {
  $contribute = $dbh->prepare("INSERT INTO ideas(user_id, keyword_id_1, keyword_id_2, category_id, idea_point, group_id, reason_id, reason_otherwise, memo, range_sharewith_idea_switch, range_sharewith_memo_switch, status, created_at, updated_at) VALUES ('".$user_id."','".$text1."','".$text2."','".$category."','".$point."','".$group_id."','".$radio."','".$other."','".$memo."','".$range."','".$memo_range."',1,now(),now())");
  $contribute->execute();
  header('Location:../index.php');
}

require_once '../../tpl/contribution/contribution_confirm.php';

 ?>
