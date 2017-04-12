<?php
require_once("antihack.php");

function filterVal($val)
{
	$theval=trim($val);
	$tmpval1=explode(" ", $theval);
	$tmpval2=explode("'", $tmpval1[0]);
	$tmpval3=explode("\"", $tmpval2[0]);
	$theval=mysql_real_escape_string($tmpval3[0]);
	return $theval;
}

//Filtering all $_GET values
$getkeys = array_keys($_GET);
$getvals = array();
foreach($_GET as $getval)
	array_push($getvals, filterVal($getval));
for($i=0; $i<count($_GET); $i++)
	$_GET[$getkeys[$i]] = $getvals[$i];
	
//Filtering all $_POST values
$postkeys = array_keys($_GET);
$postvals = array();
foreach($_GET as $postval)
	array_push($postvals, filterVal($postval));
for($i=0; $i<count($_GET); $i++)
	$_GET[$postkeys[$i]] = $postvals[$i];
?>