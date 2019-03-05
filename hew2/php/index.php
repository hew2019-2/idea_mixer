<?php
  require_once '../config.php';
  require_once '../function/dbacces.php';

  $dbh = database();
  $sql = "SELECT i.id idea_id, keyword_id_1, keyword_id_2, c.id category_id, category FROM ideas i INNER JOIN categories c ON i.category_id = c.id ";
  $stmt = $dbh->query($sql);

  $ideas = array();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $ideas[] = $row;
  }
  $dbh = null;

  require_once '../tpl/index.php';
?>
