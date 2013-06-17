<?php
   $p = pdf_new();
   pdf_open_file($p);
   pdf_begin_page($p,612,792);
   pdf_moveto($p,150,150);
   pdf_lineto($p,450,650);
   pdf_lineto($p,100,700);
   pdf_curveto($p,80,400,70,450,250,550);
   pdf_stroke($p);
   pdf_end_page($p);
   pdf_close($p);
   $buf = pdf_get_buffer($p);
   $len = strlen($buf);
   header("Content-type:application/pdf");
   header("Content-Length:$len");
   header("Content-Disposition:inline; filename=gra.pdf");
   echo $buf;
   pdf_delete($p);
?>
