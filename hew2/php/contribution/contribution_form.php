<?php
session_start();
$text_err = '';
$range_err = '';
$radio_error = '' ;
$category_err = '';
if (isset($_POST['next'])) {
  $error_flag = '';//エラーフラグ
  if ($_POST['category'] == 'default') {//カテゴリのエラーチェック
    $category_err = 'カテゴリーが未選択です。';
    $error_flag = 'error';
  }
  else{//セッションに保存
    $_SESSION['category'] = $_POST['category'];
  }
  if ($_POST['range']=='default') {//公開範囲エラーチェック
    $error_flag = 'error';
    $range_err = '公開範囲が未選択です。';

  }
  else{
    $_SESSION['range']=$_POST['range'];
  }
  if($_POST['text1'] == '' || $_POST['text2'] == '') {//テキストのエラーチェック
    $error_flag = 'error';
    $text_err = 'テキストが未記入です。';
  }
  else{
    $_SESSION['text1'] = $_POST['text1'];
    $_SESSION['text2'] = $_POST['text2'];
  }
  if (empty($_POST['radio'])) {//理由の部分のエラーチェック
    $error_flag = 'error';
    $radio_error = '理由を選択してください。';
  }
  else{
    $_SESSION['radio'] = $_POST['radio'];
  }

  if ($_POST['memo_range'] != '') {//メモの公開範囲のをセッションに保存
    $_SESSION['memo_range'] = $_POST['memo_range'];
  }

  if ($_POST['memo'] != '' ) {//メモをセッションに保存
    $_SESSION['memo'] = $_POST['memo'];
  }

  if ($error_flag == '') {
    header('Location:contribution_confirm.php');
  }

}

require_once '../../tpl/contribution/contribution_form.php';
 ?>
