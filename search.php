
<?php
	//important! This uses the connection information in an external file to connect to the database
	include("connection.inc");
?>
<html>
<head>
<title> Registration Application</title>
<style type="text/css">
<?php include ("style.php") ?>
</style> 
</head> 

<body>
	<?php include 'menu.php';?>
	<h2>Students Register  Search</h2>
	
	<p>Use this form to search students database </p>
	
	<FORM action="searchList.php"  method="get" name="form">
	 
	 <p>First Name: <input type="text" name="fn" size="20" maxlength="40"/>
	   <br>
	   <br />
	    Last Name: <input type="text" name="ln" size="20" maxlength="40"/>
	 </p>
	 <input type="submit" name="submit" value="Search"/>
</form>
</body>
</html>
