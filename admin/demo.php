<?php 
$host = "localhost";
$nam = "root";
$pass = "root";
$dbname = "hms";

$connect = mysqli_connect($host,$nam,$pass,$dbname);
if(isset($_POST['add']))//بعرض او بسترجع القيم اللي دخلتها في الفورم قبل كده ومش هتظهر في اليو ار ال
{
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $image = $_FILES['img']['name'];

    $error = array();
    if(empty($uname)){
        $error['u'] = "Enter Admin Username";
    }
    elseif(empty($pass))
    {
        $error['u'] = "Enter Admin Password";
    }
    elseif (empty($image))
    {
        $error ['u'] = "Add Admin Profile";
    }

    if(count($error) ==0)
    {
        $query = "SELECT id FROM adminn WHERE username = ?";
        $stmt = mysqli_stmt_init($connect);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, 's', $uname);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($res) > 0)
            echo "<script>alert('Sorry this username already exist.')</script>";
        else{
            // $sql = "INSERT INTO adminn(username,passwordd,profilee) VALUES ('$uname','$pass','$image')";
            // $res = mysqli_query($connect,$sql);
            $sql = "INSERT INTO adminn(username,passwordd,profilee) VALUES (?,?,?)";
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt,'sss',$uname,$pass,$image);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_affected_rows($stmt) == 1)
            {
                move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                echo "<script>alert('Admin added successfully. ');</script>";
                header("location:index.php");                        
            }
        }

    }
}
    
    if(isset($error['u']))
    {
        $er = $error['u'];
        $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
    }
    else
    {
        $show ="";
    }
                              
                                
?>