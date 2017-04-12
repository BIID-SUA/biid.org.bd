<?php
require_once("antihack.php");
require_once($includepath."pagenav.php");
require_once($adminsecuritycheck);

session_start();

if($_SESSION['ugroup'] != 1)
	$filter = "WHERE uid=".$_SESSION['uid'];
$where = !empty($filter)? $filter.' AND':'WHERE';

if(empty($_GET['event']))
{

if(empty($_GET['p']))
	$ppage = 1;
else
	$ppage = $_GET['p'];
if(empty($_GET['count']))
	$pcount = 10;
else
	$pcount = $_GET['count'];

$order = "ORDER BY id DESC";

$limit = "LIMIT ".(($ppage-1)*$pcount).", ".$pcount;

$qry = "SELECT * FROM bulletins $filter $order $limit";
$res = mysql_query($qry);
?>
<p class="heading" style="margin-left:20px;">
<div style="width:95%;margin-left:25px">
<div style="float:left" class="heading">Manage Bulletins:</div>
<div style="float:right">Total Bulletin(s): <?php echo mysql_num_rows(mysql_query("SELECT * FROM bulletins $filter $order"));?></div>
<br><br>
<div style="border-top:1px dashed #cccccc;padding-top:10px;" align="right"><a href="<?php echo $_SERVER['PHP_SELF'];?>?detail=manage_bulletin&event=addbulletin">Add New Bulletin</a>&nbsp;&nbsp;&nbsp;&nbsp;	</div>
<br>
</div>
</p>
<table border="1" cellspacing="0" cellpadding="5" width="95%" class="bordered" align="center">
	<tr style="background-color:#f5f5f5">
		<th align="left" style="padding:5px 10px 5px 10px"><div style="float:left;font-weight:bold">Title</div></th>
		<th align="left" style="padding:5px 10px 5px 10px">Date</th>
		<th colspan="4" style="border-bottom:1px solid #cccccc;border-right:1px solid #cccccc">Manage</th>
		<?php if(empty($_GET['cat_id'])){?>
		<?php }?>
	</tr>
	<?php if(mysql_num_rows($res) > 0){
		while($rs = mysql_fetch_assoc($res)){?>
	<tr>
		<td style="border-bottom:1px solid #cccccc;padding:5px 10px 5px 10px">
			<?php echo $rs['title'];?>
		</td>
		<td style="border-bottom:1px solid #cccccc;padding:5px 10px 5px 10px" align="center">
			<?php echo date("j F Y", strtotime($rs['bdate']));?>
		</td>
		<td align="center" style="border-bottom:1px solid #cccccc;">
			<table border="0" cellpadding="0" cellspacing="0" class="noborder">
				<td valign="middle"><a href="<?php echo $_SERVER['PHP_SELF'];?>?detail=manage_bulletin&event=editbulletin&bid=<?php echo $rs['id'];?>" title="Edit"><!-- img src="<?php echo $imagepath;?>edit.png"-->Edit</a>&nbsp;&nbsp;</td>
				<td valign="middle"><a href="javascript:if(confirm('Are you sure want to delete this Bulletin?')){location='<?php echo $_SERVER['PHP_SELF'];?>?detail=manage_bulletin&event=delbulletin&bid=<?php echo $rs['id'];?>'}" title="Delete"><!-- img src="<?php echo $imagepath;?>del.png" -->Delete</a></td>
		</table></td>
	</tr>
	<?php }}?>
	<tr>
		<td colspan="2" align="left" valign="middle" style="border-right:1px solid white">
			<div style="float:left"><?php echo PageNav("SELECT * FROM bulletins $filter $order", $pcount, $ppage, 'admincp.php?detail=manage_bulletin'.(!empty($_GET['cat_id'])?"&cat_id=".$_GET['cat_id']:""));?></div>	  </td>
	    <td align="right" valign="middle"><a href="<?php echo $_SERVER['PHP_SELF'];?>?detail=manage_bulletin&event=addbulletin<?php if(!empty($_GET['cat_id'])){echo "&image_cat=".$_GET['cat_id'];}?>">Add New Bulletin</a>&nbsp;&nbsp;</td>
	</tr>
</table>
<?php
}
elseif($_GET['event'] == 'addbulletin')
{
	if(isset($_POST['submitform']))
	{
		$uid = $_SESSION['uid'];
		$title = trim($_POST['title']);
		$desc = trim($_POST['desc']);
		$bdate = date("Y-m-d");
		if(!empty($title) && !empty($desc))
		{
			$qry = "INSERT INTO bulletins(uid, title, bdesc, bdate) VALUES('$uid', '$title', '$desc', '$bdate')";
			$ret = mysql_query($qry);
			if($ret != false)
			{
				$bid = mysql_insert_id();
				$up = move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadpath."bulletin/".$_FILES['image_file']['name']);
				if($up != false)
					mysql_query("UPDATE bulletins SET image='".$_FILES['image_file']['name']."' WHERE id=".$bid);
			}
			header("location: ".$_SERVER['PHP_SELF']."?detail=manage_bulletin");
		}
	}
