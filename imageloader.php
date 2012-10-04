<?php
$passper=35;
$num=$_GET['num'];
$den=$_GET['den'];
$per=($num/$den)*100;
// Create a blank image.
$image = imagecreatetruecolor(75, 120);

// Select the background color.
$bg = imagecolorallocate($image, 255, 255, 255);

// Fill the background with the color selected above.
imagefill($image, 0, 0, $bg);

// Choose a color for the ellipse.
$col_ellipse = imagecolorallocate($image, 0, 0, 0);
$red = imagecolorallocate($image, 205, 16, 41);
$black = imagecolorallocate($image, 13, 9, 142);
if($per>$passper)
$numcolor=$black;
else
$numcolor=$red;
// Draw the ellipse.
imageellipse($image, 32, 60, 60, 90, $col_ellipse);
imagefttext($image, 50, 0, 25, 55,$numcolor , 'fonts/fontf.ttf', $num);
imagefttext($image, 50, 0, 23, 90, $black, 'fonts/fontf.ttf', $den);
imageline($image, 20, 55, 50, 54, $black);

// Output the image.
header("Content-type: image/png");
imagepng($image);

?>