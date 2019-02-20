<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>投稿フォーム</title>
	</head>

<body>
<div class="container">
<h1>TOP</h1>
<div class='box1'>
	<p>カテゴリー <?php echo $category_set ?></p>
	<p>公開：<?php echo $range_set  ?></p>
	<p>テキスト一つ目</p>
	<p><?php echo $text1 ?></p>
	<p>×</p>
	<p>テキスト二つ目</p>
	<p> <?php echo $text2 ?> </p>
</div>

<div class='box2'>
	<dl class="">
		<dt>理由</dt>
			<dd> <?php echo $radio_set  ?> </dd>
		<dt>メモ公開：</dt>
			<dd> <?php echo $memo_range_set ?> </dd>
		<dt>メモ</dt>
			<dd> <?php echo $memo  ?> </dd>
	</dl>
</div>

<div class='box3'>
	<form class='' action="contribution_confirm.php" method='post'>
		<a href='contribution_confirm.php?back=back'>戻る</a>
		<input type='submit' name='next' value='投稿を完了する'>
	</form>
</div>
</div>
</body>
</html>
