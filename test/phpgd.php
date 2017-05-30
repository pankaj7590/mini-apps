<?php

$x = 600;
$y = 600;

$gd = imagecreatetruecolor($x, $y);
 
$corners[0] = array('x' => 300, 'y' =>  10);
$corners[1] = array('x' =>   0, 'y' => 590);
$corners[2] = array('x' => 600, 'y' => 590);

$red = imagecolorallocate($gd, 255, 0, 0); 

for ($i = 0; $i < 100000; $i++) {
  imagesetpixel($gd, round($x),round($y), $red);
  $a = rand(0, 2);
  $x = ($x + $corners[$a]['x']) / 2;
  $y = ($y + $corners[$a]['y']) / 2;
}
 
header('Content-Type: image/png');
imagepng($gd);

?>