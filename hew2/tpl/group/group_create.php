<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>create group</title>

	</head>

<body>
<div class="container">
<h1>create group</h1>
<form action="./group_create.php" method="get">
<label>グループ名:</label>
<input type="text" name="group_name">
<span style="color:red;"><?php echo $err_msg; ?></span><br>
<input type="submit" value="登録">
</form>
</div>
</body>
</html>
