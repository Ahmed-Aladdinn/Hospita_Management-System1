
<?php 
include("includes/connection.php");

if(isset($_POST['apply']))
{
    $fisrtname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confim_pass = $_POST['con_pass'];

    $error = array();

    if(empty($fisrtname))
    {
        $error['apply'] = "Enter Firstaname";
    }
    elseif(empty($surname))
    {
        $error['apply'] = "Enter suraname";
    }
    elseif(empty($username))
    {
        $error['apply'] = "Enter Username";
    }
    elseif(empty($email))
    {
        $error['apply'] = "Enter Email Address";
    }
    elseif($gender=="")
    {
        $error['apply'] = "Select Your gender";
    }
    elseif($country=="")
    {
        $error['apply'] = "Select Your Country";
    }
    elseif(empty($password))
    {
        $error['apply'] = "Enter Your Password";
    }
    elseif($password!=$confim_pass)
    {
        $error['apply'] = "Both Password don't Match";
    }

    if(!$error)
    {
        $query = "INSERT INTO doctors(firstname,surname,username,email,gender,phone,country, passwordd, salary, data_reg, statuss, profilee)
         VALUES ('$fisrtname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','asd')";

         $result = mysqli_query($connect,$query);
         if($result)
         {
             echo "<script>alert('You have successfully Applied')</script>";
             header("Location:doctorlogin.php");
         }
         else
         {
              echo "<script>alert('Failed')</script>";
            
             
         }


    }


}

if(isset($error['apply']))
{
    $s = $error['apply'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
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
    <title>Apply Now</title>
</head>
<body style="background-image:url(img/host.jpg) ; background-repeat: no-repeat; background-size: cover;">

    <?php 
    
    include("includes/header.php");
    
    
    ?>

<div class="container-fluid">
        <div class="col-md-12">
           <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6 jumbotron my-3">
               <h5 class="text-center my-5">Apply Now</h5>
               <div>
                   <?php
                   echo $show; 
                   ?>
               </div>
              
                   <form  method="POST">
                       <div class="form-group">
                           <label>Firstname</label>
                           <input type="text" name="fname" class="form-control"
                           autocomplete="off" placeholder="Enter Firstname"
                           value="<?php if(isset($_POST['fname'])) echo $_POST['fname'] ?>">
                       </div>
                       <div class="form-group">
                           <label>Surname</label>
                           <input type="text" name="sname" class="form-control"
                           autocomplete="off" placeholder="Enter Surename"
                           value="<?php if(isset($_POST['sname'])) echo $_POST['sname'] ?>">
                       </div>
                       <div class="form-group">
                           <label>Username</label>
                           <input type="text" name="uname" class="form-control"
                           autocomplete="off" placeholder="Enter Username"
                           value="<?php if(isset($_POST['uname'])) echo $_POST['uname'] ?>">
                       </div>
                       <div class="form-group">
                           <label>Email</label>
                           <input type="email" name="email" class="form-control"
                           autocomplete="off" placeholder="Enter Email Address"
                           value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
                       </div>

                       <div>
                           <label for="">Select Gender</label>
                           <select name="gender"class="form-control">
                               <option value="">Select Gender</option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Phone</label>
                           <input type="number" name="phone" class="form-control"
                           autocomplete="off" placeholder="Enter Phone Number"
                           value="<?php if(isset($_POST['phone'])) echo $_POST['phone'] ?>">
                       </div>

                       <div>
                           <label for="">Select Country</label>
                           <select name="country" class="form-control">
                               <option value="">Select Country</option>
                               <option value="germany">Germany</option>
                               <option value="us">United Satet</option>
                               <option value="paris">Paris</option>
                           </select>
                       </div>
                       <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="pass" class="form-control"
                           autocomplete="off" placeholder="Enter Password">
                       </div>
                       <div class="form-group">
                           <label>Confirm Password</label>
                           <input type="password" name="con_pass" class="form-control"
                           autocomplete="off" placeholder="Enter Confirm Password">
                       </div>

                       <input type="submit" name="apply" class="btn btn-success" value="Apply">
                       <p>I already have an account <a href="doctorlogin.php">Click here</a> </p>

                   </form>
               </div>
               <div class="col-md-3"></div>
           </div>
        </div>
    </div>
</body>
</html>