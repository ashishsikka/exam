<?php
  $p = pdf_new();
  pdf_open_file($p);

  pdf_begin_page($p,595,842);
  $top = pdf_add_bookmark($p, "Countries");
  $im = pdf_open_png($p, "fr-flag.png");
  pdf_add_thumbnail($p, $im);
  pdf_close_image($p,$im);
  $font = pdf_findfont($p,"Helvetica-Bold","host",0);
  pdf_setfont($p, $font, 20);
  pdf_add_bookmark($p, "France", $top);
  pdf_show_xy($p, "This is a page about France", 50, 800);
  pdf_end_page($p);

  pdf_begin_page($p,595,842);
  $im = pdf_open_png($p, "nz-flag.png");
  pdf_add_thumbnail($p, $im);
  pdf_close_image($p,$im);
  pdf_setfont($p, $font, 20);
  pdf_add_bookmark($p, "Denmark", $top);
  pdf_show_xy($p, "This is a page about New Zealand", 50, 800);
  pdf_end_page($p);

  pdf_close($p);
  $buf = pdf_get_buffer($p);
  $len = strlen($buf);
  header("Content-type:application/pdf");
  header("Content-Length:$len");
  header("Content-Disposition:inline; filename=bm.pdf");
  echo $buf;
  pdf_delete($p);
?>
