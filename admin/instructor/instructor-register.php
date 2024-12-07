<?php
include_once('../../dbconfig.php');
if(!$connection)
{
    die('could not connect:'.mysqli_connect_error());
} 
$instid=$_POST['instid'];
$instname=$_POST['instname'];
$dob=$_POST['dob'];
$phone=$_POST['phone'];
$file=$_FILES['file']['name'];
$dept=$_POST['dept'];
$postdes=$_POST['postdes'];
$batch=$_POST['batch'];
$gend=$_POST['gend'];
$un=$_POST['un'];
$youremail=$_POST['your_email'];
$confirm_psw=$_POST['confirm-psw'];
$v1="INSERT INTO instructor(instructor_id,instructor_name,dob,phone_number,files,department,post,batch,gender,username,gmail,passwords)
 VALUES ('$instid','$instname','$dob','$phone','$file','$dept','$postdes','$batch','$gend','$un','$youremail','$confirm_psw')";
$v2=mysqli_query($connection,$v1);
if($v2)
{
    //header("location:../instructor-management.php");
}
else
{
     echo "error".$v1."sql error". mysqli_error($conn);
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
            if(file_exists("files/".$_FILES["file"]["name"]))
            {
                echo "This file is already exists";
            }
            else
            {  
                $destination="upload/".$_FILES["file"]["name"];
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
<<<<<<< Updated upstream
?>
=======
?>
>>>>>>> Stashed changes
