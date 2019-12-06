<?php
$mysqli=new mysqli('remotemysql.com','YhnpaevF7o','n0XwhKnx3P','YhnpaevF7o');
if($mysqli->connect_error){

  printf("can not connect databse %s\n",$mysqli->connect_error);
  exit();
}
?>


