<html>
<head><title>My Library</title></head>
<body>
<?php

class BookList {
  var $parser;
  var $records;
  var $record;
  var $current_field = '';
  var $field_type;
  var $ends_record;

  function BookList ($filename) {
    $this->parser = xml_parser_create();
    xml_set_object($this->parser, &$this);
    xml_set_element_handler($this->parser, 'start_element', 'end_element');
    xml_set_character_data_handler($this->parser, 'cdata');

    // 1 = single field, 2 = array field, 3 = record container
    $this->field_type = array('title' => 1,
                              'author' => 2,
                              'isbn' => 1,
                              'comment' => 1);
    $this->ends_record = array('book' => true);

    $x = join("", file($filename));
    xml_parse($this->parser, $x);
    xml_parser_free($this->parser);
  }

  function start_element ($p, $element, &$attributes) {
    $element = strtolower($element);
    if ($this->field_type[$element] != 0) {
      $this->current_field = $element;
    } else {
      $this->current_field = '';
    }
  }

  function end_element ($p, $element) {
    $element = strtolower($element);
    if ($this->ends_record[$element]) {
      $this->records[] = $this->record;
      $this->record = array();
    }
    $this->current_field = '';
  }

  function cdata ($p, $text) {
    if ($this->field_type[$this->current_field] === 2) {
      $this->record[$this->current_field][] = $text;
    } elseif ($this->field_type[$this->current_field] === 1) {
      $this->record[$this->current_field] .= $text;
    }
  }

  function show_menu() {
    echo "<table border=1>\n";
    foreach ($this->records as $book) {
      echo "<tr>";
      $authors = join(', ', $book['author']);
      printf("<th align=left><a href='%s'>%s</a></th><td>%s</td></tr>\n",
             $_SERVER['PHP_SELF'] . '?isbn=' . $book['isbn'],
             $book['title'],
             $authors);
      echo "</tr>\n";
    }
    echo "</table>\n";
  }

  function show_book ($isbn) {
    foreach ($this->records as $book) {
      if ($book['isbn'] !== $isbn) {
        continue;
      }

      $authors = join(', ', $book['author']);
      printf("<b>%s</b> by %s.<br>", $book['title'], $authors);
      printf("ISBN: %s<br>", $book['isbn']);
      printf("Comment: %s<p>\n", $book['comment']);
    }
?>
Back to the <a href="<?= $_SERVER['PHP_SELF'] ?>">list of books</a>.<p>
<?
  }
};

// main program code

$my_library = new BookList ("books.xml");
if ($_GET['isbn']) {
  // return info on one book
  $my_library->show_book($_GET['isbn']);
} else {
  // show menu of books
  $my_library->show_menu();
}

?>

</body></html>
