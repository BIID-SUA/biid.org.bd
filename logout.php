<?php
session_start();
session_unset();
session_destroy();
//setcookie("GZL_Cookie", "", time()-86400);

header("Location: index.php");
?>