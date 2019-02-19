<?php
    // サニタイズ
    function h($value) {
        return htmlspecialchars($value);
    }

	// PASS IDハッシュ化
	//引数1:ソルト 引数2:ストレッチ 引数3:ハッシュ化する文字列
	//戻り値:ハッシュ化後の文字列
	function hash_value($salt,$stretch,$str){
		for($i=0;$i<$stretch;$i++){			//ハッシュ化
			$hash = md5($salt.$str);
		}
		return $hash;
	}
