<head>
<title> Registy  Application</title>

<style type="text/css">
<?php include ("style.php"); ?>
</style> 

</head>

<body>
	
	<div id="header">
	
		<h1>Welcome Students</h1>
	</div>
	
	<p>Please use this form to register to our data base. </p>
	<h2>Registration Form</h2>
	
<FORM action="processregistform.php" method="post" name="form">
	
	 <table align= "center" width="253" border="1">
       <tr>
         <td width="103">First Name </td>
         <td width="138"><input type="text" name="first_name" size="20" maxlength="40" value = "<?php if(isset($_POST['first_name'])){ echo $_POST['first_name'];}?>"/></td>
       </tr>
       <tr>
         <td>Last Name </td>
         <td><input type="text" name="last_name"  size="20" maxlength="40" value = "<?php if(isset($_POST['last_name'])){ echo $_POST['last_name'];}?>"/></td>
       </tr>
       <tr>
         <td>Email </td>
         <td><input type="text" name="email"    size="20" maxlength="40" value = "<?php if(isset($_POST['email'])){ echo $_POST['email'];}?>"/></td>
       </tr>
       <tr>
         <td>User Name </td>
         <td><input type="text" name="user_name"  size="20" maxlength="40" value ="<?php if(isset($_POST['user_name'])){ echo $_POST['user_name'];}?>"/></td>
       </tr>
       <tr>
         <td>Password</td>
         <td><input type="password" name="password" size="20" maxlength="40"/></td>
       </tr>
       <tr>
         <td>Confirm Pass </td>
         <td><input type="password" name="pass2" size="20" maxlength="40"/></td>
       </tr>
       <tr>
         <td></td>
         <td><input type="submit" name="submit" value="   Register   "/></td>
       </tr>
  </table>
     <h4> <a href="index1.php" target="mainFrame"> Home</a> </h4></p>
     <p>
    <input type="hidden" name="submitted" value="TRUE"/>
  </p>
</form>
</body>
</html>
