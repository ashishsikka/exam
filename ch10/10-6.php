<?php
  $p = pdf_new();
  pdf_open_file($p);
  pdf_set_info($p,"Creator","hello.php");
  pdf_set_info($p,"Author","Rasmus Lerdorf");
  pdf_set_info($p,"Title","Hello world (PHP)");
  pdf_set_parameter($p, "resourcefile",
                    '/usr/local/lib/fonts/pdflib.upr');
  pdf_begin_page($p,612,792);
  pdf_set_text_pos($p,25,750);
  $fonts = array('Courier'=>0,'Courier-Bold'=>0,'Courier-BoldOblique'=>0,
                 'Courier-Oblique'=>0,'Helvetica'=>0,'Helvetica-Bold'=>0,
                 'Helvetica-BoldOblique'=>0,'Helvetica-Oblique'=>0,
                 'Times-Bold'=>0,'Times-BoldItalic'=>0, 'Times-Italic'=>0,
                 'Times-Roman'=>0, 'LuciduxSans'=>1,
                 'Georgia' => 1, 'Arial' => 1, 'Century Gothic' => 1,
                 'Century Gothic Bold' => 1, 'Century Gothic Italic' => 1,
                 'Century Gothic Bold Italic' => 1
                );
  foreach($fonts as $f=>$embed) {
    $font = pdf_findfont($p,$f,"host",$embed);
    pdf_setfont($p,$font,25.0);
    pdf_continue_text($p,"$f (".chr(128)." Ç à á â ã ç è é ê)");
  }
  pdf_end_page($p);
  pdf_close($p);
  $buf = pdf_get_buffer($p);
  $len = strlen($buf);
  Header("Content-type: application/pdf");
  Header("Content-Length: $len");
  Header("Content-Disposition: inline; filename=hello_php.pdf");
  echo $buf;
  pdf_delete($p);
?>
