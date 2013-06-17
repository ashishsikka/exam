<?php

$bindings['DESTINATION'] = $_SERVER['PHP_SELF'];
$name = $_GET['name'];

if (!empty($name)) {
  // do something with the supplied values
  $template = "thankyou.template";
  $bindings['NAME'] = $name;
} else {
  $template = "user.template";
}

echo FillTemplate($template, $bindings);

?>
