<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $instructor_id = $_SESSION['instructor_id'];
        $instructor_name = $_SESSION['instructor_name'];
        $instructor_gmail=$_SESSION['instructor_gmail'];
        $department = $_GET['department'];
        $subjectcode = $_GET['subjectcode'];
        include_once('../dbconfig.php');
        if ($connection) {
            $query = "delete from instructorsubject where instructor_id='$instructor_id' and instructor_name='$instructor_name' and instructor_gmail='$instructor_gmail' and department='$department' and subjectcode='$subjectcode'";
            mysqli_query($connection, $query);
            mysqli_close($connection);
            header('location:subject.php');
        } else {
            die('something went wrong with database' . mysqli_connect_error());
        }
    }
?>