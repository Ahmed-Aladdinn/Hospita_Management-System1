<!DOCTYPE html>
<html lang="en" class="full-page">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <h1 style="color:white;">Login As</h1>
    <link rel="stylesheet" href="css/style.css.css">
    <style>
        h1 {text-align: center;}
        h1{font-size: 50px;}
        .content {
            
            width: 100%;
            height: 500px;
            margin: auto;
            margin-bottom: 50px;
            margin-top: 50px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
            align-items: center;
        }
        
        .full-page {
            background-image: url("img.webp");
            background-repeat: no-repeat;
            background-size: cover;
            

        }
        
        .option {
            border-radius: 25px;
            border: 3px solid  #008080;
            height: 180px;
            width: 30%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            float: left;
            align-items: center;
            display: flex;
            justify-content: center;
            
        }
        
        img:hover {
            transform: scaleX(-1);
        }
        
        .option a {
            text-decoration: none;
            color:#333333;
            font-size: 25px;
            font-weight: bolder;
            width: 30%;
            position: absolute;
            
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="option">
            <a href="../adminlogin.php" target="_blank" > Admin </a>
        </div>
        <div class="option">

            <a href="../patientlogin.php" target="_blank">Patient</a>
        </div>
        <div class="option">
            <a href="../doctorlogin.php" target="_blank">Doctor</a>


        </div>
        
        

</body>

</html>