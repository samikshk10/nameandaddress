
<?php
$con= new mysqli('db4free.net','samik_db','samik1234','practisedbss');
            if(isset($_GET['id']))
            {
                $id=(int) $_GET['id'];

                mysqli_query($con,"DELETE FROM htmlformdata where id='".$id."'");
                // $sql="DELETE FROM testdelete.test_mysql WHERE id='$delete_id'";
                // $result=$link->query($sql);
                header('Location: index.php');

            }
            ?>