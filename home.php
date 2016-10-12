<?php
session_start();
if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
 require_once('jarvis.php');
 $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 $query="SELECT * FROM users WHERE userid=".$_SESSION['user'];
 $response = @mysqli_query($dbc, $query);
 $row = mysqli_fetch_array($response);
 mysqli_close($dbc);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mako" >
<title> Home Automation </title>
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


 <div class="display">
  <div class="h2" >Welcome <?php  echo $row['username']; ?></div>
  <div class="h3"> Now You Are The Boss!</div>
  <br><br>
  <table style="max-height:100%;" class="table_align">
<?php require_once('jarvis.php'); show_devices(); ?>

  </table> 

 </div>

 </div>


</div>
<footer class="cura">
  A Cura Di<br>Prof. S.Marano - Ing. Peppino Fazio
</footer>
</body>
</html>
