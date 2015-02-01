<?php
include "phphits.php";
phphitsAddHit();
?>
<html>
<head>
<title>phphits</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Johannes Gamba">
<style type="text/css">
<!--
a:link {  color: #0066FF; text-decoration: underline}
a:hover {  color: #3399FF; text-decoration: none}
a:visited {  color: #666666; text-decoration: underline}
-->
</style>
</head>

<body bgcolor="#FFFFFF" text="#000000">
<table width="100%" border="0">
  <tr> 
    <td><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#003399">php</font></b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#003399"><i>hits</i>&nbsp;v<?php echo(SCRIPT_VERSION); ?>
      &nbsp;:: demo page</font></td>
    <td>
      <div align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#003399">Coded 
        by <a href="mailto:webmaster@gamba.de">Johannes Gamba</a></font></div>
    </td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <hr noshade>
    </td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2"><font face="Verdana, Arial, Helvetica, sans-serif" size="3"> 
      <?php echo "<b>" . phphitsShowHits(0) . " hits total</b> (Last 24 hours: " . phphitsShowHits(24) . ")"; ?>
      </font></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2"><font face="Verdana, Arial, Helvetica, sans-serif" size="3"> 
      <?php echo "Currently online: " . phphitsShowOnlineUsers() . " users"; ?>
      </font></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <hr noshade>
    </td>
  </tr>
  <tr> 
    <td colspan="2"><a href="loglogin.php"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>View 
      log file</b></font></a></td>
  </tr>
</table>
</body>
</html>
