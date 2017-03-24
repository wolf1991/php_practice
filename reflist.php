<?php

	include("connection.inc");
?>

<html>
<head>
<title> Registration Application</title>
<style type="text/css">
<?php include ("style.php"); ?>
</style>
</head>

<body>
<h2>Students Taking the Same Courses</h2>

<?php

//set a local variable called $reference_id to get the $subjID value from the querystring

$sub_id = $_GET["subjID"];

#create a SQL query
#SELECT fields FROM table
#note how we are using the new . notation in the select to select specific fields
#our result sets are much smaller this way ... table.field, table.field

 $sql = "SELECT * from subject,stud_subj,student
			WHERE subject.subjID = " . $sub_id . "
			AND  stud_subj.studID = student.id
			AND stud_subj.subjID = subject.subjID";

#execute the query
//$rs = mysql_unbuffered_query($conn,$sql);
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($rs);

echo("<h3> Here are all the students who are taking this class: ". $row["longTitle"]. "</h3>");

mysqli_data_seek($rs,0);

while ($row = mysqli_fetch_array($rs)){

	    echo("<div id=\"result\">");
		echo("<li>" .$row["firstName"] . " ");
		echo($row["lastName"] . " ");
		echo("<A href=\"details.php?id=" . $row["id"] . "\">See Details</A></ul>");
		echo("</div>");
}
?>
<hr noshade="noshade">
<h4><a href="search.php">Search</a></h4>
<h4><a href="list.php">List of Records</a></h4>
<h4><a href="index.php">Home</a></h4>
</body>
</html>
