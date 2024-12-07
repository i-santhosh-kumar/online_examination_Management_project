<?php
include_once("../dbconfig.php");
session_start();
if($connection)
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email=$_POST['email'];
        $password=$_POST['pwd'];          
        $query='SELECT instructor_id, instructor_name, passwords, devices,department from instructor where gmail='.'"'.$email.'"';
        $result=mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0)
            {
                $row=mysqli_fetch_row($result);
                if(strcmp($password,$row[2])==0)
                {
                    if($row[3]==0)
                    {   
                        $_SESSION['instructor_name']=$row[1];
                        $_SESSION['instructor_gmail']=$email;
                        $_SESSION['instructor_id']=$row[0];
                        $_SESSION['instructor_department']=$row[4];
                        $device_query="update instructor set devices='1' where gmail='$email'";
                        mysqli_query($connection,$device_query);
                        mysqli_close($connection);
                        header('location:index.php');
                    }
                    else
                    {
                        header("location:instructor-login.php?message=you cannot login into multiple devices at a time!!!");
                    }
                }
                else
                {
                    header("location:instructor-login.php?message=please check your email id or password");
                }
            }
            else
            {
                header("location:instructor-login.php?message=please check your email id or password");
            }  
    }   
}
else
{
    die("could not connect to database".mysqli_connect_error());
}
mysqli_close($connection);
?>