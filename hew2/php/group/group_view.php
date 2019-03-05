<?php
require_once '../../function/dbacces.php';
require_once '../../config.php';
session_start();
$_SESSION['login'] = 2;
if(isset($_SESSION['login'])){
	$dbh = database();
	$sql = "SELECT * FROM groups_tagmaps
			INNER JOIN groups ON groups_tagmaps.group_id = groups.id
			INNER JOIN ideas ON groups.id = ideas.group_id
			WHERE groups_tagmaps.user_id = ".$_SESSION['login'];
	$stmt = $dbh->query($sql);
	$result = $stmt -> fetchall(PDO::FETCH_ASSOC);
}
else{
	header('location:../../index.php');
}







require_once '../../tpl/group/group_view.php';
?>
