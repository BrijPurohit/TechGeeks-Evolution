
<label for ="Username">
<span>Username:<b class="style1">*</b></span>
<input type="text" name="username" value="<?php
  echo (isset($_POST['username'])) ?
htmlspecialchars($_POST['username']) : '';
  ?> "/>
</label>
<label for ="password">
<span>Password:<b class="style1">*</b></span>
<input type="password" name="pass" value="" />
</label>
</fieldset>
<div id="button_signin">
<input type="submit" name="submit" value="Sign in" />
<input type="submit" name="submit1" value="Cancel" />
</div>
 <input type="checkbox" name="remember_me" />
 Remember me..
<span class="style2"> [It may hamper your privacy on public system.]</span>
<hr color="#5B99E3" />
not a member yet<a href="notamember1.php"> CLICK HERE </a>to join now..
</form>
</div>


</form>
</div>
<?php
include ("includes/footer.html");
?>

<?php

	if(isset($_POST['submit']))
		{
		if(trim($_POST['username'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Your Username.');</script>";
	exit;
			}
	 elseif(trim($_POST['pass'])=='')
		 {
		 echo"<script langugae='javascript'>alert('Please enter your password.');</script>";
		 exit;
		 }
		$pass=md5($_POST['pass']);		
	    $pass1=trim($_POST['username']);
	
	 
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech") or die ("cannot connect to db");
		
	$validate=sprintf("select pass && username
								from login_detail 
								where  pass='%s'&& username='%s'",mysql_real_escape_string($pass),mysql_real_escape_string($pass1))or die("cannot find");
		echo $validate;
	$validate1=mysql_query($validate)or die("cannot find");
			$row=mysql_num_rows($validate1);
			
			if($row)
			{
				session_start();
				$_SESSION['user_id'] =$_POST['username'];
				
				 echo"<script language='javascript'>document.location.href='index.php';</script>";
					 exit();
			}
			
			
		   while($row)
		   {
				echo"<script language='javascript'>document.location.href='index.php';</script>";
				exit;
			}
			
				
										
					 echo"<script langugae='javascript'>alert('Sorry..!! Try again with correct password and username. ');</script>";
					exit;
				}	
		   
		   
		   
		
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='index.php';</script>";
			}
			
			
?>