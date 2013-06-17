<?php
  include_once('Log.inc');
  session_start();
?>
<html><head><title>Front Page</title></head>
<body>
<?php
  $now = strftime("%c");

  if (!session_is_registered('l')) {
    $l = new Log("/tmp/persistent_log");
    session_register('l');
    $l->write("Created $now");
    echo("Created session and persistent log object.<p>");
  }

  $l->write("Viewed first page $now");
  echo "The log contains:<p>";
  echo nl2br($l->read());
?>
<a href="next.php">Move to the next page</a>
</body></html>