<?php
include_once("../dbconfig.php");
session_start();
if($connection)
{
    $email=$_SESSION['admin_email'];
    $device_query="update admin set devices=0 where email='$email'";
    mysqli_query($connection,$device_query);
    mysqli_close($connection);
}
session_unset();
session_destroy();
header("location:../home.php");
?>