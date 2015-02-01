<?php
$page_title = "admin_article.php";
include ("includes/login_div.php");
?>

     <div id="form">
  <form id="notamember" action="admin_article.php" method="post">
<div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="submit_query_to_techgeeksevolution.php">Submit Query:</a></span></span>
  <hr  />  
</div>
<br />

<fieldset>
  <label for ="article">
<span>Your Article:<b class="style1">*</b></span>
<textarea cols="" rows="10" name="article"><?php
  echo (isset($_POST['article'])) ?
htmlspecialchars($_POST['article']) : '';
  ?>  </textarea>
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
include("count.php");
?>
<?php
if(isset($_POST['submit']))
		{
		while(trim($_POST['article'])=='')
			{
	echo "<script language='javascript'>alert('Please Enter Your Name.');</script>";
	exit;
			}
			
		
		
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech", $con) or die ("cannot connect to db");
	
	$insert=  "insert into admin_article
		values('$_POST[article]')";
		$result=mysql_query($insert) or die("Error in insertion");
		echo "<script language='javascript'>alert('You ADMIN Article is submitted');</script>";
		echo "<script language='javascript'>document.location.href='admin_article.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='admin.php';</script>";
			}
			
?>
