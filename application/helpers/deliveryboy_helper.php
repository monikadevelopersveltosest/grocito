<?php defined('BASEPATH') OR exit('No direct script access allowed');
function deliveryboyprofilebysession()
{
	$ci =&get_instance();
	$session_userdata = $ci->session->userdata(DELIVERYBOY_SESSION);
	if(isset($session_userdata) && !empty($session_userdata)){
		$deliveryboydata = $ci->UserModel->getSingleRecordById("deliveryboys",array("id" => $session_userdata['id']));
		return $deliveryboydata;
	}else{
		return "";	
	}
}
function deliveryboysessionid(){
	$ci =&get_instance();	
	$session_userdata = $ci->session->userdata(DELIVERYBOY_SESSION);
	return (isset($session_userdata['id']) ? $session_userdata['id'] : '');	
}