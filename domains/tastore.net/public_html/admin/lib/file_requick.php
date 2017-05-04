<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	$trangchu_index = 0;
	switch($com){
						
		//Tin 1 nội dung
		case 'gioi-thieu':			
			$source = "about/about";
			$template = "about/about";
			break;
	
		case 'tim-kiem':
			$source = "search";
			$template = "product";
			break;										
			
			case 'xac-nhan-don-hang':
			$template = "xacnhandonhang";
			break;
		case 'dang-ky-san-pham':
			$source="dangkysanpham";
			$template = "dangkysanpham";
			break;		
		case 'ket-qua-dang-ky':
		  $template = "ketquadangky";
			break;												
			
		case 'hinh-anh':			
			$source = "hinhanh/hinhanh";
			$template = "hinhanh/hinhanh";
			break;		
		
		
					

      
		case 'san-pham':			
//			/$trangchu_index = 1;
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";	
			break;



		case 'blog':
			$trangchu_index = 1;
			$source = "tintuc";
			$template = isset($_GET['id']) ? "tintuc_detail" : "tintuc";	
			break;
		case 'ket-qua-thanh-toan':
		
			$source = "ketquathanhtoan";
			$template = "ketquathanhtoan";	
			break;	
		
		case 'thong-tin-mua-hang':
		
			$source = "baiviet";
			$template = isset($_GET['id']) ? "baiviet_detail" : "baiviet";	
			break;	
			
		case 'hoi-dap':
			$trangchu_index = 1;
			$source = "hoidap";
			$template = isset($_GET['id']) ? "hoidap_detail" : "hoidap";	
			break;
		case 'faq':
			$source = "faq";
			$template = isset($_GET['id']) ? "faq_detail" : "faq";	
			break;	
		
		case 'dat-hang':
			$source = "dathang";
			$template = isset($_GET['id']) ? "dathang_detail" : "dathang";	
			break;
				
		case 'lien-he':
			$trangchu_index = 1;
			$source = "contact";
			$template = "contact";	
			break;		
	
		case 'khuyen-mai':
			$trangchu_index = 1;
		
			$template ="products_item";	
			break;
						
		case 'gio-hang':
			$template = "giohang";
			break;
		case 'thanh-toan':
			$trangchu_index = 2;
			$source = "sanpham/thanhtoan";
			$template = "sanpham/thanhtoan";
			break;
		
		
		
		
		//ĐĂNG KÝ NHẬN TIN
		case 'dang-ky-nhan-tin':
			$source = "newsletter/newsletter";
			break;
		
		default: 			
			$trangchu_index = 1;
			$source = "index";
			$template = "index";
			break;
	}
	
	//CODE SÀI CHUNG CHO WEBSITE	
	//Thông tin Website
	$sql = "select * from #_company where com='company' limit 0,1";
	$d->query($sql);
	$company = $d->fetch_array();			
	
	$title_bar = $company['title'];
	$description = $company['description'];
	$keywords = $company['keywords'];
	
	if(isset($source)) {
        if ($source != "") include _source . $source . ".php";
    }
?>