<?php
$connection = mysqli_connect('localhost', 'root', '', 'exam_management');
if ($connection) {
    header("Content-Disposition: attachment; filename=result.xls");
    header("Content-Type: application/vnd.ms-excel");
    $count = 1;
    $dept = $_GET['dept'];
    $batch = $_GET['batch'];
    $year = $_GET['year'];
    $semester = $_GET['semester'];
    $subject = $_GET['sub'];
    $select = "SELECT student_name,roll_number,year,Batch,Semester,instructor_name,instructor_department,subject_code,exam_title,unique_exam_name,total_marks,secured_marks,entry_time,exit_time from result where student_department='$dept' and year='$year' and Batch='$batch' and Semester='$semester' and subject='$subject'";
    $result = mysqli_query($connection, $select);
    if(mysqli_num_rows($result)>0)
    {
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
} else {
    die('something went wrong with database' . mysqli_connect_error());
}
