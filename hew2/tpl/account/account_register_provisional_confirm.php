<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>アカウント仮登録フォーム/確認</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/account.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php require_once "../../tpl/choose_header.php"?>

	<center><table border="0px">
		<tr>
			<th>氏名</th><td><?php echo $users->get_name();?></td>
		</tr>
		<tr>
			<th>ログインID</th><td><?php echo $users->get_login_id();?></td>
		</tr>
		<tr>
			<th>メールアドレス</th><td><?php echo $users->get_email();?></td>
		</tr>
		<tr>
			<th>パスワード</th><td><?php echo $users->get_password();?></td>
		</tr>
		<tr>
			<td><form action="account_register_provisional_form.php" method="post"><input type="submit" name="back" value="戻る"></form></td>
			<td><form action="account_register_provisional_confirm.php" method="post"><input type="submit" name="submit" value="この内容で登録する"></form></td>
		</tr>
	</table></center>


<?php require_once "../../tpl/footer.php"?>
<!-- Bootstrap core JavaScript -->
<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>


</body>
</html>
