<?php
$page_title = "Article_Submission.php";
include ("includes/login_div.php");
?>


 
  <div id="form">
  <form id="notamember" action="article_submission.php" method="post">
<div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="article_submission.php">Article Submission:</a></span></span>  
  <hr  />  
</div>
<br />
<p align="justify">You could submit your articles which will be published with your names in website in <a href="tech_eye.php">tech eye</a> section after reviewing by the us. We request you to submit 
<fieldset>
<label for="name">
<span>Your Name :<b class="style1">*</b></span>
<input type="text" name="name"  value="<?php
  echo (isset($_POST['name'])) ?
htmlspecialchars($_POST['name']) : '';
  ?> "  />
</label>
<label for="profession">
<span>Profession:<b class="style1">*</b></span>
<select name='prof'>
            			<option value=''>--select--</option>
                        <option>Web/Software Developer</option>
            			<option>College Student</option>
                        
            			<option>School Student</option>
                        <option> Teacher</option>
                        <option>Other</option>
                       </select>
</label>
<label for="website">
<span>Website:</span>
<input type="text" name="website" value="<?php
  echo (isset($_POST['website'])) ?
htmlspecialchars($_POST['website']) : '';
  ?> " />

</label>

<label for ="emailid">
<span>E-mail id:<b class="style1">*</b></span>
<input type="text" name="email" value="<?php
  echo (isset($_POST['email'])) ?
htmlspecialchars($_POST['email']) : '';
  ?> " />
</label>

<label for ="article">
<span>Article:<b class="style1">*</b></span>
<textarea cols="" rows="7" name="article"><?php
  echo (isset($_POST['article'])) ?
htmlspecialchars($_POST['article']) : '';
  ?>  </textarea>
</label>
<label for ="member">
<span>Are U member:<b class="style1">*</b></span>
<select name='member'>
            			<option value=''>--select--</option>
            			<option>yes already a member !</option>
            			<option>no not yet !</option>
                       
                       </select>
</label>

</fieldset>
<div id="button">
  <div align="center">

<input type="submit" name="submit" value="Submit Article" />
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
		if(trim($_POST['name'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Your Name.');</script>";
	exit;
			}
	elseif(trim($_POST['prof'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Your Profession.');</script>";
	exit;
			}
	elseif(trim($_POST['email'])=='')
			{
		echo "<script language='javascript'>alert('Please enter your email address ');</script>";
	exit;
			}			
		
	/*elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email'])) 
								   { 
                                     echo "<script language='javascript'>alert('E-mail address:-".$_POST['email']." is not in proper format!');</script><br />";
									 exit;
                                             }*/
	elseif(trim($_POST['article'])=='')
			{
	echo "<script language='javascript'>alert('Your article is required');</script>";
	exit;
			}
	elseif(trim($_POST['member'])=='')
			{
	echo "<script language='javascript'>alert('Your membership status is required');</script>";
	exit;
			}
			
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech", $con) or die ("cannot connect to db");
	
	$insert=  "insert into article_submission
		values('$_POST[name]','$_POST[prof]','$_POST[website]','$_POST[email]','$_POST[article]','$_POST[member]')";
		$result=mysql_query($insert) or die("Error in insertion");
		echo "<script language='javascript'>alert('You article is submitted to TechGeeksEvolution Group');</script>";
		echo "<script language='javascript'>document.location.href='index.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='index.php';</script>";
			}
			
?>

