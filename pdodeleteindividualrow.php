<?php

require_once ("./pdo.php");

if(isset($_POST["delrow"])){
  $id = $_POST["delete_id"];
  echo "</br> id to be delted now is " . $id;
  $sql2 = "DELETE FROM `phpprojectlogin`.`userlogininfo` WHERE id=?;";
  $deleteid = [$id];
  if($conn->prepare($sql2)->execute($deleteid) === TRUE){
    echo "row deleted";
  }
  else{
    echo "not deleted";
  }
}

require_once("./pdoselectdata.php");
?>