<html><body bgcolor=#000000><tt>
<?php
  $im = ImageCreateFromJPEG('php-tiny.jpg');
  $dx = ImageSX($im);
  $dy = ImageSY($im);
  for($y=0; $y < $dy; $y++){
    for($x=0; $x < $dx; $x++){
      $col = ImageColorAt($im, $x, $y);
      $rgb = ImageColorsForIndex($im, $col);
      printf('<font color=#%02x%02x%02x>#</font>',
              $rgb['red'], $rgb['green'], $rgb['blue']);
    }
    echo "<br>\n";
  }
  ImageDestroy($im);
?>
</tt></body></html>
