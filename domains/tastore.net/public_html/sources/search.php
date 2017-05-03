<?php  if(!defined('_source')) die("Error");
			
	
			$tukhoa =  $_POST['keywords'];
			 $sql_product = "select * from #_products where  hienthi=1 ";
			if($tukhoa!='')
			{
			 $sql_product .= " and ten LIKE '%$tukhoa%'";			
			}
			
		
			$d->query($sql_product);
			$result_products = $d->result_array();	
			
			$tile_cat="Tìm kiếm "
			
	?>