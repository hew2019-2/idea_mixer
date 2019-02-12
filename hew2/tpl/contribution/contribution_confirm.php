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
	<p>公開：<?php echo $range  ?></p>
	<p>テキスト一つ目</p>
	<p><?php echo $text1 ?></p>
	<p>×</p>
	<p>テキスト二つ目</p>
	<p> <?php echo $text2 ?> </p>
</div>

<div class='box2'>
	<dl class="">
		<dt>理由</dt>
			<dd> <?php echo $radio  ?> </dd>
		<dt>メモ公開：</dt>
			<dd> <?php echo $memo_range ?> </dd>
		<dt>メモ</dt>
			<dd> <?php echo $memo  ?> </dd>
	</dl>
</div>

<div class='box3'>
	<form class='' action="contribution_confirm.php" method='post'>
		<a href='contribution_confirm.php?back=back'>戻る</a>
		<a href='contribution_confirm.php'>投稿</a>
	</form>
</div>
</div>
</body>
</html>
