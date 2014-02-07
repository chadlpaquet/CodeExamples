<!--
Program Title:		logout.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to handle the logout/end of session
-->
<!DOCTYPE html>
<html>
<head>
	<?php
		//start session
		session_start();
		
		//unset session variables
		unset($_SESSION['username']);
	?>
	<title>Logout Successful</title>
	<style>
	h1 {text-align:center;}
	body {background-color:yellow;}
	p {text-align:center;}
	</style>
</head>
<body>
	<h1>You have successfully logged out!</h1>
	<p><a href="homepage.php">Click here to return to Hompage</a></p>	
</body>
</html>