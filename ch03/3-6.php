function count_list() {
  if (func_num_args()==0) {
    return false;
  } else {
    for ($i=0; $i < func_num_args(); $i++) {
      $count += func_get_arg($i);
    }
    return $count;
  }
}

echo count_list(1,5,9);