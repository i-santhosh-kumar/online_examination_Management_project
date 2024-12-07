<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $roll_no = $_GET['roll_no'];
        $student_name = $_GET['student_name'];
        $department = $_GET['department'];
        $batch = $_GET['batch'];
        $year = $_GET['year'];
        $sem = $_GET['sem'];
        $stugmail=$_GET['gmail'];
        $sa = $_GET['sa'];
        $username = $_GET['username'];
        $connection=mysqli_connect('localhost','root','','online_examination_with_security');
        if ($connection) {
            $q = "delete from student where roll_number='$roll_no' and student_name='$student_name'  and department='$department' and
            batch='$batch' and shift='$sa' and years='$year' and semester='$sem' and username='$username' and gmail='$stugmail' ";
            mysqli_query($connection,$q);
            mysqli_close($connection);
            header('location:student-management.php');
        } else {
            die('something went wrong with database' . mysqli_connect_error());
        }
    }
?>