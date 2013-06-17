<?php
  function have_required($array, $required_fields) {
    foreach ($required_fields as $field) {
      if (empty($array[$field])) return false;
    }

    return true;
  }

  if ($submitted) {
    echo '<p>You ';
    echo have_required($_POST, array('name', 'email_address'))
         ? 'did' : 'did not';
    echo 'have all the required fields.</p>';
  }
?>

<form action="<?= $PHP_SELF ?>" method="POST">
  <p>
    Name: <input type="text" name="name" /><br />
    Email address: <input type="text" name="email_address" /><br />
    Age (optional): <input type="text" name="age" />
  </p>

  <p align="center">
    <input type="submit" value="submit" name="submitted" />
  </p>
</form>