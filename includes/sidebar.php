				<!-- ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="index.php?detail=about">ABOUT BIID</a></li>
					<li><a href="index.php?detail=competence">CORE COMPETENCE</a></li>
					<li><a href="index.php?detail=service">SERVICE &amp; SECTORS</a></li>
					<li><a href="index.php?detail=clients">CLIENTS &amp; PARTNERS</a></li>
					<li><a href="index.php?detail=achievements">ACHIEVEMENTS</a></li>
					<li><a href="index.php?detail=activities">ONGOING ACTIVITIES</a></li>
					<li><a href="index.php?detail=management">MANAGEMENT</a></li>
					<li><a href="index.php?detail=contact">CONTACT</a></li>
					<li><a href="index.php?detail=feedback">FEEDBACK</a></li>
				</ul -->

                <head>
                </head>

<script language="JavaScript1.2">
function stylize(what,toggleval){
if(toggleval == 1)
	what.className="menulines2";
else
	what.className="menulines";
}

function stylize_on(e){
if (document.all)
source3=event.srcElement
else if (document.getElementById)
source3=e.target
if (source3.className=="menulines"){
stylize(source3,1)
}
else{
while(source3.tagName!="TABLE"){
source3=document.getElementById? source3.parentNode : source3.parentElement
if (source3.className=="menulines")
stylize(source3,1)
}
}
}

function stylize_off(e){
if (document.all)
source4=event.srcElement
else if (document.getElementById)
source4=e.target
if (source4.className=="menulines2")
stylize(source4,0)
else{
while(source4.tagName!="TABLE"){
source4=document.getElementById? source4.parentNode : source4.parentElement
if (source4.className=="menulines2")
stylize(source4,0)
}
}
}

</script>
<table border="0" cellspacing="0" cellpadding="0" onMouseover="stylize_on(event)" onMouseout="stylize_off(event)" style="margin-top:10px;width:179px;">
  <tr>
    <td class="menulines"><a href="index.php">HOME</a></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="menulines"><a href="index.php?detail=about">ABOUT BIID</a></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="menulines"><a href="index.php?detail=activities">PROJECTS</a></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="menulines"><a href="index.php?detail=clients">CLIENTS &amp; PARTNERS</a></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="menulines"><a href="index.php?detail=achievements">MAJOR MILESTONES</a></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
  <td class="menulines"><a href="index.php?detail=service">OUR SERVICES</a></td>    
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="menulines"><a href="index.php?detail=management">MANAGEMENT</a></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
    <td class="menulines"><a href="index.php?detail=contact">CONTACT</a></td>
  </tr>
  <tr><td height="10"></td></tr>
  <tr>
  <td height="10"></td>
  </tr>
  <tr>
  <td style="font-family: 'times New Roman', Times, serif; font-size: medium; font-weight: bold" 
          align="center">
      PARTNERS</td>
  </tr>
  <tr>
  <td height="10"></td>
  </tr>
  <tr>
  <td align="center">
  <table style="margin-top:10px;width:175px;">
  <tr>
  <td align="center"><a href="http://groups.itu.int/Default.aspx?tabid=740" target="_blank"><img src="<?php echo $imagepath;?>/clientscroll/wsis.jpg" 
          style="border: thin outset #999999;"></a></td>
  </tr>
  <tr>
  <td align="center"><a href="http://groups.itu.int/Default.aspx?tabid=740" target="_blank">WSIS</a></td>
  </tr>
  <tr>
  <td height="10" align="right"><a href="http://www.biid.org.bd/index.php?detail=clients">more>></a></td>
  </tr>
   </table>
  </td>
  </tr>
</table>
