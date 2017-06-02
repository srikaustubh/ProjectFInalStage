<?php
include_once('config.php');
if (isset($_POST['userid'],$_POST['type'],$_POST['fname'],$_POST['lname'],$_POST['pnumber'],$_POST['email'],$_POST['dob'] , $_POST['password']))
{
	$userid = $_POST['userid'];
	$type=$_POST['type'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$pnumber=$_POST['pnumber'];
	$email = $_POST['email'];
	$dob=$_POST['dob'];
	$password = $_POST['password'];
	$conn = db_connect();
	if ($type == 'student')
	{
		$course_id = (int) $_POST['courses'];
		$sql = "insert into student_id VALUES ('$userid', '$fname', '$lname', '$pnumber','$email','$dob','$password','$course_id')";

		
	}
	if ($type == 'faculty')
	{
		$dept_id = (int) $_POST['dept'];
		$sql = "insert into faculity_id VALUES ('$userid', '$fname', '$lname','$pnumber' ,'$email','$dob','$password','$dept_id')";
	}
	if($conn -> query($sql))
	{
		echo "Hi <b>$fname</b><br />";
		echo "<a href=\"login.php\">You can login now</a>";
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