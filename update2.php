<?php
	include("connection.inc");
?>
<head>
	<title>Updating Students Info</title>
	<style type="text/css">
	<?php include ("style.php"); ?>
	</style> 
</head>
<body>
<?	

//get the items from the form
    $firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$gender = $_POST["gender"];
	$dayOfBirth = $_POST["dayOfBirth"];
	$telephone = $_POST["telephone"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$program = $_POST["program"];
	$subject = $_POST["subject"];		
	$address = $_POST["address"];
	$id = $_POST["id"];	

	#basic update command. Does not update the related records.
	

			$sql="UPDATE student SET 
				firstName=\"$firstName\",
				lastName=\"$lastName\",
				gender=\"$gender\",
				dayOfBirth =\"$dayOfBirth\",
				telephone=\"$telephone\",
				email=\"$email\",
				password=\"$password\",
				program=\"$program\",
				address=\"$address\",
				registrationDate=Now()
				WHERE id=" . $id;

	//echo ("<li>$sql</li>");
		
	$rs= mysqli_query($conn,$sql);
	
	#optional: test the RS for possible errors
	if($rs)
		{ echo("Update was successful<br>"); }
	else
		{ echo("<p style=\"color:red\">Update NOT successful </p>"); }

	
	#when you update a join table,
	#it is good practive to first
	#delete all of the joined records,
	#then re-add them. If you keep on just adding,
	#without deleting, you will compound your relationships.


		$sql1 = "Delete FROM stud_subj WHERE studID=" . $id;
		
		#remember- just to test it.	
	    echo ("<li>$sql</li>");
	
		$rs = mysqli_query($conn,$sql1);
	
	#now, add them all:
	#we will use the for each to loop through each selected reference from the form.
	#if there was only one reference select, like "Friend", then the loop happens
	#only once. If there were more, then it loops as many times as needed.
	#on each loop, the ref_reg table is inserted into.
	

		foreach($subject  as $current_subject){ 
			
		   $sql = "INSERT INTO stud_subj (studID,subjID) values($id,$current_subject)";
			
			#remember - just to test it.
			#echo ("<li>$sql</li>");
			
			$rs = mysqli_query($conn,$sql); 
		   
				if($rs)
					{ echo("Update was successful"); }
				else
					{ echo("<p style=\"color:red\">Update NOT successful!</p>"); }
	
		} 	
	 
?>


	<h4><a href="index.php" >Home</a></h4>
	<h4><a href="list.php" >See all records</a></h4>	
	</body>
	</html>