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
    <title>Book Appointment</title>
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
            <h5 class="text-center my-3">Book Appointment</h5>
            <?php
            
            $pat = $_SESSION['patient'];
            $query = "SELECT * FROM patient WHERE username ='$pat'";
            $res = mysqli_query($connect,$query);

            $row = mysqli_fetch_array($res);

            $firstname = $row['firstname'];
            $surname = $row['surname'];
            $gender = $row['gender'];
            $phone = $row['phone'];

            if(isset($_POST['book'])){
                $date = $_POST['date'];
                $sym = $_POST['sym'];

                if(empty($sym)){

                }
                else{
                    $query = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_date, symptoms, statuss,date_booked)
                     VALUES('$firstname','$surname','$gender','$phone','$date','$sym','Pendding',NOW())";

                     $res = mysqli_query($connect,$query);

                     if($res){
                         echo "<script>alert('You have Booked an Appointment')</script>";
                     }
                }
            }


            
            ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6 jumbotron bg-success">
                        <form action="" method="post">
                            <label for="">Appointment Date</label>
                            <input type="date"
                            name="date"
                            class="form-control">

                            <label for="">Symptoms</label>
                            <input type="text"
                            name="sym"
                            class="form-control"
                            autocomplete="off"
                            placeholder="Enter Symptoms">

                            <input type="submit"
                            name="book"
                            class="btn btn-info my-3"
                            value="Book Appointment">
                        </form>

                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>