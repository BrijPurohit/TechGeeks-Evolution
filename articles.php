/*meta data need to check*/
<?php
 $page_title = "Technology Articles";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title; ?></title>
<meta  name="description" content="TechGeeksEvolution.com is India's Top Technology reviews, news, and downloads site with information on PCs & Laptops, Gaming, Internet, Software & programming. " >
<meta  name="keywords" content="pc hardware reviews, laptop reviews, lowest price, best price, comparison, review, compare, specifications, forum, FAQ, software reviews, tech news, technology news, free downloads, electronics reviews, india, India,tech articles, windows articles, linux articles, mac articles, php programming, java programming, c or c++ programming, python programming, php code, java code, top games, subscribe newsgroup,
 new games, computer tweaks, sign in, help and support, technology questions, browser reviews, security alerts, tech news, technology news, Ask To TechGeeksEvolution, contact To TechGeeksEvolution,  home TechGeeksEvolution, Windows, Linux, Mac" >
<meta name="generator" content="techgeeksevolution.com" />
<link href="try_new_pg.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="art-page-background-simple-gradient">
        <div id="art-page-background-gradient"></div>
    </div>
    <div id="art-main">
        <div class="art-sheet">
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            
<div id="container">
<div id="img1">
  <img src="images/new_banner.gif"  alt="TechGeeksEolution" /> 
 </div>
  <div id="nav_php">
    <ul>
    <li><a href="newsgroup_of_techgeeksevolution.php">Subscribe Newsgroup</a></li>
    <li>|</li>
    <li><a href="login_form.php">Sign In</a></li>
    <!--<li>|</li>
    <li><a href="#">Sign Up</a></li>-->
    <li>|</li>
    <li><a href="not_a_member.php">Not a member</a></li>
    </ul>
  </div>
  <div id="nav">
    <ul>
    <li id="nav_home"><a href="index.php"><img src="images/home1.png" alt="Home" /></a></li>
    <li id="nav_tech"><a href="tech_eye.php"><img src="images/tech_eye1.png" alt="Tech Eye"  /></a></li>
    <li id="nav_idLb"><a href="idea_lab.php"><img src="images/idea_lab1.png" alt="Idea Lab" /></a></li>
    <li id="nav_gmZn"><a href="game_zone.php"><img src="images/game_zone1.png" alt="Game Zone"  /></a></li>
    <li id="nav_ask"><a href="ask_techgeeksevolution.php"><img src="images/ask1.png" alt="Ask_techgeeksevolution" /></a></li>
    <li id="nav_tweak"><a href="#"><img src="images/tweaks1.png" alt="Tweaks" /></a></li>
    <li id="nav_abt"><a href="about_techgeeksevolution.php"><img src="images/about1.png" alt="about_techgeeksevolution" /></a></li>
    </ul>
   </div>
   <div id="content"><hr />

 <div id="left_bar">
       <?php 
	  	   include("includes/search.php");
		   ?>
</div>
 
  <div id="main_content">
   <div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="articles.php">Articles:</a></span></span></div>
  <hr  />  
  <div id="message_box">    
      
      <form  action="articles.php" method="post">
    <input type="submit" name="comment" value="show comment" />
    <?php
		if(isset($_POST['comment']))
		{
		 include ("includes/comment.php");
		 }
	?>
    
    <input type="submit" name="comment1" value="hide comment" />
    </form>
    </div>
    </div> 
    <div id="right_bar">   
    <div id="sub_menu">      
    <ul>
    <li id="sub_menu_contact_us"><a href="articles_on_windows.php"><img src="images/windows.png" alt="windows_articles"  /></a></li>
    <li id="sub_menu_contact_us"><a href="articles_on_linux.php"><img src="images/linux.png" alt="linux_articles" /></a></li>
    <li id="sub_menu_contact_us"><a href="articles_on_mac.php"><img src="images/mac.png" alt="mac os_articles" /></a></li>
    
    </ul>
   
    </div>     
 <?php
 include("includes/footer.html");
 ?>