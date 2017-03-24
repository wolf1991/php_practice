
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--Design by Llesh Miraj
Title      : CS 641
Description: A simple website for instructional purposes
-->

<!-- START HTML DOCUMENT -->
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- START HEAD -->
<head>
<title>Spring 2017 CS 641</title>
<meta name="keywords" content="How to use some Html Tags" />
<meta name="description" content="" />
<!-- <link href="myStyle.css" rel="stylesheet" type="text/css" />  -->
<style type="text/css">
<?php include ("style.php"); ?>
</style>  
 
</head>
<!-- END HEAD -->
<!--START Body-->
<body > 
<?php include 'menu.php';?>
<div align="center">
<h1> Welcome to CS 641 </h1>
<h2>Todays date is: <?php 
echo date("m/d/y");
?>
</h2>
<!-- START IMAGE TABLE-->
<table  width="200" border="0" cellspacing="5" cellpadding="1">
<tr>
<td><img src="image.jpg" width="221" height="130" alt="picture" /></td>
</table >
<!-- END IMAGE TABLE -->
<p><strong><a href="registform.php" target="mainFrame">New Users Please Register </a></strong></p>
<p><strong>Wrong Login! Please Try Again</strong><br></br>
<strong> Please enter your username and your password  </strong></p>
  <!-- END IMAGE TABLE -->
  <!-- START LOGIN FORM -->
  <FORM name="form" action="loginToHomePage.php" method="post">
  
      <table width="176" height="98">
      <tr>
      <td width="68"><strong>Username</strong></td>
      <td width="98"><strong>
      <input type="text" name="user_name" size="15" maxlength="15"      class="shadeform"/>
      </strong></td>
      </tr>
      <tr>
      <td><strong>Password </strong></td>
      <td><input type="password"  name="password" size="15" maxlength="15"  class="shadeform"/></td>
      </tr>
	  <tr>
        
      <td><input type="hidden" name="gotoPage" value="<?php echo($page) ; ?>"/></td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="     Login    " /></td>
      </tr>
      </table>
   </FORM>
</div>
</body>
<!--END BODY-->
</html>
<!--END HTML-->