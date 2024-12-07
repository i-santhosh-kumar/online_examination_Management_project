<?php 
session_start();
if($_SESSION['admin_name'] && $_SESSION['admin_email'])
{
    $username=$_SESSION['admin_name'];
    $email=$_SESSION['admin_email'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!--cdn link for no copy paste for the website-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../no-tab-no-cp.js"></script>

    <style>
        nav
        {
            height: 657px;
        }
        iframe
        {
            position: absolute;
            margin-top: -655px;
            margin-left: 300px;
        }
        .frame1
        {
            margin-left: 40px;
            width: 1300px;
        }
        .logout
        {
            cursor: pointer;
            position: absolute;
            margin-left: 60px;
        }
        .logo img
        {
            width: 100%;
            height: 100%;
            border-radius: 20px;
        }
    </style>
    
</head>
<body>
    <nav id="sidebar">

        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" onclick="show()" class="btn btn-primary">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <div class="p-4">
            <h1><a class="logo"><img src="../images/logo.png" alt=""><br><?php echo $username; ?> <span><?php echo $email ?></span></a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="department-show.php" target="frame"><span class="fa fa-sitemap mr-3"></span> Departments</a>
                </li>
                <li> 
                    <a href="instructor-management.php" target="frame"><span class="fa fa-user mr-3"></span>Staff Management</a>
                </li>
                <li>
                    <a href="student-management.php" target="frame"><span class="fa fa-mortar-board mr-3"></span>Student Management</a>
                </li>
                <li>
                    <a href="exam-manage.php" target="frame"><span class="fa fa-pencil-square-o mr-3"></span>Exam Management</a>
                </li>
                <li>
                    <a href="result-management.php" target="frame"><span class="fa fa-pie-chart mr-3"></span>Result Management</a>
                </li>
                <br><br>
                <li>
                    <div class="logout">
                        <form action="logout.php" method="post">
                            <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-log-out"></span><i class="fa fa-sign-out"></i> Log out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <iframe src="department-show.php" id="frame" name="frame" frameborder="0" width="1045" height="650">
    </iframe>

    <script>
        var side=document.getElementById('sidebar');
        var frm=document.getElementById('frame');
        function show()
        {
            if(side.className=="")
            {
                frm.classList.add('frame1');
            }
            else
            {
                frm.classList.remove('frame1');
            }
        }
     </script>
</body>
</html>
<?php 
}
else
{
    header("location:admin-login.php");
}
?>