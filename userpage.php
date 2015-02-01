<?php
session_start();
$page_title = "Profile Page";

 include ("includes/header.html");
 
  
  
if (!isset($_SESSION['user_id']))
  {
  		echo"<div id='main_content'>";
 	 	echo"not logged in ,,, login kar pehle.....";
		echo"</div>";
   }

 else
  {
     echo"
		<div id='login_div'>
		
		Welcome..{$_SESSION['user_id']}!
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"logout.php\">Logout</a>
		</div>";
	}
	
	
	include ("includes/footer.html");
	exit();
?>

