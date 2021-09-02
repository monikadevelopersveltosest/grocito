<?php defined('BASEPATH') OR exit('No direct script access allowed');
function getWebOption($option_name)
{
	$ci =&get_instance();
	$data = $ci->UserModel->getSingleData("common_setting",array("option_name" => $option_name));
	return $data;
}

if (!function_exists('single_price')){
    function single_price($price)
    {
        return format_price(convert_price($price));
    }
}

function get_shop_reg_id_by_shop_id($shop_id){
    $ci =&get_instance();
    $optdata = $ci->UserModel->getWhereDataByCol("shops",array("shop_id" => $shop_id),"shop_reg_id");
    $opt = (!empty($optdata))? $optdata : "";
    return $opt;
}

function deliveystatusnamebyid($ds_id){
    $ci =&get_instance();
    $optdata = $ci->UserModel->getWhereDataByCol("delivery_status",array("ds_id" => $ds_id),"delivery_status_name");
    $opt = (!empty($optdata))? $optdata : "";
    return $opt;
}

// function send_smtp_mail($to, $from, $subject,$pathToUploadedFile,$message)
// {
//     $mail = new PHPMailer\PHPMailer\PHPMailer();
    
//     $mail->SMTPDebug = true;
//     $mail->isSMTP();                                   // Set mailer to use SMTP
//     $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true;                            // Enable SMTP authentication
//     $mail->Username = 'meralocalmart@gmail.com';          // SMTP username
//     $mail->Password = 'mlm@2020'; // SMTP password
//     $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
//     $mail->Port = 465;                                 // TCP port to connect to

//     $mail->setFrom($from, 'MLMART');
//     $mail->addReplyTo("meralocalmart@gmail.com", 'MLMART');
//     $mail->addAddress($to);
//     $mail->isHTML(true);  // Set email format to HTML
//     $mail->Subject = $subject;
//     $mail->Body    = $message;

//     if(!$mail->send()) {
//      echo 'Message could not be sent.';
//      echo 'Mailer Error: ' . $mail->ErrorInfo;
//      return false;
//     } else {
//      return true;
//     }
// }
// function send_smtp_mail($to, $from, $subject,$pathToUploadedFile,$message)
// {
//     $mail = new PHPMailer\PHPMailer\PHPMailer();
//     //$mail->SMTPDebug = true;
//     $mail->isSMTP();                                   // Set mailer to use SMTP
//     $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true;                            // Enable SMTP authentication
//     $mail->Username = 'meralocalmart@gmail.com';          // SMTP username
//     $mail->Password = 'mlm@2020'; // SMTP password
//     $mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
//     $mail->Port = 465;                                 // TCP port to connect to

//     $mail->setFrom($from, 'Auction');
//     $mail->addReplyTo("meralocalmart@gmail.com", 'Auction');
//     $mail->addAddress($to);
//     $mail->isHTML(true);  // Set email format to HTML
//     $mail->Subject = $subject;
//     $mail->Body    = $message;

//     if(!$mail->send()) {
//         echo 'Message could not be sent.';
//         echo 'Mailer Error: ' . $mail->ErrorInfo;
//         return false;
//     } else {
//         return true;
//     }
// }

// function send_smtp_mail($to, $from, $subject,$pathToUploadedFile,$message)
// {
//     //$mail = new PHPMailer;
//     $mail = new PHPMailer\PHPMailer\PHPMailer();
//     $mail->SMTPDebug = true;
//     $mail->isSMTP();                                   // Set mailer to use SMTP
//     //$mail->Host = 'sg2plcpnl0089.prod.sin2.secureserver.net';                    // Specify main and backup SMTP servers
//     $mail->Host = 'sg3plcpnl0100.prod.sin3.secureserver.net';
//                         // Specify main and backup SMTP servers
//     $mail->SMTPAuth = true;                            // Enable SMTP authentication
//     $mail->Username = 'info@driitian.com';          // SMTP username
//     $mail->Password = 'driitian123#'; // SMTP password
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;                                 // TCP port to connect to