?>
<script language="javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function ValidateForm()
{
	var errorlist = "";
	if(trim(document.frmAddBulletin.title.value) == "")
		errorlist = "\nPlease add a title of the bulletin.";
	if(trim(document.frmAddBulletin.desc.value) == "")
		errorlist += "\nPlease add description of the bulletin.";
		
	if(errorlist == "")
		return true;
	else
	{
		alert("Following errors have occured:\n"+errorlist);
		return false;
	}
}
</script>
<p class="heading" style="margin-left:20px;">
Add New Bulletin:
</p>
<table border="0" cellspacing="0" cellpadding="5" class="bordered" style="margin-left:20px;">
	<form name="frmAddBulletin" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm()">
	<tr>
		<td align="left" style="border-bottom:1px solid #cccccc;padding:5px 5px 5px 10px">Title: </td>
		<td style="border-bottom:1px solid #cccccc" align="left"><input type="text" class="text" size="50" name="title" id="title"></td>
	</tr>
	<tr>
		<td align="left" style="border-bottom:1px solid #cccccc;padding:5px 5px 5px 10px" valign="top">Description: </td>
		<td style="border-bottom:1px solid #cccccc" align="left">
			<textarea class="text" cols="50" rows="8" name="desc"></textarea></td>
	</tr>
	<tr>
		<td align="left" style="border-bottom:1px solid #cccccc;padding:5px 5px 5px 10px" width="80"><div id="upfiletag">Bulletin Image: </div></td><td style="border-bottom:1px solid #cccccc" align="left"><input type="file" class="text" size="30" name="image_file" id="image_file"></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" class="button" name="submitform" value="Add Bulletin">&nbsp;&nbsp;<input name="cancel" type="button" class="button" value="Cancel" onClick="location='<?php echo $_SERVER['PHP_SELF'];?>?detail=manage_bulletin'"></td>
	</tr>
	</form>
</table>
<script language="javascript">
document.frmAddBulletin.title.focus();
</script>
<?php
}
elseif($_GET['event'] == 'editbulletin')
{

	if(isset($_POST['submitform']))
	{
		$bid = $_GET['bid'];
		$title = trim($_POST['title']);
		$desc = trim($_POST['desc']);
		$bdate = date("Y-m-d", strtotime(trim($_POST['bdate'])));
		if(!empty($title) && !empty($desc))
		{
			$qry = "UPDATE bulletins SET title='$title', bdesc='$desc', bdate='$bdate' $where id=$bid";
			$ret = mysql_query($qry);
			if($ret != false && $_FILES['image_file']['name'] != '')
			{
				$qry = "SELECT * FROM bulletins $where id=$bid";
				$res = mysql_query($qry);
				$rs = mysql_fetch_assoc($res);
				$bimg = $rs['image'];
				$qry2 = "UPDATE bulletins SET image='' $where id=$bid";
				mysql_query($qry2);
				if(trim($bimg) != '')
					@unlink($uploadpath."bulletin/".$bimg);
				$up = move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadpath."bulletin/".$_FILES['image_file']['name']);
				if($up != false)
					mysql_query("UPDATE bulletins SET image='".$_FILES['image_file']['name']."' $where id=".$bid);
			}
			header("location: ".$_SERVER['PHP_SELF']."?detail=manage_bulletin");
		}
	}

	$bid = $_GET['bid'];
	$qry = "SELECT * FROM bulletins $where id=$bid";
	$res = mysql_query($qry);
	$rs = mysql_fetch_assoc($res);
?>
<script language="javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function ValidateForm()
{
	var errorlist = "";
	if(trim(document.frmAddBulletin.title.value) == "")
		errorlist = "\nPlease add a title of the bulletin.";
	if(trim(document.frmAddBulletin.desc.value) == "")
		errorlist += "\nPlease add description of the bulletin.";
		
	if(errorlist == "")
		return true;
	else
	{
		alert("Following errors have occured:\n"+errorlist);
		return false;
	}
}

