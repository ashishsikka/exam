<?php
 if (PHP_OS == "WIN32" || PHP_OS =="WINNT") {
   define("INCLUDE_DIR","c:\\myapps");
 } else {
   //some other platform
   define("INCLUDE_DIR","/include");
 }
?>