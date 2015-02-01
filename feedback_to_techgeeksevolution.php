<?php
$page_title = "Feedback_To_techgeeksevolution";
include ("includes/login_div.php");
?>


 
  <div id="form">
  <form id="notamember" action="feedback_to_techgeeksevolution.php" method="post">
<div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="feedback_to_techgeeksevolution.php">Feedback:</a></span></span>  
  <hr  />  
</div>
<br /><p  align="justify">As this site is under progress (<b>beta version</b>) so your valuable comment are required about work in field for improving this site.</p>
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


<label for ="emailid">
<span>E-mail id:<b class="style1">*</b></span>
<input type="text" name="email" value="<?php
  echo (isset($_POST['email'])) ?
htmlspecialchars($_POST['email']) : '';
  ?> " />
</label>

<label for ="comment">
<span>Comment:<b class="style1">*</b></span>
<textarea cols="" rows="7" name="comment"><?php
  echo (isset($_POST['comment'])) ?
htmlspecialchars($_POST['comment']) : '';
  ?>  </textarea>
</label>

</fieldset>
<div id="button">
  <div align="center">

<input type="submit" name="submit" value="Submit" />
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
			
		
	/*elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email'])) 
								   { 
                                     echo "<script language='javascript'>alert('E-mail address:-".$_POST['email']." is not in proper format!');</script><br />";
									 exit;
                                             }*/
	elseif(trim($_POST['comment'])=='')
			{
	echo "<script language='javascript'>alert('Your comment is required');</script>";
	exit;
			}
	
			
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech", $con) or die ("cannot connect to db");
	
	$insert=  "insert into feedback_submission
		values('$_POST[name]','$_POST[prof]','$_POST[email]','$_POST[comment]')";
		$result=mysql_query($insert) or die("Error in insertion");
		echo "<script language='javascript'>alert('You article is submitted to TechGeeksEvolution Group');</script>";
		echo "<script language='javascript'>document.location.href='contact_techgeeksevolution.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='contact_techgeeksevolution.php';</script>";
			}
			
?>

