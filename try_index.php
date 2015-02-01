
<?php
$page_title = "TechGeeksEvolution.com :: a site to track the evolution of technology";
include ("includes/login_div.php");
?>

    <div id="left_bar">
      <?php 
	  	   include("includes/search.php");
		  
	  ?>
    </div>
    <div id="main_content">
    
      <p align="justify">
The main aim behind the preparation of this site is to enable the <b><a href="idea_lab.php">technology geeks</a></b> find useful resources over the internet. 
It also enables them to put their ideas over the Web and to make community known technology via the internet.       </p>
<p align="justify">
Below are some of the fetures of this sites:
</p>
<ul type="disc">
<li>
<p align="justify"><b>Vast collection of Articles:</b> The site contain numerous <a href="articles.php"> Technology Articles</a> on various fields, reviewed by the readers of this site.</p></li>

<li>
<p align="justify"><b>Power for Questions and Answers:</b> The site enables users to <a href="ask_techgeeksevolution.php">Ask To TechGeeksEvolution</a> questions and get answers. This ability to find actual answers coming from peoples who have faced such problem and then verified by the TechGeeksEvolution group is what sets the site apart from other sites.</p>
</li>
<li>
<p align="justify"><b>Notification and Subscription Services:</b> Users have the power to <a href="newsgroup_of_techgeeksevolution.php">Subscribe Newsgroup</a> to TechGeeksEvolution activity. The Alerts option are configured to send updates to Mail account.</p>
</li>
<li>
<p align="justify"><b>Ability to Comment:</b> Users can comment on <a href="articles.php">Articles</a> as being more helpful for other users. </p></li>
<li>
<p align="justify"><b>Power to Communicate:</b> The users of this site has a power to communicate with the developers of the site in <a href="about_techgeeksevolution.php">About TechGeeksEvolution</a> section and post them useful <a href="feedback_to_techgeeksevolution.php">Feedback</a>. </p></li>
<li>
<p align="justify"><b>Game Zone:</b> This section will contain reviews about latest games in <a href="game_reviews.php">Game Reviews</a> section,   <a href="top_ten.php">top ranking of games</a>, keys for moves in games, and system requirements for games.</p></li>

</ul>
    </div>
    <div id="right_bar">
      
      <div id="sub_menu_main">
      
   <ul >
    <li ><a href="http://www.dooneduworld.com" ><img src="images/doon.png"  alt="dehradun education portal"/></a></li>
    </ul>
    Hits&nbsp;total:&nbsp;<?php echo(phphitsShowHits(0)); ?>
    </div>
    </div>
    <?php
include ("includes/footer.html");

		include ("includes/phphits.php");
		phphitsAddHit();
		?>

