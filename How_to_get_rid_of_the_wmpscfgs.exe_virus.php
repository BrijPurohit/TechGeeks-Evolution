<?php
$page_title = "How_to_get_rid_of_the_wmpscfgs.exe_virus";
 include ("includes/login_div.php");
 ?>
  <div id="left_bar">
       <?php 
	  	   include("includes/search.php");
		   ?>
</div>
 
  <div id="main_content">
  <div align="left">
  <span style="color: rgb(0, 0, 128);"><span style="font-size: large;"><a href="How_to_get_rid_of_the_wmpscfgs.exe_virus.php" rel="bookmark" title="Permanent Link: How To Get Rid of the wmpscfgs.exe Virus, a Reader Contributed Guide">How To Get Rid of the wmpscfgs.exe Virus, a Reader Contributed Guide:</a></span></span>
  <hr  />  
  </div>
  <div id="game_top1">
      <p class="style3"> How To Get Rid of the wmpscfgs.exe Virus, a Reader Contributed Guide 

      </p>
    </div>
	<div id="game_content">
  
<p  align="justify"><strong>Symptoms of the wmpscfgs.exe Virus</strong>
<ul>
<li><p  align="justify">If you have Malwarebytes or Superantispyware software, these guys will detect it on every scan and will try to remove this virus. But the virus will just come back after a reboot. Even a safe mode boot (with or without network) will not work.</li>
</p>
<li><p  align="justify">A warning about IE not being your default browser will always popup without even clicking or opening up IE. I would not advise to click either yes or no on it. Just move the window in one of your monitor corners and see solution below.</p></li>
<li><p  align="justify">Windows UAC will misbehave and will keep on prompting whether you want to execute a previously executed startup program. This is gave the virus away for me hence i start scanning and investigating. If you try to allow one, UAC will be disabled. Strangely enough, if you enabled it, windows doesn&#8217;t prompt you to reboot which is also a giveaway that something is wrong! As changing the UAC settings will definitely ask for a reboot.</p></li>
<li><p  align="justify">Microsoft Security Essentials will detect that&nbsp; your startup programs (virus software, anti spyware/malware software, etc are viruses) and flag it as a virus. Another giveaway that something is awfully wrong!</p></li>
</ul>
<p  align="justify">If you have the above symptoms, you pretty much have the virus I had yesterday. Here is what you can do to get rid of it. Don&#8217;t bother about scanning as scanners cant fully fix your problem and will end up corrupting your applications.</p>
<ul>
<li><p  align="justify">Boot in safe mode. The reason for this is that in safe mode there is not much processes running. You need this setup in step 9 below as this virus is a nasty one.</p></li>
<li><p  align="justify">Open up windows explorer and go to Tools -&gt; Folder options .<br />&nbsp;&nbsp;&nbsp; a. Make sure the following are TICKED -&gt; Show hidden files and folders<br />&nbsp;&nbsp;&nbsp; b. Make sure the following are UNticked&nbsp; -&gt; Hide Extensions for known file types</p></li>
<li><p  align="justify">Go to the following directories (this is for vista home premium):<br />&nbsp;&nbsp;&nbsp;&nbsp; C:\Program Files\Internet Explorer<br />&nbsp;&nbsp;&nbsp;&nbsp; C:\Users\user\AppData\Local\Temp&nbsp;&nbsp; <br />And you will see there a file called wmpscfgs.exe. Delete them.</p></li>
<li><p  align="justify">Open up your task manager, make sure the &#8217;show all processes&#8217; is ticked and look for the same process. If it is running. Kill it.</p></li>
</ul>
<p  align="justify">Starting this part, steps needs more technical experience. If you are not comfortable in doing the below steps, look for someone that can help you.</p><p  align="justify">
<ul>
<li><p  align="justify">Open up regedit and go to:&nbsp; HKLM-&gt;Software -&gt; Microsoft -&gt; Windows -&gt; CurrentVersion -&gt; Run</p></li>
<li><p  align="justify">Look for Adobe_reader entry with data: &#8220;<em>%ProgramFiles%\Internet Explorer\wmpscfgs.exe</em>&#8220;. Delete it. For me from this point almost all of the things written in the NET currently don&#8217;t have the steps below. And its the reason why this virus keeps coming back.</p></li>
<li><p  align="justify">Hopefully you dont have much applications under &#8220;HKLM-&gt;Software -&gt; Microsoft -&gt; Windows -&gt; CurrentVersion -&gt; Run&#8221;. Because you have to visit each one of them literally because this virus hijacks almost every application in the RUN list above. </p></li>
<li><p  align="justify">Basically it renames the old exe file from say &#8220;mcagent.exe&#8221; to &#8220;mcagent .exe&#8221;. With a space between the filename and the &#8220;.exe&#8221; or extension. It will then create a copy of itself with the same filename as your executable file so that when someone executes your file, the virus will be executed first then your file. It will do this for every apps you have in your Run list.
<p  align="justify">Thus if you go to the location of say of McAfee mcagent.exe application you will see two to three files with almost the same filename:</p>
</li>
<ol type="1">
<li><p  align="justify">mcagent.exe -&gt; which is a 39 KB file, and very recently created and which is the virus that keeps adding back that wmpscfgs.exe file.</p></li>
<li><p  align="justify">mcagent .exe-&gt; the original mcagent file, renamed.</p></li>
<li><p  align="justify">mcagent.exe.delme&lt;some random number-&gt; delete this one as well. I don&#8217;t see this occurring every time, but i have seen some apps with this file in them and very recently created.</p></li>
</ol>

<li><p  align="justify">You first need to kill the corresponding process of&nbsp; the infected file if they are 
ning in task manager, manually remove the existing .exe file which is around 39KB only and rename back your old executable file to its former filename. Repeat this for every application you have in your Run list above. The only thing that i saw this virus didn&#8217;t infect was the windows defender application. The rest in my Run list were screwed. Uninstalling and reinstalling them doesn&#8217;t help as well as the former Trojan exe file will be retained in the application directory.
<p  align="justify">This is the reason why Microsoft Security Essentials was complaining that your startup executable files are viruses.</p></li>
<li><p  align="justify">Once you have verified that each application in your run list has been restored. To be fully sure that you don&#8217;t have any such files lingering in your system, do a drive search for any file that has 39KB size and has just been recently created and examine each one carefully if they are just copies of your original executable file. Follow step 7 for each occurrence of it. So far, i only saw this virus attach itself into executable files.</p></li>
<li><p  align="justify">If you want to be 100% sure, next thing you need to do is double check every process running in&nbsp; your task manager if they are legit. Some process specially those started by system wont be able to take you to its process file, its ok, but most of them if you do a right click in them,&nbsp; you should see an option there called &#8220;Open File Location&#8221;. Then follow steps 7 above.</p></li>
<li><p  align="justify">Reboot and that&#8217;s it!</p></li>
</ul>
</p>
</div>
</div>
    <div id="right_bar"><img src="images/info.gif" alt="info" 
align="absmiddle"><b> <span style="color: rgb(0, 0, 128);"><span style="font-size:small;">Article reviewed:</span></span> <u><p  align="justify">How To Get Rid of the wmpscfgs.exe Virus, a Reader Contributed Guide </p></u></b>
	  
  <p  align="justify"> This article has been sent and tested by a specific reader who has encountered this problem, not personally checked by techgeeksevolution group. Try at your own risk...<br />we just share it with everybody, just in case anybody else comes across the same problem in the future. 

</p>
    </div>
    <?php
include ("includes/footer.html");
?>

  
