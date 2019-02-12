<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>投稿フォーム</title>

	</head>

<body>
<div class="container">
<h1>TOP</h1>
<a href="php/contribution_form.php">投稿</a>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>投稿確認</title>

	</head>

<body>
<div class="container">
<h1>TOP</h1>
<h2>投稿</h2>
<form action="contribution_form.php" method="post">
	<select class='' name="category">
		<option value='IT'>IT</option>
		<option value='fashion'>ファッション</option>
		<option value='comedy'>一発芸</option>
		<option value='trovel'>旅行</option>
		<option value='game'>ゲーム</option>
		<option value='art'>絵</option>
		<option value='cooking'>料理</option>
	</select>
	<div class='box1'>
		<select name='range'>
			<option value='default'>公開範囲</option>
			<option value='all'>全体に公開</option>
			<option value='1'>ティーム内に公開</option><!--デバック用php作成出来たら消して下さい-->
			<?php foreach ($team as $team): ?>
				<option value='<?php echo $team?>'><?php echo $team ?></option><!--$team_numの初期値０をphp側で設定して下さい-->
			<?php endforeach; ?>
			<option value='own'>自分だけに公開</option>
		</select>
	</div>
	<div class='box2'>
		<input type='text' name='text1'>
			×
		<input type='text' name='text2' value=''>
	</div>

	<div class='box3'>
		<h3>※必ず一つの項目を選択、又は記入して下さい</h3>
		<h2>理由</h2>
		<input type='radio' name='radio' value='内容が面白そうだったから'>内容が面白そうだったから
		<input type='radio' name='radio' value='内容が斬新だったから'>内容が斬新だったから
		<input type='radio' name='radio' value='なんか”ぴん”ときたから'>なんか”ぴん”ときたから
		<input type='radio' name='radio' value='新しいものが作れそうだから'>新しいものが作れそうだから
		<input type='radio' name='radio' value='その他' id='other'>その他
		<input type='text' name='other'>
	</div>

	<div class='box4'>
		<h2>メモ</h2>
		<select name='memo_range'>
			<option value='memo_default'>公開範囲</option>
			<option value='memo_all'>全体に公開</option>
			<option value='memo_1'>ティーム内に公開</option><!--デバック用php作成出来たら消して下さい-->
			<?php foreach ($team as $team): ?>
				<option value='<?php echo $team_num++?>'><?php echo $team ?></option><!--$team_numの初期値０をphp側で設定して下さい-->
			<?php endforeach; ?>
			<option value='memo_own'>自分だけに公開</option>
		</select>

	</div>
</form>
<a href="php/contribution_form.php">投稿フォーム</a>
</div>
</body>
</html>
