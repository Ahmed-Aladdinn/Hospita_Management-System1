<?php
session_start();
//check if signed in 
if (!isset($_SESSION['admin'])):
    header('Location:../adminlogin.php');
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php 

include('../includes/header.php');
include('../includes/connection.php');

    ?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
            <?php
            include("sidenav.php"); 
            ?>


            </div>
            <div class="col-md-10">
                <h4 class="my-4 text-info text-center">Admin Dashboard</h4>

                <div class="col-md-12 my-5">
                    <div class="row">
                        <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    $ad = mysqli_query($connect,"SELECT * FROM adminn ");
                                    $num = mysqli_num_rows($ad);

                                    ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num;?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Admin</h5>
                                </div>
                                <div class="col-md-4 py-5">
                                    <a href="admin.php"><i class="fa fa-users-cog fa-3x" style="color: white;"></i></a>

                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="col-md-3 bg-info mx-2" style="height: 130px;">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    
                                    $res = "SELECT * FROM doctors WHERE statuss='Approved'";
                                    $doctor = mysqli_query($connect,$res);
                                    $num2 = mysqli_num_rows($doctor);
                                    
                                    ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Doctors</h5>
                                </div>
                                <div class="col-md-4 py-5">
                                    <a href="doctor.php"><i class="fa fa-user-md fa-3x" style="color: white;"></i></a>

                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php
                                    $query = "SELECT * FROM patient";
                                    $res= mysqli_query($connect,$query);
                                    $pnum = mysqli_num_rows($res);
                                    ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $pnum; ?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Patient</h5>
                                </div>
                                <div class="col-md-4 py-5">
                                    <a href="patient.php"><i class="fa fa-procedures fa-3x" style="color: white;"></i></a>

                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                <?php
                                    $query = "SELECT * FROM report";
                                    $res= mysqli_query($connect,$query);
                                    $rnum = mysqli_num_rows($res);
                                    ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $rnum?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Report</h5>
                                </div>
                                <div class="col-md-4 py-5">
                                    <a href="report.php"><i class="fa fa-flag fa-3x" style="color: white;"></i></a>

                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php 
                                    
                                    $job = mysqli_query($connect,"SELECT * FROM doctors WHERE statuss='Pendding'");
                                    $num = mysqli_num_rows($job);
                                    
                                    ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num;?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Job Request</h5>
                                </div>
                                <div class="col-md-4 py-5">
                                    <a href="job_request.php"><i class="fa fa-book-open fa-3x" style="color: white;"></i></a>

                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">

                                <?php
                                
                                $query ="SELECT sum(amount_paid) as profit FROM income";
                                $res = mysqli_query($connect,$query);
                                 $row = mysqli_fetch_array($res);

                                 $income = $row['profit'];
                                
                                
                                ?>
                                <h5 class="my-2 text-white" style="font-size: 30px;"> <?php echo "$".$income ?></h5>
                                    <h5 class="text-white">Total</h5>
                                    <h5 class="text-white">Income</h5>
                                </div>
                                <div class="col-md-4 py-5">
                                    <a href="income.php"><i class="fa fa-money-check-alt fa-3x" style="color: white;"></i></a>

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