<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>投稿確認</title>
		<script type="text/javascript" src="....//js/jquery-2.0.2.min.js"></script>
		<script type="text/javascript">
		$('.display').css('display','none');
		$('#other').click(function(){
			$(this).after("<input type='text' name='other' class='display'>");
		});
		</script>
		<style>
			.display{display: hidden;}
		</style>
	</head>

<body>
<div class="container">
<h1>TOP</h1>
<h2>投稿</h2>
<form action="contribution_form.php" method="post">
	<select class='' name="category">
		<option value='default'>カテゴリを選択しください</option>
		<option value='IT'>IT</option>
		<option value='fashion'>ファッション</option>
		<option value='comedy'>一発芸</option>
		<option value='trovel'>旅行</option>
		<option value='game'>ゲーム</option>
		<option value='art'>絵</option>
		<option value='cooking'>料理</option>
	</select>
	<?php echo $category_err ?>
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
		<?php echo $range_err ?>
	</div>
	<div class='box2'>
		<input type='text' name='text1'>
			×
		<input type='text' name='text2'>
		<button type='button' name='randum'>ランダム</button>
		<?php echo $text_err ?>
	</div>

	<div class='box3'>
		<h3>※必ず一つの項目を選択、又は記入して下さい</h3>
		<h2>理由</h2>
		<input type='radio' name='radio' value='内容が面白そうだったから'>内容が面白そうだったから
		<input type='radio' name='radio' value='内容が斬新だったから'>内容が斬新だったから
		<input type='radio' name='radio' value='なんかぴんときたから'>なんか”ぴん”ときたから
		<input type='radio' name='radio' value='新しいものが作れそうだから'>新しいものが作れそうだから
		<input type='radio' name='radio' value='その他' id='other'>その他
		<div class='display'>
			<textarea name='other' rows="3" cols="30"></textarea>
		</div>
		<?php echo $radio_error ?>
	</div>

	<div class='box4'>
		<h2>メモ</h2><p>※任意でご記入ください</p>
		<select name='memo_range'>
			<option value='memo_default'>公開範囲</option>
			<option value='memo_all'>全体に公開</option>
			<option value='memo_1'>ティーム内に公開</option><!--デバック用php作成出来たら消して下さい-->
			<?php foreach ($team as $team): ?>
				<option value='memo_<?php echo $team?>'><?php echo $team ?></option><!--$team_numの初期値０をphp側で設定して下さい-->
			<?php endforeach; ?>
			<option value='memo_own'>自分だけに公開</option>
		</select>
		<textarea name='memo' rows='4' cols='40'></textarea>
	</div>

	<input type='submit' name='next' value='確認画面へ'>

</form>
<a href="php/contribution_form.php">投稿フォーム</a>
</div>
</body>
</html>
