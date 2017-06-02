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
			function checkRePassword(document) {	
				var pwd = document.getElementById("password");
				var pwd_msg = document.getElementById('pwd_msg');
				var repwd = document.getElementById("rePassword");	  
				if (pwd.value != repwd.value) {
					pwd_msg.innerHTML = "The two passwords are not the same. Please re-enter both now";
					repwd.value = "";
					pwd.focus();
					return false;
				}
				else {
					pwd_msg.innerHTML = "";  
				}	  
				return true;
			}	

			function validateInfo(document) { 
				if (checkRePassword(document))
				{ 
					return true;
				}
				return false;
			}	
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
                <form action="registration_process.php" method="post">
					<table border="0">
						<tr>
							<td align="right">* ID:</td>
							<td><input type="number" id="userid" name="userid" required></td>
						</tr>
						<tr>
							<td align="right">* Type:</td>
							<td>
								<select id="type" name="type">
									<option value="faculty">Faculity</option>
									<option value="student">Student</option>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">* First name:</td>
							<td><input type="text" name="fname" id="fname" required></td>
						</tr>
						<tr>
							<td align="right">* Last name:</td>
							<td><input type="text" name="lname" id="lname" required></td>
						</tr>
						<tr>
							<td align="right">* Phone number:</td>
							<td><input type="tel" pattern="^\d{10}$" name="pnumber" id="pnumber" required></td>
						</tr>
						<tr>
							<td align="right">* Email:</td>
							<td><input type="email" name="email" id="email" required></td>
						</tr>
						<tr>
							<td align="right">* DOB:</td>
							<td><input type="date" name="dob" id="dob" required></td>
						</tr>
                        <tr>
							<td align="right">* Course:</td>
							<td>
                            	<select id="courses" name = "courses">
                                	<option value="1">MIT</option>
                                    <option value="2">MBA</option>
                                    <option value="3">MITHM</option>
                                    <option value="4">MA</option>
                            	</select>
                            </td>
						</tr>
                        <tr>
							<td align="right">* Department:</td>
							<td>
                            	<select id="dept" name="dept">
                                	<option value="101">IT</option>
                                    <option value="103">BM</option>
                                    <option value="102">HM</option>
                                    <option value="104">Accounting</option>
                            	</select>
                            </td>
						</tr>
						<tr>
							<td align="right">* Password:</td>
							<td><input type="password" id="password" name="password" required></td>
							<td id="pwd_msg" style="color:red;"></td>
						</tr>
						<tr>
							<td align="right">* Re-try:</td>
							<td><input type="Password" id="rePassword" name="rePassword" onChange="checkRePassword(document)"></td>
						</tr>
						<tr>
							<td align="right"><input type="submit" name="submit" value="Submit" onClick="return validateInfo(document)"></td>
							<td><input type="reset" name="reset" value="Clear"></td>
						</tr>
					</table> 
				</form>
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
<?php
	if(isset($_SESSION['invalid']))
		unset($_SESSION['invalid']);
?>