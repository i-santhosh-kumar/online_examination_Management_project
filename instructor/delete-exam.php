<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $instructor_id = $_SESSION['instructor_id'];
        $instructor_name = $_SESSION['instructor_name'];
        $instructor_gmail=$_SESSION['instructor_gmail'];
        $department = $_GET['department'];
        $subject = $_GET['subject'];
        $subjectcode = $_GET['subjectcode'];
        $year=$_GET['year'];
        $batch=$_GET['batch'];
        $sem=$_GET['sem'];
        $examtitle=$_GET['examtitle'];
        $uniqueexamname=$_GET['uniqueexamname'];
        $connection=mysqli_connect('localhost','root','','exam_management');
        if ($connection) {
            $query = "delete from exams where instructor_id='$instructor_id' and instructor_name='$instructor_name' and gmail='$instructor_gmail' and department='$department' and subjects='$subject' and subject_code='$subjectcode' and years='$year' and Batch='$batch' and Semester='$sem' and exam_title='$examtitle' and unique_exam_name='$uniqueexamname'";
            $query2='drop table '.$uniqueexamname;
            mysqli_query($connection,$query2);
            mysqli_query($connection, $query);
            mysqli_close($connection);
            header('location:view-exam.php');
        } else {
            die('something went wrong with database' . mysqli_connect_error());
        }
    }
?>