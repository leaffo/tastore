<?php	
	
	@define ( '_lib' , '../lib/');
	

	include_once _lib."config.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);			
	
	$id = intval(trim($_REQUEST['id']));
	$truong = htmlspecialchars(strip_tags(addslashes(trim($_REQUEST['truong']))));
	$table = htmlspecialchars(strip_tags(addslashes(trim($_REQUEST['table']))));
		
	$sql_sp = "SELECT $truong FROM $table where id=$id";
	$d->query($sql_sp);
	$cats= $d->fetch_array();					
	$spdc1=$cats[$truong];
	
	?>
	
	
    <script>
		$(document).ready(function(e) {
			$(".ajax_hanhdong a").click(function(e) {
				var id = ''; var truong = ''; var table = ''; var id_cha = '';
				id = $(this).attr('href');
				truong = $(this).attr('truong');
				table = $(this).attr('table');  
				id_cha = $(this).parents('div.ajax_hanhdong:first');                       	
				$.ajax({
					url:'ajax/hienthi.php',
					type:'get',
					data:'id='+id+'&truong='+truong+'&table='+table,
					dataType:'html',
					success:function(data){							    
						if(data != ''){				    
							$(id_cha).html(data);  
							ajax_hienthi();                                                                     						
						}															                               
					}
				});
				return false;
			});
		});
	</script>
    
    
	
	
	<?php
	
	
	if($spdc1==0){
		$sqlUPDATE_ORDER = "UPDATE $table SET $truong = 1 WHERE  id = $id";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else{
		$sqlUPDATE_ORDER = "UPDATE $table SET $truong = 0  WHERE  id = $id";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");	
	}	
	$d->reset();
	$sql_sp = "SELECT * FROM $table where id=$id";
	$d->query($sql_sp);
	$v= $d->fetch_array();
	
	/*if($truong=='hienthi'){
		if($cats[$truong]==1){
			echo '<a href="'.$id.'" truong="'.$truong.'" table="'.$table.'"><img src="media/images/active_1.png" border="0" /></a>';			
		}
		else{
			echo '<a href="'.$id.'" truong="'.$truong.'" table="'.$table.'"><img src="media/images/active_0.png" border="0" /></a>';			
		}
	}
	else{
		if($cats[$truong]==1){
			echo '<a href="'.$id.'" truong="'.$truong.'" table="'.$table.'"><img src="media/images/yes-km.gif" border="0" /></a>';			
		}
		else{
			echo '<a href="'.$id.'" truong="'.$truong.'" table="'.$table.'"><img src="media/images/no-km.gif" border="0" /></a>';			
		}
	}			*/
?>




    <a href="<?=$v['id']?>" truong="hienthi" table='table_product_cat'>
    		<img src="<?=($v['hienthi']==1)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" />
    </a>