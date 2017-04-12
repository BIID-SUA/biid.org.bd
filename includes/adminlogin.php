<?php
//session_start();
$sitebase="../";
require_once("../admin/config.php");
require_once($mainconn); 

$strLogin=$_POST["login"];
$strLoginName=trim(strtolower($_POST["username"]));
$strTmpName=explode(" ", $strLoginName);
$strTmpName2=explode("'", $strTmpName[0]);
$strTmpName3=explode("\"", $strTmpName2[0]);
$strLoginName=mysql_real_escape_string($strTmpName3[0]);
$strPassword=$_POST["password"];
$autologin=$_POST["chkautologin"];
$returnpath=$_POST["returnpath"];

$qry="select * from admin_config where uname='".$strLoginName."'";
$data=mysql_query($qry);
$rs=mysql_fetch_assoc($data);

if(isset($strLogin))
{
	if(mysql_num_rows($data)!=0)
	{
		if (sha1($strPassword)==$rs["upass"]) 
		{	
			//'get validated UserName and GroupName					
			$uid=$rs["id"];
			$uname=$rs["uname"];
			$group=$rs["ugroup"];
			
			session_register("uid");
			session_register("uname");
			session_register("ugroup");
			$_SESSION["uid"]=$uid;
			$_SESSION["uname"]=$uname;
			$_SESSION["ugroup"]=$group;
			
				header("Location: ../admin/admincp.php");
		}
		else //'Invalid Password
			header("location: $returnpath?msg=".urlencode("Invalid username or password"));
	}
	else //' Invalid UserName
		header("location: $returnpath?msg=".urlencode("Invalid username or password"));
		
}
else
{
	die("<div align='center' style='padding-top:250px;'><table border=0 style='border:1px solid black;padding:10px' align='center' width='400'><tr><td rowspan=2><img src='../images/warning.gif'>&nbsp;&nbsp;</td><td><div align='left' style='font-family:verdana;font-size:13px;font-weight:bold;color:red'>Hacking attempt!! Your IP has been logged.</div></td></tr><tr><td><div style='font-family:verdana;font-size:13px;font-weight:bold;color:blue' align='left'>Do not try this again.</div></td></tr></table></div>");
}
?>