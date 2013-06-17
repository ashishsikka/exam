<?php
  $font = 'times';
  if (!$size) $size =12;
  $im = ImageCreateFromPNG('button.png');

  // calculate position of text
  $tsize = ImageTTFBBox($size, 0, $font, $text);
  $dx = abs($tsize[2]-$tsize[0]);
  $dy = abs($tsize[5]-$tsize[3]);
  $x = (ImageSx($im)-$dx)/2;
  $y = (ImageSy($im)-$dy)/2 + $dy;

  // draw text
  $black =ImageColorAllocate($im, 0, 0, 0);
  ImageTTFText($im, $size, 0, $x, $y, $black, $font, $text);

  header('Content-Type:image/png');
  ImagePNG($im);
?>