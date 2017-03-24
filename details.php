 <?php
	//connect to a database
	include('connection.inc');
 ?>
 <!-- Start HTML  -->
 <html>
 <!-- Start Head  -->
 <head>
 <title> CS 641 Mobile Web Development</title>
 <style type="text/css">
 <?php include ("style.php"); ?>
 </style>
 </head>
 <!-- End Head -->
 <!-- Start Body-->
 <body>
<?php include 'menu.php';?>
 <?php
 //get the id
 $id = $_GET["id"];

 //Select everything fron student with the $id = $_GET["id"];
 $sql = "SELECT * FROM student WHERE  student.id = " . $id ;

 //Run the SQL command
	$rs = mysqli_query($conn,$sql);

 //place the result set into an array
 $row = mysqli_fetch_array($rs);


 /*
    HERE IS THE CODE FOR MANY to MANY.
	Since I want a list of all the related subjects, I am going
	to build a second recordset containing only the related records.
	The selection starts with the table named subject,
	and connects the subjID to the join table (stud_subj) on the subjID,
	then connects the stud_subj table to the student table on the user's ID (studID).
	The result is a result set that is all of the "subjects" stored in the join table
	for our user.
 */
	$sql = "SELECT subject.* from subject,stud_subj,student
			WHERE student.id = " . $row["id"] . "
			AND stud_subj.studID = student.id
			AND stud_subj.subjID = subject.subjID";

	//Run the rs2 SQL command
	$rs2 = mysqli_query($conn,$sql);

 ?>
 <!-- Start the table to organize the output -->
 <table align="center" border="2" bordercolorlight="#666600" cellpadding="2" cellspacing="2">
 <tr bgcolor="#F7F8E0">
 <td align="left">
  <?php
		echo("<img src='..\\uploads\\" . $row["photo"] ."' align='center' >");
		echo("<p>ID: " . $row["id"] . "<br>");
		echo("Firstname: " .$row["firstName"] . "<br>");
		echo("Lastname: " .$row["lastName"] . "<br>");
		echo("Date of Birth: " .$row["dayOfBirth"] . "<br>");
		echo("Telephone: " .$row["telephone"] . "<br>");
		echo("Email: " .$row["email"] . "<br>");
		echo("Password: " .$row["password"] . "<br>");
		echo("Program: " .$row["program"] .  "<br>");
		echo("Address: " .$row["address"] . "<br>");
		echo("Registration Date: " .$row["registrationDate"] . "</p>");

		/*
		  following lines will create a dynamic link to a page called "reflist" that
		  carries with it the ID of the subject that we printing out as "subjID"
		  Deleting and updating is paassword protected.A warning page warns the user
		  before permanently deleting the data.
		*/
		echo("See all students who are taking these classes: <ul>");

			while ($row2 = mysqli_fetch_array($rs2)) {

					echo("<li><a href='reflist.php?subjID=" . $row2["subjID"] . "'>" . $row2["longTitle"] . "</a></li>");

				}

		echo("<br><br>");
		echo("[<a href=\"update1.php?id=" . $row["id"] . "\">Update</a>] ");
		echo("[<a href=\"warning.php?id=" . $row["id"] . "\">Delete</a>]");
		echo("</ul>");
 ?>
 <h4><a href="list.php" > List of Recorsds </a></h4>
 <h4><a href="index.php" >Home</a></h4>
 </td>
 </tr>
 </table>
 <!-- End Table -->
 </br>
 <!-- Start  new table to show the students information in a usefull way
      Note that this table shows automaticly each students entries -->
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
	<th> Update </th>
	<th> Delete </th>
 </tr>

 <?php
 /*
   Here we want to show everything from student ordered by ID. The password has to be hidden
   in a real applicattion which then has the function of resetting a  forgotten password
 */
 $result = mysqli_query( $conn, "SELECT * FROM student   ORDER BY id ASC");
 while ($row = mysqli_fetch_array($result) )//as long as we have results,here placed into an array
	{
		echo  "<tr>"; //we print out students id,fn,ln,....,address,and registrationDate
		echo  "<td>" .$row["id"] .  "</td>"; //note the rows
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
		//and we give the user the oportunity to delete and update student records
	    echo  "<td>" ."<a href=\"update1.php?id=" . $row["id"] . "\">Update</a>" . "</td>";
	    echo  "<td>" ."<a href=\"warning.php?id=" . $row["id"] . "\">Delete</a>" .  "</td>";
		echo  "</tr>";
	}//end while loop
  ?>
 </table>
 <!-- End Table -->
 <h4><a href="index.php" >Home</a></h4>
 </body>
 <!-- End Body -->
 </html>
 <!-- End Html Document -->
