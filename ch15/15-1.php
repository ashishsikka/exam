<?php
  function include_remote($filename) {
    $data = implode("\n", file($filename));
    if ($data) {
      $tempfile = tempnam(getenv("TEMP"), "inc");
      $fp = fopen($tempfile, "w");
      fwrite($fp, $data);
      fclose($fp);
      include($tempfile);
      unlink($tempfile);
    }
    echo "<b>ERROR:Unable to include ".$filename."</b><br>\n";
    return FALSE;
  }

  //sample usage
  include_remote("http://www.example.com/stuff.inc");
?>
