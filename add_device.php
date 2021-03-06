<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}

else
{
 require_once ('jarvis.php');
 $busy = inserted_devices();
 $busy_length=count($busy);
 $disable = array();
 for($i=0; $i<=41 ; $i++)
 {
  $disable [$i] = " ";
 }
 for ($i=0; $i<$busy_length; $i++)
 {
  $disable [$busy [$i]] = "disabled";
 }
 if(isset($_POST['btn-confirm']))
 {
  $name=$_POST['device-name'];
  $gpio=$_POST['gpio'];
  $icon=$_POST['icon'];
  $done=add_device($name,$gpio,$icon);
  if($done == 1)
  {
  echo '<script> alert("Device added successfuly");</script>';
  header( "refresh:1;url=home.php" );
 
  }
  else
  {
    echo '<script> alert("Error");</script>';
  }
 }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Device</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div  class="header" align="center">
    <img src="logo.png"  style="max-height:100%;"/> 
    <div class="menu">
  <li><a href="home.php">Home</a></li>
  <li><a href="add_device.php">Add Device</a></li>
  <li><a href="edit_device.php">Edit Device</a></li>
  <li><a href="logout.php?logout">Logout</a></li>
  </div>

 	</div>
<center>

<div class="h2">Adding Device!</div>

<div class="field-form1">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
	<td align="center">Device Name:</td>
	<td  align="center"><input class="field-form" type="device-name" name="device-name" placeholder="Device Name" required /></td>
</tr>
<br>
<tr>
<td align="center">GPIO:</td>

<td align="center">
<form method="post"> 
<select name="gpio" style="-webkit-appearance: none;" class="select">
  <option value="3" <?php echo $disable [3];?>>3</option>
  <option value="5" <?php echo $disable [5];?>>5</option>
  <option value="7" <?php echo $disable [7];?>>7</option>
  <option value="8" <?php echo $disable [8];?>>8</option>
  <option value="10" <?php echo $disable [10];?>>10</option>
  <option value="11" <?php echo $disable [11];?>>11</option>
  <option value="12" <?php echo $disable [12];?>>12</option>
  <option value="13" <?php echo $disable [13];?>>13</option>
  <option value="15" <?php echo $disable [15];?>>15</option>
  <option value="16" <?php echo $disable [16];?>>16</option>
  <option value="18" <?php echo $disable [18];?>>18</option>
  <option value="19" <?php echo $disable [19];?>>19</option>
  <option value="21" <?php echo $disable [21];?>>21</option>
  <option value="22" <?php echo $disable [22];?>>22</option>
  <option value="23" <?php echo $disable [23];?>>23</option>
  <option value="24" <?php echo $disable [24];?>>24</option>
  <option value="26" <?php echo $disable [26];?>>26</option>
  <option value="29" <?php echo $disable [29];?>>29</option>
  <option value="31" <?php echo $disable [31];?>>31</option>
  <option value="32" <?php echo $disable [32];?>>32</option>
  <option value="33" <?php echo $disable [33];?>>33</option>
  <option value="35" <?php echo $disable [35];?>>35</option>
  <option value="36" <?php echo $disable [36];?>>36</option>
  <option value="37" <?php echo $disable [37];?>>37</option>
  <option value="38" <?php echo $disable [38];?>>38</option>
  <option value="40" <?php echo $disable [40];?>>40</option>

</select> 	
</td>
</tr>
<tr>
<td align="center">Icon:</td>

<td align="center">


<ul>
  <li>
    <input type="radio" id="f-option" name="icon" value="lamp">
    <label for="f-option">
      <img src="lamp.png"  style="max-height:10vmin;" />
    </label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="s-option" name="icon" value="radio">
    <label for="s-option">
      <img src="radio.png"  style="max-height:10vmin;" />
    </label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  
  <li>
    <input type="radio" id="t-option" name="icon" value="curtain">
    <label for="t-option">
      <img src="curtain.png"  style="max-height:10vmin;" />
    </label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
</ul>

</td>
</tr>
</table>
<br>
<div align="center"><button type="submit" class="button" name="btn-confirm">Confirm</button></div>
</form>
</div>
</div>
</div>
<footer class="cura">
  A Cura Di<br>Prof. S.Marano - Ing. Peppino Fazio
</footer>
</center>
</body>
</html>
