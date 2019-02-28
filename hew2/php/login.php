<?php
require_once '../config.php';
require_once '../function/func.php';

$prof = array (
    'login_id' => '',
    'login_password' => ''
);
$err_msg = array();

// ログインフォームで「ログイン」を押された時の処理
if (!empty($_POST) && isset($_POST['status']) && (string)$_POST['status'] === 'login') {
    foreach ($prof as $key => $value) {
        $prof[$key] = (string)$_POST[$key];
    }

    /* ↓   入力値のチェック   ↓ */
    // ・ログインIDとパスワード入力されているかチェック
    // どちらも未入力
    if ((string)$prof['login_id'] === '' &&  (string)$prof['login_password'] === '') {
        $err_msg['login_id'] = 'ログインIDが入力されていません。';
        $err_msg['login_password'] = 'パスワードが入力されていません。';
    }
    // IDだけ未入力
    elseif ((string)$prof['login_id'] === '' &&  (string)$prof['login_password'] !== '') {
        $err_msg['login_id'] = 'ログインIDが入力されていません。';
        $err_msg['login_password'] = 'もう一度入力してください。';
    }
    // パスワードだけ未入力
    elseif ((string)$prof['login_id'] !== '' &&  (string)$prof['login_password'] === '') {
        $err_msg['login_password'] = 'パスワードが入力されていません。';
    }
    // どちらも入力済み
    else {
        try {
            // DB接続(PDO)
            $dbh = new PDO ('mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8', DB_USER, DB_PASS);

            // IDが存在しているかチェック
            $sql = "SELECT stretch, salt FROM users WHERE login_id = '".$prof['login_id']."' AND status = 1";
            $dbc = $dbh->query($sql);
            if (!$row = $dbc->fetch(PDO::FETCH_ASSOC)) {    // IDが存在しない
                $err_msg['login_id'] = 'IDとパスワードの組み合わせが間違っています。';
                $err_msg['login_password'] = 'もう一度入力してください。';
            }
            else {      // IDが存在する
                // パスワードが一致しているかチェック
                $sql = "SELECT * FROM users WHERE login_id  = '".$prof['login_id']."' AND hash_password = '".hash_value($row['salt'], $row['stretch'], $prof['login_password'])."' AND status = 1";
                $dbc = $dbh->query($sql);
                if (!$row = $dbc->fetch(PDO::FETCH_ASSOC)) {    // パスワードが一致しない
                    $err_msg['login_id'] = 'IDとパスワードの組み合わせが間違っています。';
                    $err_msg['login_password'] = 'もう一度入力してください。';
                }
            }
        } catch (PDOException $e) {
            // エラー出力
            $errMsg = $e->getMessage();
        }
    }

    /* ↑   入力値のチェック   ↑ */
    // 入力内容に誤りが無い場合はindexに遷移する。誤りがある場合は再度入力フォームを表示する(ログインパスワード以外)
    if (empty($err_msg)) {
        $prof = array_merge($prof,array('id' => $row['id'], 'name' => $row['name']));
        $_SESSION['login'] = $prof;
        header("location:index.php");
        exit();
    }

    // 表示データの初期化(エラーメッセージ)
    foreach ($prof as $key => $value) {
        if (!isset($err_msg[$key])) {   // エラーメッセージが存在しない場合は空文字で初期化する
            $err_msg[$key] = '';
        }
    }
}


require_once '../tpl/login.php';

?>