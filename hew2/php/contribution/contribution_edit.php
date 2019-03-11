<?php
require_once '../../config.php';
require_once '../../function/dbacces.php';
$dbh = database();
session_start();
$_SESSION['user_id'] = 2;
$user_id = 2;
$text_err = '';
$range_err = '';
$radio_error = '' ;
$category_err = '';
$m_c_error = '';
$rows['keyword'] = '';
$word1 = '';
$word2 = '';
$other_reason = '';
$memo = '';
$idea_id = 2;
$error_msg = '';
// $idea_id = $_REQUEST['edit'];

$ideas = $dbh->query("SELECT user_id , keyword1 , keyword2 , category_id , reason, memo , range_sharewith_idea_switch , range_sharewith_memo_switch , created_at , updated_at FROM ideas WHERE id = ".$idea_id."");
while ($row = $ideas->fetch(PDO::FETCH_ASSOC)){
  $user_id = $row['user_id'];
  $word1 = $row['keyword1'];
  $word2 = $row['keyword2'];
  $category_id = $row['category_id'];
  $reason = $row['reason'];
  $memo = $row['memo'];
  $idea_sharerange = $row['range_sharewith_idea_switch'];
  $memo_sharerange = $row['range_sharewith_memo_switch'];
  $date = $row['created_at'];
  $update = $row['updated_at'];
}
$cate_selected = $category_id;
$cate = array();
for ($i=1; $i <= 8; $i++) {
   if ($i == $cate_selected) {
      $cate[] = 'selected';
   }
   else{
      $cate[] = '';
   }
}
$range_selected = $idea_sharerange;
$range_num = 2;
$range = array();
for ($i=1; $i <= $range_num + 1; $i++) {
   if ($i == $range_selected) {
      $range[] = 'selected';
   }
   else{
      $range[] = '';
   }
}
$reason_array = array('内容が面白そうだったから','内容が斬新だったから','なんかぴんときたから','新しいが作れそうだから','その他');
$reason_selected = array();
$reason_flg = '';
for ($i=0; $i < 5 ; $i++) {
   if ($reason_array[$i] == $reason) {
      $reason_selected[] = 'checked';
      $reason_flg = 'yes';
   }
   elseif ($i == 4 && $reason_flg == '') {
      $reason_selected[] = 'checked';
      $other_reason = $reason;
   }
   else{
      $reason_selected[] = '';
   }
}

$memo_range_selected = $memo_sharerange;
$range_num = 2;
$memo_range = array();
for ($i=1; $i <= $range_num + 1; $i++) {
   if ($i == $memo_range_selected) {
      $memo_range[] = 'selected';
   }
   else{
      $memo_range[] = '';
   }
}
$sql = "SELECT name FROM categories";
$stmt = $dbh->query($sql);
$category_array = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {    // SELECT~LIMITクエリで取得したレコード全てをfetch
    $category_array[] = $row['name'];   // fetchした結果をレコード単位で配列$dispに保存
}
$dbh = null;


if (!empty($_POST['category']) || !empty($_POST['range'])  || !empty($_POST['radio'])) {
var_dump($category_array);

//
//エラーフラグ
//
  $error_flag = '';
//
//カテゴリのエラーチェック
//
  if ($_POST['category'] == 0) {
   $category_err = 'カテゴリーが未選択です。';
   $error_flag = 'error';
  }
  else{
    $_SESSION['category'] = $_POST['category'];
  }
//
//テキストのエラーチェック＆セッションに保存
//
  if($_POST['text1'] == '' || $_POST['text2'] == '') {
    $error_flag = 'error';
    $text_err = 'アイデアの項目が未記入です。';
  }
  else{
    $_SESSION['text1'] = $_POST['text1'];
      $word1 = $_POST['text1'];
    $_SESSION['text2'] = $_POST['text2'];
      $word2 = $_POST['text2'];
  }
//
//理由の部分のエラーチェック&セッションに保存
//
  if (empty($_POST['radio'])) {
    $error_flag = 'error';
    $radio_error = '理由を選択してください。';
  }
  else{
    $_SESSION['radio'] = $_POST['radio'];
    $_SESSION['other'] = $_POST['other'];
  }
//
//メモの公開範囲をセッションに保存
//
  if ($_POST['memo_range'] != '') {
    $_SESSION['memo_range'] = $_POST['memo_range'];
  }
//
//メモをセッションに保存
//
  if ($_POST['memo'] != '' ) {
    $_SESSION['memo'] = $_POST['memo'];
  }
//
//公開範囲とメモの範囲の設定がおかしかったらエラー
//
if ($_POST['range'] > $_POST['memo_range']) {
   $m_c_error = 'カテゴリとメモの公開範囲の設定が正しくありません。';
   $error_flag = 'error';
}
//
//公開範囲エラーチェック＆セッションに保存
//
  if ($_POST['range']==0) {
    $error_flag = 'error';
    $range_err = '公開範囲が未選択です。';
  }
  else{
    $_SESSION['range']=$_POST['range'];
  }
//
//エラーがなかった場合に次のページへ移動する
//
  if ($error_flag == '') {
     if ($category_id != $_POST['category']) {
        $sql = "UPDATE ideas SET category_id = '".$_POST['category']."' WHERE id = $idea_id";
        $category_up = $dbh->prepare($sql);
        $category_up->execute();
     }
     if ($idea_sharerange != $_POST['range']) {
        $sql = "UPDATE ideas SET range_sharewith_idea_switch = '".$_POST['range']."' WHERE id = $idea_id";
        $range_up = $dbh->prepare($sql);
        $range_up->execute();
     }
     if ($word1 != $_POST['word1']) {
        $sql = "UPDATE ideas SET keyword1 = '".$_POST['word1']."' WHERE id = $idea_id";
        $word1_up = $dbh->prepare($sql);
        $word1_up->execute();
     }
     if ($word2 != $_POST['word2']) {
        $sql = "UPDATE ideas SET keyword2 = '".$_POST['word2']."' WHERE id = $idea_id";
        $word2_up = $dbh->prepare($sql);
        $word2_up->execute();
     }
     if ($memo != $_POST['memo']) {
        $sql = "UPDATE ideas SET memo = '".$_POST['memo']."' WHERE id = $idea_id";
        $memo_up = $dbh->prepare($sql);
        $memo_up->execute();
     }
     if ($reason != $_POST['memo_range']) {
        $sql = "UPDATE ideas SET range_sharewith_memo_switch = '".$_POST['memo_range']."' WHERE id = $idea_id";
        $memo_range_up = $dbh->prepare($sql);
        $memo_range_up->execute();
     }

     $sql = "UPDATE ideas SET update_at = now() where id = ".$idea_id."";
    // header('Location:contribution_confirm.php');
    // exit();
  }
  else{
     $error_msg = '編集された内容に誤りがあったようです。';
 }
}
if (isset($_GET['delete'])) {
   var_dump($range);
}
require_once '../../tpl/contribution/contribution_edit.php';
 ?>
