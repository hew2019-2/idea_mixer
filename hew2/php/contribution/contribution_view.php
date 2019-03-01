 <!DOCTYPE html>
 <html lang="ja" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>投稿表示</title>
     <link rel="stylesheet" href="../../css/con_view.css">
   </head>
   <body>
      <div class="container">
     <div class='header'>

     </div>
     <form action="contribution_view.php" method="post">

     <div class='account'>
       <!-- <img src='account_image'> -->
       <p><?php $name ?></p>
       <a href="../../index.php">TOPへ</a>
       <?php echo $button ?>
     </div>
 <!-- ワードを表示 -->
 <div class="dummy"></div>
 <div class="idea">
    <h2>アイデア</h2>
    <hr>
 </div>
     <div class='contents'>
       <a href='#?word=<?php echo $word1 ?>' class="word"><?php echo $word1 //データベースからワード１を抽出する ?></a>
       <div class="dummy"></div>
       <span class="batu">×</span>
       <div class="dummy"></div>
       <a href='#?word=<?php echo $word2 ?>' class="word"><?php echo $word2 //データベースからワード２を抽出する ?></a>
       <p><?php $date ?></p>
     </div>
     <div class="category">
        <dl class="category_con">
           <dt>カテゴリー</dt>
           <hr>
            <dd class="con"><?php echo $category_name //データベースからカテゴリを抽出する ?></dd>
        </dl>
     </div>
 <!-- 理由を表示 -->
     <div class='reason'>
       <dl class='reason_con'>
         <dt>理由</dt>
         <hr>
         <dd class="con"><?php echo $reason //データベースから理由を抽出する ?></dd>
       </dl>
     </div>
     </hr>
 <!-- メモ表示 -->
     <div class='memo'>
       <dl class='memo_con'>
         <dt>メモ</dt>
         <hr>
         <dd class="con"><?php echo $memo //データベースからメモを抽出 ?></dd>
       </dl>
     </div>


     <div class='coments'>
        <input type='text' name='reply'>
        <input type='submit' name='reply_btn' value='コメント'>
       <dl>
         <dt>コメント</dt>
         <hr>
       <?php foreach ($comments as list('comment'=>$comment,'name'=>$name) ): ?>
         <dd class="come_con"> <?php echo $name ?> <img src="#"></dd>
         <dd class=con><?php echo $comment ?></dd>
         <hr>
       <?php endforeach; ?>
     </dl>
     </div>
  </div>

   </form>
   </body>
 </html>
