function external_entity_reference($inParser, $inNames, $inBase,
                                   $inSystemID, $inPublicID) {
  if ($inSystemID) {
    if (!list($parser,$fp) = create_parser($inSystemID)) {
      echo "Error opening external entity $inSystemID \n";
      return false;
    }
    return parse($parser,$fp);
  }

  return false;
}