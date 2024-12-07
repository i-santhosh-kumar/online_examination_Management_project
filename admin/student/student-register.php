<?php
include('../../dbconfig.php');
if(!$connection)
{
    die('something went wrong with database'.mysqli_connect_error());
}
$sname=$_POST['sname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$rno=$_POST['rno'];
$shift=$_POST['shift'];
$file=$_FILES['file']['name'];
$dept=$_POST['dept'];
$batch=$_POST['batch'];
$year=$_POST['year'];
$semester=$_POST['semester'];
//$lang=$_POST['language'];
$batch=$_POST['batch'];
$sem=$_POST['semester'];
$uname=$_POST['uname'];
$your_email=$_POST['your_email'];
$confirm_psw=$_POST['confirm-psw'];
/*$v="INSERT INTO student(student_name,dob,phonenumber,favqus,gender,favplace,department,roll_number,years,favlanguage,Batch,semester,shift,upload,username,gmail,pass_word) 
VALUES('$sname','$dob','$phone','$favques','$gender','$place','$dept','$rno','$year','$lang','$batch','$sem','$shift','$file','$uname','$your_email','$confirm_psw')";*/
$v="INSERT INTO student(student_name,dob,phonenumber,gender,department,roll_number,years,Batch,semester,shift,upload,username,gmail,pass_word) 
VALUES('$sname','$dob','$phone','$gender','$dept','$rno','$year','$batch','$sem','$shift','$file','$uname','$your_email','$confirm_psw')";
if(mysqli_query($connection,$v))
{
   header("location:../student-management.php");
}
else
{
     echo "error".$v."sql error". mysqli_error($connection);
}
if(isset($_POST['submit']))
     {
        $allow=array("jpg"=>"image/jpeg","jpeg"=>"image/jpeg", "png"=>"image/png");
        $name=$_FILES["file"]["name"];
        $type=$_FILES["file"]["type"];
        $ext=pathinfo($name,PATHINFO_EXTENSION);
        if(!array_key_exists($ext,$allow)) die("please select valid file format");
        if(in_array($type,$allow))
        {
            if(file_exists("upload/".$_FILES["file"]["name"]))
            {
                echo "This file is already exists";
            }
            else
            {  
                $destination="files/".$_FILES["file"]["name"];
                move_uploaded_file($_FILES["file"]["tmp_name"],$destination);
                echo "uploaded successfully";
            }
        }
        else
        {
            echo "file not uploaded";
        }
    }
mysqli_close($connection);
?>