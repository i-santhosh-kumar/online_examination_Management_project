<?php
session_start();
if(!($_SESSION['instructor_gmail'] && $_SESSION['instructor_name']))
{
    header('location:instructor-login.php');
}
$name = $_SESSION['instructor_name'];
$maill = $_SESSION['instructor_gmail'];
$instd = $_SESSION['instructor_id'];
$dept=$_SESSION['instructor_department'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Instructor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="instructor_sidebar/css/style.css">
    <style>
        nav {
            height: 657px;
        }

        iframe {
            position: absolute;
            margin-top: -650px;
            margin-left: 300px;
        }

        .frame1 {
            margin-left: 40px;
            width: 1300px;
        }

        .logout {
            cursor: pointer;
            position: absolute;
            margin-left: 60px;
        }

       /* .update
        {
            cursor: pointer;
            margin-left: 30px;
            margin-top: -30px;
        }*/
        .logo img
           {
            width: 100%;
            height: 100%;
            border-radius: 20px;
          }
    </style>
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" onclick="show()" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>

            <div class="p-4">
                <h1><a href="index.php" class="logo"><img src="../images/logo.png" alt=""><?php echo $name ?><span><?php echo $maill ?></span><span><?php echo $dept ?></span></a></h1>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="subject.php" target="frame"><span class="fa fa-book mr-3"></span> Subjects</a>
                    </li>

                    <li>
                        <a href="department-show.php" target="frame"><span class="fa fa-sitemap mr-3"></span>Departments</a>
                    </li>

                    <li>
                        <a href="subjectshowup.php" target="frame"><span class="fa fa-pencil mr-3"></span> Exam Management</a>
                    </li>

                    <li>
                        <a href="view-exam.php" target="frame"><span class="fa fa-table mr-3"></span> View Exam</a>
                    </li>

                    <li>
                        <a href="fst-year.php?year=I" target="frame"><span class="fa fa-graduation-cap mr-3"></span> First years</a>
                    </li>

                    <li>
                        <a href="fst-year.php?year=II" target="frame"><span class="fa fa-graduation-cap mr-3"></span> Second years</a>
                    </li>

                    <li>
                        <a href="fst-year.php?year=III" target="frame"><span class="fa fa-graduation-cap mr-3"></span> Third years</a>
                    </li>
                </ul>

               <!-- <div class="update">
                    <form action="update-profile-html.php" method="POST">
                        <button class="btn btn-dark btn-sm"><i class="fa fa-pencil-square-o"></i>Update Personal Info</button>
                    </form>
                </div>-->

                <div class="mb-5">
                    <div class="form-group d-flex">
                        <div class="logout">
                            <form action="logout.php" method="post">
                                <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-log-out"></span><i class="fa fa-sign-out"></i> Log out</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </div>

    <iframe src="subject.php" id="frame" name="frame" frameborder="0" width="1040" height="630">
    </iframe>

    <script>
        var side = document.getElementById('sidebar');
        var frm = document.getElementById('frame');

        function show() {
            if (side.className == "") {
                frm.classList.add('frame1');
            } else {
                frm.classList.remove('frame1');
            }
        }
    </script>

    <script src="instructor_sidebar/js/jquery.min.js"></script>
    <script src="instructor_sidebar/js/popper.js"></script>
    <script src="instructor_sidebar/js/bootstrap.min.js"></script>
    <script src="instructor_sidebar/js/main.js"></script>
</body>
</html>