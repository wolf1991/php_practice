<?php 
	#include the connection string
	include('connection.inc');
?>

<html>
<head>
<title>List the records in the database</title>
<style type="text/css">
<?php include ("style.php"); ?>
</style> 
</head> 

<body>
<h3>Students Dtabase</h3><br>
<?php 
#get the search criteria from the form
#note the use of the GET method instead of POST
#why might you use GET for a search page?

$fn = $_GET["fn"];
$ln = $_GET["ln"];

#create a SQL query
#SELECT fields FROM table

$sql = "SELECT * FROM student WHERE firstname LIKE '%" . $fn . "%' AND lastname LIKE '%" . $ln . "%'";

#execute the query
$rs = mysqli_query($conn,$sql);

#little loop to list out all of the records in the result set

while ($row = mysqli_fetch_array($rs) )
	{
		echo("<div>");
		echo("<p>ID: " . $row["id"] . "<br>");
		echo("Firstname: " .$row["firstName"] . "<br>");
		echo("Lastname: " .$row["lastName"] . "<br>");
		echo("Day of Birth: " .$row["dayOfBirth"] . "<br>");
		echo("Telephone: " .$row["telephone"] . "<br>");
		echo("Email: " .$row["email"] . "<br>");
		echo("Address: " .$row["address"] . "<br>");
		echo("Registration Date: " .$row["registrationDate"] . "</p>");
		echo("</div>");
	}
?>
<hr noshade />
<h4><a href="index.php" >Home</a></h4>
</body>
</html>
