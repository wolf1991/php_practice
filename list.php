<?php
	#CONNECT TO THE DATABASE
	include('connection.inc');
?>
<!-- START HTML -->
<html>
<!-- START HEAD -->
<head>
<title>List the records in the database</title>

<style type="text/css">
<?php include("style.php"); ?>
</style>
</head>
<!-- END HEAD -->

<!-- START BODY -->
<body>
<?php include 'menu.php';?>
<h3 > Students List </h3>

<?php
//SELECT EVERYTHING FROM STUDENT
$sql = "SELECT * FROM student";

	$rs = mysqli_query($conn,$sql);
//LOOP THROUGH THE ARRAY OF RESULT SET (STUDENTS DATA)
while ($row = mysqli_fetch_array($rs) )//
	{
		echo("<li>" .$row["firstName"] . " ");
		echo($row["lastName"] . " ");
		//Link to details page for that particular student
		echo("[<A href=\"details.php?id=" . $row["id"] . "\">Details</A>]</ol> ");
	}//end while loop
?>
<h4><a href="index.php" > Home </a></h4>

<!-- START tabel with students information -->
<table border="1" cellpadding="2" cellspacing="2" summary = "Table holds student information" >
<tr bgcolor="#D3D3D3">
    <th> ID  </th>
	<th> First Name </th>
	<th> Last Name   </th>
	<th> Gender  </th>
	<th> Day of Birth  </th>
	<th> Telephone </th>
	<th> Email Address  </th>
	<th> Password </th>
	<th> Program </th>
	<th> Home Address  </th>
	<th> Registration Date  </th>
	<th> Details </th>
</tr>

<?php
#put all selections into a string called result and the result into an Array called row
$result = mysqli_query($conn, "SELECT * FROM student   ORDER BY id ASC");
while ($row = mysqli_fetch_array($result) ) //since we select everything the array has all students info
	{   // as long as we have a row echo rows items
		echo  "<tr>";
		echo  "<td>" .$row["id"] .  "</td>";
		echo  "<td>" .$row["firstName"] .  "</td>";
	    echo  "<td>" .$row["lastName"] .  "</td>";
		echo  "<td>" .$row["gender"] .  "</td>";
		echo  "<td>" .$row["dayOfBirth"] .  "</td>";
		echo  "<td>" .$row["telephone"] .  "</td>";
		echo  "<td>" .$row["email"] .  "</td>";
		echo  "<td>" .$row["password"] .  "</td>";
		echo  "<td>" .$row["program"] .  "</td>";
		echo  "<td>" .$row["address"] .  "</td>";
		echo  "<td>" .$row["registrationDate"] .  "</td>";
		//link to details for that student
	    echo  "<td>" ."<a href=\"details.php?id=" . $row["id"] . "\">Details</a>" . "</td>";
		echo  "</tr>";
	}
  ?>
</table>
<!-- END TABLE -->
<br>
<h4><a href="index.php" > Home </a></h4>
</body>
<!-- END  BODY-->
</html>
<!-- END DOCUMENT -->
