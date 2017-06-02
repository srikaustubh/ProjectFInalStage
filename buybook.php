<?php 

	session_start();
	include_once('config.php');
	if (!isset($_SESSION['userid']) || empty($_SESSION['userid']))
	{
		$_SESSION['invalid']='buy';
		header('Location: login.php');
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
<tr><td><img src="images/logo.png"></td><td><p>JCUB Book Store</p></td><td style="text-align:right;">
<?php
	if (isset($_SESSION['userid']))
  	{
		echo "logged in as " . $_SESSION['userid'] . "<br/> <a href = \"logout.php\">Logout</a>"; 
  	}
	else 
	{
		echo "<a href=\"login.php\" style=\"text-align:right;\">login</a></td><td><a href=\"register.php\">Register</a>";
	}
?> </td></tr>
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
<li></li>
</ul>
</nav>
 <div id ="content-wrapper">

<h1>Show Books</h1>
<?php
//make the database connection
$conn  = db_connect();

//create and execute a query
$sql = "SELECT book_title,book_author,book_desc,book_price FROM book;";
$result = $conn -> query($sql);

print "<table border = 1>\n";

//get field names
print "<tr>\n";
while ($field = $result -> fetch_field())
{
  print "<th>" . strtoupper($field->name) . "</th>\n";
} // end while
print "</tr>\n\n";

//get row data as an associative array
while ($row = $result -> fetch_assoc()){
  print "<tr>\n";
  //look at each field
  foreach ($row as $col=>$val){
    print "  <td>$val</td>\n";
	
  } // end foreach
   echo "  <td><input type=\"submit\" value=\"Buy\"></td>\n";
  print "</tr>\n\n";
}// end while

print "</table>\n";
$conn -> close();
?>
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
