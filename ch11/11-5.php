function processing_instruction($inParser, $inTarget, $inCode) {
  if ($inTarget === 'php') {
    eval($inCode);
  }
}
