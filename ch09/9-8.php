<?php
  header('Content-Type: image/png');
  $path = "/tmp/buttons";                         // button cache directory
  $text = $_GET['text'];

  if ($bytes = @filesize("$path/$text.png")) {     // send cached version
    header("Content-Length: $bytes");
    readfile("$path/$text.png");
  } else {                                         // build,send,and cache
    $font = 'times';
    if (!$_GET['size']) $_GET['size'] = 12;
    $im = ImageCreateFromPNG('button.png');
    $tsize = ImageTTFBBox($size, 0, $font, $text);
    $dx = abs($tsize[2]-$tsize[0]);               // center text
    $dy = abs($tsize[5]-$tsize[3]);
    $x = (imagesx($im)-$dx)/2;
    $y = (imagesy($im)-$dy)/2 + $dy;
    $black = ImageColorAllocate($im, 0, 0, 0);
    ImageTTFText($im, $_GET['size'], 0, $x, $y, -$black, $font, $text);
    ImagePNG($im);                                // send image to browser
    ImagePNG($im, "$path/$text.png");             // save image to file
  }
?>
