<?php
require_once('utils.php');

$options = array('output_type' => 'xml', 'version' => 'xmlrpc');
$result = xu_rpc_http_concise(
   array(method => 'multiply',
         args   => array(5, 6),
         host   => '192.168.0.1',
         uri    => '/~gnat/test/ch11/xmlrpc-server.php', debug => 1,
         options => $options));

echo "5 * 6 is $result";

?>
