<?php
error_reporting(E_ERROR);

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
else{?>







<?php 
if(isset($_GET['childid'])){
$chid = $_GET['childid'];
    $qwerty="SELECT * FROM `children` WHERE `child_id` = '$chid' ;";
    $resc = mysqli_query($conn,$qwerty);
    $row = mysqli_fetch_assoc($resc);
                                            $_SESSION['childerid']= $_GET['childid'];
                                            $_SESSION['parenterid']=$row['parent_id'];


    $now = new DateTime();
    $dob = new DateTime($row['Dateofbirth']);
    
    $diff = $now->diff($dob);
     
                                            

//  echo   $diff->y ."/" .$diff->m ."/" .$diff->d ;
}
if($diff->y == 0 && $diff->m < 2){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `Birth` = '1';";
}
elseif($diff->y == 0 && $diff->m >= 2  && $diff->m < 4){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `2months` = '1';";

}
elseif($diff->y == 0 && $diff->m >= 4  && $diff->m < 6){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `4months` = '1';";

}
elseif($diff->y == 0 && $diff->m >= 6  && $diff->m < 11){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `6months` = '1';";
}

elseif($diff->y == 1 && $diff->m <= 2 ){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `12months` = '1';";

}
elseif($diff->y == 1 && $diff->m <= 5 ){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `15months` = '1';";

}
elseif($diff->y == 1 && $diff->m <= 11 ){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `18months` = '1';";

}
elseif($diff->y == 2 && $diff->m <= 11 ){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `24months` = '1';";

}
elseif($diff->y <= 5 && $diff->y >=3 ){
    $selectvacc ="SELECT * FROM `vaccinations` WHERE `4_5years` = '1';";

}
else{
    echo "<script> alert('This Child is not Suitabe for any vaccination at the moment')</script>";
}
$resv = mysqli_query($conn,$selectvacc);

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
    <body>
    <?php include("navbarx.php")?>

        <div class="container mt-5">
    <a href="register.php" class=" bg-primary btn text-white ">go back </a>
    </div>
    <div id="vaci">
        <div class="container">
            <form action="setappoint.php" method="POST">
        <h1>Select Vaccine</h1>

            <select class="form-select" aria-label="Default select example" name='vaccinationname'>

                <?php
              while($rowver = mysqli_fetch_assoc($resv)){ 
    $_SESSION['vaccinationid'] = $rowver['vaccination_id'];

?>
                <option value="<?php echo $rowver['vaccinationname']?>"><?php echo $rowver['vaccinationname'] ?></option>



<?php }?>
</select>
<button type="submit" class="submit btn text-white bg-primary" onclick="" name="setvacc"> confirm vaccine  </button >
            </form>

        </div>
        </div>
        <?php if(isset($_POST['setvacc'])){
    $vaccname = $_POST['vaccinationname'];

    echo "<script> document.getElementById('vaci').innerHTML=' '; </script>";
    ?>
        <div class="container">
        <form action="setappoint.php" method="POST">

        <h1>Select hospital</h1>
            <select class="form-select" name='hospitalname'>

                <?php
                $_SESSION['vacname']=$vaccname;
                 $qwertyu="SELECT * FROM `hospitals` WHERE `$vaccname` = '1' ;";
                 $resh = mysqli_query($conn,$qwertyu);
              while($rowh = mysqli_fetch_assoc($resh)){    
                echo $rowh['hospitalname'];
                $_SESSION["hospitlerid"] = $rowh['hospital_id'];

?>  

                <option  value="<?php echo $rowh['hospitalname']?>"><?php echo $rowh['hospitalname'] ?></option>



<?php }?>
</select>
<h1>Set Appointment Date</h1>
<input type="date" name="cage"  required
       max="<?php echo date('Y-m-d', strtotime('+1 months')); ?>" 
       min="<?php echo date('Y-m-d'); ?>">
<button type="submit" class="submit btn text-white bg-primary" onclick="" name="sethospital"> confirm Hospital  </button >
            </form>
        </div>
<?php } ?>

<?php if(isset($_POST['sethospital'])){
    $_SESSION['dateofreq']=$_POST['cage'];
    $hospname = $_POST['hospitalname'];


    echo "<script> document.getElementById('vaci').innerHTML=' $vaccname'; </script>";
    ?> 
    <div class="container">
    <h3 class="bg-success text-white" id="confirmbox2" ></h3>
    </div>
        <div class="container" id="confirmbox">
        <form action="setappoint.php" method="POST">

        <h1>Confirm your choice</h1>
        <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Vaccine</label>
  <input type="text" disabled class="form-control" id="exampleFormControlInput1" placeholder="<?php echo  $_SESSION['vacname'] ?>">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Hospital</label>
  <input type="text" disabled class="form-control" id="exampleFormControlInput1" placeholder="<?php echo $hospname ?>">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Date of Appointment</label>
  <input type="text" disabled class="form-control" id="exampleFormControlInput1" placeholder="<?php echo $_SESSION['dateofreq'] ?>">
</div>

<button type="submit" class="submit btn text-white bg-primary"  name="requestadmin"> confirm Hospital  </button >
            </form>
        </div>

                <?php

?>  



<?php }?>


<?php
    $dateofrequest =  $_SESSION['dateofreq'];
    $thehospitalid = $_SESSION["hospitlerid"] ;
    $thevaccinationid = $_SESSION['vaccinationid'];
    $thechildid = $_SESSION['childerid'];
   $theparentid  = $_SESSION['parenterid'];



                //  $requery="INSERT INTO requests(`parent_id`,`child_id`,`hospital_id`,`vaccination_id`,`date_of_request`) VALUES('$theparentid','$thechildid','$thehospitalid','$thevaccinationid','$dateofrequest');";
                $requery= "INSERT INTO `requests` ( `parent_id`, `child_id`, `hospital_id`, `vaccination_id`, `date_of_request`) VALUES ('$theparentid','$thechildid','$thehospitalid','$thevaccinationid','$dateofrequest')";
if(isset($_POST['requestadmin'])){
  
    if(mysqli_query($conn,$requery)){
    echo "<script>document.body.innerHTML=''</script>";
 

    $getData2 = "SELECT * FROM `parents` WHERE  `parent_id` = '$theparentid'; ";
    $res2 = mysqli_query($conn,$getData2);
    while($row2=mysqli_fetch_assoc($res2)){
        $themail= $row2['parentemail'];
$subject = "Vaccination Status Request";
$body = "Your Request has been accepted and is awaiting approval from admin";
$headers = "umertheninja44@gmail.com";




if (mail($themail, $subject, $body, $headers)) {
 echo "Email successfully sent to $themail...";
 echo '<script>
 if(confirm("Your request has been accepted")) {
    window.location.href="register.php"
 }
 </script>';
 header("register.php");

} 
    }

   
}
}
?>
    </body>
</html>




<?php }?>
