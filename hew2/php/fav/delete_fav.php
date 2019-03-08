<?php
require_once '../../function/dbacces.php';
require_once '../../config.php';
session_start();
$_SESSION['login_id'] = 1;
$id = json_decode($_REQUEST['favonum']);
$dbh = database();
$sql = "DELETE FROM favorites_tagmaps
		WHERE idea_id = ".$id." AND user_id = ".$_SESSION['login_id'];
echo $sql;
$result = $dbh->query($sql);
$sql = "SELECT point FROM ideas WHERE id = ".$id;
$result = $dbh->query($sql);
$point = $result->fetch(PDO::FETCH_ASSOC);
$point['point']--;
$sql = "UPDATE ideas
		SET point = ".$point['point']."
		WHERE id = ".$id;
$dbh->query($sql);
$dbh = null;


 ?>
