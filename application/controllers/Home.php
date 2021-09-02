<?php defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH."libraries/PHPMailer/src/PHPMailer.php");
require(APPPATH."libraries/PHPMailer/src/SMTP.php");
require(APPPATH."libraries/PHPMailer/src/Exception.php");
class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->SessionModel->checkuserlogin(array("sendemaildemo","cartcount","sendsmsdemo","login","loginajax","registerajax","index","registration_otp_send","confirmregisterajax","loginbypassword","createCode","shops","shopdetail","productdetail","variant_price","buynow","addToCart","contact","updateNavCart","cart","removeCartProduct","updateQuantity","addshippinginfo","uploadfilebypath","contactinfo","aboutus","aboutus1","privacy_policy","terms_condition","clearance_product","forgotpasswordsubmit","verifyForgotOtp","changeforgotpasswrodsubmit","loginbyotpsubmit","verifyloginOtp","clearance_detail","subcatbycatname","sell_on_indocliq","vendor_registration","vendorsingup","forget_password","passwordchange","Otpsent","buyer","signIn","signUp","dealerSingup","dealerSinIn","rechargeVirtualCash","sellerHome","sellerSpecificQuote","globalQuote","inShopRequest","demo"));
	}

	public function index(){
	    redirect(base_url()."adminnew");
		//echo "Comming Soon";die;
	   // echo "hi";
// 		$this->load->view('front/header');
// 		$this->load->view('front/home');
// 		$this->load->view('front/footer');
        $data=array();
    	if(!empty($_POST)){
    		$data['name']=$_POST['name'];
    		$data['email']=$_POST['email'];
    		$data['number']=$_POST['number'];
    		$data['message']=$_POST['massage'];
    		$data['create_date']=date('Y-m-d H:i:s');
    		$result = $this->Common_model->addRecords('contactus',$data);
    		if(!empty($result)){
    			$data['success']="Message send successfully";
    		}else{
    			$data['error']="Message not send, please try again";
    		}
    	}
        $this->load->view('front/header');
		$this->load->view('front/index-5',$data);
		$this->load->view('front/footer');
	}
	public function demo(){
		//echo "df";die;
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/electro-global-req',$data);
		$this->load->view('front/footer');
		//electro-global-req
	}
	public function inShopRequest(){
		//echo "dfdf";//in-shop-request.html
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/in-shop-request',$data);
		$this->load->view('front/footer');
	}
	public function signUp(){
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/sign-up',$data);
		$this->load->view('front/footer');
	}
	public function dealerSingup(){
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/dealer-signup',$data);
		$this->load->view('front/footer');
	}
	public function dealerSinIn(){
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/dealer-signin',$data);
		$this->load->view('front/footer');
	}

	public function globalQuote(){
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/global-quote',$data);
		$this->load->view('front/footer');
	}
	public function signIn(){
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/sign-in',$data);
		$this->load->view('front/footer');
	}
	public function buyer(){
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/buyer-home',$data);
		$this->load->view('front/footer');
	}
	public function rechargeVirtualCash(){
		$data=array();
		$this->load->view('front/header');
		$this->load->view('front/recharge-virtual-cash',$data);
		$this->load->view('front/footer');
	}
	public function sellerHome(){
		$this->load->view('front/header');
        $this->load->view('front/seller-home');
        $this->load->view('front/footer');
	}
	public function sellerSpecificQuote (){
		$this->load->view('front/header');
        $this->load->view('front/seller-specific-quote');
        $this->load->view('front/footer');
	}
    public function aboutus(){
        $this->load->view('front/header');
        $this->load->view('front/aboutus');
        $this->load->view('front/footer');
    }
    public function subcatbycatname(){
		if(isset($_POST) && !empty($_POST['cat'])){
			$allcats = $_POST['cat'];
			// $allcats = implode("', '", $cats);
			$whr2 = "WHERE status = 1 AND category_name = '".$allcats."'";
			$orderby = " ORDER BY categories_id asc";
			$categories_data = $this->Common_model->getwherecustomesingle('categories',$whr2,$orderby);
			if(isset($categories_data) && !empty($categories_data)){
				// $catids = array();
				// foreach ($categories_data as $key => $catdataarray) {
				// 	$catids[] = $catdataarray['categories_id'];
				// }

				$whr3 = "WHERE status = 1 AND parent_category_id in ('".$categories_data['categories_id']."')";
				$orderby3 = " ORDER BY categories_id asc";
				$subcategories_data = $this->Common_model->getwherecustome('categories',$whr3,$orderby3);
				// print_r($subcategories_data);
				if(isset($subcategories_data) && !empty($subcategories_data)){
					foreach($subcategories_data as $subcategories_data_array){
						echo "<option value='".$subcategories_data_array['category_name']."'>".$subcategories_data_array['category_name']."</option>";
					}
				}
			}else{

			}
		}else{

		}
	}
	
	public function submitreturnreson(){
    	// print_r($_POST);
    	// exit();
    	// if(isset($_POST[''])){

    	// }
    	$this->load->library('form_validation');
        $this->form_validation->set_rules('reson', 'Reson', 'required|trim');
        $this->form_validation->set_rules('user_id', 'User Id', 'required|trim');
        $this->form_validation->set_rules('order_product_id', 'item Id', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            // $response = array('status' => 0, 'message' =>  validation_errors());
            // $this->response($response);
            $msg = array('status'=>0, 'msg'=>validation_errors());
			echo json_encode($msg);
			exit();
        }else{
        	$order_product_id = $_POST['order_product_id'];
        	$spdata = $this->Common_model->getWhereData("order_products",array('id'=>$order_product_id,'product_delivery_status'=>4));
        	$chkreturnrequest = $this->Common_model->getWhereData("return_replace_request",array('order_product_id'=>$order_product_id));

        	if(empty($chkreturnrequest)){
        		if(isset($spdata) && !empty($spdata)){
        			$orderdata = $this->Common_model->getSingleRecordById('	orders',array('id'=> $spdata['order_id'][0]));
        			$post_data = array();
		        	$post_data['order_product_id'] = $_POST['order_product_id'];
		        	$post_data['reson'] = $_POST['reson'];
		        	$post_data['user_id'] = $_POST['user_id'];
		        	$post_data['create_date'] = date('Y-m-d H:i:s');

		        	// print_r($post_data);
		        	$this->Common_model->addRecords('return_replace_request',$post_data);
		        	$message = "User want to return order id ".$orderdata['invoice_no']." , order item id ".$_POST['order_product_id']."  please chk";
            		// foreach ($driversdata as $driversdataarray){
            		// 	$dmr[] = $driversdataarray['mobile_no'];
            		// 	// send_smtp_mail($driversdataarray['email'],company_email, "order message","",$deliveryboymessage);
            		// }
            		// $dmri = implode(",", $dmr);
            		$to = "return@meralocalmart.com";
            		$from = "return@meralocalmart.com";
            		$subject = "Return Order";
            		returnorder_send_smtp_mail($to, $from, $subject,"",$message);
            		sendsms(RETURNORDER_MOBILE,'91',$message);
	        		$msg = array('status'=>1, 'msg'=>'Return or Replace request has been send successfully.');
					echo json_encode($msg);
					exit();
				}else{
					$msg = array('status'=>0, 'msg'=>'You can not return or replace these order now.');
					echo json_encode($msg);
					exit();
				}
        	}else{
        		$msg = array('status'=>0, 'msg'=>'You have already send return or replace request.');
				echo json_encode($msg);
				exit();
        	}
		}
    }
    
    public function sendsmsdemo($user_number){
        $message = "your Txn OTP Demo 45678";
	    $response = sendsms("8962327488,8269776648","91",$message);
	    // $response = sendotp($user_number,"91",478965);
	    var_dump($response);
    }

    public function sendemaildemo(){
    	$to = "nirbhay.itspark@gmail.com";
		$subject = "";
        $headers = "From: meralocalmart@gmail.com";
        $template = "hello testing";
        // $rs = send_smtp_mail($to, "meralocalmart@gmail.com", $subject,'',$template);
        send_smtp_mail($to, "meralocalmart@gmail.com", $subject,'',$template);

    }

	public  function registerajax(){
		// print_r($_POST);
		if(isset($_POST) && !empty($_POST)){
			$post_data = array();
			$post_data['first_name'] = $_POST['first_name'];
			$post_data['last_name'] = $_POST['last_name'];
			$post_data['latitude'] = (isset($_POST['latitude']) ? $_POST['latitude'] : '');
			$post_data['longitude'] = (isset($_POST['longitude']) ? $_POST['longitude'] : '');
			$mobile_no = $_POST['mobile_no'];
			$password = $_POST['password'];
			$checkmobileno = $this->Common_model->GetWhere('users', array('mobile_no'=>$mobile_no));
			if(empty($checkmobileno)){
				$post_data['mobile_no'] = $mobile_no;
				$post_data['password'] = md5($password);
				$respotp = $this->registration_otp_send($mobile_no,91);
				$resotparray = json_decode($respotp,true);
				if(isset($resotparray) && $resotparray['status'] == 1){
					$set_data_id = $this->session->set_tempdata(array('registration_otp_data'=>$post_data),"",240);
	       	     	$registraiton_data = $this->session->tempdata('registration_otp_data');
	       	     	$data['registration_otp_data'] = $registraiton_data;
	       	     	$data['success'] = "Enter otp and verify mobile number for registration.";
	       	     	$msg = array('status'=>1, 'msg'=>'Your OTP has been sent successfully, please check your Number for getting OTP...@'); 
					echo json_encode($msg);
					exit();
				}else{
	       	    	$msg = array('status'=>0, 'msg'=>'Invalid Mobile No.'); 
					echo json_encode($msg);
					exit();
	       	    }
 			}else if(!empty($checkmobileno)){
 				$msg = array('status'=>0, 'msg'=>'Mobile No. already exits please try again.');
				echo json_encode($msg);
				exit();
			}else{

			}
		}
	}

	public function forgotpasswordsubmit(){
		// print_r($_POST);
		$mobile_no = $_POST['moibleno'];
		$checkmobileno = $this->Common_model->GetWhere('users', array('mobile_no'=>$mobile_no));
		if(!empty($checkmobileno)){
			$post_data = array();
			$post_data['mobile_no'] = $mobile_no;
			$respotp = $this->forgot_otp_send($mobile_no,91);
			$resotparray = json_decode($respotp,true);
			// print_r($resotparray);
			if(isset($resotparray) && $resotparray['status'] == 1){
				$set_data_id = $this->session->set_tempdata(array('forgot_otp_data'=>$post_data),"",240);
       	     	$registraiton_data = $this->session->tempdata('forgot_otp_data');
       	     	$data['forgot_otp_data'] = $registraiton_data;
       	     	$data['success'] = "Enter otp and verify mobile number for set password.";
       	     	$msg = array('status'=>1, 'msg'=>'Your OTP has been sent successfully, please check your Number for getting OTP...@'); 
				echo json_encode($msg);
				exit();
			}else{
       	    	$msg = array('status'=>0, 'msg'=>'Invalid Mobile No.'); 
				echo json_encode($msg);
				exit();
       	    }
		}else{
				$msg = array('status'=>0, 'msg'=>'Invalid mobile number. please try again.');
			echo json_encode($msg);
			exit();
		}
	}

	public function changeforgotpasswrodsubmit(){
		$new_password = $_POST['fnewpassword'];
		$c_password = $_POST['fcpassword'];
		$registraiton_data = $this->session->tempdata('forgot_otp_data');

		if(isset($registraiton_data) && !empty($registraiton_data)){
			if(isset($new_password) && !empty($new_password) && isset($c_password) && !empty($c_password)){
				$post_data = array();
				$post_data['show_password'] = $new_password;
				$post_data['password'] = md5($new_password);

				if($new_password == $c_password){
					$this->Common_model->updateRecords('users', $post_data,array('mobile_no'=> $registraiton_data['mobile_no']));
					$msg = array('status'=>1, 'msg'=>'your password has been changed successfully.');
					echo json_encode($msg);
					exit();
				}else{
					$msg = array('status'=>0, 'msg'=>'password and confirm  are not mathced, please try again');
					echo json_encode($msg);
					exit();
				}

			}else{
				$msg = array('status'=>0, 'msg'=>'password and confirm password are required please try again');
				echo json_encode($msg);
				exit();
			}
		}else{
			$msg = array('status'=>0, 'msg'=>'your session has been expired please try agian.');
				echo json_encode($msg);
				exit();
		}
	}

	public function loginbyotpsubmit(){
		$mobile_no = $_POST['moibleno'];
		$checkmobileno = $this->Common_model->GetWhere('users', array('mobile_no'=>$mobile_no));
		if(!empty($checkmobileno)){
			$post_data = array();
			$post_data['mobile_no'] = $mobile_no;
			$respotp = $this->login_otp_send($mobile_no,91);
			$resotparray = json_decode($respotp,true);
			// print_r($resotparray);
			if(isset($resotparray) && $resotparray['status'] == 1){
				$set_data_id = $this->session->set_tempdata(array('login_otp_data'=>$post_data),"",240);
       	     	$registraiton_data = $this->session->tempdata('login_otp_data');
       	     	$data['login_otp_data'] = $registraiton_data;
       	     	$data['success'] = "Enter otp and verify mobile number for set password.";
       	     	$msg = array('status'=>1, 'msg'=>'Your OTP has been sent successfully, please check your Number for getting OTP...@'); 
				echo json_encode($msg);
				exit();
			}else{
       	    	$msg = array('status'=>0, 'msg'=>'Invalid Mobile No.'); 
				echo json_encode($msg);
				exit();
       	    }
		}else{
				$msg = array('status'=>0, 'msg'=>'Invalid mobile number. please try again.');
			echo json_encode($msg);
			exit();
		}
	}

    public function saveReview(){
        // print_r($_POST);
        $cid = customersessionid();
        $order_id = $_POST['order_id'];
        $shop_id = $_POST['shop_id'];
        $checkreviewstatus = $this->Common_model->GetWhere('shopreviewrating', array('user_id'=>$cid,'order_id'=>$order_id));
        if(empty($checkreviewstatus)){
        	$post_data = array();
        	$post_data['rating'] = $_POST['rating'];
        	$post_data['shop_id'] = $shop_id;
        	$post_data['order_id'] = $order_id;
        	$post_data['user_id'] = $cid;
        	$post_data['create_date'] = date('Y-m-d H:i:s');
        	$result = $this->Common_model->addRecords('shopreviewrating',$post_data);
        	if($result){
				$msg = array('status'=>1, 'msg'=>'Thanks for submit your feedback');
				echo json_encode($msg);
				exit();
			}else{
				$msg = array('status'=>0, 'msg'=>'Oops something went wrong please try again.');
				echo json_encode($msg);
				exit();
			}
        }else{
        	$msg = array('status'=>0, 'msg'=>'You have already sent your feedback.');
			echo json_encode($msg);
			exit();
        }
    }

    public function saveProductReview(){
        $cid = customersessionid();
        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $checkreviewstatus = $this->Common_model->GetWhere('productreviewrating', array('user_id'=>$cid,'order_id'=>$order_id,'product_id'=>$product_id));
        if(empty($checkreviewstatus)){
        	$post_data = array();
        	$post_data['rating'] = $_POST['rating'];
        	$post_data['product_id'] = $product_id;
        	$post_data['order_id'] = $order_id;
        	$post_data['user_id'] = $cid;
        	$post_data['create_date'] = date('Y-m-d H:i:s');
        	$result = $this->Common_model->addRecords('productreviewrating',$post_data);
        	if($result){
				$msg = array('status'=>1, 'msg'=>'Thanks for submit your feedback');
				echo json_encode($msg);
				exit();
			}else{
				$msg = array('status'=>0, 'msg'=>'Oops something went wrong please try again.');
				echo json_encode($msg);
				exit();
			}
        }else{
        	$msg = array('status'=>0, 'msg'=>'You have already sent your feedback.');
			echo json_encode($msg);
			exit();
        }
    }

	public function registration_otp_send($mobile_no,$country_isd_code){
		
		if($mobile_no){
			$otp = $this->createCode('registration_otp','otp',6);
			$check_user = $this->Common_model->getSingleRecordById('registration_otp',array('mobile_no'=> $mobile_no));
			$post_data = array();
			$post_data['mobile_no'] = $mobile_no;
			$post_data['create_date'] = date('Y-m-d H:i:s');
			$post_data['otp'] = $otp;
			if($check_user){
				$update = $this->Common_model->updateRecords('registration_otp', $post_data,array('mobile_no'=> $mobile_no));
			}else{
				$add_otp = $this->Common_model->addRecords('registration_otp',$post_data);
			}
			$check_number = $this->Common_model->getwhere('users',array('mobile_no'=> $mobile_no));
			if(empty($check_number)){
                $user_number = $mobile_no;
                $user_country_isd_code = $country_isd_code;
                $user_number_isd_code =  $user_country_isd_code.$user_number;
                if(!empty($user_number_isd_code)){
	                $message = "your Txn OTP ".$otp;
	                $response = sendotp($user_number,$user_country_isd_code,$otp);
					if($response){
						$msg = array('status'=>1, 'msg'=>'Your OTP has been sent successfully, please check your Number for getting OTP...@'); 
						  return json_encode($msg);
						  exit();
						//echo json_encode($msg);
					}else{
					     $msg = array('status'=>0, 'msg'=>'Error submitting!'); 
						  return json_encode($msg);
						  exit();
						// $data['message'] = "Error please try again!";
					}
				}else{
					$msg = array('status'=>0, 'msg'=>'Your Number not registered!'); 
					return json_encode($msg);
					exit();
				}
			}
		}
	}

	public function forgot_otp_send($mobile_no,$country_isd_code){
		
		if($mobile_no){
			$otp = $this->createCode('forgot_otp','otp',6);
			$check_user = $this->Common_model->getSingleRecordById('forgot_otp',array('mobile_no'=> $mobile_no));
			$post_data = array();
			$post_data['mobile_no'] = $mobile_no;
			$post_data['create_date'] = date('Y-m-d H:i:s');
			$post_data['otp'] = $otp;
			if($check_user){
				$update = $this->Common_model->updateRecords('forgot_otp', $post_data,array('mobile_no'=> $mobile_no));
			}else{
				$add_otp = $this->Common_model->addRecords('forgot_otp',$post_data);
			}
			$check_number = $this->Common_model->getwhere('users',array('mobile_no'=> $mobile_no));
			if(!empty($check_number)){
                $user_number = $mobile_no;
                $user_country_isd_code = $country_isd_code;
                $user_number_isd_code =  $user_country_isd_code.$user_number;
                if(!empty($user_number_isd_code)){
	                $message = "your Txn OTP ".$otp;
	                $response = sendotp($user_number,$user_country_isd_code,$otp);
					if($response){
						$msg = array('status'=>1, 'msg'=>'Your OTP has been sent successfully, please check your Number for getting OTP...@'); 
						  return json_encode($msg);
						  exit();
						//echo json_encode($msg);
					}else{
					     $msg = array('status'=>1, 'msg'=>'Error submitting!'); 
						  return json_encode($msg);
						  exit();
						// $data['message'] = "Error please try again!";
					}
				}else{
					$msg = array('status'=>1, 'msg'=>'Your Number not registered!'); 
					return json_encode($msg);
					exit();
				}
			}
		}
	}

	public function login_otp_send($mobile_no,$country_isd_code){
		
		if($mobile_no){
			$otp = $this->createCode('login_otp','otp',6);
			$check_user = $this->Common_model->getSingleRecordById('login_otp',array('mobile_no'=> $mobile_no));
			$post_data = array();
			$post_data['mobile_no'] = $mobile_no;
			$post_data['create_date'] = date('Y-m-d H:i:s');
			$post_data['otp'] = $otp;
			if($check_user){
				$update = $this->Common_model->updateRecords('login_otp', $post_data,array('mobile_no'=> $mobile_no));
			}else{
				$add_otp = $this->Common_model->addRecords('login_otp',$post_data);
			}
			$check_number = $this->Common_model->getwhere('users',array('mobile_no'=> $mobile_no));
			if(!empty($check_number)){
                $user_number = $mobile_no;
                $user_country_isd_code = $country_isd_code;
                $user_number_isd_code =  $user_country_isd_code.$user_number;
                if(!empty($user_number_isd_code)){
	                $message = "your Txn OTP ".$otp;
	                $response = sendotp($user_number,$user_country_isd_code,$otp);
					if($response){
						$msg = array('status'=>1, 'msg'=>'Your OTP has been sent successfully, please check your Number for getting OTP...@'); 
						  return json_encode($msg);
						  exit();
						//echo json_encode($msg);
					}else{
					     $msg = array('status'=>1, 'msg'=>'Error submitting!'); 
						  return json_encode($msg);
						  exit();
						// $data['message'] = "Error please try again!";
					}
				}else{
					$msg = array('status'=>1, 'msg'=>'Your Number has been not registered!'); 
					return json_encode($msg);
					exit();
				}
			}
		}
	}

	public function verifyForgotOtp(){

		if(isset($_POST) && !empty($_POST)){
			$forgot_otp_data = $this->session->tempdata('forgot_otp_data');
			if(isset($forgot_otp_data) && !empty($forgot_otp_data)){
				if(isset($_POST['otp']) && !empty($_POST['otp'])){
					$mobile_no = $forgot_otp_data['mobile_no'];
					$checkmobilenootp = $this->Common_model->GetWhere('forgot_otp', array('mobile_no'=>$mobile_no,'otp'=>$_POST['otp']));
					if(isset($checkmobilenootp) && !empty($checkmobilenootp)){
						$msg = array('status'=>1, 'msg'=>'OTP has been verify successfully please login now.');
						echo json_encode($msg);
						exit();
					}else{
						$msg = array('status'=>0, 'msg'=>'Invalid otp please enter valid otp.');
						echo json_encode($msg);
						exit();
					}

				}else{
					$msg = array('status'=>0, 'msg'=>'Please enter otp');
					echo json_encode($msg);
					exit();
				}
			}else{
				$msg = array('status'=>0, 'msg'=>'Your session has been expired please resubmit your registration detail.');
				echo json_encode($msg);
				exit();
			}
		}
	}

	public function verifyloginOtp(){
		if(isset($_POST) && !empty($_POST)){
			$forgot_otp_data = $this->session->tempdata('login_otp_data');
			if(isset($forgot_otp_data) && !empty($forgot_otp_data)){
				if(isset($_POST['otp']) && !empty($_POST['otp'])){
					$mobile_no = $forgot_otp_data['mobile_no'];
					$checkmobilenootp = $this->Common_model->GetWhere('login_otp', array('mobile_no'=>$mobile_no,'otp'=>$_POST['otp']));
					if(isset($checkmobilenootp) && !empty($checkmobilenootp)){
						$checkuser = $this->Common_model->GetWhere('users', array('mobile_no'=>$mobile_no));
						if(isset($checkuser) && !empty($checkuser)){
							$checkuserrow = $checkuser[0];
							if($checkuserrow['status'] == 1){
								$this->session->set_userdata(USER_SESSION, $checkuserrow);
								$msg = array('status'=>1, 'msg'=>'Success ! Welcome to eshop.');
								echo json_encode($msg);
								exit();	
							}else{
								$msg = array('status'=>0, 'msg'=>'Your account has been deactivated ,please contact with admin');
								echo json_encode($msg);
								exit();	
							}
						}else{
							$msg = array('status'=>0, 'msg'=>'Oops something went wrong please try again.');
							echo json_encode($msg);
							exit();
						}
					}else{
						$msg = array('status'=>0, 'msg'=>'Invalid otp please enter valid otp.');
						echo json_encode($msg);
						exit();
					}

				}else{
					$msg = array('status'=>0, 'msg'=>'Please enter otp');
					echo json_encode($msg);
					exit();
				}
			}else{
				$msg = array('status'=>0, 'msg'=>'Your session has been expired please resubmit your registration detail.');
				echo json_encode($msg);
				exit();
			}
		}
	}

	public function confirmregisterajax(){

		if(isset($_POST) && !empty($_POST)){
			$registraiton_data = $this->session->tempdata('registration_otp_data');
			if(isset($registraiton_data) && !empty($registraiton_data)){
				if(isset($_POST['otp']) && !empty($_POST['otp'])){
					$mobile_no = $registraiton_data['mobile_no'];
					$checkmobilenootp = $this->Common_model->GetWhere('registration_otp', array('mobile_no'=>$mobile_no,'otp'=>$_POST['otp']));
					if(isset($checkmobilenootp) && !empty($checkmobilenootp)){
						$checkmobileno = $this->Common_model->GetWhere('users', array('mobile_no'=>$mobile_no));
						if(empty($checkmobileno)){
							$registraiton_data['create_date'] = date('Y-m-d H:i:s');
							$result = $this->Common_model->addRecords('users',$registraiton_data);
							if($result){
								$userdata = $this->Common_model->GetWhere('users', array('id'=>$result));
							    $this->session->set_userdata(USER_SESSION, $userdata[0]);
								$userregid = userprefix.$result;
								$this->Common_model->updateRecords('users',array('reg_id'=>$userregid),array('id'=> $result));
								$msg = array('status'=>1, 'msg'=>'Registration has been done successfully please login now.');
								echo json_encode($msg);
								exit();
							}else{
								$msg = array('status'=>0, 'msg'=>'Oops something went wrong please try again.');
								echo json_encode($msg);
								exit();
							}
						}else{
							$msg = array('status'=>0, 'msg'=>'You have already registered from this mobile number.');
							echo json_encode($msg);
							exit();
						}
					}else{
						$msg = array('status'=>0, 'msg'=>'Invalid otp please enter valid otp.');
						echo json_encode($msg);
						exit();
					}

				}else{
					$msg = array('status'=>0, 'msg'=>'Please enter otp');
					echo json_encode($msg);
					exit();
				}
			}else{
				$msg = array('status'=>0, 'msg'=>'Your session has been expired please resubmit your registration detail.');
				echo json_encode($msg);
				exit();
			}
		}
	}

	public function loginbypassword(){
		if(isset($_POST) && !empty($_POST)){
			if(isset($_POST['mobile_no']) && !empty($_POST['mobile_no']) && isset($_POST['password']) && !empty($_POST['password'])){
				$mobile_no = $_POST['mobile_no'];
				$password = md5($_POST['password']);
				$checkuser = $this->Common_model->GetWhere('users', array('mobile_no'=>$mobile_no,'password'=>$password));
				if(isset($checkuser) && !empty($checkuser)){
					$checkuserrow = $checkuser[0];
					if($checkuserrow['status'] == 1){
						$this->session->set_userdata(USER_SESSION, $checkuserrow);
			
						$msg = array('status'=>1, 'msg'=>'Success ! Welcome to eshop.');
						echo json_encode($msg);
						exit();	
			
					}else{
						$msg = array('status'=>0, 'msg'=>'Your account has been deactivated ,please contact with admin');
						echo json_encode($msg);
						exit();	
					}
				}else{
					$msg = array('status'=>0, 'msg'=>'Invalid Mobile no. & Password  please try again.');
					echo json_encode($msg);
					exit();
				}

			}else{
				$msg = array('status'=>0, 'msg'=>'Mobile no. & Password has been required please try again.');
				echo json_encode($msg);
				exit();
			}
		}
	}

	public function createCode($table,$column_name,$length)
	{
		$jc = "";
		$jay = generateRandomStringbylnth($length);
		$js = $this->Common_model->getSingleRecordById($table,array($column_name => $jay));
		if($js){
			$jc = $this->createCode($table,$column_name);
		}else{
			$jc = $jay;
		}
		return $jc;
    }

    public function orderhistory(){
    	$data = array();

    	$userid = customersessionid();
    	
    	// if(isset($_GET['delivery_status']) && !empty($_GET['delivery_status']) && isset($userid)){
    	  
    	  
    	// 	$whr = array();
    	// 	$whr[] = "o.status = 1";
    	// 	$whr[] = "o.delivery_status = 1";
    	// 	$orderby = " ORDER BY o.id desc";
    	// 	$where = " WHERE ".implode(" AND ", $whr);
     //    	$data['orders'] = $this->Common_model->getwhereorders($where,$orderby);
    	//    // $data['orders'] = $this->Common_model->getWhereDatanew($where,array('user_id'=>$userid,'status'=>1,'delivery_status'=>1));
    	// }
    	
    	  
		$whr = array();
		$whr[] = "o.status = 1";
		$whr[] = "o.user_id = ".$userid."";
		if(isset($_GET['delivery_status']) && !empty($_GET['delivery_status'])){
    		$whr[] = "o.delivery_status = ".$_GET['delivery_status']."";
    	}

		$orderby = " ORDER BY o.id desc";
		$where = " WHERE ".implode(" AND ", $whr);
    	$data['orders'] = $this->Common_model->getwhereorders($where,$orderby);   
    // 	print_r($data['orders']);
        // die;
    	$this->load->view('front/header');
        $this->load->view('front/orderhistory',$data);
        $this->load->view('front/footer');
    }
    
    public function productdetail(){
    	$pid = $_GET['pid'];
    // 	print_r($pid);
    	$data = array();
    // 	$data = array();
    	$userid = customersessionid();
    //     $whr = array();
    //     $whr[] = "status = 1";
    //     $whr[] = "user_id = ".$userid."";
    //     if(isset($_GET['pid']) && !empty($_GET['pid'])){
    //     		$whr[] = "product_id = ".$pid."";
    //     	}
    //     $where = " WHERE ".implode(" AND ", $whr);	
    //     $data['rating'] = $this->Common_model->getwhrproductrating($where); 
    //     $abcd = $data['rating'][0];
    //     $dsas = $abcd['rating'];
    //     // print_r($dsas);
    //     print_r($data['rating']);
    //     die;
    
        // $whr = array();
        // $whr[] = "status = 1";
        // if(isset($_GET['pid']) && !empty($_GET['pid'])){
        // 		$whr[] = "product_id = ".$pid."";
        // 	}
        // $where = " WHERE ".implode(" AND ", $whr);	
        // $data['review'] = $this->Common_model->getwhrproductratingdetail($where); 
        // $abcd = $data['rating'][0];
        // $dsas = $abcd['rating'];
        // print_r($dsas);
        // print_r($data['review']);
        // die;
        
    //     $whr = array();
    //     $whr[] = "status = 1";
       
    //     if(isset($_GET['pid']) && !empty($_GET['pid'])){
    // 		$whr[] = "product_id = ".$pid."";
    // 	}
    //     // print_r($whr);	
    //     $where = " WHERE ".implode(" AND ", $whr);	
    //     $data['ratingavg'] = $this->Common_model->getwhrproductratingaverage($where); 
        
    //     print_r($data['ratingavg']);
    //     die;
    
        // $whr = array();
        // $whr[] = "status = 1";
        // if(isset($_GET['pid']) && !empty($_GET['pid'])){
        // 		$whr[] = "product_id = ".$pid."";
        // 	}
        // $where = " WHERE ".implode(" AND ", $whr);	
        // $datareview = $this->Common_model->getwhrproductratingdetail($where); 
        // // print_r($data['review']);
        // print_r($datareview);
        // die;
		$data['product_data'] = $this->Common_model->getSingleRecordById("product",array('product_id'=>$pid));
// 		print_r($data['product_data']);
		$data['color'] = $this->Common_model->getwhere("colors",array(1=>1));
		$data['categorylist'] = $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>0));
    	$this->load->view('front/header');
		$this->load->view('front/productdetail',$data);
		$this->load->view('front/footer');
    }

    public function clearance_product(){
    	$data = array();
    	$cid = customersessionid();
    	$whr = array();
    	$u_lat = '';
    	$u_long = '';
    	$whr[] = 'status = 1';
    	if(isset($cid) && !empty($cid)){
    		$customerdata = customerdata(customersessionid());
    		// p($customerdata);
    		 $u_lat = $customerdata['latitude'];
    		 $u_long = $customerdata['longitude'];
    	}
    	
    	if(isset($_GET['categories_id']) && !empty($_GET['categories_id'])){
    		$whr[] = " FIND_IN_SET('".$_GET['categories_id']."',shopping_categories)";
    	}

    	if(isset($_GET['special_cat_id']) && !empty($_GET['special_cat_id'])){
    		$whr[] = " FIND_IN_SET('".$_GET['special_cat_id']."',shopping_specialized)";
    	}

    	if(isset($_GET['tags']) && !empty($_GET['tags'])){
    		$whr[] = " FIND_IN_SET('".$_GET['tags']."',meta_tags)";
    	}

    	$where = " WHERE ".implode(" AND ", $whr);
    	$cols = "s.*";
    	if(isset($u_lat) && !empty($u_lat) & isset($u_long) && !empty($u_long)){
    		$orderby = "ORDER BY distance ASC";
    		$all_shop_data = $this->Common_model->getshopsbylatlong($cols,$where,$u_lat,$u_long,$orderby);

    		$data['u_lat'] = $u_lat;
    		$data['u_long'] = $u_long;
    	}else{
    		$orderby = "ORDER BY shop_id ASC";
    		$all_shop_data = $this->Common_model->getshopswhr($cols,$where,$orderby);
    	}
    	// p($all_shop_data);
    	$data['all_shop_data'] = $all_shop_data;

    	// p($all_shop_data);
    	$data['categorylist'] = $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>0));
    	// die;
    	$this->load->view('front/header');
		$this->load->view('front/clearance_product',$data);
		$this->load->view('front/footer');
    }
    
    public function clearance_detail(){
    	$data = array();
    	$shop_id = $_GET['shop_id'];
    	// $cid = customersessionid();
    	// $whr = array();
    	// $u_lat = '';
    	// $u_long = '';
    	// $whr[] = 'status = 1';
    	// if(isset($cid) && !empty($cid)){
    	// 	$customerdata = customerdata(customersessionid());
    	// 	// p($customerdata);
    	// 	 $u_lat = $customerdata['latitude'];
    	// 	 $u_long = $customerdata['longitude'];
    	// }
    	
    	// $where = " WHERE ".implode(" AND ", $whr);
    	// $cols = "s.*";
    	// if(isset($u_lat) && !empty($u_lat) & isset($u_long) && !empty($u_long)){
    	// 	$orderby = "ORDER BY distance ASC";
    	// 	$all_shop_data = $this->Common_model->getshopsbylatlong($cols,$where,$u_lat,$u_long,$orderby);

    	// 	$data['u_lat'] = $u_lat;
    	// 	$data['u_long'] = $u_long;
    	// }else{
    	// 	$orderby = "ORDER BY shop_id ASC";
    	// 	$all_shop_data = $this->Common_model->getshopswhr($cols,$where,$orderby);
    	// }
    	// // p($all_shop_data);
    	// $data['all_shop_data'] = $all_shop_data;
    	// echo $shop_id;
    	// die;
    	$whr = array();
    	$whr[] = 's.status != 3';
    	$whr[] = 's.shop_id = '.$shop_id;
    	$where = " WHERE ".implode(" AND ", $whr);
		if(!empty($shop_id)){
			//$where = array('status !='=>3,'shop_id'=>$shop_id);
			// $data['shop_data'] = $this->Common_model->GetWhere("shops",$where);
			$orderby = "ORDER BY s.shop_id ASC";
    		$data['shop_data'] = $this->Common_model->getshopswhr("s.*",$where,$orderby);
    // 		print_r($data['shop_data']);
			if(!empty($data['shop_data']))
			{
				$shop_data = $data['shop_data'][0];

				// print_r($shop_data);
				$shopping_categories = $shop_data['shopping_categories'];
				// print_r($shopping_categories);
				$result_string = "'" . str_replace(",", "','", $shopping_categories) . "'";
				// echo "Input String: ".$result_string;
				$whrc = " WHERE category_name in (".$result_string.")";
				// print_r($whrc);
				$data['shopping_categories'] = $this->Common_model->getwhrcategoiesbycatname($whrc);
				// print_r($data['shopping_categories']);
				// print_r($res);
				// die;
			}
		}
		$data['shop_id'] = $shop_id;
		$data['shop_type_list'] = $this->Common_model->GetWhere("shop_types",array('1'=>1));
		$data['shop_data'] = $shop_data;
    	$this->load->view('front/header');
		$this->load->view('front/clearance_detail',$data);
		$this->load->view('front/footer');
    }

    public function shops(){
    	$data = array();
    	$cid = customersessionid();
    	$whr = array();
    	$u_lat = '';
    	$u_long = '';
    	$whr[] = 'status = 1';
    	if(isset($cid) && !empty($cid)){
    		$customerdata = customerdata(customersessionid());
    		// p($customerdata);
    		 $u_lat = $customerdata['latitude'];
    		 $u_long = $customerdata['longitude'];
    	}
    	
    	if(isset($_GET['categories_id']) && !empty($_GET['categories_id'])){
    		$whr[] = " FIND_IN_SET('".$_GET['categories_id']."',shopping_categories)";
    	}

    	if(isset($_GET['special_cat_id']) && !empty($_GET['special_cat_id'])){
    		$whr[] = " FIND_IN_SET('".$_GET['special_cat_id']."',shopping_specialized)";
    	}

    	if(isset($_GET['tags']) && !empty($_GET['tags'])){
    		$whr[] = " FIND_IN_SET('".$_GET['tags']."',meta_tags)";
    	}

    	$where = " WHERE ".implode(" AND ", $whr);
    	$cols = "s.*";
    	if(isset($u_lat) && !empty($u_lat) & isset($u_long) && !empty($u_long)){
    		$orderby = "ORDER BY distance ASC";
    		$all_shop_data = $this->Common_model->getshopsbylatlong($cols,$where,$u_lat,$u_long,$orderby);

    		$data['u_lat'] = $u_lat;
    		$data['u_long'] = $u_long;
    	}else{
    		$orderby = "ORDER BY shop_id ASC";
    		$all_shop_data = $this->Common_model->getshopswhr($cols,$where,$orderby);
    	}
    	// p($all_shop_data);
    	$data['categorylist'] = $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>0));
    	$subcategorylist = $this->Common_model->getwhrsubcatgo('categories');
    // 	$subcategory =  $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>$subcategorylist['categories_id']));
    // 	print_r($data['categorylist']);
    // 	print_r($subcategorylist);
        // print_r($subcategory);
        // die;
    	$data['all_shop_data'] = $all_shop_data;
    	$this->load->view('front/header');
		$this->load->view('front/shops',$data);
		$this->load->view('front/footer');
    }

    public function shopdetail(){
    	$data = array();
    	$shop_id = $_GET['shop_id'];
    	// $cid = customersessionid();
    	// $whr = array();
    	// $u_lat = '';
    	// $u_long = '';
    	// $whr[] = 'status = 1';
    	// if(isset($cid) && !empty($cid)){
    	// 	$customerdata = customerdata(customersessionid());
    	// 	// p($customerdata);
    	// 	 $u_lat = $customerdata['latitude'];
    	// 	 $u_long = $customerdata['longitude'];
    	// }
    	
    	// $where = " WHERE ".implode(" AND ", $whr);
    	// $cols = "s.*";
    	// if(isset($u_lat) && !empty($u_lat) & isset($u_long) && !empty($u_long)){
    	// 	$orderby = "ORDER BY distance ASC";
    	// 	$all_shop_data = $this->Common_model->getshopsbylatlong($cols,$where,$u_lat,$u_long,$orderby);

    	// 	$data['u_lat'] = $u_lat;
    	// 	$data['u_long'] = $u_long;
    	// }else{
    	// 	$orderby = "ORDER BY shop_id ASC";
    	// 	$all_shop_data = $this->Common_model->getshopswhr($cols,$where,$orderby);
    	// }
    	// // p($all_shop_data);
    	// $data['all_shop_data'] = $all_shop_data;
    	// echo $shop_id;
    	// die;
    	$whr = array();
    	$whr[] = 's.status != 3';
    	$whr[] = 's.shop_id = '.$shop_id;
    	$where = " WHERE ".implode(" AND ", $whr);
		if(!empty($shop_id)){
			//$where = array('status !='=>3,'shop_id'=>$shop_id);
			// $data['shop_data'] = $this->Common_model->GetWhere("shops",$where);
			$orderby = "ORDER BY s.shop_id ASC";
    		$data['shop_data'] = $this->Common_model->getshopswhr("s.*",$where,$orderby);
    // 		print_r($data['shop_data']);
			if(!empty($data['shop_data']))
			{
				$shop_data = $data['shop_data'][0];

				// print_r($shop_data);
				$shopping_categories = $shop_data['shopping_categories'];
				// print_r($shopping_categories);
				$result_string = "'" . str_replace(",", "','", $shopping_categories) . "'";
				// echo "Input String: ".$result_string;
				$whrc = " WHERE category_name in (".$result_string.")";
				// print_r($whrc);
				$data['shopping_categories'] = $this->Common_model->getwhrcategoiesbycatname($whrc);
				// print_r($data['shopping_categories']);
				// print_r($res);
				// die;
			}
		}
		$data['shop_id'] = $shop_id;
		$data['shop_type_list'] = $this->Common_model->GetWhere("shop_types",array('1'=>1));
		$data['shop_data'] = $shop_data;
    	$this->load->view('front/header');
		$this->load->view('front/shopdetail',$data);
		$this->load->view('front/footer');
    }
    
    public function variant_price()
    {
    	//print_r($_POST);
        $product= $this->Common_model->getSingleRecordById("product",array('product_id'=>$_POST['id']));

        $str = '';
        $quantity = 0;

        if(isset($_POST['color'])){
            $data['color'] = $_POST['color'];
            // $str = Color::where('code', $request['color'])->first()->name;
            $str = $this->Common_model->getWhereDataByCol('colors',array('code'=>$_POST['color']),'name');
        }
        
        foreach (json_decode($product['choice_options']) as $key => $choice) {
            if($str != null){
                $str .= '-'.str_replace(' ', '', $_POST[$choice->name]);
            }
            else{
                $str .= str_replace(' ', '', $_POST[$choice->name]);
            }
        }
        //echo $str;
        if($str != null){
        	// $rsp = json_decode($product['variations'],true);
        	// $qty = $rsp[$str]['qty'];
        	// print_r($rsp);
        	// die;
           $price = json_decode($product['variations'])->$str->price;
           $quantity = json_decode($product['variations'])->$str->qty;
        }
        else{
            $price = $product['unit_price'];
        }

        //discount calculation
        // $flash_deal = \App\FlashDeal::where('status', 1)->first();
        // if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
        //     $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
        //     if($flash_deal_product->discount_type == 'percent'){
        //         $price -= ($price*$flash_deal_product->discount)/100;
        //     }
        //     elseif($flash_deal_product->discount_type == 'amount'){
        //         $price -= $flash_deal_product->discount;
        //     }
        // }
        // else{
        //     if($product->discount_type == 'percent'){
        //         $price -= ($price*$product->discount)/100;
        //     }
        //     elseif($product->discount_type == 'amount'){
        //         $price -= $product->discount;
        //     }
        // }

        // if($product->tax_type == 'percent'){
        //     $price += ($price*$product->tax)/100;
        // }
        // elseif($product->tax_type == 'amount'){
        //     $price += $product->tax;
        // }
        if($product['discount_type'] == 1){
            $price -= ($price*$product['discount'])/100;
        }
        elseif($product['discount_type'] == 2){
            $price -= $product['discount'];
        }
        echo json_encode(array('price' => $price*$_POST['quantity'], 'quantity' => $quantity));
    }

    public function dashboard(){
    	$this->load->view('front/header');
		$this->load->view('front/dashboard');
		$this->load->view('front/footer');
    }
    
    public function change_status(){
        if($_POST)
        {
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
    }
    
    public function reset_status(){

    	// print_r($_POST);
    	// die;
        $tablename = $_POST['tablename'];
        $status = $_POST['status'];
        $id = $_POST['add_id'];
        $userid = $_POST['userid'];
        $action = $_POST['action'];
        $whrcol = $_POST['whrcol']; //id
        $whrcolu = $_POST['whrcolu']; //user_id
        $whrstatuscol = $_POST['whrstatuscol']; //status
        $res = $this->Common_model->updateRecords($tablename, array($whrstatuscol=> 0), array($whrcolu => $userid));
        // $resp = array('code'=>SUCCESS,'message'=>'Record has been '.$action.'successfully');
        $this->Common_model->updateRecords($tablename, array($whrstatuscol=>1), array($whrcol => $id));
        
        // $insert_data = $this->Common_model->getSingleRecordById('multiple_address',array('add_id' => $id, 'status' =>1));
        // $in_data = $insert_data['add_id'];
        // print_r($insert_data);
        // $this->Common_model->updateRecords('users',$insert_data,array('id' => customersessionid()));
        // echo json_encode($resp);
        $msg = array('status'=>1, 'msg'=>'Record has been '.$action.' successfully');
		echo json_encode($msg);
		exit();
    }
    
    public function addmultiaddress($id=false){
        $data = array();
        if(isset($_POST['addressm']) && !empty($_POST['addressm']) && !empty($_POST['pin_codem']))
        {
            $data = array();
			$data['user_id'] = customersessionid();
			$data['address'] = $_POST['addressm'];
			$data['zipcode'] = $_POST['pin_codem'];
			$data['latitude'] = $_POST['latitudem'];
			$data['longitude'] = $_POST['longitudem'];
			$data['name'] = $_POST['name'];
			$data['email'] = $_POST['email'];
			$data['phone'] = $_POST['phone'];

            if(isset($_POST['add_id']) && !empty($_POST['add_id'])){
				$result = $this->Common_model->updateRecords('multiple_address',$data,array('add_id'=>$_POST['add_id']));
				$data['SUCCESS'] = "Successfully Updated";
				// redirect(base_url()."home/profile");

			}else{
			
				$result = $this->Common_model->addRecords('multiple_address',$data);
				$data['SUCCESS'] = "Added successfully";
				// redirect(base_url()."home/profile");
			}  
        }
        if($id){
			$multiple_address_data = $this->Common_model->getsingledata('multiple_address',array('add_id' => $id));
			$data['multiple_address_data'] = $multiple_address_data;
		}
		
        $this->load->view('front/header');
        $this->load->view('front/addmultiaddress',$data);
        $this->load->view('front/footer');
    }

    public function profile(){
        $data = array();
        // $multiple_address_data = $this->Common_model->getAllRecordsById('multiple_address',array('user_id' => customersessionid()));
        // print_r($multiple_address_data);
        // die;
        // $data['multiple_address_data'] = $this->Common_model->getsingledata('multiple_address',array('user_id' => customersessionid()));
        // $data['info_data'] = $info_data;
        // print_r($data);
    //     $choice_options = array();
	   //     if(isset($_POST['addressm'])){
	   //         foreach ($_POST['choice_no'] as $key => $no) {
	   //             $str = 'choice_options_'.$no;
	   //             $item['name'] = 'choice_'.$no;
	   //             $item['title'] = $_POST['choice'][$key];
	   //             $item['options'] = explode(',', implode('|', $_POST[$str]));
	   //             array_push($choice_options, $item);
	   //         }
	   //     }

	   // $post_data['choice_options'] = json_encode($choice_options);
	    
//         if(isset($_POST['addressm']) && !empty($_POST['addressm'])){
//             $data = array();
// 			$data['user_id'] = customersessionid();
// 			$data['address_multi'] = $_POST['addressm'];
// 			$data['zipcode'] = $_POST['pin_codem'];
// 			$data['latitude'] = $_POST['latitudem'];
// 			$data['longitude'] = $_POST['longitudem'];
// 			$result = $this->Common_model->addRecords('multiple_address',$data);
//         }
//         if(isset($_POST['addressm']) && !empty($_POST['addressm']) && !empty($_POST['pin_codem']))
//         {
//             $data = array();
// 			$data['user_id'] = $_POST['user_id'];
// 			$data['address_multi'] = $_POST['addressm'];
// 			$data['zipcode'] = $_POST['pin_codem'];
// 			$data['latitude'] = $_POST['latitudem'];
// 			$data['longitude'] = $_POST['longitudem'];
// // 			$result = $this->Common_model->addRecords('multiple_address',$data);
//             $result = $this->Common_model->updateData('multiple_address',$data,array('user_id' => customersessionid()));
//             if(['success']){
//                 echo "Successfully Updated";
//             }
//         }
        // else{
        // echo "All fields are required";
        // }
    	$this->load->view('front/header');
		$this->load->view('front/profile',$data);
		$this->load->view('front/footer');
    }

    public function contact()
    {
    	$data = array();
    	// print_r($_POST);
    	// if(isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['number']))
    	// {
	    // 	$insert_data = array();
	    // 	$insert_data['name'] = $_POST['name'];
	    // 	$insert_data['email'] = $_POST['email'];
	    // 	$insert_data['number'] = $_POST['number'];
	    // 	$insert_data['message'] = $_POST['message'];
	    // 	$result = $this->Common_model->addrecords('contactus',$insert_data);
    	// }
    	$this->load->view('front/header');
		$this->load->view('front/contact',$data);
		$this->load->view('front/footer');
    }

    public function contactinfo()
    {
    	// print_r($_POST);
    	if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['number']) && !empty($_POST['number']))
    	{
    		// print_r($_POST);
	    	$insert_data = array();
	    	$insert_data['name'] = $_POST['name'];
	    	$insert_data['email'] = $_POST['email'];
	    	$insert_data['number'] = $_POST['number'];
	    	$insert_data['message'] = $_POST['message'];
	    	// $checkemail = $this->Common_model->getWhereData('contactus', array('email' => $_POST["email"]));
			$result = $this->Common_model->addrecords('contactus',$insert_data);
			// redirect(base_url()."home/contactus");
			if(!empty($result))
			{
			// $result = $this->Common_model->addrecords('contactus',$insert_data);
	 	 	$status = 1;
	  		$msg = "Contact has been Send successfully";
	        // redirect(base_url()."home/contact");	
			}
			echo $response = json_encode(array("status" => $status, "msg" => $msg));
			exit();	
    	}else{
    		$status = 0;
    		$msg = "Email and name are required ";
    		echo $response = json_encode(array("status" => $status, "msg" => $msg));
			exit();
    	}
    }

    public function career()
    {
    	
    	$this->load->view('front/header');
		$this->load->view('front/career');
		$this->load->view('front/footer');
    }

    public function privacy_policy()
    {
    	
    	$this->load->view('front/header');
		$this->load->view('front/privacy_policy');
		$this->load->view('front/footer');
    }

    public function green_grocery()
    {
    	
    	$this->load->view('front/header');
		$this->load->view('front/green_grocery');
		$this->load->view('front/footer');
    }

    public function terms_condition(){
        $this->load->view('front/header');
        $this->load->view('front/terms_condition');
        $this->load->view('front/footer');
 	} 

    public function addToCart(){
    	$product= $this->Common_model->getSingleRecordById("product",array('product_id'=>$_POST['id']));
    	$data = array();
    	$shop_id = $product['shop_id'];
        $data['id'] = $_POST['id'];
        $data['name'] = $product['name'];
        $str = '';

        if(isset($_POST['color'])){
            $data['color'] = $_POST['color'];
            // $str = Color::where('code', $request['color'])->first()->name;
            $str = $this->Common_model->getWhereDataByCol('colors',array('code'=>$_POST['color']),'name');
        }

        // print_r($_POST);
        // print_r($product['choice_options']);
        $d = array();
        foreach(json_decode($product['choice_options']) as $key => $choice) {
        	$data[$choice->name] = $_POST[$choice->name];
            $d[][$choice->title] = $_POST[$choice->name];
            if($str != null){
                $str .= '-'.str_replace(' ', '', $_POST[$choice->name]);
            }
            else{
                $str .= str_replace(' ', '', $_POST[$choice->name]);
            }
        }
        $data['variations'] = json_encode($d);
        if($str != null){
            $variations = json_decode($product['variations']);
            // print_r($variations);
            // echo $str;
            $price = $variations->$str->price;
            if($variations->$str->qty >= $_POST['quantity']){
                // $variations->$str->qty -= $request['quantity'];
                // $product->variations = json_encode($variations);
                // $product->save();
            }
            else{
                //return view('frontend.partials.outOfStockCart');
                //echo "this product has been out of stock";
                $msg = array('status'=>0, 'msg'=>'this product has been out of stock.'); 
				echo json_encode($msg);
                exit();
            }
        }
        else{
            $price = $product['unit_price'];
        }

        if($str != null){
        	// $rsp = json_decode($product['variations'],true);
        	// $qty = $rsp[$str]['qty'];
        	// print_r($rsp);
        	// die;
           $price = json_decode($product['variations'])->$str->price;
           $mrpprice = json_decode($product['variations'])->$str->price;
           $quantity = json_decode($product['variations'])->$str->qty;
        }
        else{
            $price = $product['unit_price'];
            $mrpprice = $product['unit_price'];
        }
        $discount_amount = 0;
        if($product['discount_type'] == 1){
            $discount_amount = ($price*$product['discount'])/100;
            $price -= ($price*$product['discount'])/100;
            $price = (round($price,0,PHP_ROUND_HALF_UP));
          
        }
        elseif($product['discount_type'] == 2){
            $discount_amount = $product['discount'];
            $price -= $product['discount'];
        }

        $data['quantity'] = $_POST['quantity'];
        $data['main_image'] = $product['main_image'];
        $data['mrp_price'] = $mrpprice;
        $data['price'] = $price;
        // $data['uprice'] = ($price - $product['gst_amount']);
        $data['product_gst'] = $product['product_gst'];
		$data['gst_amount'] = $product['gst_amount'];
        $data['discount'] = $product['discount'];
        $data['discount_type'] = $product['discount_type'];
        $data['discount_amount'] = $discount_amount;
        $data['subtotal_price'] = $price * $_POST['quantity'];
        $data['shop_id'] = $product['shop_id'];
        $cdata = $this->session->userdata('cart');
        // $ccdata = array();
        // print_r($cdata);
        if(isset($cdata) && !empty($cdata)){
            // $new_array = array_merge($this->session->userdata('cart'),$data);
			$ccdata = $this->session->userdata('cart');
	        $oldshopid = $ccdata[0]['shop_id'];
	        if($shop_id == $oldshopid){
		        $ccdata[] = $data;
		        $this->session->set_userdata('cart', $ccdata);
		        //echo "Product has been added successfully";
		        $msg = array('status'=>1, 'msg'=>'Product has been added successfully.'); 
		        
    			
				echo json_encode($msg);
		        exit();
		    }else{
		    	$ccdata[] = $data;
		        $this->session->set_userdata('cart', $ccdata);
		        //echo "Product has been added successfully";
		        $msg = array('status'=>0,'msg'=>'This product is different shop.'); 
				echo json_encode($msg);
		        exit();
		    }
        }else{
			$ccdata[] = $data;
        	$this->session->set_userdata('cart', $ccdata);
        	$msg = array('status'=>1, 'msg'=>'Product has been added successfully.'); 
			echo json_encode($msg);
	        exit();
        }
        // return $this->load->view('front/partials/addToCart',$data,true);
  		// $this->load->view('front/header');
		// $this->load->view('front/contactus');
	}

    public function updateNavCart()
    {
        // return view('frontend.partials.cart');
        $this->load->view('front/partials/cart');
    }
    
    public function couoncodeapply(){
    	if(isset($_POST['couponcode']) && !empty($_POST['couponcode'])){
    		$cid = customersessionid();
    		if(isset($cid) && !empty($cid)){
	    		$couponcode = $_POST['couponcode'];
	    		$check_couponcode = $this->Common_model->getSingleRecord("coupons",array('coupon_code'=>$couponcode));
	    		if(isset($check_couponcode) && !empty($check_couponcode)){
	    			if($check_couponcode['status'] == 1){

	    				$startdate = strtotime($check_couponcode['start_date']);
						$expire = strtotime($check_couponcode['end_date']);
						$today = strtotime(date('Y-m-d'));

						if($today <= $expire && $today >= $startdate){
							$check_orders = $this->Common_model->getSingleRecord("orders",array('coupon_code'=>$couponcode,'user_id'=>$cid));
							if(isset($check_orders) && !empty($check_orders)){	
							    $msg = array('status'=>0, 'msg'=>'you have already used thease coupon code;');
								echo json_encode($msg);
						        exit();
						    }else{
						    	$this->session->set_userdata('couponcode', $check_couponcode);
					    		$msg = array('status'=>1, 'msg'=>'Coupn code has been Applied successfully.');
								echo json_encode($msg);
						        exit();
						    }
						} else {
						    $msg = array('status'=>0, 'msg'=>'Thease coupon code currently not acivated.');
							echo json_encode($msg);
					        exit();
						}
	    				$msg = array('status'=>0, 'msg'=>'Thease coupon code has been deactivated.');
						echo json_encode($msg);
				        exit();
	    			}else{
	    				$msg = array('status'=>0, 'msg'=>'Thease coupon code has been deactivated.');
						echo json_encode($msg);
				        exit();
	    			}

	    		}else{
	    			$msg = array('status'=>0, 'msg'=>'Invalid coupon code');
					echo json_encode($msg);
			        exit();
	    		}
	    	}else{
	    		$msg = array('status'=>0, 'msg'=>'your session has been expired');
				echo json_encode($msg);
		        exit();
	    	}

    		
    	}else{
    		$msg = array('status'=>0, 'msg'=>'Enter coupon code');
			echo json_encode($msg);
	        exit();
    	}
    }

    public function removecouponcode(){
    	$this->session->unset_userdata('couponcode');
		$msg = array('status'=>1, 'msg'=>'Coupon code has been remove successfully.');
		echo json_encode($msg);
        exit();
    }

    public function cart(){
    	$this->load->view('front/header');
    	$this->load->view('front/view_cart');
    	$this->load->view('front/footer');
    }

    public function removeCartProduct(){
    	$pindex = $_POST['pindex'];
		$ccdata = $this->session->userdata('cart');
    	unset($ccdata[$pindex]);
    	//print_r($ccdata);
    	$this->session->set_userdata('cart', $ccdata);
    	$msg = array('status'=>1, 'msg'=>'Product has been Removed successfully.');
		echo json_encode($msg);
        exit();
    }

    public function updateQuantity()
    {
        $cart = $this->session->userdata('cart');
        $kkey = $_POST['key'];
        $quantity = $_POST['quantity'];
        // $cart = $cart->map(function ($object, $)key use ($request){
        //     if($key == $request->key){
        //         $object['quantity'] = $request->quantity;
        //     }
        //     return $object;
        // });
        $ccdata = $cart;
        foreach($cart as $key => $value)
		{
			if($key == $kkey){
			  $ccdata[$kkey]['quantity'] = $quantity;
			  $ccdata[$kkey]['price'] = $value['price'];
			  $ccdata[$kkey]['subtotal_price'] = $value['price'] * $quantity;
			}
		}
        $this->session->set_userdata('cart', $ccdata);
        $this->load->view('front/partials/cart_details');
    }

    public function addshippinginfo(){
        // echo "hi";
        $data = array();
        $data['customerData'] = customerdata(customersessionid());
        $suid = customersessionid();
        if(isset($_POST['submitshippinginfo']) && !empty($_POST['submitshippinginfo'])){
            unset($_POST['submitshippinginfo']);
            $allzipcodes = $this->Common_model->getWhereDatanew('area',array('status'=>1),'area_zipcode');
            $allzipcodesarray = array();
            if(isset($allzipcodes) && !empty($allzipcodes)){
                foreach($allzipcodes as $allzipcodesa){
                    $allzipcodesarray[] = $allzipcodesa['area_zipcode'];
                }
            }
            if($_POST['address_id'] == "newadd"){
            	// print_r($_POST);
            	// die;
            	if (in_array($_POST['postal_code'], $allzipcodesarray))
	            {
	            	$newaddress = array();
	            	$newaddress['user_id'] = $suid;
		            $newaddress['name'] = $_POST['name'];
		            $newaddress['email'] = $_POST['email'];
		            $newaddress['zipcode'] = $_POST['postal_code'];
		            $newaddress['phone'] = $_POST['phone'];
		            $newaddress['address'] = $_POST['address'];
		            $newaddress['latitude'] = (isset($_POST['latitude']) ? $_POST['latitude'] : '');
		            $newaddress['longitude'] = (isset($_POST['longitude']) ? $_POST['longitude'] : '');
		            $newaddress['status'] = 1;
		            $this->Common_model->updateRecords('multiple_address',array('status'=>0),array('user_id'=> $suid));
		            $this->Common_model->addRecords('multiple_address',$newaddress);
                    $newaddress['postal_code'] = $_POST['postal_code'];
	                $this->session->set_userdata('shippinginfo',$newaddress);
	                redirect(base_url().'paymentcheckout');
	            }
	            else
	            {
	                $data['error'] = "Your pin code is not available, please use valid pin code";
	            }
            }else{
	            $oldaddress = $this->Common_model->getSingleRecord("multiple_address",array('add_id' => $_POST['address_id']));
	            if(isset($oldaddress) && !empty($oldaddress)){
		            $post_data = array();
		            $post_data['name'] = $oldaddress['name'];
		            $post_data['email'] = $oldaddress['email'];
		            $post_data['postal_code'] = $oldaddress['zipcode'];
		            $post_data['phone'] = $oldaddress['phone'];
		            $post_data['address'] = $oldaddress['address'];
		            $post_data['latitude'] = $oldaddress['latitude'];
		            $post_data['longitude'] = $oldaddress['longitude'];

		            //$people = array("Peter", "Joe", "Glenn", "Cleveland");
		            // print_r( $people);
		            // echo $_POST['postal_code'];
		            if (in_array($oldaddress['zipcode'], $allzipcodesarray))
		            {
		                $this->session->set_userdata('shippinginfo',$post_data);
		                redirect(base_url().'paymentcheckout');
		            }
		            else
		            {
		                $data['error'] = "Your pin code is not available, please use valid pin code";
		            }
		        }
	        }
        }
           
        $this->load->view('front/header');
        $this->load->view('front/addshippinginfo',$data);
        $this->load->view('front/footer');
    }

    public function paymentcheckout(){
        $data = array();
        $userid = customersessionid();
        if(isset($_POST['submitCheckout']) && !empty($_POST['submitCheckout'])){
            $payment_type = $_POST['payment_option'];
            $shippinginfo = $this->session->userdata('shippinginfo');
            $cart_data = $this->session->userdata('cart');
            $couponcoded = $this->session->userdata('couponcode');
            // print_r($cart_data);
            $subtotal_price = array();
            foreach($cart_data as $cart_data_array){
            	$subtotal_price[] = $cart_data_array['subtotal_price'];
                $shop_id = $cart_data_array['shop_id'];
            }
            $total_price = array_sum($subtotal_price);
            $insert_orderData = array();
            if(isset($couponcoded) && !empty($couponcoded)){
                $offter_amount = $couponcoded['offer_amount'];
                
                $offteramount_type = $couponcoded['offer_amount_type'];
                if($offteramount_type == 1){
                    $offter_amount = $total_price * $couponcoded['offer_amount']/100;
                }
                $total_price = $total_price - $offter_amount;
                $insert_orderData['coupon_code'] = $couponcoded['coupon_code'];
                $insert_orderData['	coupon_discount'] = $offter_amount;
            }
            $userdata = $this->Common_model->getSingleRecordById('users',array('id'=>$userid));
            if(isset($cart_data) && !empty($cart_data)){
	            if($payment_type == "cash"){
	            	$insert_orderData['user_id'] = $userid;
	                $insert_orderData['seller_id'] = $shop_id;
	                $insert_orderData['shipping_address'] = json_encode($shippinginfo,true);
	                $insert_orderData['payment_type'] = $payment_type;
	                $insert_orderData['delivery_status'] = 1;
	                $insert_orderData['grand_total'] = $total_price;
	                $insert_orderData['create_date'] = date('Y-m-d H:i:s');
	                // $insert_orderData['prduct_details'] = json_encode($cart_data,true);
                    // foreach (Session::get('cart') as $key => $cartItem){
                    // $product_variation = null;
                    // if(isset($cartItem['color'])){
                    //     $product_variation .= Color::where('code', $cartItem['color'])->first()->name;
                    // }
                    // foreach (json_decode($product->choice_options) as $choice){
                    //     $str = $choice->name; // example $str =  choice_0
                    //     if ($product_variation != null) {
                    //         $product_variation .= '-'.str_replace(' ', '', $cartItem[$str]);
                    //     }
                    //     else {
                    //         $product_variation .= str_replace(' ', '', $cartItem[$str]);
                    //     }
                    // }
	                $rid = $this->Common_model->addRecords('orders',$insert_orderData);
	                if($rid){
	                	// $u_data = array();
	                	// $u_data['invoice_no'] = "INC".date('Y')."I".$rid;
	                	$u_data = array();
	                	$u_data['invoice_no'] = "INC".date('Y')."I".$rid;
	                	if(isset($cart_data) && !empty($cart_data)){
	                		foreach($cart_data as $orderproductdataarray){
		                		$orderproductdata = array();
		                		$orderproductdata['order_id'] = $rid;
		                		$orderproductdata['product_name'] = $orderproductdataarray['name'];
		                		$orderproductdata['shop_id'] = $orderproductdataarray['shop_id'];
		                		$orderproductdata['color'] = (isset($orderproductdataarray['color']) ? $orderproductdataarray['color'] : '');
		                		$orderproductdata['product_id'] = $orderproductdataarray['id'];
		                		$orderproductdata['main_image'] = $orderproductdataarray['main_image'];
		                		$orderproductdata['variations'] = $orderproductdataarray['variations'];
		                		$orderproductdata['quantity'] = $orderproductdataarray['quantity'];
		                		$orderproductdata['main_image'] = $orderproductdataarray['main_image'];
		                		$orderproductdata['mrp_price'] = $orderproductdataarray['mrp_price'];
		                		$orderproductdata['price'] = $orderproductdataarray['price'];
		                		$orderproductdata['discount'] = $orderproductdataarray['discount'];
		                		$orderproductdata['discount_type'] = $orderproductdataarray['discount_type'];
		                		$orderproductdata['discount_amount'] = $orderproductdataarray['discount_amount'];
		                		$orderproductdata['subtotal_price'] = $orderproductdataarray['subtotal_price'];
		                		$orderproductdata['admincommission'] = 0;
		                		$orderproductdata['shopamount'] = 0;
		                		$this->Common_model->addRecords('order_products',$orderproductdata);
		                	}
		                }
	                	$whrd = array();
	                	$whrd[] = " status = 1";
	                	$whrd[] = " shop_id = ".$shop_id;
	                	$where = " WHERE ".implode(" AND ", $whrd);
	                	$shopdata = $this->Common_model->getwherecustomecol("shops","mobile_no,email",$where,"");
	                	// print_r($driversdata);
	                	if(!empty($shopdata)){
	                		$dmr = array();
	                		$shopmessage = "New order ".$u_data['invoice_no']." is generated please chk";
	                		// foreach ($driversdata as $driversdataarray){
	                		// 	$dmr[] = $driversdataarray['mobile_no'];
	                		// 	// send_smtp_mail($driversdataarray['email'],company_email, "order message","",$deliveryboymessage);
	                		// }
	                		// $dmri = implode(",", $dmr);
	                		sendsms(base64_decode($shopdata[0]['mobile_no']),'91',$shopmessage);
	                		$msg = wordwrap($shopmessage,70); 
                            $addressarray = $this->session->userdata('shippinginfo'); 
                            $email=$shopdata[0]['email'];
                            mail($email,"My subject",$msg); 
	                		$dmrms = "'" . str_replace(",", "','", $dmri) . "'";
	                	}

	                	$usermessage = "Thankyou for generate new order your invoice id is".$u_data['invoice_no']." You can track your order click on below link ".base_url()."order_detail?invoice=".base64_encode($rid);
                       
	        			sendsms($userdata['mobile_no'],'91',$usermessage);
                        $msg = wordwrap($usermessage,70); 
                        // echo "$msg";die();
                            $addressarray = $this->session->userdata('shippinginfo'); 
                            $email=$addressarray['email'];
                            mail($email,"My subject",$msg); 
	                	$update = $this->Common_model->updateRecords('orders', $u_data,array('id'=> $rid));
	                	$this->session->unset_userdata('shippinginfo');
	                	$this->session->unset_userdata('cart');
	                	$this->session->unset_userdata('couponcode');
	                	$data['success'] = "Your Order has been placed successfully.  ID : ".$u_data['invoice_no'];
	               // 	redirect(base_url());
	                }else{
	                	$data['error'] = "Oops something went wrong please try again.";
	                }
	            }
	        }else{
	        	redirect(base_url().'shops');
	        }
        }
        $this->load->view('front/header');
        $this->load->view('front/paymentcheckout',$data);
        $this->load->view('front/footer');
    }

 

    public function changebasicinfo()
    {
        // print_r($_POST);
        // print_r($_FILES);
        if(isset($_POST['first_name']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['mobile_no']) )
        {
            $check_data = $this->Common_model->getWhereData("users",array('id' => customersessionid()));
            // print_r($check_data);
            // die;
            $current_mobile_no = $_POST["mobile_no"];
            $current_email = $_POST["email"];
            $check_email = $this->Common_model->getWhereData("users",array('id !=' => customersessionid(),'email'=>$current_email));
            $check_mobile_no = $this->Common_model->getWhereData("users",array('id !=' => customersessionid(),'mobile_no'=>$current_mobile_no));
            if(empty($check_email) && empty($check_mobile_no)){

                $insert_data = array();
                $insert_data['first_name'] = $_POST["first_name"];
                $insert_data['last_name'] = $_POST["last_name"];
                $insert_data['mobile_no'] = $_POST["mobile_no"];
                $insert_data['email'] = $_POST["email"];
                if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
                    $uploadpath = "./uploads/customerprofilepic/";
                    $filearrayddata = $this->uploadfilebypath('image',$uploadpath);
                    if(isset($filearrayddata)){
                        $insert_data['image'] = $filearrayddata;
                    }
                }
                
                    
                $result = $this->Common_model->updateData('users',$insert_data,array('id' => customersessionid()));
                // redirect(base_url().'profile');
                echo "Profile has been updated successfully";
            }elseif(!empty($check_email) && !empty($check_mobile_no)){
                echo "Email and Mobile number already exits please try again";
            }
            elseif(!empty($check_email)){
                echo "Email already exits please try again";
            }
            elseif(!empty($check_mobile_no)){
                echo "Mobile No. already exits please try again";
            }
                        
        }else{
            echo "All fields are required";
        }      
    }

    public function changepwdinfo()
    {
     	// print_r($_POST); 
	    if(isset($_POST['new_password']) && !empty($_POST['new_password']) && !empty($_POST['re_enter_password']) && !empty($_POST['current_password'])){
	          // $data = array();
	        $check_admin_password = $this->Common_model->getSingleRecord("users",array('id' => customersessionid()));
	        $admin_current_password = $check_admin_password['password'];
	            // print_r($data); 
	        $current_password = md5(trim($_POST['current_password']));
	        $new_password = md5(trim($_POST['new_password']));
	        $re_enter_password = md5(trim($_POST['re_enter_password']));    
	        $today_date = date('Y-m-d h:i:s A',time());
	        if($admin_current_password!=$current_password)
	          {
	            echo "Invalid Current Password...!";
	          }
	        else{
	            if($new_password!=$re_enter_password)
	            {
	               echo "New password not matched...!";
	            }
	            else
	            {
	                $result = $this->Common_model->updateRecords('users',array('password'=>$re_enter_password,'show_password'=>$_POST['re_enter_password']),array('id'=> customersessionid()));
	                echo  "Password updated successfully!";

	            }
	          }
	     }else{
	        echo "All fields are required";
	     }
	    // $result = $this->Common_model->getSingleRecord("users",array('id'=> customersessionid())); 
	    // print_r($data);    
    } 

    public function changeshippinginfo()
    {
        // print_r($_POST);
        // print_r($_FILES);
        $data =  array();
        if(isset($_POST['address']) && !empty($_POST['address']) && !empty($_POST['zipcode']))
        {
            $insert_data = array();
            $insert_data['address'] = $_POST["address"];
            $insert_data['zipcode'] = $_POST["zipcode"];
            $insert_data['latitude'] = $_POST["latitude"];
            $insert_data['longitude'] = $_POST["longitude"];
            $result = $this->Common_model->updateData('users',$insert_data,array('id' => customersessionid()));
            if(['success']){
                echo "Successfully Updated";
            }
        }else{
        echo "All fields are required";
        }
    }  
     
    public function uploadfilebypath($key,$path)
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

    public function order_detail(){
        $data = array();
        $user_id = customersessionid();
        
        if(isset($_GET['invoice']) && !empty($_GET['invoice'])){
            $id = base64_decode($_GET['invoice']);
            $whr = array();
            $whr[] = "user_id =".$user_id;
            $whr[] = "id =".$id;
            $where = " WHERE ".implode(" AND ", $whr);
            $data['orderdata'] = $this->Common_model->getwheresingleorder($where);
            $this->load->view('front/header');
            $this->load->view('front/order_detail', $data);
            $this->load->view('front/footer');
        }
	}

	public function invoiceprint(){
	    $data = array();
	    $user_id = customersessionid();
	    
	    if(isset($_GET['invoice']) && !empty($_GET['invoice'])){
	        $id = base64_decode($_GET['invoice']);
	        $whr = array();
	        $whr[] = "user_id =".$user_id;
	        $whr[] = "id =".$id;
	        $where = " WHERE ".implode(" AND ", $whr);
	        $data['orderdata'] = $this->Common_model->getwheresingleorder($where);
	        
	        $this->load->view('front/invoiceprint', $data);
	    }
	}

    public function support_ticket(){
        $user_id = customersessionid();
        if(isset($_POST['query']) && !empty($_POST['query']) )
        {
            $insert_data = array();
            $insert_data['query'] = $_POST["query"];
            $insert_data['user_type'] = 'customer';
            $insert_data['create_date'] = date('Y-m-d H:i:s');
            $insert_data['user_id'] = $user_id;
            // print_r($insert_data);
            // die;
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
        $data['support'] = $this->Common_model->getWhereData('support_ticket',array('user_type'=>'customer'));
        // print_r($data['support']);
        // die;
        $this->load->view('front/header');
        $this->load->view('front/support_ticket',$data);
        $this->load->view('front/footer');   
    }

    public function support_chat(){
        $data = array();
        $user_id = customersessionid();
        $id = base64_decode($_GET['ticket_id']);

        $data['supportchat'] = $this->Common_model->getWhereData('support_message',array('ticket_id'=>$id));
        $data['support'] = $this->Common_model->getSingleRecord('support_ticket',array('ticket_id'=>$id));
        // $js = $this->Common_model->getSingleRecordById($table,array($column_name => $jay));
        // $check_admin_password = $this->Common_model->getSingleRecord("users",array('id' => customersessionid()));
        // print_r($support);
        // die;    
        $this->load->view('front/header');
        $this->load->view('front/support_chat',$data);
        $this->load->view('front/footer');
        // }
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
            $insert_data["user_type"] = 'customer';
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
    	$this->load->view('front/partials/support_chat_message',$data);
    	// exit();
    }

    // public function chat(){
    //     $user_id = customersessionid();
    //     $data = array();
    //     $insert_data["message"] = $_POST["message"];
    //     $insert_data['create_date'] = date('Y-m-d H:i:s');
        
    //     $result = $this->Common_model->addRecords('support_message',$insert_data);
    //     if(isset($result)){
    //         $newid = $result;
    //         if(isset($newid)){
    //             $updata = array();
    //             $updata['ticket_id'] = $newid;
    //         }   
    //     }
    //     $result = $this->Common_model->updateData('support_message',$updata,array('ticket_id' => $result));
    //     echo "Successfully Updated";
    // }

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

    public function ChangeMultipleOrderStatus(){
    	// print_r($_POST);
    	$order_id = $_POST['o_id'];
    	$pid = $_POST['pid'];
    	$dstatus = $_POST['dstatus'];
    	$whereop = " WHERE order_id=".$order_id;
    	$action = $_POST['action'];
    	$totalorderproduct = $this->Common_model->getwhrcountbycol('order_products','id',$whereop);
    	$totalpid = count($pid);

    	$whr = array();
        $whr[] = "id =".$order_id;
        $where = " WHERE ".implode(" AND ", $whr);
        $orderdata = $this->Common_model->getwheresingleorder($where);
        if(isset($orderdata) && !empty($orderdata)){
        	// $orderstatus = array(0,5);
        	// print_r($orderdata);
        	if($dstatus == 5 && $orderdata['delivery_status'] > 1){
        		$msg = array('status'=>0, 'msg'=>'You can not cancel thease order now');
				echo json_encode($msg);
				exit();
        	}
	    	if($totalorderproduct == $totalpid && $totalpid > 0 && !empty($order_id)){
	    	    $this->Common_model->updateRecords('orders',array('delivery_status'=>$dstatus),array('id'=>$order_id));
	    	}
	    	if($totalpid > 0){
	    		foreach($pid as $value){
	    			$this->Common_model->updateRecords('order_products',array('product_delivery_status'=>$dstatus),array('id'=>$value));
	    		}
	    	}
	    	$msg = array('status'=>1, 'msg'=>'Record has been '.$action.' successfully');
			echo json_encode($msg);
			exit();
	    }else{
	    	$msg = array('status'=>0, 'msg'=>'Invalid order detail please try again.');
			echo json_encode($msg);
			exit();
	    }
    	
    }

    public function cartcount(){
    	$spdata = $this->session->userdata('cart');
		$totalcoutproduct = (isset($spdata) && !empty($spdata) ? count($spdata) : 0);
		echo $totalcoutproduct;
		exit();
    }
	public function logout(){
    	$this->session->unset_userdata(USER_SESSION);
    	$this->session->unset_userdata('cart');
    	$this->session->unset_userdata('couponcode');
		redirect(base_url('home'),'refresh');
    }

    public function sell_on_indocliq()
    {
    	$data=array();
    	if(!empty($_POST)){
    		$data['name']=$_POST['name'];
    		$data['email']=$_POST['email'];
    		$data['number']=$_POST['number'];
    		$data['message']=$_POST['massage'];
    		$data['create_date']=date('Y-m-d H:i:s');
    		$result = $this->Common_model->addRecords('contactus',$data);
    		if(!empty($result)){
    			$data['success']="Message send successfully";
    		}else{
    			$data['error']="Message not send, please try again";
    		}
    	}
        $this->load->view('front/header1');
        $this->load->view('front/sell_on_indocliq',$data);
        $this->load->view('front/footer1');
    }
    public function vendorsingup(){
    	$data = array();
    	$data['success'] = "";
		$data['error'] = "";
		$data['shop_data'] = "";
    	if(isset($_POST['submit']))
		{
			//print_r($_POST);
			$user_data = $_POST;
			$password = $user_data['password'];
			unset($user_data['submit']);
			unset($user_data['password']);
			$user_data['password'] = md5($password);
			// $user_data['show_password'] = $password;
			$email = $user_data['email'];
			$user_data['shop_address'] = trim($_POST['shop_address']);
			$user_data['shop_latitude'] = trim($_POST['shop_latitude']);
			$user_data['shop_longitude'] = trim($_POST['shop_longitude']);
			$mobc=$_POST['country_code'].$_POST['mobile_no'];
			$mobile_no = base64_encode($mobc);
			$user_data['mobile_no'] = $mobile_no;
			//$user_data['gst_number'] = $user_data['gst_number'];
			$user_data['pan_no'] = base64_encode($user_data['pan_no']);
			$user_data['adhar_no'] = base64_encode($user_data['adhar_no']);
			if(isset($_POST['shop_registration_no']) && !empty($_POST['shop_registration_no'])){
				$user_data['shop_registration_no'] = $user_data['shop_registration_no'];
			}
			if(isset($_POST['shop_type_id']) && !empty($_POST['shop_type_id'])){
				$user_data['shop_type_id'] = $user_data['shop_type_id'];
			}
			// print_r($_POST['shopping_categories']);
			if(isset($_POST['shopping_categories']) && !empty($_POST['shopping_categories'])){
				$user_data['shopping_categories'] = implode(",", $_POST['shopping_categories']);
			}
			if(isset($_POST['shopping_specialized']) && !empty($_POST['shopping_specialized'])){
				$user_data['shopping_specialized'] = implode(",", $_POST['shopping_specialized']);
			}
			$check_mobile_no = $this->Common_model->GetWhere('shops',array('mobile_no'=> $mobile_no));
			if(empty($check_mobile_no))
			{	
				$filearray = array();
				if (isset($_FILES)) {
				    //echo '<pre>';print_r($_FILES);die();
				    if(isset($_FILES['owner_image']['name']) && !empty($_FILES['owner_image']['name'])){
		        		$uploadpath = "./uploads/shop_images/shop_owner_images/";
		        		$filearraydata = $this->uploadfilebypath('owner_image',$uploadpath);
		            	if(isset($filearraydata)){
							$user_data['owner_image'] = $filearraydata;
						}
		        	}
		    //     	if(isset($_FILES['shop_logo']['name']) && !empty($_FILES['shop_logo']['name'])){
		    //     		$uploadpath = "./uploads/shop_images/shop_logos/";
		    //     		$filearraydatalogo = $this->uploadfilebypath('shop_logo',$uploadpath);
		    //         	if(isset($filearraydatalogo)){
						// 	$user_data['shop_logo'] = $filearraydatalogo;
						// }
		    //     	}
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
		        	if(isset($_FILES['adhar_image']['name']) && !empty($_FILES['adhar_image']['name'])){
		        		$uploadpath = "./uploads/shop_images/adhar_image/";
		        		$filearrayadharimage = $this->uploadfilebypath('adhar_image',$uploadpath);
		            	if(isset($filearrayadharimage)){
							$user_data['adhar_image'] = $filearrayadharimage;
						}
		        	}
		        	if(isset($_FILES['pan_image']['name']) && !empty($_FILES['pan_image']['name'])){
		        		$uploadpath = "./uploads/shop_images/pan_image/";
		        		$filearraypanimage = $this->uploadfilebypath('pan_image',$uploadpath);
		            	if(isset($filearraypanimage)){
							$user_data['pan_image'] = $filearraypanimage;
						}
		        	}
		        	if(isset($_FILES['gumasta_image']['name']) && !empty($_FILES['gumasta_image']['name'])){
		        		$uploadpathgumasta = "./uploads/shop_images/gumasta_images/";
		        		$filearraydatagumasta = $this->uploadfilebypath('gumasta_image',$uploadpathgumasta);
		            	if(isset($filearraydatagumasta)){
							$user_data['gumasta_image'] = $filearraydatagumasta;
						}
		        	}

		        	if(isset($_FILES['cancel_check_image']['name']) && !empty($_FILES['cancel_check_image']['name'])){
		        		$uploadpathcancelcheck = "./uploads/shop_images/cancel_check_images/";
		        		$filearraydatacancelcheck = $this->uploadfilebypath('cancel_check_image',$uploadpathcancelcheck);
		            	if(isset($filearraydatacancelcheck)){
							$user_data['cancel_check_image'] = $filearraydatacancelcheck;
						}
		        	}
		        	if(isset($_FILES['gst_image']['name']) && !empty($_FILES['gst_image']['name'])){
		        		$uploadpath = "./uploads/shop_images/gst_image/";
		        		$filearraygstimage = $this->uploadfilebypath('gst_image',$uploadpath);
		            	if(isset($filearraygstimage)){
							$user_data['gst_image'] = $filearraygstimage;
						}
		        	}

		        }

				if(isset($filearray['shop_logo'])) {
					$user_data['shop_logo'] = $filearray['shop_logo'];
				}
				if(isset($_POST['meta_tags'])) {
					$user_data['meta_tags'] = $_POST['meta_tags'];
				}

				if(isset($_POST['shopcetegory_type_id'])) {
				$user_data['shopcetegory_type_id'] = $_POST['shopcetegory_type_id'];
			}
			if(isset($_POST['membership-duration'])) {
				$user_data['membership-duration'] = $_POST['membership-duration'];
			}
			// if(isset($_POST['desc'])) {
			// 	$user_data['desc'] = $_POST['desc'];
			// }
				if(isset($_POST['desc'])) {
					$user_data['desc'] = $_POST['desc'];
				}
				if(isset($_POST['business-registerd'])) {
					$user_data['business-registerd'] = $_POST['business-registerd'];
				}
				if(isset($_POST['chain'])) {
					$user_data['chain'] = $_POST['chain'];
				}
				if(isset($_POST['franchise'])) {
					$user_data['franchise'] = $_POST['franchise'];
				}
				if(isset($_POST['year_business'])) {
					$user_data['year_business'] = $_POST['year_business'];
				}//routing-number
				if(isset($_POST['routing-number'])) {
					$user_data['routing-number'] = $_POST['routing-number'];
				}
				$user_data['shop_reg_id'] = $this->createCode('shops','shop_reg_id',6);
				$user_data['create_date'] = date('Y-m-d H:i:s');
				//echo "<pre>";print_r($user_data);die;
				$result_id = $this->Common_model->addrecords('shops',$user_data);
				if($result_id){
					// $data['success'] = "Shop has been added sucessfully";
					$this->session->set_flashdata('addshop_success', 'Shop has been added sucessfully');
					redirect(base_url().'home/vendor_registration/');
				}else{
					$data['error'] = "Something went wrong please try again";
				}
			}elseif(!empty($check_mobile_no)){
				// $data['error_email'] = "Mobile Number alredy exits";
				$data['error'] = "Mobile Number already exists";	
			}else{
				$data['error'] = "Something went wrong please try again";
			}
			$shop_data = $_POST;
		}
		$data['shop_type_list'] = $this->Common_model->GetWhere("shop_types",array('1'=>1));
		$data['membership'] = $this->Common_model->GetWhere('members',array('1'=>1));
		$data['shopcategories_data'] = $this->Common_model->GetWhere('shopcategories',array('1'=>1));
    	$this->load->view('front/header1');
    	$this->load->view('front/vendorsignup',$data);
    	$this->load->view('front/footer1');
    }
    public function vendor_registration(){
    	$data=array();
    	$this->load->helper('shop_helper');
		$this->SessionModel->checkshoplogin1(array("login","vendor_registration"));
		if(!empty($_POST)){
		//$mobc=$_POST['country_code'].$_POST['mobile_no'];
		$country_code=$_POST['country_code'];
		$mobile_no = $_POST['mobile_no'];//base64_encode(trim($mobc));
		$password = md5(trim($_POST['password']));
		if(isset($mobile_no) && !empty($mobile_no) && isset($password) && !empty($password))
		{
		    		$userdata = $this->Common_model->getSingleRecordById('shops',array('mobile_no' => $mobile_no,'password'=>$password,'country_code'=>$country_code));
		    		if($userdata){
		    			if($userdata['status']==1){                            
		    	           
		    	           	$this->session->set_userdata(SHOP_SESSION, $userdata);
		    	           	$data['success']="successfully login";
		    	           	redirect(base_url().'shop');
		    	           	exit();
		    				/*echo json_encode(array('status'=>1,'msg'=>"successfully login"));
		    				exit();*/
		    			}
		    			if($userdata['status']== 0){
		    				$data['error']="Your account has been deactivated";
		    				/*redirect(base_url().'home/vendor_registration');
		    	           	exit();*/
		    				/*echo json_encode(array('status'=>0,'msg'=>"Your account has been deactivated"));
		    				exit();*/
		    			}
		    			if($userdata['status']== 3){
		    				/*echo json_encode(array('status'=>0,'msg'=>"Your account has been deleted by admin"));
		    				exit();*/
		    				$data['error']="Your account has been deleted by admin";
		    				/*redirect(base_url().'home/vendor_registration');
		    	           	exit();*/
		    			}
		    		}else{
		    			/*echo json_encode(array('status'=>0,'msg'=>" Invalid Membership id or password Please try again"));*/
		    			$data['error']="Invalid Membership id or password Please try again";
		    			/*redirect(base_url().'home/vendor_registration');
		    	        exit();*/
		    		}
		}else
		{
		    /*echo json_encode(array('status'=>0,'msg'=>"Membership id and password has been required"));
		    	exit();*/
		    	$data['error']="Membership id and password has been required";
		    	redirect(base_url().'home/vendor_registration');
		    	exit();
		}  
		}
    	$this->load->view('front/header1');
    	$this->load->view('front/loginlanding',$data);
    	$this->load->view('front/footer1');
	}
	
// 	public function forget_password(){
// 	    $dataarr=array();
// 	    if(!empty($_POST)){
//             $to = $_POST['email'];
//             $otp = $this->createCode('forgot_otp','otp',6);
// 			$check_user1 = $this->Common_model->getSingleRecordById('forgot_otp',array('email'=> $to));
// 			$post_data = array();
// 			$post_data['create_date'] = date('Y-m-d H:i:s');
// 			$post_data['email'] = $to;
// 			$post_data['otp'] = $otp;
// 			if($check_user1){
// 				$add_otp = $this->Common_model->updateRecords('forgot_otp', $post_data,array('email'=> $to));
// 			}else{
// 				$add_otp = $this->Common_model->addRecords('forgot_otp',$post_data);
// 			}
//             $postdata=array();
//             $postdata['otp']=$otp;
//             $postdata['email']=$to;
//             $this->session->set_tempdata(array('vendoredata'=>$postdata));
//                 $subject = "Otp Verify";
//                 //$message = "<p>Thank for foget password,</p>";
//                 //$message .= "<p>please verify otp is :-<strong>".$otp."</strong> after that you have to foget password.Thank you</p>";
//             //   $message="otp=".$otp;
//                  $header = "From:abc@somedomain.com \r\n";
//                  $header .= "Cc:afgh@somedomain.com \r\n";
//                  $header .= "MIME-Version: 1.0\r\n";
//                  $header .= "Content-type: text/html\r\n";
//             //     $retval = mail ($to,$subject,$message,$header);
//                 $check_user = $this->Common_model->getSingleRecordById('shops',array('email'=> $to));
//             $message="otp=".$otp;
//             mail ($to,$subject,$message,$header);
//     //      if( $retval == true) {
//     //          	$this->session->set_flashdata('sucess', 'Otp sent sucessfully, please check email');
// 				// //redirect(base_url().'home/Otpsent/');
//     //      }else {
//     //         $dataarr['error']="Otp not sent";
//     //      }
// 	    }
// 	    $this->load->view('front/header1');
//     	$this->load->view('front/loginlanding1',$dataarr);
//     	$this->load->view('front/footer1');
// 	}
	
	public function forget_password(){
		// print_r($_POST);
		$data=array();
		if(!empty($_POST)){
		    $email = $_POST['email'];
    		$checkmobileno = $this->Common_model->GetWhere('shops', array('email'=>$email));
    		if(!empty($checkmobileno)){
    			$post_data = array();
    			$post_data['email'] = $email;
    			$respotp = $this->forgot_otp_send_email($email);
    			$resotparray = json_decode($respotp,true);
    			if(isset($resotparray) && $resotparray['status'] == 1){
    			  //$subject="testing";
    			  //$message=$resotparray['otp'];
    			  $subject = "Otp Verify";
                $message = "<p>Thank for foget password,</p>";
                $message .= "<p>please verify otp is :-<strong>".$resotparray['otp']."</strong> after that you have to foget password.Thank you</p>";
    			 $header = "From:abc@somedomain.com \r\n";
                 $header .= "Cc:afgh@somedomain.com \r\n";
                 $header .= "MIME-Version: 1.0\r\n";
                 $header .= "Content-type: text/html\r\n";
                $response=mail ($email,$subject,$message,$header);
    				$set_data_id = $this->session->set_tempdata(array('forgot_otp_data'=>$post_data),"",240);
           	     	$registraiton_data = $this->session->tempdata('forgot_otp_data');
           	     	$data['forgot_otp_data'] = $registraiton_data;
           	     	$data['success'] = "Enter otp and verify email for set password.";
           	     	redirect(base_url().'home/Otpsent/');
    			}else{
           	    	$data['error'] = "Invalid Email.";
           	    }
    		}else{
    		    $data['error'] = "Invalid email, please try again.";
    		}
		}
		$this->load->view('front/header1');
    	$this->load->view('front/loginlanding1',$data);
    	$this->load->view('front/footer1');
	}
	public function forgot_otp_send_email($email){
		if($email){
			$otp = $this->createCode('forgot_otp','otp',6);
			$check_user = $this->Common_model->getSingleRecordById('forgot_otp',array('email'=> $email));
			$post_data = array();
			$post_data['email'] = $email;
			$post_data['create_date'] = date('Y-m-d H:i:s');
			$post_data['otp'] = $otp;
			if($check_user){
				$update = $this->Common_model->updateRecords('forgot_otp', $post_data,array('email'=> $email));
			}else{
				$add_otp = $this->Common_model->addRecords('forgot_otp',$post_data);
			}
			$check_number = $this->Common_model->getwhere('shops',array('email'=> $email));
			if(!empty($check_number)){
                if(!empty($email)){
                    $subject = "Otp Verify";
	             $message = "your Txn OTP ".$otp;
                //$message = "<p>Thank for foget password,</p>";
                //$message .= "<p>please verify otp is :-<strong>".$otp."</strong> after that you have to foget password.Thank you</p>";
                //$message="otp=".$otp;
                 
					if($otp){
						$msg = array('status'=>1, 'msg'=>'Your OTP has been sent successfully, please check your Number for getting OTP...@','otp'=>$otp); 
						  return json_encode($msg);
						  exit();
						//echo json_encode($msg);
					}else{
					     $msg = array('status'=>1, 'msg'=>'Error submitting!'); 
						  return json_encode($msg);
						  exit();
						// $data['message'] = "Error please try again!";
					}
				}else{
					$msg = array('status'=>1, 'msg'=>'Your Number not registered!'); 
					return json_encode($msg);
					exit();
				}
			}
		}
	}
	public function Otpsent(){
	    $data=array();
		if(isset($_POST) && !empty($_POST)){
			$forgot_otp_data = $this->session->tempdata('forgot_otp_data');
			if(isset($forgot_otp_data) && !empty($forgot_otp_data)){
				if(isset($_POST['otp']) && !empty($_POST['otp'])){
					$email = $forgot_otp_data['email'];
					$checkmobilenootp = $this->Common_model->GetWhere('forgot_otp', array('email'=>$email,'otp'=>$_POST['otp']));
					if(isset($checkmobilenootp) && !empty($checkmobilenootp)){
				// 		$msg = array('status'=>1, 'msg'=>'OTP has been verify successfully please login now.');
				// 		echo json_encode($msg);
				// 		exit();
				 $this->session->set_tempdata(array('vedoredetialsotp'=>$checkmobilenootp));
						$data['sucess']="OTP has been verify successfully please login now.";
						redirect(base_url().'home/passwordchange/');
					}else{
				// 		$msg = array('status'=>0, 'msg'=>'Invalid otp please enter valid otp.');
				// 		echo json_encode($msg);
				// 		exit();
				        $data['error']="Invalid otp please enter valid otp";
					}

				}else{
				// 	$msg = array('status'=>0, 'msg'=>'Please enter otp');
				// 	echo json_encode($msg);
				// 	exit();
				$data['error']="Please enter otp";
				}
			}else{
				// $msg = array('status'=>0, 'msg'=>'Your session has been expired please resubmit your registration detail.');
				// echo json_encode($msg);
				// exit();
				$data['error']="Your session has been expired please resubmit your registration detail";
			}
		}
		$this->load->view('front/header1');
    	$this->load->view('front/loginlanding3',$data);
    	$this->load->view('front/footer1');
	}
    public function passwordchange(){
        $dataarr=array();
        if(!empty($_POST)){
            $password=md5($_POST['password']);
            $newpassword=$_POST['newpassword'];
            $confirmpassword=$_POST['confirmpassword'];
            $forgot_otp_data = $this->session->tempdata('vedoredetialsotp'); 
            //echo "<pre>";print_r($forgot_otp_data[0]);die;
            $check_user = $this->Common_model->getSingleRecordById('shops',array('email'=>$forgot_otp_data[0]['email'],'password'=>$password));
                if($newpassword==$confirmpassword){
                    if(!empty($check_user)){
                    $data=array();
                    $data['password']=md5($newpassword);
                    $this->Common_model->updateRecords('shops', $data,array('email'=> $check_user['email']));
                    $this->session->set_flashdata('error', 'Password has been forget sucessfully');
                    redirect(base_url().'home');
                    $dataarr['sucess']="Password has been forget sucessfully";
                    }else{
                        $this->session->set_flashdata('error', 'Invalid old password');
                         $dataarr['error']="Invalid old password";
                    }
                }else{
                     $dataarr['error']="Didn't match new password and confirm password";
                }
                
            }
            $this->load->view('front/header1');
        	$this->load->view('front/loginlanding2',$dataarr);
        	$this->load->view('front/footer1');
    }
}