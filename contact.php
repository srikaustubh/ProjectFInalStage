<?php
session_start();
include_once('config.php');
if (isset($_POST['name'],$_POST['email'],$_POST['desc']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$desc = $_POST['desc'];
	$conn = db_connect();
	$sql = "insert into message (name,email_id,message_content) VALUES ('$name','$email','$desc')";
	if($conn -> query($sql))
	{
		$_SESSION['contact'] = 'done';
		header('Location: contactus.php');
	}
	else
	{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn -> close();	
}	
else 
{
	die("Input error");
}
?>