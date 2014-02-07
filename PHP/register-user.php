<!--
Program Title:		register-user.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to add the new user to the database
					for validation.
-->
<?php
	//connect to the database
	$mysqli = new mysqli("localhost","cis2288_user","cis2288_password","cis2288");  
	
    if ( $mysqli->connect_error ) 
	{
        die('Connect error ('. $mysqli->connect_errno .') '
        . $mysqli->connect_error);
    } 
	
	//function to clean values recieved from form
	function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc()) 
		{
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//clean posted values
	$username = clean($_POST['newUser']);
	$password = clean($_POST['newPass']);
	
	$query = "insert into users values
			 ('".$username."', sha1('".$password."') )";
	$result = $mysqli->query($query);
				
	//Verify successful add or return error if add did not complete
	if ($result) 
	{
		header("location: registersuccess.php");
	} 
	else 
	{
		echo "An error has occurred.  The item was not added.";
	}
?>
