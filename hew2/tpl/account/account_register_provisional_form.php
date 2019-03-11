<!DOCTYPE html>
<html lang="ja">
  <head>
  	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>アカウント仮登録フォーム/入力</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/account.css" rel="stylesheet" type="text/css">
  </head>

  <body>
		<?php require_once "../../tpl/choose_header.php"?>
			<center>
				<table border="0px">
				<tr>
					<td><?php echo $users->get_err_name();?></td>
				</tr>
				<tr>
					<td><?php echo $users->get_err_login_id();?></td>
				</tr>
				<tr>
					<td><?php echo $users->get_err_email();?></td>
				</tr>
				<tr>
					<td><?php echo $users->get_err_password();?></td>
				</tr>
		</table><br>
		<form action="../../php/account/account_register_provisional_form.php" method="post">

			<table border="1px">
				<tr>
					<th>氏名</th><td><input type="text" name="users_name" value="<?php echo $users->get_name();?>"></td>
				</tr>
				<tr>
					<th>ログインID</th><td><input type="text" name="users_login_id" value="<?php echo $users->get_login_id();?>"></td>
				</tr>
				<tr>
					<th>メールアドレス</th><td><input type="text" name="users_email" value="<?php echo $users->get_email();?>"></td>
				</tr>
				<tr>
					<th>パスワード</th><td><input type="text" name="users_password" value="<?php echo $users->get_password();?>"></td>
				</tr>
			</table>
			<tr>
				<td><input type="submit" name="confirm" value="確認"></td>
			</tr>
		</form></center>

    <!-- Footer -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">
      <div class="container">
        <div class="col-3">
          <a id="home" class="nav-link" href="./index.php">ホーム</a>
        </div>
        <div class="col-3">
          <a id="search" class="nav-link" href="#">検索</a>
        </div>
        <div class="col-3">
          <a id="mypage" class="nav-link" href="#">マイページ</a>
        </div>
        <div class="col-3">
          <a id="group" class="nav-link" href="#">グループ</a>
        </div>
      </div>
    </nav>

    <!-- Bootstrap core JavaScript -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>

  </body>
</html>
