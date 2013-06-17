<?php
 $p = pdf_new();
 pdf_open_file($p);

 $im = pdf_open_jpeg($p, "php.jpg");
 $x = pdf_get_value($p, "imagewidth", $im);
 $y = pdf_get_value($p, "imageheight", $im);
 pdf_begin_page($p,595,842);
 pdf_place_image($p, $im, 50, 700, 1.0);
 pdf_set_border_style($p, "solid", 0);
 pdf_add_weblink($p,50,700,50+$x,700+$y,"http://www.php.net");
 pdf_end_page($p);
 pdf_close_image($p, $im);

 pdf_close($p);
 $buf = pdf_get_buffer($p);
 $len = strlen($buf);
 header("Content-type: application/pdf");
 header("Content-Length: $len");
 header("Content-Disposition: inline; filename=link.pdf");
 echo $buf;
 pdf_delete($p);
?>
