<?php
session_start();
//check if signed in 
if (!isset($_SESSION['doctor'])):
    header('Location:../doctorlogin.php');
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
</head>
<body>

<?php

include('../includes/header.php');
include('../includes/connection.php');
?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;" >
                    <?php
                    
                    include('sidenav.php');
                    ?>

                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <h5 class="text-info my-2">Doctor's Dashboard</h5>
                        <div class="col-md-12">
                            <div class="row">
                        <div class="col-md-3 my-3 bg-info mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                    <h5 class="text-white my-4">My Profile</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="col-md-3 my-3 bg-warning mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                    <?php
                                    $query = "SELECT * FROM patient";
                                    $res= mysqli_query($connect,$query);
                                    $pnum = mysqli_num_rows($res);
                                    ?>
                                    <h5 class="text-white my-2" style="font-size: 30px;"> <?php echo $pnum ?></h5>
                                    <h5 class="text-white ">Total</h5>
                                    <h5 class="text-white ">Patient</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="col-md-3 my-3 bg-success mx-2" style="height: 150px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                    <?php
                                    $query = "SELECT * FROM appointment WHERE statuss='Pendding'";
                                    $res= mysqli_query($connect,$query);
                                    $appnum = mysqli_num_rows($res);
                                    ?>
                                    <h5 class="text-white my-2" style="font-size: 30px;"><?php echo $appnum ?></h5>
                                    <h5 class="text-white ">Total</h5>
                                    <h5 class="text-white my-4">Appointment</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>
</html>