$(function(){
	$("#b_date").datepick({dateFormat: 'd MM yy'});
});
</script>
<p class="heading" style="margin-left:20px;">
Edit Bulletin:
</p>
<table border="0" cellspacing="0" cellpadding="5" class="bordered" style="margin-left:20px;">
	<form name="frmAddBulletin" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm()">
	<tr>
		<td align="left" style="border-bottom:1px solid #cccccc;padding:5px 5px 5px 10px">Date: </td>
		<td style="border-bottom:1px solid #cccccc" align="left"><input type="text" class="text" size="50" name="bdate" id="b_date" value="<?php echo date("j F Y", strtotime($rs['bdate']));?>"></td>
	</tr>
	<tr>
		<td align="left" style="border-bottom:1px solid #cccccc;padding:5px 5px 5px 10px">Title: </td>
		<td style="border-bottom:1px solid #cccccc" align="left"><input type="text" class="text" size="50" name="title" id="image_name" value="<?php echo $rs['title'];?>"></td>
	</tr>
	<tr>
		<td align="left" style="border-bottom:1px solid #cccccc;padding:5px 5px 5px 10px" valign="top">Description: </td>
		<td style="border-bottom:1px solid #cccccc" align="left">
			<textarea class="text" cols="50" rows="8" name="desc"><?php echo $rs['bdesc'];?></textarea></td>
	</tr>
	<tr>
		<td align="left" style="border-bottom:1px solid #cccccc;padding:5px 5px 5px 10px" width="80" valign="top">Bulletin Image:</td><td style="border-bottom:1px solid #cccccc" align="left"><input type="file" class="text" size="30" name="image_file" id="image_file">
		<?php if(!empty($rs['image'])){?>
		<br><br>[ <a href="<?php echo $uploadpath."bulletin/".$rs['image'];?>" target="_blank">See Attached Image</a> ]&nbsp;&nbsp;&nbsp;[ <a href="<?php echo $_SERVER['PHP_SELF'];?>?detail=manage_bulletin&event=delimg&bid=<?php echo $bid;?>">Delete Attached Image</a> ]
		<?php }?>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" class="button" name="submitform" value="Update Bulletin">&nbsp;&nbsp;<input name="cancel" type="button" class="button" value="Cancel" onClick="location='<?php echo $_SERVER['PHP_SELF'];?>?detail=manage_bulletin'"></td>
	</tr>
	</form>
</table>
<script language="javascript">
document.frmAddBulletin.title.focus();
</script>
<?php
}
elseif($_GET['event'] == 'sort')
{

	$move = $_GET['move'];
	$image_id = $_GET['image_id'];
	$image_order = $_GET['order'];
	$image_cat = $_GET['image_cat'];
	if($move == "down")
		$qry = "SELECT * FROM bulletins WHERE image_order < $image_order AND image_cat=$image_cat ORDER BY image_order DESC LIMIT 1";
	elseif($move == "up")
		$qry = "SELECT * FROM bulletins WHERE image_order > $image_order AND image_cat=$image_cat ORDER BY image_order ASC LIMIT 1";
	
	$res = mysql_query($qry);
	if(mysql_num_rows($res)>0){
		//mysql_data_seek($res, 1);
		$rs = mysql_fetch_assoc($res);
		$pagetomoveto = $rs['image_order'];
		$sqlmovefar="UPDATE bulletins SET image_order = 99 WHERE id = $image_id";
		$movefar = mysql_query($sqlmovefar) or die ("Cant move entry far");
		$sqlmove2="UPDATE bulletins SET image_order = ".$image_order." WHERE id = ".$rs['id'];
		$move2 = mysql_query($sqlmove2)or die ("Cant move replacement entry");
		$sqlmove="UPDATE bulletins SET image_order = $pagetomoveto WHERE id = $image_id";
		$move = mysql_query($sqlmove)or die ("Cant move entry into position");
	}

	header("location: ".$_SERVER['PHP_SELF']."?detail=manage_bulletin".(!empty($_GET['image_cat'])? '&cat_id='.$_GET['image_cat'] : '').(!empty($_GET['count'])? '&count='.$_GET['count'] : '').(!empty($_GET['p'])? '&p='.$_GET['p'] : ''));
	
	//echo $qry."<br>".$sqlmovefar."<br>".$sqlmove2."<br>".$sqlmove;
}
elseif($_GET['event'] == 'delbulletin')
{
	$bid = $_GET['bid'];
	$qry = "SELECT * FROM bulletins $where id=$bid";
	$res = mysql_query($qry);
	$rs = mysql_fetch_assoc($res);
	$bimg = $rs['image'];
	$qry2 = "DELETE FROM bulletins $where id=$bid";
	mysql_query($qry2);
	if(trim($bimg) != '')
		@unlink($uploadpath."bulletin/".$bimg);
	header("location: ".$_SERVER['PHP_SELF']."?detail=manage_bulletin");
}
elseif($_GET['event'] == 'delimg')
{
	$bid = $_GET['bid'];
	$qry = "SELECT * FROM bulletins $where id=$bid";
	$res = mysql_query($qry);
	$rs = mysql_fetch_assoc($res);
	$bimg = $rs['image'];
	$qry2 = "UPDATE bulletins SET image='' $where id=$bid";
	mysql_query($qry2);
	if(trim($bimg) != '')
		@unlink($uploadpath."bulletin/".$bimg);
	header("location: ".$_SERVER['PHP_SELF']."?detail=manage_bulletin&event=editbulletin&bid=".$bid);
}
?>