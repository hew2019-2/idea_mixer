<?php
session_start();
require_once '../../config.php';
$row['id'] = '2';
$_SESSION['login'] = $row;
if ($_GET['group_key']) {
    $user = $_SESSION['login'];
    try {
        // DB接続(PDO)
        $dbh = new PDO ('mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8', DB_USER, DB_PASS);
        // IDが存在しているかチェック
        $sql = "SELECT * FROM groups WHERE group_key = '".$_GET['group_key']."' AND status = 1";
        $dbc = $dbh->query($sql);
        $group = $dbc->fetch(PDO::FETCH_ASSOC);

        $sql = "INSERT INTO `groups_tagmaps` (`group_id`, `user_id`, `status`) VALUES ('".$group['id']."', '".$user['id']."', 1)";
        $dbc = $dbh->query($sql);
    } catch (PDOException $e) {
        // エラー出力
        $errMsg = $e->getMessage();
    }

}
require_once '../../tpl/group/group_join.php';