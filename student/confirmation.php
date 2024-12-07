<?php 
include_once('../dbconfig.php');
session_start();
if($connection)
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $email=$_POST['email'];
        $favques=$_POST['favques'];
        $place=$_POST['place'];
        $language=$_POST['language'];
        $query='SELECT gmail, favqus, favplace, favlanguage from student WHERE gmail='.'"'.$email.'"';
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0)
        {
            $row=mysqli_fetch_row($result);
            if(strcmp($email,$row[0])==0)
            {
                if((strcmp($favques,$row[1])==0) and (strcmp($place,$row[2])==0) and (strcmp($language,$row[3])==0) )
                {
                    $_SESSION['gmail']=$email;
                    header("location:passwordupdate.php");
                }
                else{
                        header("location:forgotpassword.php?message=Check your answers!!!");
                }
            }
            else{
                header("location:forgotpassword.php?message=Check your email id");
            }
        }
        else{
            header("location:forgotpassword.php?message=Check your email id");
        }
    }
}

?>