<?php
session_start();

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 require_once('dbconnect.php');
 $email = $_POST['email'];
 $upass = $_POST['pass'];
 $query="SELECT * FROM users WHERE email='$email'";
 $response = @mysqli_query($dbc, $query);
 $row = mysqli_fetch_array($response);
 if($row['password']==md5($upass))
  {
  mysqli_close($dbc);
  $_SESSION['user'] = $row['userid'];
  header("Location: home.php");
 }
 else
 {
   echo "WRONG </br>";
   echo mysqli_error($dbc);
 }
  
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jarvis</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div  class="header" align="center">
    <img src="logo.png"  style="max-height:100%;"/> 
 	</div>
<center>
<div class="display">
<div class="h2">Signing In!</div>
<br>
<div class="field-form1">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
	<td  align="center"><input class="field-form" type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td align="center"><input type="password" class="field-form" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td align="center"><button type="submit" class="button" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td  align="center"><a class="sign-link" href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</div>
<footer class="cura">
  A Cura Di<br>Prof. S.Marano - Ing. Peppino Fazio
</footer>
</center>
</body>
</html>
