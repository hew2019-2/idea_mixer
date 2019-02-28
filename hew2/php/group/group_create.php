<?php
require_once '../../function/dbaccess.php';
require_once '../../config.php';
session_start();
$err_msg = '';

if(isset($_GET['group_name'])){

	if($_GET['group_name'] == ''){
		$err_msg = '未入力です';
	}
	else{
		$_SESSION['group_name'] = $_GET['group_name'];
		header('location:group_create_confirm.php');
		exit;
	}






}






require_once '../../tpl/group/group_create.php';
 ?>
