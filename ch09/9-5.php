<?php
  $im = ImageCreate(350, 70);
  $white = ImageColorAllocate($im, 0xFF, 0xFF, 0xFF);
  $black = ImageColorAllocate($im, 0x00, 0x00, 0x00);
  ImageTTFText($im, 20, 0, 10, 40, $black, 'courbi', 'The Courier TTF font');
  header('Content-Type: image/png');
  ImagePNG($im);
?>
