$call_trace = array();

function enter_function($name) {
  global $call_trace;
  array_push($call_trace, $name);     // same as $call_trace[] == $name
  echo "Entering $name (stack is now:". join('->',$call_trace) . ')<br />';
}

function exit_function() {
  echo 'Exiting<br />';
  global $call_trace;
  array_pop($call_trace);             // we ignore array_pop()'s return value
}

function first() {
  enter_function('first');
  exit_function();
}

function second() {
  enter_function('second');
  first();
  exit_function();
}

function third() {
  enter_function('third');
  second();
  first();
  exit_function();
}

first();
third();