//     $mail->setFrom('info@driitian.com', 'MLMART');
//     $mail->addReplyTo($to, 'MLMART');
//     $mail->addAddress($to);
//     $mail->isHTML(true);  // Set email format to HTML
//     $mail->Subject = $subject;
//     $mail->Body    = $message;

//     if(!$mail->send()) {
//        // echo 'Message could not be sent.';
//        echo 'Mailer Error: ' . $mail->ErrorInfo;
//         return false;
//         //die;
//     } else {
//         return true;
//     }
// }

function send_smtp_mail($to, $from, $subject,$pathToUploadedFile,$message)
{
    //$mail = new PHPMailer;
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail->SMTPDebug = true;
    $mail->isSMTP();                                   // Set mailer to use SMTP
    //$mail->Host = 'sg2plcpnl0089.prod.sin2.secureserver.net';                    // Specify main and backup SMTP servers
    $mail->Host = 'smtp.hostinger.in';
                        // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'info@meralocalmart.com';          // SMTP username
    $mail->Password = 'Info789#'; // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom('info@meralocalmart.com', 'MLMART');
    $mail->addReplyTo($to, 'MLMART');
    $mail->addAddress($to);
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    if(!$mail->send()) {
       // echo 'Message could not be sent.';
       // echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
        //die;
    } else {
        return true;
    }
}

function returnorder_send_smtp_mail($to, $from, $subject,$pathToUploadedFile,$message)
{
    //$mail = new PHPMailer;
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    // $mail->SMTPDebug = true;
    $mail->isSMTP();                                   // Set mailer to use SMTP
    //$mail->Host = 'sg2plcpnl0089.prod.sin2.secureserver.net';                    // Specify main and backup SMTP servers
    $mail->Host = 'smtp.hostinger.in';
                        // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'return@meralocalmart.com';          // SMTP username
    $mail->Password = 'Return789#'; // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom('return@meralocalmart.com', 'MLMART');
    $mail->addReplyTo($to, 'MLMART');
    $mail->addAddress($to);
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    if(!$mail->send()) {
       // echo 'Message could not be sent.';
       // echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
        //die;
    } else {
        return true;
    }
}


function getWebOptionValue($option_name)
{
	$ci =&get_instance();
	$optdata = $ci->UserModel->getWhereDataByCol("common_setting",array("option_name" => $option_name),"option_value");
  	$opt = (!empty($optdata))? $optdata : "";
	return $opt;
}

function getWebPagesValue($option_name,$col)
{
	$ci =&get_instance();
	$optdata = $ci->Common_model->getWhereDataByCol("pages",array("option_name" => $option_name),$col);
  	$opt = (!empty($optdata))? $optdata : "";
	return $opt;
}

function getcolornamebyid($code)
{
	$ci =&get_instance();
	$optdata = $ci->Common_model->getWhereDataByCol("colors",array("code" => $code),'name');
  	$opt = (!empty($optdata))? $optdata : "";
	return $opt;
}

function shoptypebytid($shop_type_id){
	$ci =&get_instance();
	$optdata = $ci->UserModel->getWhereDataByCol("shop_types",array("shop_type_id" => $shop_type_id),"shop_type_name");
  	$opt = (!empty($optdata))? $optdata : "";
	return $opt;
}

function getcategoryidbyname($catname){
    $ci =&get_instance();
    $optdata = $ci->Common_model->getSingleRecordById("categories",array("category_name" => $catname));
    $opt = (!empty($optdata))? $optdata['categories_id'] : "";
    return $opt;
}

function createRandomCode(){ 
	$chars = "023456789ABCDEFGHIJKLMNOPQRST";
	srand((double)microtime()*1000000);
	$i = 0; 
	$pass = '' ; 
	while ($i <= 8) { 
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp; 
		$i++; 
	} 
	return $pass; 
}

