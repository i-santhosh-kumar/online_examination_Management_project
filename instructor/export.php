<?php
$connection = mysqli_connect('localhost', 'root', '', 'exam_management');
if ($connection) {
    session_start();
    header("Content-Disposition: attachment; filename=result.xls");
    header("Content-Type: application/vnd.ms-excel");
    $student_department = $_GET['department'];
    $student_year = $_GET['year'];
    $batch = $_GET['batch'];
    $sem = $_GET['sem'];
    $exam_table = $_GET['examtable'];
    $instructor_id = $_SESSION['instructor_id'];
    $instructor_name = $_SESSION['instructor_name'];
    $instructor_gmail=$_SESSION['instructor_gmail'];
    $select = "SELECT student_name,roll_number,student_department,year,Batch,Semester,subject, subject_code,exam_title,total_marks,secured_marks,entry_time,exit_time from result where instructor_id='$instructor_id' and instructor_name='$instructor_name' and instructor_gmail='$instructor_gmail' and unique_exam_name='$exam_table' and year='$student_year' and student_department='$student_department' and Batch='$batch' and Semester='$sem'";
    $result = mysqli_query($connection, $select);
    if (mysqli_num_rows($result) > 0) {
        $heading=false;
        while($row=mysqli_fetch_assoc($result))
        {
            if(!$heading)
            {
                echo implode("\t",array_keys($row))."\r\n";
                $heading=true;
            }
            echo implode("\t",array_values($row))."\r\n";
        }
    }

} 
else {
    die('something went wrong with database' . mysqli_connect_error());
}
