<?php
  $p = pdf_new();
  pdf_open_file($p);
  pdf_begin_page($p,612,792);

  $font = pdf_findfont($p,"Helvetica-Bold","host",0);
  pdf_setfont($p,$font,38.0);
  pdf_set_parameter($p, "overline", "true");
  pdf_show_xy($p, "Overlined Text", 50,720);
  pdf_set_parameter($p, "overline", "false");
  pdf_set_parameter($p, "underline", "true");
  pdf_continue_text($p, "Underlined Text");
  pdf_set_parameter($p, "strikeout", "true");
  pdf_continue_text($p, "Underlined strikeout Text");
  pdf_set_parameter($p, "underline","false");
  pdf_set_parameter($p, "strikeout","false");
  pdf_setcolor($p,"fill","rgb", 1.0, 0.1, 0.1);
  pdf_continue_text($p, "Red Text");
  pdf_setcolor($p,"fill","rgb", 0, 0, 0);
  pdf_set_value($p,"textrendering",1);
  pdf_setcolor($p,"stroke","rgb", 0, 0.5, 0);
  pdf_continue_text($p, "Green Outlined Text");
  pdf_set_value($p,"textrendering",2);
  pdf_setcolor($p,"fill","rgb", 0, .2, 0.8);
  pdf_setlinewidth($p,2);
  pdf_continue_text($p, "Green Outlined Blue Text");

  pdf_end_page($p);
  pdf_close($p);

  $buf = pdf_get_buffer($p);
  $len = strlen($buf);
  header("Content-type: application/pdf");
  header("Content-Length: $len");
  header("Content-Disposition: inline; filename=coord.pdf");
  echo $buf;
  pdf_delete($p);
?>
