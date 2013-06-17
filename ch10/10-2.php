<?php
  $pdf = pdf_new();
  pdf_open_file($pdf);
  pdf_set_info($pdf,"Creator","coords.php");
  pdf_set_info($pdf,"Author","Rasmus Lerdorf");
  pdf_set_info($pdf,"Title","Coordinate Test (PHP)");
  pdf_begin_page($pdf,612,792);

  $font = pdf_findfont($pdf,"Helvetica-Bold","host",0);
  pdf_setfont($pdf,$font,38.0);
  pdf_show_xy($pdf, "Bottom Left", 10, 10);
  pdf_show_xy($pdf, "Bottom Right", 350, 10);
  pdf_show_xy($pdf, "Top Left", 10, 752);
  pdf_show_xy($pdf, "Top Right", 420, 752);
  pdf_show_xy($pdf, "Center",612/2-60,792/2-20);

  pdf_end_page($pdf);
  pdf_set_parameter($pdf, "openaction", "fitpage");
  pdf_close($pdf);

  $buf = pdf_get_buffer($pdf);
  $len = strlen($buf);
  header("Content-type: application/pdf");
  header("Content-Length: $len");
  header("Content-Disposition: inline; filename=coords.pdf");
  echo $buf;
  pdf_delete($pdf);
?>
