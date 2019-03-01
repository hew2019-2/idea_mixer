<?php
  require_once '../config.php';
  session_start();
  /*
  session_start();
  if(!empty($_SESSION['login'])){
    $user = array();
    $user['login'] = $_SESSION['login'];
  }
  else{
    header('Location:./index.php');
  }*/

  $dsn = 'mysql:dbname='.DB.';host='.DB_HOST.';charset=utf8';
  $dbuser = DB_USER;
  $dbpass = DB_PASS;
  
  $dbh= new PDO($dsn,$dbuser,$dbpass);
  $sql = "SELECT i.id , user_id, k1.keyword keyword1 , k2.keyword keyword2 FROM ideas i INNER JOIN keywords k1 ON i.keyword_id_1 = k1.id INNER JOIN keywords k2 ON i.keyword_id_2 = k2.id";
  $stmt = $dbh -> query($sql);

  $ideas = array();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $ideas[] = $row;
  }
  $dbh = null;

  var_dump($ideas);

  
  $user['user_id'] = $ideas['user_id'];
  $_SESSION['login'] = $user;

  require_once '../tpl/index.php';
?>
