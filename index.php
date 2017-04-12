<?php
$sitebase="";
require_once("admin/config.php");
require_once($mainconn);
require_once($includepath."request_secure.php");
require_once($headerpage);
//************** TEMPLATE LOADER : START ****************/
require_once($maintemplate);
//************** TEMPLATE LOADER : END ******************/
require_once($footerpage);
?>