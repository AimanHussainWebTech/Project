<?php
include("config.php");
session_start();
?>


<?php
if(!isset($_SESSION['user'])){
   
    echo '<script>
    if(confirm("You must be logged in to Register")) {
       window.location.href="Home.php"
    }
    </script>';
}
else{
?>


<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <?php include('header.php')?>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<style>
    a{
        text-decoration: none;
    }
    #shi{
        display: inline-block;
        margin-right: 50px;
    }
        #hoi{
            margin-top:50px;
        }
</style>
    <body>
        <?php include("navbarx.php")?>
        <div id="hoi" class="container ">
    <a class="text-white btn bg-primary" href="Home.php">go back</a>
    </div>
        <div class="container mt-5">

        
  
                                    <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Child_Id</th>
                                            <th>ChildName</th>
                                            <th>DateOfBirth</th>
                                            <th>Age Y/M/D</th>
                                            <th>Parent_id</th>
                                            <th> Operations</th>
                                            
                                            
                                           
                                        </tr>
                                    </thead>
                              
                                    <tbody>
    <h1 id="shi" >Manage your registered children</h1>                      
    <button class="btn btn-primary">
                                    <a href="childinsert.php?username=<?php echo $_SESSION["user"] ?>" class="text-white "> Register a Child
                                    </a></button>
                                    
                                        <?php
                                         $pname=$_SESSION["user"];
                                          $resp = mysqli_query($conn, "SELECT * FROM parents WHERE parentname ='$pname'");
                                          $rowp = mysqli_fetch_assoc($resp);
                                          $pid=$rowp['parent_id'];
                                        $res = mysqli_query($conn, "SELECT * FROM children where parent_id = '$pid'");
                                        ?>
                                        <?php while($row = mysqli_fetch_assoc($res)){ ?>
                                        
                                        <tr>
                                        <td><?php echo $row["child_id"]  ?></td>

                                            <td><?php echo $row["childname"]  ?></td>
                                            <td> <?php echo $row["Dateofbirth"]?></td>
                                        
                                            <?php include "./admin/agecalc.php";?>

                                            <td> <?php echo $diff->y ."/" .$diff->m ."/" .$diff->d  ?></td>
                                            
                                            
                                            <td><?php echo $row["parent_id"] ?></td>

                                            

                                            
                                            <td>
                                            <button class="btn btn-success">
                                    <a href="setappoint.php?childid=<?php echo $row["child_id"] ?>" class="text-white "> Request Appointment
                                    </a></button>    
                                    <button class="btn btn-success">
                                    <a href="records.php?childid=<?php echo $row["child_id"] ?>" class="text-white "> Show Past Records
                                    </a></button>
                                            
                                            <button class="btn btn-primary">
                                    <a href="update.php?childid=<?php echo $row["child_id"] ?>" class="text-white "> Update
                                    </a></button>
                                <button class="btn btn-danger">
                                    <a href="register.php?childid=<?php echo $row["child_id"] ?>" class="text-white ">Remove</a>
                                </button></td>
                            
                                           
                                        </tr>
                                       
                                   <?php } ?>
                                    </tbody>


                                    
                                </table>
                                </div>
 
            
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>





<?php }?>

<?php


?>
<?php


if(isset($_GET['childid'])){
    $chid = $_GET['childid'];
    $delquery3 = "DELETE FROM children WHERE child_id = '$chid' ";
    
    
    if(mysqli_query($conn,$delquery3)){
    
        echo "<script>window.location.href = 'register.php';</script>";


    
    
    } else{
    
        echo "error";
    
    
    }

}
?>