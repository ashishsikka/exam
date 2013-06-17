<html><head><title>Bond Movies</title></head>
<body>
<table border=1>
<tr><th>Movie</th><th>Year</th><th>Actor</th></tr>
<?php
  //connect
  require_once('DB.php');
  $db =DB::connect("mysql://username:password@server/webdb");
  if (DB::iserror($db)) {
    die($db->getMessage());
  }
  //issue the query
  $sql ="SELECT movies.title,movies.year,actors.name
         FROM movies,actors
         WHERE movies.actor=actors.id
         ORDER BY movies.year ASC";
  $q =$db->query($sql);
  if (DB::iserror($q)) {
    die($q->getMessage());
  }
  //generate table
  while ($q->fetchInto($row)) {
?>
<tr><td><?= $row[0] ?></td>
    <td><?= $row[1] ?></td>
    <td><?= $row[2] ?></td>
</tr>
<?php
  }
?>
</table>
</body></html>