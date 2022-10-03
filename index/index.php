<!DOCTYPE html>
<html lang="en" class="full-page">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css.css">
    <style>
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
            <a href="hms.php" target="_blank" > HMS <br>admin-doctor-patient</a>
        </div>
        <div class="option">

            <a href="../website/index.html" target="_blank">WebSite</a>
        </div>
        <div class="option">
            <a href="../MEDICALIMAGE/Medicalimage.html" target="_blank">Medical Images</a>


        </div>
        <div class="option">
            <a href="../PatientRMS-PHP/index.php" target="_blank" color="white">Inpatient</a>

        </div>
        

</body>

</html>