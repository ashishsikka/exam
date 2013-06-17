<?php
  // the skeletal Word invoice with macros
  $invoice = "C:/temp/invoice.doc";

  // fake form parameters
  $customerinfo="Wyle Coyote
123 ABC Ave.
LooneyTune,USA 99999";

  $deliverynum="00001";
  $ordernum="12345";
  $custnum="WB-beep";
  $shipdate="11 Sep 2001";
  $orderdate="11 Sep 2001";
  $shipvia="UPS Ground";

  $item[1]="SK-000-05";
  $desc[1]="Acme Pocket Rocket";
  $quantity[1]="2";
  $cost[1]="$5.00";
  $subtot[1]="$10.00";
  $total="$10.00";

  //start Word
  $word=new COM("Word.Application")or die("Cannot start MS Word");
  print "Loaded Word version ($word->Version)\n";
  $word->visible =1 ;
  $word->Documents->Open($invoice);

  //fill in fields
  $word->Application->Run("BkmkCustomer");
  $word->Selection->TypeText($customerinfo);

  $word->Application->Run("BkmkDelivery");
  $word->Selection->TypeText($deliverynum);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($shipdate);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($shipvia);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($orderdate);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($custnum);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($ordernum);
  $word->Application->Run("NextCell");

  $word->Application->Run("BkmkItem");
  $word->Selection->TypeText($item[1]);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($desc[1]);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($quantity[1]);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($cost[1]);
  $word->Application->Run("NextCell");
  $word->Selection->TypeText($subtot[1]);

  $word->Application->Run("BkmkTotal");
  $word->Selection->TypeText($total);

  // print it
  $word->Application->Run("invoiceprint");

  / /wait to quit
  $word->Application->ActiveDocument->Saved=True;
  while ($word->Application->BackgroundPrintingStatus > 0) { sleep(1); }

  // close the application and release the COM object
  $word->Quit();
  $word->Release();
  $word = null;
?>
