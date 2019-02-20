<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>投稿確認</title>
	<script type="text/javascript" src="../../js/jquery-2.0.2.min.js"></script>
	<style>
		.display{display: hidden;}
	</style>
</head>
<body>
<div class="container">
<h1>TOP</h1>
<h2>投稿</h2>
<form action="contribution_form.php" method="post">
	<!--
		投句のカテゴリー選択
	-->
	<p><?php echo $m_c_error ?></p>
	<?php echo $category_err//error表示 ?>
	<?php echo $range_err ?>
	<?php echo $text_err ?>
	<?php echo $radio_error ?>
	<select class='' name="category">
		<option value=0>カテゴリを選択しください</option>
		<?php
			$i = 1;
			foreach ($category_array as $value) {
				echo '<option value="'.$i.'">'.$value.'</option>';
				$i++;
			}
		?>
	</select>
<!--
	公開範囲を選択
 -->
	<div class='box1'>
		<select name='range'>
			<option value=0>公開範囲</option>
			<option value=1>全体に公開</option>
			<!--デバック用php作成出来たら消して下さい-->
			<option value=2>チーム内に公開</option>
			<!-- ↑↑↑ここ↑↑↑ -->
			<?php foreach ($team as $team): ?>
				<option value='<?php echo $team?>'><?php echo $team ?></option><!--$team_numの初期値０をphp側で設定して下さい-->
			<?php endforeach; ?>
			<option value=3>自分だけに公開</option>
		</select>
	</div>
<!--
	アイデアの元とするワードの入力
 -->
	<div class='box2'>
		<input type='text' name='text1'>
			×
		<input type='text' name='text2' id='word'>
		<button type='button' name='random' id='random_word' onclick='click_event()'>ランダム</button>
	</div>

	<div class='box3'>
		<h3>※必ず一つの項目を選択、又は記入して下さい</h3>
		<h2>理由</h2>
		<input type='radio' name='radio' value=1>内容が面白そうだったから
		<input type='radio' name='radio' value=2>内容が斬新だったから
		<input type='radio' name='radio' value=3>なんか”ぴん”ときたから
		<input type='radio' name='radio' value=4>新しいものが作れそうだから
		<input type='radio' name='radio' value=5 id='other'>その他
		<div class='display'>
			<textarea name='other' rows="3" cols="30"></textarea>
		</div>
	</div>

	<div class='box4'>
		<h2>メモ</h2><p>※任意でご記入ください</p>
		<select name='memo_range'>
			<option value=0>公開範囲</option>
			<option value='1'>全体に公開</option>
			<option value='2'>ティーム内に公開</option><!--デバック用php作成出来たら消して下さい-->
			<?php foreach ($team as $team): ?>
				<option value='2'><?php echo $team ?></option><!--$team_numの初期値０をphp側で設定して下さい-->
			<?php endforeach; ?>
			<option value='3'>自分だけに公開</option>
		</select>
		<textarea name='memo' rows='4' cols='40'></textarea>
	</div>

	<input type='submit' name='next' value='確認画面へ'>

</form>
</div>
<script type="text/javascript">
	// document.getElementById('random_word').onclick=function(){
	// document.getElementById('word').value='';
	//MAXのカラム数を取得
	function click_event(){
		$.ajax({
	        url: "../../php/contribution/dbaccess.php",
	        type: "POST",
	        success: function(response) {
	            // console.log("ajax通信に成功しました");
				document.getElementById("word").value = response;
	        }
	    });
	}
</script>
</body>
</html>
