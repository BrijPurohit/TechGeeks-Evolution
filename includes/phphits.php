<?php
	
/*
phphits v0.95 Beta :: include file
Coded by Johannes Gamba (webmaster@gamba.de)
Source last updated: 2001.06.04 14:30
*/

/////////////// GENERAL SETTINGS ///////////////

// Format: "NAME", "VALUE"


// MySQL settings

define("SQL_HOST", "localhost");		// Name or IP of MySQL server
define("SQL_USER", "root");			// MySQL user name
define("SQL_PWD", "");			// MySQL password
define("SQL_DB", "tech");			// Name of database
define("SQL_TABLE", "log");			// Name of table

define("SQL_SHOW_ERRORS", "1");			// Should the script produce MySQL error messages or not

// Counter settings

define("COUNTER_MODE", "1");			// Counter mode (1 = text mode, 2 = image mode)
define("COUNTER_IMG_SUBDIR", "digits");		// Image subdirectory (only for COUNTER_MODE = 2)

define("COUNTER_USERONLINE_TIME", "2");		// Show number of users who have visited site within the last ... MINUTES as "currently online"
define("COUNTER_HITS_OFFSET", "0");		// Hits count offset ('10000 hits' looks much nicer than '10 hits', doesn't it ;)
define("COUNTER_BLOCK_TIME", "30");		// Do not count hit if same visitor has already been here within the last ... MINUTES
define("COUNTER_DIGITS", "4");			// Number of counter digits to show

// Admin settings

define("STATS_ADMIN_USER", "admin");		// Admin username
define("STATS_ADMIN_PWD", "phphits");		// Admin password

// Log file settings

define("STATS_FONT_SIZE1", "2");		// Normal font size
define("STATS_FONT_SIZE2", "1");		// Small font size
define("STATS_FONT_FACE", "Verdana, Arial");	// Font face
define("STATS_HIGHLIGHT_TIME", "24");		// Show hits within the last ... HOURS in special color (see next line)
define("STATS_HIGHLIGHT_COLOR", "#FFCC33");	// Use this color to mark hits


/*
-------------------------------------------------
 --> DO NOT CHANGE ANYTHING BELOW THIS LINE! <--- 
-------------------------------------------------
*/

/////////////// Misc. settings ///////////////

define("SCRIPT_VERSION", "0.95 Beta");	

// ==========================================================================================

function phphitsAddHit()
{
			
/////////////// Set vars ///////////////

$sql_result = "";

/////////////// Get user's IP and host name ///////////////

if (getenv("HTTP_X_FORWARDED_FOR"))
{
	$u_ip = getenv("HTTP_X_FORWARD_FOR");
	$u_host = gethostbyaddr($u_ip);
}
else
{
	$u_ip = getenv("REMOTE_ADDR");
	$u_host = gethostbyaddr($u_ip);
}

/////////////// Get user's type of browser ///////////////

$u_browser= getenv("HTTP_USER_AGENT");

/////////////// Get user's default language sent by browser in the HTTP headers  ///////////////

$u_lang = explode(",", getenv("HTTP_ACCEPT_LANGUAGE"));
$u_lang = strtolower($u_lang[0]);

/////////////// Get current UNIX timestamp ///////////////

$u_timestamp = time();

/////////////// Get current date/time ///////////////

$u_date = date("F j, Y | H:i:s");

/////////////// Connect to MySQL server ///////////////

if (!($sql_id = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_connect", $sql_id);	
}

/////////////// Create new database and activate it ///////////////

@mysql_create_db(SQL_DB, $sql_id);


if (!@mysql_select_db(SQL_DB, $sql_id))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select_db", $sql_id);
}

/////////////// Create new table ///////////////

$sql_query = "CREATE TABLE " . SQL_TABLE . " (IP CHAR(255), HOST CHAR(255), BROWSER CHAR(255), LANGUAGE CHAR(255), DATE CHAR(255), TSTAMP CHAR(255), ROWID INT PRIMARY KEY AUTO_INCREMENT)";

@mysql_query($sql_query, $sql_id);

/////////////// Get all IPs and timestamps from table in descending order ///////////////


$sql_query = "SELECT ip,tstamp FROM " . SQL_TABLE . " ORDER BY rowid DESC";

if (!($sql_res = @mysql_query($sql_query, $sql_id)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select", $sql_id);
}

/////////////// Check if hit has already been counted and exit script if neccessary ///////////////

while ($sql_row = @mysql_fetch_array ($sql_res))
{
	if ((($sql_row["tstamp"] + (COUNTER_BLOCK_TIME * 60)) > $u_timestamp) && ($sql_row["ip"] == $u_ip))
	{
		@mysql_close($sql_id);
		$t = (($sql_row["tstamp"] + (COUNTER_BLOCK_TIME * 60)) - $u_timestamp);
		return $sql_result;
		exit;
	}
}

/////////////// Insert new row with information on hit into the table ///////////////

$sql_query = "INSERT INTO " . SQL_TABLE . " (IP,HOST,BROWSER,LANGUAGE,DATE,TSTAMP) VALUES (\"$u_ip\",\"$u_host\",\"$u_browser\",\"$u_lang\",\"$u_date\",\"$u_timestamp\")";

if (!@mysql_query($sql_query, $sql_id))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_insert", $sql_id);
}

/////////////// Close connection to MySQL server ///////////////

@mysql_close($sql_id);

return $sql_result;
}

