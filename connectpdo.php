<?php
include("./navphp.php");
if(isset($_SESSION["username"])){
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
  this example uses PDO

<?php

//calling the pdo.php file that contains the DB connection details
//require_once("./pdo.php"); //alreaady getting called in above navphp

 //print_r($_POST);

//functions
function validateInput($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlentities($data);
  $data = htmlspecialchars($data);
  return $data;
}
  if(isset($_POST["submit"]) && isset($_POST["firstname"]) && isset($_POST["age"]) && isset($_POST["gender"]) && isset($_POST["email"])){

 //assigning variables
      $_SESSION["firstname"] = $firstname = validateInput($_POST["firstname"]);
      $_SESSION["email"] = $email = validateInput($_POST["email"]);
      $_SESSION["age"] = $age = validateInput($_POST["age"]);
      $_SESSION["desc"] = $desc = validateInput($_POST["desc"]);
      $_SESSION["gender"] = $gender = validateInput($_POST["gender"]);

      echo($firstname);

  //check if the email entered is already existing
  //DO NOT USE this below method as this can lead to sql injection very easily, always use prepare->execute
  try{
    //  $sqlcheckifexists = "SELECT * FROM `phpprojectlogin`.`userlogininfo` WHERE `email`='$email';";
      $sqlcheckifexists = "SELECT * FROM `phpprojectlogin`.`userlogininfo` WHERE `email`=?;";
      $emailinput = [$email];
     // $resultifexists = $conn->query($sqlcheckifexists); //sqlinjection is very easy with these query statements
      $resultifexists = $conn->prepare($sqlcheckifexists);
      $resultifexists->execute($emailinput);
      // $countemails=0;
      // while($resultifexists->fetch(PDO::FETCH_ASSOC)){
      //   $countemails++;
      // }
  }catch(Exception $e){
    error_log ("exception message -> " . $e->getMessage()); //this makes sure that the user cant see the errors
    //location of the above error logs will be in the phpinfo tab with error_log 
  }
      if($resultifexists->rowCount() > 0){
        echo "</br> email already exists </br>";
        return;
      }
      else{
/*
      //METHOD 1 -> inserts the row but throws an error saying Warning: Undefined property: PDO::$error in C:\xampp\htdocs\phpMySqlLoginWebsite\connectpdo.php on line 62
                    //Error: INSERT INTO `phpprojectlogin`.`userlogininfo`(`firstname`,`email`,`age`,`desc`,`gender`) VALUES('anand','anand@gmail.com','25','asdf` asdf as','M');
          //preparing the sql query
            $sql = "INSERT INTO `phpprojectlogin`.`userlogininfo`(`firstname`,`email`,`age`,`desc`,`gender`) VALUES('$firstname','$email','$age','$desc','$gender');";

          //calling the sql query
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
*/

      //METHOD 2 : correct method to insert rows 
          //preparing the sql query
        try{
          $sql = "INSERT INTO `phpprojectlogin`.`userlogininfo`(`firstname`,`email`,`age`,`desc`,`gender`) VALUES(?,?,?,?,?);";
          $data = [$firstname,$email,$age,$desc,$gender];
            //calling the sql query
            if ($conn->prepare($sql)->execute($data) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            } 
        } catch(Exception $e){
          error_log("exception -> " . $e->getMessage());
          return;
        } 
        }
  }

//********************************************************************************/

  if(isset($_POST["deleteidbtn"])){
    echo "</br> id to be deleted";
    //if user enters an id or not
    if(isset($_POST["deleteidtext"])){
      $id = validateInput($_POST["deleteidtext"]);
      echo "</br> id to delete". $id;
      //connection is already complete in pdo.php

      //check if the record exists
      $sqlcheck = "SELECT * FROM `phpprojectlogin`.`userlogininfo` WHERE id=?; ";
      $iddata = [$id];
      $preparequery = $conn->prepare($sqlcheck);
      $preparequery->execute($iddata);
      $countrow = $preparequery->rowCount();
      echo "</br>" . $countrow;

      if($countrow > 0){
        //deleting the record
        //method1 using query
        $sqldelete = "DELETE FROM `phpprojectlogin`.`userlogininfo` WHERE id=?;";
        $iddata = [$id];
        if($conn->prepare($sqldelete)->execute($iddata) === TRUE){
          echo "</br>row successfully delted";
        }
        else{
          echo"</br> row not deleted";
        }

        //method2 using prepare -> execute
        // $sqldelete = "DELETE FROM `phpprojectlogin`.`userlogininfo` WHERE id=?;";
        // $dataid = [$id];
        // if($conn->prepare($sqldelete)->execute($dataid) === TRUE){
        //   echo "</br>row successfully delted";
        // }
        // else{
        //   echo"</br> please enter some id to be deleted first";
        // }


      }
      else{
        echo "</br> no such row found";
      }
      
    }
    else{
      echo "</br> enter some row id";
    }

    
  }

   //selecting data from table
//require_once("./pdoselectdata.php");
  
 //closing the connection
 $conn = null;

 //redirect to the all data page
 header("Location: ./pdoselectdata.php");
 return;

?>


</body>
</html>

<?php
}else{
  header("Location: ./index.php");
}
?>