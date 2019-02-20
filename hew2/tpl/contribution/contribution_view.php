 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>投稿表示</title>
   </head>
   <body>
     <h1>投稿表示</h1>
     <div class='header'>
       <p class='logo'>TOP</p>
     </div>
     <form action="contribution_view.php" method="post">

     <div class='account'>
       <img src='account_image'>
       <p><?php $account_name ?></p>
       <?php //↓↓↓ここから↓↓↓ ?>
       <?php echo $button ?>
       <?php //↑↑↑ここまでをphpで処理する↑↑↑ ?>
     </div>
 <!-- ワードを表示 -->
     <div class='contents'>
       <p>カテゴリー：<?php echo $category_name //データベースからカテゴリを抽出する ?></p>
       <a href='#?word=<?php echo $word1 ?>'><?php echo $word1 //データベースからワード１を抽出する ?></a>
       <p>×</p>
       <a href='#?word=<?php echo $word2 ?>'><?php echo $word2 //データベースからワード２を抽出する ?></a>
       <p><?php $date ?></p>
     </div>
 <!-- 理由を表示 -->
     <div class='reason'>
       <dl class='reason_con'>
         <dt>理由：</dt>
         <dd><?php echo $reason //データベースから理由を抽出する ?></dd>
       </dl>
     </div>
     </hr>
 <!-- メモ表示 -->
     <div class='memo'>
       <dl class='memo_con'>
         <dt>メモ：</dt>
         <dd><?php echo $memo //データベースからメモを抽出 ?></dd>
       </dl>
     </div>

     <div class='reply'>
       <input type='text' name='reply'>
       <input type='submit' name='reply_btn' value='コメント'>
     </div>

     <div class='coments'>
       <dl>
         <dt>コメント</dt>
       <?php foreach ($comments as list('comment'=>$comment,'name'=>$name) ): ?>
         <dd> <?php echo $name ?> <img src="#"><?php echo $comment ?></dd>
       <?php endforeach; ?>
     </dl>
     </div>

   </form>
   </body>
 </html>
