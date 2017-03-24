
<?php
	
	 include("connection.inc");
	 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Deleting Database Items</title>
<style type="text/css">
<?php include ("style.php"); ?>
</style> 
</head> 
<body>
<h2>Students Book Delete</h2>

<table align ="center" width="300"  border="1"  cellpadding="1" cellspacing="1"  class="backgrounds">
  <tr>
    <td colspan="2"><h4>Do you really want to delete this record</h4> </td>
  </tr>
  <tr>
  <td><h4> 
  <?php
 
 $id = $_GET["id"];
 
 //here we are selecting fields from two tables AND filtering the results on one of the tables.
$sql = "SELECT * FROM student WHERE id = " . $id;
 
 $rs = mysqli_query($conn,$sql);
 
 //echo out the first row ONLY, since there is only one row.
 
 $row = mysqli_fetch_array($rs);
 
		echo("<div id=\"menu\">");
		echo("<a href=\"delete.php?id=" . $row["id"] . "\">Yes,Delete Record</a>");
		echo("</div>");		
		
?></h4></td>
    <td><h4> <a href="list.php">No, Don't Delete </a></h4></td>
  </tr>
</table>

</body>
</html>
