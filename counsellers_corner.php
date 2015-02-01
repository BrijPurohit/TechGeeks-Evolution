<?php
session_start();
 $page_title = "counsellers_corner";
include ("includes/header.html"); 
if (isset($_SESSION['user_id']))
  {
  	 echo"
		<div id='login_div'>		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class='style1' href=\"logout.php\">Logout</a>
		</div>";
	}
 ?>
 
 <div id="left_bar">
    </div> 
  <div id="main_content">
      <div id="cc_photo" > </div>
      <div>
      <?php
      if (isset($_SESSION['user_id']))
  {
   	 echo"
		<div id='cc_msg'>
		
		Hi..{$_SESSION['user_id']} &nbsp;&nbsp;Welcome.
		</div>";
	} 
	else
	{
		echo"
		<div id='cc_msg'>
		
		Hi.. friend &nbsp;&nbsp;Welcome.
		</div>";
	}
		?>
   </div>
   <div id="cc_about" align="center">About Me
   <p align="justify">i am the hero Black Land," a reference to the dark, fertile soil that remained after the Nile floodwaters had receded. They also used         another term, Deshret, or "the Red Land," a designation for the desert sands that burned under the blazing Sun. In         addition, they used the term Lower Egypt to refer to the northern delta area and the term Upper Egypt to refer to the         communities along the river all the way south to
         Microsoft ® Encarta ® 2009. © 1993-2008 Microsoft Corporation. All rights reserved.
         The abundance of the Nile and the Egyptians' careful management of the necessary dikes and irrigation systems guaranteed         a flourishing agricultural society. The variety of plants that grew and were cultivated could be used for many purposes,         including food, clothing, and shelter. The river was also the source of fish, and a fishing industry was established         early on. Mud from the river's banks was the raw material for a well-established pottery industry as well as for the         bricks used in construction. To navigate the Nile, the Egyptians learned to build all sorts of boats. The land provided</p>
   </div>
	
    </div>
    <div id="right_bar">
      
     
   <p align="justify">counsellers corner submenu</p>
    </div>
    <?php
include ("includes/footer.html");
?>

