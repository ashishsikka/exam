<html>
<head><title>Temperature Conversion</title></head>
<body>

<?php
  $fahr =$_GET['fahrenheit'];
  if (is_null($fahr)) {
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
Fahrenheit temperature:
  <input type="text" name="fahrenheit"/><br />
  <input type="submit" name="Convert to Celsius!"/>
</form>

<?php
  } else {
    $celsius = ($fahr -32)*5/9;
    printf("%.2fF is %.2fC", $fahr, $celsius);
  }
?>

</body>
</html>