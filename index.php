<!DOCTYPE html>
<html lang="en">
    <head>
        <title>document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <style>
        td,tr,th{
                
                border: 1px solid black;
                text-align: center;

            }

            th,td{
                padding: 12px 15px;
            }

            th{
                background-color: green;
                color: white;
            }
            table{
                border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 800px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            caption{
                font-size: 32px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            #refresh{
                font-size: 25px;
                background: none;
                border: none;
                cursor: pointer;
                margin: 0;
                transition: all 0.3s linear;
                    
            }
        </style>
    </head>
    <body>
        <form action="post.php" method="post" name="myform" enctype="multipart/form-data">
        <label for="">Name:</label>
            <input type="text" aria-label="name" name="name" id="names"> <br><br>
            <label for="">Address: </label>
            <input type="text" aria-label="address" name="address" ><br><br>
        <button type="submit"   id="btn" >Save</button>
        <input type="reset" value="Reset">
        </form>
    

        <br>
        <br>

<form action="index.php" method="post">
            <input type="text" placeholder="Search by Name" name="search" id="searchs">
            <button type="submit" name="searchbtn" id="searchbtn">Search</button>

            <button  name="resetsearch" id="refresh">&#x21bb;</button>
            </form>

         <script>

                document.getElementById("refresh").addEventListener("click", function() {
                    this.style.webkitTransform = "rotate(360deg)";
                    this.style.transform = "rotate(360deg)";

                    alert("get");
                    }, false);
                    
                </script> 

        <table >
            <caption>Name list</caption>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
</tr>

<?php
$con= new mysqli('db4free.net','samik_db','samik1234','practisedbss');
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
            <?php 
            }
    
    }
if(isset($_POST["searchbtn"]))
{
    
$valuesearch=$_POST["search"];
if($valuesearch!=null)
    {
$queryselect=mysqli_query($con,"SELECT * from htmlformdata where name like '%$valuesearch%'");
// echo $   ;
filterresult($queryselect);
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
         <td colspan="3">form data is empty</td>
       <?php } ?>
      
</tr>
<?php
}
?>
    </table>
            </body>
</html>