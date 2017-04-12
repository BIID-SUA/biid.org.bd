<?php
require_once("antihack.php");
?>	
<style type="text/css">

#marqueecontainer{
position: relative;
width: 360px;
height: 300px;
background-color: white;
overflow: hidden;
padding: 2px;
padding-left: 4px;
}

</style>

<script type="text/javascript">

var delayb4scroll=1000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
var marqueespeed=1 //Specify marquee scroll speed (larger is faster 1-10)
var pauseit=1 //Pause marquee onMousever (0=no. 1=yes)?

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=marqueespeed
var pausespeed=(pauseit==0)? copyspeed: 0
var actualheight=''

function scrollmarquee(){
if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8))
cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px"
else
cross_marquee.style.top=parseInt(marqueeheight)+8+"px"
}

function initializemarquee(){
cross_marquee=document.getElementById("vmarquee")
cross_marquee.style.top=0
marqueeheight=document.getElementById("marqueecontainer").offsetHeight
actualheight=cross_marquee.offsetHeight
if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Opera or Netscape 7x, add scrollbars to scroll and exit
cross_marquee.style.height=marqueeheight+"px"
cross_marquee.style.overflow="scroll"
return
}
setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll)
}

if (window.addEventListener)
window.addEventListener("load", initializemarquee, false)
else if (window.attachEvent)
window.attachEvent("onload", initializemarquee)
else if (document.getElementById)
window.onload=initializemarquee
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<!-- div class="bulletins">
	<marquee behavior="scroll" direction="up" scrollamount="1" height="200" width="300" -->
	<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed" style="width:230px;margin-left:-60px">
	<div id="vmarquee" style="position: absolute; width: 230px;">
		<table border="0" cellspacing="3" cellpadding="0" style="margin-left:40px;margin-right:10px" width="190px">
			<?php
			$qry = "SELECT * FROM bulletins ORDER BY bdate DESC LIMIT 5";
			$res = mysql_query($qry);
			while($rs = mysql_fetch_assoc($res)){
			?>
			<tr>
				<td>
					<?php echo date("d.m.Y", strtotime($rs['bdate']));?><br>
					<span class="bultitle"><?php echo wordwrap($rs['title'],200 ,"<br>");?></span><br>
					...<a href="index.php?detail=bulletin_detail&event=viewdetail&bid=<?php echo $rs['id'];?>"><em>read more</em></a>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<?php }?>
		</table>
	<!-- /marquee -->
	</div>
	</div>
	<div>
	<table>
	
	<tr>
	<td align="center">	    </td>
	</tr>
	<tr>
	  <td align="justify">&nbsp;</td>
	  </tr>
	<tr>
	<td>
	  <div class="fb-like-box" data-href="https://www.facebook.com/pages/Bangladesh-Institute-of-ICT-in-Development-BIID/155902721140539?ref=br_rs" data-width="160" data-height="250" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div></td>
	</tr></table>
</div>