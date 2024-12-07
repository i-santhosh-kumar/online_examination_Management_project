<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .container-md {
            margin-top: 100px;
        }

        .form-front {
            border: 2px solid black;
            margin-right: 20%;
            margin-left: 20%;
        }

        .form-control {
            text-align: center;
            width: 300px;
            margin-left: 27%;
        }
    </style>
</head>

<body>

    <?php
    if (isset($_GET['message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><center>';
        echo ($_GET["message"]);
        echo '</center><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    ?>

    <div class="container-md text-center">
        <div class="form-front">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <br><br>
                    <label for="fmail"><b>Enter your login email</b></label>
                    <input type="email" class="form-control" name="fmail" id="fmail" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com">
                </fieldset>
                <br>
                <input type="submit" class="btn btn-primary" value="submit">
                <br><br>
            </form>
        </div>
    </div>
</body>

</html>
<?php
include_once('../dbconfig.php');
session_start();
if ($connection) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['fmail'];
        $query = "select gmail from instructor where gmail='$email'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            $to_email = $email;
            $subject = "OTP verification";
            $body = rand(1000, 10000);
            $_SESSION['otp'] = $body;
            $headers = "From: sriharishm@students.tcarts.in";
            $mail = mail($to_email, $subject, $body, $headers);
            if ($mail) {
                $_SESSION['gmail'] = $email;
                header('location:forgototp.php');
            } else {
                header('location:forgotpassword.php?message=please try again!!!');
            }
        } else {
            header('location:forgotpassword.php?message=please enter the registered email id!!!');
        }
    }
} else {
    die("something went wrong with database" . mysqli_connect_error());
}
mysqli_close($connection);
?>