<?php
session_start();
include_once('../dbconfig.php');
if(!$connection)
{
    die('could not connect:'.mysqli_connect_error());
} 
$iid=$_SESSION['instructor_id'];
$iname=$_SESSION['instructor_name'];
$igmail=$_SESSION['instructor_gmail'];
$idept=$_SESSION['instructor_department'];
$idep=$_POST['idep'];
$sub=$_POST['sub'];
$scode=$_POST['scode'];
$year=$_POST['year'];
$ibatch=$_POST['ibatch'];
$isem=$_POST['isem'];
$s1="INSERT INTO instructorsubject(instructor_id,instructor_name,instructor_gmail,instructor_department,department,subject,subjectcode,Year,Batch,Semester) VALUES ('$iid','$iname','$igmail','$idept','$idep','$sub','$scode','$year','$ibatch','$isem')";
$s2=mysqli_query($connection,$s1);
if($s2)
{
     header("location:subject.php");
}
else
{
     echo "error".$s1."sql error". mysqli_error($conn);
}
?>