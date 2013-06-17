function doubler(&$value) {
  $value = $value << 1;
}

$a =3;
doubler($a);
echo $a;