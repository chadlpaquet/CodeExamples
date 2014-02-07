<!--
Program Title:		login-check.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to check the info and compare it
					to the users table.
-->
<?php
	//Start session
	session_start();
	
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
	$username = clean($_POST['uname']);
	$password = clean($_POST['pword']);
	
	//check for existing username and password
	$query = "select count(*) from users where username='".$username."' and password=sha1('".$password."')";
	$result = $mysqli->query($query);
	
	$row = $result->fetch_row();
	
	//compare data in table to entered data
	if ( $row[0] == 1 ) 
	{
		$_SESSION['username'] = $username;
		header("location: loginsuccess.php");
	}
	else
	{
		header("location: loginfail.php");
	}
?>
