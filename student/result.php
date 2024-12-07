<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
$connection=mysqli_connect('localhost','root','','exam_management');
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if($connection)
    {
        $instructor_id=$_GET['insid'];
        $instructor_name=$_GET['insnm'];
        $instructor_gmail=$_GET['insgmail'];
        $instructor_department=$_GET['insdept'];
        $subject=$_GET['subject'];
        $subjectcode=$_GET['subjectcode'];
        $title=$_GET['title'];
        $examtable=$_GET['examtable'];  
        $entry_time=$_GET['entrytime'];
        $exit_time=date("Y-m-d")." ".date("H-i-s");

        $student_name=$_SESSION['student_name'];
        $roll_number=$_SESSION['roll_number'];
        $department=$_SESSION['student_department'];
        $gmail=$_SESSION['student_gmail'];
        $year=$_SESSION['years'];
        $batch=$_SESSION['batch'];
        $semester=$_SESSION['semester'];

        $securedmarks=0;
        $query="select question_number, answer from ".$examtable;
        $result=mysqli_query($connection,$query);
        $number=mysqli_num_rows($result);
        $totalmarks=mysqli_num_rows($result);
        while($number!=0 && $row=mysqli_fetch_array($result))
        {
            if(strcmp($_POST[$row[0]],$row[1])==0)
            {
                $securedmarks=$securedmarks+1;
            }
            $number=$number-1;
        }
       
        $query1="INSERT INTO result(student_name,roll_number,student_department,student_gmail,year,Batch,Semester,instructor_id,instructor_name,instructor_department,instructor_gmail,subject,subject_code,exam_title,unique_exam_name,total_marks,secured_marks,entry_time,exit_time,devices) VALUES('$student_name','$roll_number','$department','$gmail','$year','$batch','$semester','$instructor_id','$instructor_name','$instructor_department','$instructor_gmail','$subject','$subjectcode','$title','$examtable','$totalmarks','$securedmarks','$entry_time','$exit_time','1')";
         $check=mysqli_query($connection,$query1);

         if($check)
         {
            echo '
            <script type="text/javascript">
                let new_window =open(location, "_self");
                new_window.close();
            </script>
            ';
         }  
    }
    else
    {
        die('something went wrong with the database');
    }
}
?>