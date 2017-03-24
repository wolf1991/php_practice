<?php

/* Include this code at the top of all your pages
that you want to password protect. Include it using
the include command <?php include('file.inc'); ?>
If a user has not logged in, the program will redirect 
them to the login form. If they have logged in, then
they will see nothing ... 
*/

#new first step, get the page that they are going to:

$goingto = $_SERVER["SCRIPT_NAME"] ."?". $_SERVER["QUERY_STRING"];


#First step is check the login cookie has not been set

if ($_COOKIE['login'] <> "valid") 
	{ #if the user hasn't set a cookie, it's time direct them to the login page
		header("location:login.php?page=" . $goingto);
	}
?>
	