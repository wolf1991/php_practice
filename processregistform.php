<?php
	//important! This uses the connection information in an external file to connect to the database
	include("connection.inc");
?>

<head>
<title> Registration Application</title>
<style type="text/css">
<?php include ("style.php") ?>
</style>
</head>

<body>

<div id="header">
<h1>Registration Database</h1>
</div>

<h2> Welcome  <?php echo($_POST['first_name']);?>!</h2>

<?php


//Check if the form has been submitted
 if(isset($_POST['submitted'])){

 	 //initialize an error array
	 $errors=array();

	 //Check for a first name

	 if(empty($_POST['first_name'])){

		$errors[]= 'You forgot to enter your first name. ';

	 }else {

		$fn =trim( $_POST['first_name']);
	 }


     //Check for a last name

	 if(empty($_POST['last_name'])){

		$errors[]= 'You forgot to enter your last name. ';

	 }else {

		$ln =trim( $_POST['last_name']);
	 }


     //Check for a first name

	 if(empty($_POST['email'])){

		$errors[]= 'You forgot to enter your email address. ';

	 }else {

		$e =trim( $_POST['email']);
	 }

	 //Check for a Username

	 if(empty($_POST['user_name'])){

		$errors[]= 'You forgot to enter your user name. ';

	 }else {

		$user_name =trim( $_POST['user_name']);
	 }

     //Check for a password and match against the confirmed password

	 if(!empty($_POST['password'])){

		if( $_POST['password'] != $_POST['pass2'] ) {

		     $errors[]= 'Your password did not match the confirmed password. ';

	         }else {

		     $password =trim( $_POST['password']);

	         }

	  }else{

       $errors[]= 'You forgot to enter your password. ';

	  }

	  // If everything' s OK  register the user in the database
	  if (empty($errors)) {

			//set up the SQL statement
			$sql = "INSERT INTO `registrationform` (first_name,last_name,email,user_name,password,registration_date) VALUES ( \"$fn\" , \"$ln\" , \"$e\", \"$user_name\",\"$password\", Now() )";

			// first check if the username is in use
			$sql1="SELECT user_name FROM registrationform WHERE user_name='$user_name'";
			$result1=mysqli_query($conn,$sql1);
			$count1= mysqli_num_rows($result1);
			//If we have more than one match which is given by number of rows with that username
			//then the name exists and we get an error,the user can register again
			if ($count1 !=0)
			{
					  die('Sorry, the username '.$user_name.' is already in use.
					  <h4><a href="registform.php">Register with another username </a></h4>');

			 }
			//to debug remove this in your application
			//echo($sql . "<br>");

			//this will run the SQL statement against your database
			$rs = mysqli_query($conn,$sql);

			//the database will return a true or false. If it's true, then you know the SQL ran okay.
			if($rs){

				echo(" Record has been added. <br/>  ");
				echo("To add a new record please return to registration form <br/> <br/> ");
				echo' <h4><a href="registform.php">Back to Registration Form </a></h4>';
				echo' <h4><a href="index1.php"> Login</a></h4>';
			}else{     //if it did not run OK.Public message:

				echo'<h1>System Error</h1>
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

			echo'</p>  <p><h4><a href="registform.php">Please try again. </a></h4></p> <p><br/> </p>';

	   }//End of if (empty($errors)) If

  } //End of the main Submit conditional


?>

</body>
</html>
