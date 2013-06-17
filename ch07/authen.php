<?php
 $auth_ok = 0;
 $user = $_SERVER ['PHP_AUTH_USER'];
 $pass = $_SERVER ['PHP_AUTH_PW'];
 if (isset($user)&&isset($pass)&&$user === strrev($pass)) {
   $auth_ok = 1;
 }
 if (!$auth_ok) {
   header('WWW-Authenticate:Basic realm="Top Secret Files"');
   header('HTTP/1.0 401 Unauthorized');
   // anything else printed here is only seen if the client hits "Cancel"
 }
?>
<!--your password-protected document goes here -->