

<?php
$dater=date("Y-m-d");
$daterd=date("d");


include "config.php";
session_start(); 
?>
<?php if(!isset($_SESSION['hospitalid'])){
    echo "<script>window.location.href = 'hospitalLogin.php'</script>";
}
?>
<html>
    <head>
        <?php       
include "header.php";
?>
<style>
    *{
        box-sizing: border-box;
    }
  .containero{
   margin: 50px;
    align-items: center;
    display: inline-block;
    justify-content: center;
    outline: 1px solid grey;
    width: fit-content;
    border-radius: 25px;
  }
  #submitbutt{
    margin-left: 50%;
}
#logout:hover{
color: red;
}
</style>

    </head>

<body>



<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hospital Profile</title>
        <?php include('header.php')?>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body>
        
                       
                        
                   
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>booking_id</th>
                                            <th>ParentName</th>
                                            <th>ChildName</th>
                                            
                                            <th>Vaccination Name</th>
                                            <th>Booking Date</th>
                            
                                           
                                        </tr>
                                    </thead>
                              
                                    <tbody>
    <h1> Upcoming Appointments</h1>
                                    
                                        <?php
                                        $hide = $_SESSION['hospitalid'];
                                            include "config.php"; 
                                          $queryb =  "SELECT *   FROM `bookings`  WHERE  `bookings`.`booking_date` > '$dater' and `bookings`.`hospital_id` = '$hide' and `bookings`.`approved`= '0';";
                                        $resb = mysqli_query($conn,$queryb);
                                        
                                        
                                        ?>
                                        <?php while($rowb = mysqli_fetch_assoc($resb)){ ?>
                                        
                                        <tr>
                                        <td><?php echo $rowb["booking_id"]  ?></td>
                                            <?php $pid = $rowb["parent_id"];
                                            $chid=$rowb["child_id"];
                                            $vacid = $rowb["vaccination_id"];
                                            $queryp = "SELECT * FROM `parents` WHERE `parents`.`parent_id` = '$pid' ;";
                                        $resp = mysqli_query($conn,$queryp);
                                        $rowp = mysqli_fetch_assoc($resp);

                                            ?>
                                            <td><?php echo $rowp["parentname"]  ?></td>
                                            <?php
                                             $queryc = "SELECT * FROM `children` WHERE `children`.`child_id` = '$chid' ;";
                                             $resc = mysqli_query($conn,$queryc);
                                             $rowc = mysqli_fetch_assoc($resc);
                                            
                                            ?>

                                            <td> <?php echo $rowc["childname"]  ?></td>
                                            <?php
                                             $queryv = "SELECT * FROM `vaccinations` WHERE `vaccinations`.`vaccination_id` = '$vacid' ;";
                                             $resv = mysqli_query($conn,$queryv);
                                             $rowv = mysqli_fetch_assoc($resv);
                                            
                                            ?>
                                            <td><?php echo $rowv["vaccinationname"] ?></td>
                                            <td><?php echo $rowb["booking_date"] ?></td>
                                  
                                           
                                        </tr>
                                       
                                   <?php } ?>
                                    </tbody>


                                    
                                </table>

                                  
                       

                    
                
 
            
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php



?>
<?php
 if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();

    header("location:login.php");
    echo '<script>window.location.href = "login.php"</script>'; 

    
}

?>
<?php 
if(isset($_GET['bookingidh'])){
  $bide= $_GET['bookingidh'];
  $queryb1 =  "SELECT * FROM `bookings`  WHERE  `bookings`.`booking_id` = '$bide';";
  $resb1 = mysqli_query($conn,$queryb1);
 $rowb1 = mysqli_fetch_assoc($resb1);
 $childb1= $rowb1['child_id'];
 $vacidb1= $rowb1['vaccination_id'];


$insertvactb="INSERT INTO vaccination_dates(child_id, vaccination_id, date_of_vaccination) VALUES ('$childb1','$vacidb1','$dater')";
mysqli_query($conn,$insertvactb);
$updatebk="UPDATE `bookings` SET `approved`='1' WHERE `booking_id`='$bide';";
mysqli_query($conn,$updatebk);
echo "<script>window.location.href = 'Hospitalprof.php';</script>";

}
?>