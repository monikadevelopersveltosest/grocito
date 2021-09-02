<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Deliveryboy extends CI_Controller {



	function __construct()

	{

		parent::__construct();

		//$this->load->helper(array('deliveryboy_helper'));

		$this->load->helper('deliveryboy_helper');

		$this->SessionModel->checkdeliveryboylogin(array("login","loginajax"));

	}



	public function index()

	{

		$data = array();

		// $data['ordersByMonth'] = array('years' => array_unique(array('2019')),'orders' => array('2019'=>array('1'=>9,'2'=>9,'3'=>9,'4'=>9,'5'=>9,'6'=>9,'7'=>9,'8'=>9,'9'=>9,'10'=>9,'11'=>9,'12'=>1)));

		$this->load->view('deliveryboy/header');

		$this->load->view('deliveryboy/dashboard',$data);

		$this->load->view('deliveryboy/footer');

	}



	public function login(){

		$edata = array();

		

		$this->load->view('deliveryboy/login_header');

		$this->load->view('deliveryboy/login');

		$this->load->view('deliveryboy/login_footer');

	}



	public function loginajax()

	{

		$mobile_no = trim($_POST['mobile_no']);

		$password = md5(trim($_POST['password']));

		if(isset($mobile_no) && !empty($mobile_no) && isset($password) && !empty($password))

		{

		    		$userdata = $this->Common_model->getSingleRecordById('deliveryboys',array('mobile_no' => $mobile_no,'password'=>$password));

		    		//print_r($userdata);

		    		if($userdata){

		    			if($userdata['status']==1){                            

		    	           

		    	           $this->session->set_userdata(DELIVERYBOY_SESSION, $userdata);

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



	public function orderhistory(){

		$deliveryboy_id = deliveryboysessionid();

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

		$whr[] = "deliveryboy_id = ".$deliveryboy_id;

		$orderby = " LIMIT " .$page.", ".total_per_page;

		$where = " WHERE ".implode(" AND ", $whr);

    	$data['orders'] = $this->Common_model->getwherecustome('orders',$where,$orderby);

		$data['pagination'] = $this->Common_model->getwhrcountbycol('orders','id',$where);

		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);

		$url = base_url()."deliveryboy/orderhistory".(isset($_GET['invoice_no']) ? "?invoice_no=".trim($_GET['invoice_no'])."" : '').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');

		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);

		

		$this->load->view('deliveryboy/header');

		$this->load->view('deliveryboy/orderhistory', $data);

		$this->load->view('deliveryboy/footer');

    }



    public function neworders(){

		$deliveryboy_id = deliveryboysessionid();

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

		$whr[] = "o.delivery_status = 2";

		$whr[] = "o.deliveryboy_id = 0";

		$orderby = " LIMIT " .$page.", ".total_per_page;

		$where = " WHERE ".implode(" AND ", $whr);

    	$data['orders'] = $this->Common_model->getwhereorders($where,$orderby);

		$data['pagination'] = $this->Common_model->getwhrcountordersbycol($where);

		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);

		$url = base_url()."deliveryboy/neworders".(isset($_GET['invoice_no']) ? "?invoice_no=".trim($_GET['invoice_no'])."" : '').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');

		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);

		

		$this->load->view('deliveryboy/header');

		$this->load->view('deliveryboy/neworders', $data);

		$this->load->view('deliveryboy/footer');

    }



    public function acceptedorders(){

		$deliveryboy_id = deliveryboysessionid();

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

		$whr[] = "o.delivery_status = 3";

		$whr[] = "o.deliveryboy_id = ".$deliveryboy_id;

		$orderby = " LIMIT " .$page.", ".total_per_page;

		$where = " WHERE ".implode(" AND ", $whr);

    	$data['orders'] = $this->Common_model->getwhereorders($where,$orderby);

    	// print_r($data['orders']);

    	// die;

		$data['pagination'] = $this->Common_model->getwhrcountordersbycol($where);

		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);

		$url = base_url()."deliveryboy/acceptedorders".(isset($_GET['invoice_no']) ? "?invoice_no=".trim($_GET['invoice_no'])."" : '').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');

		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);

		

		$this->load->view('deliveryboy/header');

		$this->load->view('deliveryboy/acceptedorders', $data);

		$this->load->view('deliveryboy/footer');

    }



    public function received_orders(){

		$deliveryboy_id = deliveryboysessionid();

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

		$whr[] = "delivery_status = 3";

		$whr[] = "deliveryboy_id = ".$deliveryboy_id;

		$orderby = " LIMIT " .$page.", ".total_per_page;

		$where = " WHERE ".implode(" AND ", $whr);

    	$data['orders'] = $this->Common_model->getwherecustome('orders',$where,$orderby);

		$data['pagination'] = $this->Common_model->getwhrcountbycol('orders','id',$where);

		//$data['totalorderamount'] = $this->Common_model->getWhrOrderssum('o.total',$where);

		$url = base_url()."deliveryboy/received_orders".(isset($_GET['invoice_no']) ? "?invoice_no=".trim($_GET['invoice_no'])."" : '').(isset($_GET['status']) ? "&status=".trim($_GET['status'])."":'');

		$data["links"] = $this->pagination($url,$data['pagination'],$this->input->get('per_page'),total_per_page);

		

		$this->load->view('deliveryboy/header');

		$this->load->view('deliveryboy/orderhistory', $data);

		$this->load->view('deliveryboy/footer');

    }



    public function invoice(){

    	$data = array();

    	$deliveryboy_id = deliveryboysessionid();

    	

    	if(isset($_GET['invoice']) && !empty($_GET['invoice'])){

	    	$id = base64_decode($_GET['invoice']);

	    	$whr = array();

	    	// $whr[] = "deliveryboy =".$shop_id;

	    	$whr[] = "id =".$id;

	    	$where = " WHERE ".implode(" AND ", $whr);

	    	$data['orderdata'] = $this->Common_model->getwheresingleorder($where);

	    	$this->load->view('deliveryboy/header');

			$this->load->view('deliveryboy/invoice', $data);

			$this->load->view('deliveryboy/footer');

		}

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



	// public function accept_order(){



	// }



	public function accept_order(){

        $tablename = $_POST['tablename'];

        $status = $_POST['status'];

        $id = $_POST['id'];

        $action = $_POST['action'];

        $whrcol = $_POST['whrcol'];

        $whrstatuscol = $_POST['whrstatuscol'];

        $deliveryboy_id = deliveryboysessionid();

        $whr = array();

    	// $whr[] = "deliveryboy =".$shop_id;

    	$whr[] = "id =".$id;

    	$whr[] = "status = 1";

    	$where = " WHERE ".implode(" AND ", $whr);

    	$check_order_status = $this->Common_model->getwheresingleorder($where);



    	if(isset($check_order_status) && !empty($check_order_status)){



    		$update_data = array();

    		$update_data['deliveryboy_id'] = $deliveryboy_id;

    		$update_data[$whrstatuscol] = $status;

    		$update_data['deliveryboy_accept_date'] = date('Y-m-d H:i:s');

	        $res = $this->Common_model->updateRecords($tablename,$update_data,array($whrcol => $id,'status'=>1));

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



    public function received_order(){

        $tablename = $_POST['tablename'];

        $status = $_POST['status'];

        $id = $_POST['id'];

        $action = $_POST['action'];

        $whrcol = $_POST['whrcol'];

        $whrstatuscol = $_POST['whrstatuscol'];

        $deliveryboy_id = deliveryboysessionid();

        $whr = array();

    	// $whr[] = "deliveryboy =".$shop_id;

    	$whr[] = "id =".$id;

    	$whr[] = "status = 1";

    	$whr[] = "delivery_status != 3";

    	$where = " WHERE ".implode(" AND ", $whr);

    	$check_order_status = $this->Common_model->getwheresingleorder($where);



    	if(isset($check_order_status) && !empty($check_order_status)){

    		$userdata = $this->Common_model->getSingleRecordById('users',array('id'=>$check_order_status['user_id']));

    		$update_data = array();

    		$update_data['deliveryboy_id'] = $deliveryboy_id;

    		$update_data[$whrstatuscol] = $status;

    		$update_data['deliveryboy_accept_date'] = date('Y-m-d H:i:s');

	        $res = $this->Common_model->updateRecords($tablename,$update_data,array($whrcol => $id,'status'=>1));

	        // $resp = array('code'=>SUCCESS,'message'=>'Record has been '.$action.'successfully');

	        // echo json_encode($resp);
	        $usermessage = "Your order ".$check_order_status['invoice_no']." has been accepted by deliveryboy.";

	        sendsms($userdata['mobile_no'],'91',$usermessage);

	        $msg = array('status'=>1, 'msg'=>'Order  has been '.$action.' successfully');

			echo json_encode($msg);

			exit();

		}else{

			$msg = array('status'=>0, 'msg'=>'This order has been already received');

			echo json_encode($msg);

			exit();

		}

    }



    public function confirm_order(){

        $tablename = $_POST['tablename'];

        $status = $_POST['status'];

        $id = $_POST['id'];

        $action = $_POST['action'];

        $whrcol = $_POST['whrcol'];

        $whrstatuscol = $_POST['whrstatuscol'];

        $deliveryboy_id = deliveryboysessionid();

        $whr = array();

    	// $whr[] = "deliveryboy =".$shop_id;

    	$whr[] = "id =".$id;

    	$whr[] = "status = 1";

    	$whr[] = "delivery_status != 4";

    	$where = " WHERE ".implode(" AND ", $whr);

    	$check_order_status = $this->Common_model->getwheresingleorder($where);



    	if(isset($check_order_status) && !empty($check_order_status)){
    		$userdata = $this->Common_model->getSingleRecordById('users',array('id'=>$check_order_status['user_id']));
			$update_data = array();

    		$update_data['deliveryboy_id'] = $deliveryboy_id;

    		$update_data[$whrstatuscol] = $status;

    		$update_data['confirm_delivery_date'] = date('Y-m-d H:i:s');

	        $res = $this->Common_model->updateRecords($tablename,$update_data,array($whrcol => $id,'status'=>1));

	        $spdata = $this->Common_model->getWhereData("order_products",array('order_id'=>$id,'product_delivery_status'=>1));

	        foreach($spdata as $spdataarray){
	        	$this->Common_model->updateRecords("order_products",array('product_delivery_status'=>4),array('id' => $spdataarray['id']));
	        }

	        // $resp = array('code'=>SUCCESS,'message'=>'Record has been '.$action.'successfully');

	        // echo json_encode($resp);
	        $usermessage = "Your order ".$check_order_status['invoice_no']." has been completed by deliveryboy.";

	        sendsms($userdata['mobile_no'],'91',$usermessage);


	        $msg = array('status'=>1, 'msg'=>'Order  has been '.$action.' successfully');

			echo json_encode($msg);

			exit();

		}else{

			$msg = array('status'=>0, 'msg'=>'This order has been already received');

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

            $insert_data['user_type'] = 'deliveryboy';

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

        $data['support'] = $this->Common_model->getWhereData('support_ticket',array('user_type'=>'deliveryboy'));

        // print_r($data['support']);

        // die;

        $this->load->view('deliveryboy/header');

        $this->load->view('deliveryboy/support_ticket',$data);

        $this->load->view('deliveryboy/footer');   

    }



    public function support(){

    	$data = array();

    	$user_id = customersessionid();

        $id = base64_decode($_GET['ticket_id']);

        $data['supportchat'] = $this->Common_model->getWhereData('support_message',array('ticket_id'=>$id));

        $data['support'] = $this->Common_model->getSingleRecord('support_ticket',array('ticket_id'=>$id));

    	$this->load->view('deliveryboy/header');

		$this->load->view('deliveryboy/support', $data);

		$this->load->view('deliveryboy/footer');	

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

            $insert_data["user_type"] = 'deliveryboy';

            $insert_data["message"] = $_POST["message"];

            $insert_data['create_date'] = date('Y-m-d H:i:s');



            $result = $this->Common_model->addRecords('support_message',$insert_data);

            // print_r($result);

            // die;

            exit();

        }

    }



    public function support_chat_message(){

    	$id = base64_decode($_POST['ticket_id']);

    	$data = array();

    	$data['support'] = $this->Common_model->getWhereData('support_message',array('ticket_id'=>$id));

        // print_r($data['support']);

    	$this->load->view('deliveryboy/support_chat_message',$data);

    	// exit();

    }



	public function logout()

	{

		// $this->session->sess_destroy();

		$this->session->unset_userdata(DELIVERYBOY_SESSION);

		redirect(base_url('deliveryboy'),'refresh');

	}

}