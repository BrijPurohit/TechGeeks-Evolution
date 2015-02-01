  <div id="comment_form">
    <?php
$connection = mysql_connect('localhost', 'root', '') or die ('Unable to connect!');
mysql_select_db('tech') or die ('Unable to select database!');
$query = 'SELECT * FROM query';
$result = mysql_query($query) or die ('Error in query');
if (mysql_num_rows($result) > 0)
{
echo'';
while($row = mysql_fetch_row($result))
{
echo'<div id="comment_3">'
. $row[0] .'</div>';
echo'<div id="comment_1">'
. $row[1] .'</div>';
echo'<div id="comment_2">'
. $row[3] .'</div>';
echo'<div id="comment_1"><p align="right">'. $row[2] .'</p></div>';

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

    
