<?php
$bg=$_POST['color'];
setcookie("bg",$bg);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Welcome to CS 641 Spring WEB DEV CLASS</title>
</head>
<body bgcolor="<?php echo $_POST['color']; ?>"> 
<div align="center">
  <h1> Welcome to CS 641 Spring Mobile We Develeopment </h1>
  <h2>Todays date is: <?php 
echo date("Y/m/d");
?>
</h2>
<table  width="200" border="0" cellspacing="5" cellpadding="0">
<tr>
<td><img src="image.jpg" width="221" height="130" alt="picture"></td>
</table >
</div>

  <br />
<br />
<a href="index1.php" target="mainFrame">
<h4 align="center"> Home </h4></a></p>
</body>
</html>
