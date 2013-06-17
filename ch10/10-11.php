<?php
  $p = pdf_new();
  pdf_open_file($p);

  // define template
  $im = pdf_open_jpeg($p, "php-big.jpg");
  $template = pdf_begin_template($p,612,792);
  pdf_save($p);
  pdf_place_image($p, $im, 14, 758, 0.25);
  pdf_place_image($p, $im, 562, 758, 0.25);
  pdf_moveto($p,0,750);
  pdf_lineto($p,612,750);
  pdf_stroke($p);
  $font = pdf_findfont($p,"Times-Bold","host",0);
  pdf_setfont($p,$font,38.0);
  pdf_show_xy($p,"pdf Template Example",120,757);
  pdf_restore($p);
  pdf_end_template($p);
  pdf_close_image ($p,$im);

  // build pages
  pdf_begin_page($p,612,792);
  pdf_place_image($p, $template, 0, 0, 1.0);
  pdf_end_page($p);
  pdf_begin_page($p,612,792);
  pdf_place_image($p, $template, 0, 0, 1.0);
  pdf_end_page($p);
  pdf_close($p);

  $buf = pdf_get_buffer($p);
  $len = strlen($buf);
  header("Content-type: application/pdf");
  header("Content-Length: $len");
  header("Content-Disposition: inline; filename=templ.pdf");
  echo $buf;
  pdf_delete($p);
?>
