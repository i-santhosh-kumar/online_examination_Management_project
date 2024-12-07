<?php
include_once('../dbconfig.php');
if(!$connection)
{
    die('could not connect:'.mysqli_connect_error());
} 
$iid=$_POST['iid'];
$s1="INSERT INTO departments(department_names) VALUES ('$iid')";
$s2=mysqli_query($connection,$s1);
if($s2)
{
     header("location:department-show.php");
}
else
{
     echo "error".$s1."sql error". mysqli_connect_error($conn);
}
?>