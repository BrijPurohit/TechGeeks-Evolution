<?php
session_start();
			
 include ("try_header.html");
 if (isset($_SESSION['user_id']))
  {
  	 echo"
		<div id='login_div'>
		
		Welcome..{$_SESSION['user_id']}!
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='style1' href=\"logout.php\">Logout</a>
		</div>";
	}
  ?>