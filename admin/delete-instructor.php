<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $instructor_id = $_GET['instructor_id'];
        $instructor_name = $_GET['instructor_name'];
        $instructor_gmail=$_GET['gmail'];
        $department = $_GET['department'];
        $post = $_GET['post'];
        $sa = $_GET['sa'];
        $username = $_GET['username'];
        $instructor_gmail= $_GET['gmail'];
        
        $connection=mysqli_connect('localhost','root','','online_examination_with_security');
        if ($connection) {
            $q = "delete from instructor where instructor_id='$instructor_id' and instructor_name='$instructor_name'  and department='$department' and
            post='$post' and batch='$sa' and username='$username' and gmail='$instructor_gmail' ";
            mysqli_query($connection,$q);
            mysqli_close($connection);
            header('location:instructor-management.php');
        } else {
            die('something went wrong with database' . mysqli_connect_error());
        }
    }
?>