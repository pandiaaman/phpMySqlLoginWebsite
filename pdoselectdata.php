<?php
include("./navphp.php");
require_once("./pdo.php");

if(isset($_SESSION["username"])){
  //selecting the data to the screen:
  $sql1 = "SELECT * FROM `phpprojectlogin`.`userlogininfo`;";
      
  $result = $conn->prepare($sql1);
  $result->execute();
  $num_rows = $result->rowCount();
  echo($num_rows);
  if($num_rows>0){
      echo "<table border='1'>" . "</br>";
      echo "<tr>";
        echo "<th> sno </th>";
        echo "<th> firstname</th>";
        echo "<th> email</th>";
        echo "<th> age</th>";
        echo "<th> desc</th>";
        echo "<th> gender</th>";
      echo "</tr>";
  }
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
  //  print_r($row);
    echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['firstname'] .  "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . $row['age'] . "</td>";
      echo "<td>" . $row['desc'] . "</td>";
      echo "<td>" . $row['gender'] . "</td>";
      echo '<td> <form method="post" action="pdodeleteindividualrow.php">'.
    '<input type="text" name="delete_id" value=" '. $row['id'] .' ">
      <input type="submit" name="delrow" value="delterow"> 
        </form></td>';
  echo "</tr>";
  // echo "</br>";
  }

  if($num_rows>0){
    echo "</table>" . "</br>";
  }
}else{
  header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<form method="post" action="connectpdo.php">
  <label>enter the id to be deleted</label>
  <input type="text" name="deleteidtext" id="deleteid">
  <input type="submit" name="deleteidbtn" value="delete id">
</form>
</body>
</html>