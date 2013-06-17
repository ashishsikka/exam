<?php
  include_once('Log.inc');
  session_start();
?>
<html><head><title>Next Page</title></head>
<body>
<?php
  $now = strftime("%c");
  $l->write("Viewed page 2 at $now");
  echo "The log contains:<p>";
  echo nl2br($l->read());
?>
</body></html>
