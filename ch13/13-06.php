<html>
<head><title>Results!</title></head>
<body>
<?php
  function handle_errors ($error, $message, $filename, $line) {
    ob_end_clean();
    echo "<b>$message</b> in line $line of <i>$filename</i>";
    exit;
  }
  set_error_handler('handle_errors');
  ob_start();
?>

<h1>Results!</h1>

Here are the results of your search:<p />

<table border=1>
<?php
  require_once('DB.php');
  $db = DB::connect('mysql://user:seekrit@localhost/bondb');
  if (DB::iserror($db)) die($db->getMessage());

  // issue the query
  $sql = "SELECT movies.title,movies.year,actors.name
          FROM movies,actors
          WHERE movies.actor=actors.id
          ORDER BY movies.year ASC";

  $q = $db->query($sql);
  if (DB::iserror($q)) die($q->getMessage());

  // generate table
  while ($q->fetchInto($row)) {
?>
<tr><td><?php echo $row[0] ?></td>
    <td><?php echo $row[1] ?></td>
    <td><?php echo $row[2] ?></td>
</tr>
<?php
}
?>

</table>


</body>
</html>