// ==========================================================================================

function phphitsShowLog()
{

/////////////// Set vars ///////////////

$sql_result = "";
$sql_numrows = 0;
$i = 0;

/////////////// Connect to MySQL server ///////////////

if (!($sql_id = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_connect", $sql_id);
}

/////////////// Activate database ///////////////

if (!@mysql_select_db(SQL_DB, $sql_id))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select_db", $sql_id);
}

/////////////// Get all rows from table in descending order ///////////////

$sql_query = "SELECT ip,host,browser,language,date,tstamp,rowid FROM " . SQL_TABLE . " ORDER BY rowid DESC";

if (!($sql_res = @mysql_query($sql_query, $sql_id)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select", $sql_id);
}

/////////////// Get number of rows in table ///////////////

$sql_numrows = @mysql_num_rows($sql_res);

/////////////// Output some nice HTML code :) ///////////////

echo "<font size=\"" . STATS_FONT_SIZE1 . "\" face=\"" . STATS_FONT_FACE . "\"><b>php</b><i>hits</i> v" . SCRIPT_VERSION . " :: log file</font>";
echo "<hr noshade><br>";
echo "<font size=\"" . STATS_FONT_SIZE1 . "\" face=\"" . STATS_FONT_FACE . "\"><b>" . $sql_numrows . " hits in total</b></font><p></p>";

echo "<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" bordercolor=\"#CCCCCC\">";
echo "<tr height=\"25\" bgcolor=\"#dddddd\">";
echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\"><b>Nr.</b></font></td>";
echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\"><b>Date | Time</b></font></td>";
echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\"><b>IP</b></font></td>";
echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\"><b>Host</b></font></td>";
echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\"><b>Browser</b></font></td>";
echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\"><b>Lang.</b></font></td>";
echo "</tr>";

$i = (-($sql_numrows)) - 1;

while ($sql_row = @mysql_fetch_array ($sql_res))
{
	$i++;
	
	if ((time() - $sql_row["tstamp"]) <= (STATS_HIGHLIGHT_TIME * 3600))
	{
		echo "<tr bgcolor=\"" . STATS_HIGHLIGHT_COLOR . "\">";
	}	
	else
	{
		echo "<tr>";
	}
	echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\">" . abs($i) ."</font></td>";
	echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\">" . $sql_row["date"] . "</font></td>";
	echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\">" . $sql_row["ip"] . "</font></td>";
	echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\">" . $sql_row["host"] . "</font></td>";
	echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\">" . $sql_row["browser"] . "</font></td>";
	echo "<td><font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\">" . $sql_row["language"] . "</font></td>";
	echo "</tr>";
}

echo "</table><br>";
echo "<font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\"><i>Hits within the last " . STATS_HIGHLIGHT_TIME . " hours are <font color=\"" . STATS_HIGHLIGHT_COLOR . "\"><b>highlighted</b></font>.</i></font><p></p>";
echo "<hr noshade>";
echo "<font size=\"" . STATS_FONT_SIZE2 . "\" face=\"" . STATS_FONT_FACE . "\" color=\"999999\"><b>Coded by <a href=\"mailto:webmaster@gamba.de\">Johannes Gamba</a></b></font>";

/////////////// Close connection to MySQL server ///////////////

@mysql_close($sql_id);

return $sql_result;
}

// ==========================================================================================

function phphitsShowOnlineUsers()
{

/////////////// Set vars ///////////////

$sql_result = "";
$sql_numrows = 0;
$imghtml = "";

/////////////// Connect to MySQL server ///////////////

if (!($sql_id = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_connect", $sql_id);
}

/////////////// Activate database ///////////////

if (!@mysql_select_db(SQL_DB, $sql_id))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select_db", $sql_id);
}

/////////////// Get all timestamps from table in descending order ///////////////

$sql_query = "SELECT tstamp FROM " . SQL_TABLE . " ORDER BY rowid DESC";

if (!($sql_res = @mysql_query($sql_query, $sql_id)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select", $sql_id);
}

/////////////// Count all hits within COUNTER_USERONLINE_TIME///////////////

$users_online = 0;

while ($sql_row = @mysql_fetch_array ($sql_res))
{
	if ((time() - $sql_row["tstamp"]) <= (COUNTER_USERONLINE_TIME * 60))
	{
		$users_online++;
	}	
}

/////////////// Close connection to MySQL server ///////////////

@mysql_close($sql_id);

if(COUNTER_MODE == 2)
{
	for($i = 0; $i < strlen($users_online); $i++)
	{
		$imghtml .= "<img src=\"" . COUNTER_IMG_SUBDIR . "/" . substr($users_online, $i, 1) . ".gif\" border=\"0\" align=\"absmiddle\">";
	}
	
	return $imghtml;
}
else
{
	return $users_online;
}	

}

// ==========================================================================================

function phphitsShowHits($c_time)
{

/////////////// Set vars ///////////////

$sql_result = "";
$sql_numrows = 0;
$hits = 0;
$imghtml = "";

/////////////// Connect to MySQL server ///////////////

if (!($sql_id = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_connect", $sql_id);
}

/////////////// Activate database ///////////////

if (!@mysql_select_db(SQL_DB, $sql_id))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select_db", $sql_id);
}

/////////////// Get IPs from table in descending order ///////////////

$sql_query = "SELECT ip,tstamp FROM " . SQL_TABLE . " ORDER BY rowid DESC";

if (!($sql_res = @mysql_query($sql_query, $sql_id)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select", $sql_id);
}

if ($c_time == 0)
{
	/////////////// Get number of rows in table ///////////////

	$sql_numrows = @mysql_num_rows($sql_res);
	
	$hits = $sql_numrows + COUNTER_HITS_OFFSET;
}

else
{
	$c_time = abs($c_time * 3600);
	$hits_today = 0;

	while ($sql_row = @mysql_fetch_array ($sql_res))
	{
		if ((time() - $sql_row["tstamp"]) <= $c_time)
		{
			$hits_today++;
		}	
	}
	$hits = $hits_today;
}

/////////////// Close connection to MySQL server ///////////////

@mysql_close($sql_id);

if (strlen($hits) < COUNTER_DIGITS)
{
	while ((strlen($hits)) < COUNTER_DIGITS)
	{
		$hits = "0" . $hits;
	} 
}

if(COUNTER_MODE == 2)
{
	for($i = 0; $i < strlen($hits); $i++)
	{
		$imghtml .= "<img src=\"" . COUNTER_IMG_SUBDIR . "/" . substr($hits, $i, 1) . ".gif\" border=\"0\" align=\"absmiddle\">";
	}
	
	return $imghtml;
}
else
{
	return $hits;
}

}

// ==========================================================================================

function phphitsResetCounter()
{

/////////////// Set vars ///////////////

$sql_result = "";
$sql_numrows = 0;

/////////////// Connect to MySQL server ///////////////

if (!($sql_id = @mysql_connect(SQL_HOST, SQL_USER, SQL_PWD)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_connect", $sql_id);
}

/////////////// Activate database ///////////////

if (!@mysql_select_db(SQL_DB, $sql_id))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_select_db", $sql_id);
}

/////////////// Delete table ///////////////

$sql_query = "DROP TABLE " . SQL_TABLE;

if (!($sql_res = @mysql_query($sql_query, $sql_id)))
{
	if (SQL_SHOW_ERRORS <> 0) phphitsShowErrorMsg("mysql_drop", $sql_id);
}

/////////////// Output some HTML code ///////////////

echo "<hr noshade>";
echo "<font size=\"" . STATS_FONT_SIZE1 . "\" face=\"" . STATS_FONT_FACE . "\"><b>The counter has been successfully reset.</b></font>";
echo "<hr noshade>";

/////////////// Close connection to MySQL server ///////////////

@mysql_close($sql_id);
}

// ==========================================================================================

function phphitsShowErrorMsg($err, $id)
{

switch ($err)
{
	case "mysql_connect":
		$msg[1] = "Couldn't connect to MySQL server";
		$msg[3] = "Check if the name of the MySQL server, user name & password specified in phphits.php are correct!";
		break;
	case "mysql_select_db":
		$msg[1] = "Couldn't activate MySQL database";
		$msg[3] = "Check if the name of the MySQL database specified in phphits.php is correct!";
		break;
	case "mysql_select":
		$msg[1] = "Couldn't query MySQL database";
		$msg[3] = "Check if the name of the MySQL database specified in phphits.php is correct!";
		break;		
	case "mysql_insert":
		$msg[1] = "Couldn't insert new row into table";
		$msg[3] = "Check if the name of the MySQL table in phphits.php is correct!";
		break;
	case "mysql_drop":
		$msg[1] = "Couldn't delete table.";
		$msg[3] = "Check if the name of the MySQL table in phphits.php is correct!";
		break;
	default:
		$msg[1] = "MySQL error";
		$msg[3] = "Check if all MySQL settings specified in phphits.php are correct!";
		break;
}

if (@mysql_error($id) <> "")
{
	$msg[2] = @mysql_error($id);
}
else
{
	$msg[2] = "Unknown";
}

die("<hr><font color=\"#ff0000\"><b>" . $msg[1] . "</b><br>Reason: " . $msg[2] . "<p></p>" . $msg[3] . "</font><hr><br>");
}

?>