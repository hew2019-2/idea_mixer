<?php
require_once '../../function/dbacces.php';
require_once '../../config.php';
session_start();
$_SESSION['login_id'] = 1;
$id = json_decode($_REQUEST['favonum']);
$dbh = database();
//お気に入り追加
$sql = "INSERT INTO favorites_tagmaps (user_id,idea_id,status)
		VALUES(".$_SESSION['login_id'].",".$id.",1)";
$result = $dbh->query($sql);
//お気に入りに追加された投稿のpoint取得
$sql = "SELECT point FROM ideas WHERE id = ".$id;
$result = $dbh->query($sql);
$point = $result->fetch(PDO::FETCH_ASSOC);
var_dump($point);
$point['point']++;
$sql = "UPDATE ideas
		SET point = ".$point['point']."
		WHERE id = ".$id;
$dbh->query($sql);
$dbh = null;



















 ?>
