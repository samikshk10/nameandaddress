<link rel="stylesheet" href="style.css">
<?php 
include_once 'database.php';

    if(isset($_POST['editbtn']))
    {
     $idss=$_POST["idss"];
  $names=$_POST["naam"];
  $address=$_POST["add"];
      $query="update htmlformdata set name='$names' , address='$address' where id='$idss'";
  $queryupdate=mysqli_query($con,$query);
  echo("<h2>updated successfully!!!</h2>");
  echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; 
  return false;
   }


$id=(int) $_GET['id'];


$queryselect="SELECT * from htmlformdata where id='$id'";
$result=mysqli_query($con,$queryselect);

// $name=$rows['name'];
// $address=$rows['address'];
while($rows=mysqli_fetch_assoc($result))
{  
    $ids=$rows['id'];
    $name=$rows['name'];
    $address=$rows['address'];
    ?>
    <form action='edit.php' method="post">
        <input type="hidden" name="idss" value="<?php echo $ids ?>">
    <label for="">Name:</label>
<input type="text" name="naam" value="<?php echo $name ?>" required><br>

<label for="">Address:</label>
<input type="text" name="add" value="<?php echo $address ?>" required><br>
<button type="submit" name="editbtn" id="editbtn"  class="savebtn" >Edit</button>
<button type="reset" name="editbtn" id="editbtn"  class="savebtn resetbtn" >Reset</button>

</form>
<?php
}



 ?>

           




