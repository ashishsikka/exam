<?php
 $pdf = pdf_new();
 pdf_open_file($pdf);
 pdf_set_info($pdf,"Creator","coords.php");
 pdf_set_info($pdf,"Author","Rasmus Lerdorf");
 pdf_set_info($pdf,"Title","Coordinate Test (PHP)");
 pdf_begin_page($pdf,612,792);
 pdf_translate($pdf,0,792);              // move origin
 pdf_scale($pdf, 1, -1);                 // redirect horizontal coordinates
 pdf_set_value($pdf,"horizscaling",-100);   // keep normal text direction

 $font = pdf_findfont($pdf,"Helvetica-Bold","host",0);
 pdf_setfont($pdf,$font,-38.0);          // text points upward
 pdf_show_xy($pdf, "Top Left", 10, 40);

 pdf_end_page($pdf);
 pdf_set_parameter($pdf, "openaction", "fitpage");
 pdf_close($pdf);

 $buf = pdf_get_buffer($pdf);
 $len = strlen($buf);
 Header("Content-type:application/pdf");
 Header("Content-Length:$len");
 Header("Content-Disposition:inline; filename=coords.pdf");
 echo $buf;
 pdf_delete($pdf);
?>
