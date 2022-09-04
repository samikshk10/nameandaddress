<!DOCTYPE html>
<html lang="en">
    <head>
        <title>document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
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

            .savebtn{
                padding: 12px 0px;
                width: 200px;
                z-index:1;
                color: #080710;
                margin-top: 30px;
                margin-left: 10px;
                font-size: 18px;
                font-weight: 600;
                cursor: pointer;
                overflow: hidden;
                border-radius: 5px;
                position: relative;
                background: #fff;
            }

            .savebtn::before{
                content: "";
                top: 0%;
                left: -100%;
                z-index: -1;
                width: 100%;
                height: 100%;
                color: #fff;
                border-radius: 5px;
                position: absolute;
                transition: left 0.4s, color 0.4s;
                background-color:#202020;
            }

            .savebtn:hover{
                color: #fff;
            }

            .savebtn:hover::before{
                left:0%;
            }


       /* reset btn */
          .resetbtn:hover{
            color: #fff;
          }

          .resetbtn::before{

                content: "";
                top: 0%;
                left: -100%;
                z-index: -1;
                width: 100%;
                height: 100%;
                color: red;
                border-radius: 5px;
                position: absolute;
                transition: all 0.4s, color 0.4s;
                background-color:#d9534f;
          }

          .resetbtn:hover::before{
            right: 0%;
          }

          input[type=text]
          {
            padding: 10px 3px;
            font-size: 16px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid black;
            outline:none;
            margin-left: 5px;
            


          }

          input[type=text]:focus{
            border: 2px solid dodgerblue;
            border-color: dodgerblue;
            border-radius: 20px;
          }

       

      input[type=text]::placeholder{
        text-align: center;

      }

          label{
            font-size: 18px;
          }
          .searchbutton{
        visibility:hidden;
          }

          

      input#searchs:focus   ~ .searchbutton{
        visibility: visible;
        z-index:999;
        overflow:hidden;
           } 

         

           .searchbutton{
            background-color:gray;
            border-radius: 50%;
            width:32px;
            height: 32px;
            border:none;
           }

           #searchform {
            display: inline-block;
            position: relative;
        
           }
           
           .searchbutton{

            position: absolute;
            top:5px;
            bottom:0;
            right:6px;
          
           }

           .searchbox{
            border: 2px solid black;
            width: 300px;
            border-radius: 20px;
           }

           

         

           input#searchs:focus   ~ .searchbox{
       border-color: red;
           } 

           input#searchs{
            outline:none;
            border:none;
            width: 200px;
           }

        .searchbox::before  .searchbutton{
content:"";
position: absolute;
top:5px;
bottom:0;
left:0;
z-index:99;

        }

        input#searchs:focus ~.searchbutton{
            transition: all 0.5s linear;
        }
         
           
           
           

 
        </style>


    </head>
    <body>
        <form action="post.php" method="post"  name="myform" enctype="multipart/form-data">
        <label for="">Name:</label>
            <input type="text" aria-label="name" name="name" id="names" placeholder="Enter Your Name"> <br><br>
            <label for="">Address: </label>
            <input type="text" aria-label="address" name="address" Placeholder="Enter Your Address" ><br><br>
        <button type="submit"   id="btn" class="savebtn" >Save</button>
        <button type="reset" class="savebtn resetbtn" value="Reset">Reset </button>
        </form>
    

        <br>
        <br>

<form action="index.php" method="post" id="searchform">
    <div class="searchbox">
            <input type="text" placeholder="Search by Name" name="search" id="searchs" class="searchtext">
            <button type="submit" name="searchbtn" id="searchbtn" class="searchbutton"><i class="fa fa-search"></i></button>
            </div>

            <button  name="resetsearch" id="refresh" title="refresh">&#x21bb;</button>
            </form>

         <script>

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