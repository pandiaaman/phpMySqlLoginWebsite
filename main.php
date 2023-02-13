<?php
include("./navphp.php");
if(isset($_SESSION["username"])){
  echo ($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>PHP project with MySQL</title>
</head>
<body>
  <div class="container">
    <div class="head">
      <h3>welcome to the travel form</h3>

     <h4>enter your details here</h4>
     <h5 class="submitmessage">thanks for submitting the form</h5>
    </div>

    <div class="formpalette">
      <!-- if you use action="connect.php", we will be using mysqli -->
      <form action="connectpdo.php" method="post">
        <input type="text" name="firstname" id="firstname" placeholder="enter your name here">
        <input type="email" name="email" id="email" placeholder="enter your email here">
        <input type="text" name="age" id="age" placeholder="enter your age here">
        <input type="text" name="gender" id="gender" placeholder="enter your gender here">
        <textarea name="desc" id="desc" placeholder="enter additional comments here"cols="30" rows="10"></textarea>
        <input type="submit" name="submit" class="btn" value="submit">
        <input type="button" class="btn" value="reset">
      </form>

      
    </div>
  </div>
  <script src="index.js"></script>
</body>
</html>
<?php
}
else{
  header("Location: ./index.php");
  return;
}
?>