<?php
	//connect to database
	include("connection.inc");
?>


<!--

Design by Llesh Miraj
Title : CS 641 RESPONSIVE WEBDEVELOPMENT
         CS 641 Pace University
Description: CS 641 Mobile Web Development
-- >

<!-- START HTML DOCUMENT -->

<!-- START HEAD -->
<head>
<title> CS 641 Mobile Web Development</title>
<style type="text/css">
<?php include ("style.php"); ?>
</style>
</head>
<!-- END HEAD -->

<!-- START BODY OF DOCUMENT -->
<body>

<h2> Welcome to CS 641 <?php echo($_POST['firstName']);?>!</h2>

<?php


//Check if the form has been submitted
 if(isset($_POST['submitted'])){

 	 //initialize an error array
	 $errors=array();

	 //Check for a first name

	 if(empty($_POST['firstName'])){

		$errors[]= 'You forgot to enter your first name. ';

	 }else {

		$firstName =trim( $_POST['firstName']);
	 }

     //Check for a last name

	 if(empty($_POST['lastName'])){

		$errors[]= 'You forgot to enter students last name. ';

	 }else {

		$lastName =trim( $_POST['lastName']);
	 }

    //Check for gender

	 if(empty($_POST['gender'])){

		$errors[]= 'You forgot to enter gender. ';

	 }else {

		$gender =trim( $_POST['gender']);
	 }


    //Check for a Birthdate

	 if(empty($_POST['dayOfBirth'])){

		$errors[]= 'You forgot to enter students birthdate. ';

	 }else {

		$dayOfBirth =trim( $_POST['dayOfBirth']);
	 }

	  //Check for a telephone number

	 if(empty($_POST['telephone'])){

		$errors[]= 'Please enter telephone number ';

	  }else {

		 $telephone =trim( $_POST['telephone']);

	  }

     //Check for an email

	 if(empty($_POST['email'])){

		$errors[]= 'You forgot to enter students email address. ';

	 }else {

		$email =trim( $_POST['email']);
	 }

     //Check for a password

	    if(empty($_POST['password'])){

		$errors[]= 'You forgot to enter your password.';

	 }else {

		$password =trim( $_POST['password']);
	 }

    //Check for a program

	 if(empty($_POST["program"])){

		$errors[]= 'Please select a program ';

	  }else {

		 $program = $_POST["program"];

	  }

     //Check for a subject

	 if(empty($_POST["subject"])){

		$errors[]= 'Please select a course of study ';

	  }else {

		 $subject = $_POST["subject"];

	  }

	  //Check to se if user entered the address

       if(empty($_POST['address'])){

		$errors[]= 'You forgot to enter students address. ';

	 }else {

		$address =trim( $_POST['address']);
	 }

	  // If everything' s OK  register the user in the database

	  if (empty($errors)) {


	//set up the SQL statementwhich will insert the form items into the data base called:lmiraj

      $sql = "INSERT INTO student (firstName,lastName,gender,dayOfBirth,telephone,email, password, program,address,registrationDate) VALUES (\"$firstName\" , \"$lastName\" , \"$gender\", \"$dayOfBirth\", \"$telephone\", \"$email\", \"$password\", \"$program\", \"$address\", Now())";


			// first check if the password is in use

			$sql1="SELECT password FROM student WHERE password='$password'";
			$result1=mysqli_query($conn,$sql1);
			$count1= mysqli_num_rows($result1);

			//If we have more than one match which is given by number of rows with that username
			//then the name exists and we get an error,the user can register again

			if ($count1 !=0)
			{
					  die('Sorry, the password '.$password.' is already in use.
					  <h4><a href="index.php">Register with another password </a></h4>');

			 }

	      $rs = mysqli_query($conn,$sql);

		//get the user id of the last insert
	     $userID = mysqli_insert_id($conn);

		//loop through each subject
		foreach($subject  as $current_subject){
		// fill the joint table stud_subj with $userID and $current_subject numerical values
		$sql = "INSERT into stud_subj (studID,subjID)  values($userID,$current_subject)";

		$rs = mysqli_query($conn,$sql);

		// test the insert action
		//echo $sql . "<br><br>";

		#confirm the joins have been made
		if($rs) { echo("<li>Subject $current_subject has been added</li><br><br>");}
		}

	     if($rs){ //the database will return a true or false. If it's true, then you know the    SQL ran okay.

				echo("<h3>Record has been added.</h3> ");



					//************** HERE STARTS THE UPLOAD	*************//
				/*
				 now begin the file upload section the first step will be to create a unique
				 name for the photo by concatenating the users ID  with the photoname.
				 to get the photoname, chopping off any path information, we use a combination of a
				 function and an attibute of the file...basename() will get the files name, in order
				 to get the part of the file that is the  name and not the image data,
				 we use the files' variable $myfile_name, the file name that were going to use is now $uploadedfile.
				 It will be a unique file  name, a combination of the the file name and the user's ID,<br>
				 which results in a file name that cannot be overwritten accidentally.
				 For example, if two people uploaded "mypicture.jpg" each one will have a user ID
				 before it like 10_mypicture.jpg.
				*/
$uploadedfile = $userID . "_" . $_FILES['file']['name'];


				//$uploadedfile = $userID . "_" .$_FILES['file']['tmp_name'];			
				
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 6000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Uploaded file name: " . $_FILES["file"]["name"] . "<br />";
    echo "File ype: " . $_FILES["file"]["type"] . "<br />";
    echo "File size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      copy($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
	  $sql = "UPDATE student SET photo = '" . $uploadedfile . "' WHERE ID = " .$userID;
			
				$rs = mysqli_query($conn,$sql); 
			
				if($rs) { echo("<br>Photo has been appended\n"); }
      echo "<br>and stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }

				
	           // ****************HERE ENDS THE FILE UPLOAD ********************//			
				

				echo'<h4><a href="index.php"target="mainFrame" >Home </a></h4> ';
				echo '<h4><a href="list.php" target="mainFrame">List of Students </a></h4>';
				echo '<h4><a href="search.php" target="mainFrame">Search  </a></h4>';

				include("table1.php");

			}else{     //if it did not run OK.Public message:

				echo'<h1>System Error</h1>;
				<p> You could not be registered do to a system error. We apologize for any inconvenience.</p>';
				echo '<p>  ' . mysqli_error($conn) . '
				<br/> <br/>Query: '.$sql. '
				</p>';
		    }//End if $rs If

			exit();

		}else{  //Report the errors

			echo'<h1>System Error</h1>
			<p> The following errors occured:<br/> ';

			foreach($errors as $msg){ //print each error.

			echo "-$msg <br/>\n";

			}

			echo'</p>  <p><h4><a href="index.php" target="mainFrame">Please try again. </a></h4></p> <p><br/> </p>';

	   }//End of if (empty($errors)) If

  } //End of the main Submit conditional

?>

<!-- END BODY OF DOCUMENT -->
</body>
<!-- END HTML DOCUMENT -->
</html>
