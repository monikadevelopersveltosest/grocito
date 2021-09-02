<?php
// echo "Arweas"; die;

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');



class Api extends REST_Controller  {

	var $url;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("common");
		$this->base_url = "https://localhost/Leastquote/";
	}

	public function index()
	{
		echo "Controller starts";
	}
	
	
	public function test_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];
		$get_data = '';
		$insert = '';
		$get_data = '';

		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
	function default_file()
	{

		header("Access-Control-Allow-Origin: * ");

		header("Access-Control-Allow-Headers: Origin,Content-Type ");

		header("Content-Type:application/json ");

		$rest_json = file_get_contents("php://input");

		$_POST=json_decode($rest_json,true);

	}
	
	public function signup_post()
	{
        //  $this->default_file();  // by Karan @18-01-2021
		$response = array();
		$get_data = '';
		$insert = '';

		if(($_POST['user_name'] != '') && ($_POST['full_name'] != '') && ($_POST['email'] != '') && ($_POST['password'] != '') && ($_POST['birth_date'] != '') && ($_POST['birth_month'] != '') && ($_POST['birth_year'] != '')  && ($_POST['gender_type'] != '') )  {
			
			$user_name = $_POST['user_name'];
			$full_name = $_POST['full_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$birth_date = $_POST['birth_date'];
			$birth_month = $_POST['birth_month'];
			$birth_year = $_POST['birth_year'];
			$gender_type = $_POST['gender_type'];
			
			$get_data = $this->common->getRow('*','dot_users',array('user_email' => $email));

			if($get_data == ''){
				$data = array(
					'user_name' => $user_name,
					'user_fullname' => $full_name,
					'user_email' => $email,
					'user_password' => sha1(md5($password)),
					'user_birthday' => $birth_date,
					'user_birthmonth' => $birth_month,
					'user_birthyear' =>$birth_year,
					'user_gender' => $gender_type,
					'user_registered' => strtotime("now")
				);
				
				$insert = $this->common->insertData('dot_users',$data);
				$last_insert_id = $this->db->insert_id();
				
				$result_arr = array();
				$result_arr = array('id'=>$last_insert_id);
				$result = $result_arr;

				if($insert) {
					$response = array('status'=>true, 'msg'=>'User Sign up successfully', 'result'=> $result);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
					// die();
				} else {
					$response = array('status'=>false, 'msg'=>'Something went wrong');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			}else{
				$response = array('status'=>false, 'msg'=>'Email id already exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
				// die();
			}
		}
		else{
			$response = array('status'=>false, 'msg'=>'Enter all the details');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
			// die();
		}
	}
	
	public function userupdate_post(){
	    $response = array();
		$get_data = '';
		$insert = '';
		if(($_POST['user_name'] != ''))  {
			$user_id=$_POST['user_id'];
			$user_name = $_POST['user_name'];
			$full_name = $_POST['full_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$birth_date = $_POST['birth_date'];
			$birth_month = $_POST['birth_month'];
			$birth_year = $_POST['birth_year'];
			$gender_type = $_POST['gender_type'];
			
			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
            //echo "<pre>";print_r($get_data);die;
			if($get_data != ''){
				$update_data = array(
					'user_name' => $user_name,
					'user_fullname' => $full_name,
					'user_email' => $email,
					'user_birthday' => $birth_date,
					'user_birthmonth' => $birth_month,
					'user_birthyear' =>$birth_year,
					'user_gender' => $gender_type,
					'user_registered' => strtotime("now")
				);
				$isdata_updated = $this->common->updateData('dot_users',$update_data,array('user_id' => $_POST['user_id']));
				//$insert = $this->common->insertData('dot_users',$data);
				//$last_insert_id = $this->db->insert_id();
				$get_data = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
				$result_arr = array();
				//$result_arr = array('id'=>$last_insert_id);
				$result = $result_arr;

				if($isdata_updated) {
					$response = array('status'=>true, 'msg'=>'User Profile updated successfully', 'result'=> $get_data);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
					// die();
				} else {
					$response = array('status'=>false, 'msg'=>'Something went wrong');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			}else{
				$response = array('status'=>false, 'msg'=>'Email id already exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
				// die();
			}
		}
		else{
			$response = array('status'=>false, 'msg'=>'Enter all the details');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
			// die();
		}
		//echo "kijk";die;
		//echo "<pre>";print_r($_POST);die;
	}
	public function login_post()
	{
	   // echo "Sds"; die;
	   // $this->default_file();        // by Karan @18-01-2021
		$response = array();
		$get_data = '';
		$insert = '';
		
		

		if(($_POST['user_name'] != '') && ($_POST['user_password'] != '') &&($_POST['show_online_offline_status'] != '')) {
			$get_data = $this->common->getRow('*','dot_users',array('user_name' => $_POST['user_name'], 'user_password' => sha1(md5($_POST['user_password']))));
			
			if(!empty($_POST['remember_token'])){

				$remember_token = $_POST['remember_token'];
			}else{
				$remember_token='';
			}	
			
			if($get_data != '') {
				$result_arr = array();
				// $result_arr = array('response'=>$get_data);
				$result = $result_arr;
				
				$update_data = array(
					'remember_token' => $remember_token,
					'show_online_offline_status' => $_POST['show_online_offline_status']
				);
				$isdata_updated = $this->common->updateData('dot_users',$update_data,array('user_name' => $_POST['user_name']));
				
				$get_up_data = $this->common->getRow('*','dot_users',array('user_name' => $_POST['user_name'], 'user_password' => sha1(md5($_POST['user_password']))));
			 //   print_r($get_up_data); die;

				$result_arr = array('response'=>$get_up_data);
				$result = $result_arr;
				$response = array('status'=>true, 'msg'=>'Login successfully', 'result'=> $result);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);

			} else {
				$response = array('status'=>false, 'msg'=>'You entered wrong credentials');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Enter All the details');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function forgot_post()
	{
	   //   $this->default_file();          // by Karan @18-01-2021
		$response = array();
		$get_data = '';
		$insert = '';

		if(($_POST['user_email'] != '') && ($_POST['user_password'] != '')) {
			$get_data = $this->common->getRow('*','dot_users',array('user_email' => $_POST['user_email']));
			if($get_data != '') {

				$update_data = array(
					'user_password'=> $_POST['user_password']
				);
				$isdata_updated = $this->common->updateData('dot_users',$update_data,array('user_email' => $_POST['user_email']));
				if(!empty($isdata_updated)) {
					$response = array('status'=>true, 'msg'=>'Password changed successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'Password not changed');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Email id does not exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Enter All the details');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function userprofile_get()
	{
	   //  $this->default_file();       // by Karan @18-01-2021
		$response = array();
		$get_data = '';

		if(($_GET['user_id'] != '')) {
			$user_id = $_GET['user_id'];
			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			
			$userpostcount = $this->common->query("SELECT COUNT(*) AS userpostcount FROM dot_user_posts WHERE user_id_fk = '$user_id'");
			
			$this->db->where('`ft`.`user_one`', '`ut`.`user_id`', FALSE);
			$followerscount = $this->common->getData('dot_users ut, dot_friends ft',array('ft.user_one'=>$user_id, 'ft.role'=>'flwr'),array('count'));

			$this->db->where('`ft`.`user_one`', '`ut`.`user_id`', FALSE);
			$followingcount = $this->common->getData('dot_users ut, dot_friends ft',array('ft.user_two'=>$user_id, 'ft.role'=>'flwr'),array('count'));

			if($get_data != '') {
				$result_arr = array();
				$upc = $userpostcount[0]['userpostcount'];
				
				$get_data->followers_count = $followerscount;
				$get_data->followering_count = $followingcount;
				
				$get_data->numberofpost = $upc;
				
				$result_arr = array('response'=>$get_data);
				if($get_data->user_cover == ''){
					$response = array('status'=>true, 'msg'=>'User Profile send successfully', 'default_image_url'=>'https://you2.co.in/uploads/cover/safe_male_cover.png', 'result'=> $result_arr);
				} else {
					$response = array('status'=>true, 'msg'=>'User Profile send successfully', 'default_image_url'=>'https://you2.co.in/uploads/cover/'.$get_data->user_cover, 'result'=> $result_arr);
				}
				
				$result = $result_arr;
				

				
				if($get_data->user_avatar == ''){
					$response = array('status'=>true, 'msg'=>'User Profile send successfully', 'default_image_url'=>'https://you2.co.in/uploads/avatar/avatar_female.png', 'result'=> $result);
				} else {
					$response = array('status'=>true, 'msg'=>'User Profile send successfully', 'default_image_url'=>'https://you2.co.in/uploads/avatar/'.$get_data->user_avatar, 'result'=> $result);
				}
				
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Enter All the details');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function updateprofile_post()
	{
	   //  $this->default_file();       // by Karan @18-01-2021
		$response = array();
		$get_data = '';
		$insert = '';

		if(($_POST['user_id'] != '')) {
			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_id']));
			if($get_data != '') {
				$update_data = array();
				if(!empty($_POST['user_relationship'])){
					$update_data['user_relationship'] = $_POST['user_relationship'];
				}
				if(!empty($_POST['user_sexuality'])){
					$update_data['user_sexuality'] = $_POST['user_sexuality'];
				}
				if(!empty($_POST['user_life_style'])){
					$update_data['user_life_style'] = $_POST['user_life_style'];
				}
				if(!empty($_POST['user_children'])){
					$update_data['user_children'] = $_POST['user_children'];
				}
				if(!empty($_POST['user_smoke'])){
					$update_data['user_smoke'] = $_POST['user_smoke'];
				}
				if(!empty($_POST['user_drink'])){
					$update_data['user_drink'] = $_POST['user_drink'];
				}
				if(!empty($update_data)) {
					$isdata_updated = $this->common->updateData('dot_users',$update_data,array('user_id' => $_POST['user_id']));
					if(!empty($isdata_updated)) {
						$response = array('status'=>true, 'msg'=>'User Profile updated successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>'Profile not updated');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'No Data for update');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id does not exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Enter User id');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function uploadstory_post()
	{
	       //$this->default_file();         // by Karan @18-01-2021
		$response = array();
		$user_id = $_POST['user_id'];
	//	print_r($user_id);die;

		$get_data = '';
		$insert = '';
		$get_data = '';

		if($user_id !='') {
			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_id']));
			if($get_data != '') {
				$image1 = base64_decode($this->input->post("stories_img"));
				$image_name = md5(uniqid(rand(), true));
				$filename = $image_name . '.' . 'png';
				$path0 = realpath(__DIR__ . '/../../../..');
				$path = $path0 . "/uploads/stories/";
				file_put_contents($path . $filename, $image1);

				if(isset($image1)) {
					/*$stories_img = $this->common->do_upload('stories_img','uploads/stories');
		    	    print_r($stories_img);
					print_r(base_url());
					die();*/
		    	   /* if (isset($stories_img['upload_data'])) {
		    	        $stories_img_name = $stories_img['upload_data']['file_name'];
		    	        $_POST['stories_img'] = $stories_img_name;
		            } else {
		            	$response = array('status'=>false, 'msg'=>'Image not uploaded');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}*/

					$data = array(
						'uid_fk' => $user_id,
						'stories_img' => $filename,
						'created' => time()
					);

					$insert = $this->common->insertData('dot_user_stories',$data);
					$last_insert_id = $this->db->insert_id();
					
					$result_arr = array();
					$result_arr = array('id'=>$last_insert_id);
					$result = $result_arr;

					if($insert) {
						$response = array('status'=>true, 'msg'=>'Story created successfully', 'result'=> $result);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				}else{
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function userstories_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];
		$get_user_stories = '';
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(isset($_GET['user_id']) ) {

					$this->db->select('*,Concat("https://you2.co.in/uploads/stories/", stories_img) as story_url,Concat("https://you2.co.in/uploads/storiesvideo/", stories_video) as stories_video_url');
					$this->db->where('FROM_UNIXTIME(created) >', 'CURRENT_DATE', FALSE );
					$this->db->where('FROM_UNIXTIME(created) <', 'CURRENT_DATE + INTERVAL 1 WEEK', FALSE);
				// 	$this->db->group_by('uid_fk');
					$this->db->order_by('s_id', 'desc');
					
					$get_user_stories = $this->common->getData('dot_user_stories',array('uid_fk' => $user_id));
					
					/*echo $this->db->last_query();
					die();*/

					if($get_user_stories) {
						$response = array('status'=>true, 'msg'=>'User Story list shared successfully', 'result'=> $get_user_stories);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'User not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function avatarupload_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
// 		$avatar_image = $_POST['avatar_image'];
		
		//if(!empty($_POST['avatar_image'])){
			$avatar_image = !empty($_POST['avatar_image']) ? $_POST['avatar_image'] : 'Null';
		//}
		//if(!empty($_POST['user_cover'])){
			$user_cover =!empty($_POST['user_cover']) ?  $_POST['user_cover'] : 'Null';
		//}
		$get_user_stories = '';
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(isset($_POST['user_id']) ) {
               // echo "<pre>";print_r($get_user_detail->user_avatar);die;
                if(!empty($this->input->post("avatar_image"))){
                    $image1 = base64_decode($this->input->post("avatar_image"));
	               // $image_name = md5(uniqid(rand(), true));
					$image_name = 'avatar_'.time();
					$avatar_image = $image_name . '.' . 'png';
					$path0 = realpath(__DIR__ . '/../../../..');
					$path = $path0 . "/uploads/avatar/";
					file_put_contents($path . $avatar_image, $image1);
                 }else{
                     $avatar_image=$get_user_detail->user_avatar;
                 }
					


                    if(!empty($this->input->post("user_cover"))){
                        $image2 = base64_decode($this->input->post("user_cover"));
    	               // $image_name = md5(uniqid(rand(), true));
    					$image_name = 'cover_'.time();
    					$user_cover = $image_name . '.' . 'png';
    					$path0 = realpath(__DIR__ . '/../../../..');
    					$path = $path0 . "/uploads/cover/";
    					file_put_contents($path . $user_cover, $image2);
                     }else{
                        $path0 = realpath(__DIR__ . '/../../../..');
    					$path = $path0 . "/uploads/cover/";
                        $user_cover=$get_user_detail->user_cover;
                     }
					

					if(isset($user_cover)) {
						$updatedata = array(
							'user_cover' => $user_cover,
						);
						//echo "<pre>";print_r($updatedata);die;
						$updatecover = $this->common->updateData('dot_users',$updatedata,array('user_id' => $user_id));

					}


					if(isset($avatar_image)) {
						$insertdata = array(
							'image_path' => $avatar_image,
							'uid_fk' => $user_id,
							'image_type' => 'avatar'
						);
						$insert = $this->common->insertData('dot_avatars',$insertdata);
						$last_insert_id = $this->db->insert_id();

						$update_data = array(
							'user_avatar' => $avatar_image,
						);
						$update = $this->common->updateData('dot_users',$update_data,array('user_id' => $user_id));

						if((isset($updatecover))) {
							$response = array('status'=>true, 'msg'=>'User Cover updated successfully');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}



						if((isset($update)) && (isset($update)) ) {
							$response = array('status'=>true, 'msg'=>'Avatar updated successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Image not found');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'User not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function friendsstory_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];
		$get_user_stories = '';
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(isset($_GET['user_id']) ) {
					
					$get_friendsstory = $this->common->query("SELECT DISTINCT S.s_id, S.uid_fk,S.created,  U.user_fullname, U.user_name FROM dot_user_stories S, dot_users U, dot_friends F WHERE U.user_status='1' AND S.uid_fk=U.user_id AND S.uid_fk = F.user_two AND S.uid_fk = '".$user_id."' AND FROM_UNIXTIME(S.created) > (CURRENT_DATE - INTERVAL 24 HOUR) AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 24 HOUR) AND (F.role = 'fri' OR F.role = 'me' OR F.role = '1' OR F.role = 'flwr') ORDER BY S.uid_fk ASC");
					
					/*$get_friendsstory = $this->common->query("SELECT DISTINCT S.s_id, S.uid_fk,S.created,  U.user_fullname, U.user_name FROM dot_user_stories S, dot_users U, dot_friends F WHERE U.user_status='1' AND S.uid_fk=U.user_id AND S.uid_fk = F.user_two AND FROM_UNIXTIME(S.created) > (CURRENT_DATE - INTERVAL 24 HOUR) AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 24 HOUR) AND (F.role = 'fri' OR F.role = 'me' OR F.role = '1' OR F.role = 'flwr') ORDER BY S.uid_fk ASC");*/

					if($get_friendsstory) {
						$response = array('status'=>true, 'msg'=>'User Friend Story shared successfully', 'result'=> $get_friendsstory);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
					} else {
						$response = array('status'=>false, 'msg'=>'No story found');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'User not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function allstory_get()
	{

		$response = array();
		$user_id = $_GET['user_id'];
		
		$get_user_stories = '';
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));

			if($get_user_detail != '') 
			{
				if(isset($_GET['user_id']) )
				{
					
				// 	$get_friendsstory = $this->common->query("SELECT DISTINCT S.s_id, S.uid_fk,S.created, U.user_fullname, U.user_name, S.stories_img,S.stories_video FROM dot_user_stories S, dot_users U WHERE S.uid_fk=U.user_id AND U.private_account = '0' AND FROM_UNIXTIME(S.created) > (CURRENT_DATE) AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 24 HOUR ) Group By U.user_id ORDER BY S.uid_fk  DESC");


					$get_friendsstory = $this->common->query("SELECT DISTINCT S.s_id, S.uid_fk,S.created, U.user_fullname, U.user_name, S.stories_img,S.stories_video FROM dot_user_stories S, dot_users U WHERE S.uid_fk=U.user_id AND U.private_account = '0' AND FROM_UNIXTIME(S.created) > (CURRENT_DATE) AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 24 HOUR ) Group By U.user_id ORDER BY S.uid_fk  DESC");


					foreach ($get_friendsstory as $key => $value) 
					{
						

						if($value['stories_img']){
							$upl_img = $value['stories_img'];

							$get_friendsstory[$key]['story_url'] = $this->base_url . "uploads/stories/" . $upl_img;
						} else {
							$get_friendsstory[$key]['story_url'] = $this->base_url . "uploads/images/no-image.png";
						}
						
						// add video url
						if($value['stories_video']){
							$vsid = $value['stories_video'];

							$get_friendsstory[$key]['stories_video_url'] = $this->base_url . "uploads/video/" . $vsid;
						} else {
							$get_friendsstory[$key]['stories_video_url'] = $this->base_url . "uploads/video/safe-video.png";
						}
					}
					if($get_friendsstory) {
						$response = array('status'=>true, 'msg'=>'All Story shared successfully', 'result'=> $get_friendsstory);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
					} else {
						$response = array('status'=>false, 'msg'=>'No story found', 'result'=>array());
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'User not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function textpostsave_post()
	{
		$response = array();
		@$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && (isset($_POST['post_hashtags'])) && ($_POST['can_see'] != '') ) {

					$time = time();
						$ip = $_SERVER['REMOTE_ADDR']; // user ip
						$url_slugies = $this->url_slugies($_POST['post_title']);
						$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
						$post_tags = $this->hashtag($_POST['post_hashtags']);

						$insertdata = array(
							'user_id_fk' => $user_id,
							'post_type' => 'p_text',
							'post_created_time' => $time,
							'user_ip' => $ip,
							'hashtag_normal' => $_POST['post_hashtags'],
							'hashtag_diez' => $post_tags,
							'post_title_text' => $_POST['post_title'],
							'post_text_details' => $_POST['post_details'],
							'who_can_see_post' => $_POST['can_see'],
							'slug' => $slug,
							'user_feeling' => $_POST['feeling'],
							'post_country_code' => $_POST['country_code'],

						);
						
						$insert = $this->common->insertData('dot_user_posts',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if((isset($insert)) ) {
							$response = array('status'=>true, 'msg'=>'Text Post saved successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Enter all the details');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Data not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		}
		
    public function userPostSocialReport_post(){
       // echo "<pre>";print_r($_POST);die;
        if(!empty($_POST['reported_type']) && !empty($_POST['reported_post_id_fk']) && !empty($_POST['reporter_user_id_fk'])){
            if(!empty($_POST['reported_type'])){
                    $user_id=$_POST['reported_type'];
                    $get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
                    if(!empty($get_user_detail)){
                        $get_postdetails = $this->common->query("SELECT *  FROM `dot_user_posts`  WHERE `user_post_id` = ".$_POST['reported_post_id_fk'] ." AND `user_id_fk` = ".$_POST['reporter_user_id_fk']);
                        if(!empty($get_postdetails)){
                            $get_user_other = $this->common->getRow('*','dot_users',array('user_id' => $_POST['reporter_user_id_fk']));
                            //echo "<pre>";print_r($get_user_other['pro_user_plain_time']);die;
                            $insertdata=array();
                            $user_post_id=$_POST['reporter_user_id_fk'];
                            $reported_post_id_fk=$_POST['reported_post_id_fk'];
                            $reported_type=$_POST['reported_type'];
                            $sql = "insert into dot_report_post (reported_post_id_fk,reporter_user_id_fk,reported_type,report_checked) values ('$reported_post_id_fk', '$user_post_id','$user_id','1')";
                            $this->db->query($sql);
                            $lastid_id=$this->db->insert_id();
                            $postdetails['get_report_detals'] = $this->common->getRow('*','dot_report_post',array('report_id' => $lastid_id));
                            $response = array('status'=>true, 'msg'=>'Post reported successfully','result'=>$postdetails);
                            $rest_data = $response;
                            $this->response($rest_data, REST_Controller::HTTP_OK);
                        }else{
                            $response = array('status'=>false, 'msg'=>'Post not available');
                			$rest_data = $response;
                			$this->response($rest_data, REST_Controller::HTTP_OK);  
                        }
                    }else{
                    $response = array('status'=>false, 'msg'=>'User not registered');
        			$rest_data = $response;
        			$this->response($rest_data, REST_Controller::HTTP_OK);
                    }
            }else{
                $response = array('status'=>false, 'msg'=>'User id not found');
    			$rest_data = $response;
    			$this->response($rest_data, REST_Controller::HTTP_OK);
            }
        }else{
            $response = array('status'=>false, 'msg'=>'User id or User post id is not found');
    		$rest_data = $response;
    		$this->response($rest_data, REST_Controller::HTTP_OK);
        }
        //echo "<pre>";print_r($_POST);die;
       // echo "dfdf";//tabel use dot_user_posts:---(ads_status),dot_audios:---status,dot_user_upload_images------status
    }
    
    public function userCalling_post(){
        if(!empty($_POST['user_id'])){
            $user_id=$_POST['user_id'];
            $get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
        if(!empty($_POST['typecalling'])){    
            if(!empty($get_user_detail)){
                $vediouser=$_POST['other_user'];
                $insertdata=array();
                $insertdata['user_id']=$user_id;
                $insertdata['vediouser_id']=$vediouser;
                
				$datavedfio = $this->common->getRow('*','vediouser',array('user_id' => $user_id));
				$vedio_users = $this->common->getRow('*','dot_users',array('user_id' => $vediouser));
				if($_POST['typecalling']=='vedio'){
				    $data12=array();
    				$data12["title"] =  "Vedio Calling";
    				$data12["body"] =  $vedio_users->user_fullname." Please Join Vedio Calling";
    				$data12["tag"] =  "Vedio Calling";
    				$data12["id"] = $vediouser;
				}else{
				    $data12=array();
    				$data12["title"] =  "Audio Calling";
    				$data12["body"] =  $vedio_users->user_fullname." Please Join Audio Calling";
    				$data12["tag"] =  "Audio Calling";
    				$data12["id"] = $vediouser;
				}
                $this->notificationpush($data12, $vedio_users->remember_token);
                $response = array('status'=>true, 'msg'=>'Calling joined successfully');
                $rest_data = $response;
        		$this->response($rest_data, REST_Controller::HTTP_OK);
				// if(empty($datavedfio)){
    				//$insert = $this->common->insertData('vediouser',$insertdata);
    				//$last_insert_id = $this->db->insert_id();
    				// 	if((isset($insert)) ) {
    				// 	    $datavedfio = $this->common->getRow('*','vediouser',array('id' => $last_insert_id));
        // 				    $response = array('status'=>true, 'msg'=>'Calling joined successfully','result'=>$datavedfio);
        // 					$rest_data = $response;
        // 					$this->response($rest_data, REST_Controller::HTTP_OK);
        // 				} else {
        // 					$response = array('status'=>false, 'msg'=>'Something went wrong');
        // 					$rest_data = $response;
        // 					$this->response($rest_data, REST_Controller::HTTP_OK);
        // 				}
				// }else{
				//     $response = array('status'=>false, 'msg'=>'User alreday joined');
				// 	$rest_data = $response;
				// 	$this->response($rest_data, REST_Controller::HTTP_OK);
				// }
            }else{
                $response = array('status'=>false, 'msg'=>'User id not found');
			    $rest_data = $response;
			    $this->response($rest_data, REST_Controller::HTTP_OK); 
            }
        }else{
                $response = array('status'=>false, 'msg'=>'Type calling required');
			    $rest_data = $response;
			    $this->response($rest_data, REST_Controller::HTTP_OK);
        }
        }else{
            $response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
        }
    }
    public function liveStreaming_post(){
        if(!empty($_POST)){
            if($_POST['typ']!=""){
                $get_postdetails = $this->common->query("SELECT DISTINCT * FROM dot_friends S, dot_users U WHERE S.user_one=".$_POST['user_id']." AND S.role='flwr'");
                //echo "<pre>";print_r($get_postdetails);die;
                if(!empty($get_postdetails)){
                    if(!empty($_POST['typ'])){
                        $data12=array();
                            $datmainuser = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_id']));
            				$data12["title"] =  "Live Streaming";
            				$data12["body"] =  $datmainuser->user_name." On Live Streaming";
                            $data12["tag"] =  "Live Streaming";
                            //echo "<pre>";print_r($data12);die;
                        foreach($get_postdetails as $val){
                            //echo "<pre>";print_r($val['remember_token']);die;
                            $datavedfio = $this->common->getRow('*','dot_users',array('user_id' => $_POST['other_user']));
                            //echo "<pre>";print_r($data12);die;
            				$data12["id"] = $val['user_id'];//$val//$datavedfio->remember_token
            				$this->notificationpush($data12, $val['remember_token']);
                        }
        				$response = array('status'=>true, 'msg'=>'Live streaming join sucessfully','result'=>$get_postdetails);
            			$rest_data = $response;
            			$this->response($rest_data, REST_Controller::HTTP_OK);
                    }else{
                        $response = array('status'=>false, 'msg'=>'Type not found');
            		    $rest_data = $response;
            			$this->response($rest_data, REST_Controller::HTTP_OK); 
                    }
                }else{
                    $response = array('status'=>false, 'msg'=>'Type not found');
        			$rest_data = $response;
        			$this->response($rest_data, REST_Controller::HTTP_OK);
                }
            }else{
                $response = array('status'=>false, 'msg'=>'Type not found');
    			$rest_data = $response;
    			$this->response($rest_data, REST_Controller::HTTP_OK);
            }
        }
    }
    
    public function userAcceptRequ_post(){
        if(!empty($_POST['user_one'])){
            $get_allusers = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_one']));
            if($_POST['user_two']!="" && $_POST['role']!=""){
                $get_folowingfrnds = $this->common->getRow('*','dot_friends',array('user_one' => $_POST['user_one'],'user_two'=>$_POST['user_two'],'role'=>$_POST['role']));
                $get_following_user = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_two']));

                $data12=array();
    			$data12["title"] =  "Accept Following";
    			$data12["body"] =  $get_allusers->user_fullname." Please Accept Request Your Following Member";
    			$data12["tag"] =  "Accept Following";
    			$data12["id"] = $_POST['user_two'];
    			
    			$this->notificationpush($data12, $get_following_user->remember_token);
                $response = array('status'=>true, 'msg'=>'accept request send successfully','result'=>$get_folowingfrnds);
        		$rest_data = $response;
        		$this->response($rest_data, REST_Controller::HTTP_OK);
            }else{
                $response = array('status'=>false, 'msg'=>'User friend not found');
    			$rest_data = $response;
    			$this->response($rest_data, REST_Controller::HTTP_OK);
            }
        }else{
            $response = array('status'=>false, 'msg'=>'User not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
        }
    }
    
    // public function userblock_post(){
    //     if(!empty($_POST['user_id'])){
    //         $user_id=$_POST['user_id'];
    //         $otheruser=$_POST['otheruser'];
            
    //     if(!empty($_POST['type'])){
    //         if($_POST['type']=='block'){
    //             $get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $otheruser));
    //             //echo "<pre>";print_r($get_user_detail);die;
    //         }else{
    //             echo "unblock";
    //         }
    //     }
    //     }else{
    //         $response = array('status'=>false, 'msg'=>'User id or block id is not found');
    // 		$rest_data = $response;
    // 		$this->response($rest_data, REST_Controller::HTTP_OK);
    //     }
    // }
    
    public function sendpushnotification_post() {
      //  echo "<pre>";print_r($_POST);die;
    //$request = json_decode(file_get_contents('php://input'),true);
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        'registration_ids'  => array('cCrz3JSxT-a_InaSqn61Cr:APA91bEQf5xrQ_JUuhj_a0MGT5q9eJB2n62KJeZ0a5tFK7SXL3hMkwZObMbh2RoCs_eVsqdsg4-jVdZpYMQSK4QD2bFBwRIhPuFZaKj8rEBMQVU1TgikfY_tvjMTnGVRZFiFPCJw_hzi'),
        'data'              => array( "message" => "Hello this is test push notification" ),
    );
    $headers = array( 
        'Authorization: key=AAAA3O_y1Us:APA91bGjXir-SR_24nl8WLgF_GFB84RygAgxBuU2yGwRvLrdT_rB1wOScTwUGvMqTaAmcWoDluAe_nsrtHPsnZOAJcexKZfI0QbNwOcdXBp684SJqkBcbenHGHme0Pjl8IcPGfvWi-p2',
        'Content-Type: application/json'
    );


    // Open connection
    $ch = curl_init();

    // Set the url, number of POST vars, POST data
    curl_setopt( $ch, CURLOPT_URL, $url );

    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

    // Avoids problem with https certificate
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute post
    $result = curl_exec($ch);
    //echo "<pre>";print_r($result);die;
    curl_close($ch);
    echo json_encode($result);    
}
    public function CommentedDisabledPost_post(){
         if(!empty($_POST['user_id']) && !empty($_POST['user_post_id'])){
              if(!empty($_POST['user_id'])){
                    $user_id=$_POST['user_id'];
                    $get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
                    
                    if(!empty($get_user_detail)){
                        $get_postdetails = $this->common->getRow('*','dot_user_posts',array('user_post_id' => $_POST['user_post_id']));
                        if(!empty($get_postdetails)){
                            $vedioarr=array();
                            $vedioarr['commeneted_status']=1;
                            $this->common->updateData('dot_user_posts',$vedioarr,array('user_post_id' => $_POST['user_post_id']));
                            $postdetails=array();
                            $postdetails = $this->common->getRow('*','dot_user_posts',array('user_post_id' => $_POST['user_post_id']));
                            //echo "<pre>";print_r($postdetails);die;
                            $response = array('status'=>true, 'msg'=>'Post commneted disabled successfully','result'=>$postdetails);
                            $rest_data = $response;
                            $this->response($rest_data, REST_Controller::HTTP_OK);
                        }else{
                            $response = array('status'=>false, 'msg'=>'Post not available');
                			$rest_data = $response;
                			$this->response($rest_data, REST_Controller::HTTP_OK);  
                        }
                    }else{
                        $response = array('status'=>false, 'msg'=>'User not registered');
            			$rest_data = $response;
            			$this->response($rest_data, REST_Controller::HTTP_OK);
                    }
            }else{
                $response = array('status'=>false, 'msg'=>'User id not found');
    			$rest_data = $response;
    			$this->response($rest_data, REST_Controller::HTTP_OK);
            }
         }else{
            $response = array('status'=>false, 'msg'=>'User id or User post id is not found');
    		$rest_data = $response;
    		$this->response($rest_data, REST_Controller::HTTP_OK);
         }
    }
		public function random_code($length)
		{
			return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);
		}

		public function url_slugies($str, $options = array()) {
	    // Make sure string is in UTF-8 and strip invalid UTF-8 characters
			$str      = mb_convert_encoding((string) $str, 'UTF-8', mb_list_encodings());
			$defaults = array(
				'delimiter' => '-',
				'limit' => null,
				'lowercase' => true,
				'replacements' => array(),
				'transliterate' => true
			);
	    // Merge options
			$options  = array_merge($defaults, $options);
			$char_map = array(
	        // Latin
				'À' => 'A',
				'Á' => 'A',
				'Â' => 'A',
				'Ã' => 'A',
				'Ä' => 'A',
				'Å' => 'A',
				'Æ' => 'AE',
				'Ç' => 'C',
				'È' => 'E',
				'É' => 'E',
				'Ê' => 'E',
				'Ë' => 'E',
				'Ì' => 'I',
				'Í' => 'I',
				'Î' => 'I',
				'Ï' => 'I',
				'Ð' => 'D',
				'Ñ' => 'N',
				'Ò' => 'O',
				'Ó' => 'O',
				'Ô' => 'O',
				'Õ' => 'O',
				'Ö' => 'O',
				'Ő' => 'O',
				'Ø' => 'O',
				'Ù' => 'U',
				'Ú' => 'U',
				'Û' => 'U',
				'Ü' => 'U',
				'Ű' => 'U',
				'Ý' => 'Y',
				'Þ' => 'TH',
				'ß' => 'ss',
				'à' => 'a',
				'á' => 'a',
				'â' => 'a',
				'ã' => 'a',
				'ä' => 'a',
				'å' => 'a',
				'æ' => 'ae',
				'ç' => 'c',
				'è' => 'e',
				'é' => 'e',
				'ê' => 'e',
				'ë' => 'e',
				'ì' => 'i',
				'í' => 'i',
				'î' => 'i',
				'ï' => 'i',
				'ð' => 'd',
				'ñ' => 'n',
				'ò' => 'o',
				'ó' => 'o',
				'ô' => 'o',
				'õ' => 'o',
				'ö' => 'o',
				'ő' => 'o',
				'ø' => 'o',
				'ù' => 'u',
				'ú' => 'u',
				'û' => 'u',
				'ü' => 'u',
				'ű' => 'u',
				'ý' => 'y',
				'þ' => 'th',
				'ÿ' => 'y',
	        // Latin symbols
				'©' => '(c)',
	        // Greek
				'Α' => 'A',
				'Β' => 'B',
				'Γ' => 'G',
				'Δ' => 'D',
				'Ε' => 'E',
				'Ζ' => 'Z',
				'Η' => 'H',
				'Θ' => '8',
				'Ι' => 'I',
				'Κ' => 'K',
				'Λ' => 'L',
				'Μ' => 'M',
				'Ν' => 'N',
				'Ξ' => '3',
				'Ο' => 'O',
				'Π' => 'P',
				'Ρ' => 'R',
				'Σ' => 'S',
				'Τ' => 'T',
				'Υ' => 'Y',
				'Φ' => 'F',
				'Χ' => 'X',
				'Ψ' => 'PS',
				'Ω' => 'W',
				'Ά' => 'A',
				'Έ' => 'E',
				'Ί' => 'I',
				'Ό' => 'O',
				'Ύ' => 'Y',
				'Ή' => 'H',
				'Ώ' => 'W',
				'Ϊ' => 'I',
				'Ϋ' => 'Y',
				'α' => 'a',
				'β' => 'b',
				'γ' => 'g',
				'δ' => 'd',
				'ε' => 'e',
				'ζ' => 'z',
				'η' => 'h',
				'θ' => '8',
				'ι' => 'i',
				'κ' => 'k',
				'λ' => 'l',
				'μ' => 'm',
				'ν' => 'n',
				'ξ' => '3',
				'ο' => 'o',
				'π' => 'p',
				'ρ' => 'r',
				'σ' => 's',
				'τ' => 't',
				'υ' => 'y',
				'φ' => 'f',
				'χ' => 'x',
				'ψ' => 'ps',
				'ω' => 'w',
				'ά' => 'a',
				'έ' => 'e',
				'ί' => 'i',
				'ό' => 'o',
				'ύ' => 'y',
				'ή' => 'h',
				'ώ' => 'w',
				'ς' => 's',
				'ϊ' => 'i',
				'ΰ' => 'y',
				'ϋ' => 'y',
				'ΐ' => 'i',
	        // Turkish
				'Ş' => 'S',
				'İ' => 'I',
				'Ç' => 'C',
				'Ü' => 'U',
				'Ö' => 'O',
				'Ğ' => 'G',
				'ş' => 's',
				'ı' => 'i',
				'ç' => 'c',
				'ü' => 'u',
				'ö' => 'o',
				'ğ' => 'g',
	        // Russian
				'А' => 'A',
				'Б' => 'B',
				'В' => 'V',
				'Г' => 'G',
				'Д' => 'D',
				'Е' => 'E',
				'Ё' => 'Yo',
				'Ж' => 'Zh',
				'З' => 'Z',
				'И' => 'I',
				'Й' => 'J',
				'К' => 'K',
				'Л' => 'L',
				'М' => 'M',
				'Н' => 'N',
				'О' => 'O',
				'П' => 'P',
				'Р' => 'R',
				'С' => 'S',
				'Т' => 'T',
				'У' => 'U',
				'Ф' => 'F',
				'Х' => 'H',
				'Ц' => 'C',
				'Ч' => 'Ch',
				'Ш' => 'Sh',
				'Щ' => 'Sh',
				'Ъ' => '',
				'Ы' => 'Y',
				'Ь' => '',
				'Э' => 'E',
				'Ю' => 'Yu',
				'Я' => 'Ya',
				'а' => 'a',
				'б' => 'b',
				'в' => 'v',
				'г' => 'g',
				'д' => 'd',
				'е' => 'e',
				'ё' => 'yo',
				'ж' => 'zh',
				'з' => 'z',
				'и' => 'i',
				'й' => 'j',
				'к' => 'k',
				'л' => 'l',
				'м' => 'm',
				'н' => 'n',
				'о' => 'o',
				'п' => 'p',
				'р' => 'r',
				'с' => 's',
				'т' => 't',
				'у' => 'u',
				'ф' => 'f',
				'х' => 'h',
				'ц' => 'c',
				'ч' => 'ch',
				'ш' => 'sh',
				'щ' => 'sh',
				'ъ' => '',
				'ы' => 'y',
				'ь' => '',
				'э' => 'e',
				'ю' => 'yu',
				'я' => 'ya',
	        // Ukrainian
				'Є' => 'Ye',
				'І' => 'I',
				'Ї' => 'Yi',
				'Ґ' => 'G',
				'є' => 'ye',
				'і' => 'i',
				'ї' => 'yi',
				'ґ' => 'g',
	        // Czech
				'Č' => 'C',
				'Ď' => 'D',
				'Ě' => 'E',
				'Ň' => 'N',
				'Ř' => 'R',
				'Š' => 'S',
				'Ť' => 'T',
				'Ů' => 'U',
				'Ž' => 'Z',
				'č' => 'c',
				'ď' => 'd',
				'ě' => 'e',
				'ň' => 'n',
				'ř' => 'r',
				'š' => 's',
				'ť' => 't',
				'ů' => 'u',
				'ž' => 'z',
	        // Polish
				'Ą' => 'A',
				'Ć' => 'C',
				'Ę' => 'e',
				'Ł' => 'L',
				'Ń' => 'N',
				'Ó' => 'o',
				'Ś' => 'S',
				'Ź' => 'Z',
				'Ż' => 'Z',
				'ą' => 'a',
				'ć' => 'c',
				'ę' => 'e',
				'ł' => 'l',
				'ń' => 'n',
				'ó' => 'o',
				'ś' => 's',
				'ź' => 'z',
				'ż' => 'z',
	        // Latvian
				'Ā' => 'A',
				'Č' => 'C',
				'Ē' => 'E',
				'Ģ' => 'G',
				'Ī' => 'i',
				'Ķ' => 'k',
				'Ļ' => 'L',
				'Ņ' => 'N',
				'Š' => 'S',
				'Ū' => 'u',
				'Ž' => 'Z',
				'ā' => 'a',
				'č' => 'c',
				'ē' => 'e',
				'ģ' => 'g',
				'ī' => 'i',
				'ķ' => 'k',
				'ļ' => 'l',
				'ņ' => 'n',
				'š' => 's',
				'ū' => 'u',
				'ž' => 'z'
			);
	    // Make custom replacements
$str      = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	    // Transliterate characters to ASCII
if ($options['transliterate']) {
	$str = str_replace(array_keys($char_map), $char_map, $str);
}
	    // Replace non-alphanumeric characters with our delimiter
$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	    // Remove duplicate delimiters
$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	    // Truncate slug to max. characters
$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
	    // Remove delimiter from ends
$str = trim($str, $options['delimiter']);
return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

public function hashtag($orimessage){
        //filter the hastag
	preg_match_all('/#+(\w+)/u', $orimessage, $matched_hashtag);
	$hashtag = '';
        //if hashtag found
	if(!empty($matched_hashtag[0])){
            //fetch hastag from the array
		foreach ($matched_hashtag[0] as $matched) {
                //append every hastag to a string
                //remove the # by preg_replace function
			$hashtag .= preg_replace('/[^\p{L}0-9\s]+/u', '', $matched).',';
                //append and , after every hashtag
		}
	}
        //remove , from the last hashtag
	return rtrim($hashtag, ',');
}

public function alluserprofileposts_get($lastProfilePostID="")
{
   // $this->sendp($data="");
	$response = array();
	@$user_id = $_GET['user_id'];
	$get_user_stories = '';
	$insert = '';
	$get_userprofile = array();

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(isset($_GET['user_id']) ) {

				$moreProfilePostQuery = "";
				if ($lastProfilePostID) {
						//build up the query
					$moreProfilePostQuery = " and P.user_post_id<'" . $lastProfilePostID . "' ";
				}

				/*$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, U.user_name, U.user_fullname,U.verified_user,U.user_page_lang FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id AND U.user_status='1' WHERE P.post_page_type = 'wall' ".$moreProfilePostQuery." ORDER BY P.user_post_id DESC LIMIT 10");*/

				$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id,P.commeneted_status,P.status, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, P.whc_category,U.user_name, U.user_fullname,U.verified_user,Concat('https://you2.co.in/uploads/avatar/', U.user_avatar) AS avatar_url, U.user_page_lang, DATE(FROM_UNIXTIME(P.post_created_time)) AS post_date, TIME(FROM_UNIXTIME(P.post_created_time)) AS post_time, CONCAT((DATE(FROM_UNIXTIME(P.post_created_time))),' ',(TIME(FROM_UNIXTIME(P.post_created_time)))) as post_date_time FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id WHERE P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 10");

				//echo "<pre>"; print_r($get_userprofile);die;
				// print_r(base_url('assets/images/dummy-image.jpg'));die;
				$dummy=array();
				$comment_count =  count($get_userprofile);
				
				        //}
				foreach ($get_userprofile as $key => $value) {
				    //echo "user=".$user_id;
				  // echo "<pre>";print_r($value['user_post_id']);die;
				        // post time ago//dot_user_blocked
				        $get_whichcat = $this->common->query("SELECT * From `dot_report_post` where reported_type= ".$user_id." AND reported_post_id_fk=".$value['user_post_id']);
				       //echo "SELECT * From `dot_user_blocked` where user_id= ".$user_id." OR userblock_id=".$value['user_id_fk'];die;
				       	$get_userblock = $this->common->query("SELECT * FROM `dot_blocked_users` WHERE blocker_uid_fk=$user_id AND blocked_uid_fk=".$value['user_id_fk']);
				       //echo "<pre>";print_r($get_userblock);die;
				       //echo count($get_userblock);die;
				       
				      if(empty($get_whichcat) && empty($get_userblock)){
				          $value['user_commnet_disable']=$value['commeneted_status'];
				          if ($value['avatar_url'] ==""){
				            $value['avatar_url']=base_url('assets/images/dummy-image.jpg');
				          }
                          if($value['post_created_time']){
        						$value['post_time_ago'] = $this->post_time_ago($value['post_created_time']);
        					}

				            // add image url
    					    if($value['post_image_id']){
    						$pid = $value['post_image_id'];
    						$dot_user_upload_images = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $pid));
    
    						$upl_img = $dot_user_upload_images->uploaded_image;
    						$value['upload_image_url'] = $this->base_url . "uploads/images/" . $upl_img;
        					} else {
        						$value['upload_image_url'] = $this->base_url . "uploads/images/no-image.png";
        					}
                			if($value['post_video_id']){
        						$vid = $value['post_video_id'];
        						$dot_user_upload_videos = $this->common->getRow('*','dot_videos',array('id' => $vid));
        						$upl_video = $dot_user_upload_videos->video_path;
        						$value['upload_video_url'] = $this->base_url . "uploads/video/" . $upl_video;
        					} else {
        						$value['upload_video_url'] = $this->base_url . "uploads/video/safe-video.png";
        					}
    
    						// add audio url
        					if($value['post_audio_id']){
        						$aid = $value['post_audio_id'];
        						$dot_user_upload_audio = $this->common->getRow('*','dot_audios',array('id' => $aid));
        
        						$upl_audio = $dot_user_upload_audio->audio_path;
        						$value['upload_audio_url'] = $this->base_url . "uploads/audio/" . $upl_audio;
        					} else {
        						$value['upload_audio_url'] = $this->base_url . "uploads/video/safe-video.png";
        					}
        
        						// before after url
        					if($value['before_after_images']){
        						$before_after_images = $value['before_after_images'];
        						$before_after_images_explode = explode(",", $before_after_images);
        
        						$value['before_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[0];
        						$value['after_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[1];
        					} else {
        						$value['before_image_url'] = $this->base_url . "uploads/image/no-image.png";
        						$value['after_image_url'] = $this->base_url . "uploads/image/no-image.png";
        					}
        
        						// which image url
        					if($value['which_image']){
        						$which_images = $value['which_image'];
        						$which_images_explode = explode(",", $which_images);
        						$image1 = $which_images_explode[0];
        						$image2 = $which_images_explode[1];
        
        						$which_image1 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image1));
        						$which_image2 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image2));
        
        						$upl_image1 = $which_image1->uploaded_image;
        						$upl_image2 = $which_image2->uploaded_image;
        
        						$value['which_imagea_url'] = $this->base_url . "uploads/images/" . $upl_image1;
        						$value['which_imageb_url'] = $this->base_url . "uploads/images/" . $upl_image2;
        					} else {
        						$value['which_imagea_url'] = $this->base_url . "uploads/image/no-image.png";
        						$value['which_imageb_url'] = $this->base_url . "uploads/image/no-image.png";
        					}
        					
        					// get comment by post
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];
        						$this->db->select('ct.comment_id, ct.uid_fk, ct.post_id_fk, ct.comment_text, ct.user_ip, ct.sticker, ct.gif, ct.comment_created_time,ct.voice, ut.user_name,  ut.user_fullname, ut.verified_user, ut.pro_user_type, ut.style_mode, ut.user_page_lang, ut.user_donate_message, ut.last_login, ut.show_online_offline_status, Concat("https://you2.co.in/uploads/avatar/", ut.user_avatar) as user_avatar_url, DATE(FROM_UNIXTIME(ct.comment_created_time)) AS comment_date, TIME(FROM_UNIXTIME(ct.comment_created_time)) AS comment_time');
        						$this->db->where('ct.uid_fk =', '`ut`.`user_id`', false);
        						$all_comments = $this->common->getData('dot_post_comments ct, dot_users ut', array('ct.post_id_fk'=> $post_id), array('sort_by'=>'ct.comment_id', 'sort_direction'=> 'ASC'));
        						if($all_comments != ''){
        							$comment_count = count($all_comments);
        							$value['comments'] = $all_comments;
        						} else {
        							$comment_count = '0';
        							$value['comments'] = array();
        						}
        						 $value['comment_count'] = $comment_count;
        					}
        					
        						// is favourite post
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];			                
        						$is_favourite = $this->common->getRow('*', 'dot_favourite_list', array('fav_post_id'=>$post_id, 'fav_uid_fk'=> $user_id));
        						if($is_favourite != ''){
        							$value['is_favourite'] = "1";
        						} else {
        							$value['is_favourite'] = "0";
        						}
        					}
        					
        					// is like post
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];			                
        						$is_like = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));
        						if($is_like != ''){
        							$value['is_like'] = "1";
        						} else {
        							$value['is_like'] = "0";
        						}
        					}
        					
        					// count like post
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];			                
        						$like_count = $this->common->getRow('COUNT(like_id) as like_count', 'dot_post_like', array('post_id_fk'=>$post_id));
        						if($like_count != ''){
        							$value['like_count'] = $like_count->like_count;
        						} else {
        							$value['like_count'] = "0";
        						}
        					}
        					
        					// is like post status
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];			                
        						$like_status = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));
        						if($like_status != ''){
        							$value['like_status'] = "1";
        						} else {
        							$value['like_status'] = "0";
        						}
        					}
        					
        					// is unlike post 
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];			                
        						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));
        						if($unlike_status != ''){
        							$value['dislike'] = "1";
        						} else {
        							$value['dislike'] = "0";
        						}
        					}
        					
        					// is unlike post status
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];			                
        						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));
        						if($unlike_status != ''){
        							$value['dislike_status'] = "1";
        						} else {
        							$value['dislike_status'] = "0";
        						}
        					}
        					
        					// count dis like post
        					if($value['user_post_id']){
        						$post_id = $value['user_post_id'];			                
        						$dislike_count = $this->common->getRow('COUNT(unlike_id) as dislike_count', 'dot_post_unlike', array('post_id_fk'=>$post_id));
        						if($dislike_count != ''){
        							$value['dislike_count'] = $like_count->like_count;
        						} else {
        							$value['dislike_count'] = "0";
        						}
        					}
    				        
    				        $dumyy[]=$value;
				      }
				    //   if(count($get_userblock)>0){
				    //       $value['bloca']="yes";
				    //       $dumyy[]=$value;
				    //       unset($dumyy);
				    //   }
				}
				//echo "<pre>";print_r($dumyy);die;

				if($get_userprofile) {
					$response = array('status'=>true, 'msg'=>'All Users Posts shared successfully', 'comment_count'=> $comment_count, 'result'=> $dumyy);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
				} else {
					$response = array('status'=>false, 'msg'=>'No Posts found','comment_count'=>'', 'result'=> $get_userprofile);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found', 'comment_count'=>'',);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found', 'comment_count'=>'',);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found', 'comment_count'=>'',);
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

function sendp($data=false){
   // echo "<pre>";print_r($data);die;
    //  echo "<pre>";print_r($_POST);die;
    //$request = json_decode(file_get_contents('php://input'),true);
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        'registration_ids'  => array($data),
        'data'              => array( "message" => "Hello this is test push notification" ),
    );
    $headers = array( 
        'Authorization: key=AAAA3O_y1Us:APA91bEwqEHu_2yEBQVho_lEdmPcgcLd2W00HMz6VsQbuDpOmvq65k1s1L5mjI2nCWYuBO-ht0oCacx7CS55M958167q9peeIA46GO5vC21vo2b7Jf0tg-sjVL_kEzeG8XYI1GO8CeCX',
        'Content-Type: application/json'
    );


    // Open connection
    $ch = curl_init();

    // Set the url, number of POST vars, POST data
    curl_setopt( $ch, CURLOPT_URL, $url );

    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

    // Avoids problem with https certificate
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute post
    $result = curl_exec($ch);
    //echo "<pre>";print_r($result);die;
    curl_close($ch);
    return $result;
    echo json_encode($result);  
}

function notificationpush($data1,$lastProfilePostID){
    $url = 'https://fcm.googleapis.com/fcm/send';
    $fields = array(
        'registration_ids'  => array($lastProfilePostID),
        'notification'  => array('title' => $data1['title'],'body' => $data1['body']),
    );
    $headers = array( 
        'Authorization: key=AAAADMVR7NI:APA91bGvAvEEjFlSISPXFO_F9hof_mtTKY20YSLI3ja6-RJodisg0d9wzF3B2WGttt0rcf_EF-SFsnhL34JOada7JSuP6F9AhejstANZDMA-SesviJl4ieS32RMpEN6L6OQ0dgn9lrOb',
        'Content-Type: application/json'
    );
    // Open connection
    $ch = curl_init();
    // Set the url, number of POST vars, POST data
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );

    // Avoids problem with https certificate
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute post
    $result = curl_exec($ch);
    $response =$result; 
	$rest_data = $response;
	//$this->response($rest_data, REST_Controller::HTTP_OK);
	//echo "<pre>";print_r($result);die;
    curl_close($ch);
   return $result;
    
    //echo json_encode($result); 
}
public function alluserprofileposts1_get($lastProfilePostID=""){

    $response = array();
	@$user_id = $_GET['user_id'];
	$get_user_stories = '';
	$insert = '';
	$get_userprofile = array();

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(isset($_GET['user_id']) ) {

				$moreProfilePostQuery = "";
				if ($lastProfilePostID) {
						//build up the query
					$moreProfilePostQuery = " and P.user_post_id<'" . $lastProfilePostID . "' ";
				}

				/*$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, U.user_name, U.user_fullname,U.verified_user,U.user_page_lang FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id AND U.user_status='1' WHERE P.post_page_type = 'wall' ".$moreProfilePostQuery." ORDER BY P.user_post_id DESC LIMIT 10");*/

				$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id,P.commeneted_status,P.status, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, P.whc_category,U.user_name, U.user_fullname,U.verified_user,Concat('https://you2.co.in/uploads/avatar/', U.user_avatar) AS avatar_url, U.user_page_lang, DATE(FROM_UNIXTIME(P.post_created_time)) AS post_date, TIME(FROM_UNIXTIME(P.post_created_time)) AS post_time, CONCAT((DATE(FROM_UNIXTIME(P.post_created_time))),' ',(TIME(FROM_UNIXTIME(P.post_created_time)))) as post_date_time FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id WHERE P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 10");

				//echo "<pre>"; print_r($get_userprofile);die;
				// print_r(base_url('assets/images/dummy-image.jpg'));die;
				$dummy=array();
				$comment_count =  count($get_userprofile);
				
				        //}
				foreach ($get_userprofile as $key => $value) {
				        // post time ago
				    //$get_whichcat = $this->common->getData('dot_user_posts',array('status'=>0));
				        
				            //echo "<pre>";print_r($get_whichcat);die;
				            $get_userprofile[$key]['reportstatus']=$value['status'];
				            $get_userprofile[$key]['user_commnet_disable']=$value['commeneted_status'];
				           
				        
				        if ($value['avatar_url'] ==""){
				            $value['avatar_url']=base_url('assets/images/dummy-image.jpg');
				        }
				        
					if($value['post_created_time']){
						$post_created_time = $value['post_created_time'];
						$get_userprofile[$key]['post_time_ago'] = $this->post_time_ago($post_created_time);
					}

				        // add image url
					if($value['post_image_id']){
						$pid = $value['post_image_id'];
						$dot_user_upload_images = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $pid));

						$upl_img = $dot_user_upload_images->uploaded_image;
				// 		print_r($upl_img);
						$get_userprofile[$key]['upload_image_url'] = $this->base_url . "uploads/images/" . $upl_img;
					} else {
						$get_userprofile[$key]['upload_image_url'] = $this->base_url . "uploads/images/no-image.png";
					}

						// add video url
					if($value['post_video_id']){
						$vid = $value['post_video_id'];
						$dot_user_upload_videos = $this->common->getRow('*','dot_videos',array('id' => $vid));
						

						$upl_video = $dot_user_upload_videos->video_path;
						$get_userprofile[$key]['upload_video_url'] = $this->base_url . "uploads/video/" . $upl_video;
					} else {
						$get_userprofile[$key]['upload_video_url'] = $this->base_url . "uploads/video/safe-video.png";
					}

						// add audio url
					if($value['post_audio_id']){
						$aid = $value['post_audio_id'];
						$dot_user_upload_audio = $this->common->getRow('*','dot_audios',array('id' => $aid));

						$upl_audio = $dot_user_upload_audio->audio_path;
						$get_userprofile[$key]['upload_audio_url'] = $this->base_url . "uploads/audio/" . $upl_audio;
					} else {
						$get_userprofile[$key]['upload_audio_url'] = $this->base_url . "uploads/video/safe-video.png";
					}

						// before after url
					if($value['before_after_images']){
						$before_after_images = $value['before_after_images'];
						$before_after_images_explode = explode(",", $before_after_images);

						$get_userprofile[$key]['before_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[0];
						$get_userprofile[$key]['after_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[1];
					} else {
						$get_userprofile[$key]['before_image_url'] = $this->base_url . "uploads/image/no-image.png";
						$get_userprofile[$key]['after_image_url'] = $this->base_url . "uploads/image/no-image.png";
					}

						// which image url
					if($value['which_image']){
						$which_images = $value['which_image'];
						$which_images_explode = explode(",", $which_images);
						$image1 = $which_images_explode[0];
						$image2 = $which_images_explode[1];

						$which_image1 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image1));
						$which_image2 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image2));

						$upl_image1 = $which_image1->uploaded_image;
						$upl_image2 = $which_image2->uploaded_image;

						$get_userprofile[$key]['which_imagea_url'] = $this->base_url . "uploads/images/" . $upl_image1;
						$get_userprofile[$key]['which_imageb_url'] = $this->base_url . "uploads/images/" . $upl_image2;
					} else {
						$get_userprofile[$key]['which_imagea_url'] = $this->base_url . "uploads/image/no-image.png";
						$get_userprofile[$key]['which_imageb_url'] = $this->base_url . "uploads/image/no-image.png";
					}

						// get comment by post
					if($value['user_post_id']){

						$post_id = $value['user_post_id'];

						$this->db->select('ct.comment_id, ct.uid_fk, ct.post_id_fk, ct.comment_text, ct.user_ip, ct.sticker, ct.gif, ct.comment_created_time,ct.voice, ut.user_name,  ut.user_fullname, ut.verified_user, ut.pro_user_type, ut.style_mode, ut.user_page_lang, ut.user_donate_message, ut.last_login, ut.show_online_offline_status, Concat("https://you2.co.in/uploads/avatar/", ut.user_avatar) as user_avatar_url, DATE(FROM_UNIXTIME(ct.comment_created_time)) AS comment_date, TIME(FROM_UNIXTIME(ct.comment_created_time)) AS comment_time');

						$this->db->where('ct.uid_fk =', '`ut`.`user_id`', false);

						$all_comments = $this->common->getData('dot_post_comments ct, dot_users ut', array('ct.post_id_fk'=> $post_id), array('sort_by'=>'ct.comment_id', 'sort_direction'=> 'ASC'));


						if($all_comments != ''){
							$comment_count = count($all_comments);

							$get_userprofile[$key]['comments'] = $all_comments;
						} else {
							$comment_count = '0';

							$get_userprofile[$key]['comments'] = array();
						}

						$get_userprofile[$key]['comment_count'] = $comment_count;
					}

						// is favourite post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$is_favourite = $this->common->getRow('*', 'dot_favourite_list', array('fav_post_id'=>$post_id, 'fav_uid_fk'=> $user_id));

						if($is_favourite != ''){
							$get_userprofile[$key]['is_favourite'] = "1";
						} else {
							$get_userprofile[$key]['is_favourite'] = "0";
						}
					}

						// is like post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$is_like = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));

						if($is_like != ''){
							$get_userprofile[$key]['is_like'] = "1";
						} else {
							$get_userprofile[$key]['is_like'] = "0";
						}
					}

						// count like post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$like_count = $this->common->getRow('COUNT(like_id) as like_count', 'dot_post_like', array('post_id_fk'=>$post_id));

						if($like_count != ''){
							$get_userprofile[$key]['like_count'] = $like_count->like_count;
						} else {
							$get_userprofile[$key]['like_count'] = "0";
						}
					}

												// is like post status
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$like_status = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));

						if($like_status != ''){
							$get_userprofile[$key]['like_status'] = "1";
						} else {
							$get_userprofile[$key]['like_status'] = "0";
						}
					}


						// is unlike post 
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));

						if($unlike_status != ''){
							$get_userprofile[$key]['dislike'] = "1";
						} else {
							$get_userprofile[$key]['dislike'] = "0";
						}
					}

												// is unlike post status
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));

						if($unlike_status != ''){
							$get_userprofile[$key]['dislike_status'] = "1";
						} else {
							$get_userprofile[$key]['dislike_status'] = "0";
						}
					}

							// count dis like post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$dislike_count = $this->common->getRow('COUNT(unlike_id) as dislike_count', 'dot_post_unlike', array('post_id_fk'=>$post_id));

						if($dislike_count != ''){
							$get_userprofile[$key]['dislike_count'] = $like_count->like_count;
						} else {
							$get_userprofile[$key]['dislike_count'] = "0";
						}
					}
				}
				
    //             foreach($get_userprofile as $key => $values)
				// {
				//      if ($values['avatar_url'] =="")
    //              {
				//     echo "Dsd"; die;      
				//     $get_userprofile[$key]['avatar_url']= base_url('assets/images/dummy-image.jpg');
				//  }
				// }

				if($get_userprofile) {
					$response = array('status'=>true, 'msg'=>'All Users Posts shared successfully', 'comment_count'=> $comment_count, 'result'=> $get_userprofile);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
				} else {
					$response = array('status'=>false, 'msg'=>'No Posts found','comment_count'=>'', 'result'=> $get_userprofile);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found', 'comment_count'=>'',);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found', 'comment_count'=>'',);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found', 'comment_count'=>'',);
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}
public function linkpostsave_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$insert = '';

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(($_POST['post_link_url'] != '') ) {

				$time = time();
						$ip = $_SERVER['REMOTE_ADDR']; // user ip
						$url_slugies = $this->url_slugies($_POST['post_title']);
						$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
						$post_tags = $this->hashtag($_POST['post_hashtags']);

						$insertdata = array(
							'user_id_fk' => $user_id,
							'post_type' => 'p_link',
							'post_created_time' => $time,
							'user_ip' => $ip,
							'hashtag_normal' => $_POST['post_hashtags'],
							'hashtag_diez' => $post_tags,
							'post_title_text' => $_POST['post_title'],
							'post_text_details' => $_POST['post_details'],
							'who_can_see_post' => $_POST['can_see'],
							'post_link_url' => $_POST['post_link_url'],
							'post_link_description' => $_POST['post_link_description'],
							'post_link_title' => $_POST['post_link_title'],
							'post_link_img' => "https://you2.co.in/uploads/images/safe_img.png",
							'post_link_mini_url' => $_POST['post_link_mini_url'],
							'slug' => $slug,
							'post_page_type' => 'wall',
							'user_feeling' => $_POST['feeling'],
						);
						
						$insert = $this->common->insertData('dot_user_posts',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if((isset($insert)) ) {
							$response = array('status'=>true, 'msg'=>'Link Post saved successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Enter all the details');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Data not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		}

		public function locationpostsave_post()
		{
			$response = array();
			$user_id = $_POST['user_id'];
			$insert = '';

			if($user_id !='') {
				$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
				if($get_user_detail != '') {
					if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && ($_POST['post_hashtags'] != '') ) {

						$time = time();
						$ip = $_SERVER['REMOTE_ADDR']; // user ip
						$url_slugies = $this->url_slugies($_POST['post_title']);
						$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
						$post_tags = $this->hashtag($_POST['post_hashtags']);

						$insertdata = array(
							'user_id_fk' => $user_id,
							'post_type' => 'p_location',
							'post_created_time' => $time,
							'user_ip' => $ip,
							'hashtag_normal' => $_POST['post_hashtags'],
							'hashtag_diez' => $post_tags,
							'post_title_text' => $_POST['post_title'],
							'post_text_details' => $_POST['post_details'],
							'who_can_see_post' => $_POST['can_see'],
							'user_lat' => $_POST['user_lat'],
							'user_lang' => $_POST['user_long'],
							'slug' => $slug,
							'post_page_type' => 'wall',
							'user_feeling' => $_POST['feeling'],
							'post_country_code' => $_POST['country_code'],
						);
						
						$insert = $this->common->insertData('dot_user_posts',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if((isset($insert)) ) {
							$response = array('status'=>true, 'msg'=>'Location Post saved successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Enter all the details');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Data not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		}

		public function postsharedetail_get()
		{
			$post_id = $_GET['post_id'];
			$response = array();

			$get_post_detail = $this->common->getRow('*','dot_user_posts',array('user_post_id' => $post_id));
			if($get_post_detail != '') {

				$post_response = $this->common->query("SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.comment_status,P.watermarkid,P.which_image,
					P.post_created_time,P.hashtag_normal,P.hashtag_diez,P.post_title_text,P.post_text_details,
					P.post_event_id,P.post_event_page_id,P.who_can_see_post,P.post_image_id,P.post_link_url,
					P.post_link_description,P.post_link_title,P.post_link_img,P.post_link_mini_url,P.post_video_id,
					P.post_audio_id,P.filter_name, P.gif_url,U.show_suggest_hashTags,P.user_lat ,P.user_lang,
					P.location_place,P.about_location,P.before_after_images,P.slug,P.post_page_type,P.shared_post,
					P.user_feeling,P.post_video_name,P.m_product_name,P.m_product_description,P.product_images,
					P.product_normal_price,P.product_category, P.product_status,P.product_discount_price,P.product_currency,
					P.ads_status,P.ads_display_type,U.show_suggest_users,U.show_advertisement ,U.show_google_ads ,
					U.user_name, U.user_fullname,U.verified_user,U.pro_user_type,U.style_mode,U.user_page_lang,U.user_donate_message,U.last_login,U.show_online_offline_status FROM dot_user_posts P, dot_users U WHERE  P.user_id_fk=U.user_id and (P.slug='$post_id' OR P.user_post_id = '$post_id')");

				$postMetaImage = isset($post_response[0]['post_image_id']) ? $post_response[0]['post_image_id'] : NULL;
				$postMetaImageUrl = $this->GetUploadImageID($postMetaImage);
				if ($postMetaImageUrl) {
					$postMetaImage = $this->base_url . "uploads/images/" . $postMetaImageUrl->uploaded_image;
				} else {
					$postMetaImage = $this->base_url . "uploads/images/no-image.png";
				}

				$post_response[0]['postMetaImage'] = $postMetaImage;

				if($post_response) {
					$response = array('status'=>true, 'msg'=>'Posts detail shared successfully', 'result'=> $post_response);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				// die();
				} else {
					$response = array('status'=>false, 'msg'=>'No Posts found', 'result'=> $post_response);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Post not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		}

		public function GetUploadImageID($imageID)
		{
			$GetImageId = $this->common->getRow('image_id,uploaded_image','dot_user_upload_images',array('image_id' => $imageID));
			return $GetImageId;
		}

		public function imagepostsave_post()
		{
			$response = array();
			$user_id = $_POST['user_id'];
			$insert = '';

			if($user_id !='') {
				$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
				if($get_user_detail != '') {
					if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && ($_POST['post_hashtags'] != '') && ($_POST['post_image'] != '') && ($_POST['type_image'] != '')) {

						$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$url_slugies = $this->url_slugies($_POST['post_title']);
					$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
					$post_tags = $this->hashtag($_POST['post_hashtags']);
					if($_POST['type_image']=='new'){
						$image1 = base64_decode($this->input->post("post_image"));

						$image_name = 'image_'.time();
						$filename = $image_name . '.' . 'png';
						$path0 = realpath(__DIR__ . '/../../../..');
						$path = $path0 . "/uploads/images/";
						file_put_contents($path . $filename, $image1);
					}
					if($_POST['type_image']=='reshare'){


						$filename = $_POST['post_image'];
					}


					$insertdata1 = array(
						'user_id_fk' => $user_id,
						'uploaded_image' => 'p_image',
						'type_image' => $_POST['type_image'],
						'uploaded_image' => $filename,
						'uploaded_time' => $time,
						'user_ip' =>$ip,
					);

					$insert1 = $this->common->insertData('dot_user_upload_images',$insertdata1);
					$post_image_id = $this->db->insert_id();

					if(!empty($post_image_id)) {
						$insertdata = array(
							'user_id_fk' => $user_id,
							'post_type' => 'p_image',
							'post_created_time' => $time,
							'user_ip' => $ip,
							'hashtag_normal' => $_POST['post_hashtags'],
							'hashtag_diez' => $post_tags,
							'post_title_text' => $_POST['post_title'],
							'post_text_details' => $_POST['post_details'],
							'who_can_see_post' => $_POST['can_see'],
							'post_image_id' => $post_image_id,
							'slug' => $slug,
							'post_page_type' => 'wall',
							'user_feeling' => $_POST['feeling'],
							'post_country_code' => $_POST['country_code'],
						);
						
						$insert = $this->common->insertData('dot_user_posts',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if((isset($insert)) ) {
							$response = array('status'=>true, 'msg'=>'ImageLink Post saved successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Image not uploaded');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function videopostsave_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$video_path = $_POST['video_path'];
		
		$type_image = $_POST['type_image'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
			    if ($type_image == 'reshare') {
			        if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && ($_POST['post_hashtags'] != '') && ($_POST['post_video'] != '') ) {

					$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$url_slugies = $this->url_slugies($_POST['post_title']);
					$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
					$post_tags = $this->hashtag($_POST['post_hashtags']);
                    $_POST['post_video'] = $video_path;
					/*$image1 = base64_decode($this->input->post("post_image"));
	                $image_name = 'image_'.time();
	                $filename = $image_name . '.' . 'png';
	                $path0 = realpath(__DIR__ . '/../../../..');
	                $path = $path0 . "/uploads/images/";
	                file_put_contents($path . $filename, $image1);*/

	               // if ($type_image == 'reshare') {
	               // 	$_POST['post_video'] = $video_path;
	               // } else {
	               // 	$post_video = $this->common->do_upload('post_video','./uploads/video');

	               // 	if (isset($post_video['upload_data'])) {
	               // 		$post_video_name = $post_video['upload_data']['file_name'];
	               // 		$_POST['post_video'] = $post_video_name;
	               // 	} else {
	               // 		$response = array('status'=>false, 'msg'=>'Video not uploaded, try again');
	               // 		$rest_data = $response;
	               // 		$this->response($rest_data, REST_Controller::HTTP_OK);
	               // 		die();
	               // 	}
	               // }

	                $insertdata1 = array(
	                	'uid_fk' => $user_id,
	                	'video_path' => $_POST['post_video'],
	                	'video_page_type' =>'wall',
	                );

	                $insert1 = $this->common->insertData('dot_videos',$insertdata1);
	                $post_video_id = $this->db->insert_id();

	                if(!empty($post_video_id)) {
	                	$insertdata = array(
	                		'user_id_fk' => $user_id,
	                		'post_type' => 'p_video',
	                		'post_created_time' => $time,
	                		'user_ip' => $ip,
	                		'hashtag_normal' => $_POST['post_hashtags'],
	                		'hashtag_diez' => $post_tags,
	                		'post_title_text' => $_POST['post_title'],
	                		'post_text_details' => $_POST['post_details'],
	                		'who_can_see_post' => $_POST['can_see'],
	                		'post_video_id' => $post_video_id,
	                		'slug' => $slug,
	                		'post_page_type' => 'wall',
	                		'user_feeling' => $_POST['feeling'],
	                		'post_video_name' => "",
	                		'post_country_code' => $_POST['country_code'],
	                	);

	                	$insert = $this->common->insertData('dot_user_posts',$insertdata);
	                	$last_insert_id = $this->db->insert_id();

	                	if((isset($insert)) ) {
	                		$response = array('status'=>true, 'msg'=>'Video Post saved successfully', 'result'=> $last_insert_id);
	                		$rest_data = $response;
	                		$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
	                	} else {
	                		$response = array('status'=>false, 'msg'=>'Something went wrong');
	                		$rest_data = $response;
	                		$this->response($rest_data, REST_Controller::HTTP_OK);
	                	}
	                } else {
	                	$response = array('status'=>false, 'msg'=>'Video not uploaded');
	                	$rest_data = $response;
	                	$this->response($rest_data, REST_Controller::HTTP_OK);
	                }
	            } else {
	            	$response = array('status'=>false, 'msg'=>'Enter All the details');
	            	$rest_data = $response;
	            	$this->response($rest_data, REST_Controller::HTTP_OK);
	            }
	                
	                } else{
	                    if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && ($_POST['post_hashtags'] != '') && ($_FILES['post_video'] != '') ) {

					$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$url_slugies = $this->url_slugies($_POST['post_title']);
					$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
					$post_tags = $this->hashtag($_POST['post_hashtags']);

					/*$image1 = base64_decode($this->input->post("post_image"));
	                $image_name = 'image_'.time();
	                $filename = $image_name . '.' . 'png';
	                $path0 = realpath(__DIR__ . '/../../../..');
	                $path = $path0 . "/uploads/images/";
	                file_put_contents($path . $filename, $image1);*/

	               // if ($type_image == 'reshare') {
	               // 	$_POST['post_video'] = $video_path;
	               // } else {
	                	$post_video = $this->common->do_upload('post_video','./uploads/video');

	                	if (isset($post_video['upload_data'])) {
	                		$post_video_name = $post_video['upload_data']['file_name'];
	                		$_POST['post_video'] = $post_video_name;
	                	} else {
	                		$response = array('status'=>false, 'msg'=>'Video not uploaded, try again');
	                		$rest_data = $response;
	                		$this->response($rest_data, REST_Controller::HTTP_OK);
	                		die();
	                	}
	               // }

	                $insertdata1 = array(
	                	'uid_fk' => $user_id,
	                	'video_path' => $_POST['post_video'],
	                	'video_page_type' =>'wall',
	                );

	                $insert1 = $this->common->insertData('dot_videos',$insertdata1);
	                $post_video_id = $this->db->insert_id();

	                if(!empty($post_video_id)) {
	                	$insertdata = array(
	                		'user_id_fk' => $user_id,
	                		'post_type' => 'p_video',
	                		'post_created_time' => $time,
	                		'user_ip' => $ip,
	                		'hashtag_normal' => $_POST['post_hashtags'],
	                		'hashtag_diez' => $post_tags,
	                		'post_title_text' => $_POST['post_title'],
	                		'post_text_details' => $_POST['post_details'],
	                		'who_can_see_post' => $_POST['can_see'],
	                		'post_video_id' => $post_video_id,
	                		'slug' => $slug,
	                		'post_page_type' => 'wall',
	                		'user_feeling' => $_POST['feeling'],
	                		'post_video_name' => "",
	                		'post_country_code' => $_POST['country_code'],
	                	);

	                	$insert = $this->common->insertData('dot_user_posts',$insertdata);
	                	$last_insert_id = $this->db->insert_id();

	                	if((isset($insert)) ) {
	                		$response = array('status'=>true, 'msg'=>'Video Post saved successfully', 'result'=> $last_insert_id);
	                		$rest_data = $response;
	                		$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
	                	} else {
	                		$response = array('status'=>false, 'msg'=>'Something went wrong');
	                		$rest_data = $response;
	                		$this->response($rest_data, REST_Controller::HTTP_OK);
	                	}
	                } else {
	                	$response = array('status'=>false, 'msg'=>'Video not uploaded');
	                	$rest_data = $response;
	                	$this->response($rest_data, REST_Controller::HTTP_OK);
	                }
	            } else {
	            	$response = array('status'=>false, 'msg'=>'Enter All the details');
	            	$rest_data = $response;
	            	$this->response($rest_data, REST_Controller::HTTP_OK);
	            }
	                }
				
	        } else {
	        	$response = array('status'=>false, 'msg'=>'Data not found');
	        	$rest_data = $response;
	        	$this->response($rest_data, REST_Controller::HTTP_OK);
	        }
	    } else {
	    	$response = array('status'=>false, 'msg'=>'User id not found');
	    	$rest_data = $response;
	    	$this->response($rest_data, REST_Controller::HTTP_OK);
	    }
	}
	
	public function audiopostsave_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$audio_path = $_POST['audio_path'];
		$type_image = $_POST['type_image'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && ($_POST['post_hashtags'] != '') && ($_POST['post_audio'] != '') ) {

					$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$url_slugies = $this->url_slugies($_POST['post_title']);
					$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
					$post_tags = $this->hashtag($_POST['post_hashtags']);

					if ($type_image == 'reshare') {
						$filename = $audio_path;
					} else {
						$audio1 = base64_decode($this->input->post("post_audio"));
						$audio_name = time();
						$filename = $audio_name . '.' . 'mp3';
						$path0 = realpath(__DIR__ . '/../../../..');
						$path = $path0 . "/uploads/audio/";
						file_put_contents($path . $filename, $audio1);
					}

					$insertdata1 = array(
						'uid_fk' => $user_id,
						'audio_path' => $filename,
						'audio_page_type' =>'wall',
					);

					$insert1 = $this->common->insertData('dot_audios',$insertdata1);
					$post_audio_id = $this->db->insert_id();

					if(!empty($post_audio_id)) {
						$insertdata = array(
							'user_id_fk' => $user_id,
							'post_type' => 'p_audio',
							'post_created_time' => $time,
							'user_ip' => $ip,
							'hashtag_normal' => $_POST['post_hashtags'],
							'hashtag_diez' => $post_tags,
							'post_title_text' => $_POST['post_title'],
							'post_text_details' => $_POST['post_details'],
							'who_can_see_post' => $_POST['can_see'],
							'post_audio_id' => $post_audio_id,
							'slug' => $slug,
							'post_page_type' => 'wall',
							'user_feeling' => $_POST['feeling'],
							'post_country_code' => $_POST['country_code'],
						);
						
						$insert = $this->common->insertData('dot_user_posts',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if((isset($insert)) ) {
							$response = array('status'=>true, 'msg'=>'Audio Post saved successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Audio not uploaded');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function addtofavpost_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_id'] != '') ) {
					$time = time();
					$insertdata1 = array(
						'fav_post_id' => $_POST['post_id'],
						'fav_uid_fk' => $user_id,
						'fav_created' =>$time,
					);

					$insert1 = $this->common->insertData('dot_favourite_list',$insertdata1);
					$addtofavpost_id = $this->db->insert_id();

					if(!empty($insert1)) {
						$response = array('status'=>true, 'msg'=>'Add to favourite list successfully', 'result'=> $addtofavpost_id);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);

					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function addtofavpostnew_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_id'] != '') ) {
					$time = time();
					$insertdata1 = array(
				    'useraction'=>"fav"
					);
					$insert1 = $this->common->updateData('dot_user_posts',$insertdata1,array("user_post_id"=>$_POST['post_id']));

					if(!empty($insert1)) {
						$response = array('status'=>true, 'msg'=>'Add to favourite list successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);

					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function userstoryseen_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$to_userid = $_POST['to_userid'];

		$get_user_stories = '';
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(isset($_POST['user_id']) ) {
					
					$get_friendsstory = $this->common->query("SELECT DISTINCT S.s_id, S.uid_fk,S.created,  U.user_fullname, U.user_name, S.stories_img as pics, Concat('https://you2.co.in/uploads/stories/', S.stories_img) AS story_url ,Concat('https://you2.co.in/uploads/storiesvideo/', stories_video) AS stories_video_url FROM dot_user_stories S, dot_users U WHERE S.uid_fk = '$to_userid' AND S.uid_fk=U.user_id AND U.private_account = '0' AND FROM_UNIXTIME(S.created) > (CURRENT_DATE) AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 24 HOUR ) ORDER BY S.uid_fk DESC");
					//echo "<pre>";print_r($get_friendsstory);die;
					if($_POST['stories_type']=='otheruser'){
						foreach($get_friendsstory as $value){
							$storiesid= $value['s_id'];

							$getuserstories = $this->common->getRow('*','dot_stories_seen',array('stories_seen_id' => $user_id,'stories_user_id' => $to_userid,'stories_id' =>$storiesid));	

							if(empty($getuserstories)) {
								$data1 = array(
									'stories_id'=>$storiesid,
									'stories_seen_id' => $user_id,
									'stories_user_id' => $to_userid,
									'visit_checked' => 1,
								);
								$insert1 = $this->common->insertData('dot_stories_seen', $data1);
								// $last_insert_id = $this->db->insert_id();
								// if(!empty($last_insert_id)){
								//     $insert1 = $this->common->updateData('dot_stories_seen',$data1,array("s_id"=>$last_insert_id));
								// }
							}
						}  }else{
						    //echo "SELECT * FROM dot_stories_seen E JOIN dot_users D ON (E.stories_seen_id = D.user_id) AND E.stories_user_id=$user_id AND E.stories_seen_id=$to_userid";die;
						    //$get_friendsstory = $this->common->query("SELECT * FROM dot_stories_seen E JOIN dot_users D ON (E.stories_seen_id = D.user_id) AND E.stories_user_id=$user_id OR E.stories_seen_id=$to_userid");
						   // $get_friendsstory = $this->common->getRow('*','dot_stories_seen',array('stories_user_id' => $to_userid));
						   //echo "SELECT DISTINCT S.s_id, S.uid_fk,S.created,  U.user_fullname, U.user_name, S.stories_img as pics, Concat('https://you2.co.in/uploads/stories/', S.stories_img) AS story_url ,Concat('https://you2.co.in/uploads/storiesvideo/', stories_video) AS stories_video_url FROM dot_user_stories S, dot_users U WHERE S.uid_fk = '$to_userid' AND S.uid_fk=U.user_id AND U.private_account = '0' AND FROM_UNIXTIME(S.created) > (CURRENT_DATE) AND FROM_UNIXTIME(S.created) < (CURRENT_DATE + INTERVAL 24 HOUR ) ORDER BY S.uid_fk DESC";die;
						    //$array = array_unique($get_friendsstory);
						    //echo "<pre>";print_r($get_friendsstory);die;
						    $count=1;
						    $pageNos = array();
						    foreach($get_friendsstory as $key=>$val){//a_unique($array)
						        $sto=$val['stories_seen_id'];
                                   if(!in_array($sto, $pageNos))
                                   {
                                       //echo $sto ;
                                       array_push($pageNos,$sto);
                                   }
						    //$sto=a_unique($val['stories_seen_id']);
						    //echo "<pre>";print_r($sto);die;
						    	$get_userseenstory = $this->common->query("SELECT dot_stories_seen.*, dot_users.user_id, dot_users.user_name FROM `dot_stories_seen` JOIN dot_users ON dot_users.user_id=dot_stories_seen.stories_seen_id WHERE `stories_id` = ".$val['s_id']." ORDER BY `s_id` DESC");
						        ///$get_friendsstory = $this->common->getRow('*','dot_stories_seen1',array('stories_id' => $val['s_id']));	
						       //echo "<pre>";print_r($get_userseenstory);die;
						        $get_friendsstory[$key]['s_id']=$val['s_id'];
						        $get_friendsstory[$key]['uid_fk']=$val['uid_fk'];
						        $get_friendsstory[$key]['created']=$val['created'];
						        $get_friendsstory[$key]['user_fullname']=$val['user_fullname'];
						        $get_friendsstory[$key]['user_name']=$val['user_name'];
						        $get_friendsstory[$key]['pics']=$val['pics'];
						        $get_friendsstory[$key]['story_url']=$val['story_url'];
						        $get_friendsstory[$key]['stories_video_url']=$val['stories_video_url'];
						        $get_friendsstory[$key]['stories_count']=!empty($get_userseenstory) ? count($get_userseenstory) : 0 ;//$count++;
						        $dummy=array();
						        if(!empty($get_userseenstory)){
						            $count_seen_users=1;
						            foreach($get_userseenstory as $ke=> $value){
						                $dummy[$ke]['s_id']=$value['s_id'];
						                $dummy[$ke]['stories_id']=$value['stories_id'];
						                $dummy[$ke]['stories_seen_id']=$value['stories_seen_id'];
						                $dummy[$ke]['stories_user_id']=$value['stories_user_id'];
						                $dummy[$ke]['visit_checked']=$value['visit_checked'];
						                $dummy[$ke]['time']=$value['time'];
						                $dummy[$ke]['user_id']=$value['user_id'];
						                $dummy[$ke]['user_name']=$value['user_name'];
						                $dummy[$ke]['count_seen_users']=$count_seen_users++;
						            }
						        }
						        $get_friendsstory[$key]['seen_users']=$dummy;
						        
						        
						    }
						} 
						//echo "<pre>";print_r($get_friendsstory);die;
						if($get_friendsstory) {
							$friendsstory_count = count($get_friendsstory);
							$response = array('status'=>true, 'msg'=>'User Story shared successfully', 'count'=>$friendsstory_count, 'result'=> $get_friendsstory);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
						} else {
							$response = array('status'=>false, 'msg'=>'No story found', 'result'=>array());
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'User not found');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Data not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
	}
	function a_unique($array) {
      $array_unique = array();
      foreach ($array as $key => $value) {
        $array_unique["$value"] = true;
      }
      return array_keys($array_unique);
    }
	public function deletestory_post()
	{
        $response = array();
		$user_id = $_POST['user_id'];
		$s_id=$_POST['s_id'];
		//$to_userid = $_POST['to_userid'];
		if($user_id!="" && $s_id!=""){
		    $get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		    if($get_user_detail != '') {
		        $storyget = $this->common->getRow('*','dot_user_stories',array('uid_fk' => $user_id,'s_id'=> $s_id));
		        //$get_user_detail2 = $this->common->getRow('*','dot_stories_seen',array('uid_fk' => $user_id,'s_id'=> $s_id));
		       // $get_postgetsaved = $this->common->getData('dot_user_stories',array('uid_fk' => $user_id,'s_id'=> $s_id));
		        //$get_user_detail1 = $this->common->getData('dot_post_comments ct, dot_user_stories ut',array('uid_fk' => $user_id,'s_id'=> $s_id));
		        //echo "<pre>";print_r($get_user_detail1);die;
		        //$getuserstories = $this->common->getRow('*','dot_stories_seen',array('stories_seen_id' => $user_id,'stories_user_id' => $to_userid,'stories_id' =>$storiesid));	
		        
		        if($storyget!=""){
		            $this->common->deleteData('dot_user_stories',array('s_id'=> $s_id));
		            $response = array('status'=>true, 'msg'=>'Story Deleted successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
		        }else{
		            $response = array('status'=>false, 'msg'=>'Data not found');
    				$rest_data = $response;
    				$this->response($rest_data, REST_Controller::HTTP_OK);
		        }
		      }else{
		        $response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
		    }
		}else{
		    $response = array('status'=>false, 'msg'=>'User id not found');
		    $rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}

	}
	
	public function rmvfromfavpost_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$delete = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_id'] != '') ) {

					$delete = $this->common->deleteData('dot_favourite_list',array('fav_post_id'=>$_POST['post_id'], 'fav_uid_fk' => $user_id));

					if(!empty($delete)) {
						$response = array('status'=>true, 'msg'=>'Post Removed from Favourite list successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);

					} else {
						$response = array('status'=>false, 'msg'=>'Post does not exist');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function likepost_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';
       // $this->sendp();
		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_id'] != '') && ($_POST['post_type'] != '') && ($_POST['post_owner_id'] != '') ) {

					$post_id = $_POST['post_id'];
					$post_type = $_POST['post_type'];

					$data_save_like = $this->common->getRow('COUNT(like_id) as like_count','dot_post_like',array('liked_uid_fk' => $user_id, 'post_id_fk'=> $post_id, 'liked_post_type'=>$post_type));
					
					$check_user_unliked_before = $this->common->getRow('COUNT(unlike_id) as unlike_count','dot_post_unlike',array('unliked_uid_fk' => $user_id, 'post_id_fk'=> $post_id));

					if (($data_save_like->like_count == 0) && ($check_user_unliked_before->unlike_count == 0)) {
						$time = time();
						$data = array(
							'post_id_fk'=>$post_id, 
							'liked_uid_fk' => $user_id, 
							'liked_post_type'=>$post_type, 
							'liked_time'=>$time
						);
                        $get_user_detail1 = $this->common->getRow('*','dot_users',array('user_id' => $_POST['post_owner_id']));
						$data1["title"] =  "Like";
						$data1["body"] =  $get_user_detail1->user_fullname."liked your Post";
						$data1["tag"] =  "Like";
						$data1["id"] = $user_id;
                        // $data["image_url"] = "resources/assets/images";
                        // $data["sound_notification"] = $ride_user_data->sound_notification; 
						$this->notificationpush($data1, $get_user_detail1->remember_token);
						$insert = $this->common->insertData('dot_post_like', $data);
						$last_insert_id = $this->db->insert_id();

						if(!empty($insert)) {

							$owner_id = $_POST['post_owner_id'];

							if ($owner_id !== $user_id && $get_user_detail->post_like_notification == '1') {
								$data1 = array(
									'not_type'=>$post_type, 
									'not_time' => $time, 
									'not_uid_fk'=>$user_id, 
									'not_post_id_fk'=>$post_id,
									'not_read_status'=>0,
									'note_type_type'=>'post_like',
									'not_post_owner_id_fk'=>$owner_id
								);
								$insert1 = $this->common->insertData('dot_notifications', $data1);

								$this->db->set('notification_count', 'notification_count+1', FALSE);
								$this->db->where('user_id', $owner_id);
								$update_cart = $this->db->update('dot_users');
							}

							$new_like_count = $this->common->getRow('COUNT(*) AS postlikecount','dot_post_like',array('post_id_fk'=> $post_id));

							$post_like_count = $new_like_count->postlikecount;

							$response = array('status'=>true, 'msg'=>'Post Liked successfully', 'result'=>$post_like_count);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else if($data_save_like->like_count > 0){
					    $get_user_detail1 = $this->common->getRow('*','dot_users',array('user_id' => $_POST['post_owner_id']));
						$response = array('status'=>false, 'msg'=>'Post already liked');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else if($check_user_unliked_before->unlike_count > 0){
						$response = array('status'=>false, 'msg'=>'Post already disliked');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>'Post does not exist');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function unlikepost_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_id'] != '') && ($_POST['post_type'] != '') && ($_POST['post_owner_id'] != '') ) {

					$post_id = $_POST['post_id'];
					$post_type = $_POST['post_type'];

					$data_save_like = $this->common->getRow('COUNT(like_id) as like_count','dot_post_like',array('liked_uid_fk' => $user_id, 'post_id_fk'=> $post_id, 'liked_post_type'=>$post_type));
                    //echo "<pre>";print_r($data_save_like);die;
					if (($data_save_like->like_count == 1) ) {

						$time = time();
						$where = array(
							'not_post_id_fk'=>$post_id, 
							'not_uid_fk' => $user_id,
						);

						$delete = $this->common->deleteData('dot_notifications', $where);
						$owner_id = $_POST['post_owner_id'];

						$data_notification_count = $this->common->getRow('notification_count, user_id','dot_users',array('user_id'=> $owner_id));

						$owner_notification_count = $data_notification_count->notification_count;

						if ($owner_notification_count > 0) {
							$this->db->set('notification_count', 'notification_count-1', FALSE);
							$this->db->where('user_id', $owner_id);
							$update_cart = $this->db->update('dot_users');
						}

						$where1 = array(
							'post_id_fk'=>$post_id, 
							'liked_uid_fk' => $user_id,
						);

						$delete1 = $this->common->deleteData('dot_post_like', $where1);

						if(!empty($delete1)) {

							$new_like_count = $this->common->getRow('COUNT(*) AS postlikecount','dot_post_like',array('post_id_fk'=> $post_id));

							$post_like_count = $new_like_count->postlikecount;
							
							$get_user_detail1 = $this->common->getRow('*','dot_users',array('user_id' => $_POST['post_owner_id']));
							//echo "<pre>";print_r($get_user_detail1->user_fullname);die;
							$data1["title"] =  "Unliked";
							$data1["body"] =  $get_user_detail1->user_fullname." unliked your post";
							$data1["tag"] =  "Unliked";
							$data1["id"] = $user_id;
                                // $data["image_url"] = "resources/assets/images";
                                // $data["sound_notification"] = $ride_user_data->sound_notification;
                                
                            $this->notificationpush($data1, $get_user_detail1->remember_token);
							//$this->sendPushNotification($data1, $get_user_detail->remember_token);


							$response = array('status'=>true, 'msg'=>'Post Unliked successfully', 'result'=>$post_like_count);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);

						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Post does not exist');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function usercomment_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_id'] != '') && ($_POST['post_type'] != '')) {

					if(!empty($_POST['comment'])){
						$comment=$_POST['comment'].'.png';
					}else{
						$comment='';
					} 


					$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$post_type = $_POST['post_type'];
					$post_id = $_POST['post_id'];
					$userVoice = '';
					
					if(!empty($_POST['stickerimg'])){
						$stickerimg = $_POST['stickerimg'].'.png';
					} else {
						$stickerimg = '';
					}
					if(!empty($_POST['send_gift'])){
						$sendgift = $_POST['send_gift'].'.gif';
					} else {
						$sendgift = '';
					}


					if($_POST['typehashtag'] == 0){
						$hashtag_text = '';
						$comment_text = $_POST['comment_text'];
					} else {
						$hashtag_text = $_POST['comment_text'];
						$comment_text = '';
					}

					$data = array(
						'uid_fk'=>$user_id, 
						'comment_text' => $comment_text,
						'hashtag_text' => $hashtag_text,
						'fastEmojis' => $comment,
						'sticker'=>$stickerimg,
						'gif' =>$sendgift,
						'user_ip'=>$ip, 
						'comment_created_time'=>$time,
						'post_id_fk'=>$post_id,
						'voice'=>$userVoice,
					);
					
					$get_user_detail1 = $this->common->getRow('*','dot_users',array('user_id' => $_POST['post_owner_id']));
						$data12["title"] =  "Post Comments";
						$data12["body"] =  $get_user_detail->user_fullname." comment your Post";
						$data12["tag"] =  "Post Comments";
						$data12["id"] = $user_id;
						$this->notificationpush($data12, $get_user_detail1->remember_token);
    					$insert = $this->common->insertData('dot_post_comments', $data);
    					$last_insert_id = $this->db->insert_id();
					if(!empty($insert)) {
						$owner_id = $_POST['post_owner_id'];
						if ($owner_id !== $user_id && $get_user_detail->post_like_notification == '1') {
							$data1 = array(
								'not_type'=>$post_type, 
								'not_time' => $time, 
								'not_uid_fk'=>$user_id, 
								'not_post_id_fk'=>$post_id,
								'not_read_status'=>0,
								'note_type_type'=>'post_like'
							);
							$insert1 = $this->common->insertData('dot_notifications', $data1);
                            
							$this->db->set('notification_count', 'notification_count+1', FALSE);
							$this->db->where('user_id', $owner_id);
							$update_cart = $this->db->update('dot_users');
						}
						$response = array('status'=>true, 'msg'=>'Comment on Post successfully', 'result'=>$last_insert_id);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function getcommentsbypost_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];
		$all_comments = array();

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_GET['post_id'] != '')) {

					$post_id = $_GET['post_id'];
					$check_post = $this->common->getRow('*','dot_user_posts',array('user_post_id' => $post_id));

					if(!empty($check_post)) {
						$this->db->select('ct.comment_id, ct.uid_fk, ct.post_id_fk, ct.comment_text, ct.user_ip, ct.sticker, ct.gif, ct.comment_created_time,ct.voice, ut.user_name,  ut.user_fullname, ut.verified_user, ut.pro_user_type, ut.style_mode, ut.user_page_lang, ut.user_donate_message, ut.last_login, ut.show_online_offline_status, Concat("https://you2.co.in/uploads/avatar/", ut.user_avatar) as user_avatar_url, DATE(FROM_UNIXTIME(ct.comment_created_time)) AS comment_date, TIME(FROM_UNIXTIME(ct.comment_created_time)) AS comment_time');

						$this->db->where('ct.uid_fk =', '`ut`.`user_id`', false);

						$all_comments = $this->common->getData('dot_post_comments ct, dot_users ut', array('ct.post_id_fk'=> $post_id), array('sort_by'=>'ct.comment_id', 'sort_direction'=> 'ASC'));

		              //  echo $this->db->last_query();

						if(!empty($all_comments)) {

							$response = array('status'=>true, 'msg'=>'All Comments shared successfully', 'result'=>$all_comments);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						} else {
							$response = array('status'=>false, 'msg'=>'No, Comment found');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Post id, not exist');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function usercommentwithsticker_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_id'] != '') && ($_POST['post_type'] != '') && ($_POST['sticker_key'] != '') ) {

					$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$post_type = $_POST['post_type'];
					$post_id = $_POST['post_id'];

					$data = array(
						'uid_fk'=>$user_id, 
						'sticker' => $_POST['sticker_key'],
						'user_ip'=>$ip, 
						'comment_created_time'=>$time,
						'post_id_fk'=>$post_id
					);

					$insert = $this->common->insertData('dot_post_comments', $data);
					$last_insert_id = $this->db->insert_id();

					if(!empty($insert)) {

						$owner_id = $_POST['post_owner_id'];

						if ($owner_id !== $user_id && $get_user_detail->post_like_notification == '1') {
							$data1 = array(
								'not_type'=>$post_type, 
								'not_time' => $time, 
								'not_uid_fk'=>$user_id, 
								'not_post_id_fk'=>$post_id,
								'not_read_status'=>0,
								'note_type_type'=>'post_like'
							);
							$insert1 = $this->common->insertData('dot_notifications', $data1);

							$this->db->set('notification_count', 'notification_count+1', FALSE);
							$this->db->where('user_id', $owner_id);
							$update_cart = $this->db->update('dot_users');

							$response = array('status'=>true, 'msg'=>'Comment on Post by Sticker successfully', 'result'=>$last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function getstickers_get()
	{
		$response = array();

		$this->db->select('*,Concat("https://you2.co.in/uploads/emoticons/F_Sticker/", image) AS sticker_url');
		$get_sticker = $this->common->getData('dot_emoticons',array('emoji_style' => 'sticker'));
		if($get_sticker != '') {
			$response = array('status'=>true, 'msg'=>'Sticker shared successfully', 'result'=>$get_sticker);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'No Sticker found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function coverupload_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$cover_image = $_POST['cover_image'];
		$get_user_stories = '';
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(isset($_POST['user_id']) ) {

					$image1 = base64_decode($this->input->post("cover_image"));
					$image_name = 'cover_'.time();
					$filename = $image_name . '.' . 'png';
					$path0 = realpath(__DIR__ . '/../../../..');
					$path = $path0 . "/uploads/cover/";
					file_put_contents($path . $filename, $image1);

					if(isset($filename)) {
						$insertdata = array(
							'image_path' => $filename,
							'uid_fk' => $user_id,
							'image_type' => 'cover'
						);
						$insert = $this->common->insertData('dot_avatars',$insertdata);
						$last_insert_id = $this->db->insert_id();

						$update_data = array(
							'user_cover' => $filename,
						);
						$update = $this->common->updateData('dot_users',$update_data,array('user_id' => $user_id));

						if((isset($update)) && (isset($update)) ) {
							$response = array('status'=>true, 'msg'=>'Cover updated successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Image not found');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'User not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function getuserprofile_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];
		$get_user_detail = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*,Concat("https://you2.co.in/uploads/cover/", user_cover) AS usercover_url, ','dot_users',array('user_id' => $user_id));

			if($get_user_detail != ''){
				$response = array('status'=>true, 'msg'=>'User info shared successfully', 'result'=>$get_user_detail);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>'User info not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function beforeafterpostsave_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && ($_POST['post_hashtags'] != '') && ($_POST['post_beforeimage'] != '') && ($_POST['post_afterimage'] != '') && ($_POST['type_image'] != '')  ) {

					$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$url_slugies = $this->url_slugies($_POST['post_title']);
					$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
					$post_tags = $this->hashtag($_POST['post_hashtags']);

					if($_POST['type_image']=='new'){
						$image2 = base64_decode($this->input->post("post_afterimage"));
						$new_tym = $time+100;
						$image_name1 = 'bfaf_'.$new_tym;
						$filename1 = $image_name1 . '.' . 'png';
						$path01 = realpath(__DIR__ . '/../../../..');
						$path1 = $path01 . "/uploads/images/";
						file_put_contents($path1 . $filename1, $image2);
					}
					if($_POST['type_image']=='reshare'){


						$filename1 = $_POST['post_afterimage'];
					}


				// 	$image2 = base64_decode($this->input->post("post_afterimage"));
				// 	$new_tym = $time+100;
	   //             $image_name1 = 'bfaf_'.$new_tym;
	   //             $filename1 = $image_name1 . '.' . 'png';
	   //             $path01 = realpath(__DIR__ . '/../../../..');
	   //             $path1 = $path01 . "/uploads/images/";
	   //             file_put_contents($path1 . $filename1, $image2);

					if($_POST['type_image']=='new'){
						$image1 = base64_decode($this->input->post("post_beforeimage"));
						$image_name = 'bfaf_'.time();
						$filename = $image_name . '.' . 'png';
						$path0 = realpath(__DIR__ . '/../../../..');
						$path = $path0 . "/uploads/images/";
						file_put_contents($path . $filename, $image1);
					}
					if($_POST['type_image']=='reshare'){


						$filename = $_POST['post_beforeimage'];
					}


					$insertdata1 = array(
						'user_id_fk' => $user_id,
						'uploaded_image' => 'p_image',
						'uploaded_image' => $filename,
						'type_image' => $_POST['type_image'],
						'uploaded_time' => $time,
						'user_ip' =>$ip,
					);
					$insert1 = $this->common->insertData('dot_user_upload_images',$insertdata1);
					$post_image_id = $this->db->insert_id();

					$insertdata2 = array(
						'user_id_fk' => $user_id,
						'uploaded_image' => 'p_image',
						'uploaded_image' => $filename1,
						'type_image' => $_POST['type_image'],
						'uploaded_time' => $time,
						'user_ip' =>$ip,
					);
					$insert2 = $this->common->insertData('dot_user_upload_images',$insertdata2);
					$post_image_id2 = $this->db->insert_id();


					if(!empty($post_image_id) && !empty($post_image_id2)) {
						$insertdata = array(
							'user_id_fk' => $user_id,
							'post_type' => 'p_bfaf',
							'post_created_time' => $time,
							'user_ip' => $ip,
							'hashtag_normal' => $_POST['post_hashtags'],
							'hashtag_diez' => $post_tags,
							'post_title_text' => $_POST['post_title'],
							'post_text_details' => $_POST['post_details'],
							'who_can_see_post' => $_POST['can_see'],
							'before_after_images' => $filename.','.$filename1,
							'slug' => $slug,
							'post_page_type' => 'wall',
							'user_feeling' => $_POST['feeling'],
							'post_country_code' => $_POST['country_code'],
						);
						
						$insert = $this->common->insertData('dot_user_posts',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if((isset($insert)) ) {
							$response = array('status'=>true, 'msg'=>'Before After Post saved successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Images not uploaded');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function getallwatermarks_get()
	{
		$response = array();

		$this->db->select('*,Concat("https://you2.co.in/uploads/watermarkbg/", watermark_image) AS watermark_image_url');
		$get_sticker = $this->common->getData('dot_watermarks',array());
		if($get_sticker != '') {
			$response = array('status'=>true, 'msg'=>'Watermark shared successfully', 'result'=>$get_sticker);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'No Watermark found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function watermarkpostsave_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(($_POST['post_details'] != '') && ($_POST['watermark_id'] != '') && ($_POST['post_hashtags'] != '') ) {

					$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$url_slugies = $this->url_slugies($_POST['post_details']);
					$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
					$post_tags = $this->hashtag($_POST['post_hashtags']);

					$post_image_id = $this->db->insert_id();

					$insertdata = array(
						'user_id_fk' => $user_id,
						'post_type' => 'p_watermark',
						'post_created_time' => $time,
						'user_ip' => $ip,
						'hashtag_normal' => $_POST['post_hashtags'],
						'hashtag_diez' => $post_tags,
						'post_text_details' => $_POST['post_details'],
						'who_can_see_post' => $_POST['can_see'],
						'watermarkid' => $_POST['watermark_id'],
						'slug' => $slug,
						'post_page_type' => 'wall',
						'user_feeling' => $_POST['feeling'],
						'post_country_code' => $_POST['country_code'],
					);
					
					$insert = $this->common->insertData('dot_user_posts',$insertdata);
					$last_insert_id = $this->db->insert_id();

					if((isset($insert)) ) {
						$response = array('status'=>true, 'msg'=>'Watermark Post saved successfully', 'result'=> $last_insert_id);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function sendnewconversationmessage_post()
    	{
    		$response = array();
    		$user_from = $_POST['user_from'];
    		$insert = '';
    
    		if($user_from !='') {
    			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_from));
    			if($get_user_detail != '') {
    				if(($_POST['user_to'] != '') && ($_POST['to_user_name'] != '')) {
    
    
    					if(!empty($_POST['message'])){
    						$message = $_POST['message'];
							
    
    					}else{
    						$message='';
    					}
    					if(!empty($_POST['weblink'])){
    						$weblink = $_POST['weblink'];
    
    					}else{
    						$weblink='';
    					}
    					$user_to = $_POST['user_to'];
    					$to_user_name = $_POST['to_user_name'];
						$destructor = $_POST['destructor'];
						$timer = $_POST['timer'];

    					$time = time();
    					$ip = $_SERVER['REMOTE_ADDR']; // user ip
    
    					if((isset($_FILES['chat_files']))){
    						$upload_files = $this->common->do_upload('chat_files','./uploads/audio');
    
    						if (isset($upload_files['upload_data'])) {
    							$chat_file_name = $upload_files['upload_data']['file_name'];
    							$chat_file = $chat_file_name;
    						} else {
    							$response = array('status'=>false, 'msg'=>'Chat File not uploaded, try again');
    							$rest_data = $response;
    							$this->response($rest_data, REST_Controller::HTTP_OK);
    							die();
    						}
    					} else {
    						$chat_file = '';
    					}
    
    					if((isset($_FILES['chatvideo']))){
    
    
    
    						$upload_video = $this->common->do_upload('chatvideo','./uploads/video');
    
    						if (isset($upload_video['upload_data'])) {
    							$chat_video_name = $upload_video['upload_data']['file_name'];
    							$chatvideo = $chat_video_name;
    						} else {
    							$response = array('status'=>false, 'msg'=>'Chat Video not uploaded, try again');
    							$rest_data = $response;
    							$this->response($rest_data, REST_Controller::HTTP_OK);
    							die();
    						}
    					} else {
    						$chatvideo = '';
    					}
    
    					if(!empty($_POST['chat_image'])){  
    						if(isset($_POST['chat_image'])) {
    						    
    							$image1 = base64_decode($this->input->post("chat_image"));
    							
    	               // $image_name = md5(uniqid(rand(), true));
    							$image_name = 'image_'.time();
    							$chatimage1 = $image_name . '.' . 'png';
    							$path0 = realpath(__DIR__ . '/../../../..');
    							$path = $path0 . "/uploads/images/";
    							
    							file_put_contents($path . $chatimage1, $image1);
    				           
    						} 
    
    					}else {
    						$chatimage1 = '';
    					}
    				// 	print_r($chatimage1);die;
    					$data1 = array(
    						'from_user_id'=>$user_from,
    						'to_user_id' => $user_to,
    						'message_text'=>$message,
    						'message_created_time'=>$time,
    						'user_ip'=>$ip,
    						'message_type'=>'c_text',
    				// 			'imageid'=>$chatimage1,
    						'imagechat'=>$chatimage1,
    						'videoid'=>$chatvideo,
    						'file_name'=>$chat_file,
    						'weblink'=>$weblink,
							'destructor'=>$destructor,
							'timer'=>$timer
    					);
                        
    					$insert1 = $this->common->insertData('dot_chat', $data1);
    					$last_insert_id = $this->db->insert_id();
    
    					$this->db->set('notification_message_count', 'notification_message_count+1', FALSE);
    					$this->db->where('user_id', $user_to);
    					$update_notify = $this->db->update('dot_users');
    
    					if (($update_notify) && ($insert1)) {
                            
    						$response = array('status'=>true, 'msg'=>'Chat message send successfully', 'result'=>$last_insert_id,'destructor'=>$destructor,'timer'=>$timer);
    						$rest_data = $response;
    						$this->response($rest_data, REST_Controller::HTTP_OK);
    					} else {
    						$response = array('status'=>false, 'msg'=>'Chat message not send');
    						$rest_data = $response;
    						$this->response($rest_data, REST_Controller::HTTP_OK);
    					}
    				} else {
    					$response = array('status'=>false, 'msg'=>'Enter All the details');
    					$rest_data = $response;
    					$this->response($rest_data, REST_Controller::HTTP_OK);
    				}
    			} else {
    				$response = array('status'=>false, 'msg'=>'Data not found');
    				$rest_data = $response;
    				$this->response($rest_data, REST_Controller::HTTP_OK);
    			}
    		} else {
    			$response = array('status'=>false, 'msg'=>'User id not found');
    			$rest_data = $response;
    			$this->response($rest_data, REST_Controller::HTTP_OK);
    		}
    	}
	
	public function userschatlist_get()
	{

		$response = array();
		$user_id = $_GET['user_id'];
		$insert = '';

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
// 			print_r($get_user_detail); die;
			if($get_user_detail != '') {

				$user_chats = $this->common->query("SELECT U.user_name, U.user_fullname, U.user_id,U.last_login,U.verified_user,U.pro_user_type,U.device_id, Concat('https://you2.co.in/uploads/avatar/', U.user_avatar) as user_avatar_url FROM dot_users U JOIN ( SELECT DISTINCT from_user_id chat FROM dot_chat WHERE to_user_id = '$user_id' UNION SELECT to_user_id FROM dot_chat WHERE from_user_id = '$user_id') b ON b.chat = U.user_id");
				// 	print_r($user_chats); die;
				foreach ($user_chats as $key => $value) {
					$to_user = $value['user_id'];
					$last_msg = $this->common->query("SELECT DISTINCT C.to_user_id,C.from_user_id,C.msg_id,C.message_created_time,C.message_text, C.imageid,C.videoid,C.file, C.file_extension,C.file_name, C.dest,C.q_question_id,C.q_product_id, C.secret_checked,C.seen, U.user_name, U.user_fullname FROM dot_chat C, dot_users U WHERE C.from_user_id=$to_user AND C.to_user_id = '$user_id' OR  C.from_user_id='$user_id' AND C.to_user_id = $to_user ORDER BY C.msg_id DESC LIMIT 1");


					$message_created_time = $last_msg[0]['message_created_time'];
					$last_msg[0]['message_created_time']=  $this->post_time_ago($message_created_time);
                    $user_chats[$key]['rember_token'] =$get_user_detail->remember_token;



					$user_chats[$key]['last_msg'] = $last_msg;

					
					
					
					foreach ($last_msg as $key => $value) {	
						if($value['message_created_time']){
							$message_created_time = $value['message_created_time'];
							$last_msg[$key]['post_time_ago'] = $this->post_time_ago($message_created_time);




						}
					}
				}
				
				// print_r($last_msg);die;
				// $user_chats[$key]['remember_token'] = $get_user_detail->remember_token;
				$response = array('status'=>true, 'msg'=>'Chat list send successfully', 'result'=>$user_chats);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
				
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function userchatmessages_get()
	{
	   //echo "SDsds";die;
		$response = array();
		$user_from = $_GET['user_from'];
		$user_to = $_GET['user_to'];
		


		if($user_from !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_from));
			
				// $this->db->select('*');
				// $this->db->from('dot_chat');
				// $this->db->where('from_user_id',$user_from);
				// $get_send_messages = $this->db->where('to_user_id',$user_to)->get()->result_array();
				
				// $this->db->select('*');
				// $this->db->from('dot_chat');
				// $this->db->where('from_user_id',$user_to);
				// $get_send_messagess = $this->db->where('to_user_id',$user_from)->get()->result_array();
				

			if($get_user_detail != '') {

				$all_chat = $this->common->query("SELECT * FROM (
					SELECT C.msg_id, C.from_user_id, C.to_user_id, C.message_created_time, C.message_text, C.imageid,C.imagechat,C.videoid,C.file, C.file_extension,C.file_name, C.dest,C.weblink,C.destructor,C.timer, C.secret_checked,C.q_question_id,C.q_product_id, U.user_name, U.user_fullname
					FROM  dot_users U  JOIN dot_chat C  ON U.user_id = C.from_user_id
					WHERE  (C.from_user_id = '$user_from'  AND C.to_user_id = '$user_to')  OR  (C.from_user_id = '$user_to'  AND C.to_user_id = '$user_from') 
					ORDER  BY C.msg_id DESC) t ORDER BY msg_id ASC" );
					
                
					foreach ($all_chat as $key1 => $value1){
					    
					    
					    if($value1['from_user_id'] == $_GET['user_from']){
					            
					            $value1['sender_msg'] = $value1['message_text'];
					            $value1['reciever_msg'] = '';
					        
					    }else {
					        
					            $value1['sender_msg'] = '';
					            $value1['reciever_msg'] = $value1['message_text'];
					        
					        
					    }
					    if($value1['imagechat'])
						{
    					    if($value1['from_user_id'] == $_GET['user_from'])
    					    {
    					            
    					            $value1['sender_image'] = $this->base_url . "uploads/images/" . $value1['imagechat'];
    					            $value1['reciever_image'] = '';
    					        
    					    }
    					    else
    					    {
    					        
    					            $value1['sender_image'] = '';
    					            $value1['reciever_image'] = $this->base_url . "uploads/images/" .$value1['imagechat'];
    					        
    					        
    					    }
						}else{
						            $value1['sender_image'] = '';
    					            $value1['reciever_image'] ='';
						}
					    if($value1['videoid'])
						{
					    
    					    if($value1['from_user_id'] == $_GET['user_from'])
    					    {
    					            
    					            $value1['sender_video'] = $this->base_url . "uploads/video/" . $value1['videoid'];
    					            $value1['reciever_video'] = '';
    					        
    					    }
    					    else
    					    {
    					        
    					            $value1['sender_video'] = '';
    					            $value1['reciever_video'] = $this->base_url . "uploads/video/" .$value1['videoid'];
    					        
    					        
    					    }
						} else{
						             $value1['sender_video'] = '';
    					            $value1['reciever_video'] = '';
						}
					    
					    $all_chats[] = $value1;
					    
					} 
					

					
				
				if($all_chats)
				{		
					foreach ($all_chats as $key => $value) 
					{

                        
				        // add image url
						if($value['imagechat']){

							$image_chat = $value['imagechat'];
							$all_chats[$key]['imagechat'] = $this->base_url . "uploads/images/" . $image_chat;
						} else {
							$all_chats[$key]['imagechat'] = "";
						}
		           	// add video url
				// 		if($value['videoid'])
				// 		{

				// 			$video_chat = $value['videoid'];
				// 			$all_chats[$key]['video_chat'] = $this->base_url . "uploads/video/" . $video_chat;
				// 		} else {
				// 			$all_chats[$key]['video_chat'] = "";
				// 		}
						
			

					}
				// 	foreach($get_send_messages as $key =>$get_send_msg)
				// 	{
				// 	    $all_chats[$key]['send_msg'] = $get_send_msg['message_text'];
				// 	}
					
				// 	foreach($get_send_messagess as $key=>$get_send_messagesss)
				// 	{
				// 	    $all_chats[$key]['receive_message'] = $get_send_messagesss['message_text'];
				// 	}
				
				}else{
					$all_chats="";
				}
				
				// foreach($all_chats as $key=> $values)
				// {
				//     unset($values["message_text"]);
				//     $all_chats=$values;
				
				//     // print_r($values); 
				// }
				//  die;

		 
				$result = $response;
				if($all_chats != '') {
					$response = array('status'=>true, 'msg'=>'User all message shared successfully', 'result'=>$all_chats);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'No Conversations found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function deletechatmessage_post()
	{
			$response = array();
			$msg_id = $_POST['msg_id'];
			$from_user_id = $_POST['from_user_id'];
			$to_user_id = $_POST['to_user_id'];

			if($msg_id !='') {
				$get_msg_detail = $this->common->getRow('*','dot_chat',array('from_user_id' => $from_user_id,'to_user_id' => $to_user_id));
				if($get_msg_detail != '') {
						$is_postdelete = $this->common->deleteData('dot_chat',array('from_user_id' => $from_user_id,'msg_id' => $msg_id,'to_user_id' => $to_user_id));

						$response = array('status'=>true, 'msg'=>'Msg Delete successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);					
				} else {
					$response = array('status'=>false, 'msg'=>'Msg Details missing ');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Msg doesnot exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
	}


	public function userfollow_post()
	{
		$response = array();
		$user_from = $_POST['user_from'];
		$user_to = $_POST['user_to'];

		if($user_from !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_from));
			$user_to_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_to));
			if($get_user_detail != '') {
				if(($_POST['user_to'] != '') ) {

					$time = time();
					// $ip = $_SERVER['REMOTE_ADDR']; // user ip

					$is_follower = $this->common->getRow('count(friend_id) as count_row','dot_friends',array('user_one' => $user_from,'user_two'=>$user_to));
					if($is_follower){
						if($is_follower->count_row == 0){
							$data1 = array(
								'user_one'=>$user_from,
								'user_two' => $user_to,
								'role'=>'flwr',
								'created_time'=>$time,
							);
							$data12=array();
							$data12["title"] =  "follow";
							$data12["body"] =  $get_user_detail->user_fullname." your Post follow";
							$data12["tag"] =  "follow";
							//$data12["id"] = $user_id->liked_uid_fk;
                                // $data["image_url"] = "resources/assets/images";
                                // $data["sound_notification"] = $ride_user_data->sound_notification;
							$this->sendPushNotification($data12, $user_to_detail->remember_token);
							$insert1 = $this->common->insertData('dot_friends', $data1);
						}
						$last_insert_id = $this->db->insert_id();

						$this->db->set('notification_count', 'notification_count+1', FALSE);
						$this->db->where('user_id', $user_to);
						$update_notify = $this->db->update('dot_users');

						if ($user_to_detail->post_like_notification == '1') {
							$data1 = array(
								'not_type'=>'u_following', 
								'not_time' => $time, 
								'not_uid_fk'=>$user_from,
								'not_read_status'=>'0',
								'note_type_type'=>'profile_following',
								'not_post_owner_id_fk'=>$user_to
							);
							$insert2 = $this->common->insertData('dot_notifications', $data1);

							$this->db->set('notification_count', 'notification_count+1', FALSE);
							$this->db->where('user_id', $user_to);
							$update_cart = $this->db->update('dot_users');
						}

						if (($update_notify) && ($insert1)) {
                            $this->notificationpush($data12, $user_to_detail->remember_token);
							$response = array('status'=>true, 'msg'=>'User Followed successfully', 'result'=>$last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Already follows');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function userunfollow_post()
	{
		$response = array();
		$user_from = $_POST['user_from'];
		$user_to = $_POST['user_to'];

		if($user_from !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_from));
			if($get_user_detail != '') {
				if(($_POST['user_to'] != '') ) {

					$time = time();
					// $ip = $_SERVER['REMOTE_ADDR']; // user ip

					$is_follower = $this->common->getRow('count(friend_id) as count_row','dot_friends',array('user_one' => $user_from,'user_two'=>$user_to));
					if($is_follower->count_row != 0){
						$data1 = array(
							'user_one'=>$user_from,
							'user_two' => $user_to
						);
						$insert1 = $this->common->deleteData('dot_friends', $data1);
						$last_insert_id = $this->db->insert_id();
						$user_to_detail = $this->common->getRow('*','dot_users',array('user_id' =>$_POST['user_to']));
						$data12=array();
						$data12["title"] =  "Unfollow";
						$data12["body"] =  $user_to_detail->user_fullname." unfollow";
						$data12["tag"] =  "Unfollow";
						$data12["id"] = $user_to;//$user_id->liked_uid_fk;
						
                        $this->notificationpush($data12, $get_user_detail->remember_token);
						$where = array(
							'not_post_owner_id_fk'=>$user_to, 
							'not_uid_fk' => $user_from,
						);

						$delete = $this->common->deleteData('dot_notifications', $where);

						$is_notify = $this->common->getRow('notification_count, user_id','dot_users',array('user_id'=>$user_to));

						$to_user_notification_count = $is_notify->notification_count;
						if($to_user_notification_count > 0){
							$this->db->set('notification_count', 'notification_count-1', FALSE);
							$this->db->where('user_id', $user_to);
							$update_notify = $this->db->update('dot_users');
						} else {
							$update_notify = true;
						}

						if (($update_notify) && ($insert1)) {

							$response = array('status'=>true, 'msg'=>'User UnFollowed successfully');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Not follows');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function suggestusers_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {

				$suggested_user = $this->common->query("SELECT ut.user_id,ut.private_account,ut.user_name,ut.user_fullname, ut.verified_user, ut.user_avatar FROM dot_users ut WHERE ut.user_status = '1' AND ut.user_id NOT IN (SELECT ft.user_two FROM dot_friends ft WHERE ft.user_one = '$user_id' OR ft.user_two = '$user_id') ORDER BY rand() LIMIT 5");
				
				foreach ($suggested_user as $key => $value) {
					if($value['user_avatar']){
						$user_avatar = $value['user_avatar'];
						$suggested_user[$key]['user_avatar_url'] = "https://you2.co.in/uploads/avatar/" . $user_avatar;
					} else {
						$suggested_user[$key]['user_avatar_url'] = "https://you2.co.in/uploads/avatar/avatar_female.png";
					}
					
					if($value['user_id']){

						$suggest_users = $value['user_id'];
						$follower_count = $this->common->getRow('COUNT(user_two) as followers_count', 'dot_friends', array('user_two'=>$suggest_users, 'role'=>'flwr'));

						if($follower_count != ''){
							$suggested_user[$key]['follower_count'] = $follower_count->followers_count;
						} else {
							$suggested_user[$key]['follower_count'] = "0";
						}
					}
					
					if($value['user_id']){
						$suggest_status = $value['user_id'];
						if($suggest_status != ''){
							$suggested_user[$key]['suggest_status'] = "0";
						} else {
							$suggested_user[$key]['suggest_status'] = "0";
						}
					}
				}

				if($suggested_user != ''){
					$response = array('status'=>true, 'msg'=>'User suggestion list shared successfully', 'result'=> $suggested_user);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'Suggestion users not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function followerlist_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
			    //SELECT * FROM `dot_friends` WHERE user_two=2 AND role='flwr'
				//$followerlist = $this->common->query('*','dot_friends ft',array('ft.user_two'=>$user_id, 'ft.role'=>'flwr'),array('sort_by'=>'ft.friend_id','sort_direction'=>'DESC'));
				$followerlist = $this->common->query("SELECT * FROM `dot_friends` WHERE user_two=$user_id AND role='flwr'");
				if($followerlist != ''){
					foreach ($followerlist as $key => $value) {
					   // echo "<pre>";print_r($value)
						if($value['user_one']){
							$friend_id = $value['user_one'];

							$follower_count = $this->common->getRow('COUNT(user_two) as followers_count', 'dot_friends', array('user_two'=>$friend_id, 'role'=>'flwr'));

							if($follower_count != ''){
								$followerlist[$key]['follower_count'] = $follower_count->followers_count;
							} else {
								$followerlist[$key]['follower_count'] = "0";
							}
						}


						if($value['user_one']){
							$friend_id = $value['user_one'];

							$followingcount = $this->common->getRow('COUNT(user_one) as followers_count', 'dot_friends', array('user_one'=>$friend_id, 'role'=>'flwr'));

							if($followingcount != ''){
								$followerlist[$key]['following_count'] = $followingcount->followers_count;
							} else {
								$followerlist[$key]['following_count'] = "0";
							}
						}

						if($value['user_avatar']){
							$user_avatar = $value['user_avatar'];
							$followerlist[$key]['avatar_image_url'] = "https://you2.co.in/uploads/avatar/" . $user_avatar;
						} else {
							$followerlist[$key]['avatar_image_url'] = "https://you2.co.in/uploads/avatar/avatar_female.png";
						}

						if($value['user_one']){
							$friend_id = $value['user_one'];
							$post_count = $this->common->getRow('COUNT(user_post_id) as post_count', 'dot_user_posts', array('user_id_fk'=>$friend_id));

							if($follower_count != ''){
								$followerlist[$key]['post_count'] = $post_count->post_count;
							} else {
								$followerlist[$key]['post_count'] = "0";
							}
						}
					}
				}

				if($followerlist != ''){
					$response = array('status'=>true, 'msg'=>'Follower list shared successfully', 'result'=> $followerlist);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else{
					$response = array('status'=>false, 'msg'=>'No followers found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function post_time_ago($time) {
		$time_difference = time() - $time;

		if( $time_difference < 1 ) { return 'less than 1 second ago'; }
		$condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
			30 * 24 * 60 * 60       =>  'month',
			24 * 60 * 60            =>  'day',
			60 * 60                 =>  'hour',
			60                      =>  'minute',
			1                       =>  'second'
		);

		foreach( $condition as $secs => $str )
		{
			$d = $time_difference / $secs;

			if( $d >= 1 )
			{
				$t = round( $d );
				return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
			}
		}
	}
	
// 	public function userstoryseen_post()
// 	{
// 	}

		public function userpostdelete_post()
		{
			$response = array();
			$user_id = $_POST['user_id'];
			$post_id = $_POST['post_id'];

			if($user_id !='') {
				$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
				if($get_user_detail != '') {
					if(isset($_POST['user_id']) ) {

						$check_owner = $this->common->getRow('*','dot_user_posts',array('user_post_id'=>$post_id, 'user_id_fk'=>$user_id));
						if($check_owner){
							$is_postdelete = $this->common->deleteData('dot_user_posts',array('user_post_id'=>$post_id, 'user_id_fk'=>$user_id));

							if($is_postdelete) {
								$is_commentdelete = $this->common->deleteData('dot_post_comments',array('post_id_fk'=>$post_id));
								$is_likedelete = $this->common->deleteData('dot_post_like',array('post_id_fk'=>$post_id));

								$response = array('status'=>true, 'msg'=>'Post Delete successfully');
								$rest_data = $response;
								$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
							} else {
								$response = array('status'=>false, 'msg'=>'Post Not Deleted');
								$rest_data = $response;
								$this->response($rest_data, REST_Controller::HTTP_OK);
							}
						} else {
							$response = array('status'=>false, 'msg'=>'You are not Owner');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'User not found');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Data not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		}

		public function usersearch_post()
		{
			$response = array();
			$user_id = $_POST['user_id'];
			$search_keyword = $_POST['search_keyword'];

			if($user_id !='') {
				$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
				if($get_user_detail != '') {
					if(isset($_POST['search_keyword']) ) {

						$search_keyword = $_POST['search_keyword'];
						$this->db->or_like('user_name', $search_keyword, 'BOTH');
						$this->db->or_like('user_fullname', $search_keyword, 'BOTH');
						$this->db->or_like('user_email', $search_keyword, 'BOTH');
						$search_result = $this->common->getData('dot_users',array());

						foreach ($search_result as $key => $value) {
							if($value['user_avatar']){
								$user_avatar = $value['user_avatar'];

								$search_result[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
							} else {
								$search_result[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
							}
						}

						if($search_result != ''){
							$response = array('status'=>true, 'msg'=>'Search data found', 'result'=>$search_result);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						} else {
							$response = array('status'=>false, 'msg'=>'No Records found');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'User not found');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Data not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		}

		public function usercommentdisableenable_post()
		{
			$response = array();
			$user_id = $_POST['user_id'];
			$post_id = $_POST['post_id'];
			$status = $_POST['status'];

			if($user_id !='') {
				$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
				if($get_user_detail != '') {
					if(isset($_POST['user_id']) ) {

						$check_owner = $this->common->getRow('*','dot_user_posts',array('user_post_id'=>$post_id, 'user_id_fk'=>$user_id));
						if($check_owner){
							$status_change = $this->common->updateData('dot_user_posts',array('comment_status'=>$status),array('user_post_id'=>$post_id, 'user_id_fk'=>$user_id));

							if($status_change) {
								$response = array('status'=>true, 'msg'=>'Status changed successfully');
								$rest_data = $response;
								$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
							} else {
								$response = array('status'=>false, 'msg'=>'Something went wrong');
								$rest_data = $response;
								$this->response($rest_data, REST_Controller::HTTP_OK);
							}
						} else {
							$response = array('status'=>false, 'msg'=>'You are not Owner');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'User not found');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Data not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		}

		public function followinglist_get()
		{
			$response = array();
			@$user_id = $_GET['user_id'];

			if($user_id !='') {
				$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
				if($get_user_detail != '') {

					$this->db->select('ft.friend_id,ft.user_one,ft.user_two,ut.user_id,ut.user_name,ut.user_fullname, ut.user_avatar');
					$this->db->where('`ft`.`user_two`', '`ut`.`user_id`', FALSE );
					$followinglist = $this->common->getData('dot_users ut, dot_friends ft',array('ft.user_one'=>$user_id, 'ft.role'=>'flwr'),array('sort_by'=>'ft.friend_id','sort_direction'=>'DESC'));

				/*echo $this->db->last_query();
				die();*/

				if($followinglist != ''){

					foreach ($followinglist as $key => $value) {
						if($value['user_one']){
							$friend_id = $value['user_one'];

							$follower_count = $this->common->getRow('COUNT(user_two) as followers_count', 'dot_friends', array('user_two'=>$friend_id, 'role'=>'flwr'));

							if($follower_count != ''){
								$followinglist[$key]['follower_count'] = $follower_count->followers_count;
							} else {
								$followinglist[$key]['follower_count'] = "0";
							}
						}

						if($value['user_two']){
							$friend_id = $value['user_two'];
							
							$followingcount = $this->common->getRow('COUNT(user_two) as followers_count', 'dot_friends', array('user_one'=>$friend_id, 'role'=>'flwr'));

							if($followingcount != ''){
								$followinglist[$key]['following_count'] = $followingcount->followers_count;
							} else {
								$followinglist[$key]['following_count'] = "0";
							}
						}
						
						if($value['user_avatar']){						$user_avatar = $value['user_avatar'];				$followinglist[$key]['avatar_image_url'] = "https://you2.co.in/uploads/avatar/" . $user_avatar;
					} else {				        $followinglist[$key]['avatar_image_url'] = "https://you2.co.in/uploads/avatar/avatar_female.png";
				}

				if($value['user_one']){
					$friend_id = $value['user_one'];
					$post_count = $this->common->getRow('COUNT(user_post_id) as post_count', 'dot_user_posts', array('user_id_fk'=>$friend_id));

					if($follower_count != ''){
						$followinglist[$key]['post_count'] = $post_count->post_count;
					} else {
						$followinglist[$key]['post_count'] = "0";
					}
				}
			}

			$response = array('status'=>true, 'msg'=>'Following list shared successfully', 'result'=> $followinglist);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else{
			$response = array('status'=>false, 'msg'=>'No Following found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'Data not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
} else {
	$response = array('status'=>false, 'msg'=>'User id not found');
	$rest_data = $response;
	$this->response($rest_data, REST_Controller::HTTP_OK);
}
}

public function notificationlist_get()
{
	$response = array();
	@$user_id = $_GET['user_id'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {

			$this->db->select('nt.not_id, nt.not_type, nt.note_type_type, nt.not_time, nt.not_uid_fk,  nt.not_post_id_fk, nt.not_post_owner_id_fk , nt.not_read_status , ut.user_name, ut.user_fullname, ut.user_avatar');

			$this->db->where('`nt`.`not_uid_fk`', '`ut`.`user_id`', FALSE );
			$this->db->where('nt.not_type', 'u_send_friend_request', TRUE );
			$friendrqstnotificationlist = $this->common->getData('dot_users ut, dot_notifications nt',array('nt.not_post_owner_id_fk'=>$user_id),array('sort_by'=>'nt.not_id','sort_direction'=>'DESC', 'limit'=>20));

				// echo $this->db->last_query();

			if($friendrqstnotificationlist !=''){
				foreach ($friendrqstnotificationlist as $key => $value) {
					if($value['user_avatar']){
						$user_avatar = $value['user_avatar'];

						$friendrqstnotificationlist[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
					} else {
						$friendrqstnotificationlist[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
					}

						// post time ago
					if($value['not_time']){
						$not_time = $value['not_time'];
						$friendrqstnotificationlist[$key]['notify_time_ago'] = $this->post_time_ago($not_time);
					}
				}
			} else {
				$friendrqstnotificationlist = [];
			}

			$this->db->select('nt.not_id, nt.not_type, nt.note_type_type, nt.not_time, nt.not_uid_fk,  nt.not_post_id_fk, nt.not_post_owner_id_fk , nt.not_read_status , ut.user_name, ut.user_fullname, ut.user_avatar');

			$this->db->where('`nt`.`not_uid_fk`', '`ut`.`user_id`', FALSE );
			$this->db->where('nt.not_type !=', 'u_send_friend_request', TRUE );
			$notificationlist = $this->common->getData('dot_users ut, dot_notifications nt',array('nt.not_post_owner_id_fk'=>$user_id),array('sort_by'=>'nt.not_id','sort_direction'=>'DESC', 'limit'=>20));

				// echo $this->db->last_query();
			if($notificationlist != ''){

				foreach ($notificationlist as $key => $value) {
					if($value['user_avatar']){
						$user_avatar = $value['user_avatar'];

						$notificationlist[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
					} else {
						$notificationlist[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
					}

    					// post time ago
					if($value['not_time']){
						$not_time = $value['not_time'];
						$notificationlist[$key]['notify_time_ago'] = $this->post_time_ago($not_time);
					}
				}
			} else {
				$notificationlist = [];
			}

			if($notificationlist != '' || $friendrqstnotificationlist !=''){

				foreach ($notificationlist as $key => $value) {
					if($value['user_avatar']){
						$user_avatar = $value['user_avatar'];

						$notificationlist[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
					} else {
						$notificationlist[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
					}

    					// post time ago
					if($value['not_time']){
						$not_time = $value['not_time'];
						$notificationlist[$key]['notify_time_ago'] = $this->post_time_ago($not_time);
					}
				}

				$is_notify = $this->common->getRow('COUNT(not_id) as notification_count', 'dot_notifications', array('not_post_owner_id_fk'=>$user_id,'not_read_status'=>''));

				$user_notification_count = $is_notify->notification_count;
				$response = array('status'=>true, 'msg'=>'Notification list shared successfully','friend_rqst_notification'=>$friendrqstnotificationlist, 'result'=> $notificationlist,'user_notification_count'=>$user_notification_count);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else{
				$response = array('status'=>false, 'msg'=>'No Notification found', 'result'=>array());
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function trendingtags_get()
{
	$response = array();
	$user_id = $_GET['user_id'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {

			$this->db->select('hashtag_normal');
			$this->db->where('FROM_UNIXTIME(post_created_time) >', 'CURRENT_DATE', FALSE );
			$this->db->where('FROM_UNIXTIME(post_created_time) <', 'CURRENT_DATE + INTERVAL 1 WEEK', FALSE);
			$this->db->order_by('user_post_id', 'asc');
			$this->db->limit(5);

			$trendingtags = $this->common->getData('dot_user_posts',array());

				// $out = array();
    //             foreach ($trending_tags as $key => $value){
    //                 foreach ($value as $key2 => $value2){
    //                     $index = $value2;
    //                     if (array_key_exists($index, $out)){
    //                         $out[$index]++;
    //                     } else {
    //                         $out[$index] = 1;
    //                     }
    //                 }
    //             }

                // $trendingtags =array($out);

			if($trendingtags != ''){
				$response = array('status'=>true, 'msg'=>'Trending Tags shared successfully', 'result'=> $trendingtags);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else{
				$response = array('status'=>false, 'msg'=>'No Trending Tags found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function postdeletecomment_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$post_id = $_POST['post_id'];
	$post_owner_id = $_POST['post_owner_id'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(isset($_POST['user_id']) ) {

				$check_owner = $this->common->getRow('*','dot_post_comments',array('post_id_fk'=>$post_id, 'uid_fk'=>$user_id));

				if($check_owner){
					$is_commentdelete = $this->common->deleteData('dot_post_comments',array('post_id_fk'=>$post_id));

					if($is_commentdelete) {

						$is_notifydelete = $this->common->deleteData('dot_notifications',array('not_uid_fk'=>$user_id, 'not_post_id_fk'=>$post_id));

						$is_notify = $this->common->getRow('notification_count, user_id','dot_users',array('user_id'=>$post_owner_id));

						$to_user_notification_count = $is_notify->notification_count;
						if($to_user_notification_count > 0){
							$this->db->set('notification_count', 'notification_count-1', FALSE);
							$this->db->where('user_id', $post_owner_id);
							$update_notify = $this->db->update('dot_users');
						} else {
							$update_notify = true;
						}

						$response = array('status'=>true, 'msg'=>'Post Delete successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
					} else {
						$response = array('status'=>false, 'msg'=>'Post Not Deleted');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'You are not Owner');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function searchfromfollowerslist_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$search_keyword = $_POST['search_keyword'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if($get_user_detail != '') {

				$this->db->select('ut.user_name, ut.user_id, ut.user_fullname, utt.user_name, utt.user_id, utt.user_fullname, ft.role, utt.user_avatar');
				$this->db->from('dot_friends ft');
				$this->db->join('dot_users ut', 'ft.user_one = ut.user_id');
				$this->db->join('dot_users utt', 'ft.user_two = utt.user_id');
				$this->db->group_start();
				$this->db->or_like('utt.user_name', $search_keyword, 'BOTH');
				$this->db->or_like('utt.user_fullname', $search_keyword, 'BOTH');
					// $this->db->or_like('utt.user_email', $search_keyword, 'BOTH');
				$this->db->group_end();
				$this->db->where('ft.user_one', $user_id);
				$this->db->where_in('ft.role', array('fri','flwr'));
				$this->db->where('utt.message_available', '1');
				$this->db->order_by('ft.user_one', 'asc');
				$query = $this->db->get();
				$search_result = $query->result_array();

				foreach ($search_result as $key => $value) {
					if($value['user_avatar']){
						$user_avatar = $value['user_avatar'];

						$search_result[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
					} else {
						$search_result[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
					}
				}

				// 	print_r($search_result);

				if($search_result){
					$response = array('status'=>true, 'msg'=>'Search from Followers list found', 'result'=>$search_result);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'No Records found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function searchfromfollowinglist_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$search_keyword = $_POST['search_keyword'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(isset($_POST['search_keyword'])) {

				$this->db->select('utt.user_name, utt.user_id, utt.user_fullname, ut.user_name, ut.user_id, ut.user_fullname, ft.role, ut.user_avatar');
				$this->db->from('dot_friends ft');
				$this->db->join('dot_users ut', 'ft.user_one = ut.user_id');
				$this->db->join('dot_users utt', 'ft.user_two = utt.user_id');
				$this->db->group_start();
				$this->db->or_like('ut.user_name', $search_keyword, 'BOTH');
				$this->db->or_like('ut.user_fullname', $search_keyword, 'BOTH');
					// $this->db->or_like('utt.user_email', $search_keyword, 'BOTH');
				$this->db->group_end();
				$this->db->where('ft.user_two', $user_id);
				$this->db->where_in('ft.role', array('fri','flwr'));
				$this->db->where('ut.message_available', '1');
				$this->db->order_by('ft.user_one', 'asc');
				$query = $this->db->get();
				$search_result = $query->result_array();

				foreach ($search_result as $key => $value) {
					if($value['user_avatar']){
						$user_avatar = $value['user_avatar'];

						$search_result[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
					} else {
						$search_result[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
					}
				}

				if(isset($search_result)){
					$response = array('status'=>true, 'msg'=>'Search from Following list found', 'result'=>$search_result);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'No Records found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function addprofilevisitor_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$other_user_id = $_POST['other_user_id'];

	if($other_user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(($_POST['other_user_id'] != '') ) {

				$is_already_visited = $this->common->getRow('*','dot_profile_visitors',array('visitor_id'=>$user_id, 'visited_user_id' => $other_user_id));

				if(!$is_already_visited){
					$time = time();
					$data1 = array(
						'visitor_id'=>$user_id,
						'visited_user_id' => $other_user_id,
						'visit_checked'=>'0',
						'time'=>$time,
					);
					$insert1 = $this->common->insertData('dot_profile_visitors', $data1);
					$last_insert_id = $this->db->insert_id();

					if($insert1){
						$response = array('status'=>true, 'msg'=>'Add Profile Visitor successfully', 'result'=>$last_insert_id);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Already Visited this Account');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Enter All the details');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function profilevisitorlist_post()
{
	$response = array();
	$user_id = $_POST['user_id'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			$this->db->select('vt.v_id, vt.visitor_id, vt.visited_user_id,vt.visit_checked, vt.time, ut.user_id,ut.user_name,ut.user_fullname, ut.user_avatar');
			$this->db->where('`ut`.`user_id`', '`vt`.`visited_user_id`', FALSE );

			$visitor_list = $this->common->getData('dot_users ut, dot_profile_visitors vt',array('ut.user_status'=>'1', 'vt.visitor_id'=>$user_id), array('sort_by'=>'vt.v_id', 'sort_direction'=>'desc'));

			if($visitor_list){

				foreach ($visitor_list as $key => $value) {
					if($value['user_avatar']){
						$user_avatar = $value['user_avatar'];

						$visitor_list[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
					} else {
						$visitor_list[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
					}
				}
				
				$response = array('status'=>true, 'msg'=>'Visitor list shared successfully', 'result'=>$visitor_list);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);

			} else {
				$response = array('status'=>false, 'msg'=>"No one visit's your Profile");
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function updateprofileinfo_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$user_website = $_POST['user_website'];
	$user_bio = $_POST['user_bio'];
	$user_loved_word = $_POST['user_loved_word'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '') ) {

			$update_data = $this->common->updateData('dot_users', array('user_website'=>$user_website, 'user_bio'=>$user_bio, 'user_profile_word'=>$user_loved_word), array('user_id'=>$user_id));

			if($update_data){
				
				$response = array('status'=>true, 'msg'=>'Profile Info updated successfully');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);

			} else {
				$response = array('status'=>false, 'msg'=>"Something went wrong");
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function searchedsaveuser_post()
{
	$response = array();
	$user_from = $_POST['user_from'];
	$user_to = $_POST['user_to'];

	if($user_from !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_from));
		if(($get_user_detail != '') ) {

			$is_exist = $this->common->getRow('*','dot_user_search_events',array('searcher_id' => $user_from, 'searched_id'=>$user_to));
			if(!$is_exist){
				$insert_data = array(
					'searcher_id'=>$user_from, 
					'searched_id'=>$user_to, 
					'searched_time'=>time()
				);

				$is_inserted = $this->common->insertData('dot_user_search_events', $insert_data);
				$last_insert_id = $this->db->insert_id();

				if($is_inserted){
					$response = array('status'=>true, 'msg'=>'Profile Info updated successfully', 'result'=>$last_insert_id);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>"Already exist in search");
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function searcheddeleteuser_post()
{
	$response = array();
	$user_from = $_POST['user_from'];
	$user_to = $_POST['user_to'];

	if($user_from !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_from));
		if(($get_user_detail != '') ) {

			$is_exist = $this->common->getRow('*','dot_user_search_events',array('searcher_id' => $user_from, 'searched_id'=>$user_to));
			if($is_exist){
				$delete_data = array(
					'searcher_id'=>$user_from, 
					'searched_id'=>$user_to,
				);

				$is_deleted = $this->common->deleteData('dot_user_search_events', $delete_data);

				if($is_deleted){
					$response = array('status'=>true, 'msg'=>'User Deleted from Search successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>"Not Exist in Search");
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function interest_post()
{
	$response = array();
	$user_id = $_POST['user_id'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '') ) {

			$foodandbeverage_list = $this->common->getData('dot_interests',array('interest_type' => 'type_eating'));
			if(!$foodandbeverage_list){
				$foodandbeverage_list = array();
			}

			$music_list = $this->common->getData('dot_interests',array('interest_type' => 'type_music'));
			if(!$music_list){
				$music_list = array();
			}

			$typelisttv_list = $this->common->getData('dot_interests',array('interest_type' => 'type_film_tv'));
			if(!$typelisttv_list){
				$typelisttv_list = array();
			}

			$typetravel_list = $this->common->getData('dot_interests',array('interest_type' => 'type_travel'));
			if(!$typetravel_list){
				$typetravel_list = array();
			}

			if($foodandbeverage_list || $music_list || $typelisttv_list || $typetravel_list){
				$response = array('status'=>true, 'msg'=>'User Interest List shared successfully', 'foodandbeverage_list'=>$foodandbeverage_list, 'music_list'=>$music_list, 'typelisttv_list'=>$typelisttv_list, 'typetravel_list'=>$typetravel_list);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>"Something went wrong");
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function saveuserinterest_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$interest_type = $_POST['interest_type'];
	$interest_value = $_POST['interest_value'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '')) {
			$get_interests = $this->common->getRow('*','dot_user_interests',array('interested_user_id_fk'=>$user_id,'interested_type_value'=>$interest_value,'user_interested_type'=>$interest_type));

			if(!$get_interests){
				$insertdata = array(
					'interested_user_id_fk'=>$user_id,
					'interested_type_value'=>$interest_value,
					'user_interested_type'=>$interest_type
				);
				$is_datainserted = $this->common->insertData('dot_user_interests',$insertdata);
				$last_insert_id = $this->db->insert_id();

				if($is_datainserted){
					$response = array('status'=>true, 'msg'=>'Interest saved successfully', 'result'=>$last_insert_id);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Interest already exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function deleteuserinterest_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$interest_type = $_POST['interest_type'];
	$interest_value = $_POST['interest_value'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '')) {
			$get_interests = $this->common->getRow('*','dot_user_interests',array('interested_user_id_fk'=>$user_id,'interested_type_value'=>$interest_value,'user_interested_type'=>$interest_type));

			if($get_interests){
				$deletedata = array(
					'interested_user_id_fk'=>$user_id,
					'interested_type_value'=>$interest_value,
					'user_interested_type'=>$interest_type
				);
				$is_datadeleted = $this->common->deleteData('dot_user_interests',$deletedata);

				if($is_datadeleted){
					$response = array('status'=>true, 'msg'=>'Interest deleted successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Interest doesnot exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}


public function currentuserallstory_get()
{
	$response = array();
	$user_id = $_GET['user_id'];
	$get_user_stories = '';
	$insert = '';

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(isset($_GET['user_id']) ) {
				$this->db->select('st.s_id, st.uid_fk, st.stories_img, st.created, ut.user_id , ut.user_name, ut.user_fullname, ut.user_avatar,Concat("https://you2.co.in/uploads/stories/", st.stories_img) as story_url');
				$this->db->where('`st`.`uid_fk`', '`ut`.`user_id`', FALSE );
					// $this->db->where('FROM_UNIXTIME(created) >', 'CURRENT_DATE', FALSE );
					// $this->db->where('FROM_UNIXTIME(created) <', 'CURRENT_DATE + INTERVAL 1 WEEK', FALSE);
				$this->db->order_by('st.s_id', 'desc');

				$get_user_stories = $this->common->getData('dot_user_stories st, dot_users ut',array('uid_fk' => $user_id));

				if($get_user_stories) {
					foreach ($get_user_stories as $key => $value) {
							// post time ago
						if($value['created']){
							$post_created_time = $value['created'];
							$get_user_stories[$key]['post_time_ago'] = $this->post_time_ago($post_created_time);
						}

						if($value['user_avatar']){
							$user_avatar = $value['user_avatar'];

							$get_user_stories[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/" . $user_avatar;
						} else {
							$get_user_stories[$key]['user_avatar_url'] = $this->base_url . "uploads/avatar/avatar_female.png";
						}
					}
					$response = array('status'=>true, 'msg'=>'User Story list successfully', 'result'=> $get_user_stories);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
				} else {
					$response = array('status'=>false, 'msg'=>'Something went wrong');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function currentuserdeletestory_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$delete = '';

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(($_POST['story_id'] != '') ) {

				$delete = $this->common->deleteData('dot_user_stories',array('s_id'=>$_POST['story_id'], 'uid_fk' => $user_id));

				if(!empty($delete)) {
					$response = array('status'=>true, 'msg'=>'Story Removed from list successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'Post does not exist');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Enter All the details');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function createnewmarket_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$market_url = $_POST['market_url'];
	$company_name = $_POST['company_name'];
	$store_desc = $_POST['store_desc'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '')) {
			$get_user_marketplace = $this->common->getRow('*','dot_user_market',array('market_place_owner_id'=>$user_id));

			$get_marketplace_url = $this->common->getRow('*','dot_user_market',array('market_page_name'=>$market_url));

			$get_marketplace_name = $this->common->getRow('*','dot_user_market',array('market_place_name'=>$company_name));

			if(!$get_user_marketplace){
				if(!$get_marketplace_url){
					if(!$get_marketplace_name){
						$insertdata = array(
							'market_place_owner_id'=>$user_id,
							'market_temporary_name'=>$market_url,
							'market_page_name'=>$market_url,
							'market_place_name'=>$company_name,
							'market_place_created_time'=>time(),
							'market_theme'=>'default',
							'market_about'=>$store_desc
						);
						$is_datainserted = $this->common->insertData('dot_user_market',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if($last_insert_id){
							$response = array('status'=>true, 'msg'=>'Market created successfully', 'result'=>$last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						} else {
							$response = array('status'=>false, 'msg'=>"Something went wrong");
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>"Company Name already used");
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>"Url already used");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Already Created Market');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function whichimagepostsave_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$insert = '';

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(($_POST['post_title'] != '') && ($_POST['post_details'] != '') && ($_POST['post_hashtags'] != '') && ($_POST['post_imagea'] != '') && ($_POST['post_imageb'] != '') && ($_POST['type_image'] != '')) {

				$time = time();
				$timeb = $time+100;
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$url_slugies = $this->url_slugies($_POST['post_title']);
					$slug = 'p_'.$this->random_code(8).'_'.$url_slugies;
					$post_tags = $this->hashtag($_POST['post_hashtags']);

					if($_POST['type_image']=='new'){
						$image1 = base64_decode($this->input->post("post_imagea"));
						$image_name = 'which_'.time();
						$filename = $image_name . '.' . 'png';
						$path0 = realpath(__DIR__ . '/../../../..');
						$path = $path0 . "/uploads/images/";
						file_put_contents($path . $filename, $image1);
					}
					if($_POST['type_image']=='reshare'){


						$filename = $_POST['post_imagea'];
					}
					
					
					
					if($_POST['type_image']=='new'){
						$image2 = base64_decode($this->input->post("post_imageb"));
						$image_name1 = 'which_'.$timeb;
						$filename1 = $image_name1 . '.' . 'png';
						$path01 = realpath(__DIR__ . '/../../../..');
						$path1 = $path01 . "/uploads/images/";
						file_put_contents($path1 . $filename1, $image2);
					}
					if($_POST['type_image']=='reshare'){


						$filename1 = $_POST['post_imageb'];
					}




					$insertdata1 = array(
						'user_id_fk' => $user_id,
						'uploaded_image' => $filename,
						'type_image' => $_POST['type_image'],
						'uploaded_time' => $time,
						'user_ip' =>$ip,
					);
					$insert1 = $this->common->insertData('dot_user_upload_images',$insertdata1);
					$post_image_id = $this->db->insert_id();

					$insertdata2 = array(
						'user_id_fk' => $user_id,
						'uploaded_image' => 'p_image',
						'uploaded_image' => $filename1,
						'type_image' => $_POST['type_image'],
						'uploaded_time' => $time,
						'user_ip' =>$ip,
					);
					$insert2 = $this->common->insertData('dot_user_upload_images',$insertdata2);
					$post_image_id2 = $this->db->insert_id();


					if(!empty($post_image_id) && !empty($post_image_id2)) {
						$insertdata = array(
							'user_id_fk' => $user_id,
							'post_type' => 'p_which',
							'post_created_time' => $time,
							'user_ip' => $ip,
							'hashtag_normal' => $_POST['post_hashtags'],
							'hashtag_diez' => $post_tags,
							'post_title_text' => $_POST['post_title'],
							'post_text_details' => $_POST['post_details'],
							'who_can_see_post' => $_POST['can_see'],
							'which_image' => $post_image_id.','.$post_image_id2,
							'slug' => $slug,
							'post_page_type' => 'wall',
							'user_feeling' => $_POST['feeling'],
							'post_country_code' => $_POST['country_code'],
						);
						
						$insert = $this->common->insertData('dot_user_posts',$insertdata);
						$last_insert_id = $this->db->insert_id();

						if((isset($insert)) ) {
							$response = array('status'=>true, 'msg'=>'Which Image Post saved successfully', 'result'=> $last_insert_id);
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
							// die();
						} else {
							$response = array('status'=>false, 'msg'=>'Something went wrong');
							$rest_data = $response;
							$this->response($rest_data, REST_Controller::HTTP_OK);
						}
					} else {
						$response = array('status'=>false, 'msg'=>'Images not uploaded');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function getallwhichcategories_get()
	{
		$response = array();

		$get_whichcat = $this->common->getData('dot_which_categories',array());
		if($get_whichcat) {
			$response = array('status'=>true, 'msg'=>'Which Categories shared successfully', 'result'=>$get_whichcat);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'No Which Category found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function updateuserpassword_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				// $is_checked = $this->common->getRow('*','dot_users',array('user_id'=>$user_id,'user_password' =>sha1(md5($current_password))));
				
				$is_checked = true;

				if($is_checked){
					$updatedata = array(
						'user_password' =>sha1(md5($new_password))
					);
					$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));
					
					if($is_dataupdated){
						$response = array('status'=>true, 'msg'=>'Password updated successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>"Something went wrong");
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Password does not matched');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	


	public function addcountry_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$country = $_POST['country'];
		

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				
				
				$is_checked = true;

				if($is_checked){
					$updatedata = array(
						'country' =>$country
					);
					$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));
					
					if($is_dataupdated){
						$response = array('status'=>true, 'msg'=>'Country  successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>"Something went wrong");
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Password does not matched');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	

	public function addjob_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$user_job_title = $_POST['job_title'];
		$user_job_company_name = $_POST['job_company_name'];

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				

				$updatedata = array(
					'user_job_title' =>$user_job_title, 'user_job_company_name'=> $user_job_company_name
				);
				$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));

				if($is_dataupdated){
					$response = array('status'=>true, 'msg'=>'Job  successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}

			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function addbio_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$user_bio = $_POST['user_bio'];
		

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				

				$updatedata = array(
					'user_bio' =>$user_bio
				);
				$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));

				if($is_dataupdated){
					$response = array('status'=>true, 'msg'=>'Job  successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}

			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function addrelationship_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$user_relationship = $_POST['user_relationship'];
		

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				

				$updatedata = array(
					'user_relationship' =>$user_relationship
				);
				$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));

				if($is_dataupdated){
					$response = array('status'=>true, 'msg'=>'Relationship  successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}

			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function addsexuality_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$user_sexuality = $_POST['user_sexuality'];
		

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				

				$updatedata = array(
					'user_sexuality' =>$user_sexuality
				);
				$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));

				if($is_dataupdated){
					$response = array('status'=>true, 'msg'=>'Sexuality  successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}

			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function addaddress_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$user_address = $_POST['user_address'];
		

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				

				$updatedata = array(
					'user_address' =>$user_address
				);
				$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));

				if($is_dataupdated){
					$response = array('status'=>true, 'msg'=>'Address  successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}

			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function addaboutyourself_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$user_about_yourself = $_POST['user_aboutyourself'];
		

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) {
				

				$updatedata = array(
					'user_about_yourself' =>$user_about_yourself
				);
				$is_dataupdated = $this->common->updateData('dot_users',$updatedata, array('user_id'=>$user_id));

				if($is_dataupdated){
					$response = array('status'=>true, 'msg'=>'About yourself successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}

			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function usersearchedelete_post()
	{
		$response = array();
		$user_from = $_POST['user_from'];
		$user_to = $_POST['user_to'];

		if($user_from !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_from));
			if(($get_user_detail != '') ) {

				$is_exist = $this->common->getRow('*','dot_chat',array('from_user_id' => $user_from, 'to_user_id'=>$user_to));
				if($is_exist){
					$delete_data = array(
						'from_user_id'=>$user_from, 
						'to_user_id'=>$user_to,
					);

					$is_deleted = $this->common->deleteData('dot_chat', $delete_data);

					if($is_deleted){
						$response = array('status'=>true, 'msg'=>'User Deleted from Search successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>"Something went wrong");
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>"Not Exist in Search");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function userdelete_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		
		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail) {

				$delete_data = array(
					'user_id'=>$user_id, 
				);

				$is_deleted = $this->common->deleteData('dot_users', $delete_data);

				if($is_deleted){
					$response = array('status'=>true, 'msg'=>'User Deleted successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
				
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function getaboutus_get()
	{
		$response = array();

		$get_about = "https://you2.co.in/about-us";
		if($get_about) {
			$response = array('status'=>true, 'msg'=>'About us successfully', 'result'=>$get_about);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'No Which About found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function getsavedpostlists_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];


		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {
				if(isset($_GET['user_id']) ) {
				   // echo "SELECT DISTINCT p.`user_post_id`,p.`user_id_fk`,p.`ads_price`,p.`post_type`,p.`post_created_time`,p.`who_can_see_post`,p.`user_ip`,p.`post_title_text`,p.`post_text_details`,p.`post_video_id`,p.`post_video_name`,p.`post_audio_id`,p.`post_image_id`,p.`post_link_url`,p.`post_link_description`,p.`post_link_img`,p.post_link_title,p.post_link_img,p.post_link_mini_url,U.user_fullname,U.user_name, p.`product_images` as pics, Concat('https://you2.co.in/uploads/stories/', p.`product_images`) AS story_url FROM dot_user_posts p, dot_users U WHERE p.user_id_fk=U.user_id AND U.private_account = '0' And p.`product_message_status` = '1' ORDER BY p.user_id_fk DESC";die;
					$get_savedposts = $this->common->query("SELECT DISTINCT p.`user_post_id`,p.`user_id_fk`,p.`ads_price`,p.`post_type`,p.`post_created_time`,p.`who_can_see_post`,p.`user_ip`,p.`post_title_text`,p.`post_text_details`,p.`post_video_id`,p.`post_video_name`,p.`post_audio_id`,p.`post_image_id`,p.`post_link_url`,p.`post_link_description`,p.`post_link_img`,p.post_link_title,p.post_link_img,p.post_link_mini_url,U.user_fullname,U.user_name, p.`product_images` as pics, Concat('https://you2.co.in/uploads/stories/', p.`product_images`) AS story_url FROM dot_user_posts p, dot_users U WHERE p.useraction='fav' AND p.user_id_fk=U.user_id AND U.private_account = '0' And p.`product_message_status` = '1' ORDER BY p.user_id_fk DESC");
					//echo "<pre>";print_r($get_savedposts);die;
					if($get_savedposts) {
						$response = array('status'=>true, 'msg'=>'All Story shared successfully', 'result'=> $get_savedposts);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
					} else {
						$response = array('status'=>false, 'msg'=>'No story found', 'result'=>array());
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'User not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
//     public function alluserprofilepostsnew_get($lastProfilePostID="")
//     {
//         //echo "<pre>";print_r($_GET['otheruser']);die;
//     	// $this->sendp($data="");
// 	$response = array();
// 	@$user_id = $_GET['user_id'];
// 	$get_user_stories = '';
// 	$insert = '';
// 	$get_userprofile = array();

// 	if($user_id !='') {
// 		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
// 		if($get_user_detail != '') {
// 			if(isset($_GET['user_id']) ) {

// 				$moreProfilePostQuery = "";
// 				if ($lastProfilePostID) {
// 						//build up the query
// 					$moreProfilePostQuery = " and P.user_post_id<'" . $lastProfilePostID . "' ";
// 				}

// 				/*$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, U.user_name, U.user_fullname,U.verified_user,U.user_page_lang FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id AND U.user_status='1' WHERE P.post_page_type = 'wall' ".$moreProfilePostQuery." ORDER BY P.user_post_id DESC LIMIT 10");*/

// 				$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id,P.commeneted_status,P.status, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, P.whc_category,U.user_name, U.user_fullname,U.verified_user,Concat('https://you2.co.in/uploads/avatar/', U.user_avatar) AS avatar_url, U.user_page_lang, DATE(FROM_UNIXTIME(P.post_created_time)) AS post_date, TIME(FROM_UNIXTIME(P.post_created_time)) AS post_time, CONCAT((DATE(FROM_UNIXTIME(P.post_created_time))),' ',(TIME(FROM_UNIXTIME(P.post_created_time)))) as post_date_time FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id WHERE P.post_page_type = 'wall' ORDER BY P.user_post_id DESC LIMIT 10");

// 				//echo "<pre>"; print_r($get_userprofile);die;
// 				// print_r(base_url('assets/images/dummy-image.jpg'));die;
// 				$dummy=array();
// 				$comment_count =  count($get_userprofile);
				
// 				        //}
// 				foreach ($get_userprofile as $key => $value) {
// 				    //echo "user=".$user_id;
// 				  // echo "<pre>";print_r($value['user_post_id']);die;
// 				        // post time ago
// 				       // echo "SELECT * From `dot_report_post` where reported_type= ".$value['user_id_fk']." OR reported_post_id_fk=".$value['user_post_id'];die;
// 				        $get_whichcat = $this->common->query("SELECT * From `dot_report_post` where reported_type= ".$user_id." AND reported_post_id_fk=".$value['user_post_id']);
// 				       //$get_whichcat = $this->common->getData('dot_report_post',array('reported_type'=>$value['user_id_fk'],'reported_post_id_fk'=>$value['user_post_id']));
// 				       //echo "<pre>";print_r($get_whichcat[$key]['reported_type']);die;
// 				       ///echo count($get_whichcat);die;
				       
// 				      if(empty($get_whichcat)){
// 				          $value['user_commnet_disable']=$value['commeneted_status'];
// 				          if ($value['avatar_url'] ==""){
// 				            $value['avatar_url']=base_url('assets/images/dummy-image.jpg');
// 				          }
//                           if($value['post_created_time']){
//         						$value['post_time_ago'] = $this->post_time_ago($value['post_created_time']);
//         					}

// 				            // add image url
//     					    if($value['post_image_id']){
//     						$pid = $value['post_image_id'];
//     						$dot_user_upload_images = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $pid));
    
//     						$upl_img = $dot_user_upload_images->uploaded_image;
//     						$value['upload_image_url'] = $this->base_url . "uploads/images/" . $upl_img;
//         					} else {
//         						$value['upload_image_url'] = $this->base_url . "uploads/images/no-image.png";
//         					}
//                 			if($value['post_video_id']){
//         						$vid = $value['post_video_id'];
//         						$dot_user_upload_videos = $this->common->getRow('*','dot_videos',array('id' => $vid));
//         						$upl_video = $dot_user_upload_videos->video_path;
//         						$value['upload_video_url'] = $this->base_url . "uploads/video/" . $upl_video;
//         					} else {
//         						$value['upload_video_url'] = $this->base_url . "uploads/video/safe-video.png";
//         					}
    
//     						// add audio url
//         					if($value['post_audio_id']){
//         						$aid = $value['post_audio_id'];
//         						$dot_user_upload_audio = $this->common->getRow('*','dot_audios',array('id' => $aid));
        
//         						$upl_audio = $dot_user_upload_audio->audio_path;
//         						$value['upload_audio_url'] = $this->base_url . "uploads/audio/" . $upl_audio;
//         					} else {
//         						$value['upload_audio_url'] = $this->base_url . "uploads/video/safe-video.png";
//         					}
        
//         						// before after url
//         					if($value['before_after_images']){
//         						$before_after_images = $value['before_after_images'];
//         						$before_after_images_explode = explode(",", $before_after_images);
        
//         						$value['before_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[0];
//         						$value['after_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[1];
//         					} else {
//         						$value['before_image_url'] = $this->base_url . "uploads/image/no-image.png";
//         						$value['after_image_url'] = $this->base_url . "uploads/image/no-image.png";
//         					}
        
//         						// which image url
//         					if($value['which_image']){
//         						$which_images = $value['which_image'];
//         						$which_images_explode = explode(",", $which_images);
//         						$image1 = $which_images_explode[0];
//         						$image2 = $which_images_explode[1];
        
//         						$which_image1 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image1));
//         						$which_image2 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image2));
        
//         						$upl_image1 = $which_image1->uploaded_image;
//         						$upl_image2 = $which_image2->uploaded_image;
        
//         						$value['which_imagea_url'] = $this->base_url . "uploads/images/" . $upl_image1;
//         						$value['which_imageb_url'] = $this->base_url . "uploads/images/" . $upl_image2;
//         					} else {
//         						$value['which_imagea_url'] = $this->base_url . "uploads/image/no-image.png";
//         						$value['which_imageb_url'] = $this->base_url . "uploads/image/no-image.png";
//         					}
        					
//         					// get comment by post
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];
//         						$this->db->select('ct.comment_id, ct.uid_fk, ct.post_id_fk, ct.comment_text, ct.user_ip, ct.sticker, ct.gif, ct.comment_created_time,ct.voice, ut.user_name,  ut.user_fullname, ut.verified_user, ut.pro_user_type, ut.style_mode, ut.user_page_lang, ut.user_donate_message, ut.last_login, ut.show_online_offline_status, Concat("https://you2.co.in/uploads/avatar/", ut.user_avatar) as user_avatar_url, DATE(FROM_UNIXTIME(ct.comment_created_time)) AS comment_date, TIME(FROM_UNIXTIME(ct.comment_created_time)) AS comment_time');
//         						$this->db->where('ct.uid_fk =', '`ut`.`user_id`', false);
//         						$all_comments = $this->common->getData('dot_post_comments ct, dot_users ut', array('ct.post_id_fk'=> $post_id), array('sort_by'=>'ct.comment_id', 'sort_direction'=> 'ASC'));
//         						if($all_comments != ''){
//         							$comment_count = count($all_comments);
//         							$value['comments'] = $all_comments;
//         						} else {
//         							$comment_count = '0';
//         							$value['comments'] = array();
//         						}
//         						 $value['comment_count'] = $comment_count;
//         					}
        					
//         						// is favourite post
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];			                
//         						$is_favourite = $this->common->getRow('*', 'dot_favourite_list', array('fav_post_id'=>$post_id, 'fav_uid_fk'=> $user_id));
//         						if($is_favourite != ''){
//         							$value['is_favourite'] = "1";
//         						} else {
//         							$value['is_favourite'] = "0";
//         						}
//         					}
        					
//         					// is like post
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];			                
//         						$is_like = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));
//         						if($is_like != ''){
//         							$value['is_like'] = "1";
//         						} else {
//         							$value['is_like'] = "0";
//         						}
//         					}
        					
//         					// count like post
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];			                
//         						$like_count = $this->common->getRow('COUNT(like_id) as like_count', 'dot_post_like', array('post_id_fk'=>$post_id));
//         						if($like_count != ''){
//         							$value['like_count'] = $like_count->like_count;
//         						} else {
//         							$value['like_count'] = "0";
//         						}
//         					}
        					
//         					// is like post status
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];			                
//         						$like_status = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));
//         						if($like_status != ''){
//         							$value['like_status'] = "1";
//         						} else {
//         							$value['like_status'] = "0";
//         						}
//         					}
        					
//         					// is unlike post 
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];			                
//         						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));
//         						if($unlike_status != ''){
//         							$value['dislike'] = "1";
//         						} else {
//         							$value['dislike'] = "0";
//         						}
//         					}
        					
//         					// is unlike post status
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];			                
//         						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));
//         						if($unlike_status != ''){
//         							$value['dislike_status'] = "1";
//         						} else {
//         							$value['dislike_status'] = "0";
//         						}
//         					}
        					
//         					// count dis like post
//         					if($value['user_post_id']){
//         						$post_id = $value['user_post_id'];			                
//         						$dislike_count = $this->common->getRow('COUNT(unlike_id) as dislike_count', 'dot_post_unlike', array('post_id_fk'=>$post_id));
//         						if($dislike_count != ''){
//         							$value['dislike_count'] = $like_count->like_count;
//         						} else {
//         							$value['dislike_count'] = "0";
//         						}
//         					}
    				        
//     				        $dumyy[]=$value;
// 				      }
// 				}
// 				//cho "<pre>";print_r($dumyy);die;

// 				if($get_userprofile) {
// 					$response = array('status'=>true, 'msg'=>'All Users Posts shared successfully', 'comment_count'=> $comment_count, 'result'=> $dumyy);
// 					$rest_data = $response;
// 					$this->response($rest_data, REST_Controller::HTTP_OK);
// 						// die();
// 				} else {
// 					$response = array('status'=>false, 'msg'=>'No Posts found','comment_count'=>'', 'result'=> $get_userprofile);
// 					$rest_data = $response;
// 					$this->response($rest_data, REST_Controller::HTTP_OK);
// 				}
// 			} else {
// 				$response = array('status'=>false, 'msg'=>'User not found', 'comment_count'=>'',);
// 				$rest_data = $response;
// 				$this->response($rest_data, REST_Controller::HTTP_OK);
// 			}
// 		} else {
// 			$response = array('status'=>false, 'msg'=>'Data not found', 'comment_count'=>'',);
// 			$rest_data = $response;
// 			$this->response($rest_data, REST_Controller::HTTP_OK);
// 		}
// 	} else {
// 		$response = array('status'=>false, 'msg'=>'User id not found', 'comment_count'=>'',);
// 		$rest_data = $response;
// 		$this->response($rest_data, REST_Controller::HTTP_OK);
// 	}
//     }
	public function logout_post()
	{
	   // $this->default_file();        // by Nitin @09-03-2021
		$response = array();
		$get_data = '';
		$insert = '';

		if(($_POST['user_id'] != '')) {
			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_id']));
			if($get_data != '') {


				$update_data = array(
					'show_online_offline_status' => '0'
				);
				$isdata_updated = $this->common->updateData('dot_users',$update_data,array('user_id' => $_POST['user_id']));
				
				$result_arr = array();
				$result_arr = array('response'=>$get_data);
				$result = $result_arr;
				
				$response = array('status'=>true, 'msg'=>'Logout successfully', 'result'=> $result);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);

			} else {
				$response = array('status'=>false, 'msg'=>'You entered wrong credentials');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Enter All the details');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function onlineuserslist_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {

				$online_user = $this->common->query("SELECT ut.user_id,ut.private_account,ut.user_name,ut.user_fullname, ut.verified_user, ut.user_avatar FROM dot_users ut WHERE ut.user_status = '1' AND ut.show_online_offline_status ='1' AND ut.user_id NOT IN (SELECT ft.user_two FROM dot_friends ft WHERE ft.user_one = '$user_id' OR ft.user_two = '$user_id') ORDER BY rand() LIMIT 5");
				

				if($online_user != ''){
					$response = array('status'=>true, 'msg'=>'User Online list shared successfully', 'result'=> $online_user);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'Suggestion users not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function watermarkslist_get()
	{
		$response = array();
		$user_id = $_GET['user_id'];

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_user_detail != '') {

				$watermarks_user = $this->common->query("SELECT * FROM dot_watermarks");
				

				if($watermarks_user != ''){
					$response = array('status'=>true, 'msg'=>'Watermarks Images  List successfully', 'result'=> $watermarks_user);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>'Suggestion users not found');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function addwatermarkspost_post()
	{
		$response = array();
		$user_id = $_POST['user_id'];
		$user_ip = $_POST['user_ip'];
		$post_text_details = $_POST['post_text_details'];
		$slug = $_POST['slug'];
		$watermarkid = $_POST['watermarkid'];

		if($user_id !='') {
			$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if(($get_user_detail != '')) { 
				

				$data = array(
					'user_id_fk' => $user_id,
					'post_type' => 'p_watermark',
					'who_can_see_post' => 'everyone',
					'user_ip' => $user_ip,
					'watermarkid' => $watermarkid,
					'post_text_details' => $post_text_details,
					'slug' => $slug,
					'post_page_type' => 'wall',
					'product_message_status' => '1',
					'post_created_time' => strtotime("now")
				);
				
				$insert = $this->common->insertData('dot_user_posts',$data);

				if($insert){
					$response = array('status'=>true, 'msg'=>'Add Watermarks Post successfully');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				} else {
					$response = array('status'=>false, 'msg'=>"Something went wrong");
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}

			} else {
				$response = array('status'=>false, 'msg'=>'Data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function getallmarketcategories_get()
	{
		$response = array();

		$get_marketcat = $this->common->getData('dot_market_categories',array());
		if($get_marketcat) {
			$response = array('status'=>true, 'msg'=>'Market Categories shared successfully', 'result'=>$get_marketcat);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'No Market Category found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function updateprofilesetting()
	{

		$response = array();
		$get_data = '';
		$insert = '';

		if(($_POST['user_id'] != '')) {
			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_id']));
			if($get_data != '') {
				$update_data = array();
				if(!empty($_POST['user_relationship'])){
					$update_data['user_relationship'] = $_POST['user_relationship'];
				}
				if(!empty($_POST['user_sexuality'])){
					$update_data['user_sexuality'] = $_POST['user_sexuality'];
				}
				if(!empty($_POST['user_about_yourself'])){
					$update_data['user_about_yourself'] = $_POST['user_about_yourself'];	
				}
				if(!empty($_POST['user_bio'])){
					$update_data['user_bio'] = $_POST['user_bio'];	
				}
				if(!empty($_POST['user_address'])){
					$update_data['user_address'] = $_POST['user_address'];
				}
				if(!empty($_POST['country'])){
					$update_data['country'] = $_POST['country'];
				}
				if(!empty($_POST['user_job_title'])){
					$update_data['user_job_title'] = $_POST['user_job_title'];
				}
				if(!empty($_POST['user_job_company_name'])){
					$update_data['user_job_company_name'] = $_POST['user_job_company_name'];
				}
				if(!empty($_POST['user_life_style'])){
					$update_data['user_life_style'] = $_POST['user_life_style'];
				}
				if(!empty($_POST['user_children'])){
					$update_data['user_children'] = $_POST['user_children'];
				}
				if(!empty($_POST['user_smoke'])){
					$update_data['user_smoke'] = $_POST['user_smoke'];
				}
				if(!empty($_POST['user_drink'])){
					$update_data['user_drink'] = $_POST['user_drink'];
				}
				if(!empty($update_data)) {
					$isdata_updated = $this->common->updateData('dot_users',$update_data,array('user_id' => $_POST['user_id']));
					if(!empty($isdata_updated)) {
						$response = array('status'=>true, 'msg'=>'User Profile updated setting successfully');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>'Profile not updated');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'No Data for update');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User id does not exist');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Enter User id');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}

	}
	
	public function getallfeelingcategories_get()
	{
		$response = array();

		$get_feelingtcat = $this->common->getData('dot_feeling_categories',array());
		
// 		foreach ($get_feelingtcat as $key => $value) {
// 					if($value['f_name']){
// 						$fname = $value['f_name'];

// 		                $feelingtsubcat = $this->common->getData('dot_favourite_list', array('f_name'=>$fname));

// 		                if($feelingtsubcat != ''){
// 				        	$response = array('status'=>true, 'msg'=>'Feeling Categories shared successfully', 'result'=>$feelingtsubcat);
// 				        		$rest_data = $response;
// 			$this->response($rest_data, REST_Controller::HTTP_OK);

// 		                } else {
// 		                	$response = array('status'=>false, 'msg'=>'No Feeling Category found');
// 			$rest_data = $response;
// 			$this->response($rest_data, REST_Controller::HTTP_OK);

// 					}
// 				}
// 		}

		if($get_feelingtcat) {
			$response = array('status'=>true, 'msg'=>'Feeling Categories shared successfully', 'result'=>$get_feelingtcat);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'No Market Category found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	public function getuser_cover_get()
	{
		$response = array();

		$get_data = '';

		if(($_GET['user_id'] != '')) {
			$user_id = $_GET['user_id'];

			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $user_id));




			$result_arr = array('response'=>$get_data);
			
// 			print_r($result_arr); die;
			
			
			if($get_data->user_cover == ''){
				$response = array('status'=>true, 'msg'=>'User Profile send successfully', 'user_cover'=>'https://you2.co.in/uploads/cover/safe_male_cover.png', 'result'=> $result_arr);
			} else {
				$response = array('status'=>true, 'msg'=>'User Profile send successfully', 'user_cover'=>'https://you2.co.in/uploads/cover/'.$get_data->user_cover, 'result'=> $result_arr);
			}
    //  	$result_arr[0]['user_cover'] = $response;		
			$result = $response;
			
			if($get_data) {
				$response = array('status'=>true, 'msg'=>'User Cover Image successfully', 'result'=>$result);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>'No User Cover found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function getallsavepost_get()
	{
		$response = array();


		$get_postgetsaved = '';

		if(($_GET['user_id'] != '')) {
			$user_id = $_GET['user_id'];
	  	// $get_postgetsaved = $this->common->getData('dot_user_posts',array('	user_id_fk' => $user_id));

			$this->db->select('dot_user_posts.*,dot_users.*');
			$this->db->from('dot_user_posts');
			$this->db->join('dot_users', 'dot_user_posts.user_id_fk = dot_users.user_id',  'right outer'); 
			$this->db->where('dot_user_posts.user_id_fk', $user_id);
			$this->db->where('dot_user_posts.product_message_status', '1');
			$this->db->where('dot_users.user_status', '1');
			$query = $this->db->get();
			$get_postgetsaved = $query->result_array();



			if($get_postgetsaved) {
				$response = array('status'=>true, 'msg'=>'User Save Post Successfully', 'result'=>$get_postgetsaved);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>'No User Save Post Found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else{

			$response = array('status'=>false, 'msg'=>'User not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);

		}
	}

	public function getallgifs_get()
	{
		$response = array();

		$get_allgifs = $this->common->getData('dot_gifs',array());
		
		foreach ($get_allgifs as $key => $value) {

				        // add image url
			if($value['gifs_name']){
				$gifsid = $value['gifs_name'];
				$get_allgifs[$key]['gifs_name'] = $gifsid; 

				$get_allgifs[$key]['gifs_base_url'] = $this->base_url . "uploads/gifs/" . $gifsid.'.gif';
			} 
		}

		if($get_allgifs) {
			$response = array('status'=>true, 'msg'=>'Gifs Images shared successfully', 'result'=>$get_allgifs);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'Gifs found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	public function latestusercomment_post()
	{
		$response = array();


		$get_getlatestsaved = '';

		if(($_POST['user_id'] != '') && ($_POST['post_id'] != '')) {
			$user_id = $_POST['user_id'];
			$post_id = $_POST['post_id'];
			$get_data = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			if($get_data != ''){

				$this->db->select('dot_post_comments.*,dot_users.*');
				$this->db->from('dot_post_comments');
				$this->db->join('dot_users', 'dot_post_comments.uid_fk = dot_users.user_id',  'right outer'); 
				$this->db->where('dot_post_comments.uid_fk', $user_id);
				$this->db->where('dot_post_comments.post_id_fk', $post_id);
				$this->db->where('dot_users.user_status', '1');
				$this->db->order_by('comment_id', 'DESC');
				$this->db->limit(1);
				$query = $this->db->get();
				$get_getlatestsaved = $query->result_array();

				if($get_getlatestsaved[0]['fastEmojis'] == ''){
					$get_getlatestsaved[$key]['fastEmojis_url'] ="";
				} else {
					$get_getlatestsaved['fastEmojis_url'] ="https://you2.co.in/uploads/fastEmojis/".$get_getlatestsaved[0]['fastEmojis'];
				}
				
				if($get_getlatestsaved[0]['sticker'] == ''){
					$get_getlatestsaved['sticker_url'] ="";
				} else {
					$get_getlatestsaved['sticker_url'] ="https://you2.co.in/uploads/emoticons/F_Sticker/".$get_getlatestsaved[0]['sticker'];
				}
				if($get_getlatestsaved[0]['gif'] == ''){
					$get_getlatestsaved['gif_url'] ="";
				} else {
					$get_getlatestsaved['gif_url'] ="https://you2.co.in/uploads/gifs/".$get_getlatestsaved[0]['gif'];
				}


/*	  	 print_r($get_getlatestsaved[0]['user_avatar']);
	 die;
		if($get_getlatestsaved[0]['user_avatar']){
        $getuseravatar=$get_getlatestsaved[0]['user_avatar'];
		$get_getlatestsaved[$key]['useravatar'] = $this->base_url . "uploads/avatar/" . $getuseravatar;
	} */

	if($get_getlatestsaved) {
		$response = array('status'=>true, 'msg'=>'User Save Latest Post Comment Successfully', 'result'=>$get_getlatestsaved);
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	} else {
		$response = array('status'=>false, 'msg'=>'No User Save Latest Comment Found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
} else{

	$response = array('status'=>false, 'msg'=>'User not found');
	$rest_data = $response;
	$this->response($rest_data, REST_Controller::HTTP_OK);

}
} else {
	$response = array('status'=>false, 'msg'=>'User id not found');
	$rest_data = $response;
	$this->response($rest_data, REST_Controller::HTTP_OK);
}
}

public function allviewusercommentt_post()
{
	$response = array();


	$get_getallviewsaved = '';

	if(($_POST['user_id'] != '') && ($_POST['post_id'] != '')) {
		$user_id = $_POST['user_id'];
		$post_id = $_POST['post_id'];
		$get_data = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_data != ''){

			$this->db->select('ct.comment_id, ct.uid_fk, ct.post_id_fk, ct.comment_text,ct.hashtag_text,ct.fastEmojis, ct.user_ip, ct.sticker, ct.comment_created_time,ct.voice,ct.gif,ut.user_name,  ut.user_fullname, ut.verified_user, ut.pro_user_type, ut.style_mode, ut.user_page_lang, ut.user_donate_message, ut.last_login, ut.show_online_offline_status, Concat("https://you2.co.in/uploads/avatar/", ut.user_avatar) as user_avatar_url, DATE(FROM_UNIXTIME(ct.comment_created_time)) AS comment_date, TIME(FROM_UNIXTIME(ct.comment_created_time)) AS comment_time');
			$this->db->from('dot_post_comments as ct');
			$this->db->join('dot_users as ut', 'ct.uid_fk = ut.user_id',  'right outer'); 
        // $this->db->where('dot_post_comments.uid_fk', $user_id);
			$this->db->where('ct.post_id_fk', $post_id);
			$this->db->where('ut.user_status', '1');
			$this->db->order_by('ct.comment_id', 'DESC');
			$query = $this->db->get();
			$get_getallviewsaved = $query->result_array();

			foreach($get_getallviewsaved as $key =>$value){


				if($value['fastEmojis'] == ''){
					$get_getallviewsaved[$key]['fastEmojis_url'] ="";
				} else {
					$get_getallviewsaved[$key]['fastEmojis_url'] ="https://you2.co.in/uploads/fastEmojis/".$value['fastEmojis'];
				}
				
				if($value['sticker'] == ''){
					$get_getallviewsaved[$key]['sticker_url'] ="";
				} else {
					$get_getallviewsaved[$key]['sticker_url'] ="https://you2.co.in/uploads/emoticons/F_Sticker/".$value['sticker'];
				}
				if($value['gif'] == ''){
					$get_getallviewsaved[$key]['gif_url'] ="";
				} else {
					$get_getallviewsaved[$key]['gif_url'] ="https://you2.co.in/uploads/gifs/".$value['gif'];
				}
			}





			if($get_getallviewsaved) {
				$response = array('status'=>true, 'msg'=>'User Save All Post Comment Successfully', 'result'=>$get_getallviewsaved);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>'No User Save Latest Comment Found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else{

			$response = array('status'=>false, 'msg'=>'User not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);

		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function uploadvideostory_post()
{
	       //$this->default_file();         // by Nitin @12-04-2021
	$response = array();
	$user_id = $_POST['user_id'];
	//	print_r($user_id);die;
	
	$get_data = '';
	$insert = '';
	$get_data = '';

	if($user_id !='') {
		$get_data = $this->common->getRow('*','dot_users',array('user_id' => $_POST['user_id']));
		if($get_data != '') {

			if((isset($_FILES['stories_video']))){

				$upload_video = $this->common->do_upload('stories_video','./uploads/storiesvideo');

				if (isset($upload_video['upload_data'])) {
					$stories_video_name = $upload_video['upload_data']['file_name'];
					$stories_video = $stories_video_name;
				} else {
					$response = array('status'=>false, 'msg'=>'stories Video not uploaded, try again');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
					die();
				}
			} else {
				$stories_video = '';
			}


			

			$data = array(
				'uid_fk' => $user_id,
				'stories_video'=>$stories_video,
				'created' => time()
			);

			$insert = $this->common->insertData('dot_user_stories',$data);
			$last_insert_id = $this->db->insert_id();

			$result_arr = array();
			$result_arr = array('id'=>$last_insert_id);
			$result = $result_arr;

			if($insert) {
				$response = array('status'=>true, 'msg'=>'Story Video created successfully', 'result'=> $result);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
			} else {
				$response = array('status'=>false, 'msg'=>'Something went wrong');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
			
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function userviewallposts_get()
{
    
	$response = array();
	$user_id = $_GET['user_id'];
	$get_user_stories = '';
	$insert = '';
	$get_userprofile = array();

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(isset($_GET['user_id']) ) {

				$moreProfilePostQuery = "";
				// 	if ($lastProfilePostID) {
				// 		//build up the query
				// 		$moreProfilePostQuery = " and P.user_post_id<'" . $lastProfilePostID . "' ";
				// 	}

				/*$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, U.user_name, U.user_fullname,U.verified_user,U.user_page_lang FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id AND U.user_status='1' WHERE P.post_page_type = 'wall' ".$moreProfilePostQuery." ORDER BY P.user_post_id DESC LIMIT 10");*/

				$get_userprofile = $this->common->query("SELECT DISTINCT P.user_post_id, P.user_id_fk,P.post_type,P.post_created_time,P.hashtag_normal,P.watermarkid,P.which_image,P.post_event_page_id ,P.post_page_type,P.post_event_id,P.comment_status,P.hashtag_diez,P.post_title_text,P.post_text_details,P.who_can_see_post,P.post_image_id,P.post_link_url,P.post_link_description,P.post_link_title,P.post_link_img,P.post_page_type,P.post_link_mini_url,P.post_video_id,P.post_audio_id,P.filter_name, P.gif_url,P.user_lat ,P.user_lang,P.location_place,P.about_location,P.before_after_images,P.slug,P.shared_post,P.user_feeling,P.post_video_name, P.whc_category,U.user_name, U.user_fullname,U.verified_user,Concat('https://you2.co.in/uploads/avatar/', U.user_avatar) AS avatar_url, U.user_page_lang, DATE(FROM_UNIXTIME(P.post_created_time)) AS post_date, TIME(FROM_UNIXTIME(P.post_created_time)) AS post_time, CONCAT((DATE(FROM_UNIXTIME(P.post_created_time))),' ',(TIME(FROM_UNIXTIME(P.post_created_time)))) as post_date_time FROM  dot_user_posts P FORCE INDEX (ix_user_posts_post_id_post_type) STRAIGHT_JOIN dot_users U ON P.user_id_fk = U.user_id WHERE P.user_id_fk = $user_id ORDER BY P.user_post_id DESC");

				// 	print_r($get_userprofile);
				foreach ($get_userprofile as $key => $value) {
				        // post time ago
					if($value['post_created_time']){
						$post_created_time = $value['post_created_time'];
						$get_userprofile[$key]['post_time_ago'] = $this->post_time_ago($post_created_time);
					}

				        // add image url
					if($value['post_image_id']){
						$pid = $value['post_image_id'];
						$dot_user_upload_images = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $pid));

						$upl_img = $dot_user_upload_images->uploaded_image;
						$get_userprofile[$key]['upload_image_url'] = $this->base_url . "uploads/images/" . $upl_img;
					} else {
						$get_userprofile[$key]['upload_image_url'] = $this->base_url . "uploads/images/no-image.png";
					}

						// add video url
					if($value['post_video_id']){
						$vid = $value['post_video_id'];
						$dot_user_upload_videos = $this->common->getRow('*','dot_videos',array('id' => $vid));

						$upl_video = $dot_user_upload_videos->video_path;
						$get_userprofile[$key]['upload_video_url'] = $this->base_url . "uploads/video/" . $upl_video;
					} else {
						$get_userprofile[$key]['upload_video_url'] = $this->base_url . "uploads/video/safe-video.png";
					}

						// add audio url
					if($value['post_audio_id']){
						$aid = $value['post_audio_id'];
						$dot_user_upload_audio = $this->common->getRow('*','dot_audios',array('id' => $aid));

						$upl_audio = $dot_user_upload_audio->audio_path;
						$get_userprofile[$key]['upload_audio_url'] = $this->base_url . "uploads/audio/" . $upl_audio;
					} else {
						$get_userprofile[$key]['upload_audio_url'] = $this->base_url . "uploads/video/safe-video.png";
					}

						// before after url
					if($value['before_after_images']){
						$before_after_images = $value['before_after_images'];
						$before_after_images_explode = explode(",", $before_after_images);

						$get_userprofile[$key]['before_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[0];
						$get_userprofile[$key]['after_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[1];
					} else {
						$get_userprofile[$key]['before_image_url'] = $this->base_url . "uploads/image/no-image.png";
						$get_userprofile[$key]['after_image_url'] = $this->base_url . "uploads/image/no-image.png";
					}

						// which image url
					if($value['which_image']){
						$which_images = $value['which_image'];
						$which_images_explode = explode(",", $which_images);
						$image1 = $which_images_explode[0];
						$image2 = $which_images_explode[1];

						$which_image1 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image1));
						$which_image2 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image2));

						$upl_image1 = $which_image1->uploaded_image;
						$upl_image2 = $which_image2->uploaded_image;

						$get_userprofile[$key]['which_imagea_url'] = $this->base_url . "uploads/images/" . $upl_image1;
						$get_userprofile[$key]['which_imageb_url'] = $this->base_url . "uploads/images/" . $upl_image2;
					} else {
						$get_userprofile[$key]['which_imagea_url'] = $this->base_url . "uploads/image/no-image.png";
						$get_userprofile[$key]['which_imageb_url'] = $this->base_url . "uploads/image/no-image.png";
					}

						// get comment by post
					if($value['user_post_id']){

						$post_id = $value['user_post_id'];

						$this->db->select('ct.comment_id, ct.uid_fk, ct.post_id_fk, ct.comment_text, ct.user_ip, ct.sticker, ct.gif, ct.comment_created_time,ct.voice, ut.user_name,  ut.user_fullname, ut.verified_user, ut.pro_user_type, ut.style_mode, ut.user_page_lang, ut.user_donate_message, ut.last_login, ut.show_online_offline_status, Concat("https://you2.co.in/uploads/avatar/", ut.user_avatar) as user_avatar_url, DATE(FROM_UNIXTIME(ct.comment_created_time)) AS comment_date, TIME(FROM_UNIXTIME(ct.comment_created_time)) AS comment_time');

						$this->db->where('ct.uid_fk =', '`ut`.`user_id`', false);

						$all_comments = $this->common->getData('dot_post_comments ct, dot_users ut', array('ct.post_id_fk'=> $post_id), array('sort_by'=>'ct.comment_id', 'sort_direction'=> 'ASC'));

						if($all_comments != ''){
							$get_userprofile[$key]['comments'] = $all_comments;
						} else {
							$get_userprofile[$key]['comments'] = array();
						}
					}

						// is favourite post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$is_favourite = $this->common->getRow('*', 'dot_favourite_list', array('fav_post_id'=>$post_id, 'fav_uid_fk'=> $user_id));

						if($is_favourite != ''){
							$get_userprofile[$key]['is_favourite'] = "1";
						} else {
							$get_userprofile[$key]['is_favourite'] = "0";
						}
					}

						// is like post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$is_like = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));

						if($is_like != ''){
							$get_userprofile[$key]['is_like'] = "1";
						} else {
							$get_userprofile[$key]['is_like'] = "0";
						}
					}

						// count like post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$like_count = $this->common->getRow('COUNT(like_id) as like_count', 'dot_post_like', array('post_id_fk'=>$post_id));

						if($like_count != ''){
							$get_userprofile[$key]['like_count'] = $like_count->like_count;
						} else {
							$get_userprofile[$key]['like_count'] = "0";
						}
					}

												// is like post status
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$like_status = $this->common->getRow('*', 'dot_post_like', array('post_id_fk'=>$post_id, 'liked_uid_fk'=> $user_id));

						if($like_status != ''){
							$get_userprofile[$key]['like_status'] = "1";
						} else {
							$get_userprofile[$key]['like_status'] = "0";
						}
					}


						// is unlike post 
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));

						if($unlike_status != ''){
							$get_userprofile[$key]['dislike'] = "1";
						} else {
							$get_userprofile[$key]['dislike'] = "0";
						}
					}

												// is unlike post status
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$unlike_status = $this->common->getRow('*', 'dot_post_unlike', array('post_id_fk'=>$post_id, 'unliked_uid_fk'=> $user_id));

						if($unlike_status != ''){
							$get_userprofile[$key]['dislike_status'] = "1";
						} else {
							$get_userprofile[$key]['dislike_status'] = "0";
						}
					}

							// count dis like post
					if($value['user_post_id']){
						$post_id = $value['user_post_id'];			                
						$dislike_count = $this->common->getRow('COUNT(unlike_id) as dislike_count', 'dot_post_unlike', array('post_id_fk'=>$post_id));

						if($dislike_count != ''){
							$get_userprofile[$key]['dislike_count'] = $like_count->like_count;
						} else {
							$get_userprofile[$key]['dislike_count'] = "0";
						}
					}
				}

                foreach($get_userprofile as $key => $values)
				{
				     if ($values['avatar_url'] =="")
                    {
				          
				    $get_userprofile[$key]['avatar_url']= base_url('assets/images/dummy-image.jpg');
				    }
				}
				if($get_userprofile) {
					$response = array('status'=>true, 'msg'=>'All Users Posts shared successfully', 'result'=> $get_userprofile);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
				} else {
					$response = array('status'=>false, 'msg'=>'No Posts found', 'result'=> $get_userprofile);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}
public function shareviewpost_get()
{
	$response = array();


	$get_postgetsaved = '';

	if(($_GET['post_id'] != '')) {
		$post_id = $_GET['post_id'];
		$get_postgetsaved = $this->common->getData('dot_user_posts',array('	user_post_id' => $post_id));

	  	//  $this->db->select('dot_user_posts.*,dot_videos.*');
    //      $this->db->from('dot_user_posts');
    //     $this->db->join('dot_videos', 'dot_user_posts.user_id_fk = dot_videos.uid_fk',  'right outer'); 
    //     $this->db->where('dot_user_posts.user_post_id', $post_id);
				// 	$this->db->where('dot_user_posts.product_message_status', '1');

    //     $query = $this->db->get();
    //     $get_postgetsaved = $query->result_array();


	// add video url
		if($get_postgetsaved[0]['post_video_id']){
			$vid = $get_postgetsaved[0]['post_video_id'];
			$dot_user_upload_videos = $this->common->getRow('*','dot_videos',array('id' => $vid));

			$upl_video = $dot_user_upload_videos->video_path;
			$get_postgetsaved['video_path']= $upl_video;
			$get_postgetsaved['upload_video_url'] = $this->base_url . "uploads/video/" . $upl_video;
		} else {
			$get_postgetsaved['video_path']= '';
			$get_postgetsaved['upload_video_url'] = $this->base_url . "uploads/video/safe-video.png";
		}


	     // add image url
		if($get_postgetsaved[0]['post_image_id']){
			$pid = $get_postgetsaved[0]['post_image_id'];
			$dot_user_upload_images = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $pid));

			$upl_img = $dot_user_upload_images->uploaded_image;
			$get_postgetsaved['image_path']= $upl_img;
			$get_postgetsaved['upload_image_url'] = $this->base_url . "uploads/images/" . $upl_img;
		} else {
			$get_postgetsaved['image_path']= '';
			$get_postgetsaved['upload_image_url'] = $this->base_url . "uploads/images/no-image.png";
		}



						// add audio url
		if($get_postgetsaved[0]['post_audio_id']){
			$aid = $get_postgetsaved[0]['post_audio_id'];
			$dot_user_upload_audio = $this->common->getRow('*','dot_audios',array('id' => $aid));

			$upl_audio = $dot_user_upload_audio->audio_path;
			$get_postgetsaved['audio_path']= $upl_audio;
			$get_postgetsaved['upload_audio_url'] = $this->base_url . "uploads/audio/" . $upl_audio;
		} else {
			$get_postgetsaved['audio_path']= '';
			$get_postgetsaved['upload_audio_url'] = $this->base_url . "uploads/video/safe-video.png";
		}

						// before after url
		if($get_postgetsaved[0]['before_after_images']){
			$before_after_images = $get_postgetsaved[0]['before_after_images'];
			$before_after_images_explode = explode(",", $before_after_images);
			$get_postgetsaved['before_path']= $before_after_images_explode[0];
			$get_postgetsaved['before_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[0];
			$get_postgetsaved['after_path']= $before_after_images_explode[1];
			$get_postgetsaved['after_image_url'] = $this->base_url . "uploads/images/" . $before_after_images_explode[1];
		} else {
			$get_postgetsaved['before_path']= '';
			$get_postgetsaved['before_image_url'] = $this->base_url . "uploads/image/no-image.png";
			$get_postgetsaved['after_image_url'] = $this->base_url . "uploads/image/no-image.png";
		}

						// which image url
		if($get_postgetsaved[0]['which_image']){
			$which_images = $get_postgetsaved[0]['which_image'];
			$which_images_explode = explode(",", $which_images);
			$image1 = $which_images_explode[0];
			$image2 = $which_images_explode[1];

			$which_image1 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image1));
			$which_image2 = $this->common->getRow('*','dot_user_upload_images',array('image_id' => $image2));

			$upl_image1 = $which_image1->uploaded_image;
			$upl_image2 = $which_image2->uploaded_image;
			$get_postgetsaved['which_imagea_path1']= $upl_image1;
			$get_postgetsaved['which_imagea_path2']= $upl_image2;
			$get_postgetsaved['which_imagea_url'] = $this->base_url . "uploads/images/" . $upl_image1;
			$get_postgetsaved['which_imageb_url'] = $this->base_url . "uploads/images/" . $upl_image2;
		} else {
			$get_postgetsaved['which_imagea_path1']= '';
			$get_postgetsaved['which_imagea_path2']= '';
			$get_postgetsaved['which_imagea_url'] = $this->base_url . "uploads/image/no-image.png";
			$get_postgetsaved['which_imageb_url'] = $this->base_url . "uploads/image/no-image.png";
		}




		
		if($get_postgetsaved) {
			$response = array('status'=>true, 'msg'=>'Share view post Successfully', 'result'=>$get_postgetsaved);
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		} else {
			$response = array('status'=>false, 'msg'=>'No Share view post Found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else{

		$response = array('status'=>false, 'msg'=>'Post id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);

	}
}

public function sendPushNotification($data1, $reg_id) 
{

      //$apiKey = "AIzaSyDHrgcRFr0H_oMNRlibN9Uw0_Pr62w5yrw"; .. apikey

      //$apiKey = "AIzaSyA0CRpA_QSmwR05u4otPkZ_DjoPn6B9hHE"; ..legacy server 

	//$apiKey="AAAAkvuvCHI:APA91bEInNtYig2QAQXSkkEOSHHwl60DfVUvL2Dm4ahbWIRdHaHq_mVy7iA3swQJ90O8tpSqV1PTfhzVVIF1Kq148gwhAVeHPDiZiMiPx07ahendYnkQV6Ubr0moOZS89tvL72LbLG_m";
    //$apiKey="AAAAkjLYTcc:APA91bHAEKjO_uBnSQenyjEFFZsttTd-Ew-JFyyUWiG_XPJGoWvyr4k8judcZpovyuV2A7jDCjl33-T-y5efvFrGEBlCZLWk0F9Bc5hU3E5-_nx3BA-WY0FLo2ZkF90aXrZaH7sk9Bcn";
    $apiKey="AAAA3O_y1Us:APA91bGjXir-SR_24nl8WLgF_GFB84RygAgxBuU2yGwRvLrdT_rB1wOScTwUGvMqTaAmcWoDluAe_nsrtHPsnZOAJcexKZfI0QbNwOcdXBp684SJqkBcbenHGHme0Pjl8IcPGfvWi-p2";
	$paylod = array();
	$msg = array();

	$paylod = array(
		"title" =>$data1["title"],
		"body" =>$data1["body"],
		"notification_tag" =>$data1["tag"],
            //   "notification_id" =>$data1["id"], 
            //   "image_url" =>$data["image_url"],
               // "link" =>$link,
               // "ride_type" =>$ride_type,
	);
            // if($data["sound_notification"] == 1)
            // {
            //      $paylod["sound"] = $data["sound_notification"];
            // }  

       //print_r($paylod);die();

	$msg["data"] = $paylod;    


        //print_r($msg);die;
	$msg["registration_ids"] = array($reg_id);

       // Set CURL request headers 
	$headers = array( 
		'Authorization: key=' . $apiKey,
		'Content-Type: application/json'
	);
       // Initialize curl handle       
	$ch = curl_init();
       // Set URL to GCM push endpoint     
       //curl_setopt($ch, CURLOPT_URL, 'https://gcm-http.googleapis.com/gcm/send');
	curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
       // Set request method to POST       
	curl_setopt($ch, CURLOPT_POST, true);
       // Set custom request headers       
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       // Get the response back as string instead of printing it       
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       // Set JSON post data
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($msg));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       // Actually send the request    
	$result = curl_exec($ch);
       //print_r($result);die;
       // Handle errors 
	if (curl_errno($ch)) {
		echo 'GCM error: ' . curl_error($ch);
	}
       // Close curl handle
	curl_close($ch);

       return json_decode($result);
	//$result;

}
public function alluserslist_get()
{
	$response = array();
	$user_id = $_GET['user_id'];
	$all_user = '';
	$insert = '';

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(isset($_GET['user_id']) ) {
				$userdetail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
			//	echo "SELECT U.user_name,U.user_fullname,U.user_id,U.last_login,Concat('https://you2.co.in/uploads/avatar/',U.user_avatar) as user_avatar_url FROM dot_users U ,dot_user_blocked B WHERE U.user_status = '1' NOT U.user_id = B.blocked_user_id";die;
				$all_user = $this->common->query("SELECT U.user_name,U.user_fullname,U.user_id,U.last_login,Concat('https://you2.co.in/uploads/avatar/',U.user_avatar) as user_avatar_url FROM dot_users U ,dot_user_blocked B WHERE U.user_status = '1' NOT U.user_id = B.blocked_user_id");
                //echo "<pre>";print_r($all_user);die;

				if($all_user) {
					$response = array('status'=>true, 'msg'=>'Share all  user list successfully', 'result'=> $all_user);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
				} else {
					$response = array('status'=>false, 'msg'=>'Something went wrong');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function blockuser_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$userblock_id = $_POST['userblock_id'];
	$user_block = $_POST['user_block'];
    
	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '')) {
		    if($user_block=="yes"){
			$data = array(
				'blocker_uid_fk' => $user_id,
				'blocked_uid_fk' => $userblock_id,
				'block_status' => $user_block,
				'blocked_time' => strtotime("now")
			);
			 $sql = "INSERT INTO `dot_blocked_users` (`block_id`, `blocker_uid_fk`, `blocked_uid_fk`, `blocked_time`, `block_status`) VALUES (NULL, '$user_id', '$userblock_id', ". strtotime("now").", '".$_POST['user_block']."')";
            $this->db->query($sql);
            $lastid_id=$this->db->insert_id();
            //echo "<pre>";print_r($data);die;
			//$insert = $this->common->insertData('dot_user_blocked',$data);
            //echo $insert;die;
			if($lastid_id){
				$response = array('status'=>true, 'msg'=>'Block user successfully');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} 
		        
		    }else {
		        $get_user_detail = $this->common->query("SELECT *  FROM `dot_blocked_users` WHERE `blocked_uid_fk` = $userblock_id");
		        if(!empty($get_user_detail)){
		            foreach($get_user_detail as $val){
		                $sql="delete from `dot_blocked_users` where block_id=".$val['block_id'];
		                $this->db->query($sql);
		            }
		            	$response = array('status'=>true, 'msg'=>'Unblock user successfully');
        				$rest_data = $response;
        				$this->response($rest_data, REST_Controller::HTTP_OK);
		        }else{
    				$response = array('status'=>false, 'msg'=>"Something went wrong");
    				$rest_data = $response;
    				$this->response($rest_data, REST_Controller::HTTP_OK);
		        }
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function readnotificationstatus_post()
{
	$response = array();
	$user_id = $_POST['user_id'];


	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '')) { 



			$update_data = array(
				'not_read_status' => '0'
			);

			$isdata_updated = $this->common->updateData('dot_notifications',$update_data,array('not_post_owner_id_fk' => $user_id));

			if($isdata_updated){
				$response = array('status'=>true, 'msg'=>'Read  notification status  successfully');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>"Something went wrong");
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
			
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function getstories_seen_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$storiesid = $_POST['stories_id'];

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if(($get_user_detail != '')) { 


			$get_Storiesseen = $this->common->getRow('count(visit_checked) as stories_seen ','dot_stories_seen',array('stories_id' => $storiesid,'stories_user_id' => $user_id));
			if($get_Storiesseen) {
				$response = array('status'=>true, 'msg'=>'Stories Seen shared successfully', 'result'=>$get_Storiesseen);
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			} else {
				$response = array('status'=>false, 'msg'=>'No Stories Seen found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
			
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}
public function usersstoriestdetailseen_post()
{
	$response = array();
	$userid = $_POST['user_id'];
	$storiesid = $_POST['stories_id'];
	$all_user = '';
	$insert = '';

	if($userid !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $userid));
		if($get_user_detail != '') {
			if(isset($_POST['user_id']) ) {



				$all_user = $this->common->query("SELECT U.user_name,U.user_fullname,U.user_id,U.last_login,Concat('https://you2.co.in/uploads/avatar/',U.user_avatar) as user_avatar_url FROM dot_users U ,dot_stories_seen B WHERE  U.user_id = B.stories_seen_id AND B.stories_id = $storiesid AND B.stories_user_id = $userid");
				if($all_user) {
					$response = array('status'=>true, 'msg'=>'Share all users storiest detail seen successfully', 'result'=> $all_user);
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
						// die();
				} else {
					$response = array('status'=>false, 'msg'=>'Something went wrong');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'Data not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	} else {
		$response = array('status'=>false, 'msg'=>'User id not found');
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}
}

public function hashtaglist_get()
{

	$hashtag_list = $this->common->query("SELECT hashtag_normal,hashtag_diez FROM `dot_user_posts` WHERE `hashtag_normal` IS NOT NULL and hashtag_normal != '' AND `hashtag_diez` IS NOT NULL and hashtag_diez != ''");

	if($hashtag_list){
		foreach ($hashtag_list as $key => $value) {
			$hashtag_list[$key]['hashtag_normal'] = $value['hashtag_normal'];
			$hashtag_list[$key]['hashtag_diez'] = $value['hashtag_diez'];
		}

		$response = array('status'=>true, 'msg'=>'Hashtag list shared successfully', 'result'=>$hashtag_list);
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}else{
		$response = array('status'=>false, 'msg'=>'Hashtag list not found', 'result'=>array());
		$rest_data = $response;
		$this->response($rest_data, REST_Controller::HTTP_OK);
	}

}
public function commentadd_post()
{
	$response = array();
	$user_id = $_POST['user_id'];
	$insert = '';

	if($user_id !='') {
		$get_user_detail = $this->common->getRow('*','dot_users',array('user_id' => $user_id));
		if($get_user_detail != '') {
			if(($_POST['post_id'] != '') && ($_POST['post_type'] != '')) {

				if(!empty($_POST['comment'])){
					$comment=$_POST['comment'].'.png';
				}else{
					$comment='';
				}

				$time = time();
					$ip = $_SERVER['REMOTE_ADDR']; // user ip
					$post_type = $_POST['post_type'];
					$post_id = $_POST['post_id'];
					$userVoice = '';
					
					if(!empty($_POST['stickerimg'])){
						$stickerimg = $_POST['stickerimg'].'.png';
					} else {
						$stickerimg = '';
					}
					if(!empty($_POST['send_gift'])){
						$sendgift = $_POST['send_gift'].'.gif';
					} else {
						$sendgift = '';
					}

					if($_POST['typehashtag'] == 0){
						$hashtag_text = '';
						$comment_text = $_POST['comment_text'];
					} else {
						$hashtag_text = $_POST['comment_text'];
						$comment_text = '';
					}

					$data = array(
						'uid_fk'=>$user_id, 
						'comment_text' => $comment_text,
						'hashtag_text' => $hashtag_text,
						'fastEmojis' => $comment,
						'sticker'=>$stickerimg,
						'gif' =>$sendgift,
						'user_ip'=>$ip, 
						'comment_created_time'=>$time,
						'post_id_fk'=>$post_id,
						'voice'=>$userVoice,
					);
					
					$data1["title"] =  "Post Comments";
					$data1["body"] =  "Post comments successfully";
					$data1["tag"] =  "postcomments";
                                //  $data1["id"] = $user_id->liked_uid_fk;
                                // $data["image_url"] = "resources/assets/images";
                                // $data["sound_notification"] = $ride_user_data->sound_notification; 
					$this->sendPushNotification($data1, $get_user_detail->remember_token);

					$insert = $this->common->insertData('dot_post_comments', $data);
					$last_insert_id = $this->db->insert_id();
					
                    // $user_chats = $this->common->query("SELECT U.user_name, U.user_fullname, U.user_id,U.last_login,U.verified_user,U.pro_user_type, Concat('https://you2.co.in/uploads/avatar/', U.user_avatar) as user_avatar_url FROM dot_users U JOIN (SELECT C.comment_id, C.uid_fk,C.post_id_fk,C.comment_text,C.sticker,C.gif,C.user_ip,C.comment_created_time,C. FROM dot_post_comments C WHERE comment_id = '$last_insert_id' ON C.uid_fk = U.user_id");



					if(!empty($insert)) {

						$owner_id = $_POST['post_owner_id'];

						if ($owner_id !== $user_id && $get_user_detail->post_like_notification == '1') {
							$data1 = array(
								'not_type'=>$post_type, 
								'not_time' => $time, 
								'not_uid_fk'=>$user_id, 
								'not_post_id_fk'=>$post_id,
								'not_read_status'=>0,
								'note_type_type'=>'post_like'
							);
							$insert1 = $this->common->insertData('dot_notifications', $data1);

							$this->db->set('notification_count', 'notification_count+1', FALSE);
							$this->db->where('user_id', $owner_id);
							$update_cart = $this->db->update('dot_users');
						}

						$response = array('status'=>true, 'msg'=>'Comment on Post successfully', 'result'=>$last_insert_id);
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					} else {
						$response = array('status'=>false, 'msg'=>'Something went wrong');
						$rest_data = $response;
						$this->response($rest_data, REST_Controller::HTTP_OK);
					}
				} else {
					$response = array('status'=>false, 'msg'=>'Enter All the details');
					$rest_data = $response;
					$this->response($rest_data, REST_Controller::HTTP_OK);
				}
			} else {
				$response = array('status'=>false, 'msg'=>'User data not found');
				$rest_data = $response;
				$this->response($rest_data, REST_Controller::HTTP_OK);
			}
		} else {
			$response = array('status'=>false, 'msg'=>'User id not found');
			$rest_data = $response;
			$this->response($rest_data, REST_Controller::HTTP_OK);
		}
	}
	
	
	public function videorequest_post()    
	{
		print_r($_POST);
	}
	public function selfdestructor_post()
	{
	    
	}
	
	
	
	
	
	
	
}
