<?php
session_start();
header("Content-type:text/html;charset=utf-8");
header('content-type:image/png');
$im=imagecreate(65,25);
imagefill($im,0,0,imagecolorallocate($im,200,200,200));
mt_srand(mktime());
$validatorCode=rand(1000,9999);
$_SESSION['code'] = $validatorCode;
imagestring($im,rand(3,5),10,3,substr($validatorCode,0,1),imagecolorallocate($im,0,rand(0,255),rand(0,255)));
imagestring($im,rand(3,5),25,6,substr($validatorCode,1,1),imagecolorallocate($im,0,rand(0,255),rand(0,255)));
imagestring($im,rand(3,5),36,9,substr($validatorCode,2,1),imagecolorallocate($im,0,rand(0,255),rand(0,255)));
imagestring($im,rand(3,5),48,7,substr($validatorCode,3,1),imagecolorallocate($im,0,rand(0,255),rand(0,255)));
imagepng($im);
imagedestroy();
?>
