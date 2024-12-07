<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Instructor Login form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--cdn link for no copy paste for the website-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../no-tab-no-cp.js"></script>

    <style>
        body {
            margin: 0;
            color: #888dad;
            background: #c8c8c8;
            font: 600 16px/18px 'Open Sans', sans-serif;
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
            margin: auto;
            max-width: 600px;
            min-height: 560px;
            position: relative;
            /*background:url(https://raw.githubusercontent.com/khadkamhn/day-01-login-form/master/img/bg.jpg) no-repeat center;*/
            box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
            margin-top: 30px;
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
            margin-left: 415px;
            cursor: pointer;
        }

        .logo img {
            width: 100%;
            height: 140px;
        }

        img {
            border-radius: 20px;
        }
    </style>

</head>


<body>

    <div class="logo">
        <img src="../images/head.png" alt="">
    </div>

    <?php
    if (isset($_GET['message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><center>';
        echo ($_GET["message"]);
        echo '</center><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
    ?>
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; INSTRUCTOR LOGIN &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
            <div class="login-form">
                <form id="form" onsubmit="myfunc(); return false;" action="instructor-login-confirm.php" method="post">
                    <div class="sign-up-htm">
                        <div class="group">
                            <br><label for="user" class="label">Email</label>
                            <input id="user" type="text" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input type="password" id="pass" class="input" name="pwd" autocomplete="current-password">
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
    <script>
        function eye() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#pass');
            togglePassword.addEventListener('click', function(e) {
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