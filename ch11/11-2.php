function start_element($inParser, $inName, &$inAttributes) {
  $attributes = array();
  foreach ($inAttributes as $key) {
    $value = $inAttributes[$key];
    $attributes[] = "<font color=\"gray \">$key=\"$value \"</font>";
  }

  echo '&lt;<b>' . $inName . '</b>' . join('', $attributes) . '&gt;';
}
