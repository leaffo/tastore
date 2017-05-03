<?
	function get_product_photo($pid){
		global $d, $row;
		$sql = "select thumb from #_products where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['thumb'];
		
		}
function get_product_allinfo($pid){
		global $d, $row;
		$sql = "select * from #_products where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row;
		
		}	

	function get_product_name($pid){
		global $d, $row;
		$sql = "select ten from #_products where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten'];
	}
	
	function get_tinhthanh($tinthanh){
		global $d, $row;
		$sql = "select ten from #_tinhthanh_item where id='".$tinthanh."'";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten'];
	}
	
	function get_quanhuyen($quanhuyen){
		global $d, $row;
		$sql = "select ten from #_tinhthanh where id='".$quanhuyen."'";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten'];
	}
	
	
	function get_product_img($pid){
		global $d, $row;
		$sql = "select thumb from #_products where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['thumb'];
	}
	
	function get_price($pid){
		global $d, $row;
		$sql = "select gia from table_products where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['gia'];
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$size=$_SESSION['cart'][$i]['size'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	function get_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$size=$_SESSION['cart'][$i]['size'];

			$sum+=$q;
		}
		return $sum;
	}
	
	
	function addtocart($pid,$q,$size){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid,$q)) return;
			$max=count($_SESSION['cart']);
			 $_SESSION['cart'][$max]['productid']=$pid;
			 $_SESSION['cart'][$max]['qty']=$q;
             $_SESSION['cart'][$max]['size']=$size;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
            $_SESSION['cart'][0]['size']=$size;
		}
	}
	function product_exists($pid,$q){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$_SESSION['cart'][$i]['qty'] = $q; 
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>