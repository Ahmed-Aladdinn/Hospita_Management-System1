<?php  
    session_start();
//check if signed in 
if (!isset($_SESSION['patient'])):
    header('Location:../patientlogin.php');
endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Invoice</title>
</head>
<body>
    <?php
    include("../includes/header.php");
    include("../includes/connection.php");
    
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
            
                            <h5 class="text-center my-3">My Invoice</h5>
                            <?php
                            
                            $pat = $_SESSION['patient'];

                            $query = "SELECT * FROM patient WHERE username='$pat'";
                            $res = mysqli_query($connect,$query);

                            $row = mysqli_fetch_array($res);
                            $fname = $row['firstname'];

                            $querys = "SELECT * FROM income WHERE patient='$fname'";
                            $ress= mysqli_query($connect,$querys);

                            $output ="";

                            $output .="
                    <table class='table table-bordered'>

                    <tr> 
                    <td>ID</td>
                    <td>Doctor</td>
                    <td>Patient</td>
                    <td>Date Discharge</td>
                    <td>Amount Paid</td>
                    <td>Description</td>
                    <td>Action</td>
                    </tr>


                    ";

                    if(mysqli_num_rows($res)<1){
                        $output .="
                        <tr>
                        <td class='text-center' colspan='8'>No Appointment Yet </td>
                        </tr> 
                        ";
                    }
                    if(mysqli_num_rows($ress)<1){
                        $output .="
                        <tr>
                        <td colspan='6' class='text-center'> No Invoice</td>
                        </tr>
                        ";
                    }

                    while($row =mysqli_fetch_array($ress)){
                        $output .="
                        <tr>

                        <td>".$row['id']."</td>
                        <td>".$row['doctor']."</td>
                        <td>".$row['patient']."</td>
                        <td>".$row['date_dischange']."</td>
                        <td>".$row['amount_paid']."</td>
                        <td>".$row['description']."</td>
                        <td>
                        <a href='view.php?id=".$row['id']."'>
                        <button class='btn btn-info'>View</button>
                        </td>
                        ";
                    }
                    $output .="</tr></table>";

                    echo $output;
                    
                    ?>

                   
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>