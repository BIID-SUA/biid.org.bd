<?php
require_once("antihack.php");
?>
<p>
<table border="0" cellspacing="0" cellpadding="8" width="400" style="margin-left:20px;">
	<tr>
		<td style="border:1px solid #cccccc;border-bottom:0" width="120" align="center"><span class="heading">Welcome Admin</span></td><td valign="bottom" style="padding:0px 0px 0px 0px;" width="280"><div style="width:100%;border-bottom:1px solid #cccccc"></div></td>
	</tr>
	<tr>
		<td colspan="2" style="border:1px solid #cccccc;border-top:0;padding:8px 8px 8px 8px">
			<div style="background-color:#f7f7f7;padding:3px 0px 3px 15px;left:0">Pick a task below:</div>
			<ul style="list-style-type:square;line-height:20px;padding-left:50px;">
				<li>&nbsp;&nbsp;<a href="admincp.php?detail=manage_bulletin&event=addbulletin">Add New Bulletins</a></li>
				<li>&nbsp;&nbsp;<a href="../">Home</a></li>
				<li>&nbsp;&nbsp;<a href="javascript:if(confirm('Are you sure want to logout from control panel?')){location='../logout.php';}">Logout</a></li>
			</ul>
		</td>
	</tr>
</table>
</p>