<?php 
include_once('../dbconfig.php');
session_start();
$email=$_SESSION['gmail'];
if($connection)
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $cpw=$_POST['cpw'];
        $device_query="UPDATE instructor SET passwords='$cpw' WHERE gmail='$email'";
        mysqli_query($connection,$device_query);
        mysqli_close($connection);
        header("location:instructor-login.php");
    }
}
mysqli_close($connection);
?>