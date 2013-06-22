<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
Array example
     
<?php


$ages = array('Person'  => 'Age',
              'Fred'    => 35,
              'Barney'  => 30,
              'Tigger'  => 8,
              'Pooh'    => 40);


//start table and print heading
extract($ages);

echo  $Person;
echo  $Fred;
echo  $Barney;
echo  $Tigger;
echo  $Pooh;

?>

</body>
</html>
     