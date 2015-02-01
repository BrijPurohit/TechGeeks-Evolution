<?php                                                                                                           

$server         	= "localhost";  		// Your MySQL Server (usually "localhost")                 
$db_user        	= "root"; 		// Your MySQL Username                                        
$db_pass        	= "";			// Your MySQL Password                                        
$database       	= "tech";	// Database Name                                              

$timeoutseconds 	= 300;			// Timeout Value in Seconds

                                                                                                        

$timestamp=time();                                                                                            
$timeout=$timestamp-$timeoutseconds;  
mysql_connect("localhost","root","") or die ("Useronline Database CONNECT Error");                                                                   
mysql_db_query($database, "INSERT INTO useronline VALUES ('$timestamp','$REMOTE_ADDR','$PHP_SELF')") or die("Useronline Database INSERT Error"); 
mysql_db_query($database, "DELETE FROM useronline WHERE timestamp<$timeout") or die("Useronline Database DELETE Error");
$result=mysql_db_query($database, "SELECT DISTINCT ip FROM useronline WHERE file='$PHP_SELF'") or die("Useronline Database SELECT Error");
$user  =mysql_num_rows($result);                                                                              
mysql_close();                                                                                                
if ($user==1)
 {
 echo"<font size=1>There is curently $user Person online.</font>";
 }
else 
 {
  echo"<font size=1>There are currently $user people online.";
 }
?>