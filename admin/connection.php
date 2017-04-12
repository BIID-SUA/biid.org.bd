<?php
	@mysql_connect($db_host, $db_user, $db_pass) OR
		die("Could Not Connect".mysql_error());
	
	@mysql_select_db($db_name) OR
		die("Error: Could not connect to the Database.");
?>