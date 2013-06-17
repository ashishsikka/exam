function FillTemplate($inName, $inValues = array(),
                      $inUnhandled = "delete") {
  $theTemplateFile = $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $inName;
  if ($theFile = fopen($theTemplateFile, 'r')) {
    $theTemplate = fread($theFile, filesize($theTemplateFile));
    fclose($theFile);
  }

  $theKeys = array_keys($inValues);
  foreach ($theKeys as $theKey) {
    // look for and replace the key everywhere it occurs in the template
    $theTemplate = str_replace("\{$theKey}", $inValues[$theKey],
                               $theTemplate);
  }

  if ('delete' == $inUnhandled ) {
    // remove remaining keys
    $theTemplate = eregi_replace('{[^ }]*}', '', $theTemplate);
  } elseif ('comment' == $inUnhandled ) {
    // comment remaining keys
    $theTemplate = eregi_replace('{([^ }]*)}', '<!-- \\1 undefined -->',
                                 $theTemplate);
  }

  return $theTemplate;
}
