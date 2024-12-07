<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Admin Login </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
   
    <!--cdn link for no copy paste for the website-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../no-tab-no-cp.js"></script>
    
    <style>
        body
        {
            background-color: #38476f;
        }
        .container
        { 
            background-color: aliceblue;
            width: 400px;
            max-height: 600px;
            margin-top: 2%;
            padding: 50px 40px;
            border-radius: 40px;
        }
        .form-group,label
        {
            font-weight: bold;
        }
        input[type="checkbox"]
        {
            cursor: pointer;
        }
        .capt
        {
          padding: 10px;
        }
        img
        {
          border-radius: 20px;
        }
        i 
        {
          position: absolute;
          min-width: 40px;
          margin-top: -28px;
          margin-left: 285px;
          cursor: pointer;
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
        <img src="../images/head.png" alt="">
    </div>


        <?php 
            if(isset($_GET['message']))
            {
              echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"><center>';
              echo($_GET["message"]);
              echo '</center><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
              $_SESSION['times']=$_SESSION['times']+1;
            } 
            if($_SESSION['times']>=3)
            {
              $to_email = "sriharishkumar17@gmail.com,hepsya@students.tcarts.in,sangeeth_001@students.tcarts.in";
              $subject = "DANGER!!! ALERT!!! BECAREFULL!!!";
              $body = "Alert someone was trying to access your login!!!!";
              $headers = "From: sriharishm@students.tcarts.in";
              $mail=mail($to_email, $subject, $body, $headers);
              if($mail)
              {
                  echo("succesfully sent");
              }
              else
              {
                  echo("not successfull");
              }
            }
        ?>

    <div class="container border">
        <form method="post" action="admin-confirm.php" class="needs-validation" novalidate>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this Email field.</div>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
              <i class="far fa-eye" id="togglePassword" onclick="eye()"></i>
              <span id="text2"></span>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this Password field.</div>
            </div>
            <div class="form-group">
              <div class="capt">
               <center><img src="captcha.php" alt=""></center> 
              </div>
            </div>
            <div class="form-group">
                <label for="captcha">captcha:</label>
                <input type="text" class="form-control" name="captcha" id="cap" placeholder="Enter Captcha" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this Captcha field.</div>
            </div>
            <center><button type="submit" class="btn btn-primary">Submit</button></center>
          </form>
    </div>
    <script>
        // Disable form submissions if there are invalid fields
        (function() {
          "use strict";
          window.addEventListener("load", function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener("submit", function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add("was-validated");
              }, false);
            });
          }, false);
        })();
        
        function eye()
        {
          const togglePassword = document.querySelector('#togglePassword');
          const password = document.querySelector('#pwd');
      
          togglePassword.addEventListener('click', function (e) {
          // toggle the type attribute
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          // toggle the eye slash icon
          this.classList.toggle('fa-eye-slash');
          });
        }
    </script>
</body>
</html>