<?php 
//データベース接続
function database(){
    $dsn ='mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8';
    $user = DB_USER;
    $password = DB_PASS;
    $dbh = new PDO($dsn,$user,$password);
    return $dbh;
};
 ?>
