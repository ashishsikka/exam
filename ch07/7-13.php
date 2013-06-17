<?
  $colors = array('black' => '#000000',
                  'white' => '#ffffff',
                  'red'   => '#ff0000',
                  'blue'  => '#0000ff');
  session_start();
  session_register('bg');
  session_register('fg');


  $bg_name = $_POST['background'];
  $fg_name = $_POST['foreground'];

  $bg = $colors[$bg_name];
  $fg = $colors[$fg_name];
?>
