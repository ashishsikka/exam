<?php
require_once('DB.php');

   /**************************************
   ** Database Connection Setup Section **
   **************************************/

$username = 'user';
$password = 'seekrit';
$hostspec = 'localhost';
$database = 'phpbook';

//  Select one of these three values for $phptype

// $phptype = 'pgsql';
// $phptype = 'oci8';
$phptype = 'mysql';

//  Check for Oracle 8 - Data Source Name syntax is different

if ($phptype != 'oci8'){
    $dsn = "$phptype://$username:$password@$hostspec/$database";
} else {
    $net8name = 'www';
    $dsn = "$phptype://$username:$password@$net8name";
}

//  Establish the connection

$db = DB::connect($dsn);
if (DB::isError($db)) {
    die ($db->getMessage());
}
?>
