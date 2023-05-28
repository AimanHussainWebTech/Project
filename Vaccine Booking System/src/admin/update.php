<?php
error_reporting(E_ERROR | E_PARSE);


include 'config.php';

if (isset($_GET['parentid'])) {
    $id = $_GET['parentid'];
    $getData = "SELECT * FROM parents WHERE  parent_id = '$id' ";



    $res = mysqli_query($conn, $getData);
    // mysqli_query($conn, $update)
    if ($res) {

        $row =  mysqli_fetch_assoc($res);

        $pid= $row['parent_id'];
        $pname = $row['parentname'];
        $pemail = $row['parentemail'];
        $ppassword = $row['parentpassword'];
      
  

    // }



    }?>
     <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <title>Update</title>
        </head>

        <body>
            <div class="container  mt-3">
                <h2 class="text-center">Update Parent Information</h2>
                <form action="update.php" method="post">
                <div class="mb-3 mt-3">
                        <input type="text"  class="form-control" hidden id="email" name="pid" value="<?php echo $pid ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Parent Name</label>
                        <input type="text" class="form-control" id="email" name="pname" value="<?php echo $pname ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Parent Email</label>
                        <input type="text" class="form-control" id="email" name="pemail" value="<?php echo $pemail ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Parent Password</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $ppassword ?>" name="ppassword">
                    </div>

                
                    <button type="submit" class="btn btn-primary mt-2" name="updateparent">Update</button>
                </form>
                
        </body>

        </html>

        <?php } ?>

                <?php

                if (isset($_POST['updateparent'])) {
                    $pid = $_POST['pid'];
                    $pname =  $_POST['pname'];
                    $pemail =  $_POST['pemail'];
                    $ppassword =  sha1($_POST['ppassword']);
                    $update = "UPDATE `parents` SET
                     `parentname` = '$pname', `parentemail` = '$pemail', `parentpassword` = '$ppassword' WHERE  `parent_id` = '$pid'";
       

                    $updateRes = mysqli_query($conn, $update);
                    // echo $pid;
                    // echo $updateRes;
                    if ($updateRes) {


                        echo "record updated";
                        header("location: index.php");

                    } else {

                        echo "error in updation";
                    }
                }








                
if (isset($_GET['hospitalid'])) {
    $id = $_GET['hospitalid'];
    $getData = "SELECT * FROM hospitals WHERE  hospital_id = '$id' ";



    $res = mysqli_query($conn, $getData);
    // mysqli_query($conn, $update)
    if ($res) {

        $row =  mysqli_fetch_assoc($res);

        $Hid= $row['hospital_id'];
        $hname = $row['hospitalname'];
        $hemail = $row['hospitalemail'];
        $hpassword = $row['Hospitalpassword'];
        $hepb = $row["Hepatitis_B_HepB"];
        $rv= $row["RotaVirus_RV"];
        $dt = $row["Diphteria_Tetanus_Pertussis_DTaP"];
        $hinf = $row["H_Influenzae_type_B_Hib"] ;
        $pneu = $row["Pneumococcal_PCV"];
        $polio = $row["Inactivated_Poliovirus_IPV"];
        $measel= $row["Measels_MumpsRubella_MMR"];
        $vari= $row["Varicella_VAR"];
        $hepa = $row["Hepatitius_A_HepA"] ;
        $inf= $row["Influenza"];
      
  

    // }



    }?>
     <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <title>Update</title>
        </head>

        <body>
            <div class="container  mt-3">
                <h2 class="text-center">Update Hospital Information</h2>
                <form action="update.php" method="post">
                <div class="mb-3 mt-3">
                        <input type="text"  class="form-control" id="email" name="hid" hidden value="<?php echo $row['hospital_id'] ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Hospital Name</label>
                        <input type="text" class="form-control" id="email" name="hname" value="<?php echo $row['hospitalname'] ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Hospital Email</label>
                        <input type="text" class="form-control" id="email" name="hemail" value="<?php echo $row['hospitalemail']; ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Hospital Password</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $row['Hospitalpassword'] ?>" name="hpassword">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Hospital Adress</label>
                        <input type="text" class="form-control" id="email" value="<?php echo $row['hospitaladdress'] ?>" name="hadress">
                    </div>
                
                    <button type="submit" class="btn btn-primary mt-2" name="updatehospital">Update</button>
                </form>
                
        </body>

        </html>

        <?php } ?>

                <?php

                if (isset($_POST['updatehospital'])) {
                    $hid = $_POST['hid'];
                    $hname =  $_POST['hname'];
                    $hemail =  $_POST['hemail'];
                    $hadress =  $_POST['hadress'];

                    $hpassword =  sha1($_POST['hpassword']);
                    $update = "UPDATE `hospitals` SET
                     `hospitalname` = '$hname', `hospitalemail` = '$hemail',`hospitaladdress`='$hadress', `hospitalPassword` = '$hpassword' WHERE  `hospital_id` = '$hid'";
       

                    $updateRes = mysqli_query($conn, $update);
                    // echo $pid;
                    // echo $updateRes;
                    if ($updateRes) {


                        echo "record updated";
                        header("location: hospitalTable.php");

                    } else {

                        echo "error in updation";
                    }
                }












                
