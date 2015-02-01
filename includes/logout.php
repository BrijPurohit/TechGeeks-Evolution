<?php
 $page_title = "Logout!";
 session_start(); 
 include ("includes/header.html");
?>
<?php

if (!isset($_SESSION['user_id']))
 {
 /*$url = absolute_url();
 header("Location: $url");
 exit();*/
 }
 else 
 {
 $_SESSION = array();
 session_destroy(); 
 }
 echo"<div id='form_signin'>
<form id='notamember' action='login_form.php' method='post'>
<div align='left'>
<span class=' style3'><strong>Login form :-</strong></span>
<hr color='#5B99E3'  />
</div>
<fieldset>";
echo "<p align='left' class='style1'>You are now logged out! To login again, please re-enter your detail.</p> ";
 ?>
 
  
    <?php
	include ("includes/login.php");
?>

