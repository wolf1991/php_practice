<html>
<body>
<table border="1" cellpadding="2" cellspacing="2"

	summary = "Table holds student pesonal information" >
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
	<th> Update </th>
	<th> Delete </th>
</tr>

<?php

#little loop to list out all of the records in the result set
$result = mysqli_query($conn, "SELECT * FROM student ORDER BY id ASC");
while ($row = mysqli_fetch_array($result) )
	{
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
		echo  "<td>" ."<a href=\"update1.php?id=" . $row["id"] . "\">Update</a>" . "</td>";
	    echo  "<td>" ."<a href=\"warning.php?id=" . $row["id"] . "\">Delete</a>" .  "</td>";
		echo  "</tr>";

	}

  ?>
</table>
</body>
</html>
