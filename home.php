<?php
session_start();
$_SESSION['times']=0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='login-style.css'>
    <style>
        body
        {
            padding: 0%;
            margin: 0%;
        }
        .links
        {
            font-family: 'Courier New', Courier, monospace;
            position: absolute;
            left: 550px;
            top: 250px;
        }
        .links a
        {
            text-decoration: none;
            padding: 55px;
            background-color: rgb(180, 233, 245);
            border-radius: 10px;
            color: rgb(31, 48, 102);
            border: 2px solid rgb(52, 118, 184);     
        }

        .images
        {
            position: absolute;
            left: 400px;
            top: 200px;
        }
        .logo img
        {
            width: 100%;
            height: 140px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="images/head.png" alt="">
    </div>
        <div class="links">    
            <a href="admin/admin-login.php"> <b> ADMINISTRATOR-LOGIN <b> </a> <br> <br><br> <br> <br><br> <br> <br>
            &nbsp;&nbsp;&nbsp;<a href="instructor/instructor-login.php"> FACULTY-LOGIN</a> <br> <br> <br> <br> <br> <br> <br> <br> 
            &nbsp;&nbsp;&nbsp;<a href="student/student-login.php"> STUDENT-LOGIN</a>  
        </div>  

        
<div class="images">
    <img id="img" src="images/img.png" width="100" height="100" alt="normal.png"></img><br> <br>  <br> 
    <img id="img" src="images/normal.png" width="100" height="100" alt="normal.png"></img> <br><br> 
    <br><img id="img" src="images/images.png" width="100" height="100" alt="normal.png"></img><br> 
</div>
</body>
</html>