class HTML_Stuff {
  function start_table() {
    echo "<table border='1'>\n";
  }
  function end_table () {
    echo "</table>\n";
  }
}
HTML_Stuff->start_table();
//print HTML table rows and columns
HTML_Stuff->end_table();