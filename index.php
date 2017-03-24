
<?php
	//important! This uses the connection information in an external file to connect to the database
	include("connection.inc");
?>
<!-- Start HTML  -->
<html>
<!-- Start Head  -->
<head>
<title> Registration Application</title>
<style type="text/css">
<?php include ("style.php"); ?>
</style>
</head>
<!-- Start Body -->
<body>
<?php include 'menu.php';?>
<h2>Students Register</h2>
<br>
To add a new student to the students register use the registration form below:
<!-- Start Form  -->
<FORM action="add.php" method="post" name="form"  enctype="multipart/form-data">

	<!-- Start and Center the Forms Table -->
    <table align="center" class="backgrounds" width="53%" border="1"  cellpadding="1" cellspacing="2">
    <tr>
    <td width="37%">First Name:</td>
    <td width="63%"><input type="text" name="firstName" size="25" maxlength="40" CLASS="shadeform"/></td>
    </tr>
    <tr>
    <td>Last Name:</td>
    <td><input type="text" name="lastName" size="25" maxlength="40" CLASS="shadeform"/></td>
    </tr>
    <tr>
    <td>Gender:</td>
    <td>Female <input type="radio" name="gender" value="f" /> Male <input type="radio" name="gender" value="m" /></td>
    </tr>
    <tr>
    <td>Day of birth: </td>
    <td><input type="text" name="dayOfBirth" size="25" maxlength="40" CLASS="shadeform"/></td>
    </tr>
    <tr>
    <td>Telephone:</td>
    <td><input type="text" name="telephone" size="25" maxlength="40" CLASS="shadeform"/></td>
    </tr>
    <tr>
    <td>Email:</td>
    <td><input type="text" name="email" size="25" maxlength="40" CLASS="shadeform"/></td>
    </tr>
    <tr>
    <td>Password:</td>
    <td><input type="text" name="password" size="25" maxlength="40" CLASS="shadeform"/></td>
    </tr>
    <tr>
    <td > Select one program of study </td>
	<td>
		   <select name="program" size="5" >
           <option value="ORLD">Adult Learning & Leadership ORLD
           <option value="A&HL">Applied Linguistics A&HL
           <option value="A&HA">Art and Art Education A&HA
           <option value="A&HG">Arts Administration A&HG
           <option value="A&H">Arts and Humanities A&H
           <option value="CCPX">Clinical Psychology CCPX
           <option value="MSTU">Pace Uni SSCSIS Computer Science 
           <option value="ITSF">Comparative & Internat. Educ. ITSF
           <option value="CCPJ">Counseling Psychology CCPJ
           <option value="C&T">Curriculum and Teaching C&T
           <option value="ORLA">Education Leadership ORLA
           <option value="HBSS">Health Education HBSS
           <option value="ORLH">Higher Postsecondary Educ ORLH
           <option value="A&HH">History and Education A&HH
           <option value="HUDK">Human Cognition and Learning HUDK
           <option value="IND">Interdisciplinary IND
           <option value="MSTM">Mathematics Education MSTM
           <option value="HUDM">Measurement & Evaluation HUDM
           <option value="BBSR">Movement Sciences BBSR
           <option value="A&HM">Music and Music Education A&HM
           <option value="BBSN">Neuroscience and Education BBSN
           <option value="ORLN">Nurse Executive ORLN
           <option value="HBSN">Nursing Education HBSN
           <option value="HBSV">Nutrition Education HBSV
           <option value="ORL">Organization and Leadership ORL
           <option value="ORLJ">Organizational Psychology ORLJ
           <option value="A&HF">Philosophy and Education A&HF
           <option value="ORLF">Politics and Education ORLF
           <option value="HBSK">Reading and School Psych HBSK
           <option value="A&HR">Religion and Education A&HR
           <option value="MSTC">Science Education MSTC
           <option value="A&HW">Social Studies A&HW
           <option value="HUDF">Sociology and Education HUDF
           <option value="HBSE">Special Education HBSE
           <option value="BBSQ">Speech & Language Pathology BBSQ
           <option value="A&HT">TESOL A&HT
           <option value="A&HE">Teaching of English A&HE
           </select>
	</td>
    </tr>
    <tr>
	<!-- Work in two columns  -->
	<td >Please select classes: </td>
	<td>
		  <?php
			#here is where I want to create a loop to select
			#all of the subjects from the new subjects table
			$sql = "select * from subject ORDER BY subjID ASC";
			$rs = mysqli_query ($conn,$sql);
		  ?>
           <!-- A student ca choose many subjects -->
	      <select name="subject[]"  multiple="multiple" size="5" >
	 	  <?PHP

	 	  while ($row=mysqli_fetch_array($rs)){

	 	  echo("<option value='" . $row["subjID"] ."'>" .$row["shortTitle"] . "</option>");

	 	  }//end while loop
	 	 ?>
	    </select>
	</td>
    </tr>
	<tr>
	<td>Upload a JPG or GIF photo : </td>
	<td><input type="file"  name="myfile"   size="25"   CLASS="textfield" ></td>
	</tr>
    <tr>
    <td>Address:</td>
    <td><textarea name="address" rows="5" cols="40" wrap="physical" class="textarea1" ></textarea></td>
    </tr>
	<tr>
    <td colspan="2">

       <div align="center">
       <input type="submit" name="submit" value="     Register     "/>
	   <input type="hidden" name="submitted" value="TRUE"/>
       </div>
    </td>
    </tr>
    </table>
<!-- End Forms Table  -->
</FORM>
<!-- End Form  -->
<h4><a href="list.php" >See list of Students</a></h4>
<h4><a href="search.php" >Search Database </a></h4>
</body>
<!-- End Body -->
</html>
<!-- End Html -->
