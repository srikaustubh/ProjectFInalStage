<?php
session_start();
include_once('config.php');

if(isset($_POST['bookname'],$_POST['bookdesc'],$_POST['authorname'],$_POST['bookprice'])) {
	$bookname=$_POST['bookname'];
	$bookdesc=$_POST['bookdesc'];
	$authorname=$_POST['authorname'];
	$bookprice=$_POST['bookprice'];
	
	//make the database connection
	$conn  = db_connect();
	//create an insert query 
	if (isset($_SESSION['userid']) && !empty($_SESSION['userid']))
	{
		if ($_SESSION['user_type'] == 'student')
		{
			$userid = $_SESSION['userid'];
			$sql = "insert into book (book_title,book_desc,book_price,book_author,student_id) 
				VALUES ('$bookname', '$bookdesc', '$bookprice','$authorname','$userid')";
		}
		else 
		{
			$userid = $_SESSION['userid'];
			$sql = "insert into book (book_title,book_desc,book_price,book_author,faculity_id) 
				VALUES ('$bookname', '$bookdesc', '$bookprice','$authorname','$userid')";
		}
		
		if($conn -> query($sql))
		{
			
			echo "one book added successfully";
			header("Location: buybook.php ");
			
		}
		else
			echo "error: ".$conn->error;
	}
	else 
	{
		$_SESSION['invalid']='sell';
		header('Location: login.php');	
	}
	$conn -> close();		
}
else {
	die("Input error");
}
?>
