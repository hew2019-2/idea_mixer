<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>投稿フォーム</title>
		<link rel="stylesheet" href="../../css/con_con.css">
	</head>

<body>
<div class="container">
<h1 class="top">投稿内容確認</h1>
<hr>
<div class='box1'>
	<dl class="">
		<dt>カテゴリー</dt>
			<hr>
			 <dd class="contents"><?php echo $category_set ?></dd>
		<dt>公開</dd>
			<hr>
			<dd class="contents"><?php echo $range_set  ?></dd>
		<dt>テキスト</dt>
		<hr>
		<div class="text_box">
			<dd class="text"><?php echo $text1 ?></dd>
			<span class="batu">×</span>
			<dd class="text"><?php echo $text2 ?></dd>
		</div>

	</dl>
</div>

<div class='box2'>
	<dl class="">
		<dt>理由</dt>
		<hr>
			<dd class="contents"><?php echo $radio_set  ?></dd>
		<dt>メモ公開</dt>
		<hr>
			<dd class="contents"> <?php echo $memo_range_set ?> </dd>
		<dt>メモ</dt>
		<hr>
			<dd class="contents"> <?php echo $memo  ?> </dd>
	</dl>
</div>

<div class='box3'>
	<form class="btn" action="contribution_confirm.php" method='post'>
		<a href='contribution_confirm.php?back=back'>戻る</a>
		<input type='submit' name='next' value='投稿を完了する' class="con_btn">
	</form>
</div>
</div>
</body>
</html>
