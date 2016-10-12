<?php
  $gpio="7";
  $gpio=trim($gpio);
 echo $gpio;
  shell_exec("gpio -1 mode '$gpio' out");
  $state=shell_exec("gpio -1 read '$gpio'");
echo $state;
?>
