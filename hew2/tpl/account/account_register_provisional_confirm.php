<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../../function/func.php';
require_once '../../config.php';
require_once '../../class/user.php';
require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';
session_start();

// DBに登録し、complete画面に遷移
if (!empty($_POST['submit'])) {
    $users = $_SESSION['users'];
	session_unset($_SESSION['users']);		//セッション削除
    try {
        // DB接続(PDO)
        $pdo = new PDO ('mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8', DB_USER, DB_PASS);

        // ハッシュ化
		$stretch = rand(1000,10000);		//ストレッチ回数
		$salt = uniqid();			//ソルト値
		$hash_login_id = hash_value($salt,$stretch,$users->get_login_id());
		$hash_password = hash_value($salt,$stretch,$users->get_login_id());
		//日付取得
		$updated_at = date('Y-m-d H:i:s');
		$created_at = $updated_at;
        // SQL作成
        $sql = "INSERT INTO users (name, email, login_id,hash_login_id,
                                    hash_password, salt, stretch,
                                    updated_at, created_at, status)
                VALUES ('".$users->get_name()."', '".$users->get_email()."', '".$users->get_login_id()."',
                         '".$hash_login_id."','".$hash_password."', '".$salt."', '".$stretch."',
                        '".$updated_at."', '".$created_at."',0)";

        // SQL実行(DB登録)
        $pdo->query($sql);

		//メール送信
		$mail = new PHPMailer(true);

		try {
		  //smtpメール 認証情報
		  $host = 'qc20.quicca.com';
		  $username = 'reply@hal2018iw02.qcweb.jp'; // 送信元quiccaメールアドレス
		  $password = 'admin1234';  //quiccaメールアカウントのパスワード

		  //差出人
		  $from = 'reply@hal2018iw02.qcweb.jp';	//
		  $fromname = 'HAL';	//

		  //宛先
		  $to = $users->get_email();
		  $toname = $users->get_name();

		  //件名・本文
		  $subject = '仮登録ありがとうございます';
		  $body = 	'-----------------------------------------------------------'."\r\n".
		  			'もしも本メールにお心あたりがない場合は、そのまま本メールを破棄頂きますよう'."\r\n".
					'お願い申し上げます。'."\r\n".
					'-----------------------------------------------------------'."\r\n".
					$toname.'様'."\r\n".
		  			'本登録にお進みの場合は以下のURLをクリックし本登録にお進みください'."\r\n".
		  			'https://r4.quicca.com/~hew1902/php/account/account_register_success.php?id='.$hash_login_id;

		  //メール設定
		  $mail->SMTPDebug = 0; //デバッグ用
		  $mail->isSMTP();
		  $mail->SMTPAuth = true;
		  $mail->Host = $host;
		  $mail->Username = $username;
		  $mail->Password = $password;
		  $mail->SMTPSecure = 'ssl';
		  $mail->Port = 465;
		  $mail->CharSet = "utf-8";
		  $mail->Encoding = "base64";
		  $mail->setFrom($from, $fromname);
		  $mail->addAddress($to, $toname);
		  $mail->Subject = $subject;
		  $mail->Body    = $body;

		  //メール送信
		  $mail->send();

		} catch (Exception $e) {

		}

    } catch (PDOException $e) {
        // エラー出力
        var_dump($e->getMessage());
    }
    // DB切断
    $pdo = null;

    // account_register_provisional_success.phpに遷移
    header("location:account_register_provisional_success.php");
	//headerが使えない場合javascriptでページ遷移
	//echo '
	//<script type="text/javascript">

	//setTimeout("redirect()", 0);

	//function redirect() {
	//	location.href="https://r4.quicca.com/~hew1902/php/account/account_register_provisional_success.php";
	//}

	//</script>';
    exit;
}

// index.phpからstudentクラスをsession経由で取得
if (!empty($_SESSION['users'])) {
    $users = $_SESSION['users'];
}
// sessionが存在しない場合、inputに強制的に戻す
else {
    header("location:account_register_provisional_form.php");
    exit;
}



require_once '../../tpl/account/account_register_provisional_confirm.php';
?>
