<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>アカウント仮登録フォーム/入力</title>
	</head>
<body>
	<form action="../../php/account/account_register_provisional_form.php" method="post">
		<table border="0px">
			<tr>
				<th>氏名</th><td><input type="text" name="users_name" value="<?php echo $users->get_name();?>"></td><td><?php echo $users->get_err_name();?></td>
			</tr>
			<tr>
				<th>ログインID</th><td><input type="text" name="users_login_id" value="<?php echo $users->get_login_id();?>"></td><td><?php echo $users->get_err_login_id();?></td>
			</tr>
			<tr>
				<th>メールアドレス</th><td><input type="text" name="users_email" value="<?php echo $users->get_email();?>"></td><td><?php echo $users->get_err_email();?></td>
			</tr>
			<tr>
				<th>パスワード</th><td><input type="text" name="users_password" value="<?php echo $users->get_password();?>"></td><td><?php echo $users->get_err_password();?></td>
			</tr>
			<tr>
				<td><input type="submit" name="confirm" value="確認"></td>
			</tr>
		</table>
	</form>
</body>
</html>
