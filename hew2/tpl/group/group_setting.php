<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>グループ設定</title>
	</head>
<body>
<div class="container">
<h1>グループ設定</h1>
<form action="group_setting_complete.php" method="post">
	-----------------------------<br />
	グループ名:<input type="text" name="name" value="<?php echo $group['name'];?>">
	<br />
	-----------------------------<br />
	メンバー：
	<?php echo $member[0]['name']; array_shift($member);?>(リーダー)
	<?php foreach ($member as $user) { ?>
		<br />
		<input type="checkbox" value="<?php echo $user['id'];?>"><?php echo $user['name'];?>
	<?php }?>
	<br />
	-----------------------------
	<br />
	<button type="submit" name="submit" value="setting">確認</button>
</form>
<a href="php/group/group_top.php">グループTOPに戻る</a>
</div>
</body>
</html>
