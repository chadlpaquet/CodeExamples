<!--
Program Title:		registration.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to get info to pass to the
					registration page.
-->
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<style>
	h1 {text-align:center;}
	p {text-align:center;}
	body {background-color:yellow;}
	fieldset
	{
		width: 500px;
		margin:auto;
		text-align:center;
	}
	</style>
</head>
<body>
	<h1>Registration</h1>
	<hr>
	<form action="register-user.php" method="post" />
		<fieldset>
			<legend>Fill Out the Following Fields</legend>
			Username:<input type="text" name="newUser" required /><br />
			*Must be between 1 to 20 charaacters<br /><br />
			Password:<input type="password" name="newPass" required /><br />
			*Must be between 1 to 40 characters<br /><br />
			<input type="submit" value="Register" />
		</fieldset>
		<p><a href="homepage.php">Return to Homepage</a></p>
		<p><a href="login.php">Return to Login Page</a></p>
	</form>
</body>
</html>