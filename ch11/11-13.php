<?php
  $processor = xslt_create();
  $result = xslt_process($processor, 'news.xml', 'news.xsl');
  if (!$result) echo xslt_error($processor);
  xslt_free($processor);
  echo "<pre>$result</pre>";
?>