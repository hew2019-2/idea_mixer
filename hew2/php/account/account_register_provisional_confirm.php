<?php
require_once '../../config.php';
require_once '../../class/user.php';
session_start();

// DBに登録し、complete画面に遷移
if (!empty($_POST['submit'])) {
    $users = $_SESSION['users'];
    try {
        // DB接続(PDO)
        $pdo = new PDO ('mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8', DB_USER, DB_PASS);

        // ハッシュ化

        // SQL作成
        $sql = "INSERT INTO users (name, email, login_id,
                                    hash_password, salt, stretch,
                                    update_at, created_at, status)
                VALUES ('".$users->get_name()."', '".$users->get_email()."', '".$users->get_login_id()."',
                        '".$hash_password."', '".$salt."', '".$stretch."',
                        '".$update_at."', '".$created_at."', '".$status."')";

        // SQL実行(DB登録)
        $pdo->query($sql);

    } catch (PDOException $e) {
        // エラー出力
        var_dump($e->getMessage());
    }
    // DB切断
    $pdo = null;

    // account_register_provisional_success.phpに遷移
    header("location:account_register_provisional_success.php");
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