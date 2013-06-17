<?php
  $im = ImageCreateTrueColor(150, 150);
  $white = ImageColorAllocate($im, 255, 255, 255);
  ImageAlphaBlending($im, false);
  ImageFilledRectangle($im, 0, 0, 150, 150, $white);
  $red = ImageColorResolveAlpha($im, 255, 50, 0, 50);
  ImageFilledEllipse($im, 75, 75, 80, 63, $red);
  header('Content-Type: image/png');
  ImagePNG($im);
?>
