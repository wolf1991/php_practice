<?php
//connect to data base
	include("connection.inc");

?>
<!-- Start HTML  -->
<html>
<!-- Start Head  -->
<head>
<title> Deleting Database Items</title>
<!-- Since the style sheet contains php code,I saved it as a php file and included it via include function -->
<style type="text/css">
<?php include ("style.php"); ?>
</style>
<!-- End Head  -->
</head>
<!-- End Head  -->
<!-- Start Body -->
<body>
<?php include 'menu.php';?>
<h2>CS 641 Mobile Web Development Students Register <br></br>Delete</h2>
<?php
    //get the id
	$id = $_GET["id"];

	// delete the student with the $id = $_GET["id"];
	$sql="DELETE FROM student WHERE id = " .$id;

	//Run the SQL command
	$rs = mysqli_query($conn,$sql);

	if($rs){
	     //show if student was successfully deleted
	     echo("You've successfully deleted the record.");

	}else{
		//print out if student is not deleted
		echo("You did not delete the record.");
	}
?>
<p><h4><a href="list.php">Back to students list</a></h4></p>

</body>
<!-- End Body -->
</html>
<!-- End HTML  -->
