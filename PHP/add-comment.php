<!--
Program Title:		add-comment.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to add the comment to the guestbook table.
-->
<?php
	//start session
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
	
	//get logged in users username and the date and time that the arrived on the homepage
	$username = $_SESSION['username'];
	$datetime = $_SESSION['date'];
	
	//clean posted values
	$title = clean($_POST['title']);
	$comment = clean($_POST['comment']);
	
		$query = "insert into guestbook values
			 ('".$title."', '".$comment."', '".$username."', '".$datetime."')";
		
		$result = $mysqli->query($query);
				
	//Verify successful add or return error if add did not complete
	if ($result) 
	{
		header("location: homepage.php");
	} 
	else 
	{
		echo "An error has occurred.  The item was not added.";	
	}
	?>
	