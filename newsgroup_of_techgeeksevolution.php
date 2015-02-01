<?php
$page_title = "Subscribe_Newsgroup";
 include ("includes/login_div.php");
 ?>
 <div id="left_bar">
       <?php 
	  	   include("includes/search.php");
		   ?>
</div>
  <div id="main_content">
      <div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="newsgroup_of_techgeeksevolution.php">Subscribe Newsgroup:</a></span></span></div>
  <hr  />
  <p><br></p>
<p  align="justify">With the emergence of the internet or the World Wide Web, people all over the world have started socializing in the cyber world. 
Social networking in the virtual world is a rage these days. Newsgroups are communities of like-minded people created in the virtual world to share thoughts,
 comment on a particular issue as well as meet new friends. The main motive behind the formation of these groups is socializing and extending the 
 network in the internet domain.
</p>  
<p  align="justify">This newsgroup will sent you <a href="tech_eye.php"> articles</a> and <a href="idea_lab.php">programming codes</a> on your e-mails id's about latest technological advancements.
<form id="notamember" action="newsgroup_of_techgeeksevolution.php" method="post">
<fieldset>
<label for="email">
<span>e-Mail id:</span>
<input type="text" name="email" value="<?php
  echo (isset($_POST['email'])) ?
htmlspecialchars($_POST['email']) : '';
  ?> " />

</label>

</fieldset>
<div id="button">
  <div align="center">

<input type="submit" name="submit" value="Subscribe Newsgroup" />
<input type="submit" name="submit1" value="Cancel" />
</div>
</div>
</form>
</div>
     
    <?php
include ("includes/footer.html");
?>

<?php

if(isset($_POST['submit']))
		{
		if(trim($_POST['email'])=='')
			{
		echo "<script language='javascript'>alert('Please enter your email address ');</script>";
	exit;
			}
		
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech", $con) or die ("cannot connect to db");
	
	$insert=  "insert into newsgroup
		values('$_POST[email]')";
		$result=mysql_query($insert) or die("Error in insertion");
		echo "<script language='javascript'>alert('You are subscribed to TechGeeksEvolution Newsgroup');</script>";
		echo "<script language='javascript'>document.location.href='index.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='index.php';</script>";
			}
			
?>

