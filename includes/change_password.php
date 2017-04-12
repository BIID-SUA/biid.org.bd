<?php
require_once("antihack.php");
require_once($adminsecuritycheck);
if(isset($_POST['submitform']))
{
	$oldpass = $_POST['oldpass'];
	$newpass = $_POST['newpass'];
	$qry = "SELECT * FROM admin_config WHERE id=".$_SESSION['uid'];
	$res = mysql_query($qry);
	$rs = mysql_fetch_assoc($res);
	if($rs['upass'] == sha1($oldpass))
	{
		mysql_query("UPDATE admin_config SET upass='".sha1($newpass)."' WHERE id=".$_SESSION['uid']);
		$msg = "<span style='color:green;font-size:12px;'>Your new password has been set successfully.</span>";
	}
	else
		$msg = "<span style='color:red;font-size:12px;'>Wrong password was given for the current password entry. Please try again.</span>";
}
?>
<p class="heading" style="margin-left:20px;"> Change Password:
</p>
<table border="1" cellspacing="0" cellpadding="5" class="bordered" style="margin-left:20px;">
	<form name="cpform" method="post" onSubmit="return ValidateForm()">
	<tr>
		<td align="right" style="padding:5px 5px 5px 10px">Your Current Password : </td>
		<td style="border-bottom:1px solid #cccccc" align="left"><input type="password" class="text" size="30" name="oldpass"></td>
	</tr>
	<tr>
		<td align="right" style="padding:5px 5px 5px 10px">Your New Password : </td>
		<td style="border-bottom:1px solid #cccccc" align="left"><input type="password" class="text" size="30" name="newpass"></td>
	</tr>
	<tr>
		<td align="right" style="padding:5px 5px 5px 10px">Re-type New Password : </td>
		<td style="border-bottom:1px solid #cccccc" align="left"><input type="password" class="text" size="30" name="repass"></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" class="button" name="submitform" value="Set New Password">&nbsp;&nbsp;<input type="button" class="button" value="Cancel" onClick="location='<?php echo $_SERVER['PHP_SELF'];?>'"></td>
	</tr>
	</form>
</table>
<br>
<?php
if(!empty($msg)){ echo "<p style='margin-left:20px;'>$msg</p>";}
?>
<script language="javascript">
document.cpform.oldpass.focus();

function ValidateForm()
{
	var errorlist = "";
	if(document.cpform.newpass.value != document.cpform.repass.value)
		errorlist = "\nPlease re-type the new password carefully.";
		
	if(errorlist == "")
		return true;
	else
	{
		alert(errorlist);
		return false;
	}
}
</script>