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
<?php
$childid=$_GET['childid'];
?>

<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Past Records</title>
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
    <?php
                                        
                                        include "config.php";
                                    $res = mysqli_query($conn, "SELECT vaccination_dates.vaccination_date_id,vaccination_dates.date_of_vaccination, children.childname, vaccinations.vaccinationname FROM vaccination_dates
                                    INNER JOIN children on vaccination_dates.child_id = children.child_id INNER JOIN vaccinations on vaccination_dates.vaccination_id = vaccinations.vaccination_id where vaccination_dates.child_id='$childid'");
                                    ?>
        <div id="hoi" class="container ">
    <a class="text-white btn bg-primary" href="register.php">go back</a>
    </div>
        <div class="container mt-5">

        
        <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Vaccination_date_id</th>
                                            <th>Child_Name</th>
                                            <th>vaccination_name</th>
                                            <th>Date_of_vaccinations</th>
                                            



                                           
                                        </tr>
                                    </thead>
                              
                                    <tbody>
    <h1>Past record of <?php
    $resch=mysqli_query($conn,"SELECT * FROM CHILDREN WHERE child_id = '$childid'");
    $rowch = mysqli_fetch_assoc($resch);
    echo $rowch["childname"]?></h1>
                                    
                                       
                                        <?php
                                         while($row = mysqli_fetch_assoc($res) ){ ?>
                                        
                                        <tr>
                                        <td><?php echo $row["vaccination_date_id"]  ?></td>

                                            <td> <?php echo $row["childname"]  ?></td>
                                            <td><?php echo $row["vaccinationname"] ?></td>
                                            <td><?php echo $row["date_of_vaccination"] ?></td>







                                         
                            
                                           
                                        </tr>
                                       
                                   <?php } ?>
                                    </tbody>


                                    
                                </table>


                                    
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