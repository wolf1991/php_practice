<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<?php
	include("connection.inc");
    $id = $_GET['id'];
	$sql = "SELECT * FROM student WHERE id = " . $id;
	$rs = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($rs);
?>
<html>
<head>
<title> Update Datbae</title>
<style type="text/css">
<?php include ("style.php"); ?>
</style> 
</head> 

<body>
<h2>Students Database: Update</h2>
<h3>Updating record <?php echo($row["firstName"] . " " . $row["lastName"]); ?></h3>

<form action="update2.php" target="mainFrame" method="post" name="update">
	<p>
	  <input type="hidden" name="id" value="<?php echo($row["id"]); ?>" />
  </p>
	<table width="52%" border="1"  cellpadding="1" cellspacing="1" align="center" class="backgrounds">
       <tr>
         <td width="36%">First Name:</td>
         <td width="64%"><input type="text" name="firstName" value="<?php echo($row["firstName"]); ?>" /></td>
       </tr>
       <tr>
         <td>Last Name:</td>
         <td><input type="text" name="lastName" value="<?php echo($row["lastName"]); ?>" /></td>
       </tr>
       <tr>
         <td>Gender:</td>
         <td>
		 Male <input type="radio" name="gender" value="m"  <?php if($row["gender"] == "m"){ echo(" CHECKED "); } ?> />
         Female  <input type="radio" name="gender" value="f" <?php if($row["gender"] == "f"){ echo(" CHECKED "); } ?>/>		 </td>
       </tr>
       <tr>
         <td>Day Of Birth </td>
         <td><input type="text" name="dayOfBirth" size="25" maxlength="40" value="<?php echo($row["dayOfBirth"]); ?>"/></td>
       </tr>
       <tr>
         <td>Telephone:</td>
         <td><input type="text" name="telephone" size="25" maxlength="40" value="<?php echo($row["telephone"]); ?>"/></td>
       </tr>
       <tr>
         <td height="30">Email:</td>
         <td><input type="text" name="email" size="25" maxlength="40" value="<?php echo($row["email"]); ?>"/></td>
       </tr>
	   
	   <tr>
         <td height="30">Password:</td>
         <td><input type="text" name="password" size="25" maxlength="40" value="<?php echo($row["password"]); ?>"/></td>
       </tr>
		  <tr><td >Select one program of   study </td> <td><select name="program" size="5" >
		  
		  <option value="<?php echo($row["program"]);?>" selected="selected"><?php echo($row["program"]);?></option>
           <option value="ORLD">Adult Learning & Leadership ORLD
           <option value="A&HL">Applied Linguistics A&HL
           <option value="A&HA">Art and Art Education A&HA
           <option value="A&HG">Arts Administration A&HG
           <option value="A&H">Arts and Humanities A&H
           <option value="CCPX">Clinical Psychology CCPX
           <option value="MSTU">Communic,Computing,Tech in Edu MSTU
           <option value="ITSF">Comparative & Internat.  Educ. ITSF
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
           </select></td>
      </tr>
       <tr>
         <td >Please select your classes:  </td>
         <td>
		 <?php
	 	 #first, get all of the possible references from the references table
			$sql = "SELECT * FROM subject";
			#note the use of rs2 here... we don't want to overright our $rs data
			$rs2 = mysqli_query($conn,$sql);
			
		#second, get all of the select references from the ref_reg join table
			$sql = "SELECT * FROM stud_subj WHERE studID = " . $id;
			$rs3 = mysqli_query($conn,$sql);
		?>
	 	 <select name="subject[]" multiple="multiple" size="5>">
			<?php
			
				while($row2 = mysqli_fetch_array($rs2)){
					
					echo("<option value='" . $row2["subjID"] ."' "); 
					
					#now, as we loop through all of the references in $rs2,
					#we loop through the references in the $rs3 (all stored relationships) 
					#if there is a match, the word "selected" is written into the a string.
					#that string is then written into the <option> command.
					#note that the $selectString is reset to nothing each time we loop.
					#we also reset the pointer in the $rs3 recordset each time.
								
					$selectString = "";
					
					if (mysqli_num_rows($rs3) > 0) {
						mysqli_data_seek($rs3,0);
					}
					
					while ($row3 = mysqli_fetch_array($rs3)){
						
						if ($row3["subjID"] == $row2["subjID"]) {
					
						$selectString = " selected=\"selected\" ";
						}
					}
					
					#finish off the <option>
					echo($selectString . " >" . $row2["longTitle"] . "</option>");
				}
			?>
		</select>		 </td>
       </tr>
     
       <tr>
         <td>Address:</td>
         <td><textarea name="address" rows="5" cols="30" wrap="physical" class="textarea1"> <?php echo	($row["address"]); ?> </textarea></td>
       </tr>
	   <tr>
         <td></td>
         <td>
              <div align="left">
             <input type="submit" name="submit" value=" Update Student Info " />
			  </div>			  </td>
	   </tr>
  </table>
 
</form>
</body>
</html>