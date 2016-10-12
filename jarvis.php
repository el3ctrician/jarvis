<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!defined('AllowAccess')) {
// header("Location: home.php");
}
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'ahmad');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'Jarvis');
function inserted_devices()
{
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT gpio FROM gpiodevices";
$result = mysqli_query($dbc, $query);
$var = array();
while ($rw = mysqli_fetch_array($result)) {
  $var[] = $rw['gpio'];}
mysqli_close($dbc);
return $var;
}
function add_device($name,$gpio,$icon)
 {
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $gpio=trim($gpio);
  shell_exec("gpio -1 mode '$gpio' out");
  $state=shell_exec("gpio -1 read '$gpio'");
  $name=trim($name);
  $icon=trim($icon);
  $query = "INSERT INTO gpiodevices(name,gpio,state,icon) VALUES(?,?,?,?)";
  $stmt = mysqli_prepare($dbc, $query);
  mysqli_stmt_bind_param($stmt,"siis", $name,$gpio,$state,$icon);
  mysqli_stmt_execute($stmt);
  $affected_rows = mysqli_stmt_affected_rows($stmt);
  if($affected_rows == 1)
  {
   return 1;
   mysqli_stmt_close($stmt);
   mysqli_close($dbc); 
}
  else 
  { 
   return 0;
   echo mysqli_error($dbc);
   mysqli_stmt_close($stmt);
   mysqli_close($dbc);
  }
} 
function del_device($gpio)
{
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 $gpio=trim($gpio);
 $query = "DELETE FROM gpiodevices WHERE gpio='$gpio'";
 if(mysqli_query($dbc, $query))
  {
   mysqli_close($dbc);
   return 1;
  }
 else
  {
   mysqli_close($dbc);
   return 0;
  }
}
function show_devices()
{
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT * FROM gpiodevices";
$result = mysqli_query($dbc, $query);
if (mysqli_num_rows($result) > 0) 
{
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) 
  {
   echo"
<tr >
     <td align='center'>{$row['name']}</td>
     <td align='center'><img src='{$row['icon']}.png'  style='max-height:10vmin;' /></td>
     <td >
      <div class='cont'>

        <label  class='toggle_1'>
           <div class='on'> ON </div>
           <div class='off'> OFF </div>
          <input type='checkbox' class='toggle_input_1' >
          <div class='toggle_control_1'> 
          </div>
        </label>
      </div>

     </td>
   </tr>";
  }
} 
else 
{
 echo "0 Devices";
}
mysqli_close($dbc);
}
?>

