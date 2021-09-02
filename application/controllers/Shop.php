<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('shop_helper');
		$this->SessionModel->checkshoplogin(array("login","loginajax"));
	}

	public function index()
	{
		$data = array();
		$whr = " WHERE status = 1 and delivery_status=4 and seller_id = ".shopsessionShopid()."";
		$data['ordersByMonth'] = $this->Common_model->getOrdersByMonth($whr);
		// print_r($data['ordersByMonth']);
		// die;
		// $data['ordersByMonth'] = array('years' => array_unique(array('2019','2020')),'orders' => array('2019'=>array('1'=>9,'2'=>9,'3'=>9,'4'=>9,'5'=>9,'6'=>9,'7'=>9,'8'=>9,'9'=>9,'10'=>9,'11'=>9,'12'=>1),'2020'=>array('1'=>9,'2'=>9,'3'=>9,'4'=>9,'5'=>9,'6'=>9,'7'=>9,'8'=>9,'9'=>9,'10'=>9,'11'=>9,'12'=>1)));
		$this->load->view('shop/header');
		$this->load->view('shop/dashboard',$data);
		$this->load->view('shop/footer');
	}

	public function login(){
		$edata = array();
		$this->load->view('shop/login_header');
		$this->load->view('shop/login');
		$this->load->view('shop/login_footer');
	}

	public function loginajax()
	{
		$mobc=$_POST['country_code'].$_POST['mobile_no'];
		$mobile_no = base64_encode(trim($mobc));
		$password = md5(trim($_POST['password']));
		if(isset($mobile_no) && !empty($mobile_no) && isset($password) && !empty($password))
		{
		    		$userdata = $this->Common_model->getSingleRecordById('shops',array('mobile_no' => $mobile_no,'password'=>$password));
		    		//print_r($userdata);
		    		if($userdata){
		    			if($userdata['status']==1){                            
		    	           
		    	           	$this->session->set_userdata(SHOP_SESSION, $userdata);
		    				echo json_encode(array('status'=>1,'msg'=>"successfully login"));
		    				exit();
		    			}
		    			if($userdata['status']== 0){
		    				echo json_encode(array('status'=>0,'msg'=>"Your account has been deactivated"));
		    				exit();
		    			}
		    			if($userdata['status']== 3){
		    				echo json_encode(array('status'=>0,'msg'=>"Your account has been deleted by admin"));
		    				exit();
		    			}
		    		}else{
		    			echo json_encode(array('status'=>0,'msg'=>" Invalid Membership id or password Please try again"));
		    		}
		}else
		{
		    echo json_encode(array('status'=>0,'msg'=>"Membership id and password has been required"));
		    	exit();
		}   
	}

	public function profile(){
		$data = array();
		$data['success'] = "";
		$data['error'] = "";
		$shop_id = shopsessionShopid();
		if(isset($shop_id) && !empty($shop_id)){

			if(isset($_POST['update']))
			{
				// print_r($_POST);
				$user_data = $_POST;
				unset($user_data['update']);
				// unset($user_data['password']);
				// $user_data['password'] = md5($password);
				// $user_data['show_password'] = $password;
				$email = $user_data['email'];
				// $mobile_no = base64_encode($user_data['mobile_no']);
				$filearray = array();
				if (isset($_FILES)){
				    //echo '<pre>';print_r($_FILES);die();
				    if(isset($_FILES['owner_image']['name']) && !empty($_FILES['owner_image']['name'])){
		        		$uploadpath = "./uploads/shop_images/shop_owner_images/";
		        		$filearraydata = $this->uploadfilebypath('owner_image',$uploadpath);
		            	if(isset($filearraydata)){
							$user_data['owner_image'] = $filearraydata;
						}
		        	}
		        	if(isset($_FILES['shop_logo']['name']) && !empty($_FILES['owner_image']['name'])){
		        		$uploadpath = "./uploads/shop_images/shop_logos/";
		        		$filearraydatalogo = $this->uploadfilebypath('shop_logo',$uploadpath);
		            	if(isset($filearraydatalogo)){
							$user_data['shop_logo'] = $filearraydatalogo;
						}
		        	}
		        	if(isset($_FILES['shop_image_mobile']['name']) && !empty($_FILES['shop_image_mobile']['name'])){
		        		$uploadpath = "./uploads/shop_images/shop_image_mobile/";
		        		$filearraydatamobile = $this->uploadfilebypath('shop_image_mobile',$uploadpath);
		            	if(isset($filearraydatamobile)){
							$user_data['shop_image_mobile'] = $filearraydatamobile;
						}
		        	}
		        	if(isset($_FILES['shop_image_desktop']['name']) && !empty($_FILES['shop_image_desktop']['name'])){
		        		$uploadpath = "./uploads/shop_images/shop_image_desktop/";
		        		$filearraydatadsk = $this->uploadfilebypath('shop_image_desktop',$uploadpath);
		            	if(isset($filearraydatadsk)){
							$user_data['shop_image_desktop'] = $filearraydatadsk;
						}
		        	}
				}
				if(isset($filearray['shop_logo'])) {
					$user_data['shop_logo'] = $filearray['shop_logo'];
				}
				$result_id = $this->Common_model->updateRecords('shops',$user_data,array('shop_id'=>$shop_id));
				if($result_id){
					$data['success'] = "Profile has been updated sucessfully";
					// redirect(base_url().'shop/profile/');
				}else{
					$data['error'] = "Something went wrong please try again";
				}
				$data['shop_data'] = $user_data;
			}
			$this->load->view('shop/header');
			$this->load->view('shop/shopprofile',$data);
			$this->load->view('shop/footer');	
		}
	}

	public function shopdetail(){
		$data = array();
		$shop_id = shopsessionShopid();
		if(!empty($shop_id)){
			$where = array('status !='=>3,'shop_id'=>$shop_id);
			$data['shop_data'] = $this->Common_model->GetWhere("shops",$where);
			if(!empty($data['shop_data']))
			{
				$shop_data = $data['shop_data'][0];
			}
		}
		$data['shop_type_list'] = $this->Common_model->GetWhere("shop_types",array('1'=>1));
		$data['shop_data'] = $shop_data;
		$this->load->view('shop/header');
		$this->load->view('shop/shopdetail',$data);
		$this->load->view('shop/footer');
	}

	public function coupon(){
		$data = array();
		$shopid = shopsessionShopid();
		if(isset($_POST) && !empty($_POST)){
			// print_r($_POST);
			$coupon_code = $_POST['coupon_code'];
			$post_data = array();
			$post_data['coupon_code'] = $_POST['coupon_code'];
			$post_data['offer_amount'] = $_POST['offer_amount'];
			$post_data['offer_amount_type'] = $_POST['offer_amount_type'];
			$post_data['start_date'] = $_POST['start_date'];
			$post_data['min_total_amount'] = $_POST['min_total_amount'];
			$post_data['end_date'] = $_POST['end_date'];
			$post_data['create_date'] = date('Y-m-d H:i:s');
			$whr2 = array('coupon_code'=>$_POST['coupon_code'],'added_by_id !='=>$shopid);
			$check_coupon_code = $this->Common_model->GetWhere('coupons', $whr2);
			if(empty($check_coupon_code)){
				$coupons_data = $this->Common_model->GetWhere('coupons', array('added_by_id' => $shopid,'added_by'=>'shop','added_by'=>'shop'));
				if(!empty($coupons_data)){
					$this->Common_model->updateRecords('coupons',$post_data,array('added_by_id'=>$shopid,'added_by'=>'shop'));
					$data['success'] = "Coupon has been updated sucessfully";
				}else{
					$post_data['added_by_id'] = $shopid;
					$post_data['added_by'] = 'shop';
					$rs = $this->Common_model->addRecords('coupons',$post_data);
					$data['success'] = "Coupon has been added sucessfully";	
				}
			}else{
				$data['error'] = "Coupon already exits please try again.";
			}
		}
		$data['coupons_data'] = $this->Common_model->getSingleRecordById('coupons', array('added_by_id' => $shopid,'added_by'=>'shop','added_by'=>'shop'));
		$this->load->view('shop/header');
		$this->load->view('shop/coupon',$data);
		$this->load->view('shop/footer');
	}

	public function checkCouponCode(){
		//print_r($_POST);
		if(isset($_POST['coupon_code']) && !empty($_POST['coupon_code'])){
			$shopid = shopsessionShopid();
			$whr2 = array('coupon_code'=>$_POST['coupon_code'],'added_by_id !='=>$shopid);
			$coupons = $this->Common_model->GetWhere('coupons', $whr2);
			if(empty($coupons)){
				echo "<span style='color:green'>Copon code available.</span>";
			}else{
				echo "<span style='color:red'>Copon code already exits.</span>";
			}
		}else{
			echo "<span style='color:red'>Copon code is required.</span>";
		}
		exit();
	}

	public function changePassword(){
		$shopid = shopsessionShopid();
		$shopdata = shopprofilebysession();
		if(isset($shopid) && !empty($shopid)){
			$data = array();
			if(isset($_POST['changenormalpassword'])){
			  $old_current_password = $shopdata['password'];
			  $current_password = md5(trim($_POST['current_password']));
			  $new_password = md5(trim($_POST['new_password']));
			  $re_enter_password = md5(trim($_POST['re_enter_password']));
			  	  
			  if($old_current_password!=$current_password){
			   $data['error'] = "Invalid Current Password...!";
			  }
			  else{
			   if($new_password!=$re_enter_password){
			    $data['error'] = " password not matched please try again...!";
			   }
			   else{
			    $this->Common_model->updateRecords('shops',array('password'=>$re_enter_password),array('shop_id'=>$shopid));
				$data['success'] = "Password updating, please wait...!";
			   }
			  }
			 }
			$this->load->view('shop/header');
			$this->load->view('shop/changePassword',$data);
			$this->load->view('shop/footer');	
		}
	}

	function uploadfilebypath($key,$path)
	{
		$message = array();
		$data = array();
		if($_FILES[$key]['size'] > 0)
		{
			$config = array(
				'upload_path' => $path,
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				/*'overwrite' => TRUE*/
				'max_size' => 60000,
				'max_height' => "",
				'max_width' => ""
			);
			$config['remove_spaces'] = true;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if($this->upload->do_upload($key))
			{
				$uploadData = $this->upload->data();
				$image_name = $uploadData['file_name'];
				return $image_name;
			}else{
				echo $this->upload->display_errors();
			}
		}
		else
		{
			return 'Your uploaded image file is blank.';
		}
	}

	public function addproduct($pid = false){
		$data = array();

		if(isset($_POST['submit']) && !empty($_POST['submit'])){
			$file = $_FILES;
			$product_galary = $file["product_galary"];
			$main_image = $file["main_image"];
			$post_data = array();
			$post_data['shop_id'] = shopsessionShopid();
			$post_data['categories_id']=$_POST['categories_id'];
			$post_data['name'] = $_POST['name'];
			$post_data['description'] = $_POST['description'];
			$post_data['unit_price']=$_POST['unit_price'];
			$post_data['product_gst']=$_POST['product_gst_discount'];
			$post_data['categoryimg']=$_POST['categoryimg'];
			$post_data['create_date'] = date('Y-m-d H:i:s');
	        if(isset($_POST['previous_photos']) && !empty($_POST['previous_photos'])){
	            $photos = $_POST['previous_photos'];
	        }
	        else{
	            $photos = array();
	        }
	      
// 	        if(!empty($product_galary))
// 			{
// 				$dgl = array();
// 				foreach($product_galary["size"] as $x => $y)
// 				{
// 					if($y > 0)
// 					{
// 						$iname = $product_galary["name"][$x];
// 						$itype = $product_galary["type"][$x];
// 						 $itmp_name = $product_galary["tmp_name"][$x];
// 						 $isize = $y;

// 						if($dge = $this->uploadproductImages($iname,$itype,$itmp_name,$isize))
// 						{
// 							array_push($photos, $dge);
// 						}
// 					}
// 				}

// 				if(!empty($jay))
// 				{
// 					// print_r($jay);
					
// 					 //$this->Common_model->insertMultiple("product_images",$dgl);
// 				}
// 			}
$product_galary = $file["product_galary"];
	        if(!empty($product_galary))
					{
						$dgl = array();
						
						foreach($product_galary["size"] as $x => $y)
						{
							if($y > 0)
							{
								$iname = $product_galary["name"][$x];
								$itype = $product_galary["type"][$x];
								$itmp_name = $product_galary["tmp_name"][$x];
								$isize = $y;

								if($dge = $this->uploadproductImages($iname,$itype,$itmp_name,$isize))
								{ 
									array_push($photos, $dge);
									 
								}
							}
						}

						 
					}
			$post_data['product_images'] = json_encode($photos);
			if(isset($main_image) && !empty($main_image)){

				// p($main_image);
				$main_iname = $main_image["name"];
				$main_itype = $main_image["type"];
				$main_itmp_name = $main_image["tmp_name"];
				$main_isize = $main_image["size"];
				if(isset($main_isize) && $main_isize > 0){	
					$main_image_res = $this->uploadproductImages($main_iname,$main_itype,$main_itmp_name,$main_isize);
					if($main_image_res){
						$post_data['main_image'] = $main_image_res;
					}
				}
			}
			$post_data['pream_points']=$_POST['pream_points'];
			//echo "<pre>";print_r($post_data);die;
	        if(isset($_POST['product_id']) && !empty($_POST['product_id'])){
				$this->Common_model->updateRecords("product", $post_data, array('product_id'=>$_POST['product_id']));
				$data['success'] = "Product has been updated successfully";
			}else{
				$product_id = $this->Common_model->addRecords('product',$post_data);
				if($product_id){
					$prdoduct_reg_id = trim(prduct_reg_prefix.$product_id);
					$this->Common_model->updateRecords("product", array('product_reg_id'=>$prdoduct_reg_id), array('product_id'=>$product_id));
					$data['success'] = "Product has been added successfully";
				}else{
					$data['error'] = "Oops Something went wrong please try again.";
				}
			}
		}
		if($pid){
			$data['product_data'] = $this->Common_model->getSingleRecordById("product",array('product_id'=>$pid));
// 			print_r($data['product_data']);
		}
		//$data['color'] = $this->Common_model->getwhere("colors",array(1=>1));
		$whr2 = array('status !='=>3,'parent_category_id'=>0);
		$data['categorylist'] = $this->Common_model->GetWhere('categories', $whr2);
		//$data['categorylist'] = $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>0));
 		//echo "<pre>"; print_r($data);die;
        // $data['product_data'] = $this->Common_model->getAllRecords("product");
        // p($data['product_data']);
		$this->load->view('shop/header');
		$this->load->view('shop/addproduct',$data);
		$this->load->view('shop/footer');
	}

	public function subcategoryhtml(){
	  if(isset($_POST['categories_id']) && !empty($_POST['categories_id'])){
	  		$data = array();
			$categories_id = $_POST['categories_id'];
			$data['subcategory'] = $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>$categories_id));
			echo $this->load->view('shop/subcategorylistbycatid',$data,true);
		}
	}

	public function sku_combination()
    {
    	// print_r($_REQUEST);
        $options = array();
        if(isset($_POST['colors_active'])  && isset($_POST['colors']) && count($_POST['colors']) > 0){
            $colors_active = 1;
            array_push($options, $_POST['colors']);
        }
        else {
            $colors_active = 0;
        }

        $unit_price = $_POST['unit_price'];
        $product_name = $_POST['name'];

        if(isset($_POST['choice_no'])){
            foreach ($_POST['choice_no'] as $key => $no) {
                $name = 'choice_options_'.$no;
                $my_str = implode('|', $_POST[$name]);
                array_push($options, explode(',', $my_str));
            }
        }

        $combinations = combinations($options);
        $data = array();
        $data['combinations'] = $combinations;
        $data['unit_price'] = $unit_price;
        $data['product_name'] = $product_name;
        $data['colors_active'] = $colors_active;
        $this->load->view('shop/partial/sku_combinations',$data);
    }

	// public function productlist(){
	// 	$data = array();
	// 	$data['productlist'] = $this->Common_model->getwhere("product",array('status'=>1));
	// 	$this->load->view('shop/header');
	// 	$this->load->view('shop/productlist',$data);
	// 	$this->load->view('shop/footer');
	// }

	public function productlist()
	{   
		$data = array();
		if($this->input->get('per_page'))
		{
			$page = $this->input->get('per_page');
		}else{
			$page=0;
		}
		$shop_id = shopsessionShopid();
		$whr = array();
		// $whr[] = "o.userid != 0";
		$whr = array();
		$whr[] = "status != 3";
		$whr[] = "shop_id = ".$shop_id;
		$orderby = " LIMIT " .$page.", ".total_per_page;
		$where = " WHERE ".implode(" AND ", $whr);
    	$data['rows'] = $this->Common_model->getwherecustome('product',$where,$orderby);
		$data['pagination'] = $this->Common_model->getwhrcountbycol('product','product_id',$where); 
		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);

    	$url = base_url()."shop/productlist".(isset($_GET['product_reg_id']) ? "?product_reg_id=".trim($_GET['product_reg_id'])."" : '').(isset($_GET['name']) ? "&name=".trim($_GET['name'])."":'').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');
		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);
		
		$this->load->view('shop/header');
		$this->load->view('shop/productlist', $data);
		$this->load->view('shop/footer');
	}
	
	public function pending_productlist()
	{   
		$data = array();
		if($this->input->get('per_page'))
		{
			$page = $this->input->get('per_page');
		}else{
			$page=0;
		}
		
		$whr = array();
		// $whr[] = "o.userid != 0";
		$whr = array();
		if(isset($_GET['status'])){
			$whr[] = "status = ".$_GET['status'];
		}else{
			$whr[] = "status != 3";
		}
		
		$orderby = " LIMIT " .$page.", ".total_per_page;
		$where = " WHERE ".implode(" AND ", $whr);
    	$data['rows'] = $this->Common_model->getwherecustome('product',$where,$orderby);
		$data['pagination'] = $this->Common_model->getwhrcountbycol('product','product_id',$where); 
		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);

    	$url = base_url()."shop/productlist".(isset($_GET['product_reg_id']) ? "?product_reg_id=".trim($_GET['product_reg_id'])."" : '').(isset($_GET['name']) ? "&name=".trim($_GET['name'])."":'').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');
		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);
		
		$this->load->view('shop/header');
		$this->load->view('shop/productlist', $data);
		$this->load->view('shop/footer');
		
	}	
	
	public function low_product_list()
	{
	    $data = array();
		if($this->input->get('per_page'))
		{
			$page = $this->input->get('per_page');
		}else{
			$page=0;
		}
		$shop_id = shopsessionShopid();
		$whr = array();
		// $whr[] = "o.userid != 0";
		$whr = array();
		$whr[] = "status != 3";
		$whr[] = "shop_id = ".$shop_id;
		$orderby = " LIMIT " .$page.", ".total_per_page;
		$where = " WHERE ".implode(" AND ", $whr);
    	$data['rows'] = $this->Common_model->getwherecustome('product',$where,$orderby);
		$data['pagination'] = $this->Common_model->getwhrcountbycol('product','product_id',$where); 
		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);

    	$url = base_url()."shop/productlist".(isset($_GET['product_reg_id']) ? "?product_reg_id=".trim($_GET['product_reg_id'])."" : '').(isset($_GET['name']) ? "&name=".trim($_GET['name'])."":'').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');
		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);
	    $this->load->view('shop/header');
		$this->load->view('shop/low_product_list', $data);
		$this->load->view('shop/footer');
	}

	public function orderhistory(){
		$shop_id = shopsessionShopid();
    	$data = array();
		if($this->input->get('per_page'))
		{
			$page = $this->input->get('per_page');
		}else{
			$page=0;
		}
		$whr = array();
		// $whr[] = "o.userid != 0";
		$whr = array();
		$whr[] = "status != 3";
		$whr[] = "seller_id = ".$shop_id;
		$orderby = " LIMIT " .$page.", ".total_per_page;
		$where = " WHERE ".implode(" AND ", $whr);
    	$data['orders'] = $this->Common_model->getwherecustome('orders',$where,$orderby);
		$data['pagination'] = $this->Common_model->getwhrcountbycol('orders','id',$where); 
		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);
		$url = base_url()."shop/orderhistory".(isset($_GET['invoice_no']) ? "?invoice_no=".trim($_GET['invoice_no'])."" : '').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');
		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);
		
		$this->load->view('shop/header');
		$this->load->view('shop/orderhistory', $data);
		$this->load->view('shop/footer');
    }

    public function neworders(){
		$shop_id = shopsessionShopid();
    	$data = array();
		if($this->input->get('per_page'))
		{
			$page = $this->input->get('per_page');
		}else{
			$page=0;
		}
		$whr = array();
		// $whr[] = "o.userid != 0";
		$whr = array();
		$whr[] = "o.status = 1";
		$whr[] = "o.delivery_status in(1)";
		$whr[] = "o.seller_id = ".$shop_id;
		$orderby = " LIMIT " .$page.", ".total_per_page;
		$where = " WHERE ".implode(" AND ", $whr);
    	$data['orders'] = $this->Common_model->getwhereorders($where,$orderby);
    // 	print($data);
    // 	echo "<pre>";
    // 	print_r($data['orders']);
    // 	echo "<pre>";
    // 	die;
		$data['pagination'] = $this->Common_model->getwhrcountordersbycol($where);
		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);
		$url = base_url()."shop/neworders".(isset($_GET['invoice_no']) ? "?invoice_no=".trim($_GET['invoice_no'])."" : '').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');
		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);
		
		$this->load->view('shop/header');
		$this->load->view('shop/neworders', $data);
		$this->load->view('shop/footer');
    }

    public function invoice(){
    	$data = array();
    	$shop_id = shopsessionShopid();
    	
    	if(isset($_GET['invoice']) && !empty($_GET['invoice'])){
	    	$id = base64_decode($_GET['invoice']);
	    	$whr = array();
	    	$whr[] = "seller_id =".$shop_id;
	    	$whr[] = "id =".$id;
	    	$where = " WHERE ".implode(" AND ", $whr);
	    	$data['orderdata'] = $this->Common_model->getwheresingleorder($where);
	    	$this->load->view('shop/header');
			$this->load->view('shop/invoice', $data);
			$this->load->view('shop/footer');
		}
    }

    public function accept_order(){
    	$shop_id = shopsessionShopid();
        $tablename = $_POST['tablename'];

        $status = $_POST['status'];

        $id = $_POST['id'];

        $action = $_POST['action'];

        $whrcol = $_POST['whrcol'];

        $whrstatuscol = $_POST['whrstatuscol'];

        $whr = array();

    	// $whr[] = "deliveryboy =".$shop_id;

    	$whr[] = "id =".$id;

    	$whr[] = "status = 1";

    	$where = " WHERE ".implode(" AND ", $whr);

    	$check_order_status = $this->Common_model->getwheresingleorder($where);



    	if(isset($check_order_status) && !empty($check_order_status)){



    		$update_data = array();

    		$update_data[$whrstatuscol] = $status;

	        $res = $this->Common_model->updateRecords($tablename,$update_data,array($whrcol => $id,'status'=>1));

	        $whrd = array();
        	$whrd[] = " status = 1";
        	$whered = " WHERE ".implode(" AND ", $whrd);
        	$driversdata = $this->Common_model->getwherecustomecol("shop_id","mobile_no,email",$whered,"");
	                	// print_r($driversdata);
        	if(!empty($driversdata)){
        		$dmr = array();
        		$deliveryboymessage = "New order ".$u_data['invoice_no']." is generated please chk and accept.";
        		foreach ($driversdata as $driversdataarray){
        			// $dmr[] = $driversdataarray['mobile_no'];
        			// send_smtp_mail($driversdataarray['email'],company_email, "order message","",$deliveryboymessage);
        			sendsms($driversdata['mobile_no'],'91',$deliveryboymessage);
        		}
        		// $dmri = implode(",", $dmr);
        		
        		// $dmrms = "'" . str_replace(",", "','", $dmri) . "'";
        	}

	        // $resp = array('code'=>SUCCESS,'message'=>'Record has been '.$action.'successfully');

	        // echo json_encode($resp);

	        $msg = array('status'=>1, 'msg'=>'Order  has been '.$action.' successfully');

			echo json_encode($msg);

			exit();

		}else{

			$msg = array('status'=>0, 'msg'=>'This order has been already accepted');

			echo json_encode($msg);

			exit();

		}

    }


    public function support_ticket(){
        $user_id = customersessionid();
        if(isset($_POST['query']) && !empty($_POST['query']) )
        {
            $insert_data = array();
            $insert_data['query'] = $_POST["query"];
            $insert_data['user_type'] = 'shop';
            $insert_data['create_date'] = date('Y-m-d H:i:s');
            $insert_data['user_id'] = $user_id;
            
            $result = $this->Common_model->addRecords('support_ticket',$insert_data);
            if(isset($result)){
                
                $newid = ticketid_prefix.date("Y").$result;
                if(isset($newid)){
                    $updata = array();
                    $updata['ticket_reg_id'] = $newid;
                }
               
            }
            $this->Common_model->updateData('support_ticket',$updata,array('ticket_id' => $result));
            echo "Successfully Updated";
            exit();        
            
        }else{
            // echo "All fields are required";
        }
        $data = array();
        $data['support'] = $this->Common_model->getWhereData('support_ticket',array('user_type'=>'shop'));
        // print_r($data['support']);
        // die;
        $this->load->view('shop/header');
        $this->load->view('shop/support_ticket',$data);
        $this->load->view('shop/footer');   
    }

    public function support(){
    	$data = array();
        $user_id = customersessionid();
        // print_r($data);
        // die;
        $id = base64_decode($_GET['ticket_id']);
        // print_r($data);
        // die;
		$data['supportchat'] = $this->Common_model->getWhereData('support_message',array('ticket_id'=>$id));
		$data['support'] = $this->Common_model->getSingleRecord('support_ticket',array('ticket_id'=>$id));
		$this->load->view('shop/header');
		$this->load->view('shop/support',$data);
		$this->load->view('shop/footer');
    }

    public function submitmessage(){
        if(isset($_REQUEST['message']) && !empty($_REQUEST['message']) && !empty($_REQUEST['ticket_id']))
        {
      
            $user_id = customersessionid();
            $id = base64_decode($_REQUEST['ticket_id']);

            $insert_data = array();
            $insert_data["ticket_id"] = $id;
            $insert_data["from_id"] = $user_id;
            $insert_data["to_id"] = 1;
            $insert_data["user_type"] = 'shop';
            $insert_data["message"] = $_POST["message"];
            $insert_data['create_date'] = date('Y-m-d H:i:s');

            $result = $this->Common_model->addRecords('support_message',$insert_data);
            exit();
        }
    }

    public function support_chat_message(){
    	$id = base64_decode($_POST['ticket_id']);
    	$data = array();
    	$data['support'] = $this->Common_model->getWhereData('support_message',array('ticket_id'=>$id));
        // print_r($data['support']);
    	$this->load->view('shop/partial/support_chat_message',$data);
    	// exit();
    }

	public function pagination($page_url,$total_rows,$get_page,$count_data)
    {
		$config["base_url"] = $page_url;
		$config["total_rows"] = $total_rows;
		$config['page_query_string'] = TRUE;
		$config["per_page"] = $count_data;
		// $config['use_page_numbers'] = TRUE;
		$config['num_links'] = 10;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->load->library('pagination', $config);
		if($get_page)
		{
			$page = $get_page;
		}else{
			$page = 0;
		}
       	return $this->pagination->create_links();
	}

	public function uploadproductImages($ImageName,$ImageType,$TempSrc,$ImageSize,$dir = false)
	{
		$ThumbSquareSize 		= 200; //Thumbnail will be 200x200
		$BigImageMaxSize 		= 1024; //Image Maximum height or width
		$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
		$DestinationDirectory	=  (!empty($dir))? $dir : 'uploads/product_images/'; //Upload Directory ends with / (slash)
		$Quality 				= 60;
		$processImage			= true;
		$RandomNumber			= time();  // We need same random name for both files.
		switch(strtolower($ImageType))
		{
			case 'image/png':
				$CreatedImage = imagecreatefrompng($TempSrc);
				break;

			case 'image/gif':
				$CreatedImage = imagecreatefromgif($TempSrc);
				break;

			case 'image/jpeg':

			case 'image/pjpeg':
				$CreatedImage = imagecreatefromjpeg($TempSrc);
				break;
			default:
				$processImage = false; //image format is not supported!
		}

		//get Image Size

		list($CurWidth,$CurHeight)=getimagesize($TempSrc);

		//Get file extension from Image name, this will be re-added after random name

		$Imagearray = explode(".", $ImageName);

		$ImageExt = array_pop($Imagearray);

		//Construct a new image name (with random number added) for our new image.
		$NewImageName = $ImageSize."_".$RandomNumber.'.'.$ImageExt;

		//Set the Destination Image path with Random Name
		$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumb name

		$DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image

		//Resize image to our Specified Size by calling resizeImage function.

		if($processImage && $this->resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
		{
			return $NewImageName;
		}else{
			return false;
		}
	}

	public function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
    {
    	//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0)
		{
				return false;

		}

		//Construct a proportional size of new image

		$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 

		$NewWidth  			= ceil($ImageScale*$CurWidth);

		$NewHeight 			= ceil($ImageScale*$CurHeight);

		

		if($CurWidth < $NewWidth || $CurHeight < $NewHeight)
		{
			$NewWidth = $CurWidth;
			$NewHeight = $CurHeight;

		}

		$NewCanves 	= imagecreatetruecolor($NewWidth, $NewHeight);

		// Resize Image

		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))

		{

			switch(strtolower($ImageType))

			{

				case 'image/png':

					imagepng($NewCanves,$DestFolder);

					break;

				case 'image/gif':

					imagegif($NewCanves,$DestFolder);

					break;			

				case 'image/jpeg':

				case 'image/pjpeg':

					imagejpeg($NewCanves,$DestFolder,$Quality);

					break;

				default:

					return false;

			}

		if(is_resource($NewCanves)) { 

	      imagedestroy($NewCanves); 

	    } 

		return true;

		}
	}

	public function change_status(){
        $tablename = $_POST['tablename'];
        $status = $_POST['status'];
        $id = $_POST['id'];
        $action = $_POST['action'];
        $whrcol = $_POST['whrcol'];
        $whrstatuscol = $_POST['whrstatuscol'];
        $res = $this->Common_model->updateRecords($tablename, array($whrstatuscol=>$status), array($whrcol => $id));
        // $resp = array('code'=>SUCCESS,'message'=>'Record has been '.$action.'successfully');
        // echo json_encode($resp);
        $msg = array('status'=>1, 'msg'=>'Record has been '.$action.' successfully');
		echo json_encode($msg);
		exit();
    }


	
	public function logout()
	{
		// $this->session->sess_destroy();
		$this->session->unset_userdata(SHOP_SESSION);
		redirect(base_url('home/vendor_registration'),'refresh');
	}
	public function categories()

	{

		$data = array();
        $shop = $this->session->userdata(SHOP_SESSION);
		$whr2 = array('status !='=>3,'parent_category_id'=>0,'shop_id'=>$shop['shop_id']);

		$data['categories_data'] = $this->Common_model->GetWhere('categories', $whr2);

		$this->load->view('shop/header');

		$this->load->view('shop/categories',$data);

		$this->load->view('shop/footer');

	}



	public function subcategories()

	{

		$data = array();

		// $whr2 = array('status !='=>3,'parent_category_id !='=>0);
        $shop = $this->session->userdata(SHOP_SESSION);
		$whr2 = "WHERE c2.categories_id = c1.parent_category_id and c1.status != 3 and c2.shop_id=c1.shop_id";

		$data['categories_data'] = $this->Common_model->GetWheresubcategory($whr2);



		// print_r($data['categories_data']);

		// die;

		$this->load->view('shop/header');

		$this->load->view('shop/subcategories',$data);

		$this->load->view('shop/footer');

	}
	public function addsubcategory($cat_id = ""){

		$data = array();

		$data['success'] = "";

		$data['error'] = "";

		$data['cat_data'] = "";



		if(isset($_POST['submit']))

		{

			$user_data = array();



			$filearray = array();

			if (isset($_FILES)) {

			    //echo '<pre>';print_r($_FILES);die();

			    foreach ($_FILES as $key => $value) {

			        //print_r($value['size']);

			        if($value['size'] > 0) {

						$filearraydata = $this->uploadcategoryfile($key);

			            $filearray[$key] = $filearraydata;

			        }else{

			            $this->session->set_flashdata('error_fileupload', 'File size is empty!');

			        }

			    }

				//$post_data = $_POST+$filearray;

			}



			if(isset($filearray['category_image'])) {

				$user_data['category_image'] = $filearray['category_image'];

			}



			// print_r($filearray);

			// die;

			// $parent_id = $_POST['parent_id'];

			$user_data['category_name'] = $_POST['category_name'];

			$user_data['parent_category_id'] = $_POST['parent_category_id'];

			$user_data['create_date'] = date('Y-m-d H:i:s');
			
			$shop = $this->session->userdata(SHOP_SESSION);
			
            $user_data['shop_id']=$shop['shop_id'];
            
			if (isset($_POST['categories_id']) &&  !empty($_POST['categories_id'])){

				$result_id = $this->Common_model->updateRecords('categories',$user_data,array('categories_id'=>$_POST['categories_id']));

			}

			else

			{

				$result_id = $this->Common_model->addRecords('categories',$user_data);

			}

			if($result_id)

			{

				$data['success'] = "Categories has been added successfully";

				redirect(base_url().'shop/subcategories/');

			}

			else

			{

				$data['error'] = "Some thing went wrong please try again";

			}

		}

		if(!empty($cat_id))

		{

		    $whr = array('status !='=>3,'categories_id'=>$cat_id);

			$data['cat_data'] = $this->Common_model->getSingleRecordById('categories', $whr);

			// print_r($data['cat_data']);

			// die;

		}

		$whr2 = array('status !='=>3,'parent_category_id'=>0);

		$data['parent_categories'] = $this->Common_model->GetWhere('categories', $whr2);



		

		$this->load->view('shop/header');

		$this->load->view('shop/addsubcategory',$data);

		$this->load->view('shop/footer');
	}



	public function addcategories($cat_id = "")

	{

		$data = array();

		$data['success'] = "";

		$data['error'] = "";

		$data['cat_data'] = "";



		if(isset($_POST['submit']))

		{

			$user_data = array();



			$filearray = array();

			if (isset($_FILES)) {

			    //echo '<pre>';print_r($_FILES);die();

			    foreach ($_FILES as $key => $value) {

			        //print_r($value['size']);

			        if($value['size'] > 0) {

						$filearraydata = $this->uploadcategoryfile($key);

			            $filearray[$key] = $filearraydata;

			        }else{

			            $this->session->set_flashdata('error_fileupload', 'File size is empty!');

			        }

			    }

				//$post_data = $_POST+$filearray;

			}



			if(isset($filearray['category_image'])) {

				$user_data['category_image'] = $filearray['category_image'];

			}



			// print_r($filearray);

			// die;

			// $parent_id = $_POST['parent_id'];

			$user_data['category_name'] = $_POST['category_name'];

			$user_data['create_date'] = date('Y-m-d H:i:s');
            $shop = $this->session->userdata(SHOP_SESSION);
            $user_data['shop_id']=$shop['shop_id'];
			if (isset($_POST['categories_id']) &&  !empty($_POST['categories_id'])){

				$result_id = $this->Common_model->updateRecords('categories',$user_data,array('categories_id'=>$_POST['categories_id']));

			}

			else

			{

				$result_id = $this->Common_model->addRecords('categories',$user_data);

			}

			if($result_id)

			{

				$data['success'] = "Categories has been added successfully";

				redirect(base_url().'shop/categories/');

			}

			else

			{

				$data['error'] = "Some thing went wrong please try again";

			}

		}

		if(!empty($cat_id))

		{

		    $whr = array('status !='=>3,'categories_id'=>$cat_id);

			$data['cat_data'] = $this->Common_model->getSingleRecordById('categories', $whr);

		}

		$whr2 = array('status !='=>3);

		$data['all_categories'] = $this->Common_model->GetWhere('categories', $whr2);

		$this->load->view('shop/header');

		$this->load->view('shop/addcategories',$data);

		$this->load->view('shop/footer');

	}
	function uploadcategoryfile($key)

	{

		$message = array();

		$data = array();

		if($_FILES[$key]['size'] > 0)

		{

			$config = array(

				'upload_path' => "./uploads/category/",

				'allowed_types' => "gif|jpg|png|jpeg|pdf",

				/*'overwrite' => TRUE*/

				'max_size' => 60000,

				'max_height' => "",

				'max_width' => ""

			);

			$config['remove_spaces'] = true;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);



			if($this->upload->do_upload($key))

			{

			//$data = array('upload_data' => $this->upload->data());

				$uploadData = $this->upload->data();

				//$this->resizeImage($uploadData['file_name']);

				$image_name = $uploadData['file_name'];

				return $image_name;

			}

			else

			{

				echo $this->upload->display_errors();

			}

		}

		else

		{

			return 'Your uploaded image file is blank.';

		}

	}
	/*public function change_status(){

        $tablename = $_POST['tablename'];

        $status = $_POST['status'];

        $id = $_POST['id'];

        $action = $_POST['action'];

        $whrcol = $_POST['whrcol'];

        $whrstatuscol = $_POST['whrstatuscol'];

        $res = $this->Common_model->updateRecords($tablename, array($whrstatuscol=>$status), array($whrcol => $id));

        // $resp = array('code'=>SUCCESS,'message'=>'Record has been '.$action.'successfully');

        // echo json_encode($resp);

        $msg = array('status'=>1, 'msg'=>'Record has been '.$action.' successfully');

		echo json_encode($msg);

		exit();

    }*/
    
    public function coupons()
	{
		$data = array();
		$shop = $this->session->userdata(SHOP_SESSION);
		// print_r($shop['shop_id']);die;
		$whr2 = array('status !='=>3,'shop_id' => $shop['shop_id']);
		$data['coupons_data'] = $this->Common_model->GetWhere('coupons', $whr2);
		$this->load->view('shop/header');
		$this->load->view('shop/coupons',$data);
		$this->load->view('shop/footer');
	}


    public function addcouponcode($id=false){
		$data = array();
		if(isset($_POST['submit']) && !empty($_POST['submit'])){
			// print_r($_POST);
			$shop = $this->session->userdata(SHOP_SESSION);
			$coupon_code = $_POST['coupon_code'];
			$post_data = array();
			$post_data['coupon_code'] = $_POST['coupon_code'];
			$post_data['offer_amount'] = $_POST['offer_amount'];
			$post_data['offer_amount_type'] = $_POST['offer_amount_type'];
			$post_data['shop_id'] = $shop['shop_id'] ;
			$post_data['start_date'] = $_POST['start_date'];
			$post_data['status'] = 1;
			// $post_data['min_total_amount'] = $_POST['min_total_amount'];
			$post_data['end_date'] = $_POST['end_date'];
			$post_data['create_date'] = date('Y-m-d H:i:s');
			$whr2 = array('coupon_code'=>$_POST['coupon_code']);
			$check_coupon_code = $this->Common_model->GetWhere('coupons', $whr2);
			if(empty($check_coupon_code)){
				$post_data['added_by_id'] = 1;
				$post_data['added_by'] = 'shop';
				$rs = $this->Common_model->addRecords('coupons',$post_data);
				$data['success'] = "Coupon has been added sucessfully";	
			}else{
				$data['error'] = "Coupon already exits please try again.";
			}
		}
		if(isset($_POST['update']) && !empty($_POST['update'])){
			$coupon_code = $_POST['coupon_code'];
			$post_data = array();
			$post_data['coupon_code'] = $_POST['coupon_code'];
			$post_data['offer_amount'] = $_POST['offer_amount'];
			$post_data['offer_amount_type'] = $_POST['offer_amount_type'];
			$post_data['start_date'] = $_POST['start_date'];
			// $post_data['min_total_amount'] = $_POST['min_total_amount'];
			$post_data['end_date'] = $_POST['end_date'];
			$whr2 = array('coupon_code'=>$_POST['coupon_code'],'id !='=>$_POST['id']);
			$check_coupon_code = $this->Common_model->GetWhere('coupons', $whr2);
			if(empty($check_coupon_code)){
				$this->Common_model->updateRecords('coupons',$post_data,array('id'=>$_POST['id']));
				$data['success'] = "Coupon has been added sucessfully";	
				
			}else{
				$data['error'] = "Coupon already exits please try again.";
			}
		}

		if($id){
			$data['coupons_data'] = $this->Common_model->getSingleRecordById('coupons', array('id' => $id));
		}
		$this->load->view('shop/header');
		$this->load->view('shop/addcouponcode',$data);
		$this->load->view('shop/footer');
	}


  // add and adite FAQ

	 public function FAQ($id=false)
	{
		$data = array();
		if(isset($_POST) && !empty($_POST)){
			$insert_data = array();
			// if(isset($_GET['lang']))
			// {
				/*if($_GET['lang']=='english')
				{
					$insert_data['ans'] = $_POST["title"];
		    		$insert_data['qustion'] = $_POST["editor1"];
				}
				else
				{*/
					$shop = $this->session->userdata(SHOP_SESSION);
					$insert_data['shop_id'] = $shop['shop_id'] ;
		    		$insert_data['ans'] = $_POST["title"];
		    		$insert_data['qustion'] = $_POST["editor1"];
					// $insert_data['ans_hindi'] = $_POST["ans_hindi"];
		   //  		$insert_data['qustion_hindi'] = $_POST["qustion_hindi"];
				//}
			//}
		  	$insert_data['create_date'] = date('Y-m-d h:i:s');
		  	//echo "<pre>";print_r($insert_data);die;
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('faqs_vendore',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('faqs_vendore',$insert_data);
			}
			redirect(base_url().'shop/faqlist');
		}
		if(!empty($id))
		{
			$whr = array('id'=>$id);
			$data['faq_data'] = $this->Common_model->getSingleRecordById('faqs_vendore', $whr);
		}
		$this->load->view('shop/header');
		$this->load->view('shop/faq',$data);
		$this->load->view('shop/footer');
	}
	public function faqlist(){
		$data = array();
		if($this->input->get('per_page'))
		{
			$page = $this->input->get('per_page');
		}else{
			$page=0;
		}
		$whr = array();
		$shop = $this->session->userdata(SHOP_SESSION);
		$whr[] = "shop_id = ".$shop['shop_id']."";
		$post_data['shop_id'] = $shop['shop_id'] ;		
		$orderby = " order by id asc LIMIT " .$page.", ".total_per_page;
		$where = " WHERE ".implode(" AND ", $whr);
    	$data['support'] = $this->Common_model->getwherecustome('faqs_vendore',$where,$orderby);
		$data['pagination'] = $this->Common_model->getwhrcountbycol('faqs_vendore','id',$where); 

    	$url = base_url()."shop/faqlist";
		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);
		 
		$this->load->view('shop/header');
		$this->load->view('shop/faqlist',$data);
		$this->load->view('shop/footer');
	}
	public function deleteAll()
	   	{
	   		$data=isset($_POST['id']) ? $_POST['id'] : '';
	   		if(!empty($data))
	   		{
	   			$table = isset($_POST['table']) ? $_POST['table'] : '';
	   			$colwhr=isset($_POST['colwhr']) ? $_POST['colwhr'] :'';
	   			for ($i = 0; $i <count($data); $i++)
		        {
			       $this->Common_model->deleteData($table,array($colwhr=>$data[$i]));
		        }
	   		}
		    $msg = array('status'=>1, 'msg'=>'Deleted successfully!');
			echo json_encode($msg);
			exit();
	   	}
	   	
	   	public function  feedback()
	{
		$data = array();
		$shop = $this->session->userdata(SHOP_SESSION);
		// print_r($shop['shop_id']);die;
		$whr2 = array('shop_id' => $shop['shop_id']);
		$data['user_feedback'] = $this->Common_model->GetWhere('user_feedback', $whr2);
		$this->load->view('shop/header');
		$this->load->view('shop/feedback',$data);
		$this->load->view('shop/footer');
	}
    public function categoryhtml(){
        $categories_id=!empty($_POST['categories_id']) ? $_POST['categories_id'] : '';
        $data=array();
        if(!empty($categories_id)){
            $data['categorylist'] = $this->Common_model->getSingleRecordById('categories', array('categories_id'=>$categories_id));
        }
        echo json_encode($data);die;
    }
    public function promotionlist(){
        $data=array();
        $shop = $this->session->userdata(SHOP_SESSION);
        $data['promotionlist'] = $this->Common_model->GetWhere('promotion', array("shop_id"=>$shop['shop_id']));
        $this->load->view('shop/header');
		$this->load->view('shop/promtionlist',$data);
		$this->load->view('shop/footer');
    }
    public function addPromotion($id=""){
        $data=array();
        if(!empty($_POST)){
            $postdata=array();
            $shop = $this->session->userdata(SHOP_SESSION);
            $postdata['shop_id']=$shop['shop_id'];
            $postdata['title']=$_POST['title'];
            $postdata['description']=$_POST['description'];
            $postdata['image']="";
            if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
		        $uploadpath = "./uploads/promotion/";
		        $filearraydatadsk = $this->uploadfilebypath('image',$uploadpath);
		        if(isset($filearraydatadsk)){
				    $postdata['image'] = $filearraydatadsk;
				}
		    }
		  $postdata['created_date']=date("Y-m-d h:i:s");
		  if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('promotion',$postdata,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('promotion',$postdata);
			}
		   if(!empty($result_id)){
		       $data['success'] = "Promotion added sucessfully";
		   }else{
		       $data['error'] = "Please try again";
		   }
        }
        if(!empty($id)){
            $data['promotins'] = $this->Common_model->getSingleRecordById('promotion', array('id'=>$id));
        }
        $this->load->view('shop/header');
		$this->load->view('shop/addpromtionlist',$data);
		$this->load->view('shop/footer');
    }
    public function deleterecord()   
    {
        $id = $_POST['id'];
        $colwhr = $_POST['colwhr'];
        $table = $_POST['table'];
      	$this->Common_model->deleteRecords($table,array($colwhr=>$id));
      	$msg = array('status'=>1, 'msg'=>'Deleted successfully!');
		echo json_encode($msg);
		exit();
     	// redirect(base_url().'adminnew/Service_list', 'refresh');
    }
    public function userdeails($id=""){
        $data=array();
        $data['userdetails'] = $this->Common_model->GetWhere('users', array('shop_id'=>$id));
        $this->load->view('shop/header');
		$this->load->view('shop/userdetails',$data);
		$this->load->view('shop/footer');
    }
    public function sendNotification($id=""){
        $data=array();
        if(!empty($_POST)){
            $title=$_POST['title'];
            $message=$_POST['message'];
            $datasignl = $this->Common_model->getSingleRecordById('users', array('id'=>$id));
            $subject = $title;
            //$message = "<p>Thank for foget password,</p>";
           // $message .= "<p>please verify otp is :-<strong>".$resotparray['otp']."</strong> after that you have to foget password.Thank you</p>";
    		$header = "From:abc@somedomain.com \r\n";
            $header .= "Cc:monika.itspark@gmail.com \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
            $response=mail ($datasignl['email'],$subject,$message,$header);
            if($response){
                $data['success']="Message sent sucessfully";
                $this->session->set_flashdata('sucess', 'Message sent sucessfully');
                //redirect(base_url().'shop/userdeails/'.$datasignl['shop_id']);
            }else{
                $data['error']="Message not sent, please try again";
                $this->session->set_flashdata('error', 'Message not sent, please try again');
            }
            $data['id']=$datasignl['shop_id'];
        }
       // echo "<pre>";print_r($data);
        $this->load->view('shop/header');
		$this->load->view('shop/sendnotification',$data);
		$this->load->view('shop/footer');
    }
    public function  contact_us()
	{
		$data = array();
		$shop = $this->session->userdata(SHOP_SESSION);
		// print_r($shop['shop_id']);die;
		$whr2 = array('shop_id' => $shop['shop_id']);//contactus//contact_vendor
		$data['contact_vendor'] = $this->Common_model->GetWhere('contact_vendor', $whr2);
		// print_r($data);die;
		$this->load->view('shop/header');
		$this->load->view('shop/contact_us',$data);
		$this->load->view('shop/footer');
	}
	public function  contact_to_admin()
	{
		  $data = array();
		if(isset($_POST) && !empty($_POST)){
			$insert_data = array(); 
					$shop = $this->session->userdata(SHOP_SESSION);
					$insert_data['name'] = $shop['owner_name'] ;
					$insert_data['email'] = $shop['email'] ;
					$insert_data['number'] = $shop['mobile_no'] ;
		    		$insert_data['title'] = $_POST["title"];
		    		$insert_data['message'] = $_POST["editor"];
			 
		  	$insert_data['create_date'] = date('Y-m-d h:i:s');
		  	$insert_data['shop_id'] = $shop['shop_id'] ;
		  	//echo "<pre>";print_r($insert_data);die;
			if (isset($_POST['id']) &&  !empty($_POST['id'])){
				$result_id = $this->Common_model->updateRecords('contactus',$insert_data,array('id'=>$_POST['id']));
			}else{
				$result_id = $this->Common_model->addRecords('contactus',$insert_data);
			}
			if (isset($result_id)) {
			// $this->session->set_userdata(Contect_SESSION, 'send massage sucessfully');
			    //redirect(base_url().'shop/contact_to_admin');
			    $data['sucess']="Contact saved sucessfully";
				 
			}else{
			    $data['error']="Oop's something wen't wrong";
			}
		}
		$this->load->view('shop/header');
		$this->load->view('shop/contact_to_admin',$data);
		$this->load->view('shop/footer');
	}
		public function  Smart_Contract_Details()
	{
		//         $data = array();
  //       if(isset($_POST) && !empty($_POST)){
		// 	$insert_data = array();
		// 	$insert_data['title'] = $_POST["title"];
		//     $insert_data['editor1'] = $_POST["editor1"];
		//   	$insert_data['create_date'] = date('Y-m-d h:i:s');
			
		// 	if (isset($_POST['id']) &&  !empty($_POST['id'])){
		// 		$result_id = $this->Common_model->updateRecords('seller_agreement',$insert_data,array('id'=>$_POST['id']));
		// 	}else{
		// 		$result_id = $this->Common_model->addRecords('seller_agreement',$insert_data);
		// 	}
		// }
		$whr = array('id'=>1);
		$data['seller_data'] = $this->Common_model->getSingleRecordById('seller_agreement', $whr);
		$this->load->view('shop/header');
		$this->load->view('shop/Smart_Contract_Details',$data);
		$this->load->view('shop/footer');
	}
	public function publiclist(){
	    $data=array();
	    $public_id=!empty($_POST['public_id']) ? $_POST['public_id'] : '';
	    $data['seller_data'] = $this->Common_model->getSingleRecordById('customer', array("pablic_id"=>$public_id));
	    //$shop = $this->session->userdata(SHOP_SESSION);
        //$productlistdat=$this->Common_model->GetWhere('product', array("shop_id"=>$shop['shop_id']));
	    $this->session->set_tempdata(array('customerdata'=>$data));
	    echo json_encode($data);
	}
	public function destribuionhistory(){
	    $data=array();
	    $shop = $this->session->userdata(SHOP_SESSION);
 	    $data['customerlist']=$this->Common_model->GetWhere('customer', array('shop_id'=>$shop['shop_id']));
		$this->load->view('shop/header');
    	$this->load->view('shop/destibutionhistory',$data);
    	$this->load->view('shop/footer');
	}
	public function productlist1($id=""){
	       $data=array();
	   	   $data['seller_data'] = $this->Common_model->getSingleRecordById('customer', array("id"=>$id));
	   	   $this->load->view('shop/header');
           $this->load->view('shop/productlist1',$data);
           $this->load->view('shop/footer');
	}
	public function amountpay(){
		//echo "<pre>";print_r($_POST);die;
	    $data=array();
	    $insert_data=array();
	    $customerdata=$this->session->tempdata('customerdata');
	    $productid=!empty($_POST['productid']) ? $_POST['productid'] : '';
	    // $prems=!empty($_POST['prems']) ? $_POST['prems'] : '';
	    // $pre=array();
	    // if(!empty($prems)){
	    //     foreach($prems as $key=>$val){
	    //         $pre['prems'][]=$val['prems'];
	    //     }
	    // }
	    // $data['prems']=!empty($pre['prems']) ? array_sum($pre['prems']) : '';
	    // $premsli=!empty($pre['prems']) ? implode(",",$pre['prems']) : '';
	    $arr=array();
	    if(!empty($productid)){
	        foreach($productid as $key=>$val){
	            $arr['id'][]=$val['id'];
	            $arr['prem']=$val['prem'];
	        }
	    }
	   $pid=!empty($arr['id']) ? implode(",",$arr['id']) : '';
	   // $data1=array();
	   // $data1['pream_points']=$premsli;
	   //echo $this->Common_model->updateRecords('product',$data1,array("product_id"=>$pid));die;
	   //echo $public_id;die;
	    //if(!empty($public_id)){
	       $where="product_id IN ($pid)";
	       $productlist=$this->Common_model->getTotalMemebrsByYear123('product', $where);
	       $data['pids']=$arr;
	       $demo=array();
	       if(!empty($productlist)){
	           foreach($productlist as $val){
	               $demo['pream_points'][]=$val['pream_points'];
	           }
	       }
	    $data['pream_points']= array_sum($demo['pream_points']);
	    $id2=$_POST['id2'];
	    $pablicid=$customerdata['seller_data']['pablic_id'];
	    if($id2==$pablicid){
	       $insert_data['pablic_id']=$customerdata['seller_data']['pablic_id'];
	    }else{
	        $insert_data['pablic_id']="";
	    }
	   $shop = $this->session->userdata(SHOP_SESSION);
	   $insert_data['amount']=$_POST['ammount'];
	   //echo "<pre>";print_r($arr);die;
	   $insert_data['pid']=json_encode($arr['id']);
	   $insert_data['shop_id']=$shop['shop_id'];
	   //$data['pream_points']=$insert_data['pream_points'];
	   $data['ammount']=$_POST['ammount'];
	   $data['seller_data'] = $this->Common_model->getSingleRecordById('customer', array("pablic_id"=>$insert_data['pablic_id']));
	   if(!empty($data['seller_data'])){
	   	//echo "<pre>";print_r($insert_data);die;
	   	   // $this->session->set_tempdata(array('customerdata'=>$data));
	       $result= $this->Common_model->updateRecords('customer',$insert_data,array('pablic_id'=>$customerdata['seller_data']['pablic_id']));
    	    if(!empty($result)){ 
    	        $data=array("msg"=>"customer amount added sucessfully","status"=>1,"data"=>$data);
    	    }else{
    	       $data=array("msg"=>"customer amount not added sucessfully,please try again","status"=>0);
    	    }
    	    //$data['prems']=$_POST['prems'];
	   //}else{
	   //     $data=array("msg"=>"customer Public Id not valid,please enter valid Public Id","status"=>0);
	   //}
    	   //echo "<pre>";print_r($data);die;
	    echo json_encode($data);die;
	}
  }
  public function updatepoint(){
  	if(!empty($_POST)){
  		$id=$_POST['id'];
  		$pnt=$_POST['pnt'];
  		$post_data=array();
  		$post_data['pream_points']=$pnt;
  		$resu=$this->Common_model->updateRecords("product", $post_data, array('product_id'=>$id));
  		if(!empty($resu)){
  			$msg=array("msg"=>"points updated sucessfully","status"=>1);
  		}else{
  			$msg=array("msg"=>"points not updated","status"=>0);
  		}
  		echo json_encode($msg);exit();
  	}
  }
	public function filterbydate(){
	    $data=array();
	    if(!empty($_POST)){
	        $date=$_POST['date'];
	         $shop = $this->session->userdata(SHOP_SESSION);
	         $data['customerlist']=$this->Common_model->GetWhere('customer', array('shop_id'=>$shop['shop_id'],'checkintime'=>$date));
	    }
	    $this->load->view('shop/header');
    	$this->load->view('shop/destibutionhistory',$data);
    	$this->load->view('shop/footer');
	}
	
	public function Total_Sales()
	{
		$data = array();
		// $shop = $this->session->userdata(SHOP_SESSION);
		// // print_r($shop['shop_id']);die;
		// $whr2 = array('status !='=>3,'shop_id' => $shop['shop_id']);
		// $data['coupons_data'] = $this->Common_model->GetWhere('coupons', $whr2);
		$this->load->view('shop/header');
		$this->load->view('shop/Total_Sales',$data);
		$this->load->view('shop/footer');
	}
	public function  Total_Following_Users()
	{
		$data = array();
		// $shop = $this->session->userdata(SHOP_SESSION);
		// // print_r($shop['shop_id']);die;
		// $whr2 = array('status !='=>3,'shop_id' => $shop['shop_id']);
		// $data['coupons_data'] = $this->Common_model->GetWhere('coupons', $whr2);
		$this->load->view('shop/header');
		$this->load->view('shop/Total_Following_Users',$data);
		$this->load->view('shop/footer');
	}
	public function  Total_CheckIn_Users()
	{
		$data = array();
		// $shop = $this->session->userdata(SHOP_SESSION);
		// // print_r($shop['shop_id']);die;
		// $whr2 = array('status !='=>3,'shop_id' => $shop['shop_id']);
		// $data['coupons_data'] = $this->Common_model->GetWhere('coupons', $whr2);
		$this->load->view('shop/header');
		$this->load->view('shop/Total_CheckIn_Users',$data);
		$this->load->view('shop/footer');
	}
	public function  Tokens()
	{
		$data = array();
		// $shop = $this->session->userdata(SHOP_SESSION);
		// // print_r($shop['shop_id']);die;
		// $whr2 = array('status !='=>3,'shop_id' => $shop['shop_id']);
		// $data['coupons_data'] = $this->Common_model->GetWhere('coupons', $whr2);
		$this->load->view('shop/header');
		$this->load->view('shop/Tokens',$data);
		$this->load->view('shop/footer');
	}
}