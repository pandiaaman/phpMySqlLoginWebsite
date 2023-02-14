<?php
//setting cookie
if(!isset($_COOKIE["tempcookie"])){
  setcookie("tempcookie","34",time()+3600);
}
print_r($_COOKIE);

// //start a session
session_start();

    /*
    DB queries to grant permissions to users:
      USE phpprojectlogin;
      GRANT ALL ON phpprojectlogin.* TO 'userayaz'@'localhost' IDENTIFIED BY 'passwayaz';
      GRANT ALL ON phpprojectlogin.* TO 'useraman'@'localhost' IDENTIFIED BY 'passwaman';
      GRANT ALL ON phpprojectlogin.* TO 'useranisha'@'localhost' IDENTIFIED BY 'passwanisha';
    */
 //preparing connection   
 $servername = 'localhost';
 $username = 'useraman';
 $password = 'passwaman';
 $myDB = 'phpprojectlogin';
 $portno = 3306; //this is the mysql port, you can find this value in xampp server or using cmd  : netstat -a

//connecting with DB
 try {
     $conn = new PDO("mysql:host=$servername;port=$portno;dbname=$myDB", $username, $password);

     if(!$conn){
       die("Connection failed: " . $conn->connect_error());
       echo("</br> not connected");
     }
     else{
       echo("</br>connection checked");
     }

     //error modes in PDO
      $conn->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION); //exception handling in php

 } catch(PDOException $e) {
 echo "Connection failed: " . $e->getMessage();
}

?>