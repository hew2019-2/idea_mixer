<?php
require_once '../../class/user.php';

$users = new users;

session_start();


// 確認ボタンを押した時の処理
if (!empty($_POST) && empty($_SESSION['users'])) {
    $users->set_name($_POST['users_name']);
    $users->set_login_id($_POST['users_login_id']);
    $users->set_email($_POST['users_email']);
    $users->set_password($_POST['users_password']);
    if ($users->check_error()) {
        $_SESSION['users'] = $users;
        header("location:account_register_provisional_confirm.php");
        exit;
    }
}
// confirm.phpから戻ってきた時の処理
if (!empty($_SESSION['users'])) {
    $users = $_SESSION['users'];
}
// セッション破棄
$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

// 初回アクセスはtplを読み込み
require_once '../../tpl/account/account_register_provisional_form.php';