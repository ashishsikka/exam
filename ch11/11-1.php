<?php header('Content-Type: text/xml'); ?>
<?xml version='1.0' encoding='ISO-8859-1' ?>
<!DOCTYPE rss PUBLIC '-//Netscape Communications//DTD RSS 0.91//EN'
 'http://my.netscape.com/publish/formats/rss-0.91.dtd'>
<rss version="0.91">
  <channel>
    <?php

    // news items to produce RDF for
    $items = array(
                   array('title' => 'Man Bites Dog',
                         'link'  => 'http://www.example.com/dog.php',
                         'desc'  => 'Ironic turnaround!'),
                   array('title' => 'Medical Breakthrough!',
                         'link'  => 'http://www.example.com/doc.php',
                         'desc'  => 'Doctors announced a cure for me today.')
                   );

    foreach($items as $item) {
      echo("<item>\n");
      echo "  <title>{$item['title']}</title>\n";
      echo "  <link>{$item['link']}</link>\n";
      echo "  <description>{$item['desc']}</description>\n";
      echo "  <language>en-us</language>\n";
      echo("</item>\n");
    }
    ?>
  </channel>
</rss>
