<?php 
session_start();
include("includes/connection.php");

if(isset($_POST['login']))
 {
     $username = $_POST['uname'];
     $password = $_POST['pass'];

     $error = array();

     $query =  "SELECT * FROM adminn WHERE username = ' $username' AND passwordd = '$password' ";
     $result = mysqli_query($connect,$query);


     if (empty($username))
     {
         $error['admin'] = "Enter Username";
     }
     elseif(empty($password))
     {
         $error['admin'] ="Enter Password;"; 
     }

     if (count($error)==0)
     {
         $query =  "SELECT * FROM adminn WHERE username ='$username' AND passwordd = '$password' ";
         $result = mysqli_query($connect,$query);

         if (mysqli_num_rows($result))
         {
            echo "<script> alert ('You have Login As an admin')</script>";
            $_SESSION['admin'] = $username;
            header("Location:admin/index.php");
             exit();

         }

         else
         {
             echo "<script> alert ('Invalid Username or Password')</script>";
         }
     }

 }
                            if (isset($error['admin']))
                           {
                               $e = $error['admin'];
                               $show ="<h5 class='text-center alert alert-danger'>$e</h5>";
                           }
                           else 
                           {
                               $show = "";
                           }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
</head>

<body style="background-image:url(img.webp) ; background-repeat: no-repeat; background-size: cover;">
    <?php  include("includes/header.php")?>

    <div style="margin-top: 20px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <form method="POST">
                        <div>
                            <?php 
                           
                           echo $show;

                           ?>
                        </div>
                        <div class="form-group">
                        <h1>Admin Login</h1>

                            <label>User Name</label>
                            <input type="text" name="uname" class="form-control" autocomplete="on"
                                placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="pass" class="form-control">
                        </div>
                        <input type="submit" name="login" class="btn btn-success" value="Login">

                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>