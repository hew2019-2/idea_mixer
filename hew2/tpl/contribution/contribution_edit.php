<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../css/bootstrap_con.css">
	<link rel="stylesheet" href="../../css/con_form.css">
	<title>投稿編集</title>
	<script type="text/javascript" src="../../js/jquery-2.0.2.min.js"></script>
</head>
<script type="text/javascript">
</script>
<body>
<div class="container">
<h1 class="top">投稿内容編集</h1>
<hr>
<form method="post" name="send" id="send">
	<!--
		投句のカテゴリー選択
	-->
	<div class="err_box">
		<ul>
			<li class='err'><?php echo $error_msg?></li>
			<li class='err'><?php echo $m_c_error ?></li>
			<li class='err'><?php echo $category_err//error表示 ?></li>
			<li class='err'><?php echo $range_err ?></li>
			<li class='err'><?php echo $text_err ?></li>
			<li class='err'><?php echo $radio_error ?></li>
		</ul>
	</div>
	<div class="select">
	<h2>カテゴリ・公開範囲の編集</h2>
	<hr>
	<div class="category">
			<select class='category_sel' name="category" id="category">
				<option value=0>カテゴリを選択しください</option>
				<?php
					$i = 1;
					foreach ($category_array as $value) {
						echo '<option value="'.$i.'" '. $cate[$i-1].'>'.$value.'</option>';
						$i++;
					}
				?>
			</select>
		</div>
<!--
	公開範囲を選択
-->
		<div class='box1'>
			<select name='range' class="range_sel" id="range">
				<option value=0>公開範囲</option>
				<option value=1 <?php echo $range[0] ?>>全体に公開</option>
				<!--デバック用php作成出来たら消して下さい-->
				<option value=2 <?php echo $range[1] ?>>チーム内に公開</option>
				<!-- ↑↑↑ここ↑↑↑ -->
				<?php foreach ($team as $team): ?>
					<option value='<?php echo $range_num?>'><?php echo $team ?></option><!--$team_numの初期値０をphp側で設定して下さい-->
					<?php $range_num++ ?>
				<?php endforeach; ?>
				<option value=<?php echo $range_num.$range[$range_num] ?>>自分だけに公開</option>
			</select>
		</div>
		<div class="dummy"></div>
	</div>
