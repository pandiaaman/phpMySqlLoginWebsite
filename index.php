<?php
include("./pdo.php");



if(isset($_POST["login"])){
  $username = validateInput($_POST["username"]);
  $password = validateInput($_POST["password"]);
try{
  $sql = "SELECT * FROM `phpprojectlogin`.`adminusers` WHERE username=? AND password=?;";
  $datainput = [$username,$password];

  $result = $conn->prepare($sql);
  $result->execute($datainput); 

  if($result->rowCount() == 1 ){
    echo "</br>you can login"; 
    //starting a session
      
      if(!isset($_SESSION["username"])){
          $_SESSION["username"] = $username;
      }
      else{
        echo "<h3>welcome ". $_SESSION["username"] . "</h3>"; 
      }

    header("Location: ./main.php"); //header is used to redirect the requests to the correct pages
    return;
  }
  else{
    echo " </br> check your password";  
  }
}catch(Exception $e){
  error_log("exception message logged " . $e.getMessage());
  return;
}
}

//functions
function validateInput($data){
  $data = htmlentities($data);
  $data = htmlspecialchars($data);
  return $data;
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
  <form method="post" action="index.php">
    <input type="text" name="username" id="username">
    <input type="password" name="password" id="password">
    <input type="submit" value="login" name="login">
  </form>
</body>
</html>
