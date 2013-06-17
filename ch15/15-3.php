<?php
  $ex = new COM("Excel.sheet") or die ("Did not connect");
  $ex->Application->Visible = 1;
  $wkb =$ex->Application->Workbooks->Add();
  $sheet = 1;
  excel_write_cell($wkb, $sheet, "A1", "Hello, World");

  // write a value to a particular cell
  function excel_write_cell($wkb, $sheet, $c, $v) {
    $sheets = $wkb->Worksheets($sheet);
    $sheets->activate;
    $selcell = $sheets->Range($c);
    $selcell->activate;
    $selcell->value = $v;
  }
?>