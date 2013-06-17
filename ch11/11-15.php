<?php

function times ($methods, $args) {
  return $args[0] * $args[1];
}

$request = $HTTP_RAW_POST_DATA;
if (!$request) $request_xml = $HTTP_POST_VARS['xml'];

$server = xmlrpc_server_create();
if (!$server) die("Couldn't create server");

xmlrpc_server_register_method($server, 'multiply', 'times');

$options = array('output_type' => 'xml', 'version' => 'auto');
echo xmlrpc_server_call_method($server, $request, $response, $options);
xmlrpc_server_destroy($server);
?>