if (isset($_GET['childid'])) {
    $id = $_GET['childid'];
    $getData = "SELECT * FROM children WHERE  child_id = '$id' ";



    $res = mysqli_query($conn, $getData);
    // mysqli_query($conn, $update)
    if ($res) {

        $row =  mysqli_fetch_assoc($res);

        $cid= $row['child_id'];
        $cname = $row['childname'];
        $cage = $row['Dateofbirth'];
      
  

    // }



    }?>
     <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <title>Update</title>
        </head>

        <body>
            <div class="container  mt-3">
                <h2 class="text-center">Update Child Information</h2>
                <form action="update.php" method="post">
                <div class="mb-3 mt-3">
                        <input type="text"  class="form-control" id="email" name="cid"  hidden value="<?php echo $cid ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">child Name</label>
                        <input type="text" class="form-control" id="email" name="cname" value="<?php echo $cname ?>">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">DOB</label>
                        <input type="date" name="cage" 
       min="<?php echo date('Y-m-d', strtotime('-5 years')); ?>" 
       max="<?php echo date('Y-m-d'); ?>">


                    </div>
              

                
                    <button type="submit" class="btn btn-primary mt-2" name="updateparent">Update</button>
                </form>
                
        </body>

        </html>

        <?php } ?>

                <?php

                if (isset($_POST['updateparent'])) {
                    $chid = $_POST['cid'];
                    $cname =  $_POST['cname'];
                    $cage =  $_POST['cage'];
                    $update = "UPDATE `children` SET 
                     `childname` = '$cname', `DateofBirth` = '$cage'  WHERE  `child_id` = '$chid'";
       

                    $updateRes = mysqli_query($conn, $update);
                    // echo $pid;
                    // echo $updateRes;
                    if ($updateRes) {


                        echo "record updated";
                        header("location: childrenTable.php");

                    } else {

                        echo "error in updation";
                    }
                }













                               
