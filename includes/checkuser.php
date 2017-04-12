<?php
$sitebase = "../";
require_once("../admin/config.php");
require_once($mainconn);

if($_GET['check'] == 'user')
	$qry = "SELECT * FROM userinfo WHERE uname='".$_GET['user']."'";
elseif($_GET['check'] == 'email')
	$qry = "SELECT * FROM userinfo WHERE email='".$_GET['email']."'";

$res = mysql_query($qry);

if(mysql_num_rows($res) > 0)
	echo 'exist';
else
	echo 'new';
?>