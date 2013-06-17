function create_parser ($filename) {
  $fp = fopen('filename','r');
  $parser = xml_parser_create();
  xml_set_element_handler($parser, 'start_element', 'end_element');
  xml_set_character_data_handler($parser, 'character_data');
  xml_set_processing_instruction_handler($parser, 'processing_instruction');
  xml_set_default_handler($parser, 'default');
  return array($parser, $fp);
}

function parse ($parser, $fp) {
  $blockSize = 4 * 1024;                    // read in 4 KB chunks
  while($data = fread($fp, $blockSize)) {
    if (!xml_parse($parser, $data, feof($fp))) {
      // an error occurred; tell the user where
      echo 'Parse error:'.xml_error_string($parser)."at line ".
           xml_get_current_line_number($parser));
      return FALSE;
    }
  }
  return TRUE;
}

if (list($parser, $fp) = create_parser('test.xml')) {
  parse($parser, $fp);
  fclose($fp);
  xml_parser_free($parser);
}