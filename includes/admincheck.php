<?php
session_start();
require_once("antihack.php");
if(empty($_SESSION['uid']) || empty($_SESSION['uname']) || empty($_SESSION['ugroup']) || ($_SESSION['ugroup'] != 1))
	header("location: $siteurl");
?>