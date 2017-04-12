<?php
$contents = ob_get_contents();
ob_end_clean();

echo $contents;
?>