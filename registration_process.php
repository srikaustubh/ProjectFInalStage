<?php
include_once('config.php');

if(isset($_POST['id'],$_POST['type'],$_POST['fname'],$_POST['lname'],$_POST['initial'],$_POST['pnumber'],$_POST['email'],$_POST['dob'] , $_POST['password'])) {
	$id=$_POST['id'];
	$type=$_POST['type'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$initial=$_POST['initial'];
	$pnumber=$_POST['pnumber'];
	$email = $_POST['email'];
	$dob=$_POST['dob'];
	$password = $_POST['password'];
	//make the database connection
	$conn  = db_connect();
	//create an insert query 
	if ($type="Faculity"){	
	$sql = "insert into faculity_id (FACULITY_ID, FACULITY_FNAME, FACULITY_LNAME, FACULITY_INITIAL, FACULITY_EMAIL, FACULITY_DOB, FACULITY_PHONE, PASSWORD) 
			VALUES ('$id', '$fname', '$lname','$initial', '$email','$dob','$pnumber' , '$password')";
	
	}
	else
	{
		$sql = "insert into student_id (STUDENT_ID, STUDENT_FNAME, STUDENT_LNAME, STUDENT_INITIAL,STUDENT_EMAIL, STUDENT_DOB, STUDENT_PHONE, PASSWORD) 
			VALUES ('$id', '$fname', '$lname','$initial', '$email','$dob','$pnumber' , '$password')";
		}
	//execute the query
	if($conn -> query($sql))
	{
		
		echo "Hi <b>$fname</b><br />";
		echo "<a href=\"login.php\">You can login now</a>";
	}
	$conn -> close();		
}
else {
	die("Input error");
}
?>