if (isset($_GET['requestid'])) {
    $id = $_GET['requestid'];
    $updatereq = "UPDATE `requests` SET 
    `approved` = '1'  WHERE  `request_id` = '$id'";


   $updatereqres = mysqli_query($conn, $updatereq);
    $getData = "SELECT * FROM requests WHERE  request_id = '$id' ";
    $res = mysqli_query($conn,$getData);
   while($row=mysqli_fetch_assoc($res)){
    $childid = $row['child_id'];
    $hospitalid = $row['hospital_id'];
    $bookingdate = $row['date_of_request'];
    $vaccinationid =$row['vaccination_id'];
    $rr= $row['parent_id'];

        $insertbook="INSERT INTO `bookings` (`parent_id`,`child_id`, `vaccination_id`, `hospital_id`, `booking_date`) VALUES ('$rr','$childid','$vaccinationid','$hospitalid','$bookingdate')";
if($insertres=mysqli_query($conn,$insertbook)){


        
    $getData2 = "SELECT * FROM parents WHERE  parent_id = '$rr' ";
    $res2 = mysqli_query($conn,$getData2);
    while($row2=mysqli_fetch_assoc($res2)){
        $hospitt = "SELECT bookings.booking_id,
        parents.parentname,
        children.childname,
        vaccinations.vaccinationname,
        hospitals.hospitalname, bookings.booking_date, hospitals.hospitaladdress
        FROM bookings INNER JOIN parents ON bookings.parent_id = parents.parent_id INNER JOIN children ON
       bookings.child_id = children.child_id INNER JOIN hospitals ON bookings.hospital_id = hospitals.hospital_id
        INNER JOIN vaccinations ON bookings.vaccination_id = vaccinations.vaccination_id ";
        $resx = mysqli_query($conn,$hospitt);
        $rowx=mysqli_fetch_assoc($resx);
        $themail= $row2['parentemail'];
        $childdname=$rowx['childname'];
        $parentname=$rowx['parentname'];
        $vaccinationname=$rowx['vaccinationname'];
        $booking=$rowx['booking_date'];
        $hosaddress=$rowx['hospitaladdress'];
$subject = "Vaccination Status Request";
$body ="
<h1>Your Request Has Been Approved</h1> <br>
<h2>Hello $parentname your vaccination request has been approved by admin</h2> <br>
<h3>Patient name:- $childdname</h3> <br>
<h3>Vaccine name:- $vaccinationname</h3> <br>
<h3>Hospital Name and Location:- $hosaddress</h3> <br>
<h3>Appointment Date:- $booking </h3> <br>
"; 


$headers = "Vaccine Booking System";
$headers .= "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 


if (mail($themail, $subject, $body, $headers)) {
 echo '<script>window.location.href = "requestsTable.php"</script>';
} 
    }


   };
}
}



















                
if (isset($_GET['insertvacc'])) {
    $id = $_GET['childid'];
    $getData = "SELECT * FROM children WHERE  child_id = '$id' ";



    $res = mysqli_query($conn, $getData);
    // mysqli_query($conn, $update)
    if ($res) {

        $row =  mysqli_fetch_assoc($res);

        $cid= $row['child_id'];
        $cname = $row['childname'];
        $cage = $row['Dateofbirth'];
      
  

    // }



    }?>
     <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <title>Update</title>
        </head>

        <body>
            <div class="container  mt-3">
                <h2 class="text-center">Insert a New Vaccine</h2>
                <form action="update.php" method="post">
                    <div class="mb-3 mt-3">
                        <label for="email">Vaccine Name</label>
                        <input type="text" class="form-control" id="email" name="vaccname" value="">
                    </div>
                    <h2>Select Age Rating</h2>
                    <div class="form-check">
                    <input type="hidden" name="birth" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                      birth
             </label>
                </div>
                <div class="form-check">
                    <input type="hidden" name="2months" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                      2months
             </label>
                </div>
              
                <div class="form-check">
                    <input type="hidden" name="4months" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                     4months
             </label>
                </div>
              
                <div class="form-check">
                    <input type="hidden" name="6months" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                   6months
             </label>
                </div>
              
                <div class="form-check">
                    <input type="hidden" name="12months" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                   12months
             </label>
                </div>  <div class="form-check">
                    <input type="hidden" name="15months" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                   15months
             </label>
                </div>  <div class="form-check">
                    <input type="hidden" name="18months" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                   18months
             </label>
                </div>  <div class="form-check">
                    <input type="hidden" name="24months" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                   24months
             </label>
                </div>
                <div class="form-check">
                    <input type="hidden" name="4_5years" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
                   <label class="form-check-label" for="flexCheckDefault">
                   4-5years
             </label>
                </div>

                
                    <button type="submit" class="btn btn-primary mt-2" name="insertnewvacc">Update</button>
                </form>
                
        </body>

        </html>

        <?php } ?>

                <?php

                if (isset($_POST['insertnewvacc'])) {
                    $vaccname= $_POST['vaccname'];
                    $birth = $_POST['birth'];
                    $months2 = $_POST['2months'];
                    $months4 = $_POST['4months'];
                    $months6 = $_POST['6months'];
                    $months12 = $_POST['12months'];
                   $months15 = $_POST['15months'];
                   $months18 = $_POST['18months'];
                    $months24= $_POST['24months'];
                    $years4_5 = $_POST['4_5years'];

             
                    $insertvaccination = "INSERT INTO `vaccinations` ( `vaccinationname`, `birth`, `2months`, `4months`, `6months`, `12months`, `15months`, `18months`, `24months`, `4_5years`) VALUES ('$vaccname'
                    ,$birth,
                   $months2,
                    $months4,
                   $months6,
                   $months12,
                    $months15,
                      $months18,
                     $months24,
                   $years4_5) ";
       $addcolhosp="AlTER TABLE hospitals ADD `$vaccname` TINYINT(1) DEFAULT 0";

                    $updatevacctable = mysqli_query($conn, $insertvaccination);
                    $updatehosptable = mysqli_query($conn, $addcolhosp);

                    // echo $pid;
                    // echo $updateRes;
                    if ($updatevacctable && $updatehosptable) {


                        echo "record updated";
                        header("location: vaccinationsTable.php");

                    } else {

                        echo "error in updation";
                    }
                }

?>








