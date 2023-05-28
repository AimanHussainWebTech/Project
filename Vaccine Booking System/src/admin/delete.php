<?php 
include 'config.php';
if(isset($_GET['parentid'])){
$ID = $_GET['parentid'];
$delquery = "DELETE FROM parents WHERE parent_id = '$ID'; ";

if(mysqli_query($conn,$delquery)){

header("location: index.php");
echo"dede";



} else{

    echo "error";



}
}


if(isset($_GET['hospitalid'])){
$Hid = $_GET['hospitalid'];
$delquery2 = "DELETE FROM hospitals WHERE hospital_id = '$Hid' ";


if(mysqli_query($conn,$delquery2)){

header("location: hospitalTable.php");
echo"dede";



} else{

    echo "error";


}
}

if(isset($_GET['childid'])){
$chid = $_GET['childid'];
$delquery3 = "DELETE FROM children WHERE child_id = '$chid' ";


if(mysqli_query($conn,$delquery3)){

header("location: childrenTable.php");
echo"dede";



} else{

    echo "error";


}

}
if(isset($_GET['vaccid'])){
$vacid = $_GET['vaccid'];
$delquery4 = "DELETE FROM vaccinations WHERE vaccination_id = '$vacid' ";


if(mysqli_query($conn,$delquery4)){

header("location: vaccinationsTable.php");
echo"dede";



} else{

    echo "error";


}
}


 if(isset($_GET['requestid'])){


$reqid = $_GET['requestid'];

    $getData = "SELECT * FROM `requests` WHERE  `request_id` = '$reqid' ";
    $res = mysqli_query($conn,$getData);
   while($row = mysqli_fetch_assoc($res)){
    $rr= $row['parent_id'];


    $getDatap = "SELECT * FROM `parents` WHERE  `parent_id` = '$rr' ";

    $res2 = mysqli_query($conn,$getDatap);

    while($rowp = mysqli_fetch_assoc($res2)){
        $themail =$rowp['parentemail']; 
        $subject = "Vaccination Status Request";
        $body = "Your Request has been  Rejected By Admins Sorry Please Try again later or Request a different date";
        $headers = "umertheninja44@gmail.com";
        
        
        
        
        if (mail($themail, $subject, $body, $headers)) 
        {
     
      echo "Email successfully sent to $themail...";
     
        } 
     }
     


$delquery5 = "DELETE FROM `requests` WHERE `request_id` = '$reqid' ";

mysqli_query($conn,$delquery5);




}


echo '<script>window.location.href = "requestsTable.php"</script>';




 }
?>