<html>
<head>
<title>ODBC Transaction Management</title>
</head>
<body>
<h1>Phone List</h1>

<?php
  $dd = odbc_connect('PhoneListDSN','user','password');
  // disable autocommit if we're confirming
  if ($submit == "Add Listing") {
    $start_trans = odbc_autocommit($dd,0);
  }

  //insert if we've got values submitted
  if ($submit == "Add Listing" || $submit == "Confirm") {
    $sql = "insert into phone_list ([extension],[name])";
    $sql .= "values ('$ext_num','$add_name')";
    $result = odbc_exec($dd,$sql);
  }
?>

<form method="post" action="phone_trans.php">
<table>
<tr><th bgcolor="#EEEEEE">Extension</th>
<th bgcolor="#EEEEEE">Name</th>
</tr>

<?php
  // build table of extension and name values
  $result = odbc_exec($dd,"select * from phone_list");
  $cols = array();
  $row = odbc_fetch_into($result,$cols);
  while ($row) {
    if ($cols[0] === $ext_num && $submit != "Confirm") {
?>
<tr><td bgcolor="#DDFFFF"><?= $cols[0] ?></td>
<td bgcolor="#DDFFFF"><?= $cols[1] ?></td></tr>

<?php
    } else {
      print("<tr><td>$cols[0]</td><td>$cols[1]</td></tr>\n");
    }
    $row = odbc_fetch_into($result,$cols);
  }

  // if we're confirming,make hidden fields to carry state over
  //  and submit with the "Confirm"button
  if ($submit == "Add Listing") {
?>

</table>
<br>
<input type="hidden" name="ext_num" value="<?= $ext_num ?>">
<input type="hidden" name="add_name" value="<?= $add_name ?>">
<input type="submit" name="submit" value="Confirm">
<input type="submit" name="submit" value="Cancel">

<?php
  } else {
    //if we're not confirming, show fields for new values
?>
<tr><td><input type="text" name="ext_num" size="8" maxlength="4"></td>
<br>
<td><input type="text" name="add_name" size="40" maxlength="40"></td>
<br>
</tr>
<br>
</table>
<br>
<input type="submit" name="submit" value="Add Listing">
<br>
<?php
  }
?>
</form>
</body>
</html>
