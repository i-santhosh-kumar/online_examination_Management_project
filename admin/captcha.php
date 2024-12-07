<?php
    session_start();
    $letter="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789!@$%&()?";
    $captcha=substr(str_shuffle($letter),0,6);
    $_SESSION['captcha']=$captcha;
    header ('Content-Type: image/png');
    $im = @imagecreatetruecolor(200,50);
    $text_color = imagecolorallocate($im, 247, 174, 71);
    $line_color=imagecolorallocate($im,64,64,64);
    for($i=1;$i<20;$i++)
    {
        imageline($im,0,rand()%100,200,rand()%100,$line_color);
    }
    $pixel_color=imagecolorallocate($im,0,0,255);
    for($i=1;$i<=2000;$i++)
    {
        imagesetpixel($im,rand()%200,rand()%100,$pixel_color);
    }
    imagestring($im,200,70,15,$captcha,$text_color);
    imagepng($im);
?>