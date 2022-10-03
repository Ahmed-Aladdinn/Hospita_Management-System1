<?php 
session_start();

include('includes/connection.php');

if(isset($_POST['login']))

{
    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $query = "SELECT * FROM doctors WHERE username = '$uname' AND passwordd ='$password' ";
    $res = mysqli_query($connect,$query);

    $row = mysqli_fetch_array($res);


    if(empty($uname))
    {
        $error['login'] = "Enter Username";
    }
    elseif(empty($password))
    {
        $error['login'] = "Enter Password";
    }
    elseif($row['statuss']=="Pendding")
    {
        $error['login'] ="Please Wait For the admin to confirm";
    }

    elseif($row['statuss']=="Rejected")
    {
        $error['login'] ="Try again Later";
    }
    if(count($error)==0)
    {
        
    $query = "SELECT * FROM doctors WHERE username = '$uname' AND passwordd ='$password' ";
    $res = mysqli_query($connect,$query);
 

    if(mysqli_num_rows($res))
    {
        echo "<script>alert('Done')</script>";
        $_SESSION['doctor'] = $uname;
         header('Location:doctor/index.php');
    }
    else 
    {
        echo "<script>alert('Invalid Account')</script>";


    }
    }    
}

if(isset($error['login']))
{
    $l = $error['login'];
    $show ="<h5 class='text-center alert alert-danger'>$l</h5>";
}
else 
{
    $show ="";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
</head>
<body style="background-image:url(img.webp) ; background-repeat: no-repeat; background-size: cover;">

    <?php  
    include('includes/header.php');
    
    ?>

<div class="container-fluid">
        <div class="col-md-12">
           <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6 jumbotron my-3">
               <h5 class="text-center my-5 text-info ">Doctors Login</h5>
              
               <div>
                   <?php 
                   echo $show;
                   ?>
               </div>
              
                   <form  method="POST">
                       <div class="form-group">
                           <label>User Name</label>
                           <input type="text" name="uname" class="form-control"
                           autocomplete="on" placeholder="Enter Username">
                       </div>
                       <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="pass" class="form-control">
                       </div>
                       <input type="submit" name="login" class="btn btn-success" value="Login">
                       <p>I don't have an account <a href="apply.php">Apply Now</a> </p>

                   </form>
               </div>
               <div class="col-md-3"></div>
           </div>
        </div>
    </div>

</body>
</html>