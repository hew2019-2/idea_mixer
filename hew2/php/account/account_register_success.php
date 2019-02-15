<?php
require_once '../../config.php';


if(isset($_GET['id'])){
	try {
		// DB接続(PDO)
		$pdo = new PDO ('mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8', DB_USER, DB_PASS);
		$sql = "SELECT status FROM users WHERE hash_login_id = '".$_GET['id']."'";		//本登録済みかどうかステータスを取得
		$status = $pdo->query($sql);
		$pdo = null;
		$status = $status->fetch(PDO::FETCH_ASSOC);//結果を取得
		if($status['status'] == 1){		//既に本登録されいる場合完了済みページへ遷移
			header ('location: ./account_register_already_created.php');
			$pdo = null;
			exit;
		}
	}
	catch (PDOException $e) {
		// エラー出力
		var_dump($e->getMessage());
	}





	try {
		// DB接続(PDO)
		$pdo = new PDO ('mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8', DB_USER, DB_PASS);
		$sql = "UPDATE users SET status = 1 WHERE hash_login_id = '".$_GET['id']."'";		//hashIDに対応するuserのstatusを1にする
		$pdo->query($sql);

  	}
	catch (PDOException $e) {
		// エラー出力
		var_dump($e->getMessage());
	}
	// DB切断
	$pdo = null;
}
else{
	header ('location: ../../index.php');
	exit;
}







require_once '../../tpl/account/account_register_success.php';
 ?>
