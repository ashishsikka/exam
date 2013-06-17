<?php
  // bring in redirected URL parameters,if any
  parse_str($_SERVER['REDIRECT_QUERY_STRING']);
  $button_dir = '/buttons/';
  $url = $_SERVER['REDIRECT_URL'];
  $root = $_SERVER['DOCUMENT_ROOT'];

  // pick out the extension
  $ext = substr($url, strrpos($url, '.'));

  // remove directory and extension from $url string
  $file = substr($url, strlen($button_dir), -strlen($ext));

  // security - don't allow '..'in filename
  $file = str_replace('..', '', $file);

  // text to display in button
  $text = urldecode($file);

  // build image
  if (!isset($font)) $font = 'times';
  if (!isset($size)) $size = 12;

  $im = ImageCreateFromPNG('button.png');
  $tsize = ImageTTFBBox($size, 0, $font, $text);
  $dx = abs($tsize[2] - $tsize[0]);
  $dy = abs($tsize[5] - $tsize[3]);
  $x = (ImageSx($im)-$dx)/2;
  $y = (ImageSy($im)-$dy)/2 + $dy;
  $black = ImageColorAllocate($im, 0, 0, 0);
  ImageTTFText($im, $size, 0, $x, $y, -$black, $font, $text);

  // send and save the image
  header('Content-Type: image/png');
  ImagePNG($im);
  ImagePNG($im, $root . $button_dir . "$file.png");
  ImageDestroy($im);
?>
