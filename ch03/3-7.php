$lambda =create_function('$a,$b','return(strlen($a)-strlen($b));');
$array = array('really long string here,boy', 'this', 'middling length',
               'larger');
usort($array,$lambda);
print_r($array);
