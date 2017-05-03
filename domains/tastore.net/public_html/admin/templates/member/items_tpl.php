<h3><a href="index.php?com=member&act=add">Quản lý thành viên</a></h3>

<table class="blue_table">
	<tr>
		<th>Stt</th>
		<th>Email</th>
		<th>Kích hoạt</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$i+1?></td>		
		<td style="width:38%;">
			<a href="index.php?com=member&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>">
				<?=$items[$i]['email']?>
            </a>
        </td>
		<td style="width:6%;">
			<a href="index.php?com=member&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>">
			<?php if(@$items[$i]['hienthi']){?>
            	<img src="media/images/active_1.png" />
			<? }else{?>
            	<img src="media/images/active_0.png" />
			<? }?>
        	</a>
        </td>
		<td style="width:6%;"><a href="index.php?com=member&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=member&act=delete&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=member&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>