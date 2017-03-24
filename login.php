	<?php
	//CONNECT TO DATABASE
	include("connection.inc");
	//IF USER PRESSES THE LOGIN BUTTON
	if (isset($flag)){

	//POST EMAIL AND PASS
	$email=$_POST["email"];

    $password=$_POST["password"];

	//check for email and pass
	if ($email == "" or $password ==""){

				 //display msg if one of them is empty
				 $msg = "Either your email or password is missing. Try again";

			}
		else
			{
				//otherwise authenticate the password;
			    $sql = "SELECT ID, firstName FROM student WHERE email='" . $email . "' AND password='" . $password . "'";

			    $rs = mysqli_query($conn,$sql);
						

			    $totalreturned = mysqli_num_rows($rs);

				   if ($totalreturned < 1){
						  //if theere is a not a mutch
						 $msg = "Sorry, could not authenticate you in the database. Try again.";

						 }
					      else
						 { //otherwise fill the array and set the cookie lastin only 4 seconds and redirect the user
								$row = mysqli_fetch_array($rs);
								setcookie("login","valid",time()+4);
								setcookie("userid",$row['ID']);
								setcookie("fn",$row['firstName']);
								header("Location:$gotoPage");
								
						 }//end if - else Authentication statement

			}//end if pasword empty

	}//end if is set flag
    ?>
    <!--START HTML -->
	<html>
	 <!--START HEAD -->
	<head>
	<title>Login</title>
    <style type="text/css">
    <?php include ("style.php"); ?>
    </style>
    </head>
	<!--END HEAD -->
	<!--START BODY -->
	<body>
	<?php include 'menu.php';?>
	<h2>Please login</h2>

	<p style="color:red;font-weight:bold;"><?php $msg = "Either your email or password is missing. Try again"; echo($msg) ; ?></p>
	 <!--START FORM-->
	<FORM  ACTION="<?php echo("login.php");?>"  METHOD="POST" name="form"/>
	    <!--START LOGIN TABLE -->
	   <table  class="backgrounds" width="21%" border="1"  cellpadding="1" cellspacing="2">
       <tr>
       <td>Email:</td>
       <td><input type="text" name="email" size="25" maxlength="40" CLASS="shadeform"/></td>
       </tr>
	   <tr>
       <td>Password:</td>
       <td><input type="text" name="password" size="25" maxlength="40" CLASS="shadeform"/></td>
       </tr>
	   <tr>
       <td colspan="2">
       <div align="center">
	   <input type="hidden" name="flag" value="true" />
	   <input type="hidden" name="gotoPage" value="<?php echo($page);?>" />
       <input type="submit" name="submit" value="     Login    "/>
       </div>
	   </td>
       </tr>
       </table>
	   <!--END TABLE -->
     </FORM>
	 <!--END FORM -->

	</body>
	 <!--SEND BODYL -->
	</html>
	 <!--END HTML -->