function checkTabActive($fun)
{ 
  $ci = &get_instance();
  $f_name = $ci->router->fetch_method();
  //p($fun);
  if(in_array($f_name, $fun))   
    {
      return true;
    }else
    {
      return false;
    }
}

function generateRandomStringbylnth($length) {
    $characters = '01234567890123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendsms($to,$countrycode,$sms){
	// $curl = curl_init();

 //    curl_setopt_array($curl, array(
 //        CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
 //        CURLOPT_RETURNTRANSFER => true,
 //        CURLOPT_ENCODING => "",
 //        CURLOPT_MAXREDIRS => 10,
 //        CURLOPT_TIMEOUT => 30,
 //        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 //        CURLOPT_CUSTOMREQUEST => "POST",
 //        CURLOPT_POSTFIELDS => "{ \"sender\": \"MLMART\", \"route\": \"4\", \"country\": \"".$countrycode."\", \"sms\": [ { \"message\": \"".$sms."\", \"to\": [ \"".$to."\"] } ] }",
 //        CURLOPT_SSL_VERIFYHOST => 0,
 //        CURLOPT_SSL_VERIFYPEER => 0,
 //        CURLOPT_HTTPHEADER => array(
 //            "authkey: 323918AbqIo0skI4q5e71ee7aP1",
 //            "content-type: application/json"
 //        ),
 //    ));
    
 //    $response = curl_exec($curl);
 //    $err = curl_error($curl);
    
 //    curl_close($curl);
    
 //    if ($err) {
	//   echo "cURL Error #:" . $err;
	// 	return false;
	// } else {
	//   return true;
	// }

    $authKey = "323918AbqIo0skI4q5e71ee7aP1";

    //Multiple mobiles numbers separated by comma
    $mobileNumber = $to;

    //Sender ID,While using route4 sender id should be 6 characters long.
    $senderId = "MLMART";

    //Your message to send, Add URL encoding here.
    $message = urlencode($sms);

    $senderId = "MLMART";

    $route = 4;

    //Prepare you post parameters
    $postData = array(
        'mobiles' => $mobileNumber,
        'message' => $message,
        'sender' => $senderId,
        'route' => $route
    );

    $url="http://api.msg91.com/api/v2/sendsms";


    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "$url",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_HTTPHEADER => array(
            "authkey: 323918AbqIo0skI4q5e71ee7aP1",
            "content-type: multipart/form-data"
        ),
    ));

    $response = curl_exec($curl);

    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        // echo "cURL Error #:" . $err;
        return false;
    } else {
        return true;
    }
	
}

function sendotp($to,$countrycode,$otp){
	$curl = curl_init();

	curl_setopt_array($curl, array(CURLOPT_URL => "https://api.msg91.com/api/v5/otp?authkey=323918AbqIo0skI4q5e71ee7aP1&template_id=5ef32ab2d6fc0550a53f2e48&otp=".$otp."&extra_param=%7B%2522COMPANY_NAME%2522:%2522Meralocal%2520Mart%2522%7D&mobile=".$countrycode.$to."",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_SSL_VERIFYHOST => 0,
	  CURLOPT_SSL_VERIFYPEER => 0,
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/json"
	  ),
	));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
	  echo "cURL Error #:" . $err;
		return false;
	} else {
	  return true;
	}
}

if (! function_exists('combinations')) {
    function combinations($arrays) {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
    }
}

function customersessionid(){
	$ci =&get_instance();	
	$session_userdata = $ci->session->userdata(USER_SESSION);
	return (isset($session_userdata['id']) ? $session_userdata['id'] : '');
}

function customerdata($id){
	$ci = &get_instance();
	$customerdata = $ci->Common_model->getSingleRecordById('users',array('id' => $id));
	return $customerdata;
}

function dateformatedmy($date){
	return date("d-m-Y", strtotime($date));  
}

function p($data)
{
	echo "<pre>"; print_r($data); die();
}
