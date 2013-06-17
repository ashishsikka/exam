<?php
// this file is Log.inc

class Log {
  var $filename;
  var $fp;

  function Log($filename) {
    $this->filename = $filename;
    $this->open();
  }

  function open() {
    $this->fp = fopen($this->filename, "a")
                or die("Can't open {$this->filename}");
  }

  function write($note) {
    fwrite($this->fp, "$note\n");
  }

  function read() {
    return join('', file($this->filename));
  }

  function __wakeup() {
    $this->open();
  }

  function __sleep() {
    // write information to the account file
    fclose($this->fp);
    return array('filename');
  }

}
?>
