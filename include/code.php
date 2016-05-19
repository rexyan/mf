<?php
define('REXYAN',true); 
header('content-type:image/png');
session_start();
$png=imagecreatetruecolor(90,32);
$color1=imagecolorallocate($png,240,240,240);
$color2=imagecolorallocate($png,rand($i*6,$i*8),rand($i*8,$i*10),rand($i*20,$i*30));
$color4=imagecolorallocate($png,rand(200,255),rand(200,255),rand(100,255));
imagefill($png,0,0,$color1);
for ($i=0; $i <50 ; $i++) { 
   imagestring($png,rand(1,3),rand(0,90),rand(0,32),'*',$color4);
}
for ($i=0; $i <4 ; $i++) { 
 imageline($png,rand(0,92),rand(0,32), rand(0,92), rand(0,32), $color2);
}
for ($i=0; $i <strlen($_SESSION["code"]) ; $i++) { 
  imagestring($png,rand(4,5),$i*90/8+mt_rand(10,13),mt_rand(5,30/2), $_SESSION["code"][$i],(imagecolorallocate($png,rand($i*20,$i*22),rand($i*10,$i*48),rand($i*12,$i*39))));
}
require ('code.inc.php');
imagepng($png);
imagedestroy($png);
?>