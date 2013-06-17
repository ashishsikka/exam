<?php
  $p = pdf_new();
  pdf_open_file($p);
  pdf_set_info($p,"Creator","images.php");
  pdf_set_info($p,"Author","Rasmus Lerdorf");
  pdf_set_info($p,"Title","Images");
  pdf_begin_page($p,612,792);

  $im = pdf_open_jpeg($p, "php-big.jpg");
  pdf_place_image($p, $im, 200, 700, 1.0);
  pdf_place_image($p, $im, 200, 600, 0.75);
  pdf_place_image($p, $im, 200, 535, 0.50);
  pdf_place_image($p, $im, 200, 501, 0.25);
  pdf_place_image($p, $im, 200, 486, 0.10);
  $x = pdf_get_value($p, "imagewidth", $im);
  $y = pdf_get_value($p, "imageheight", $im);
  pdf_close_image ($p,$im);
  $font = pdf_findfont($p,'Helvetica-Bold','host',0);
  pdf_setfont($p,$font,38.0);
  pdf_show_xy($p,"$x by $y",425,750);

  pdf_end_page($p);
  pdf_close($p);
  $buf = pdf_get_buffer($p);
  $len = strlen($buf);
  Header("Content-type: application/pdf");
  Header("Content-Length: $len");
  Header("Content-Disposition: inline; filename=images.pdf");
  echo $buf;
  pdf_delete($p);
?>
