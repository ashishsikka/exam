<?php
  function strcat($left,$right){
    return $left .$right;
  }

  $first = "This is a ";
  $second = "complete sentence!";

  echo strcat($first,$second);
?>