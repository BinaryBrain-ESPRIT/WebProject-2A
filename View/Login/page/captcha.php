<?php
session_start();
$_SESSION['captcha'] = mt_rand(1000, 9999);
$img = ImageCreate(65, 30);
$font = '../fonts/destroyed_license_plate_6903513/Destroyed_License_Plate.otf';
$bg = imagecolorallocate($img, 255, 255, 255);
$textcolor = imagecolorallocate($img, 0, 0, 0);
imagettftext($img, 23, 0, 3, 30, $textcolor, $font, $_SESSION['captcha']);
header('content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img);
