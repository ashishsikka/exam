// The Luhn checksum determines whether a credit-card number is syntactically
// correct; it cannot, however, tell if a card with the number has been issued,
// is currently active, or has enough space left to accept a charge.

function IsValidCreditCard($inCardNumber,$inCardType) {
  // Assume it's okay
  $isValid = true;

  // Strip all non-numbers from the string
  $inCardNumber = ereg_replace('[^[:digit:]]', '', $inCardNumber);

  // Make sure the card number and type match
  switch($inCardType) {
    case 'mastercard':
      $isValid = ereg('^5[1-5].{14}$', $inCardNumber);
      break;

    case 'visa':
      $isValid = ereg('^4.{15}$|^4.{12}$', $inCardNumber);
      break;

    case 'amex':
      $isValid = ereg('^3[47].{13}$', $inCardNumber);
      break;

    case 'discover':
      $isValid = ereg('^6011.{12}$', $inCardNumber);
      break;

    case 'diners':
      $isValid = ereg('^30[0-5].{11}$|^3[68].{12}$', $inCardNumber);
      break;

    case 'jcb':
      $isValid = ereg('^3.{15}$|^2131|1800.{11}$', $inCardNumber);
      break;
  }

  // It passed the rudimentary test;let's check it against the Luhn this time
  if ($isValid) {
    // Work in reverse
    $inCardNumber = strrev($inCardNumber);

    // Total the digits in the number,doubling those in odd-numbered positions
    $theTotal = 0;
    for ($i=0; $i < strlen($inCardNumber); $i++) {
      $theAdder = (int) $inCardNumber{$i};

      //Double the numbers in odd-numbered positions
      if ($i % 2) {
        $theAdder << 1;
        if ($theAdder > 9) { $theAdder -=9; }
      }
      $theTotal +=$theAdder;
    }

    //Valid cards will divide evenly by 10
    $isValid =(($theTotal %10)==0);
  }

  return $isValid;
}