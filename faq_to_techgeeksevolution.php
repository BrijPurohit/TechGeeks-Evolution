<?php
 $page_title = "FAQ";
 include ("includes/login_div.php");
 ?>




  <div id="left_bar"></div>
<div id="main_content">
<p>&nbsp;
<p>&nbsp;
</p>
</p>
<div  align="left"><span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="faq_to_techgeeksevolution.php">Frequently Asked Question To TechGeeksEvolution:</a></span></span></div>
<hr />
 
  <div id="message_box">
  
     <span class="style3"><p  align="justify">Following are some frequently asked problems with solutions. We request you to take a look at this FAQ list before <a href="submit_query_to_techgeeksevolution.php"><b>submitting your query</b></a>.</p>
     <p><b><br />Some of the questions are here:-</b></p></span>
  <div id="comment_form">
    <?php
$connection = mysql_connect('localhost', 'root', '') or die ('Unable to connect!');
mysql_select_db('tech') or die ('Unable to select database!');
$query = 'SELECT * FROM faq';
$result = mysql_query($query) or die ('Error in query');
if (mysql_num_rows($result) > 0)
{
echo'';
while($row = mysql_fetch_row($result))
{
echo'<div id="comment_3">'
. $row[0] .'</div>';

echo'<div id="comment_2">'
. $row[3] .'</div>';
echo'<div id="comment_1" align="right">'
. $row[2] .'</div>';
echo'<hr/>';
}
}
else
{
echo'No Entry Yet';
}
mysql_free_result($result);
mysql_close($connection);
?>
</div>


</div>
<div id="answers">
<p><strong><span style="color: rgb(0, 128, 0);"> Whenever I double-click on any drive/folder in My Computer, a Search window opens.</span></strong></p>
<p><strong>Sol:</strong> Open regedit and goto following keys one by one:</p>
<blockquote><p>HKEY_CLASSES_ROOT\Directory\shell<br>
HKEY_CLASSES_ROOT\Drive\shell</p></blockquote>
<p>In right-side pane, delete the "<strong>Default</strong>" key. If it doesnt work then delete the key "<strong>find</strong>" under both.</p>
<p style="text-align: center;">--------------------------------------------------</p>
</div>
<form  action="faq_to_techgeeksevolution.php" method="post">
<input type="submit" name="submit" value="Post your query"/>
<?php
if(isset($_POST['submit']))
{
echo "<script language='javascript'>document.location.href='submit_query_to_techgeeksevolution.php';</script>";
}
?>
</form>


</div>
<div id="right_bar">    </div>
  

 <?php
 include("includes/footer.html");
 ?>

 
