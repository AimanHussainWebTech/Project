<?php
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

    </head>

<body>

<?php include("hospitalnavix.php")?>
<?php
$sql = "SELECT * FROM vaccinations";
$result = $conn -> query($sql);
  $vaccinations = $result -> fetch_all(MYSQLI_ASSOC);
 

?>
<div class="container containero">
<h1>Set and Update Available Vaccines</h1>
<form action="updatevacc.php" method="POST">
  <?php foreach ($vaccinations as $key => $v) { ?>
   <div class="form-check">
   <input type="hidden" name="<?= $v['vaccinationname'] ?>" value=0><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value">
     <label class="form-check-label" for="flexCheckDefault">
    <?= $v['vaccinationname'] ?>
     </label>
   </div>
 <?php } ?>

<button name="updaterecord" type="submit" id="submitbutt" class="btn btn-primary">Set Vaccination Records</button>

</form>
</div>
</body>
<style>
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
</html>

<?php
if(isset($_POST['updaterecord']))
{

  foreach ($_POST as $key => $p) {
    if($key != 'updaterecord'){
    $data[$key] = $p;
    }
  }



$thehid =$_SESSION['hospitalid'];
  foreach ($data as $key => $d) {
    $selecthosp= "UPDATE hospitals SET $key = '$d'
    WHERE hospitals.hospital_id = $thehid;";


mysqli_query($conn,$selecthosp);


  }
}
if (isset($_GET["logout"])) {
  session_unset();
  session_destroy();

  header("location:hospitalLogin.php");
  echo '<script>window.location.href = "hospitalLogin.php"</script>'; 


}

?>