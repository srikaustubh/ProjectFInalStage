<?php
	if (isset($_POST['userid'])&&isset($_POST['password'])&&isset($_POST['type']))
	{
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$type = $_POST['type'];
		$conn = db_connect();
		if ($type = 'student')
		{
			$sql = "select * from student_id where student_id='$userid' and password = '$password'";	
		}
		if ($type = 'faculty')
		{
			$sql = "select * from faculity_id where faculity_id='$userid' and password = '$password'";	
		}
		if($query_result = $conn -> query($sql))
		{
			$num_rows = $query_result -> num_rows;
			if($num_rows = 0)
				echo "invalid credentials. <a href=\"login.php\">Login</a>";
			else
				$_SESSION['user_id'] = $userid;
				header("location: index.php");
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
    </head>
    
    <body>
        <div class="wrapper">
            <header>
                <table>
                <tr><td><p>JCUB Book Store</p></td></tr>
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
				<p>Not a Member<a href = "register.php">Click Here</a> to register</p>
            </div>
            <footer>
                <div id="links-wrapper">
					<section id = "col3">
						<h4>Internal Links</h4>
						<li><a href = "index.html">Home</a></li>
						<li><a href = "register.html">Register</a></li>
						<li><a href = "buybooks.html">Buy Books</a></li>
						<li><a href = "sellbooks.html">sell Books</a></li>
					</section>
					<section id = "col4">
						<h4>External & Social Links</h4>
					</section>
					<section id = "col5">
						<h4>Other Links</h4>
						<li><a href = "aboutus.html">About us</a></li>
						<li><a href = "contactus.html">Contact us</a></li>
					</section>
				</div>
				<div id = "copyright-wrapper">
					<p>&#169; Team Awesome (01) March 2017</p>
				</div>
            </footer>
        </div>
    </body>
</html>