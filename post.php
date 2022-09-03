<?php   
//$connect= mysqli_connect('localhost','root','','practisedb');

$con= new mysqli('localhost','root','','practisedb');
$name=$_POST["name"];
$address=$_POST["address"];
if(($name)==null || $address==null)
{
    echo("All field are Required");
    die();
}

else{
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

   exit();
    }
}

?>

<? 
