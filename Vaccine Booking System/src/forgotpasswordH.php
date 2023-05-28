<?php

session_start();
include "config.php"

?>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>

</body>
<form method="POST" action="forgotpasswordH.php">
    <h1>Enter Email Address to recover password</h1>
    <div class="container">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="regemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>

</form>


</head>

</html>
<?php
if(isset($_POST['submit'])){
    $regemail = $_POST['regemail'];
$check_query = "SELECT * FROM hospitals WHERE hospitalemail='$regemail'";
$check_result = mysqli_query($conn, $check_query);
if (mysqli_num_rows($check_result) == 0) {
    echo "<script>alert('Email is not registerd or doesnt exist');</script>";

}else{
  $_SESSION['hemail']=$regemail;
 $recoverytoken= rand(100000,999999);
$_SESSION['token']=$recoverytoken;
  echo'<script>window.location.href = "mailtest.php"</script>';

}

}
?>