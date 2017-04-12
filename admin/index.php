<?php
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) || empty($_SESSION['ugroup']))
{
require_once("adminconfig.php");
require_once($includepath."encryption.php");
require_once($headerpage);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" >
<head>
<title><?php echo $pagetitle;?></title>
<?php echo $pagemeta;?>
<link rel="stylesheet" type="text/css" href="<?php echo $stylemain?>">
</head>

<body style="overflow:auto" onload="document.getElementById('username').focus()">
<div id="wrapper" class="wrapper">
	<div id="content_wrapper" class="content_wrapper_admin" style="position:relative;top:200px;" align="center">
	<form action="<?php echo $includepath;?>adminlogin.php" method="post">
		<table width="350" cellpadding="5" cellspacing="0" border="0" style="border:1px solid #cccccc" align="center">
			<tr>
			  <td colspan="3" align="left" style="padding:10px 5px 10px 5px;border-bottom:1px dashed #cccccc;"><span class="heading">&nbsp;&nbsp;<img src="<?php echo $imagepath;?>arrow_right.gif">&nbsp;&nbsp;Admin Login</span></td>
			</tr>
			<tr><td colspan="3" height="10"></td></tr>
			<tr><td align="right">Username:</td><td width="5">&nbsp;</td><td align="left"><input class="text" type="text" name="username" id="username" size="30"></td></tr>
			<tr><td align="right">Password:</td><td width="5">&nbsp;</td><td align="left"><input class="text" type="password" name="password" size="30"></td></tr>
			<tr><td colspan=2>&nbsp;</td><td align="left"><input class="button" type="submit" name="login" value="Login"></td></tr>
			<tr><td colspan="3" height="10"></td></tr>
			<?php
			if(!empty($_GET['msg'])){
			?>
			<tr><td colspan="3" align="center"><span style="color:#FF5B5B;font-weight:bold"><?php echo urldecode($_GET['msg']);?></span></td></tr>
			<tr><td colspan="3" height="10"></td></tr>
			<?php
			}
			?>
		</table>
		<input type="hidden" name="returnpath" value="../admin/index.php">
	</form>
	</div>
</div>
</body>
</html>
<?php
	require_once($footerpage);
}
else
{
	header("location: admincp.php");
}
?>