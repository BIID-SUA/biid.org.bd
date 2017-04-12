<?php
require_once("antihack.php");

$bid = $_GET['bid'];
$qry = "SELECT * FROM bulletins WHERE id=".$bid;
$res = mysql_query($qry);
$rs = mysql_fetch_assoc($res);
?>
<table border="0" cellspacing="3" cellpadding="0">
  <tr>
    <td align="left" class="heading"><?php echo $rs['title'];?><br><div style="color:#999999;font-size:11px;font-weight:normal;margin-top:5px;">Published on: <?php echo date("j F Y", strtotime($rs['bdate']));?></div></td>
  </tr>
  <tr>
    <td height="8">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">
	<?php if(!empty($rs['image'])){?><img src="<?php echo $uploadpath;?>bulletin/<?php echo $rs['image'];?>" width="200" align="left" style="padding:0px 20px 5px 0px"><?php }?>
	<?php echo str_replace("\n","<br>",$rs['bdesc']);?>
	</td>
  </tr>
</table>