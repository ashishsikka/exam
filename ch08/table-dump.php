$info = $response->tableInfo();
a_to_table($info);

function a_to_table ($a) {
  echo "<table border=1>\n";
  foreach ($a as $k => $v) {
    echo "<tr valign=top align=left><td>$k</td><td>";
    if (is_array($v)) {
      a_to_table($v);
    } else {
      print_r($v);
    }
    echo "</td></tr>\n";
  }
  echo "</table>\n";
}
