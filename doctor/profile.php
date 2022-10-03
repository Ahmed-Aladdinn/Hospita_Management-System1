<?php session_start();
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
    <title>Docors Profile Page</title>
</head>

<body>
    <?php
    
    include("../includes/header.php");
    
    ?>


    <div class="contianer-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php 
                    include("sidenav.php");
                    include("../includes/connection.php");
                    ?>
                </div>

                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                <?php 
                                $doc = $_SESSION['doctor'];
                                $query = "SELECT * FROM doctors WHERE username ='$doc' ";

                                $res = mysqli_query($connect,$query);
                                $row = mysqli_fetch_array($res);
                                if(isset($_POST['upload'])){
                                    $img = $_FILES['img']['name'];
                                    if(empty($img)){

                                    }
                                    else{
                                        $query = "UPDATE doctors SET profilee='$img' WHERE username='$doc'";
                                        $res = mysqli_query($connect,$query);

                                        if($res){
                                            move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                        }
                                    }
                                }
                                
                                
                                ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                

                                    <?php 
                                    echo "<img src='img/".$row['profilee']."'style='height:300px; width:300px'  class='col-md-12 my-1' ";
                                    ?> 
                                    
                                    <br>
                                   
                                    <input type="file" name="img" class="form-control my-1">
                                    <input type="submit" value="Update Profile" name="upload" class="btn btn-success">
                                </form>

                                <div class="my-3">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2" class="text-center">Details</th>
                                        </tr>
                                        <tr>
                                            <td>Firstname</td>
                                            <td><?php echo $row['firstname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td><?php echo $row['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td><?php echo $row['surname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone No.</td>
                                            <td><?php echo $row['phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $row['gender']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><?php echo "+".$row['phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Salary</td>
                                            <td><?php echo "$".$row['salary']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my-2">Change Username</h5>

                                    <?php
                                    
                                    if(isset($_POST['change_uname'])){
                                        $uname = $_POST['uname'];

                                        if(empty($uname)){

                                        }
                                        else{
                                            $query = "UPDATE doctors SET username='$uname' WHERE username='$doc' ";
                                            $res = mysqli_query($connect,$query);

                                            if($res){
                                                $_SESSION['doctor']= $uname;
                                            }

                                        }

                                    }
                                    
                                    
                                    
                                    ?>
                                    <form action="" method="post">
                                        <label>Change Username </label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                        <br>
                                        <input type="submit" name="change_uname"  value="Change Username" class="btn btn-success">
                                    </form>

                                    <br><br>
                                    <h5 class="text-center my-2">Change Passsword</h5>
                                    <?php
                                    
                                    if(isset($_POST['change_pass'])){
                                        $old =$_POST['old_pass'];
                                        $new =$_POST['new_pass'];
                                        $con =$_POST['con_pass'];

                                        $ol = "SELECT * FROM doctors WHERE username='$doc'";
                                        $ols = mysqli_query($connect,$ol);
                                        $row = mysqli_fetch_array($ols);

                                        


                                        if($old != $row['passwordd'] ){


                                        }
                                        else if(empty($new)){


                                        }
                                        elseif($con !=$new){

                                        }

                                        else{
                                            $query = "UPDATE doctors SET passwordd='$new' WHERE username ='$doc'";
                                            mysqli_query($connect,$query);


                                        }
                                    }
                                    
                                    
                                    ?>
                                    <form action="" method="post">
                                        <div>
                                        <label>Old Password </label>
                                        <input type="password"
                                         name="old_pass" 
                                         class="form-control"
                                        autocomplete="off" 
                                        placeholder="Enter Old Password">
                                        </div>
                                        <div>
                                        <label>New Password </label>
                                        <input type="password"
                                         name="new_pass"
                                        class="form-control" 
                                        autocomplete="off" 
                                        placeholder="Enter New Password">
                                        </div>
                                        <div>
                                        <label>Confirm Password </label>
                                        <input type="password" 
                                        name="con_pass" 
                                        class="form-control" 
                                        autocomplete="off" 
                                        placeholder="Enter Confirm Password">
                                        </div>
                                        <br>
                                        <input type="submit" name="change_pass"  value="Change Password" class="btn btn-info">
                                    </form>

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