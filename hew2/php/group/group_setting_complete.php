<?php
require_once '../../config.php';
require_once '../../function/func.php';
session_start();

// group_topから$_GET['group_id']でgroupのidを取得
if (!empty($_GET['group_key'])) {
	try {
		$dbh = new PDO ('mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8', DB_USER, DB_PASS);
		// DBに接続し、グループ名とメンバーの配列を取得
		$sql = "SELECT id, name FROM groups WHERE group_key = '".$_GET['group_key']."' AND status = 1";
		$dbc = $dbh->query($sql);
		$group = $dbc->fetch(PDO::FETCH_ASSOC);
		$sql = "SELECT id, name FROM groups_tagmaps gt INNER JOIN users u ON u.id = gt.user_id WHERE gt.group_id = '".$group['id']."' AND gt.status = 1 AND u.status = 1";
		$dbc = $dbh->query($sql);
		while ($row = $dbc->fetch(PDO::FETCH_ASSOC)) {
			$member[] = $row;
		}
	}
	catch (PDOException $e) {
	   // エラー出力
	   $errMsg = $e->getMessage();
   }
}








require_once '../../tpl/group/group_setting.php';
?>