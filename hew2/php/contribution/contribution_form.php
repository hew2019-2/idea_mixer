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

$sql = "SELECT name FROM categories";
$stmt = $dbh->query($sql);
$category_array = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {    // SELECT~LIMITクエリで取得したレコード全てをfetch
    $category_array[] = $row['name'];   // fetchした結果をレコード単位で配列$dispに保存
}
$dbh = null;

if (isset($_POST['next'])) {
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
  //初期ページの初期化

//ランダムボタンが押された時

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
   $m_c_error = 'カテゴリとメモの公開範囲の設定が正しくありません';
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
    header('Location:contribution_confirm.php');
    exit();
  }

}

require_once '../../tpl/contribution/contribution_form.php';
 ?>
