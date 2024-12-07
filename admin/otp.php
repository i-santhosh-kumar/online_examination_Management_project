<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>OTP</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <!--cdn link for no copy paste for the website-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../no-tab-no-cp.js"></script>
  <style>
    body {
      background-color: #38476f;
      background-color: #070a3c;
    }

    .container {
      background-color: aliceblue;
      width: 400px;
      max-height: 300px;
      margin-top: 4%;
      padding: 50px 40px;
      border-radius: 40px;
    }

    .form-group,
    label {
      padding: 3px;
      font-weight: bold;
    }
  </style>

  <script type="text/javascript">
    function timeout() {
      //var hours=Math.floor(timeLeft/60);
      var minute = Math.floor(timeLeft / 60);
      var second = timeLeft % 60;
      var sec = checktime(second);
      if (timeLeft <= 0) {
        clearTimeout(tm);
        //document.getElementById("form1").submit();
        window.location.href = "admin-login.php";
      } else {
        document.getElementById("time").innerHTML = minute + ":" + sec;
        //window.stop("otp.php");
      }
      timeLeft--;
      var tm = setTimeout(function() {
        timeout()
      }, 1000)
    }

    function checktime(msg) {
      if (msg < 10) {
        msg = "0" + msg;
      }
      return msg;
    }
  </script>

</head>
<body onloadedmetadata="timeout()">

  <script type="text/javascript">
    var timeLeft = 3 * 20;
  </script>

  <div class="container border">
    <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" class="needs-validation" novalidate>
      <div class="form-group">
        <label for="email">OTP: <div id="time" style="float:right">timeout</div></label>
        <input type="number" class="form-control" id="otp" placeholder="Enter otp" name="otp" required>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this OTP field.</div>
      </div>
      <br>
      <center><button type="submit" class="btn btn-success">Submit</button></center>
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
  </script>
</body>
</html>

<?php
session_start();
include_once("../dbconfig.php");
if ($connection) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];
    if (strcmp($otp, $_SESSION['otp']) == 0) {
      $email = $_SESSION['admin_email'];
      $device_query = "update admin set devices=1 where email='$email'";
      mysqli_query($connection, $device_query);
      mysqli_close($connection);
      header("location:admin.php");
    } else 
    {
      header("location:admin-login.php?message=otp time out or wrong otp!!!");
    }
  }
}
?>