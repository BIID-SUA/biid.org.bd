<?php
require_once("antihack.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
<head>
<base href="<?php echo $siteurl;?>" />
<title><?php echo $pagetitle;?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $stylemain?>">
<script language="javascript" type="text/javascript" src="<?php echo $scriptpath;?>jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $scriptpath;?>jquery.datepick.js"></script>
<?php echo $pagemeta;?>
<link rel="stylesheet" type="text/css" href="<?php echo $scriptpath;?>jquery.datepick.css">
<!-- script>

$(function() {		
		
	// if function argument is given to overlay it is assumed onBeforeLoad event listener
	$("a[rel]").overlay({

		// start exposing when overlay starts to load
		onBeforeLoad: function() {
			// this line does the magic. it makes the background image sit on top of the mask
			this.getBackgroundImage().expose({color: '#fff'});

		// grab wrapper element inside content
		var wrap = this.getContent().find("div.wrap");
		
		// load only for the first time it is opened
		if (wrap.is(":empty")) {			
			wrap.load(this.getTrigger().attr("href"));	
		}		

		}, 
		
		// when overlay is closed take the expose instance and close it as well
		onClose: function() {
			$.expose.close();
		}
	});			
});
</script -->
</head>

<body style="overflow:auto">
<div id="wrapper" class="wrapper">
	<div id="banner_top" class="banner_top">
	<?php
	require_once($bannerpage);
	?>
	</div>
	<div id="content_wrapper" class="content_wrapper" align="center">
		<table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
			<tr><td colspan="2" height="10"></td></tr>
			<tr>
				<td width="150" align="left" valign="top">
					<div id="sidebar" class="sidebar" style="width:200px;">
						<br>
						<?php require_once($sidebar);?>
					</div>
				</td>
				<td valign="top">
					<div style="width:5px;height:100%" align="left"><div style="width:5px;height:500px;border-right:1px dashed #cccccc;"></div></div>
				</td>
				<td align="left" valign="top">
					<br>
					<div id="content" class="content" align="left">
						<?php 
							if(!empty($_GET['detail']) && file_exists($includepath.strtolower($_GET['detail']).".php"))
								require_once($includepath.strtolower($_GET['detail']).".php");
							else
								require_once($includepath."admin_content_main.php");
						?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
</body>
</html>