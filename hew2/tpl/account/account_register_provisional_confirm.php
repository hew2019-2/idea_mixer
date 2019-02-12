<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>アカウント仮登録フォーム/確認</title>
	</head>
<body>
<table border="0px">
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
</table>
</body>
</html>
