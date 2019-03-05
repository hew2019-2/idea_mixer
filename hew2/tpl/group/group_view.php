<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>グループ一覧</title>
	</head>
<body>
<div class="container">
<table>
	<tr>
		<td></td><td>グループ名</td><td></td><td></td>
	</tr>
	<?php foreach($result as $val){ ?>
	<tr>
		<td></td><td><?php echo $val['name'] ?></td><td><?php echo $val['name'] ?></td>
	</tr>
	<?php } ?>
</table>
<a href="php/group/group_top.php">グループTOPに戻る</a>
</div>
</body>
</html>
