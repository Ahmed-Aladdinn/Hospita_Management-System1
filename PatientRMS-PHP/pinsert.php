<?php
 session_start();
 if(!$_SESSION["userID"])
 {
   header("Location:admin.login.php");
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="180x180" href="Resource/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="Resource/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Resource/favicon/favicon-16x16.png">
  <link rel="manifest" href="Resource/favicon/site.webmanifest">
  <link rel="stylesheet" type="text/css" href="css/aregister_style.css">
  <link rel="stylesheet" type="text/css" href="css/nav-menu.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css" />

  <title> Register </title>
</head>
<body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>

  <script>
  jQuery(function($) {
      $("#dob").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange:"1920:2022"
    });
  });
  </script>
    <div class="navigation-bar" style="text-align: center">
        <a href="index.php" class = "navlink" >Home</a>
        <a href="srecords.php" class = "navlink">Records </a>
        <!-- <a href="sinsert.php">Insert</a> -->
        
        <div class = "dropdown">
            <a class = navlink class = "dropdown" >Insert</a>
            <div class="dropdown-content">
            <a href = 'sinsert.php' class = "nav_sublink">Record</a>
            <a href = 'pinsert.php' class = "nav_sublink">Patient</a>
            </div>
        </div>

        <a href="dsearch.php" class = "navlink">Search</a>
        <a class='logout navlink' href="logout.php">Logout</a>
    </div>
    <?php
    if (isset($_GET["error"]))
    {
        if($_GET["error"]=="wronguser")
        {
            echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Patient ID </h2></div>";
        }
        if($_GET["error"]=="wrong")
            echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Something Went Wrong <span style = 'font-size: 1rem;'>During Insertion</span> </h2></div>";
        else if($_GET["error"] == "wrongname")
            echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Patient Name <span style = 'font-size: 1rem;'>(Only letters and white space allowed. )</span></h2></div>";
        else if($_GET["error"] == "wrongmail")
            echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Patient Email </h2></div>";
        else if($_GET["error"] == "wrongphone")
            echo "<div class='welcome' style='color: #D61A3C'><h2 class='welcome_mssg'> Wrong Patient Phone </h2></div>";
    }
    elseif (isset($_GET["login"])) {
        if ($_GET["login"]=="success") {
          echo "<div class='welcome' style='color: #97DC21'><h2 class='welcome_mssg'> Registration Successful </h2></div>";
        }
    }
    else
        echo "<div class='welcome'><h2 class='welcome_mssg'> Patient Registration Form</h2></div>
        <div class='input-form-box'>
        <form class='input-form' action='pinsert_action.php' method='post'>
            <label for='pssn'>Patient ID</label>
            <input type='text' name='pssn' placeholder='Enter a valid Patient ID' autocomplete=off required><br>

            <label for='fname'>First Name</label>
            <input type='text' name='fname' placeholder='Enter First Name' autocomplete=off required><br>


            <label for='lname'>Last Name</label>
            <input type='text' name='lname' placeholder='Enter Last Name' autocomplete=off required><br>


            <label for='adr'>Address</label>
            <input type='text' name='adr' placeholder='Current Address' autocomplete=off required ><br>

            <label for='cno'>Contact No.</label>
            <input type='text' name='cno' placeholder='Contact No.' autocomplete=off required><br>

            <label for='mail'>Email</label>
            <input type='text' name='mail' placeholder='Email' autocomplete=off required;><br>

            <label for='dob'>Date of Birth</label>
            <input type='text' name='dob' id='dob' placeholder='Date of birth' required><br>

            <label for='gen'>Gender</label>
            <input type='text' name='gen' placeholder='Gender' required><br>

            <label for='pass'>Password</label>
            <input type='text' name='pass' placeholder='Password' autocomplete=off required><br>

            <input type='submit' name='input-submit' value='Save'>
        </form>

        </div>";
        ?>
    </body>
<html>