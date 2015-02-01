<?php
$page_title = "Creating A Simple Search Engine In PHP ";
 include ("includes/login_div.php");
 ?> 
 <div id="left_bar">
       <?php 
	  	   include("includes/search.php");
		   ?>
</div>
<div id="main_content">
  <div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;">Creating A Simple Search Engine In PHP:</span></span></div>
  <hr  />  
  <p align="justify">How to create a simple search engine that you can use for your very own site or some other project that you may be working on.
  </p>
  <p align="justify">
  Before we actually make the search engine, we need to create a basic webpage that will have an input field where the user can enter his or her search query.
  It's a pretty basic page so I'm not going to talk alot of it and give code.</p>
  <p align="justify"> Basically concept here is that the user will enter the first, middle, or last name of the person they are looking for and hit enter. The contents of the input field will be passed to a php script  that will handle the rest.</p>
  <p align="justify">If you are having problem in making that page then check out the basic tutorial to  <a href="" >"Creating A Form In PHP"</a>. 
  </p>
  <p align="justify"> Lets back to work First, we need to connect to the database using mysql_connect() and select the table using mysql_select_db(). Next, we want to parse the value passed to the script to see if it contains any invalid input, such as numbers and funky characters like #&*^. You should always validate input, don't rely on things like JavaScript to do it for you, because once the user disables JavaScript all that fancy validation goes down the toilet. To check the input we are going to use a regular expression, they are a bit confusing and will be explained in a later tutorial. For now, all you need to know is that it will check to see if value passed is a string of characters.
  </p>
  <p align="justify">
  <div id="req_column">
  <pre>
  

  mysql_connect("host", "username", "password") or die("Can't connect!");

  mysql_select_db("Names") or die("Can't select database!"); 

          

  if (!eregi("[[:alpha:]]", $search_query))

  {

    echo "Error: you have entered an invalid query, you can only use 
          characters!";

    exit;
	

  }

</pre>
</div>
</p>
  <p align="justify">Now we will form the search query. Where we're asking MySQL to search all the rows in First_Name, Middle_Name, and Last_Name for a match to the query entered by the user.
  <div id="req_column">
  <pre>
  $query= mysql_query("SELECT * 
		      FROM some_table 
		      WHERE First_Name= '$search_query' 

OR Middle_Name= '$search_query' OR Last_Name= '$search_query' ");

</pre></div>
</p>
  <p align="justify">
  "<b>*</b>" here means to select every thing frrom database.
  Next get the results from the query using mysql_fetch_array( ), and check to see if there is a match using mysql_num_rows(). If there is a match, or matches, we will output it along with the number of matches found; if there isn't, we'll report to the user that we couldn't find anything. 
  <div id="req_column">
  <pre>
  
  $result= mysql_num_rows($query);

      

  if ($result == 0)

  {

    echo "Sorry, I couldn't find any user that matches your query 
              ($search_query)";

    exit; 

  }

  else if ($result == 1)

  {

    echo "I've found <b>1</b> match!";

  }

  else {

    echo "I've found <b>$result</b> matches! ";

  }

      

  while ($row= mysql_fetch_array($query))

  {

    $first_name= $row["First_Name"];

    $middle_name = $row["Middle_Name"];

    $last_name = $row["Last_Name"];

        

    echo "The first name of the user is: $first_name.";



    echo "The middle name of the user is: $middle_name.";



    echo "The last name of the user is: $last_name.";

  }
  </pre>
  </div>
   That's all, we've finished the script! 
   </p>
   
  <p align="justify">
   <b>Finally:</b><br />
    If you found any errors, or have any comments, please e-mail us, kindly direct questions to the message board.
</p></div>


     <div id="right_bar">
      <img src="images/info.gif" alt="info" 
align="absmiddle"><b> <span style="color: rgb(0, 0, 128);"><span style="font-size:small;">Requirements for practical:</span></span> </b>
	  <ul type="disc">
      <p>
      <li  ><p align="justify">Powered On Working Computer (really)</p></li>
    <li  ><p align="justify">Text Editor could be Dreamweaver, Notepad, Notepad++, Text Pad etc</p></li>
    <li  ><p align="justify">MySQL database</p></li>
    <li  ><p align="justify">Server could be WAMP, XAMP etc</p></li>
    </p>
    </ul>

    </div>
      <?php
include ("includes/footer.html");
?>
