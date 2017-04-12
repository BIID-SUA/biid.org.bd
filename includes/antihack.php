<?php
/*echo SITEID;
echo "<br>";
echo SITEID2;
echo "<br>";
echo sha1(strtolower($_SERVER['HTTP_HOST']));
echo "<br>";
echo sha1(strtolower($_SERVER['HTTP_HOST']));
echo "<br>";
echo strtolower($_SERVER['HTTP_HOST']);
echo "<br>";*/
if(!defined('SITEID') || !defined('SITEID2') || (SITEID != sha1(strtolower($_SERVER['HTTP_HOST'])) && SITEID2 != sha1(strtolower($_SERVER['HTTP_HOST']))))
	die("<div align='center' style='padding-top:250px;'><table border=0 style='border:1px solid black;padding:10px' align='center' width='400'><tr><td rowspan=2><img src='../images/warning.gif'>&nbsp;&nbsp;</td><td><div align='left' style='font-family:verdana;font-size:13px;font-weight:bold;color:red'>Hacking attempt!! Your IP has been logged.</div></td></tr><tr><td><div style='font-family:verdana;font-size:13px;font-weight:bold;color:blue' align='left'>Do not try this again.</div></td></tr></table></div>");
?>