<html>
  <head>
    <title>Look Out World</title>
  </head>
  <body>
    <?php 
       $var_arr[0]="bar";
       $var_arr[1]="bar1";
       $var_arr[2]="bar2";
       foreach ($var_arr as $index=>$value) {
       echo "{$index} is at {$value} </br>\n";
       }
       ?>

  </body>
</html>
