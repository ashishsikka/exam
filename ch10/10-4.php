<?php
  $pdf = pdf_new();
  pdf_open_file($pdf);
  pdf_begin_page($pdf,612,792);

  $font = pdf_findfont($pdf,"Helvetica-Bold","host",0);
  pdf_setfont($pdf,$font,38);
  $text = <<<FOO
This is a lot of text inside a text box in a small pdf file.
FOO;

  pdf_show_boxed($pdf, $text, 50, 590, 300, 180, "left");
  pdf_rect($pdf,50,590,300,180); pdf_stroke($pdf);
  pdf_show_boxed($pdf, $text, 50, 400, 300, 180, "right");
  pdf_rect($pdf,50,400,300,180); pdf_stroke($pdf);
  pdf_show_boxed($pdf, $text, 50, 210, 300, 180, "justify");
  pdf_rect($pdf,50,210,300,180);
  pdf_stroke($pdf);
  pdf_show_boxed($pdf, $text, 50, 20, 300, 180, "fulljustify");
  pdf_rect($pdf,50,20,300,180);
  pdf_stroke($pdf);
  pdf_show_boxed($pdf, $text, 375, 235, 200, 300, "center");
  pdf_rect($pdf,375,250,200,300);
  pdf_stroke($pdf);

  pdf_end_page($pdf);
  pdf_set_parameter($pdf, "openaction", "fitpage");
  pdf_close($pdf);

  $buf = pdf_get_buffer($pdf);
  $len = strlen($buf);
  header("Content-type:application/pdf");
  header("Content-Length:$len");
  header("Content-Disposition:inline; filename=coords.pdf");
  echo $buf;
  pdf_delete($pdf);
?>
