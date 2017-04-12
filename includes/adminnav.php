<?php
require_once("antihack.php");

require_once($mainconn);
$qry = "SELECT * FROM adminnav ORDER BY sort_order ASC";
$res = mysql_query($qry);
?>
<p>
	<?php if(mysql_num_rows($res) > 0){?>
	<ul class="categories" style="position:relative;top:0px;list-style-type:none">
		<?php while($rs = mysql_fetch_assoc($res)){?>
		<li><img src="<?php echo $imagepath;?>dot.jpg">&nbsp;&nbsp;<a href="<?php echo $rs['navurl'];?>"><?php echo $rs['navtitle'];?></a></li>
		<?php }?>
	</ul>
	<?php }?>
</p>