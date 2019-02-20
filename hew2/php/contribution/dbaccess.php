<?php
require_once '../../config.php';
require_once '../../function/dbacces.php';
$dbh = database();

$rows = '';
$sql = "SELECT count(*) AS max FROM keywords";
$stmt = $dbh->query($sql);
$max = $stmt->fetch(PDO::FETCH_ASSOC);
//1〜からMAXの値までの数値をランダムで取得
$rand = rand(1,$max['max']);
$sql = "SELECT * FROM keywords WHERE id = ".$rand;
$stmt = $dbh->query($sql);
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
$dbh = null;

echo $rows['keyword'];

