<?php
if (isset($_GET['message'])) {
  // load font and image,calculate width of text
  $font = 'times';
  $size = 12;
  $im = ImageCreateFromPNG('button.png');
  $tsize = imagettfbbox($size, 0, $font, $_GET['message']);
  // center
  $dx = abs($tsize[2]-$tsize[0]);
  $dy = abs($tsize[5]-$tsize[3]);
  $x = (imagesx($im)-$dx)/2;
  $y = (imagesy($im)-$dy)/2 + $dy;
  // draw text
  $black = ImageColorAllocate($im, 0, 0, 0);
  ImageTTFText($im, $size, 0, $x, $y, $black, $font, $_GET['message']);
  // return image
  header('Content-type: image/png');
  ImagePNG($im);
  exit;
}
?>
<html>
<head><title>Button Form</title></head>
<body>
<form action="<?= $PHP_SELF ?>" method="GET">
Enter message to appear on button:
<input type="text" name="message" /><br />
<input type="submit" value="Create Button" /></form>
</body>
</html>
