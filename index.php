<!DOCTYPE html>
<html lang="en">
    <head>
        <title>document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <link rel="stylesheet" href="style.css">   


    </head>
    <body>
        <form action="post.php" method="post"  name="myform" enctype="multipart/form-data">
        <label for="">Name:</label>
            <input type="text" aria-label="name" name="name" id="names" placeholder="Enter Your Name" required> <br><br>
            <label for="">Address: </label>
            <input type="text" aria-label="address" name="address" Placeholder="Enter Your Address" required><br><br>
        <button type="submit"   id="btn" class="savebtn" >Save</button>
        <button type="reset" class="savebtn resetbtn" value="Reset">Reset </button>
        </form>
    

        <br>
        <br>

<form action="index.php" method="post" id="searchform">
    <div class="searchandrefresh">
    <div class="searchbox" id="searchbo">
            <input type="search" placeholder="Search by Name" name="search" id="searchs" class="searchinput">
            <button type="submit" name="searchbtn" id="searchbtn" class="searchbutton"><i class="fa fa-search"></i></button>
        </div>
        <button  name="resetsearch" id="refresh" title="refresh">&#x21bb;</button>
        </div>

            </form>
         <script>
          
                
                
                document.addEventListener('click',function(e){
                    if (!e.target.classList.contains('searchinput')) {
        
    
                        document.getElementById('searchs').style.width= '100px';
                    }
                
                });
                document.getElementById('searchs').addEventListener('mouseover',function(){
                 document.getElementById('searchs').style.width= '240px';
                });

           

                document.getElementById("refresh").addEventListener("click", function() {
                    this.style.webkitTransform = "rotate(360deg)";
                    this.style.transform = "rotate(360deg)";

                    //alert("get");
                    }, false);


                 
                </script> 

        <table >
            <caption>Name list</caption>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Delete</th>
    <th>Edit</th>
</tr>



<?php
include_once 'database.php';
// $con= new mysqli('db4free.net','samik_db','samik1234','practisedbss');
$queryselect=mysqli_query($con,"SELECT * from htmlformdata");
$cnt = mysqli_num_rows(mysqli_query($con,"SELECT * FROM htmlformdata"));
function filterresult($result){
    while($rows=mysqli_fetch_assoc($result))
    {  
     ?>
     <tr>
            <td><?php echo($rows['id']) ?></td>
            <td><?php echo($rows['name']) ?></td>
            <td><?php echo($rows['address']) ?></td>
            <td><?php echo ("<a href='delete.php?id=$rows[id]'><i class='fa fa-trash fa-lg' style='color:black'></i></a>");?></td>    
            <td><?php echo ("<a href='edit.php?id=$rows[id]'><i class='fa fa-edit fa-lg' style='color:black'></i></a>");?></td>    

            <?php 
        
          
            
            }
    
    }
if(isset($_POST["searchbtn"]))
{
    
$valuesearch=$_POST["search"];
if($valuesearch!=null)
    {
$queryselect=mysqli_query($con,"SELECT * from htmlformdata where name like '%$valuesearch%'");
if(mysqli_num_rows($queryselect)==0)
{
    echo ("<tr><td colspan='4'>Search Name Not Found</td></tr>");
}
else{
// echo $   ;
filterresult($queryselect);
}
    }
    else{
        echo("Please enter a value to search");
        filterresult($queryselect);
    
        
    }


}
else{
    $queryselect=mysqli_query($con,"SELECT * from htmlformdata");

if($cnt!=0){
filterresult($queryselect);
    }
      else
       {
         ?>
         <td colspan="4">form data is empty</td>
       <?php } ?>
      
</tr>
<?php
}
?>
    </table>
            </body>
</html>