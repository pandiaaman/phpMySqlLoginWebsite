<?php
include("./pdo.php");
if(isset($_SESSION["username"])){
  if(isset($_POST["logout"])){
    session_destroy();
    setcookie("tempcookie","",time()-3600);
    
    header('Location: ./index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="nav">
    <div class="title">
      <a href="./main.php">HOME</a>
    </div>
    
    <div class="navmenu">
      <a href="./pdoselectdata.php">see all data</a>
      <a href="./main.php">HOME</a>
      <!-- <form method="post" action="<?php // echo ($_SERVER['PHP_SELF'])?>">
        <input type="submit" value="logout" name="logout">
      </form> -->

      <a href="./logout.php">logout</a>
    </div>

  </nav>
  
</body>
</html>

<?php
}
?>