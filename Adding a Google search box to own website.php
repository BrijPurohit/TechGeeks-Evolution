<?php
$page_title = "Adding a Google search box to own website";
 include ("includes/login_div.php");
 ?> 
 <div id="left_bar">
       <?php 
	  	   include("includes/search.php");
		   ?>
</div>
<div id="main_content">
  <div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="Adding a Google search box to own website.php" target="_self">Adding a Google search box to own website:</a></span></span></div>
  <hr  />  
  <p align="justify">Google itself actually has a nice page offering you HTML code you can just cut and paste onto your own Web pages to produce the search box you seek, and some variants beside. Just check out  <a href="http://www.google.com/searchcode.html" target="new">Google Free</a>. 
  </p>
  <p align="justify">
  The basic technique involved here is to be able to manipulate one of the variables handed to the Google search engine, a variable called <b>sitesearch</b>. Set it to a null value and you're searching the entire World Wide Web, but set it to a specific domain and it's constrained exactly as if you had typed in the Google special notation <b>site:<i>domain</i></b>.
</p>
<p align="justify">
In addition to that, you need an input field and a submit button. Put them all together and here's the minimalist Google search form that lets the user alternate between just your site (well, in this case just my site) or the entire Web:

</p>
<div id="req_column">
  <pre>
  &lt;form method="get" action="http://www.google.com/search"&gt;
 
&lt;div style="border:1px solid black;padding:4px;width:20em;"&gt;
&lt;table border="0" cellpadding="0"&gt;
&lt;tr&gt;&lt;td&gt;
&lt;input type="text"   name="q" size="25"
 maxlength="255" value="" /&gt
&lt;input type="submit" value="Google Search" /&gt;&lt;/td&gt;&lt;/tr&gt;
&lt;tr&gt;&lt;td align="center" style="font-size:75%"&gt;
&lt;input type="checkbox"  name="sitesearch"
 value="techgeeksevolution.com" checked /&gt; only TechGeeksEvolution Search&lt;br /&gt;
&lt;/td&gt;&lt;/tr&gt;&lt;/table&gt;
&lt;/div&gt;
 
&lt;/form&gt;</pre>

</div>
</div>
<div id="right_bar">
      <img src="images/info.gif" alt="info" 
align="absmiddle"><b> <span style="color: rgb(0, 0, 128);"><span style="font-size:small;">Requirements for practical:</span></span> </b>
	  <ul type="disc">
      <p>
      <li  ><p align="justify">Powered On Working Computer (really)</p></li>
    <li  ><p align="justify">Text Editor could be Dreamweaver, Notepad, Notepad++, Text Pad etc</p></li>
    <li  ><p align="justify">Internet connection to check the code</p></li>
    <li  ><p align="justify">Prior knowledge of form</p></li>
    </p>
    </ul>

    </div>
      <?php
include ("includes/footer.html");
include("count.php");
?>
