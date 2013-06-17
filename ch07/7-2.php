<html>
<head><title>Chunked Word</title></head>
<body>

<?php

$word   = $_POST['word'];
$number = $_POST['number'];

$chunks = ceil(strlen($word)/$number);

echo "The $number-letter chunks of '$word' are:<br />\n";

for ($i=0; $i < $chunks; $i++) {
  $chunk = substr($word, $i*3, 3);
  printf("%d: %s<br />\n", $i+1, $chunk);
}

?>

</body>
</html>
