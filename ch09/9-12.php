<?php
  $im = ImageCreateTrueColor(150, 150);
  $white = ImageColorAllocate($im, 255, 255, 255);
  ImageAlphaBlending($im, false);
  ImageFilledRectangle($im, 0, 0, 150, 150, $white);
  $red = ImageColorResolveAlpha($im, 255, 50, 0, 63);
  ImageFilledEllipse($im, 75, 75, 80, 50, $red);
  $gray = ImageColorResolveAlpha($im, 70, 70, 70, 63);
  ImageAlphaBlending($im, false);
  ImageFilledRectangle($im, 60, 60, 120, 120, $gray);
  header('Content-Type: image/png');
  ImagePNG($im);
?>
