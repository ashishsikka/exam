<?php
  $p = pdf_new();
  pdf_open_file($p);
  pdf_begin_page($p,612,792);

  $im = pdf_open_jpeg($p, "php-big.jpg");
  pdf_place_image($p, $im, 200, 700, 1.0);
  pdf_save($p);  // Save current coordinate system settings
  $nx = 50/pdf_get_value($p,"imagewidth",$im);
  $ny = 100/pdf_get_value($p,"imageheight",$im);
  pdf_scale($p, $nx, $ny);
  pdf_place_image($p, $im, 200/$nx, 600/$ny, 1.0);
  pdf_restore($p);  // Restore previous
  pdf_close_image ($p,$im);

  pdf_end_page($p);
  pdf_close($p);
  $buf = pdf_get_buffer($p);
  $len = strlen($buf);
  header("Content-type: application/pdf");
  header("Content-Length: $len");
  header("Content-Disposition: inline; filename=scaling.pdf");
  echo $buf;
  pdf_delete($p);
?>
