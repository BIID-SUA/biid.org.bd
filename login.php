<?php
session_start();
require_once("admin/config.php");
//require_once($includepath."encryption.php");
require_once($mainconn); 

$strLogin=$_POST["submitlogin"];
$strLoginName=trim(strtolower($_POST["username"]));
$strTmpName=explode(" ", $strLoginName);
$strTmpName2=explode("'", $strTmpName[0]);
$strTmpName3=explode("\"", $strTmpName2[0]);
$strLoginName=mysql_real_escape_string($strTmpName3[0]);
$strPassword=$_POST["password"];
$autologin=$_POST["chkautologin"];
$returnpath=$_POST["returnpath"];

$qry="select * from userinfo where uname='".$strLoginName."'";
$data=mysql_query($qry);
$rs=mysql_fetch_assoc($data);

if($strLogin=='Sign In')
{			
	if(mysql_num_rows($data)!=0)
	{
		if($rs["isactive"]==1)
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
				
				//session.Timeout=480								
				//session_cache_expire(480);
				
				$qry = "UPDATE userinfo SET lastvisit='".date("Y-m-d")."', ip='".$_SERVER['REMOTE_ADDR']."' WHERE id=".$uid;
				mysql_query($qry);
				
				header("location: usercp/");
			}
			else //'Invalid Password
				header("location: ".$_POST['returnpath']."?msg=".urlencode("Invalid Username or Password"));
		}
		else //' inactive user
			header("location: ".$_POST['returnpath']."?msg=".urlencode("User account is suspended"));
	}
	else //' Invalid UserName
		header("location: ".$_POST['returnpath']."?msg=".urlencode("Invalid Username or Password"));
		
}
else
{
	die("Hacking attempt!! Your IP has been logged. Do not try this again.");
}
?>