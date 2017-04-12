<?php
require_once("antihack.php");
?>	
<style type="text/css">

#marqueecontainer{
position: relative;
width: 360px;
height: 180px;
background-color: white;
overflow: hidden;
padding: 2px;
padding-left: 4px;
}

 p.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";
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

	<!-- div class="bulletins">
	<marquee behavior="scroll" direction="up" scrollamount="1" height="200" width="300" -->
	<div id="marqueecontainer" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed" style="width:230px;margin-left:-60px">
	<div id="vmarquee" style="position: absolute; width: 230px;">
		<table border="0" cellspacing="3" cellpadding="0" style="margin-left:40px;margin-right:30px" width="200">
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
	<td align="center">
	    <img src="<?php echo $imagepath;?>/eclinic.jpg" height="168" width="130"></td>
	</tr>
	<tr>
	<td width="170" align="justify">
	    <p>
            BIID has launched an ICT based healthcare initiatives e-Clinic on 1st October 2010. e-Clinic is an internet based telemedicine service for the rural poor of remote areas of Bangladesh where graduate doctors or quality medical service is not available.  <a href="http://www.biid.org.bd/index.php?detail=eclinic">
            <b>more</b>>></a></p>
	</td>
	</tr></table>
	</div>