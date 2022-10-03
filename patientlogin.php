<?php

session_start();
include("includes/connection.php");

if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if(empty($uname)){
        echo "<script>alert('Enter Username')</script>";
    }
    elseif(empty($pass)){
        echo "<script>alert('Enter Password')</script>";
    }
    else{

        $query = "SELECT * FROM patient WHERE username='$uname' and passwordd='$pass'";
        $res = mysqli_query($connect,$query);
        if(mysqli_num_rows($res)==1){
            header("Location:patient/index.php");
            $_SESSION['patient'] = $uname;

        }
        else {
            echo "<script>alert('Invailed Account')</script>";

        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
</head>
<body style="background-image:url(img.webp) ; background-repeat: no-repeat; background-size: cover;">
    <?php
    include("includes/header.php");
    
    ?>

    <div class="container-fulid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-6 my-5 jumbotron">
                    <h5 class="text-center text-info my-2">Patient Login</h5>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" 
                            name="uname" 
                            class="form-control"
                            autocomplete="off"
                            placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" 
                            name="pass" 
                            class="form-control"
                            autocomplete="off"
                            placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-info" value="Login">
                        <p>I don't have an account <a href="paccount.php">Click here.</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>