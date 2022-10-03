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
    <title>Total Patient</title>
</head>
<body>
    <?php 
    
    include("../includes/header.php");
    include("../includes/connection.php");
    
    ?>

    <div class="container-fulid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php 
                    include("sidenav.php")
                    ?>

                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-3">Total Patient</h5>

                    <?php 
                    $query = "SELECT * FROM patient ";
                    $res = mysqli_query($connect,$query);
                    
                    $output="";

                                $output .="
                    <table class='table tabel-bordered'>
                    <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Surename</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                    </tr>
                ";


                    if(mysqli_num_rows($res)<1){
                        $output .="
                        <tr>
                        <td colspan='10' class='text text-center'>No Patient yet.</td>
                        </tr>
                        ";
                    }

                    while($row = mysqli_fetch_array($res)){
                        $output .="
                        
                        <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['surname']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['country']."</td>
                        <td>".$row['data_reg']."</td>
                        <td>

                        <a href='viewPatient.php?id=".$row['id']."'>
                        <button class='btn btn-info'>View</button>
                        </a>
                        </td>

                        ";
                    }

                    $output .="

                    </tr>
                    </table>";

                    echo $output;
                            
                            ?>
                </div>

            </div>
        </div>
    </div>
    
</body>
</html>