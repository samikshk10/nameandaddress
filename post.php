<?php   
//$connect= mysqli_connect('localhost','root','','practisedb');

$con= new mysqli('db4free.net','samik_db','samik1234','practisedbss');
$name=$_POST["name"];
$address=$_POST["address"];



   // if($con->connect_errno)
//    if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   }

if (!$con)
{
 die("Connection error: " . mysqli_connect_error());
 }
    else{
   
    mysqli_query($con,"INSERT into htmlformdata(name,address) values('$name','$address')");
     echo("data inserted successfully for <br> name=$name<br>address=$address<br>");
    echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
      
   exit();
    }


?>

<? 
