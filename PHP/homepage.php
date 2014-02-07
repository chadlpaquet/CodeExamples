<!--
Program Title:		homepage.php
Class:				CIS-2286
Programmer:			Chad Paquet
Date:				10/14/2013
Description:		PHP page to show the current comments in the guestbook,
					this will show the user who posted, the date and time,
					the title of the post, and the comment itself.
-->
<!DOCTYPE html>
<html>
<head>
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
		
		//set error reporting level so that a notice doesn't appear when database is empty
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		
		//set time zone for date time
		date_default_timezone_set('Canada/Atlantic');
		
	?>
	<title>Guestbook</title>
	<style>
	h1 {text-align:center;}
	body {background-color:yellow;}
	p {text-align:center;}
	fieldset
	{
		width: 300px;
		margin:auto;
	}
	</style>
</head>
<body>
	<h1>GuestBook</h1>
	<hr>
	<form action="add-comment.php" method="post">
	<?php
		//check to see if someone is logged in by checking the session, diplay proper top msg
		//depending if user is logged in or not, do not allow creation of new comment if not
		//logged in.
		if (isset($_SESSION['username']))
		{
			$loggedUser = $_SESSION['username'];
			$datetime = date("F j, Y  g:i a");
			$_SESSION['date'] = $datetime;
			
			echo "<p>Welcome ". $loggedUser ."! Please enter your comment below.</p>
				 <fieldset>
					Title:&nbsp;<input type=\"text\" name=\"title\" required /><br /><br />
					Comment:<br />
					<textarea name=\"comment\" rows=\"10\" cols=\"40\" required></textarea><br />
					<input type=\"submit\" value=\"Post Comment\" />
				 </fieldset>
				 <p><a href=\"logout.php\">Click here to Logout</a></p>
				 <hr>";
		}
		else
		{
			echo "<p>You have to be <a href=\"login.php\">logged in</a> to comment on this page.
				 If you don't have an account you can always <a href=\"registration.php\">register here</a>.</p>";
		}
		
		echo "</form>";
		
		//Displayed any comments that are already stored in the database.
		$result = mysqli_query($mysqli,"SELECT * FROM guestbook");

		while($row = mysqli_fetch_array($result))
		{
			echo "<fieldset>
					". $row['title'] ."<br />
					Posted by ". $row['username'] ." on ". $row['dateandtime'] ."<br /><br />
					". $row['message'] ."
				 </fieldset>";
		}

		mysqli_close($mysqli);
	?>
</body>
</html>
		
		
	