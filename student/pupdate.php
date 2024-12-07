<?php 
include_once('../dbconfig.php');
session_start();
$email=$_SESSION['gmail'];
if($connection)
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cpw=$_POST['cpw'];
        $device_query="UPDATE student SET pass_word='$cpw' WHERE gmail='$email'";
        mysqli_query($connection,$device_query);
        mysqli_close($connection);
        header("location:student-login.php");
    }
}
?>