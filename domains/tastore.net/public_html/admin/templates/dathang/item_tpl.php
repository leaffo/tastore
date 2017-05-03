<h3>Thông tin đặt hàng</h3>
<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:10%;">Họ tên</th>  
		<th style="width:10%;">Email</th>  
        <th style="width:10%;">Tình trạng</th>  
        <!--<th style="width:10%;">Số lượng</th>  
        <th style="width:10%;">Giá bán</th>  
        <th style="width:10%;">Tổng giá</th>  -->
		<th style="width:6%;">Chi tiết</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$i+1?></td>
		<td style="width:10%;" align="center"><a href="index.php?com=dathang&act=edit&id=<?=$items[$i]['id']?><?=($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''?>" style="text-decoration: none;"><?=$items[$i]['hoten']?></a></td>
        <td style="width:10%;" align="center"><a href="index.php?com=dathang&act=edit&id=<?=$items[$i]['id']?><?=($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''?>" style="text-decoration: none;"><?=$items[$i]['email']?></a></td>
        <td style="width:10%;" align="center">
			<?php
				$sql="select * from table_product_phu where com='tinhtrang' order by stt,id desc";
				$d->query($sql);
				$toado = $d->fetch_array();	
				echo $toado['ten'];
			?>
        </td>
        <!--<td style="width:10%;" align="center"><?=$items[$i]['soluong']?></td>
        <td style="width:10%;" align="center"><?=$items[$i]['giaban']?></td>
        <td style="width:10%;" align="center"><?=doubleval($items[$i]['soluong'])*doubleval($items[$i]['giaban'])?></td>  -->    

		<td style="width:6%;"><a href="index.php?com=dathang&act=edit&id=<?=$items[$i]['id']?><?=($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=dathang&act=delete&id=<?=$items[$i]['id']?><?=($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<div class="paging"><?=$paging['paging']?></div>