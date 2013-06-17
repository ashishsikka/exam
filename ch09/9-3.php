<?php
  $im = ImageCreate(200, 200);
  $white = ImageColorAllocate($im, 0xFF, 0xFF, 0xFF);
  $black = ImageColorAllocate($im, 0x00, 0x00, 0x00);
  ImageFilledRectangle($im, 50, 50, 150, 150, $black);
  if (ImageTypes() & IMG_PNG) {
    header("Content-Type: image/png");
    ImagePNG($im);
  } elseif (ImageTypes() & IMG_JPG) {
    header("Content-Type: image/jpeg");
    ImageJPEG($im);
  } elseif (ImageTypes() & IMG_GIF){
    header("Content-Type: image/gif");
    ImageGIF($im);
  }
?>
