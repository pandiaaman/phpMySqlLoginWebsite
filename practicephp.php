<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mysql with php</title>
  <link rel="stylesheet" href="./style.css"/>
</head>
<body>
  <div class="container">
    <h1>this is  website to connect the frontend to backend using php and mysql as db</h1>
  

  <?php
    $a = 10;
    echo "<p>hello there, value of a is $a</p>";

    $ar = array("key1"=>"val1","key2"=>"val2"); #associative array
    echo ($ar["key1"]);
    echo "<p>hello</p>";

    //arithmetic operators
    $var1 = 7;
    $var2 = 5;
      echo $var1+$var2 . "</br>";
      echo $var1*$var2 . "</br>";
      echo $var1-$var2 . "</br>";
      echo $var1%$var2 . "</br>";
      echo $var1/$var2 . "</br>";

    //assignment operators
      echo $var1+=1;  echo "</br>";
      echo $var1-=1;  echo "</br>";
      echo $var1*=3;  echo "</br>";
      echo $var1/=3;  echo "</br>";

    //comparison operator
      var_dump($var1 == 4); #var_dump is used to understand the value of the operator
      var_dump($var1!=5);
      //if we do echo, it will pring 1 for true and NOTHING for false
      echo($var1==3);  //PRINTS NOTHING
      echo($var1>3); //prints 1

    //increment operators
        echo $var1 . "</br>";
        echo $var1++ . "</br>";
        echo ++$var1 . "</br>";
        echo --$var1 . "</br>";
        echo $var1-- . "</br>";
        echo $var1 . "</br>";


    //logical operators
        // and (&&), OR (||), XOR
        $myvar = true AND true;
        echo ($myvar . "</br>"); //prints 1 if true, use var_dump when you need to see the details of the result
        var_dump($myvar);echo("</br>");

        $myvar = false AND true;
        var_dump($myvar);echo("</br>");  
        $myvar = false OR true;
        var_dump(false OR true);echo(" this</br>");
        $myvar = false OR false;
        var_dump($myvar);echo("</br>");



     //DATA types
     /*
      string
      integers
      floats
      boolean
      array
      objects
     */   

     //arrays
        $languages = ["php","sql","c++","c","java"];
        echo $languages[2] . "</br>";
        echo count($languages) . "</br>";

    //loops
      //while loops
        $i = 0;
        while($i<count($languages)){
          echo $languages[$i] . "</br>";
          $i++;
        }

        for($i=0;$i<count($languages);$i++){
          echo $languages[$i] . "</br>";
        }
    


        //classes in php
        class Fruit{
          public $name;
          public $price;

          //constructor
          function __construct($name, $price){
            $this->name = $name;
            $this->price = $price;
          }
          //methods:
          function get_name() : string{
            return $this->name;
          }

          function get_price() : float{
            return $this->price;
          }

          function set_name($name){
            $this->name = $name;
          }
          
          function set_price($price){
            $this->price = $price;
          }
        }


        $banana = new Fruit("banana", 12.3);
        $objname = $banana->get_name();
        echo($objname);


        function enter(){
          echo "</br>";
        }
        //strings
        $str = "hey how are you";
        echo "the length of the string ' " . $str . " ' is " . strlen($str); enter();
        echo "the no of words in the above str is " . str_word_count($str); enter();
        echo "the reverse of the string is " . strrev($str);

  ?>

</div>
</body>
</html>