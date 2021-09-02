<?php defined('BASEPATH') OR exit('No direct script access allowed');
function shopprofilebysession()
{
	$ci =&get_instance();
	$session_userdata = $ci->session->userdata(SHOP_SESSION);
	if(isset($session_userdata) && !empty($session_userdata)){
		$shopdata = $ci->UserModel->getSingleRecordById("shops",array("shop_id" => $session_userdata['shop_id']));
		return $shopdata;
	}else{
		return "";	
	}
}
function shopsessionShopid(){
	$ci =&get_instance();	
	$session_userdata = $ci->session->userdata(SHOP_SESSION);
	return (isset($session_userdata['shop_id']) ? $session_userdata['shop_id'] : '');	
}