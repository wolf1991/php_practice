<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Llesh Miraj Website</title>
<!-- <link href="myStyle.css" rel="stylesheet" type="text/css" />  -->

<style type="text/css">
<?php include ("style.php") ?>
</style>

</head>

<body>
<div align="center">
  <h1> Welcome to CS 641 Spring 2017 Class </h1>
  <h2>Todays date is:
  <?php 
echo date("d/m/y");
?>
</h2>
<table  width="200" border="0" cellspacing="5" cellpadding="0">
<tr>
<td><img src="image.jpg" width="221" height="130" alt="picture"></td>
</table >


  <br />
  <br />
 
  <h4> Please select your favorite background color</h4>
 <form method="post" action="page4.php">
   <select name="color" id="color">
  
      <option value=""> PLEASE SELECT </option>
	 <option value="#F5F6CE" >Green</option>
	 <option value="#FBF5EF" >Light Orange</option>
	 <option value="#F5D0A9" >Orange</option>
	 <option value="#FFF8C6" >Lemon</option>
	 <option value="#DEDECA" >Lavander</option>
     <option value="#F2F5A9" >Floralwhite</option>
     <option value="#FDEEF4" >Lavendar Blush</option>
     <option value="#ECE5B6" >Lemon Chiffon</option>
     <option value="#FAF0E6" >Linen White</option>
     
	 
   </select>
   <input type="submit" id="submit" name="submit" value="   Submit   " />  
 <input type="hidden" name="submitted" id="submitted" value="true" />
</form>
 <a href="page02.php"><strong><br />
 </strong></a> </div>
</body>
</html>