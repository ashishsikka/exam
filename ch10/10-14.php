<?php
  $p = pdf_new();
  pdf_open_file($p);

  pdf_begin_page($p,612,792);
  pdf_add_note($p,100,650,200,750,
	       "This is a test annotation.","Testing","note",1);
  pdf_end_page($p);

  pdf_close($p);
  $buf = pdf_get_buffer($p);
  $len = strlen($buf);
  header("Content-type: application/pdf");
  header("Content-Length: $len");
  header("Content-Disposition: inline; filename=note.pdf");
  echo $buf;
  pdf_delete($p);
?>
