<?php
  $im = ImageCreate(70, 350);
  $white = ImageColorAllocate($im, 255, 255, 255);
  $black = ImageColorAllocate($im, 0, 0, 0);
  ImageTTFText($im, 20, 270, 28, 10, $black, 'courbi', 'The Courier TTF font');
  header('Content-Type: image/png');
  ImagePNG($im);
?>
