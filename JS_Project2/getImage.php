<?php
require_once 'DB.class.php';
require_once 'db.php';
$db = new DB();


  $id = $_GET['id'];
  // do some validation here to ensure id is safe
  $sql = "SELECT img FROM hause WHERE id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);

  header("Content-type: image/jpeg");
  echo $row['img'];
?>