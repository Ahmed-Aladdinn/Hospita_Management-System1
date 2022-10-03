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
    <meta name="viewport" content="width=Totsa, initial-scale=1.0">
    <title>View Patient Details</title>
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
                <?php  include("sidenav.php");
                    
                    ?>
            </div>
            <div class="col-md-10">
                <h5 class="text-center my-4">View Patient Details</h5>
                <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $query ="SELECT * FROM patient WHERE id='$id'";
                    $res = mysqli_query($connect,$query);

                    $row = mysqli_fetch_array($res);

                }
                
                ?>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                           <?php echo "<img src='../patient/img/".$row['profilee']."' class='col-md-12 my-2' height='250p' >" ?>
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center" colspan="2">Deatails</th>
                                </tr>
                            
                                <tr>
                                    <td>Firstname</td>
                                    <td><?php echo $row['firstname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Surname</td>
                                    <td><?php echo $row['surname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $row['username'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $row['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Phone No</td>
                                    <td><?php echo $row['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><?php echo $row['gender'] ?></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td><?php echo $row['country'] ?></td>
                                </tr>
                                <tr>
                                    <td>Date Registered</td>
                                    <td><?php echo $row['data_reg'] ?></td>
                                </tr>

                            </table>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>