<!--
	アイデアの元とするワードの入力
 -->
	<div class='box2'>
		<h2>アイデアとして出す単語を編集</h2>
		<hr>
		<div class="input">
			<input type='text' name='text1' id="text1" class=text1 value="<?php echo $word1 ?>">
			<span class="batu">×</span>
			<input type='text' name='text2' id='text2' class='text2' value="<?php echo $word2 ?>">
			<button type='button' name='random' id='random_word' onclick='click_event()'> <img src="../../image/random.png" class='random_img'> </button>
		</div>
	</div>

	<div class='box3'>
		<h2>理由の編集</h2>
		<span class="attention">※その他を選択していた場合はも一度クリックしてください</span>
		<div class="dummy"></div>
		<hr>
		<div class="radio">
			<label><input type='radio' name='radio' value="内容が面白そうだったから" id='hidden' <?php echo $reason_selected[0] ?>>内容が面白そうだったから</label>
			<label><input type='radio' name='radio' value="内容が斬新だったから" id='hidden' <?php echo $reason_selected[1] ?>>内容が斬新だったから</label>
			<label><input type='radio' name='radio' value="なんかぴんときたから" id='hidden' <?php echo $reason_selected[2] ?>>なんかぴんときたから</label>
			<label><input type='radio' name='radio' value="新しいが作れそうだから" id='hidden' <?php echo $reason_selected[3] ?>>新しいが作れそうだから</label>
			<label><input type='radio' name='radio' value="その他" id='other' <?php echo $reason_selected[4] ?>>その他</label>
			<textarea name='other' rows="3" cols="30" id="show"><?php echo $other_reason ?></textarea>
		</div>
	</div>

	<div class='box4'>
		<h2>メモの編集</h2>
		<span class="attention">※任意でご記入ください</span>
		<div class="dummy"></div>
		<hr>
		<div class="memo">
			<select name='memo_range' id="memo_range">
				<option value=0>公開範囲</option>
				<option value=1 <?php echo $memo_range[0] ?>>全体に公開</option>
				<!--デバック用php作成出来たら消して下さい-->
				<option value=2 <?php echo $memo_range[1] ?>>チーム内に公開</option>
				<!-- ↑↑↑ここ↑↑↑ -->
				<?php foreach ($team as $team): ?>
					<option value='<?php echo $memo_range_num?>'><?php echo $team ?></option><!--$team_numの初期値０をphp側で設定して下さい-->
					<?php $memo_range_num++ ?>
				<?php endforeach; ?>
				<option value=<?php echo $range_num.$memo_range[$range_num] ?>>自分だけに公開</option>
			</select>
			<textarea name='memo' rows='4' cols='40' class='memo_con' id="memo_con"><?php echo $memo ?></textarea>
	</div>
	</div>
	<div class="submit">
		<button type="button" name="button" class="delete" onclick="delete_event()">削除する</button>
		<input type="submit" name="next" value="編集を完了する" class="sub_btn" onclick="edit_event()">
		<!-- <button type="button" name="button" class="sub_btn" type="submit" onclick="edit_event()">編集を完了する</button> -->
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
				document.getElementById("text2").value = response;
	        }
	    });
	}
	$.fn.resetForm = function() {
    var arr = this.serializeArray();
    if (!arr.length == 0) {
        $.each(arr, function() {
            if ($('#' + this.name).is(':checked')) {
                // for check box
                $('#' + this.name).prop('checked', false);
            } else if ($('input[name=' + this.name + ']:checked').is(':checked')) {
                // for radio box
                $('input[name=' + this.name + ']:checked').prop('checked', false);
            } else {
                $('#' + this.name).val("");

            }

        }); // ! $.each()
        return true;
    } else {
        return false;
    }

};

	$(".radio #hidden").click(function(){
		$('#show').slideUp();
	});
	$(".radio #other").click(function(){
		$('#show').slideDown();
	});
	$(function(){
		if ($('input[name=radio]:checked').val() === 'その他') {
			$('#show').slideDown();
		}
   });
	function delete_event(){
		var res = confirm("削除してもよろしいですか？");
   	if( res == true ) {
		 // OKなら移動
		 	alert('削除されました');
		 	location.href = "contribution_edit.php?delete=delete";
   	}
	};
	function edit_event(){
		var elements = document.getElementsByName("radio");
	// 選択状態の値を取得
		for ( var radio="", i=elements.length; i--; ) {
			if ( elements[i].checked ) {
				var radio = elements[i].value ;
				break ;
			}
		}
		var obj = document.getElementById("range");
	   var idx = obj.selectedIndex;       //インデックス番号を取得
	   var val = obj.options[idx].value;  //value値を取得
	   var txt1  = obj.options[idx].text;  //ラベルを取得

		var obj2 = document.getElementById("category");
		var idx2 = obj2.selectedIndex;       //インデックス番号を取得
		var val2 = obj2.options[idx2].value;  //value値を取得
		var txt2  = obj2.options[idx2].text;  //ラベルを取得

		var word1 = document.getElementById("text1").value;
		var word2 = document.getElementById("text2").value;

		var txt3 = document.getElementById("show").value;

		var obj4 = document.getElementById("memo_range");
	   var idx4 = obj4.selectedIndex;       //インデックス番号を取得
	   var val4 = obj4.options[idx4].value;  //value値を取得
	   var txt4  = obj4.options[idx4].text;  //ラベルを取得

		var txt5 = document.getElementById("memo_con").value;

		var res = confirm("変更内容はこちらでよろしいですか？"+"\n"+"\n"+
			"↓↓↓以下が変更後の内容です↓↓↓"+"\n"+
			"公開範囲："+txt1+"\n"+
			"カテゴリー："+txt2+"\n"+
			"単語"+word1+"×"+word2+"\n"+
			"理由："+radio+txt3+"\n"+
			"メモの公開範囲："+txt4+"\n"+
			"メモ："+txt5
		);
		if( res == true ) {
		 // OKなら移動
			alert('変更を実行します');
			document.send.submit();
			location.href = 'contribution_edit.php?edit=edit';
		}
		else{
			$('#send').resetForm();
		}
}
</script>
</body>
</html>
