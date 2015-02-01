<?php
$page_title = "Submit_Query_To_TechGeeksEvolution.php";
include ("includes/login_div.php");
?>

     <div id="form">
  <form id="notamember" action="submit_query_to_techgeeksevolution.php" method="post">
<div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="submit_query_to_techgeeksevolution.php">Submit Query:</a></span></span>
  <hr  />  
</div>
<br /><p  align="justify">
Answers to your query is our priority, we try our best to give you the answer. 
The response to your query will be sent on your e-mail id's. But please check first the <a href="faq_to_techgeeksevolution.php"><b>Frequently Asked Question(FAQ) To TechGeeksEvolution</b></a> for same problem in past to different users.
</p>
<fieldset>
<label for="name">
<span>Your Name:<b class="style1">*</b></span>
<input type="text" name="name"  value="<?php
  echo (isset($_POST['name'])) ?
htmlspecialchars($_POST['name']) : '';
  ?> "  />
</label>

<label for="email">
<span>e-Mail:<b class="style1">*</b></span>(<b class="style1">will not be published</b>)
<input type="text" name="email" value="<?php
  echo (isset($_POST['email'])) ?
htmlspecialchars($_POST['email']) : '';
  ?> " />

</label>

<label for ="date">
<span>Date:<b class="style1">*</b></span>
<input type="text" name="date" value="<?PHP echo date("l d F Y");?>"
  />
</label>

<label for ="query">
<span>Query:<b class="style1">*</b></span>
<textarea cols="" rows="7" name="query"><?php
  echo (isset($_POST['query'])) ?
htmlspecialchars($_POST['query']) : '';
  ?>  </textarea>
</label>
<label for ="topic">
<span>Topic:<b class="style1">*</b></span>
<input type="text" name="topic" value="<?php
  echo (isset($_POST['topic'])) ?
htmlspecialchars($_POST['topic']) : '';
  ?> " />
</label>
</fieldset>
<div id="button">
  <div align="center">

<input type="submit" name="submit" value="Submit Query" />
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
	
	elseif(trim($_POST['email'])=='')
			{
		echo "<script language='javascript'>alert('Please enter your email address ');</script>";
	exit;
			}
	elseif(trim($_POST['query'])=='')
			{
		echo "<script language='javascript'>alert('Please enter your Query ');</script>";
	exit;
			}
	elseif(trim($_POST['topic'])=='')
			{
		echo "<script language='javascript'>alert('Please enter your topic of query ');</script>";
	exit;
			}
	$con = mysql_connect("localhost","root","") or die("cannot connect");
		mysql_select_db("tech", $con) or die ("cannot connect to db");
	
	$insert=  "insert into faq
		values('$_POST[name]','$_POST[email]','$_POST[date]','$_POST[query]','$_POST[topic]')";
		$result=mysql_query($insert) or die("Error in insertion");
		echo "<script language='javascript'>alert('You Query is submitted to TechGeeksEvolution Group');</script>";
		echo "<script language='javascript'>document.location.href='faq_to_techgeeksevolution.php';</script>";	
		mysql_close($con); 
		}
	elseif(isset($_POST['submit1']))
			{
 echo "<script language='javascript'>document.location.href='faq_to_techgeeksevolution.php';</script>";
			}
			
?>
