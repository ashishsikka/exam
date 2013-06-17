#!/usr/local/bin/php -q
<?php

if ($argc != 3) {
  die("usage:button-cli filename message\n");
}
list(,$filename,$message)=$argv;

//load font and image,calculate width of text
$font ='Arial.ttf';
$size =12;
$im =ImageCreateFromPNG('button.png');
$tsize =imagettfbbox($size,0,$font,$message);

//center
$dx = abs($tsize[2]-$tsize[0]);
$dy = abs($tsize[5]-$tsize[3]);
$x = (imagesx($im)-$dx)/2;
$y = (imagesy($im)-$dy)/2 +$dy;

//draw text
$black =ImageColorAllocate($im,0,0,0);
ImageTTFText($im,$size,0,$x,$y,$black,$font,$message);

//return image
ImagePNG($im,$filename);

?>