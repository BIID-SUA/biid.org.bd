<?php
require_once("antihack.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
<head>
<base href="<?php echo $siteurl;?>" />
<title>
<?php
echo $pagetitle;
if(empty($_GET['detail']))
	echo ": Index";
else
	echo ": ".strtoupper(substr($_GET['detail'], 0, 1)).strtolower(substr(str_replace('_',' ',$_GET['detail']), 1));
?>
</title>
<?php echo $pagemeta;?>
<link rel="stylesheet" type="text/css" href="<?php echo $stylemain?>">
<script language="javascript" type="text/javascript" src="<?php echo $scriptpath;?>jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $scriptpath;?>jquery-ui-1.7.1.custom.min.js"></script>
</head>

<body>
<div id="wrapper">
<table width="872" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="3"><img src="images/banner_top.jpg"></td>
  </tr>
  <tr>
    <td width="6" background="images/left_bg.jpg"></td>
    <td width="860" align="center">
		
		<div style="width:860px;height:200px;overflow:hidden">
			<embed width="860" height="200" style="#width:868px;#margin-left:-4px;" src="images/header.swf" align="center"><noembed>Bangladesh Institute of ICT in Developement</noembed>
		</div>
		
		<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="margin-top:2px;">
		  <tr>
			<td width="179" background="images/top_title_bg_1.jpg" height="19">&nbsp;</td>
			<td width="2"></td>
			<td background="images/top_title_bg_2.jpg" height="19" valign="middle">
				<table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td><img src="images/arrow2.jpg"></td>
					<td style="color:white;font-size:11px;">
					<?php
					switch($_GET['detail']){
						case 'about':
							echo 'ABOUT BIID';
							break;
							
						case 'competence':
							echo 'CORE COMPETENCE';
							break;
							
						case 'service':
							echo 'SERVICE &amp; SECTORS';
							break;
							
						case 'clients':
							echo 'CLIENTS &amp; PARTNERS';
							break;
							
						case 'achievements':
							echo 'ACHIEVEMENTS';
							break;
							
						case 'activities':
							echo 'ONGOING ACTIVITIES';
							break;
							
						case 'management':
							echo 'MANAGEMENT';
							break;
							
						case 'contact':
							echo 'CONTACT';
							break;
							
						case 'feedback':
							echo 'FEEDBACK';
							break;

						case 'bulletin_detail':
							echo 'BULLETIN';
							break;

						default:
							echo 'HOME';
							break;
					}
					?>
					</td>
				  </tr>
				</table>
			</td>
			<td width="2"></td>
			<td width="230" background="images/top_title_bg_3.jpg" height="19" valign="middle">
				<table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td><img src="images/arrow2.jpg"></td>
					<td style="color:white;font-size:11px;">NEWS BULLETIN</td>
				  </tr>
				</table>
			</td>
		  </tr>
		  <tr>
			<td nowrap valign="top" width="179">
				<div id="menu_left">
				<?php require_once($sidebar);?>
				</div>
			</td>
			<td width=""></td>
			<td valign="top" >
				<div id="content">
				<?php 
					if(!empty($_GET['detail']) && file_exists($includepath.strtolower($_GET['detail']).".php"))
						require_once($includepath.strtolower($_GET['detail']).".php");
					elseif(empty($_GET['detail']))
						require_once($includepath."content_main.php");
					else
						echo '<b>Content not found.</b>';
				?>
				</div>
			</td>
			<td width="2"></td>
			<td align="right" valign="top" width="230">
				<div id="news_panel">
				<?php require_once($includepath."bulletin.php");?>
				</div>
			</td>
		  </tr>
		</table>

	</td>
    <td width="6" background="images/right_bg.jpg"></td>
  </tr>
  <tr>
    <td width="6" height="40" background="images/left_bg.jpg"></td>
    <td width="860" height="40" align="center"></td>
    <td width="6" height="40" background="images/right_bg.jpg"></td>
  <tr>
  <tr>
    <td colspan="3"><img src="images/footer_bg.jpg"></td>
  </tr>
  <tr>
  	<td colspan="3" valign="top" align="left"><div class="footer" style="margin:-2px 0 0 12px">&copy; Copyright BIID. Powered by ZANALA Bangladesh Ltd.</div></td>
  </tr>
</table>
</div>
</body>
</html>