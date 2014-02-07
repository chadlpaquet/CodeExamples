<!--
Program Title:		login.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to get info to pass to the
					login page.
-->
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
	<h1>Please Login to Access Guestbook</h1>
	<hr>
	<form action="login-check.php" method="post" />
		<fieldset>
			<legend>Please Sign In Below</legend>
			Username:<input type="text" name="uname" required />&nbsp;
			Password:<input type="password" name="pword" required /><br /><br />
			<input type="submit" value="Login" />
		</fieldset>
		<p><a href="registration.php">Don't have an accout? Click here to register!</a></p>
	</form>
</body>
</html>	