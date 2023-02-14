<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  hi
</body>
</html>

<?php

print_r($_POST);
  if(isset($_POST["submit"])){
    $hostname = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($hostname,$username,$password);
    
    if(!$conn){
      die("Connection failed: " . $conn->connect_error());
      echo("</br> connected");
    }
    echo ("</br> connected");
    echo($_POST["firstname"]); $firstname = $_POST["firstname"]; echo $firstname;
    echo($_POST["email"]); $email = $_POST["email"];
    echo($_POST["age"]); $age = $_POST["age"];
    echo($_POST["desc"]); $desc = $_POST["desc"];
    echo($_POST["gender"]); $gender = $_POST["gender"];
    
   // INCORRECT $sql = "INSERT INTO `phpprojectlogin`.`userlogininfo`(`firstname`,`age`,`email`,`desc`,`gender`) VALUES($firstname,$age,$email,$desc,$gender)";
    $sql = "INSERT INTO `phpprojectlogin`.`userlogininfo`(`firstname`,`age`,`email`,`desc`,`gender`) VALUES('$firstname','$age','$email','$desc','$gender')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


    //print the data

    echo "</br> printing the data";
    $sql1 = "SELECT * FROM `phpprojectlogin`.`userlogininfo`";
    $result = $conn->query($sql1);

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        echo $row['firstname'] . "</br>";
      }
    }
    else{
      echo "0 records";
    }
    

    $conn->close();
  }

?>