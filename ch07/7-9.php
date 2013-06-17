<?php

$name       = $_POST['name'];
$media_type = $_POST['media_type'];
$filename   = $_POST['filename'];
$caption    = $_POST['caption'];

$tried = $name || $media_type || $filename;

if ($tried) {
  $validated = (!empty($name) && !empty($media_type) && !empty($filename));

  if (!$validated) {
?>
<p>
  The name, media type, and file name are required fields. Please fill
  them out to continue.
</p>
<?php
  }
}

if ($tried && $validated) {
  echo '<p>The item has been created.</p>';
}

// was this type of media selected?  print "selected" if so
function media_selected ($type) {
  global $media_type;
  if ($media_type == $type) { echo "selected"; }
}

?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  Name: <input type=text name="name" value="<?php echo $name ?>" /><br />
  Status: <input type="checkbox" name="status" value="active"
  <?php if($status == 'active') { echo 'checked'; } ?> /> Active<br />
  Media: <select name="media_type">
    <option value="">Choose one</option>
    <option value="picture" <?php media_selected('picture') ?> />
    Picture</option>
    <option value="audio" <?php media_selected('audio') ?> />Audio</option>
    <option value="movie" <?php media_selected('movie') ?> />Movie</option>
  </select><br />

  File: <input type="text" name="filename"
               value="<?php echo $filename ?>" /><br />
  Caption: <textarea name="caption"><?php echo $caption ?></textarea><br />

  <input type="hidden" name="tried" value="yes" />
  <input type="submit"
         value="<?php echo $tried ? 'Continue' : 'Create'; ?>" />
</form>
