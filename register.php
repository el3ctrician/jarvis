<?php
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-signup']))
{
 require_once('dbconnect.php');
 $uname=trim($_POST['uname']);
 $email=trim($_POST['email']);
 $upass=md5(trim($_POST['pass']));
 $query = "INSERT INTO users(username,email,password) VALUES(?,?,?)";
 $stmt = mysqli_prepare($dbc, $query);
 mysqli_stmt_bind_param($stmt,"sss", $uname,$email,$upass);
 mysqli_stmt_execute($stmt);
 $affected_rows = mysqli_stmt_affected_rows($stmt);
 if($affected_rows == 1)
 {
  echo '<script>alert("successfully registered \n try to login now");</script>';
  mysqli_stmt_close($stmt);
  mysqli_close($dbc);
  header( "refresh:1;url=index.php" );
}
 else 
 { 
  echo '<script>alert("Error!");</script>';
  echo mysqli_error();
  mysqli_stmt_close($stmt);
  mysqli_close($dbc);
 }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mako" >

</head>
<body>
<div  class="header" align="center">
<img src="logo.png"  style="max-height:100%;"/> 
</div>
<center>
<div class="display">
<div class="h2">Signing Up!</div>
<br>
<div id="field-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td  align="center"><input class="field-form" type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td  align="center"><input class="field-form" type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td  align="center"><input class="field-form" type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td align="center"><button class="button" type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td align="center"><a class="sign-link" href="index.php">Sign In Here</a></td>
</tr>
</table>
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
