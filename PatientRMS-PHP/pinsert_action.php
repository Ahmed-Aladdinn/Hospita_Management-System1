<?php
    require 'connection.php';

    session_start();
    if(!isset($_SESSION["userID"]))
    {
    header("Location:admin.login.php");
    }

    if (isset($_POST["input-submit"])):
        $pssn=$_POST["pssn"];
        $uid=$_SESSION['userID'];
        $fn=$_POST["fname"];
        $ln=$_POST["lname"];
        $adr=$_POST["adr"];
        $cno=$_POST["cno"];
        $mail=$_POST["mail"];
        $newdate=date_Create($_POST["dob"]);
        $dob=date_format($newdate,"Y-m-d");
        $gen=$_POST["gen"];
        $pass=$_POST["pass"];
    
        //name validation
        if ( !preg_match("/^[a-zA-Z-' ]*$/",$fn) && !preg_match("/^[a-zA-Z-' ]*$/",$ln) ):
            header("Location:pinsert.php?error=wrongname");
            exit();
        else:
            //contact 11 digits phone number validation
            if ( !preg_match('/^[0-9]{11}+$/', $cno) ):
                header('Location:pinsert.php?error=wrongphone');
                exit();
            else:
                //email validation
                if (!filter_var($mail,FILTER_VALIDATE_EMAIL)):
                    header('Location:pinsert.php?error=wrongmail');
                    exit();
                else:
                //already existing patient validation
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt, 'SELECT * FROM patient_login WHERE p_ssn = ?');
                    mysqli_stmt_bind_param($stmt ,'s' ,$pssn);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    // if ( $row = mysqli_fetch_assoc($result) ):
                    if ( mysqli_num_rows($result) > 0 ):
                        header("Location:pinsert.php?error=wronguser");
                        exit();
                    else:
                        $sql="INSERT INTO patient (SSN, F_Name, L_Name, Address, Contact_No, Email, Date_Of_Birth, Gender)
                        VALUES ('$pssn', '$fn', '$ln', '$adr', '$cno', '$mail','$dob','$gen')";

                        $sqll="INSERT INTO patient_login (p_ssn, pass)
                            VALUES ('$pssn', '$pass')";

                        $is_inserted=mysqli_query($conn,$sql);
                        $is_insertedd=mysqli_query($conn,$sqll);
                        if($is_inserted && $is_insertedd):
                            header("Location:pinsert.php?login=success");
                            exit();
                        else:
                            header("Location:pinsert.php?error=wrong");
                            exit();
                        endif;
                    endif;
                endif;
            endif;
        endif;
    else :
        header("Location:pinsert.php");
        exit();
    endif;
 ?>
