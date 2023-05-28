<?php     
include('config.php');
session_start();

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
        <?php include("navbarx.php")?>

            <div class="container mt-5 mx-auto">
                <a class="text-white btn bg-primary" href="register.php">go back</a>
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
                        <label for="email">Birthdate</label> </br>
                        <input required type="date" name="cage" 
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
                        header("location: register.php");

                    } else {

                        echo "error in updation";
                    }
                }









