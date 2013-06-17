<?php
  $src = ImageCreateFromJPEG('php.jpg');
  $width = ImageSx($src);
  $height = ImageSy($src);
  $x = $width/2; $y = $height/2;
  $dst = ImageCreateTrueColor($x, $y);
  ImageCopyResampled($dst, $src, 0, 0, 0, 0, $x, $y, $width, $height);
  header('Content-Type: image/png');
  ImagePNG($dst);
?>
