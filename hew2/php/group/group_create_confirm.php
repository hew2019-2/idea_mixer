<?php
require_once '../../function/dbaccess.php';
require_once '../../config.php';
session_start();
$group_name = '';
if(isset($_SESSION['group_name'])){
	$group_name = $_SESSION['group_name'];
	if(isset($_GET['state'])){
		$updated_at = date('Y-m-d H:i:s');
		$created_at = $updated_at;
		$leader_id = 4500;
		$group_key = md5($leader_id.$group_name);
		$dbh = database();
		$sql = "INSERT INTO groups (name,leader_id,group_key,updated_at,created_at,status) VALUES('".$group_name."',$leader_id,'$group_key','$updated_at','$created_at',1)";
		$dbh->exec($sql);
		session_unset($_SESSION['group_name']);
		header('location:group_create_complete.php');
		exit;

	}
}
else{
	header('location:../../index.php');
}
require_once '../../tpl/group/group_create_confirm.php';
?>
