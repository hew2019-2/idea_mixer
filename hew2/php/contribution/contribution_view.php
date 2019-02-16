<?php
require_once '../../config.php';
require_once '../../function/dbacces.php';
$dbh = database();//db接続
$idea_id = $_GET['idea_id'];
$account_id = '';
//アイデア取得時の初期化
$word1 = '';
$word2 = '';
$date = '';
$reason = '';
$memo = '';
$idea_sharerange = '';
$memo_sharerange = '';
$update = '';
//
//アイデア取得
//
$ideas = $dbh->query("SELECT user_id , keyword_id_1 , keyword_id_2 , category_id , reason_id , reason_otherwise , memo , range_sharewith_idea_witch , range_sharewith_memo_switch , created_at , updated_at FROM ideas WHERE '".$idea_id."' ");
while ($row = $ideas->fetch(PDO::FETCH_ASSOC)){
  $account_id = $row['user_id'];
  $word1 = $row['keyword_id_1'];
  $word2 = $row['keyword_id_2'];
  $category_id = $row['category_id'];
  $reason_id = $row['reason_id'];
  $reason_otherwise = $row['reason_otherwise'];
  $memo = $row['memo'];
  $idea_sharerange = $row['range_sharewith_idea_witch'];
  $memo_sharerange = $row['range_sharewith_memo_switch'];
  $date = $row['created_at'];
  $update = $row['updated_at'];
}
//カテゴリ取得時の初期化
$account_name = '';
$category = '';
//
//カテゴリの取得
//
$category = $dbh->query("SELECT category_name FROM categories WHERE '".$category_id."' ");
while ($row = $account->fetch(PDO::FETCH_ASSOC)){
  $category_name = $row['category_name'];
}
//初期化
$name = '';
//アカウントの名前を取得
$account = $dbh->query("SELECT name FROM users WHERE '".$account_id."' ");
while ($row = $account->fetch(PDO::FETCH_ASSOC)){
  $name = $row['name'];
}
//コメントの初期化
$coments = array();
//
//コメントとユーザーネーム取得
//
$coment = $dbh->query("SELECT comments.comment　AS 'comment' , users.name AS 'name' FROM comments INNER JOIN users ON comments.user_id = users.user_id  WHERE '".$idea_id."'");
while ($row = $account->fetch(PDO::FETCH_ASSOC)){
  $comment = $row['comment'];
  $comment_name = $row['name'];

  $comments[] = array('comment'=>$comment,'name'=>$comment_name);
}
//
//表示した際のフォローボタンか編集ボタンかを変える処理
//
if ($account_id == $user_id) {
  $button = "<button type='submit' name='edit' class='account_btn'>編集</button>";
}
else{
  $button = "<button type='submit' name='follow' class='account_btn'>フォロー</button>";
}
//
//リプライがあった際保存するプログラム
//
if (!empty($_POST['reply_btn'])) {
  $reply_comment = $_POST['reoly'];
  $reply = $dbh->prepare("INSERT INTO comments(idea_id,user_id,comment) VALUES('".$idea_id."','".$account_id."','".$reply_comment."')");
}
//
//followがきた時の処理
//


//
//編集を押された時の処理
//


require_once '../../tpl/contribution/contribution_view.php';
