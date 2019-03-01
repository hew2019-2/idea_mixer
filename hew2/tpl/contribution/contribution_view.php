 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>投稿表示</title>
     <link rel="stylesheet" href="../../css/con_view.css">
     <link rel="stylesheet" href="../css/con_view.css">
   </head>
   <body id="page-name-view">
      <div class="container_">
     <div class='header'>

     </div>
     <form action="contribution_view.php" method="post">

     <div class='account_'>
       <!-- <img src='account_image'> -->
       <p><?php $name ?></p>
       <a href="../../index.php">TOPへ</a>
       <?php echo $button ?>
     </div>
 <!-- ワードを表示 -->
 <div class="dummy"></div>
 <div class="idea_">
    <h2>アイデア</h2>
    <hr>
 </div>
     <div class='contents_'>
       <a href='#?word=<?php echo $word1 ?>' class="word_"><?php echo $word1 //データベースからワード１を抽出する ?></a>
       <div class="dummy"></div>
       <span class="batu_">×</span>
       <div class="dummy"></div>
       <a href='#?word=<?php echo $word2 ?>' class="word_"><?php echo $word2 //データベースからワード２を抽出する ?></a>
       <p><?php $date ?></p>
     </div>
     <div class="category_">
        <dl class="category_con_">
           <dt>カテゴリー</dt>
           <hr>
            <dd class="con_"><?php echo $category_name //データベースからカテゴリを抽出する ?></dd>
        </dl>
     </div>
 <!-- 理由を表示 -->
     <div class='reason_'>
       <dl class='reason_con_'>
         <dt>理由</dt>
         <hr>
         <dd class="con_"><?php echo $reason //データベースから理由を抽出する ?></dd>
       </dl>
     </div>
     </hr>
 <!-- メモ表示 -->
     <div class='memo_'>
       <dl class='memo_con_'>
         <dt>メモ</dt>
         <hr>
         <dd class="con_"><?php echo $memo //データベースからメモを抽出 ?></dd>
       </dl>
     </div>

     <div class='coments_'>
           <textarea name="reply" class="reply_" placeholder="コメントを記入"></textarea>
           <input type='submit' name='reply_btn_' value='コメント' class="reply_btn_">
       <dl>
         <dt>コメント</dt>
         <hr>
       <?php foreach ($comments as list('comment'=>$comment,'name'=>$name) ): ?>
         <dd class="come_con_"> <?php echo $name ?> <img src="#"></dd>
         <dd class=con_><?php echo h($comment) ?></dd>
         <hr>
       <?php endforeach; ?>
     </dl>
     </div>
  </div>

   </form>
   </body>
 </html>
