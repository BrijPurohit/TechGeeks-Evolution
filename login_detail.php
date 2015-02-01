<?php
$page_title = "Login_Detail";
 include ("includes/try_header.html");
 ?>

 <div id="main_content1">
<div id="form">
<form id="notamember" action="login_detail.php" method="post">

  <div align="left"><strong><span class="style3">Login Details:-</span></strong>  </div>
 <hr />
 <p align="left" class="style1">

Please register a free account, before you can start posting your articles nd query. Registration is quick and free! Please note that fields marked * are required.
<p>
  <fieldset>
<label for ="Username">
<span>Username:<b class="style1">*</b></span>
<input type="text" name="username" value=''<?php
  echo (isset($_POST['username'])) ?
htmlspecialchars($_POST['username']) : '';
  ?> " />
</label>
<label for ="emailid">
<span>E-mail id:<b class="style1">*</b></span>(<b class="style1">e.g: xyz@abc.com</b>)
<input type="text" name="email" value="<?php
  echo (isset($_POST['email'])) ? htmlspecialchars($_POST['email']) : '';
  ?> " />
</label>
<label for ="password">
<span>Password:<b class="style1">*</b></span>
<input type="password" name="pass" value="" />
</label>
<label for ="repassword">
<span>Retype Password:<b class="style1">*</b></span>
<input type="password" name="pass1" value="" />
</label>

</fieldset>
<div id="button">
  <div align="center">
  <input type="submit" name="submit" value="Register" />
  <input type="submit" name="submit1" value="Cancel" />
  </div>
</div>
</form>
</div>
</div>
<?php
 include("includes/footer.html");
 ?>

<?php
		

	if(isset($_POST['submit']))
		{
		
		if(trim($_POST['username'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Your Username.');</script>";
	exit;
			}
	elseif(trim($_POST['email'])=='')
			{
		echo "<script language='javascript'>alert('Please enter your email address ');</script>";
	exit;
			}
	/*elseif(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['email'])) 
								   { 
                                     echo "<script language='javascript'>alert('E-mail address is not in proper format!');</script><br />";
									 exit;
                                             }*/
	 elseif(trim($_POST['pass'])=='')
		 {
		 echo"<script langugae='javascript'>alert('Please enter your password.');</script>";
		 exit;
		 }
	 elseif(trim($_POST['pass1'])=='')
		 {
		 echo"<script langugae='javascript'>alert('Please conform correct password.');</script>";
		 exit;
		 }
	  elseif(($_POST['pass'])!=($_POST['pass1']))
		 {
		 echo"<script langugae='javascript'>alert('Please conform same password.');</script>";
		 exit;
		 }
		 
			$enc_pass=md5($_POST[pass]);
		$name=trim($_POST['username']);
		$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech", $con) or die ("cannot connect to db");
		$namecheck=mysql_query("select *  from login_detail where username='$name'") or die("namecheck error");
			$count=mysql_num_rows($namecheck);
		if($count!=0)
				{
				
			 echo"<script langugae='javascript'>alert('ERROR - The username already exists. Please try again with different username.');</script>";
		 exit;
			}
			
		 
		 $con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech", $con) or die ("cannot connect to db");
	
	$insert=  "insert into login_detail
		values('$name','$_POST[email]','$enc_pass','$_POST[pass1]')";
		$result=mysql_query($insert) or die("Error in insertion");
		echo "<script language='javascript'>alert('You have been registered now to TechGeeksEvolution Group');</script>";
		echo "<script language='javascript'>document.location.href='contact_us.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
			 echo "<script language='javascript'>document.location.href='contact.php';</script>";
			 exit;
			}
	
			
?>