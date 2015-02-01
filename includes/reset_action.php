<?php
include "phphits.php";
?>
<html>
<head>
<title>phphits :: reset counter</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Johannes Gamba">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<?php

/////////////// Check if login data is valid and go to selected area ///////////////

if (isset($a_user) && isset($a_pwd))
{
	if (($a_user == STATS_ADMIN_USER) && ($a_pwd == STATS_ADMIN_PWD))
	{
		phphitsResetCounter();
	}
	else
	{
		echo "<hr noshade><font size=\"" . STATS_FONT_SIZE1 . "\" face=\"" . STATS_FONT_FACE . "\">Wrong username / password!<p></p><a href=\"loglogin.php\">Back</a></font><hr noshade>";
	}
}
else
{
	echo "<hr noshade><font size=\"" . STATS_FONT_SIZE1 . "\" face=\"" . STATS_FONT_FACE . "\">Please <a href=\"reset.php\">log in</a> first!</font><hr noshade>";
}
?>
</body>
</html>
