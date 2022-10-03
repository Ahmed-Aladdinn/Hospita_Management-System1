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
    <title>Patient Profile</title>
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
            
            include("sidenav.php");
            $patient = $_SESSION['patient'];
            $query ="SELECT * FROM patient WHERE username=?";
            $stmt = mysqli_stmt_init($connect);
            mysqli_stmt_prepare($stmt,$query);
            mysqli_stmt_bind_param($stmt, 's',$patient);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_array($res);

            ?>
       
        </div>
        <div class="col-md-10">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">

                    <?php 
                        if(isset($_POST['upload'])):
                            $img = $_FILES['img']['name'];

                            if(!empty($img)):
                                // $query = "UPDATE patient SET profilee='$img' WHERE username='$patient'";
                                // $res = mysqli_query($connect,$query);
                                $query = "UPDATE patient SET profilee = ? WHERE username = ?";
                                $stmt = mysqli_stmt_init($connect);
                                mysqli_stmt_prepare($stmt,$query);
                                mysqli_stmt_bind_param($stmt, 'ss',$img , $patient);
                                mysqli_stmt_execute($stmt);
                                // $res = mysqli_stmt_get_result($stmt);

                                if(mysqli_stmt_affected_rows($stmt) == 1)
                                    move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                
                                header('location:profile.php');
                                exit();
                            endif;
                        endif;
                    ?>
                        <h5>My Profile</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-control" style="height: 300px; width: 50%; overflow: hidden;">
                        <?php 
                        echo "<img src='img/".$row['profilee']."' class='col-md-12'>"
                        
                        ?>
                        </div>
                        <input type="file"
                        name="img"
                        class="form-control my-2"
                        >
                        <input type="submit"
                        name="upload"
                        value="Update Profile"
                        class="btn btn-success"
                        >

                        </form>

                        <table class="table table-bordered my-4">
                            <tr>
                                <th colspan="2" class="text-center">My Details</th>
                            </tr>
                            <tr>
                                <td>Firstname</td>
                                <td><?php echo $row['firstname']?></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><?php echo $row['surname']?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><?php echo $row['username']?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $row['email']?></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td><?php echo "+".$row['phone']?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $row['gender']?></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td><?php echo $row['country']?></td>
                            </tr>



                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-center">Change Username</h5>
                        <?php
                        if(isset($_POST['update'])){
                            $uname = $_POST['uname'];

                            if(empty($uname)){

                            }
                            else{
                                 $query ="UPDATE patient SET username = ? WHERE username = ?";
                                //  $query ="UPDATE patient SET username='$uname' WHERE username='$patient'";
                                // $res = mysqli_query($connect,$query);
                                $stmt = mysqli_stmt_init($connect);
                                mysqli_stmt_prepare($stmt,$query);
                                mysqli_stmt_bind_param($stmt, 'ss', $uname, $patient);
                                mysqli_stmt_execute($stmt);
                                
                                if(mysqli_stmt_affected_rows($stmt) == 1)
                                    $_SESSION['patient']=$uname;
                                }
                        }
                        ?>
                        <form action="" method="post">
                            <label for="">Enter Username</label>
                            <input type="text"
                            name="uname"
                            class="form-control"
                            autocomplete="off"
                            placeholder="Enter Username"
                            >
                            <input type="submit"
                            name="update"
                            value="Update Username"
                            class="btn btn-info my-3">
                        </form>

                        <?php
                            if (isset($_POST['change'])):
                                $old = $_POST['old_pass']; 
                                $new = $_POST['new_pass']; 
                                $con = $_POST['con_pass'];

                                $stmt = mysqli_prepare($connect,"SELECT passwordd FROM patient WHERE username = ? AND passwordd = ? ");
                                mysqli_stmt_bind_param($stmt, 'ss', $patient, $old);
                                mysqli_stmt_execute($stmt);
                                $stmt->store_result();
                                if (!empty($con))
                                    if (!empty($old))
                                        if (!empty($new))
                                            if (mysqli_stmt_affected_rows($stmt) == 1){
                                                if ($con != $new):
                                                    echo "<script>alert('Confirmation does not fit')</script>";
                                                else:
                                                    $query = "UPDATE patient SET passwordd = ? WHERE username = ?";
                                                    $stmt = mysqli_stmt_init($connect);
                                                    mysqli_stmt_prepare($stmt,$query);
                                                    $uname = $_SESSION['patient'];
                                                    mysqli_stmt_bind_param($stmt, 'ss',$new, $uname);
                                                    mysqli_stmt_execute($stmt);
                                                    // $res = mysqli_query($connect,$query);
                                                    if(mysqli_stmt_affected_rows($stmt) == 1)
                                                        echo "<script> alert('Password Changed')</script>";
                                                endif;
                                            }
                                            else
                                                echo "<script>alert('Check the old password')</script>";
                                        else
                                            echo '<script>alert("Enter the new password")</script>';
                                    else
                                        echo '<script>alert("Enter the old password")</script>';
                                else
                                    echo '<script>alert("Enter the confirmation password")</script>';
                            endif;
                        ?>

                        <h5 class="my-4 text-center">Change Password</h5>
                        <form method="post">

                        <label for="">Old Password</label>
                        <input type="password"
                        name="old_pass"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Enter Old Password"
                        >

                        <label for="">New Password</label>
                        <input type="password"
                        name="new_pass"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Enter New Password"
                        >

                        <label for="">Confirm Password</label>
                        <input type="password"
                        name="con_pass"
                        class="form-control"
                        autocomplete="off"
                        placeholder="Confirm Password"
                        >
                        <input type="submit"
                            name="change"
                            value="Change Password"
                            class="btn btn-success my-3">
                        </form>


                    </div>

                </div>
            </div>

        </div>
        </div>
    </div>
</div>
    
</body>
</html>