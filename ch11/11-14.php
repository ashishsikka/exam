<?php
  $xml = join('', file('news.xml'));
  $xsl = join('', file('news.xsl'));
  $arguments = array('/_xml' => $xml, '/_xsl' => $xsl);
  $processor = xslt_create();
  $result = xslt_process($processor, 'arg:/_xml', 'arg:/_xsl', NULL, $arguments);
  if (!$result) echo xlst_error($processor);
  xslt_free($processor);
  echo "<pre>$result</pre>";
?>