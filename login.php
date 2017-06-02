<?php
	session_start();
	include 'config.php';
	if (isset($_SESSION['userid']) && !empty($_SESSION['userid']))
		header("location: index.php");
	if (isset($_POST['userid'])&&isset($_POST['password'])&&isset($_POST['type']))
	{
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$type = $_POST['type'];
		$conn = db_connect();
		echo "$type";
		if ($type == 'student')
		{
			$sql = "select * from student_id where student_id='$userid' and password = '$password'";
			echo "$sql";
		}
		if ($type == 'faculty')
		{
			$sql = "select * from faculity_id where faculity_id='$userid' and password = '$password'";	
			echo "$sql";
		}
		if($query_result = $conn -> query($sql))
		{
			$num_rows = $query_result -> num_rows;
			if($num_rows == 0)
			{
				header("location: login.php");
				$_SESSION['invalid'] = 'invalid';
			}
			else
			{
				$_SESSION['userid'] = $userid;
				if ($type == 'student')
				{
					$_SESSION['user_type'] = 'student';
				}
				if ($type == 'faculty')
				{
					$_SESSION['user_type'] = 'faculty';
				}
				if($_SESSION['invalid'] == 'sell')
					header('Location: sell_books.php');
				else if($_SESSION['invalid'] == 'buy')
					header('Location: buybook.php');
				else
					header("location: index.php");
			}
		}
		else
		{
			header('Location: login.php');
			$_SESSION['invalid'] = 'invalid';
		}
		$conn -> close();
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>JCUB Book Store</title>
        <link href="http://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="styles/main.css" />
        <link href="styles/responsive.css" rel="stylesheet"  media="screen and (max-width: 960px)">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <script>
	function run_first() {
		var id_var = sessionStorage.li_id;
		if(id_var){
			document.getElementById(id_var).style.backgroundColor="#CDCCB7";
		}	
	}
	function nav_li_selected(li_id){
		for(i=0;i<6;i++){
			document.getElementById(i.toString()).style.backgroundColor="";
		}
		document.getElementById(li_id.toString()).style.backgroundColor="#CDCCB7";
		sessionStorage.li_id = li_id.toString();	
	}
</script>
    </head>
    
    <body onLoad="run_first()">
        <div class="wrapper">
            <header>
                <table>
                <tr><td><img src="images/logo.png"></td><td><p>JCUB Book Store</p></td></tr>
                </table>
               
            </header>
            <nav>
                <ul>
                    <li><a href="index.php" id="0" onClick="nav_li_selected(0)">Home</a></li>
                    <li><a href="register.php" id="1" onClick="nav_li_selected(1)">Register</a></li>
                    <li><a href="buybook.php" id="2" onClick="nav_li_selected(2)">Buy Books</a></li>
                    <li><a href="sell_books.php" id="3" onClick="nav_li_selected(3)">Sell Books</a></li>
                    <li><a href="aboutus.php" id="4" onClick="nav_li_selected(4)">About US</a></li>
                    <li><a href="contactus.php" id="5" onClick="nav_li_selected(5)">Contact US</a></li>
                </ul>
            </nav>
            <div id ="content-wrapper">
                <form action = "login.php" method = "post">
				<input type = "number" name = "userid" id = "userid" placeholder = "Student/Faculty ID" />
				<input type = "password" name = "password" id = "password" placeholder = "Password" />
                <select name="type">
                	<option value="faculty" selected>Faculty</option>
                   	<option value="student">Student</option>
                </select>
				<input type = "submit" value = "Login" />
				</form>
                <?php
					if(isset($_SESSION['invalid']) && !empty($_SESSION['invalid']) && $_SESSION['invalid'] == 'invalid')
						echo "<p style=\"color:red\">Invalid login credentials. Try again...</p>";
					else if($_SESSION['invalid'] == 'sell')
						echo "<p style=\"color:red\">Please login before you sell books..</p>";
					else if($_SESSION['invalid'] == 'buy')
						echo "<p style=\"color:red\">Please login before you buy books..</p>";
                ?>
				<p>Not a Member<a href = "register.php">Click Here</a> to register</p>
            </div>
    <footer>
<div id="links-wrapper">
					<section id = "col3" class="footer-links-wrapper">
						<h4>Internal Links</h4>
                        <ul>
						<li><a href = "index.php">Home</a></li>
						<li><a href = "register.php">Register</a></li>
						<li><a href = "buybook.php">Buy Books</a></li>
						<li><a href = "sell_books.php">sell Books</a></li>
                        </ul>
					</section>
					<section id = "col4" class="footer-links-wrapper">
						<h4>External & Social Links</h4>
                        <ul>
                        <li><a href = "http://www.jcub.edu.au/" target="_blank">JCU Home Page</a></li>
                        <li><a href="https://www.facebook.com/jamescookuniversity" target="_blank">Facebook</a></li>
                        </ul>
					</section>
					<section id = "col5" class="footer-links-wrapper">
						<h4>Other Links</h4>
                        <ul>
						<li><a href = "aboutus.php">About us</a></li>
						<li><a href = "contactus.php">Contact us</a></li>
                        </ul>
					</section>
				</div>
				<div id = "copyright-wrapper">
					<p>&#169; Team Awesome (01) March 2017</p>
				</div>
</footer>
        </div>
    </body>
</html>
