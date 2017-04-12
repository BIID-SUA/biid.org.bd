<?php
require_once("antihack.php");

function PageNav($query, $count, $pagenum, $dest="", $username="")
{
	if($count==NULL || $count<5)
		$count=10;
	if($pagenum==NULL || $pagenum<1)
		$pagenum=1;
	$data=mysql_query($query);
	$totalcount=mysql_num_rows($data);
	$limit=" LIMIT ".(($pagenum-1)*$count).",".$count;
	$query.=$limit;
	$data=mysql_query($query);
	$datacount=mysql_num_rows($data);
	
	$pagenavret='
	<script language="javascript">
	function reorderview(val)
	{
		document.getElementById("FrmNav").action+="&count="+val;
		document.getElementById("FrmNav").submit();
	}
	function gotopage()
	{
		totalpage='.(($totalcount==0)? '1' : (($totalcount%$count==0)? ($totalcount/$count) : (floor($totalcount/$count))+1)).';
		var pagenum=prompt("Enter a page number betwenn 1 to "+totalpage+" :","1");
		if(pagenum>0 && pagenum<=totalpage)
			window.location.replace("'.$dest.'&count='.$_REQUEST["count"].'&p="+pagenum);
		else
			alert("Invalid page number");
	}
	</script>
	<div align=center>
			<table width="" border="0" cellspacing="0" cellpadding="10" align="center" class="noborder">
			  <tr>
				<td valign="top" align="left">
				<form id="FrmNav" name="FrmNav" method="post" action="'.$dest.'">
				<table border="0" cellspacing="0" cellpadding="2">
				  <tr>
					<td align="center" valign="top">Display</td>
					<td align="center" valign="top">
					<select onchange="reorderview(this.value)">';
	for($i=5;$i<=50;$i+=5)
		$pagenavret.='<option value="'.$i.'" '.(($count==NULL && $i==10)? 'selected' : (($i==$count)? 'selected' : '')).'>'.$i.'</option>';
	$pagenavret.='
					</select>
					</td>
					<td valign="top">Records</td>
				  </tr>
				</table>
				</form>
				</td>
				<td valign="top" align="center">';
	$llimit=(($pagenum-1)*$count)+1;
	$ulimit=(($pagenum-1)*$count)+$datacount;
	if($totalcount==0)
		$recrange=0;
	elseif($llimit==$ulimit)
		$recrange=$llimit." of ".$totalcount;
	else
		$recrange=$llimit."-".$ulimit." of ".$totalcount;
	$pagenavret.='
					Showing Record(s) '.$recrange.'
				</td>
				<td valign="top" align="right">
					<a href="'.$dest.''.((!empty($username))? '&user='.$username : '').'&count='.$count.'&p=1" class="PageNav">
						<font color="#0000ff">&lsaquo;&lsaquo;</font>&nbsp;start
					</a>&nbsp;&nbsp;';
	if($pagenum!=NULL && $pagenum!=1)
	{
		$pagenavret.='
					<a href="'.$dest.''.((!empty($username))? '&user='.$username : '').'&count='.$count.'&p='.($pagenum-1).'" class="PageNav">
						<font color="#0000ff">&lsaquo;</font>&nbsp;previous
					</a>&nbsp;&nbsp;';
	}
	if($pagenum!=NULL && ($totalcount-$pagenum*$count>0))
	{
		$pagenavret.='
					<a href="'.$dest.''.((!empty($username))? '&user='.$username : '').'&count='.$count.'&p='.($pagenum+1).'" class="PageNav">
						next&nbsp;<font color="#0000ff">&rsaquo;</font>
					</a>&nbsp;&nbsp;';
	}
	$pagenavret.='
					<a href="'.$dest.''.((!empty($username))? '&user='.$username : '').'&count='.$count.'&p='.(($totalcount==0)? '1' : (($totalcount%$count==0)? ($totalcount/$count) : (floor($totalcount/$count))+1)).'" class="PageNav">
						end&nbsp;<font color="#0000ff">&rsaquo;&rsaquo;</font>
					</a>
				</td>
				<td valign="top" colspan="3">
					[ <a title="Goto Page..." href="javascript:gotopage()" class="PageNav">Goto</a> ]
				</td>
			  </tr>
			</table>
		</div>';
	return $pagenavret;
}//End or function
?>