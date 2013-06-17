class Person {
  var $name;

  function get_name () {
    return $this->name;
  }

  function set_name ($new_name) {
    $this->name = $new_name;
  }
}