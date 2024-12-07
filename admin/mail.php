<?php
$to_email = "hepsya@students.tcarts.in, joannah1310@gmail.com";
$subject = "OTP verification";
$body = rand(1000,10000);
$_SESSION['otp']=$body;
$headers = "From: hepsya@students.tcarts.in";
$mail=mail($to_email, $subject, $body, $headers);
if($mail)
{
    echo("succesfully sent");
}
else
{
    echo("not successfull");
}
?>