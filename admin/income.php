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
    <title>Total Income</title>
</head>
<body>

<?php

include("../includes/header.php");
include("../includes/connection.php");
?>

<div class="container-fulid">
    <div class="row">
        <div class="col-md-2" style="margin-left: -30px;">
            <?php
            include("sidenav.php");
            ?>
        </div>
        <div class="col-md-10">
            <h5 class="text-center my-3">Total Income</h5>
            <?php
            $query ="SELECT * FROM income ";
            $res = mysqli_query($connect,$query);

            $output ="";

            $output .="

            <table class='table table-bordered'>
            <tr>
            <td>ID</td>
            <td>Doctor</td>
            <td>Patient</td>
            <td>Date Discharge</td>
            <td>Amount Paid</td>
            </tr>
            
            ";

            if(mysqli_num_rows($res)<1){
                $output .="
                <tr>

                <td class='text-center' colspan='5'>No Patient Discharge Yet.</td>
                </tr>";
            }

            while($row = mysqli_fetch_array($res)){
                $output .="
                <tr>
                <td>".$row['id']."</td>
                <td>".$row['doctor']."</td>
                <td>".$row['patient']."</td>
                <td>".$row['date_dischange']."</td>
                <td>".$row['amount_paid']."</td>

               
                ";
            }
            $output .=" </tr> </table>";
            echo $output;
            
            
            ?>
        </div>
    </div>
</div>
    
</body>
</html>