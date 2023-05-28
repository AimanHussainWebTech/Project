<?php 
session_start();

?>
<html lang="en">
<head>

    <link rel="stylesheet" href="style.css">
  
    <title>Hospitals form</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        .container{
            height:100%;
            width:100%;
            background-image: url(bc2.png);
            background-position: center;
            background-size: cover;
            position: absolute;
            display:flex;
            align-items:center;
            justify-content: center;

        
}


.containero{
    position:absolute;
    left:110%;
    bottom:5%;

}
.card{
    width: 350px;
    height: 500px;
    box-shadow: 0 0 40px 20px rgba(0,0,0,0.26);
    perspective: 1000px;
    border-radius: 100px;

}
.inner-box{
    position:relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    transition: transform 1s;
    border-radius: 100px;

}
.card-front, .card-back{
    position: absolute;
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: cover;
    background: #002F5C;
        padding: 55px;
    box-sizing: border-box;
    backface-visibility: hidden;
    border-radius: 100px;
}
.card-back{
    transform: rotateY(180deg);
}
.card h2{
    font-weight: normal;
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}
.input-box{
    width:100%;
    background: transparent;
    border: 1px solid #fff;
    margin: 6px 0;
    height: 32px;
    border-radius: 20px;
    padding: 0 10px;
    box-sizing: border-box;
    outline: none;
    text-align: center;
    color: #fff;
}
/* ::placeholder{
    color:#fff;
    font-size: 12px;
} */
button{
    width: 100%;
    background: transparent;
    border: 1px solid #fff;
    margin: 35px 0 10px;
    height: 32px;
    font-size: 12px;
    border-radius:20px;
    padding: 0 20px;
    box-sizing: border-box;
    outline: none;
    color: #fff;
    cursor: pointer;
}
.submit-btn{
    /* position: relative; */
}
/* .submit-btn::after{
    content:'\27a4';
    color: #333;
    line-height: 32px;
    font-size: 17px;
    height: 32px;
    width: 32px;
    border-radius: 50%;
    background: #fff;
    position: absolute;
    right: 30px;
    top: 30px;


} */
span{
    font-size: 13px;
    margin-left: 10px;
}
.card .btn{
    margin-top: 70px;
}
.card a{
    color: #fff;
    text-decoration: none;
    display: block;
    text-align: center;
    font-size: 13px;
    margin: 8px;

}

        
    </style>
</head>
<body>
    <?php include("navbarx.php")?>
<div class="container">
<div class="card">
<div class="inner-box" id="card">
<div class="card-front">
    <h2 style="color: white">Login</h2>
    <form method="POST" action="HospitalLogin.php">
           <input type="text" name="hlname" class="input-box"value="<?php 
           if(isset($_COOKIE['hlname']))
           {
             echo $_COOKIE['hlname'];
        }
        ?>" placeholder="Hospital Name"required >
            <input type="Password" name="hlpassword" class="input-box" value="<?php if(isset($_COOKIE['hlpassword']))
            { echo $_COOKIE['hlpassword'];
            }
            ?>" placeholder="Enter Password"  required>
            <br>
            <div class="form-check">
  <input name="rememberMe" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label style="color: white;" class="form-check-label" for="flexRadioDefault1">
    Remember Me
  </label>
</div>
<div class="form-check">
  <a name="forget" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  > </a>
  
</div>

            <button name="hospitallogin" class="submit-btn" name="hospitallogin" onclick=""> Login </button>

<button type="button" onclick="openRegister()" class="btn">I'm New Here </button>
</form>

</div>
<div class="card-back">
<p id="userExists" style="display: none">User Already exists</p>            

<h2 style="color: white">Register</h2>


    <form method="POST" action="HospitalLogin.php" >
  

 


<input type="text" min-length="5"  name="hname"  class="input-box" placeholder="Hospital Name" required>

<input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address"  name="hemail" class="input-box"  placeholder="Hospital Email" required>

<input type="text" min-length="10" name="haddress" class="input-box" id="hosadres"  placeholder="Hospital Address" required>

<input type="password" min-length="8" name="hpassword" class="input-box" placeholder="Hospital Password" required>

<button  class="submit-btn" name="hospitalregister" > Register</button>


<button type="button" onclick="openLogin()" class="btn">I have an account</button>
</form>
 
</div>
</div>
</div>
</div>
<script>
        var card = document.getElementById("card");
        function openRegister(){
            card.style.transform = "rotateY(-180deg)";
        }
        function openLogin(){
            card.style.transform = "rotateY(0deg)";
        }

</script>
</body>

</html>


<?php

include "config.php";


if(isset($_POST['hospitalregister'])){

$regparentname = $_POST['hname'];
$regemail= $_POST['hemail'];
$regpassword= sha1( $_POST['hpassword']);
$regpaddress= $_POST['haddress'];


$insert = "INSERT INTO hospitals(hospitalname , hospitalemail , Hospitalpassword ,hospitaladdress) 
VALUES 
('$regparentname' , '$regemail','$regpassword','$regpaddress')";



$check_query = "SELECT * FROM hospitals WHERE hospitalemail='$regemail'";
$check_result = mysqli_query($conn, $check_query);
// print_r(mysqli_num_rows($check_result));
if (mysqli_num_rows($check_result) > 0) {
    echo "<script>alert('hospital already exists');</script>";
    echo "<script>openRegister();</script>";


}
else{

if (mysqli_query($conn,$insert)) {
    $_SESSION["hname"]= $regparentname;
   
    echo '<script type="text/javascript"> document.getElementById("userregistered").innerHtml="acha"</script>';
    

} 
else {

    echo "<script>window.location.href = 'index.php';</script>"; 


}
}
}



if (isset($_POST['hospitallogin'])) {

    $username = $_POST['hlname'];
    $password = sha1($_POST['hlpassword']);

    $login = "SELECT * FROM hospitals WHERE hospitalname = '$username' AND  Hospitalpassword = '$password' ";

    $data = mysqli_query($conn, $login);
    $row = mysqli_fetch_assoc($data);
    // $userID = $row['UserID']
    $userName = $row['hospitalname'];
    $hospid=$row['hospital_id'];

    if(isset($_POST['rememberMe'])){
        setcookie('hlname',$_POST['hlname'],time()+4000);
        setcookie('hlpassword',$_POST['hlpassword'],time()+4000);
        echo "cookies are set";
    }
    else{
        echo "cookies are not set";
    }



    if ($row == 0) {

        echo "<script>alert('wrong credentials');</script>";

    } else {
        $_SESSION['hospitaluser'] = $_POST['hlname'];
        $_SESSION['hospitalid']=$hospid;


    echo "<script>window.location.href = 'updatevacc.php'</script>";
    }
}

?>