<?php
include_once('../dbconfig.php');
session_start();
if($connection)
{
    $gmail=$_SESSION['student_gmail'];
    $device_query="UPDATE student SET devices=0 WHERE gmail='$gmail'";
    mysqli_query($connection,$device_query);
    mysqli_close($connection);
}
session_unset();
session_destroy();
header("location:student-login.php");
?>
