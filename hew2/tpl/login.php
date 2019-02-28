<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>ログイン</title>

	</head>

<body>
<div class="container">
<h1>ログイン</h1>
<form action="login.php" method="post">
ログインID<input type="text" name="login_id" value="<?=$prof['login_id']?>"><span><?php echo $err_msg['login_id'];?></span>
<br />
パスワード<input type="password" name="login_password"><span><?php echo $err_msg['login_password'];?></span>
<br />
<button type="submit" name="status" value="login">ログイン</button>
</form>
</div>
</body>
</html>
