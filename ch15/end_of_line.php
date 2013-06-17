<?php
 if (PHP_OS == "WIN32" || PHP_OS == "WINNT") {
   define("EOL","\r \n");
 } else if (PHP_OS =="Linux") {
   define("EOL","\n");
 } else {
   define("EOL","\n");
 }

 function echo_ln($out) {
   echo $out.EOL;
 }
 echo_ln("this line will have the platforms EOL character");
?>