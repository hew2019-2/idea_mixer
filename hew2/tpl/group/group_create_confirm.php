<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>TOP</title>

	</head>

<body>
<div class="container">
<table border="1">
	<tr><th>グループ名</th></tr>
	<tr><td><?php echo $group_name; ?></td></tr>
</table>
<form action="group_create_confirm.php" method="get">
	<input type="submit" value="登録" name="state">
</form>
</div>
</body>
</html>
