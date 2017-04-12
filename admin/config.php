<?php
//session_start();

define("SITEID", sha1("www.biid.org.bd"));
define("SITEID2", sha1("biid.org.bd"));
//define("SITEID2",  sha1("localhost"));
//define("SITEID", sha1("192.168.0.50"));

$adminemail="support@biid.org.bd";
//$siteurl="http://localhost/BIID/";
$siteurl="http://www.biid.org.bd/";

//$sitebase="";
$scriptpath=$sitebase."scripts/";
$imagepath=$sitebase."images/";
$uploadpath=$sitebase."files/";
$imguploadpath=$sitebase."photos/";
$imgupthumbpath=$imguploadpath."thumb/";
$includepath=$sitebase."includes/";

$stylemain=$scriptpath."styles.css";
$printstyle=$scriptpath."print.css";
$headerpage=$includepath."header.php";
$footerpage=$includepath."footer.php";
$bannerpage=$includepath."banner_main.php";
$maintemplate=$includepath."template_main.php";
$sidebar=$includepath."sidebar.php";
$mainconn=$sitebase."admin/connection.php";
$usersecuritycheck=$includepath."usercheck.php";

$db_host="localhost";
$db_user="biidorg_db";
$db_pass="b!91!d";
$db_name="biidorg_db";

$pagetitle="Bangladesh Institute of ICT in Developement (BIID)";
//Initialize page meta
eval(base64_decode('ZXZhbCgnJGE9YmFzZTY0X2RlY29kZSgiUEUxRlZFRWdUa0ZOUlQwaVFWVlVTRTlTSWlCamIyNTBaVzUwUFNKU1lYbHViR1Z5SUVGdWFtRnVJRkp2ZVN3Z1JHaGhhMkVpUGc9PSIpOycpOw=='));
$pagemeta='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="KEYWORDS" CONTENT="Bangladesh, Institute, ICT, Developement, BIID, biid">
<META NAME="DESCRIPTION" content="Bangladesh Institute of ICT in Developement (BIID)">';
$pagemeta.="$a<META NAME='PUBLISHER' content='Zanala Bangladesh Ltd., Dhaka'>
<META NAME='ROBOTS' content='index,follow'>
<META NAME='RATING' content='General'>
<META NAME='REVISIT-AFTER' content='20 Days'>
";
$copyrighttext = '&copy; Copyright '.date("Y").' BIID. Powered by ZANALA Bangladesh Ltd.';
?>