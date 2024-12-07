<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>student login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
    <style>
        body {
            margin: 0;
            color: rgb(180, 233, 245);
            background: aliceblue;
            font: 600 16px/18px 'Open Sans', sans-serif;
            margin-top: 0px;
            margin-left:30px;
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }
        

        .clearfix:after,
        .clearfix:before {
            content: '';
            display: table
        }

        .clearfix:after {
            clear: both;
            display: block
        }

        a {
            color: inherit;
            text-decoration: none
        }

        .login-wrap {
            width: 100%;
            max-width: 540px;
            min-height: 540px;
            position: relative;
            /*background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;*/
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
            margin-left: 410px;
        }

        .login-html {
            width: 100%;
            height: 100%;
            position: absolute;
            padding: 90px 70px 50px 70px;
            background:
                /*#353333; rgba(40, 57, 101, .9);*/
                #070a3c;
                
        }

        .login-html .sign-in-htm,
        .login-html .sign-up-htm {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            position: absolute;
            transform: rotateY(180deg);
            backface-visibility: hidden;
            transition: all .4s linear;
        }

        .login-html .sign-in,
        .login-html .sign-up,
        .login-form .group .check {
            display: none;
        }

        .login-html .tab,
        .login-form .group .label,
        .login-form .group .button {
            text-transform: uppercase;
        }

        .login-html .tab {
            font-size: 22px;
            margin-right: 15px;
            padding-bottom: 5px;
            margin: 0 15px 10px 0;
            display: inline-block;
            border-bottom: 2px solid transparent;
            cursor: pointer;
        }

        .login-html .sign-in:checked+.tab,
        .login-html .sign-up:checked+.tab {
            color: rgb(243, 246, 244);
            border-color: #1161ee;
        }

        .login-form {
            min-height: 345px;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
        }

        .login-form .group {
            margin-bottom: 15px;
        }

        .login-form .group .label,
        .login-form .group .input,
        .login-form .group .button {
            width: 100%;
            color: #fff;
            display: block;
        }

        .login-form .group .input,
        .login-form .group .button {
            border: none;
            padding: 15px 20px;
            border-radius: 25px;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group input[data-type="password"] {
            /*text-security: circle;*/
            -webkit-text-security: circle;
        }

        .login-form .group .label {
            color: #aaa;
            font-size: 12px;
        }

        .login-form .group .button {
            background: #1161ee;
        }

        .login-form .group label .icon {
            width: 15px;
            height: 15px;
            border-radius: 2px;
            position: relative;
            display: inline-block;
            background: rgba(255, 255, 255, .1);
        }

        .login-form .group label .icon:before,
        .login-form .group label .icon:after {
            content: '';
            width: 10px;
            height: 2px;
            background: #fff;
            position: absolute;
            transition: all .2s ease-in-out 0s;
        }

        .login-form .group label .icon:before {
            left: 3px;
            width: 5px;
            bottom: 6px;
            transform: scale(0) rotate(0);
        }

        .login-form .group label .icon:after {
            top: 6px;
            right: 0;
            transform: scale(0) rotate(0);
        }

        .login-form .group .check:checked+label {
            color: #fff;
        }

        .login-form .group .check:checked+label .icon {
            background: #1161ee;
        }

        .login-form .group .check:checked+label .icon:before {
            transform: scale(1) rotate(45deg);
        }

        .login-form .group .check:checked+label .icon:after {
            transform: scale(1) rotate(-45deg);
        }

        .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
            transform: rotate(0);
        }

        .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
            transform: rotate(0);
        }

        .hr {
            height: 2px;
            margin: 40px 0 50px 0;
            background: rgba(255, 255, 255, .2);
        }

        .foot-lnk {
            text-align: center;
        }

        input[type="submit"] {
            cursor: pointer;
        }

        i {
            position: absolute;
            min-width: 40px;
            margin-top: -28px;
            margin-left: 350px;
            cursor: pointer;
        }
        .logos img
        {
            width: 100%;
            height: 140px;
            margin-left: -15px;
        }
        img
        {
          border-radius: 20px;
        }
    </style>

</head>

<body>


    <div class="logos">
        <img src="../images/head.png" alt="">
    </div>

    <br><br>

    <?php
    if (isset($_GET['message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><center>';
        echo ($_GET["message"]);
        echo '</center><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    ?>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; STUDENT LOGIN &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
            <div class="login-form">
                <form id="form" onsubmit="myfunc(); return false;" action="student-login-confirm.php" method="post">
                    <div class="sign-up-htm">
                        <div class="group">
                            <br><label for="user" class="label">Email</label>
                            <input id="email" type="text" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input type="password" id="pw" class="input" name="pw" autocomplete="current-password">
                            <i class="far fa-eye" id="togglePassword" onclick="eye()"></i>
                            <span id="text2"></span>
                        </div>
                        <div class="group">
                            <input type="submit" name="submit" class="button" value="Sign In">
                        </div>
                        <div class="hr"></div>
                        <div class="foot-lnk">
                            <a href="forgotpassword.php">Forgot password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function eye() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#pw');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    }
    /* function myfunc()
     {
         var email=document.getElementById("email").value;
         var password=document.getElementById("pw").value;
         if(email=="" || password=="")
          {
             swal("INVALID DETAILS!", "...Please enter your username and password!");
          }
         else
          {
          var form=document.getElementById("form");
          form.onsubmit="return true";
          }
     }*/
</script>
</html>