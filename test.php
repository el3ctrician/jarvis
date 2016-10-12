<?php
$output=shell_exec('sudo sox -t mp3 /home/pi/fm2/1.mp3 -t wav - |sudo ./pi_fm_rds -audio - -freq 103.0 > /dev/null &');
echo "<pre>$output</pre>";
echo 'Current script owner: ' . get_current_user();
?>
