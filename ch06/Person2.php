class Person {
  var $name, $address, $age;

  function Person($name, $address, $age) {
    $this->name = $name;
    $this->address = $address;
    $this->age = $age;
  }
}

class Employee extends Person {
  var $position, $salary;

  function Employee($name, $address, $age, $position, $salary) {
    $this->Person($name, $address, $age);
    $this->position = $position;
    $this->salary = $salary;
  }
}