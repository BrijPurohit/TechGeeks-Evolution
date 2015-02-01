<?php include "phphits.php"; ?>
<html>
<head>
<title>phphits :: log file :: login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="author" content="Johannes Gamba">
<style type="text/css">
<!--
input {  border: 2 solid #999999; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; color: #000000}
textarea {  border: 2 solid #999999; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; color: #006699; font-weight: bold}
-->
</style>
<script language="JavaScript">
<!--
function setfocus() {
document.form_admin.a_user.focus();
}
//-->
</script>
</head>

<body bgcolor="#FFFFFF" text="#000000" onload="setfocus()">
<table width="500" border="1" cellspacing="0" cellpadding="0" bordercolor="#CCCCCC">
  <tr bgcolor="#CCCCCC"> 
    <td valign="top" height="20" bgcolor="#0099CC"> 
      <div align="center"> <font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"><b>php</b><i>hits</i>&nbsp;v 
        <?php echo(SCRIPT_VERSION); ?>
        &nbsp;:: log file</font></div>
    </td>
  </tr>
  <tr> 
    <td valign="top" height="150"> 
      <form method="post" action="log.php" name="form_admin">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="50">&nbsp;</td>
            <td width="200">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td width="50">&nbsp;</td>
            <td width="200"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">User 
              name:</font></b></td>
            <td> 
              <input type="text" name="a_user" size="25" maxlength="25">
            </td>
          </tr>
          <tr> 
            <td width="50">&nbsp;</td>
            <td width="200">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td width="50">&nbsp;</td>
            <td width="200"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Password:</font></b></td>
            <td> 
              <input type="password" name="a_pwd" size="25" maxlength="25">
            </td>
          </tr>
          <tr> 
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr> 
            <td colspan="3">&nbsp; </td>
          </tr>
          <tr> 
            <td width="50">&nbsp;</td>
            <td width="200"> 
              <input type="submit" name="submit" value="Show log file">
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td width="50">&nbsp;</td>
            <td width="200">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
</body>
</html>
