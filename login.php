<?php
//must appear BEFORE the <html> tag
session_start();
include_once('config.php');	

if( isset($_POST["username"])&& isset($_POST["username"]) )
{
	$username = $_POST["username"];
		
	$password = $_POST["password"];
	
	if ($username && $password)
	{
	  // if the user has just tried to log in
	
	  //make the database connection
	  $conn  = db_connect();	
	  
	  //make a query to check if user login successfully
	  $sql = "select * from users where username='$username' and password='$password'";
	  $result = $conn -> query($sql);
	  $numOfRows = $result -> num_rows;

	  if ($numOfRows)
	  {
		// login successfully, keep the user's email
		$_SESSION['valid_user'] = $username;
	  }
	  $conn -> close();
	}
}
if (isset($_SESSION['valid_user']))
{
  header("location: about_us.php");  
}
else
{
  if (isset($username))
  {
    // if user tried and failed to log in
    echo "<b>Incorrect - Please try it again </b><br>";
	echo "<a href=\"login.html\">Sign-up</a><br>";
  }
  else 
  {
    // user has not tried to log in yet or has logged out
    echo "<b>You are not logged in</b><br>";
  }
}

?>





