<?php
session_start();
include("includes/connection.php");
if(isset($_POST['create'])){
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];
    $error = array();

    if(empty($fname)){
        $error['ac'] ="Enter Firstname"; 
    }
    elseif(empty($sname)){
        $error['ac']="Enter Surname";
    }
    elseif(empty($uname)){
        $error['ac']="Enter Username";
    }
    elseif(empty($email)){
        $error['ac']="Enter Email Address";
    }
    elseif(empty($phone)){
        $error['ac']="Enter Phone Number";
    }
    elseif(empty($gender)){
        $error['ac']="Select Your Gender";
    }
    elseif(empty($country)){
        $error['ac']="Enter Your Country";
    }
    elseif(empty($pass)){
        $error['ac']="Enter Your Password";
    }
    elseif($con_pass !=$pass){
        $error['ac']="Both Password not match";
    }

    if(count($error)==0){
        $query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,country,passwordd, data_reg, profilee)
         VALUES ('$fname','$sname','$uname','$email','$phone','$gender','$country','$pass',NOW(),'pa.jpg')";

         $res =mysqli_query($connect,$query);
         if($res){
            echo "<script>alert('You have successfully Applied')</script>";
             header("Location:patientlogin.php");
         }
         else{
             echo "<script> alert('Falid')</script>";
         }

}
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body style="background-image:url(img/host.jpg) ; background-repeat: no-repeat; background-size: cover;">
    <?php 
    include("includes/header.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-2 jumbotron" >
                    <h5 class="text-center text-info my-2">Create Account </h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text"
                            name="fname"
                            class="form-control" 
                            autocomplete="off"
                            placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text"
                            name="sname"
                            class="form-control" 
                            autocomplete="off"
                            placeholder="Enter Surname">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text"
                            name="uname"
                            class="form-control" 
                            autocomplete="off"
                            placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text"
                            name="email"
                            class="form-control" 
                            autocomplete="off"
                            placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone No</label>
                            <input type="number"
                            name="phone"
                            class="form-control" 
                            autocomplete="off"
                            placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Your Country</option>
                                <option value="USA">USA</option>
                                <option value="Russia">Russia</option>
                                <option value="Germeny">Germeny</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" 
                            name="pass"
                            autocomplete="off"
                            placeholder="Enter Password"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" 
                            name="con_pass"
                            autocomplete="off"
                            placeholder="Confirm Password"
                            class="form-control">
                        </div>
                        <input type="submit" 
                        value="Create Account"
                        class="btn btn-info"
                        name="create" 
                        >
                        <p>I already have an account <a href="patientlogin.php">Click here</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>


</body>
</html>