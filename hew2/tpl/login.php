<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>ログイン</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/account.css" rel="stylesheet" type="text/css">
	</head>

<body>
	<?php require_once "choose_header.php"?>

	<div class="container">
	<p>ログイン</p>
	<form action="login.php" method="post">
	<P>ログインID<input type="text" name="login_id" value="<?=$prof['login_id']?>"><span><?php echo $err_msg['login_id'];?></p></span>
	<br />
	<p>パスワード<input type="password" name="login_password"><span><?php echo $err_msg['login_password'];?></p></span>
	<br />
	<button type="submit" name="status" value="login">ログイン</button>
	</form>
	</div>

<?php require_once "footer.php"?>
<!-- Bootstrap core JavaScript -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
