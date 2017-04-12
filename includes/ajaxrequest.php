<?php
$sitebase="../";
require_once($sitebase."admin/adminconfig.php");
require_once($adminsecuritycheck);
?>
<link rel="stylesheet" type="text/css" href="<?php echo $stylemain?>">
<?php
if(!empty($_GET['detail']) && file_exists($includepath.strtolower($_GET['detail']).".php"))
	require_once($includepath.strtolower($_GET['detail']).".php");
?>