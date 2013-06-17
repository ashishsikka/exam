<?php
  $dd = odbc_connect("phone list", "user", "password");
  $result = odbc_exec($dd,"select * from [Sheet1$]");
  odbc_result_all($result, "bgcolor='DDDDDD' cellpadding='1'");
?>
