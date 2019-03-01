<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/bootstrap_con.css">
	<link rel="stylesheet" href="../../css/con_form.css">
	<title>投稿確認</title>
	<script type="text/javascript" src="../../js/jquery-2.0.2.min.js"></script>
	<style>
		.display{display: hidden;}
	</style>
</head>
<script type="text/javascript">
</script>
<body>
<div class="container">
<h1 class="top">投稿</h1>
<hr>
<form action="contribution_form.php" method="post">
	<!--
		投句のカテゴリー選択
	-->
	<div class="err_box">
		<ul>
			<li class='err'><?php echo $m_c_error ?></li>
			<li class='err'><?php echo $category_err//error表示 ?></li>
			<li class='err'><?php echo $range_err ?></li>
			<li class='err'><?php echo $text_err ?></li>
			<li class='err'><?php echo $radio_error ?></li>
		</ul>
	</div>
	<div class="select">
	<h2>カテゴリ・公開範囲の選択</h2>
	<hr>
	<div class="category">
			<select class='category_sel' name="category">
				<option value=0>カテゴリを選択しください</option>
				<?php
					$i = 1;
					foreach ($category_array as $value) {
						echo '<option value="'.$i.'">'.$value.'</option>';
						$i++;
					}
				?>
			</select>
		</div>
<!--
	公開範囲を選択
-->
		<div class='box1'>
			<select name='range' class="range_sel">
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
		<div class="dummy"></div>
	</div>
<!--
	アイデアの元とするワードの入力
 -->
	<div class='box2'>
		<h2>アイデアとして出す単語を記入</h2>
		<hr>
		<div class="input">
			<input type='text' name='text1' class=text1>
			<span class="batu">×</span>
			<input type='text' name='text2' id='word' class='text2'>
			<button type='button' name='random' id='random_word' onclick='click_event()'> <img src="../../image/random.png" class='random_img'> </button>
		</div>
	</div>

	<div class='box3'>
		<h2 class="inline">理由</h2>
		<span>※必ず一つの項目を選択、又は記入して下さい</span>
		<div class="dummy"></div>
		<hr>
		<div class="radio">
			<p class="radio_sel"><input type='radio' name='radio' value=1 id='hidden'>内容が面白そうだったから</p>
			<p class="radio_sel"><input type='radio' name='radio' value=2 id='hidden'>内容が斬新だったから</p>
			<p class="radio_sel"><input type='radio' name='radio' value=3 id='hidden'>なんか”ぴん”ときたから</p>
			<p class="radio_sel"><input type='radio' name='radio' value=4 id='hidden'>新しいが作れそうだから</p>
			<p class="radio_sel"><input type='radio' name='radio' value=5 id='other'>その他</p>
			<textarea name='other' rows="3" cols="30" id="show"></textarea>
			</p>
		</div>
	</div>

	<div class='box4'>
		<h2 class='inline'>メモ</h2><span>※任意でご記入ください</span>
		<div class="dummy"></div>
		<hr>
		<div class="memo">
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
	</div>
	<div class="submit">
		<input type='submit' name='next' value='投稿確認画面へ' class="sub_btn">
	</div>

</form>
</div>
<script type="text/javascript">
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
	$(".radio #hidden").click(function(){
		$('#show').hide(250);
	});

	$(".radio #other").click(function(){
		$('#show').slideToggle(250);
	});
</script>
</body>
</html>
