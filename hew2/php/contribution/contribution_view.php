<?php
   require_once '../../config.php';
   require_once '../../function/dbacces.php';
   require_once '../../function/func.php';
   // session_start();
   $dbh = database();
   $dbh -> SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
   $idea_id = 1;
   $account_id = 1;
//
//アイデア取得時の初期化
//
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
   $ideas = $dbh->query("SELECT user_id , keyword1 , keyword2 , category_id , reason , memo , range_sharewith_idea_switch , range_sharewith_memo_switch , created_at , updated_at FROM ideas WHERE id = '".$idea_id."' ");
   while ($row = $ideas->fetch(PDO::FETCH_ASSOC)){
     $user_id = $row['user_id'];
     $word1 = $row['keyword1'];
     $word2 = $row['keyword2'];
     $category_id = $row['category_id'];
     $reason_id = $row['reason'];
     $memo = $row['memo'];
     $idea_sharerange = $row['range_sharewith_idea_switch'];
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
   $category = $dbh->query("SELECT name FROM categories WHERE '".$category_id."' ");
   while ($row = $category->fetch(PDO::FETCH_ASSOC)){
     $category_name = $row['name'];
   }
   $name = '';
//アカウントの名前を取得
   $account = $dbh->query("SELECT name FROM users WHERE '".$account_id."' ");
   while ($row = $account->fetch(PDO::FETCH_ASSOC)){
     $name = $row['name'];
   }
   //
   //リプライがあった際保存するプログラム
   //
   $reply_err = '';
   if (!empty($_POST['reply_btn'])) {
      if ($_POST['reply'] == '') {
         $reply_err = 'コメント内容が入力されていません';
      }
      else{
      // $reply_user = $_SESSION['user_id'];
      $reply_user = 21;
      $reply_comment = $_POST['reply'];
      $reply = $dbh->prepare("INSERT INTO comments(idea_id,user_id,comment) VALUES('".$idea_id."','".$reply_user."','".$reply_comment."')");
      $reply->execute();
      }
      header('Location:contribution_view.php');
      exit;
   }
//コメントの初期化
   $comments = array();
//
//コメントとユーザーネーム取得
//
   $comments_sql = $dbh->query("SELECT comments.comment, users.name FROM comments LEFT OUTER JOIN users ON comments.user_id = users.id  WHERE '".$idea_id."'");
   while ($row = $comments_sql->fetch(PDO::FETCH_ASSOC)){
      $comment = $row['comment'];
      $comment_name = $row['name'];

      $comment = str_replace("\r\n", '　', $comment);
      $comments[] = array('comment'=>$comment,'name'=>$comment_name);
   }
//
//表示した際のフォローボタンか編集ボタンかを変える処理
//

//
//followがきた時の処理
//


//
//編集を押された時の処理
//


require_once '../../tpl/contribution/contribution_view.php';
