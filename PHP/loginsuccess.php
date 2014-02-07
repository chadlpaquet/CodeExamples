<!--
Program Title:		loginsuccess.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to show the user they logged in
					successfully.
-->
<!DOCTYPE html>
<html>
<head>
	<?php session_start(); ?>
	<title>Login Successful</title>
	<style>
	h1 {text-align:center;}
	body {background-color:yellow;}
	p {text-align:center;}
	fieldset
	{
		width: 500px;
		margin:auto;
		text-align:center;
	}
	</style>
</head>
<body>
	<h1>You have successfully logged in!</h1>
	<? 
		$userName = $_SESSION['username'];
		echo $userName;
		$_SESSION['username'] = $userName;
	?>
	<p><a href="homepage.php">Click here to return to Hompage</a></p>	
</body>
</html>