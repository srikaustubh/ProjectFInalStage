<?php
  session_start();

  echo "<h1>Members only</h1>";

  // check session variable

  if (isset($_SESSION['valid_user']))
  {
    echo "<p>You are logged in as " . $_SESSION['valid_user'] . "</p>";
	header('Location: index.php');   
 }
  else
  {
    echo "<p>You are not logged in.</p>";
    echo "<p>Only logged in members may see this page.</p>";
	header('Location: login.html');   
  }  
?>
