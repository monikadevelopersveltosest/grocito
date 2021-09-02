<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . 'libraries/REST_Controller.php';
// require_once("application/libraries/Format.php");
class ApiCommonController extends REST_Controller
{

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('api/Authentication_model');
        $this->load->helper('common_helper');
    }

    /**
     * Get All  product category list.
     *
     * @return Response
     */
    public function category_list_get()
    {

        // $product_categorys = $this->db->get("categories")->result();
        $whrc = array('status'=>1,'parent_category_id'=>0);
        $allcategories = $this->Common_model->GetWhere('categories', $whrc);
        foreach ($allcategories as $key=>$catdataarray) {
            if ($catdataarray['category_image'] != '') {
                $allcategories[$key]['category_image'] = base_url() . 'uploads/category/' . $catdataarray['category_image'];
            } else {
                $allcategories[$key]['category_image'] = '';
            }
        }
        if (!empty($allcategories)) {
            $this->response(['success' => true, 'message' => "category found successfully.", 'data' => $allcategories], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get Category wise sub category list
     *
     * @return Response
     */
    public function sub_category_list_by_category_id_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('category_id', 'Category ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        } else {
            $category_id = $this->input->post('category_id');
            $categories_list = $this->db->get_where("categories", ['status' => 1, 'parent_category_id' => $category_id])->result();
            foreach ($categories_list as $category) {
                $data['categories_id'] = $category->categories_id;
                $data['category_name'] = $category->category_name;
                $data['category_percentage'] = $category->category_percentage;
                $data['parent_category_id'] = $category->parent_category_id;
                $data['parent_sub_category_id'] = $category->parent_sub_category_id;
                if (isset($category->category_image) && $category->category_image != '') {
                    $data['category_image'] = base_url() . 'uploads/category/' . $category->category_image;
                } else {
                    $data['category_image'] = '';
                }
                $data['status'] = $category->status;
                $data['create_date'] = $category->create_date;
                $data['modify_date'] = $category->modify_date;
                $category_list[]           = $data;
            }
            if ($categories_list) {
                $this->response(['success' => true, 'message' => "categories list found successfully.", 'data' => $category_list], REST_Controller::HTTP_OK);
            } else {

                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    /**
     * Get All featured product list.
     *
     * @return Response
     */
    public function featured_product_list_get()
    {
        $featured_products = $this->db->get_where("product", ['featured_status' => 1])->result_array();
        if (!empty($featured_products)) {
        	foreach ($featured_products as $k=>$super_sell_product) {
	            // $featured_array['product_id'] = $super_sell_product->product_id;
	            // $featured_array['product_reg_id'] = $super_sell_product->product_reg_id;
	            // $featured_array['shop_id'] = $super_sell_product->shop_id;
	            // $featured_array['categories_id'] = $super_sell_product->categories_id;
	            // $featured_array['sub_categories_id'] = $super_sell_product->sub_categories_id;
	            // $featured_array['name'] = $super_sell_product->name;
	            // $featured_array['description'] = $super_sell_product->description;
	            // $featured_array['quantity'] = $super_sell_product->quantity;
	            // $featured_array['unit_price'] = $super_sell_product->unit_price;
	            // $featured_array['discount'] = $super_sell_product->discount;
	            // $featured_array['discount_type'] = $super_sell_product->discount_type;
	            // $featured_array['colors'] = $super_sell_product->colors;
	            // $featured_array['choice_options'] = $super_sell_product->choice_options;
	            // $featured_array['variations'] = $super_sell_product->variations;
	            // $featured_array['unit'] = $super_sell_product->unit;
	            // $featured_array['return_policy'] = $super_sell_product->return_policy;
	            // foreach (json_decode($super_sell_product->product_images) as $product_image) {
	            //     $product_images = base_url() . 'uploads/product_images/' . $product_image;
	            //     $product_img[] = json_decode($product_images);
	            // }
	            // $featured_array['product_images'] = $product_img;
	            $featured_products[$k]['main_image'] = base_url() . 'uploads/product_images/' . $super_sell_product['main_image'];
	            // $featured_array['tags'] = $super_sell_product->tags;
	            // $featured_array['meta_title'] = $super_sell_product->meta_title;
	            // $featured_array['meta_image'] = $super_sell_product->meta_image;
	            // $featured_array['num_of_sale'] = $super_sell_product->num_of_sale;
	            // $featured_array['status'] = $super_sell_product->status;
	            // $featured_array['featured_status'] = $super_sell_product->featured_status;
	            // $featured_array['bestseller_status'] = $super_sell_product->bestseller_status;
	            // $featured_array['clearance_status'] = $super_sell_product->clearance_status;
	            // $featured_array['create_date'] = $super_sell_product->create_date;
	            // $data[] = $featured_array;
	        }
            $this->response(['success' => true, 'message' => "Featured product found successfully.", 'data' => $featured_products], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get All best seller products
     *
     * @return Response
     */
    public function best_seller_products_get()
    {
        $best_sellers = $this->db->get_where("product", ['bestseller_status' => 1, 'status' => 1])->result_array();
        foreach($best_sellers as $k=>$best_seller){
            // $best_seller_array['product_id'] = $best_seller['product_id'];
            // $best_seller_array['product_reg_id'] = $best_seller['product_reg_id'];
            // $best_seller_array['shop_id'] = $best_seller['shop_id'];
            // $best_seller_array['categories_id'] = $best_seller['categories_id'];
            // $best_seller_array['sub_categories_id'] = $best_seller['sub_categories_id'];
            // $best_seller_array['name'] = $best_seller['name'];
            // $best_seller_array['description'] = $best_seller['description'];
            // $best_seller_array['quantity'] = $best_seller['quantity'];
            // $best_seller_array['unit_price'] = $best_seller['unit_price'];
            // $best_seller_array['discount'] = $best_seller['discount'];
            // $best_seller_array['discount_type'] = $best_seller['discount_type'];
            // $best_seller_array['colors'] = $best_seller['colors'];
            // $best_seller_array['choice_options'] = $best_seller['choice_options'];
            // $best_seller_array['variations'] = $best_seller['variations'];
            // $best_seller_array['unit'] = $best_seller['unit'];
            // $best_seller_array['return_policy'] = $best_seller['return_policy'];
            // foreach (json_decode($best_seller['product_images']) as $product_image) {
            //     $product_images = base_url() . 'uploads/product_images/' . $product_image;
            //     $product_img[] = $product_images;
            // }
            // $best_seller_array['product_images'] = json_encode($product_img);
            $best_sellers[$k]['main_image'] = base_url() . 'uploads/product_images/' . $best_seller['main_image'];
            // $best_seller_array['tags'] = $best_seller['tags'];
            // $best_seller_array['meta_title'] = $best_seller['meta_title'];
            // $best_seller_array['meta_image'] = $best_seller['meta_image'];
            // $best_seller_array['num_of_sale'] = $best_seller['num_of_sale'];
            // $best_seller_array['status'] = $best_seller['status'];
            // $best_seller_array['featured_status'] = $best_seller['featured_status'];
            // $best_seller_array['bestseller_status'] = $best_seller['bestseller_status'];
            // $best_seller_array['clearance_status'] = $best_seller['clearance_status'];
            // $best_seller_array['create_date'] = $best_seller['create_date'];
            // $data[] = $best_seller_array;
        }
        if(!empty($best_sellers)){
            $this->response(['success' => true, 'message' => "Best Seller found successfully.", 'data' => $best_sellers], REST_Controller::HTTP_OK);
        }else{
        	$this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get All trending product list
     *
     * @return Response
     */
    public function trending_product_list_get()
    {
        $trending_products = $this->Common_model->getLatestRecords("product", 'num_of_sale', 10);
        foreach ($trending_products as $k=>$trending_product) {
            // $trending_product_array['product_id'] = $trending_product['product_id'];
            // $trending_product_array['product_reg_id'] = $trending_product['product_reg_id'];
            // $trending_product_array['shop_id'] = $trending_product['shop_id'];
            // $trending_product_array['categories_id'] = $trending_product['categories_id'];
            // $trending_product_array['sub_categories_id'] = $trending_product['sub_categories_id'];
            // $trending_product_array['name'] = $trending_product['name'];
            // $trending_product_array['description'] = $trending_product['description'];
            // $trending_product_array['quantity'] = $trending_product['quantity'];
            // $trending_product_array['unit_price'] = $trending_product['unit_price'];
            // $trending_product_array['discount'] = $trending_product['discount'];
            // $trending_product_array['discount_type'] = $trending_product['discount_type'];
            // $trending_product_array['colors'] = $trending_product['colors'];
            // $trending_product_array['choice_options'] = $trending_product['choice_options'];
            // $trending_product_array['variations'] = $trending_product['variations'];
            // $trending_product_array['unit'] = $trending_product['unit'];
            // $trending_product_array['return_policy'] = $trending_product['return_policy'];
            
            $trending_products[$k]['main_image'] = base_url() . 'uploads/product_images/' . $trending_product['main_image'];
            // $trending_product_array['tags'] = $trending_product['tags'];
            // $trending_product_array['meta_title'] = $trending_product['meta_title'];
            // $trending_product_array['meta_image'] = $trending_product['meta_image'];
            // $trending_product_array['num_of_sale'] = $trending_product['num_of_sale'];
            // $trending_product_array['status'] = $trending_product['status'];
            // $trending_product_array['featured_status'] = $trending_product['featured_status'];
            // $trending_product_array['bestseller_status'] = $trending_product['bestseller_status'];
            // $trending_product_array['clearance_status'] = $trending_product['clearance_status'];
            // $trending_product_array['create_date'] = $trending_product['create_date'];
            // $data[] = $trending_product_array;
        }
        if (!empty($trending_products)) {
            $this->response(['success' => true, 'message' => "Trending product found successfully.", 'data' => $trending_products], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get All super sell product list
     *
     * @return Response
     */
    public function super_sell_product_list_get()
    {
        $super_sell_products = $this->Common_model->getAllRecordsByLimitId("product", ['clearance_status' => 1, 'status' => 1], 10);
        foreach ($super_sell_products as $k=>$super_sell_product) {
            // $super_sell_array['product_id'] = $super_sell_product['product_id'];
            // $super_sell_array['product_reg_id'] = $super_sell_product['product_reg_id'];
            // $super_sell_array['shop_id'] = $super_sell_product['shop_id'];
            // $super_sell_array['categories_id'] = $super_sell_product['categories_id'];
            // $super_sell_array['sub_categories_id'] = $super_sell_product['sub_categories_id'];
            // $super_sell_array['name'] = $super_sell_product['name'];
            // $super_sell_array['description'] = $super_sell_product['description'];
            // $super_sell_array['quantity'] = $super_sell_product['quantity'];
            // $super_sell_array['unit_price'] = $super_sell_product['unit_price'];
            // $super_sell_array['discount'] = $super_sell_product['discount'];
            // $super_sell_array['discount_type'] = $super_sell_product['discount_type'];
            // $super_sell_array['colors'] = $super_sell_product['colors'];
            // $super_sell_array['choice_options'] = $super_sell_product['choice_options'];
            // $super_sell_array['variations'] = $super_sell_product['variations'];
            // $super_sell_array['unit'] = $super_sell_product['unit'];
            // $super_sell_array['return_policy'] = $super_sell_product['return_policy'];
            // foreach (json_decode($super_sell_product['product_images']) as $product_image) {
            //     $product_images = base_url() . 'uploads/product_images/' . $product_image;
            //     $product_img[] = $product_images;
            // }
            // $super_sell_array['product_images'] = json_encode($product_img);
            $super_sell_products[$k]['main_image'] = base_url() . 'uploads/product_images/' . $super_sell_product['main_image'];
            // $super_sell_array['tags'] = $super_sell_product['tags'];
            // $super_sell_array['meta_title'] = $super_sell_product['meta_title'];
            // $super_sell_array['meta_image'] = $super_sell_product['meta_image'];
            // $super_sell_array['num_of_sale'] = $super_sell_product['num_of_sale'];
            // $super_sell_array['status'] = $super_sell_product['status'];
            // $super_sell_array['featured_status'] = $super_sell_product['featured_status'];
            // $super_sell_array['bestseller_status'] = $super_sell_product['bestseller_status'];
            // $super_sell_array['clearance_status'] = $super_sell_product['clearance_status'];
            // $super_sell_array['create_date'] = $super_sell_product['create_date'];
            // $data[] = $super_sell_array;
        }
        if (!empty($super_sell_products)) {
            $this->response(['success' => true, 'message' => "Super sell found successfully.", 'data' => $super_sell_products], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get common images
     *
     * @return Response
     */
    public function common_images_get()
    {
        $common_images = $this->db->get_where("common_setting", ['status' => 1])->result();

        foreach ($common_images as $common_image) {

            if ($common_image->option_name == 'backedn_login_background_image') {
                $data['background_image'] = base_url() . '/uploads/' . $common_image->option_value;
            }

            if ($common_image->option_name == 'backlogo') {
                $data['background_logo'] = base_url() . '/uploads/' . $common_image->option_value;
            }

            if ($common_image->option_name == 'backedn_login_background_image') {
                $data['front_logo'] = base_url() . '/uploads/' . $common_image->option_value;
            }
        }
        if ($data) {
            $this->response(['success' => true, 'message' => "Super sell found successfully.", 'data' => $data], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Get Banner images
     *
     * @return Response
     */
    public function banner_slider_images_get()
    {
        $banner_slider_images = $this->db->get_where("homebannerslider", ['status' => 1])->result();
        foreach ($banner_slider_images as $banner_slider_image) {
            $data['title'] = $banner_slider_image->title;
            $data['slider_image'] = base_url() . 'uploads/homebannerslider/' . $banner_slider_image->image;
            $data['link'] = $banner_slider_image->link;
            $slider_images[]           = $data;
        }
        if ($slider_images) {
            $this->response(['success' => true, 'message' => "banner slider images found successfully.", 'data' => $slider_images], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    

    /*Nirbhay start */
    /**
     * Get sub sub category by sub category
     *
     * @return Response
     */
    public function subsubcategorylist_by_subcatid_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sub_category_id', 'Sub Category ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        } else {
            $category_id = $this->input->post('sub_category_id');
            $categories_list = $this->db->get_where("categories", ['status' => 1, 'parent_category_id' => $category_id])->result();
            foreach ($categories_list as $category) {
                $data['categories_id'] = $category->categories_id;
                $data['category_name'] = $category->category_name;
                $data['category_percentage'] = $category->category_percentage;
                $data['parent_category_id'] = $category->parent_category_id;
                $data['parent_sub_category_id'] = $category->parent_sub_category_id;
                if (isset($category->category_image) && $category->category_image != '') {
                    $data['category_image'] = base_url() . 'uploads/category/' . $category->category_image;
                } else {
                    $data['category_image'] = '';
                }
                $data['status'] = $category->status;
                $data['create_date'] = $category->create_date;
                $data['modify_date'] = $category->modify_date;
                $category_list[]           = $data;
            }
            if ($categories_list) {
                $this->response(['success' => true, 'message' => "categories list found successfully.", 'data' => $category_list], REST_Controller::HTTP_OK);
            } else {

                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    /**
     * Get sub sub category by sub category
     *
     * @return Response
     */
    public function updateprofile_post()
    {
        if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['auth_token']) && !empty($_POST['auth_token'])) {
            $userId = $_POST['user_id'];
            $auth_token = $_POST['auth_token'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if (isset($userData) && !empty($userData)) {
                $update_data = array();
                if (isset($_POST['full_name']) && !empty($_POST['full_name'])) {
                    $update_data['full_name'] = $_POST['full_name'];
                }
                if (isset($_POST['mobile_no']) && !empty($_POST['mobile_no'])) {
                    $check_mobile_no = $this->Common_model->getWhereData("users", array('id !=' => $userId, 'mobile_no' => $_POST['mobile_no']));
                    // print_r($check_mobile_no);
                    if (!empty($check_mobile_no)) {
                        // echo "hi";
                        // $this->response(['success' => false,'message'=>"Mobile Number already regitered",'data'=>''],REST_Controller::HTTP_NOT_FOUND);
                        // $this->response(['success' => false,'message'=>"Mobile Number already regitered",'data'=>''], REST_Controller::HTTP_CONFLICT);
                        echo json_encode(['success' => false, 'message' => "Mobile Number already regitered", 'data' => ''], true);
                        exit();
                    }
                    $update_data['mobile_no'] = $_POST['mobile_no'];
                }
                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $check_email = $this->Common_model->getWhereData("users", array('id !=' => $userId, 'email' => $_POST['email']));
                    if (!empty($check_email)) {
                        // $this->response(['success' => false,'message'=>"Email already regitered",'data'=>'']);
                        // $this->response(['success' => false,'message'=>"Email already regitered",'data'=>''], REST_Controller::HTTP_CONFLICT);
                        echo json_encode(['success' => false, 'message' => "Email already regitered", 'data' => ''], true);
                        exit();
                    }
                    $update_data['email'] = $_POST['email'];
                }
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $uploadpath = "./uploads/customerprofilepic/";
                    $filearrayddata = $this->uploadfilebypath('image', $uploadpath);
                    if (isset($filearrayddata)) {
                        $update_data['image'] = $filearrayddata;
                    }
                }

                if (isset($_POST['city']) && !empty($_POST['city'])) {
                    $update_data['city'] = $_POST['city'];
                }
                if (isset($_POST['state']) && !empty($_POST['state'])) {
                    $update_data['state'] = $_POST['state'];
                }
                if (isset($_POST['age']) && !empty($_POST['age'])) {
                    $update_data['age'] = $_POST['age'];
                }
                if (isset($_POST['gender']) && !empty($_POST['gender'])) {
                    $update_data['gender'] = $_POST['gender'];
                }
                if (isset($_POST['address']) && !empty($_POST['address'])) {
                    $update_data['address'] = $_POST['address'];
                }
                if(isset($_POST['pincode']) && !empty($_POST['pincode']))
                {
                     $update_data['zipcode'] = $_POST['pincode'];
                }
                $update_data['fcm_token']=$userData['fcm_token'];
                // $result = $this->Common_model->updateRecords('users',$update_data,array('id' => $userId));
                if (isset($update_data) && !empty($update_data)) {
                    $this->Common_model->updateRecords('users', $update_data, array('id' => $userId));
                    $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
                    // if (isset($userData['image']) && !empty($userData['image'])) {
                    //     $userData['image'] = $userData['image'];
                    // }

                    $this->response(['success' => true, 'message' => "Profile has been updated successfully", 'data' => $userData,'profile_img_url'=> base_url() . 'uploads/customerprofilepic/'], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Not changes", 'data' => ''], REST_Controller::HTTP_OK);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['success' => false, 'message' => "User id and auth token are required", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }
    /**
     * get about us content
     *
     * @return Response
     */
    public function aboutus_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Language', 'required');
         if($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        }else{
            $lang=$this->input->post('lang');
            $data_array=array();
            $fileds=array("1"=>"1");
            $checaboutus= $this->Common_model->getSingleRecordById('aboutus',$fileds);
            if($lang=="hi")
            {
                if(!empty($checaboutus['title_hindi']) && !empty($checaboutus['dicription_hindi']))
                {
                    $data_array['title']=$checaboutus['title_hindi'];
                    $data_array['description']=$checaboutus['dicription_hindi'];
                }
            }
            else
            {
                 if(!empty($checaboutus['title']) && !empty($checaboutus['editor1']))
                 {
                    $data_array['title']=$checaboutus['title'];
                    $data_array['description']=$checaboutus['editor1'];
                 }
            }
            if(!empty($data_array)) {
            $this->response(['success' => true, 'message' => "aboutus data found successfully.", 'AboutUS' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        // $seller_data = $this->Common_model->getSingleData('aboutus', array('id' => 1));
        // if ($seller_data) {
        //     $this->response(['success' => true, 'message' => "aboutus data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        // } else {

        //     $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        // }
    }
    /**
     * get user agreement content
     *
     * @return Response
     */
    public function user_agreement_get()
    {
        $seller_data = $this->Common_model->getSingleData('user_agreement', array('id' => 1));
        if ($seller_data) {
            $this->response(['success' => true, 'message' => "user agreement data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * get cancel return content
     *
     * @return Response
     */
    public function cancellationReturnpolicy_get()
    {
        $seller_data = $this->Common_model->getSingleData('cancel_return', array('id' => 2));
        if ($seller_data) {
            $this->response(['success' => true, 'message' => "cancel reurn policy data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * get cancel return content
     *
     * @return Response
     */
    public function termsCondition_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Language', 'required');
         if($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        }else{
            $lang=$this->input->post('lang');
            $data_array=array();
            $fileds=array("1"=>"1");
            $checckterm_cond= $this->Common_model->getSingleRecordById('terms_condition',$fileds);
            if($lang=="hi")
            {
                if(!empty($checckterm_cond['title_hindi']) && !empty($checckterm_cond['description']))
                {
                    $data_array['title']=$checckterm_cond['title'];
                    $data_array['editor1']=$checckterm_cond['editor1'];
                }
            }
            else
            {
                if(!empty($checckterm_cond['title']) && !empty($checckterm_cond['editor1']))
                {
                    $data_array['title']=$checckterm_cond['title'];
                    $data_array['editor1']=$checckterm_cond['editor1'];
                }
            }
            if(!empty($data_array)) {
            $this->response(['success' => true, 'message' => "terms and condition found successfully.", 'Terms' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        // $seller_data = $this->Common_model->getSingleData('terms_condition', array('id' => 1));
        // if ($seller_data) {
        //     $this->response(['success' => true, 'message' => "terms condition data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        // } else {
        //     $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        // }
    }

    /**
     * get privacy policy content
     *
     * @return Response
     */
    public function privacyPolicy_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Languge', 'required');
         if($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        }else{
            $lang=$this->input->post('lang');
            $fileds=array("1"=>"1");
            $check_privacy_policy= $this->Common_model->GetWhere('user_privacy_policy',$fileds);
            $data_array=array();
            if(!empty($check_privacy_policy))
            {
                foreach ($check_privacy_policy as $key => $value) {
                    if($lang=="hi")
                    {
                        if(!empty($value['title_hindi']) && !empty($value['dicription_hindi']))
                        {
                            $data_array[$key]['title']=$value['title'];
                            $data_array[$key]['editor1']=$value['editor1'];
                        }
                    }else{
                        if(!empty($value['title']) && !empty($value['editor1']))
                        {
                            $data_array[$key]['title']=$value['title'];
                            $data_array[$key]['editor1']=$value['editor1'];
                        }
                    }
                }
            }else{
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }

            if(!empty($data_array)) {
            $this->response(['success' => true, 'message' => "privacy policy data found successfully.", 'privacy_policy' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
       /* $seller_data = $this->Common_model->getSingleData('user_privacy_policy', array('id' => 1));
        if ($seller_data) {
            $this->response(['success' => true, 'message' => "privacy policy data found successfully.", 'data' => $seller_data], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }*/
    }
    /**
     * get product list with filtter
     *
     * @return Response
     */
    public function productlist_post()
    {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        $whr = array();
        $whr[] = "status=1";
        // if (isset($data['categories_id']) && !empty($data['categories_id'])) {
        //     $whr[] = "categories_id = " . $data['categories_id'] . "";
        // }
        // if (isset($data['sub_categories_id']) && !empty($data['sub_categories_id'])) {
        //     $whr[] = "sub_categories_id = " . $data['sub_categories_id'] . "";
        // }
        // if (isset($data['sub_subcategories_id']) && !empty($data['sub_subcategories_id'])) {
        //     $whr[] = "sub_subcategories_id = " . $data['sub_subcategories_id'] . "";
        // }
        if (isset($data['tags']) && !empty($data['tags'])) {
            // $whrp[] = " '".$data['tags']."' in(tags,name,description)";
            $whr[] = " (tags LIKE '%" . $data['tags'] . "%' OR name LIKE '%" . $data['tags'] . "%' OR description LIKE '%" . $data['tags'] . "%' OR meta_title LIKE '%" . $data['tags'] . "%' OR meta_description LIKE '%" . $data['tags'] . "%')";
        }
        // $whr[] = "categories_id=".;
        $where = " WHERE " . implode(" AND ", $whr);
        $orderby = "order by product_id asc";
        // if (isset($data['sortby']) && !empty($data['sortby'])) {
        //     if ($data['sortby'] == "pricesortmintomax") {
        //         $orderby = "order by unit_price asc";
        //     }
        //     if ($data['sortby'] == "pricesortmaxtomin") {
        //         $orderby = "order by unit_price desc";
        //     }
        //     if ($data['sortby'] == "newest") {
        //         $orderby = "order by create_date desc";
        //     }
        //     if ($data['sortby'] == "rating") {
        //         $orderby = "order by avg_rating desc";
        //     }
        // }

        $productsData = $this->Common_model->getwherecustomecol('product', "*", $where, $orderby);
        if (!empty($productsData)) {

            
            $this->response(['success' => true, 'message' => "success", 'data' => $productsData], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /**
     * get product list with filtter
     *
     * @return Response
     */
    public function productDetail_post()
    {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        if (isset($data['product_id']) && !empty($data['product_id'])) {
            // print_r($data);
            $whr = array();
            $whr[] = "status=1";

            $whr[] = "product_id = " . $data['product_id'] . "";

            // $whr[] = "categories_id=".;
            $where = " WHERE " . implode(" AND ", $whr);
            $orderby = "";
            $productsData = $this->Common_model->getwherecustomecol('product', "*", $where, $orderby);
            if (!empty($productsData)) {

      //           foreach ($productsData as $k => $productsDataarray) {

      //               $whrr = array();
      //               $whrr[] = "p.status = 1";
      //               if (isset($data['product_id']) && !empty($data['product_id'])) {
						// $whrr[] = "p.product_id = " . $data['product_id'] . "";
      //               }
      //               $wherer = " WHERE " . implode(" AND ", $whrr);
      //               $productsData[$k]['userreviewrating'] = $this->Common_model->getwhrproductratingdetailwithusername($wherer);
      //               if (isset($productsData[$k]['userreviewrating']) && !empty($productsData[$k]['userreviewrating'])) {
      //                   foreach ($productsData[$k]['userreviewrating'] as $ks => $userreviewsarray){
      //                       $productsData[$k]['userreviewrating'][$ks]['image'] = (isset($userreviewsarray['image']) && !empty($userreviewsarray['image']) ? base_url() . 'uploads/customerprofilepic/' . $userreviewsarray['image'] : '');
      //                   }
      //               }
      //           }

                $this->response(['success' => true, 'message' => "success", 'data' => $productsData[0]], REST_Controller::HTTP_OK);

            } else {

                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

     /**
     * Functin for upload image
     *
     * @return Response
     */
    public function uploadfilebypath($key, $path)
    {
        $message = array();
        $data = array();
        if ($_FILES[$key]['size'] > 0) {
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

            if ($this->upload->do_upload($key)) {
                $uploadData = $this->upload->data();
                $image_name = $uploadData['file_name'];
                return $image_name;
            } else {
                echo $this->upload->display_errors();
            }
        } else {
            return 'Your uploaded image file is blank.';
        }
    }

    /*Nirbhay End */

    /**
     * Submit contact us form
     *
     * @return Response
     */
    public function contact_us_post()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric|trim');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $insert_data = array();
            $insert_data['name'] = $this->input->post('name');
            $insert_data['email'] = $this->input->post('email');
            $insert_data['number'] = $this->input->post('mobile_no');
            $insert_data['message'] = $this->input->post('message');
            $insert_data['create_date'] = date('Y-m-d H:i:s');
            $result = $this->Common_model->addrecords('contactus', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "Contact us has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.",], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    /**
     * Add Multi Address
     *
     * @return Response
     */
    public function add_multi_address_post()
    {
        // $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|numeric|trim');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $data = array();
            $data['user_id']    = $this->input->post('user_id');
            $data['name']       = $this->input->post('name');
            $data['email']      = $this->input->post('email');
            $data['phone']      = $this->input->post('mobile_no');
            $data['zipcode']    = $this->input->post('zipcode');
            $data['address']    = $this->input->post('address');
            $data['latitude']   = $this->input->post('latitude');
            $data['longitude']  = $this->input->post('longitude');

            $add_id             = $this->input->post('add_id');

            if (isset($add_id) && !empty($add_id)) {
                $this->Common_model->updateRecords('multiple_address', $data, ['add_id' => $_POST['add_id']]);
                $this->response(['success' => true, 'message' => "Successfully Updated."], REST_Controller::HTTP_OK);
                $data['SUCCESS'] = "Successfully Updated";
            } else {
                $this->Common_model->addRecords('multiple_address', $data);
                $this->response(['success' => true, 'message' => "Added successfully."], REST_Controller::HTTP_OK);
            }
        }
    }

    /**
     * Get Multi Address List
     *
     * @return Response
     */
    public function multi_address_list_post()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim|numeric');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $id             = $this->input->post('user_id');
            if (isset($id) && !empty($id)) {
                $multiple_address_data = $this->db->get_where("multiple_address", ['user_id' => $id])->result();
                $this->response(['success' => true, 'message' => "fetch Address successfully.", 'data' => $multiple_address_data], REST_Controller::HTTP_OK);
            } else {
                
            }
        }
    }

    /**
     * Delete Multi Address
     *
     * @return Response
     */
    public function delete_multi_address_post()
    {
        $this->form_validation->set_rules('id', 'ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $id = $this->input->post('id');
            $this->Common_model->deleteRecords('multiple_address', ['add_id' => $id]);
            $this->response(['success' => true, 'message' => "Delete address successfully."], REST_Controller::HTTP_OK);
        }
    }
    
    /**
     * Set unset Defalut Address
     *
     * @return Response
     */
    public function set_unset_defallt_address_post()
    {
        $this->form_validation->set_rules('status', 'Status', 'required|numeric|trim');
        $this->form_validation->set_rules('add_id', 'Address ID', 'required|numeric|trim');
        $this->form_validation->set_rules('user_id', 'Address ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $status = $this->input->post('status');
            $add_id = $this->input->post('add_id');
            $userid = $this->input->post('user_id');
            if (isset($status) && $status == 1) {
                $data['status'] = 0;
                $this->Common_model->updateRecords('multiple_address', $data, ['add_id' => $add_id]);
                $this->response(['success' => true, 'message' => "Successfully Updated."], REST_Controller::HTTP_OK);
                $data['SUCCESS'] = "Successfully Updated";
            } else {
                $data['status'] = 1;
                $res = $this->Common_model->updateRecords('multiple_address', array('status'=> 0), array('user_id' => $userid));
                $this->Common_model->updateRecords('multiple_address', $data, ['add_id' => $add_id]);
                $this->response(['success' => true, 'message' => "Successfully Updated."], REST_Controller::HTTP_OK);
            }
        }
    }

    /**
     * Change Password
     *
     * @return Response
     */
    
//funtion to get email of user to send password

/*	

    public function change_password_post()
    {
        $this->form_validation->set_rules('subscriber_id', 'User ID', 'required|trim');
       // $this->form_validation->set_rules('auth_token', 'Auth Token', 'required|trim');
        
     //$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
     $this->form_validation->set_rules('password', 'Password', 'required|trim');
     $this->form_validation->set_rules('confirm_password', 'Confirm Passwotd', 'required|matches[password]|trim');
    if ($this->form_validation->run() == FALSE){
      $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
      //  $current_password = $this->input->post('current_password');
        $password = $this->input->post('password');
         $subscriber_id = $this->input->post('subscriber_id');
         $check_admin_password = $this->Common_model->getSingleRecord("users", ['id' => $subscriber_id]);
         $admin_current_password = $check_admin_password['password'];
         $current_password = md5(trim($current_password));
            if ($admin_current_password != $current_password){
                $this->response(['success' => false, 'message' => "Invalid Current Password...!"], REST_Controller::HTTP_NOT_FOUND);
            } else {
                $new_password = md5(trim($password));
                $this->Common_model->updateRecords('users', array('password' => $new_password, 'show_password' => $password), ['id' => $user_id]);
                $this->response(['success' => true, 'message' => "Password updated successfully!"], REST_Controller::HTTP_OK);
            }
        }
    }

    public function forgot_password_post()
    {
        $this->form_validation->set_rules('user_contact_number','user_contact_number', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_contact_number = $this->input->post('user_contact_number');
            $checkmobileno = $this->Common_model->GetWhere('users', array('user_contact_number' => $user_contact_number));
            if (!empty($checkmobileno)) {
                $post_data = array();
                $post_data['user_contact_number'] = $user_contact_number;
                $country_isd_code = '91';
                $respotp = $this->forgot_otp_send($user_contact_number, $country_isd_code);
                $resotparray = json_decode($respotp, true);
                $message="Your Otp hass been forget successfully your current otp is ".$resotparray['otp'];
                //$this->load->helper('sendsms_helper');
                if (!empty($resotparray) && $resotparray['status'] == 1) {
                     sendsms($user_contact_number,$country_isd_code,$message);
                    $this->response(['success' => true, 'message' => "Your OTP has been sent successfully, please check your Number for getting OTP...@",'otp'=>$resotparray['otp']], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Invalid Mobile No."], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Invalid mobile number. please try again."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }


    public function forgot_otp_send($mobile_no, $country_isd_code)
    {
        if ($mobile_no) {
            $otp = $this->Authentication_model->createCode('forgot_otp', 'otp', 6);
            $check_user = $this->Common_model->getSingleRecordById('forgot_otp', array('mobile_no' => $mobile_no));
            $post_data = array();
            $post_data['mobile_no'] = $mobile_no;
            $post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['otp'] = $otp;
            if ($check_user) {
                $update = $this->Common_model->updateRecords('forgot_otp', $post_data, array('mobile_no' => $mobile_no));
            } else {
                $add_otp = $this->Common_model->addRecords('forgot_otp', $post_data);
            }
            $check_number = $this->Common_model->getwhere('users', array('mobile_no' => $mobile_no));
            if (!empty($check_number)) {
                $user_number = $mobile_no;
                $user_country_isd_code = $country_isd_code;
                $user_number_isd_code =  $user_country_isd_code . $user_number;
                if (!empty($user_number_isd_code)) {
                    $message = "your Txn OTP " . $otp;
                    $response = sendotp($user_number, $user_country_isd_code, $otp);
                    if ($response) {
                        $msg = array('status' => 1,'otp'=>$otp, 'msg' => 'Your OTP has been sent successfully, please check your Number for getting OTP...@');
                        return json_encode($msg);
                        exit();
                    } else {
                        $msg = array('status' => 1, 'msg' => 'Error submitting!');
                        return json_encode($msg);
                        exit();
                    }
                } else {
                    $msg = array('status' => 1, 'msg' => 'Your Number not registered!');
                    return json_encode($msg);
                    exit();
                }
            }
        }
    }

    public function verify_Forgot_otp_post()
    {
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $otp = $this->input->post('otp');
            $mobile_no = $this->input->post('email');
            $checkmobilenootp = $this->Common_model->GetWhere('forgot_otp', array('email' => $email, 'otp' => $otp));

            if (isset($checkmobilenootp) && !empty($checkmobilenootp)) {
                $this->response(['success' => true, 'message' => "OTP has been verify successfully please login now."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid otp please enter valid otp."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function change_forgot_password_post()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile No', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $mobile_no = $this->input->post('mobile_no');
            if (isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password)) {
                $post_data = array();
                $post_data['show_password'] = $password;
                $post_data['password'] = md5($password);
                $this->Common_model->updateRecords('users', $post_data, array('mobile_no' => $mobile_no));
                $this->response(['success' => true, 'message' => "your password has been changed successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "password and confirm password are required please try again"], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
*/
    public function add_shipping_info_post()
    {
        $this->form_validation->set_rules('user_id', 'User ID', 'required|numeric|trim');
        $this->form_validation->set_rules('address_id', 'address ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $address_id = $this->input->post('address_id');
            $postal_code = $this->input->post('postal_code');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $mobile_no = $this->input->post('mobile_no');
            $new_address = $this->input->post('new_address');
            $data = array();
            $data['customerData'] = customerdata($user_id);
            $allzipcodes = $this->Common_model->getWhereDatanew('area', array('status' => 1), 'area_zipcode');
            $allzipcodesarray = array();
            if (isset($allzipcodes) && !empty($allzipcodes)) {
                foreach ($allzipcodes as $allzipcodesa) {
                    $allzipcodesarray[] = $allzipcodesa['area_zipcode'];
                }
            }
            if (isset($address_id) && $new_address == "newadd") {
                if (in_array($postal_code, $allzipcodesarray)) {
                    $insert_address = array();
                    $insert_address['user_id'] = $user_id;
                    $insert_address['address'] = $address_id;
                    $insert_address['zipcode'] = $postal_code;
                    $insert_address['name'] = $name;
                    $insert_address['email'] = $email;
                    $insert_address['phone'] = $mobile_no;
                    $insert_address['status'] = 1;
                    $rsid = $this->Common_model->addRecords('multiple_address', $insert_address);
                    if ($rsid) {
                        $this->Common_model->updateRecords('multiple_address', array('status' => 0), array('user_id' => $user_id, 'add_id !=' => $rsid));
                        $this->session->set_userdata('shippinginfo', $_POST);
                        $this->response(['success' => true, 'message' => "Redirect to payment checkout page"], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['success' => false, 'message' => "Oops Something Went Wrong please try again."], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response(['success' => false, 'message' => "Your pin code is not available, please use valid pin code"], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                if(isset($address_id)){
                    $oldaddress = $this->Common_model->getSingleRecord("multiple_address",array('add_id' => $address_id));
                    if(isset($oldaddress) && !empty($oldaddress)){
                        $post_data = array();
                        $post_data['name'] = $oldaddress['name'];
                        $post_data['email'] = $oldaddress['email'];
                        $post_data['postal_code'] = $oldaddress['zipcode'];
                        $post_data['phone'] = $oldaddress['phone'];
                        $post_data['address'] = $oldaddress['address'];
                        $post_data['latitude'] = $oldaddress['latitude'];
                        $post_data['longitude'] = $oldaddress['longitude'];
                        if (in_array($oldaddress['zipcode'], $allzipcodesarray))
                        {
                            $this->session->set_userdata('shippinginfo',$post_data);
                            $this->response(['success' => true, 'message' => "Redirect to payment checkout page"], REST_Controller::HTTP_OK);
                        }
                        else
                        {
                            $this->response(['success' => false, 'message' => "Your pin code is not available, please use valid pin code"], REST_Controller::HTTP_NOT_FOUND);
                        }
                    }
                }else{
                    $this->response(['success' => false, 'message' => "Please select any address."], REST_Controller::HTTP_NOT_FOUND);
                }
            }
        }
    }

    public function coupon_code_apply_post()
    {
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required|trim');
        $this->form_validation->set_rules('user_id', 'User ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
                $cid = $this->input->post('user_id');
                if (isset($cid) && !empty($cid)) {
                    $couponcode = $this->input->post('coupon_code');
                    $check_couponcode = $this->Common_model->getSingleRecord("coupons", array('coupon_code' => $couponcode));
                    if (isset($check_couponcode) && !empty($check_couponcode)) {
                        if ($check_couponcode['status'] == 1) {
                            $startdate = strtotime($check_couponcode['start_date']);
                            $expire = strtotime($check_couponcode['end_date']);
                            $today = strtotime(date('Y-m-d'));
                            if ($today <= $expire && $today >= $startdate) {
                                $check_orders = $this->Common_model->getSingleRecord("orders", array('coupon_code' => $couponcode, 'user_id' => $cid));
                                if (isset($check_orders) && !empty($check_orders)) {
                                    $this->response(['success' => false, 'message' => "You have already used this coupon code."], REST_Controller::HTTP_NOT_FOUND);
                                } else {
                                    $this->session->set_userdata('couponcode', $check_couponcode);
                                    $this->response(['success' => true, 'message' => "Coupon code has been Applied successfully.",'data'=>$check_couponcode], REST_Controller::HTTP_OK);
                                }
                            } else {
                                $this->response(['success' => false, 'message' => "This coupon code currently not acivated."], REST_Controller::HTTP_NOT_FOUND);
                            }
                        } else {
                            $this->response(['success' => false, 'message' => "This coupon code has been deactivated."], REST_Controller::HTTP_NOT_FOUND);
                        }
                    } else {
                        $this->response(['success' => false, 'message' => "Invalid coupon code."], REST_Controller::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response(['success' => false, 'message' => "Your session has been expired."], REST_Controller::HTTP_NOT_FOUND);
                }

        }
    }

    public function payment_checkout_post()
    {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        if(isset($data) && !empty($data)){
            $user_id = (isset($data['user_id'])?$data['user_id']:'');
            $auth_token = (isset($data['auth_token'])?$data['auth_token']:'');
            $userData = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
            if(isset($userData) && !empty($userData)){
                $payment_type = $data['payment_option'];
                $shippinginfo = $this->session->userdata('shippinginfo');
                $cart_data = $data['cart'];
                $insert_orderData = array();
                if($data['sub_total']>=150){
                    if(isset($cart_data) && !empty($cart_data)) {
                        if($payment_type == "cash"){
                            $insert_orderData['user_id'] = $user_id;
                            $insert_orderData['coupon_code'] = (isset($data['coupon_code'])?$data['coupon_code']:'');
                            $insert_orderData['coupon_discount'] = (isset($data['coupon_discount'])?$data['coupon_discount']:0);
                            $insert_orderData['shipping_charge'] = (isset($data['shipping_charge'])?$data['shipping_charge']:0);
                            $insert_orderData['payment_type'] = (isset($payment_type)? $payment_type:'cash');
                            $insert_orderData['shipping_address'] = json_encode($data['shipping_address'], true);
                            $insert_orderData['billing_address'] = json_encode($data['billing_address'], true);
                            $insert_orderData['delivery_status'] = 1;
                            $insert_orderData['grand_total'] = $data['grand_total'];
                            $insert_orderData['sub_total'] =    $data['sub_total'];
                            $insert_orderData['create_date'] = (isset($data['create_date'])?$data['create_date']:date('Y-m-d H:i:s'));
                            $rid = $this->Common_model->addRecords('orders', $insert_orderData);
                                if($rid){
                                    $u_data = array();
                                    $u_data['invoice_no'] = "INC" . date('Y') . "I" . $rid;
                                    $update = $this->Common_model->updateRecords('orders', $u_data, array('id' => $rid));
                                        if(isset($cart_data) && !empty($cart_data)){
                                            foreach ($cart_data as $orderproductdataarray){
                                                $orderproductdata = array();
                                                $orderproductdata['order_id'] = $rid;
                                                $orderproductdata['product_id'] = $orderproductdataarray['product_id'];
                                                $orderproductdata['product_name'] = $orderproductdataarray['product_name'];
                                                
                                               
                                                $orderproductdata['quantity'] = $orderproductdataarray['quantity'];
                                                $orderproductdata['mrp_price'] = $orderproductdataarray['mrp_price'];
                                                $orderproductdata['generic_price'] = $orderproductdataarray['generic_price'];
                                                
                                                $orderproductdata['subtotal_generict_price'] = $orderproductdataarray['subtotal_generict_price'];
                                                $orderproductdata['description'] = $orderproductdataarray['description'];
                                                $this->Common_model->addRecords('order_products', $orderproductdata);
                                            }
                                        } 
                                        $this->Common_model->deleteRecords('cartdata',array("user_id"=>$user_id));

                                    $this->response(['success' => true, 'message' => "Order has been created successfully."], REST_Controller::HTTP_OK);
                                } else {
                                    $this->response(['success' => true, 'message' => "Oops something went wrong please try again."], REST_Controller::HTTP_NOT_FOUND);
                                }
                        }
                    } else {
                        $this->response(['success' => false, 'message' => "Cart is empty."], REST_Controller::HTTP_NOT_FOUND);
                    }
                }else{
                    $this->response(['success' => false, 'message' => "Your cart value must be greater than ₹150 , Please add more item."], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response(['success' => false, 'message' => "Invalid user detail please try again."], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $response = array('success' => false, 'message' => "Invalid data please try agian.");
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function order_count_post()
    {
        $this->form_validation->set_rules('user_id', 'User id', 'required');
        $this->form_validation->set_rules('auth_token', 'Auth token', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $auth_token = $this->input->post('auth_token');

            $column="COUNT(id) as id";
            $table="orders";
            $where="WHERE user_id=".$user_id;
            $data_count=$this->Common_model->getCountColumn($column,$table,$where);
            $userData = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
            if(!empty($userData))
            {
                $this->response(['success' => true, 'message' => "Order count here.",'order_count'=>$data_count['id']], REST_Controller::HTTP_OK);
            }else{
                 $this->response(['success' => false, 'message' => "Invalid Credentials."], REST_Controller::HTTP_OK);
            }
        }
    }
    public function orderHistory_post()
    {
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        $user_id = (isset($data['user_id'])?$data['user_id']:'');
        $auth_token = (isset($data['auth_token'])?$data['auth_token']:'');
        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
        if(isset($user_detail) && !empty($user_detail)){
            $user_id = $user_detail['id'];
            $orderData = array();
            if (isset($user_id) && !empty($user_id)) {
                $whr = array();
                $whr[] = "o.status = 1";
                $whr[] = "o.user_id = " . $user_id . "";
                if (isset($data['delivery_status']) && !empty($data['delivery_status'])) {
                    $whr[] = "o.delivery_status = " . $data['delivery_status'] . "";
                }

                $orderby = " ORDER BY o.id desc";
                $where = " WHERE " . implode(" AND ", $whr);
                $orderData = $this->Common_model->getwhereorders($where, $orderby);
                $this->response(['success' => true, 'message' => "Get all record successfully.", "data" => $orderData], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Redirect to home page."], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function cancelOrder_post()
    {
        $this->form_validation->set_rules('user_id', 'User id', 'required');
        $this->form_validation->set_rules('auth_token', 'Auth token', 'required');
        $this->form_validation->set_rules('id', 'Oder Id', 'required');
         if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $user_id = $this->input->post('user_id');
            $auth_token = $this->input->post('auth_token');
            $id = $this->input->post('id');
            $updata=array();
            $updata['delivery_status']=5;
            $updata['user_id']=$user_id;
            if(!empty($user_id))
            {
                $this->Common_model->updateData('orders',$updata,array('id' =>$id));
                $this->response(['success' => true, 'message' => "Order has been cancelled successfully"], REST_Controller::HTTP_OK);
            }else{
                $this->response(['success' => false, 'message' => "Invalid Credentials."], REST_Controller::HTTP_OK);
            }
            //$this->Common_model->updateData('orders',$updata,array('user_id' =>));
        }
    }
	public function orderDetail_post(){
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        $user_id = (isset($data['user_id'])?$data['user_id']:'');
        $auth_token = (isset($data['auth_token'])?$data['auth_token']:'');
        $orderId = (isset($data['orderId'])?$data['orderId']:'');
        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
        if(isset($user_detail) && !empty($user_detail)){
            $user_id = $user_detail['id'];
            $orderdata = array();
            if (isset($user_id) && !empty($user_id)) {
                $whr = array();
                $whr[] = "o.status = 1";
                $whr[] = "o.user_id = " . $user_id . "";
                $whr[] = "o.id = " . $orderId . "";
                $where = " WHERE " . implode(" AND ", $whr);
                $orderdata = $this->Common_model->getwheresingleorder($where);
                if(isset($orderdata) && !empty($orderdata)){
                    $orderdata['shipping_address'] = json_decode($orderdata['shipping_address'],true);
                    $orderdata['orderProducts'] = $product= $this->Common_model->getWhereData("order_products",array('order_id'=>$orderId));
                    $this->response(['success' => true, 'message' => "Get all record successfully.", "data" => $orderdata],REST_Controller::HTTP_OK);
                }else{
                    $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
                }
            } else {
                $this->response(['success' => false, 'message' => "Redirect to home page."], REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function product_detail_post(){
        $this->form_validation->set_rules('pid', 'Product ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $pid = $_GET['pid'];
            $data = array();
            $data['product_data'] = $this->Common_model->getSingleRecordById("product",array('product_id'=>$pid));
            $data['color'] = $this->Common_model->getwhere("colors",array(1=>1));
            $data['categorylist'] = $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>0));
            $this->response(['success' => true, 'message' => "Detail record successfully.","data" => $data], REST_Controller::HTTP_OK);
        }
    }

    public function invoice_post()
    {
        $this->form_validation->set_rules('order_id', 'Order ID', 'required|numeric|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_detail = $this->session->userdata('user_data');
            if (isset($user_detail) && !empty($user_detail)) {
                $user_id = $user_detail['id'];
                $order_id = $this->input->post('order_id');
                $data = array();
                $whr = array();
                $whr[] = "user_id =" . $user_id;
                $whr[] = "id =" . $order_id;
                $where = " WHERE " . implode(" AND ", $whr);
                $data['orderdata'] = $this->Common_model->getwheresingleorder($where);
                $this->response(['success' => true, 'message' => "Get invoice successfully.", "data" => $data], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "You are not logged in."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function delete_order_post()   
    {
        $this->form_validation->set_rules('order_id', 'Order ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $order_id = $this->input->post('order_id');
              $this->Common_model->deleteRecords('order_products',array('order_id' => $order_id));
              $this->Common_model->deleteRecords('orders',array('id' => $order_id));
              $this->response(['success' => true, 'message' => "Order deleted successfully!"], REST_Controller::HTTP_OK);
        }
    }
    
    public function support_ticket_post(){
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        $this->form_validation->set_rules('query', 'Query', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
        	$user_id = $this->input->post('user_id');
            $query = $this->input->post('query');
	        $auth_token = (isset($_POST['auth_token'])?$_POST['auth_token']:'');
	        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
	        if(isset($user_detail) && !empty($user_detail)){
	            $insert_data = array();
	            $insert_data['query'] = $query;
	            $insert_data['user_type'] = 'customer';
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
	            $data = array();
	            $data['support'] = $this->Common_model->getWhereData('support_ticket',array('user_type'=>'customer','user_id'=>$user_id));  
	            $this->response(['success' => true,'data' => $data['support'], 'message' => "Ticket generated successfully"], REST_Controller::HTTP_OK);
	        }else{
	        	$this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
	        }
        }
    }

    public function support_ticketlist_post(){
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
        	$user_id = $this->input->post('user_id');
	        $auth_token = (isset($_POST['auth_token'])?$_POST['auth_token']:'');
	        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
	        if(isset($user_detail) && !empty($user_detail)){
	            // $insert_data = array();
	            // $insert_data['query'] = $query;
	            // $insert_data['user_type'] = 'customer';
	            // $insert_data['create_date'] = date('Y-m-d H:i:s');
	            // $insert_data['user_id'] = $user_id;
	            // $result = $this->Common_model->addRecords('support_ticket',$insert_data);
	            // if(isset($result)){
	            //     $newid = ticketid_prefix.date("Y").$result;
	            //     if(isset($newid)){
	            //         $updata = array();
	            //         $updata['ticket_reg_id'] = $newid;
	            //     }
	            // }
	            // $this->Common_model->updateData('support_ticket',$updata,array('ticket_id' => $result));
	            // $data = array();
	            $supportData = $this->Common_model->getWhereData('support_ticket',array('user_type'=>'customer','user_id'=>$user_id));  
	            $this->response(['success' => true,'data' => $supportData, 'message' => "Success"], REST_Controller::HTTP_OK);
	        }else{
	        	$this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
	        }
        }
    }

    public function submit_chatmessage_post(){
        $this->form_validation->set_rules('ticket_id', 'Ticket ID', 'required|trim');
        $this->form_validation->set_rules('message', 'Message ID', 'required|trim');
        $this->form_validation->set_rules('user_id', 'User ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $user_id = $this->input->post('user_id');
            $auth_token = (isset($_POST['auth_token'])?$_POST['auth_token']:'');
	        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
	        if(isset($user_detail) && !empty($user_detail)){
	            $ticket_id = $this->input->post('ticket_id');
	            $message = $this->input->post('message');
	            // $id = base64_decode($ticket_id);
	            $insert_data = array();
	            $insert_data["ticket_id"] = $ticket_id;
	            $insert_data["from_id"] = $user_id;
	            $insert_data["to_id"] = 1;
	            $insert_data["user_type"] = 'customer';
	            $insert_data["message"] = $message;
	            $insert_data['create_date'] = date('Y-m-d H:i:s');
	            $this->Common_model->addRecords('support_message',$insert_data);
	            $this->response(['success' => true, 'message' => "Message send successfully!"], REST_Controller::HTTP_OK);
	        }else{
	        	$this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);	
	        }
        }      
    }

    public function support_chat_post(){
        $this->form_validation->set_rules('ticket_id', 'Ticket ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
        	$user_id = $this->input->post('user_id');
            $auth_token = (isset($_POST['auth_token'])?$_POST['auth_token']:'');
	        $user_detail = $this->Common_model->getSingleRecord("users", array('id' => $user_id, 'status' => 1,'auth_token'=>$auth_token));
	        if(isset($user_detail) && !empty($user_detail)){
	            $ticket_id = $this->input->post('ticket_id');
	            $data = array();
	            // $id = base64_decode($ticket_id);
	    		$data['ticketData'] = $this->Common_model->getSingleRecord('support_ticket',array('ticket_id'=>$ticket_id,'user_id'=>$user_id));
	    		if(isset($data['ticketData']) && !empty($data['ticketData'])){
	            	$data['supportchat'] = $this->Common_model->getWhereData('support_message',array('ticket_id'=>$ticket_id));
	            
	            	$this->response(['success' => true, 'message' => "Fetch all record.", 'data' => $data], REST_Controller::HTTP_OK);
	            }else{
	            	$this->response(['success' => false, 'message' => "Invalid ticket id"], REST_Controller::HTTP_NOT_FOUND);
	            }
	        }else{
	        	$this->response(['success' => false, 'message' => "Invalid Credentials"], REST_Controller::HTTP_NOT_FOUND);
	        }
        }
    }

    public function support_chat_message_post(){
        $this->form_validation->set_rules('ticket_id', 'Ticket ID', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $ticket_id = $this->input->post('ticket_id');
            $id = base64_decode($ticket_id);
            $data = array();
            $data['support'] = $this->Common_model->getWhereData('support_message',array('ticket_id'=>$id));
            $this->response(['success' => true, 'message' => "Redirect to support chat", 'data' => $data], REST_Controller::HTTP_OK);
        }
    }

    public function update_quantity_post()
    {
        $this->form_validation->set_rules('index', 'Index', 'required|trim');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $cart = $this->session->userdata('cart');
            $kkey = $_POST['index'];
            $quantity = $_POST['quantity'];
            $ccdata = $cart;
            foreach($cart as $key => $value)
            {
                if($key == $kkey){
                      $ccdata[$kkey]['quantity'] = $quantity;
                      $ccdata[$kkey]['price'] = $value['price'];
                      $ccdata[$kkey]['subtotal_price'] = $value['price'] * $quantity;
    
                      $product= $this->Common_model->getSingleRecordById("product",array('product_id'=>$value['id']));
                      if(isset($product) && !empty($product)){
                        $scategoryid =  $product['categories_id'];
                         if(isset($product['sub_categories_id']) && !empty($product['sub_categories_id'])){
                          $scategoryid =  $product['sub_categories_id'];
                         }
                        $catdata = $this->Common_model->getSingleRecordById("categories",array('categories_id'=>$scategoryid));
                    }
                    if(isset($catdata) && !empty($catdata)){
                          $ccdata[$kkey]['admincommission'] = trim($ccdata[$kkey]['subtotal_price'] * $catdata['category_percentage']/100);
                        $ccdata[$kkey]['shopamount'] = trim($ccdata[$kkey]['subtotal_price'] - $ccdata[$kkey]['admincommission']);
                    }
                }
            }
            $this->session->set_userdata('cart', $ccdata);
            $this->response(['success' => true, 'message' => "Cart update successfully.", 'data' => $ccdata], REST_Controller::HTTP_OK);
        }
    }

    public function remove_cart_product_post(){
        $this->form_validation->set_rules('index', 'Index', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $pindex = $_POST['index'];
            $ccdata = $this->session->userdata('cart');
            unset($ccdata[$pindex]);
            $this->session->set_userdata('cart', $ccdata);
            $this->response(['success' => true, 'message' => "Product has been Removed successfully.", 'data' => $ccdata], REST_Controller::HTTP_OK);
        }
    }

    public function cart_count_get(){
    	$spdata = $this->session->userdata('cart');
		$totalcoutproduct = (isset($spdata) && !empty($spdata) ? count($spdata) : 0);
		$this->response(['success' => true, 'message' => "Get total cart item.", 'data' => $totalcoutproduct], REST_Controller::HTTP_OK);
    }

    public function remove_coupon_code_get(){
    	$this->session->unset_userdata('couponcode');
        $this->response(['success' => true, 'message' => "Coupon code has been remove successfully."], REST_Controller::HTTP_OK);
    }

    public function getcolornamebycode_post(){
        $color_code = $_POST['code'];
        $coloutcodedata = $this->Common_model->getSingleRecordById("colors",array('code'=>$color_code));
        if(isset($coloutcodedata) && !empty($coloutcodedata)){
             $this->response(['success' => true, 'message' => "success", 'data' => $coloutcodedata], REST_Controller::HTTP_OK);
         }else{
            $this->response(['success' => false, 'message' => "success", 'data' => $coloutcodedata], REST_Controller::HTTP_BAD_REQUEST);
         }
    }

    public function generateSupportTicket_post(){
    }

    /*generated by Monika Barde at 14/Oct/2020*/

    /*public function send_registarion_otp_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('device_type', 'Device Type', 'required');
        $this->form_validation->set_rules('fcm_token', 'Fcm token', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        if($this->form_validation->run() == FALSE){
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }else{
            $mobile_no = trim($this->input->post('mobile_no'));
            $authtoken = $this->Authentication_model->_generate_token();
            $otp = $this->Authentication_model->createCode('registration_otp','otp',6);
            $data['full_name'] = $this->input->post('full_name');
            $data['mobile_no'] = $mobile_no;
            $data['email'] = (isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : '');
            $data['password'] = $this->input->post('password');
            $data['age'] = $this->input->post('age');
            $data['gender'] = $this->input->post('gender');
            $data['address'] = $this->input->post('address');
            $data['city'] = $this->input->post('city');
            $data['state'] = $this->input->post('state');
            $data['pincode'] = $this->input->post('pincode');
            $data['device_type'] = $this->post('device_type');
            $data['fcm_token'] = $this->input->post('fcm_token');
            $data['latitude'] = $this->input->post('latitude');
            $data['longitude'] = $this->input->post('longitude');
            $data['auth_token'] = $authtoken;

            $post_data = array();
            $post_data['mobile_no'] = $mobile_no;
            $post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['otp'] = $otp;

            $check_number = $this->Common_model->getwhere('users', array('mobile_no' => $mobile_no));
            $countrycode='91';
            if(empty($check_number))
            {
                $check_user = $this->Common_model->getSingleRecordById('registration_otp', array('mobile_no' => $mobile_no));
                if ($check_user) {
                    $update = $this->Common_model->updateRecords('registration_otp', $post_data, array('mobile_no' => $mobile_no));
                } else {
                   $add_otp = $this->Common_model->addRecords('registration_otp', $post_data);
                }
                $sms="Your veryfication otp has been registred is ".$otp;
                sendsms($mobile_no,$countrycode,$sms);
                $this->response(['status' => true, 'message' => "Veryfication otp has been sent to your registered number.", 'data' => $data,'otp'=>$otp], REST_Controller::HTTP_OK);   
            }else{
                $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }  
    }*/
/*  saller registration*/
    public function saller_regsiatration_post()
    {
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('conatct_number', 'Conatct Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        } else {
            $insert=array();
            $insert['username']=$_POST['username'];
            $insert['password']=md5($_POST['password']);
            $insert['seller_contact_number']=$_POST['conatct_number'];
            $insert['shop_address']=$_POST['shop_address'];
            $insert['country']=$_POST['country'];
            $insert['city']=$_POST['city'];
            $insert['area']=$_POST['area'];
            $insert['gst_number']=$_POST['gst_number'];
            $insert['category']=json_encode($_POST['category']);
            $insert['joining_date']=date("y-m-d");
            $check_shop = $this->Common_model->getSingleRecordById('shops', array('seller_contact_number' => $_POST['conatct_number']));
            if(empty($check_shop)){
                $add_otp = $this->Common_model->addRecords('shops', $insert);
            }else{
                $add_otp = $this->Common_model->updateRecords('shops', $insert, array('seller_contact_number' => $_POST['conatct_number']));
            }
            if(!empty($add_otp)){
                $this->response(['status' => true, 'message' => "signup successfully.",'data'=>''], REST_Controller::HTTP_OK);   
         }else{
             $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
             $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
/* user register */
public function user_regsiatration_post()
    {
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('conatct_number', 'Conatct Number', 'trim|required|regex_match[/^[0-9]{10}$/]');

      //  $this->form_validation->set_rules('seller_id', 'seller_id', 'trim|required|regex_match[/^[0-9]{10}$/]');
      //  $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
       if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
           $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        } else {
           $insert=array();
            $insert['username']=$_POST['username'];
            $insert['password']=md5($_POST['password']);
            $insert['user_contact_number']=$_POST['conatct_number'];
            $insert['email']=$_POST['email'];
           
            $insert['seller_id']=$_POST['seller_id'];
            $insert['type']=$_POST['type'];
         // $insert['vcash']=$_POST['vcash'];
          
  $check_shop = $this->Common_model->getSingleRecordById('users', array('user_contact_number' => $_POST['conatct_number']));
     if(empty($check_shop)){
          $add_otp = $this->Common_model->addRecords('users', $insert);
     }else{
 $add_otp = $this->Common_model->updateRecords('users',$insert, array('user_contact_number' => $_POST['conatct_number']));
            }
         if(!empty($add_otp)){
     $this->response(['status' => true, 'message' => "User successfully registered.",'data'=>''], REST_Controller::HTTP_OK);   
         }else{
             $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
             $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
    /* user register */
    
    public function category_type_post()
    {
      
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('type', 'type', 'required');
        $this->form_validation->set_rules('conatct_number', 'Conatct Number', 'trim|required|regex_match[/^[0-9]{10}$/]');

      //  $this->form_validation->set_rules('seller_id', 'seller_id', 'trim|required|regex_match[/^[0-9]{10}$/]');
      //  $this->form_validation->set_rules('shop_name', 'shop_name', 'required');
       if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
           $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        } else {
           $insert=array();
            $insert['title']=$_POST['title'];
            $insert['type']=($_POST['type']);
            $insert['category_image	']=($_POST['category_image	']);
            $insert['type']=($_POST['type']);
            $insert['create_date']=date("y-m-d");

            $insert['user_contact_number']=$_POST['conatct_number'];
           // $insert['email']=$_POST['email'];
           
          //  $insert['seller_id']=$_POST['seller_id'];
          //  $insert['type']=$_POST['type'];
         // $insert['vcash']=$_POST['vcash'];
          
  $check_shop = $this->Common_model->getSingleRecordById('shopcategories', array('user_contact_number' => $_POST['conatct_number']));
     if(empty($check_shop)){
          $add_otp = $this->Common_model->addRecords('shopcategories', $insert);
     }else{
 $add_otp = $this->Common_model->updateRecords('shopcategories', $insert, array('user_contact_number' => $_POST['conatct_number']));
            }
         if(!empty($add_otp)){
     $this->response(['status' => true, 'message' => "User successfully registered.",'data'=>''], REST_Controller::HTTP_OK);   
         }else{
             $responseArray = array('status' => FALSE, 'message' => 'Mobile number already exits.');
             $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }







    public function verify_register_otp_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('auth_token', 'authtoken', 'required');
        $this->form_validation->set_rules('device_type', 'Device Type', 'required');
        $this->form_validation->set_rules('fcm_token', 'Fcm token', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        } else {

            $opt = trim($this->input->post('otp'));
            $mobile_no = $this->input->post('mobile_no');
            $check_otp = $this->Common_model->GetWhere('registration_otp', array('otp' => $opt,'mobile_no'=>$mobile_no));
            if (isset($check_otp) && !empty($check_otp)) {
                $chkuserdata = $this->Common_model->GetWhere('users', array('mobile_no'=>$mobile_no));

                if(empty($chkuserdata)){
                    $insert_data = array();
                    $insert_data['full_name'] = $this->input->post('full_name');
                    $insert_data['mobile_no'] = $mobile_no;
                    $insert_data['email'] = (isset($_POST['email']) && !empty($_POST['email']) ? $_POST['email'] : '');
                    $insert_data['password'] = md5($this->input->post('password'));
                    $insert_data['show_password'] = $this->input->post('password');
                    $insert_data['age'] = $this->input->post('age');
                    $insert_data['gender'] = $this->input->post('gender');
                    $insert_data['address'] = $this->input->post('address');
                    $insert_data['city'] = $this->input->post('city');
                    $insert_data['state'] = $this->input->post('state');
                    $insert_data['zipcode'] = $this->input->post('pincode');
                    $insert_data['device_type'] = $this->post('device_type');
                    $insert_data['fcm_token'] = $this->input->post('fcm_token');
                    $insert_data['latitude'] = $this->input->post('latitude');
                    $insert_data['longitude'] = $this->input->post('longitude');
                    $insert_data['auth_token'] = $this->input->post('auth_token');
                    $insert_data['reg_id'] = $this->createCode('users','reg_id',8);
                    $insert_data['create_date'] = date('Y-m-d H:i:s');
                    $userid = $this->Common_model->addRecords('users', $insert_data);
                    if($userid){
                       $userdata = $this->Common_model->getSingleRecordById('users', array('id' => $userid));

                       $this->response(['success' => true, 'message' => "Otp has been verified successfully", 'userdata' => $userdata], REST_Controller::HTTP_OK);
                    }else{
                        $responseArray = array('success' => FALSE, 'message' => 'Oops Something Went wrong please try again.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
                }else{
                    $responseArray = array('success' => FALSE, 'message' => 'You have already registered');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            }
            else
            {
               $responseArray = array('success' => FALSE, 'message' => 'Invalid Otp please try again.');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }
/* seller login */
    public function seller_loginbypassword_post()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','User Name','required');
        $this->form_validation->set_rules('password','Password','required');
       // $this->form_validation->set_rules('device_type','Device Type','required');
      //  $this->form_validation->set_rules('fcm_token','Fcm token','required');
        if($this->form_validation->run() == FALSE){
            $errors = strip_tags(validation_errors());
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }
        else {
           
           $data=array();
        //    $authToken = $this->Authentication_model->_generate_token();
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
         //   $data['fcm_token'] = $this->post('fcm_token');
          //  $data['device_type'] = $this->post('device_type');
           // $data['auth_token'] = $authToken;
            //$data['table_name'] = 'shops';
            $res = $this->Authentication_model->userLogin("shops",$data);
           // echo "<pre>";print_r($res);die;
if(is_array($res)){
    $this->response(['status' => true, 'message' => "login successfull.",'data'=>$res], REST_Controller::HTTP_OK);   


}
else{
   $result = "result not found"; 

}

 /*$chkuserdata = $this->Common_model->GetWhere('shops', array('fcm_token'=>$data['fcm_token']));
            $this->Common_model->updateRecords('shops', array("fcm_token"=>$data['fcm_token']), array("mobile_no"=>$data['mobile_no']));
                if(is_string($res) && $res == 'NA'){
                    $responseArray = array('status'=>FALSE,'message'=>'User not active.','data' => '');
                }
                elseif(is_array($res) && $res['Type'] == 'WP'){
                    $responseArray = array('status'=> FALSE, 'message'=> 'Invalid login/password.','data' => '');
                }
                elseif(is_array($res) && $res['Type'] == 'SC'){
                    $responseArray = array('status'=> TRUE, 'message'=> 'Login Successfully.', 'data' => $res['userData'],'profile_img_url'=>base_url().'uploads/customerprofilepic/');
                }else{
                    $responseArray = array('status'=> FALSE, 'message'=> 'User not active', 'data' => '');
                }
            // $this->session->set_userdata('user_data', $res['userData']);
            $this->response($responseArray, REST_Controller::HTTP_OK);*/
        
        }
    }public function user_login_get()
    {
        $allstore = $this->db->get_where("users")->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "login successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }


/* user login 
    public function user_loginbypassword_post()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','User Name','required');
        $this->form_validation->set_rules('password','Password','required');
       // $this->form_validation->set_rules('device_type','Device Type','required');
      //  $this->form_validation->set_rules('fcm_token','Fcm token','required');
        if($this->form_validation->run() == FALSE){
            $errors = strip_tags(validation_errors());
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }
      //  else {
           
         //  $data=array();
        //    $authToken = $this->Authentication_model->_generate_token();
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
         //   $data['fcm_token'] = $this->post('fcm_token');
          //  $data['device_type'] = $this->post('device_type');
           // $data['auth_token'] = $authToken;
            //$data['table_name'] = 'shops';
            $res = $this->Authentication_model->userSignup("users",$data);
       //  echo "<pre>";print_r($res);die;
if(is_array($res)){
$this->response(['status' => true, 'message' => "login successfull.",'data'=>$res], REST_Controller::HTTP_OK);   
}
else{
   $result = "result not found"; 

} 
        }
    }
    /**
     * Get user profile data
     *
     * @return Response
     */
    public function userProfile_post()
    {
        if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['auth_token']) && !empty($_POST['auth_token'])) {
            $userId = $_POST['user_id'];
            $auth_token = $_POST['auth_token'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if (isset($userData) && !empty($userData)) {

                $userData['totalPendingOrders'] =  $this->Common_model->getRecordCount('orders',array('user_id'=>$userId,'status'=>1,'delivery_status'=>1));
                $userData['totalAcceptOrders'] =  $this->Common_model->getRecordCount('orders',array('user_id'=>$userId,'status'=>1,'delivery_status'=>2));
                $userData['totalCanceOrders'] =  $this->Common_model->getRecordCount('orders',array('user_id'=>$userId,'status'=>1,'delivery_status'=>5));
                $userData['totalCompleteOrders'] =  $this->Common_model->getRecordCount('orders',array('user_id'=>$userId,'status'=>1,'delivery_status'=>4));
                // $userData['image'] = (isset($userData['image']) && !empty($userData['image']) ? base_url() . 'uploads/customerprofilepic/' . $userData['image'] : '');
                $this->response(['success' => false, 'message' => "Not changes", 'data' => $userData,'profile_img_url'=>base_url().'uploads/customerprofilepic/'], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['success' => false, 'message' => "User id and auth token are required", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }

    function createCode($table, $column_name, $length = '' )
    {
        $create_ramdom_code = ""; 
        if($length){
            $ramdom_code = generateRandomStringbylnth($length);
        }else{
            $ramdom_code = createRandomCode();
        }
        $check_if_exiest = $this->Common_model->getSingleRecordById($table,array($column_name => $ramdom_code));
        if(!empty($check_if_exiest))
        {
          $create_ramdom_code = $this->createCode($table,$column_name);
        }else
        {
          $create_ramdom_code = $ramdom_code;
        }
        return $create_ramdom_code;
    }

    public function login_by_otp_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mobile_no','Mobile no','trim|required|regex_match[/^[0-9]{10}$/]');
        if($this->form_validation->run() == FALSE){
            $errors = strip_tags(validation_errors());
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }else{
            $mobile_no = trim($this->input->post('mobile_no'));

            $otp = $this->Authentication_model->createCode('login_otp', 'otp', 6);
            $check_user = $this->Common_model->getSingleRecordById('login_otp', array('mobile_no' => $mobile_no));
            $post_data = array();
            $post_data['mobile_no'] = $mobile_no;
            $post_data['fcm_token']=$this->input->post('fcm_token');
            $post_data['create_date'] = date('Y-m-d H:i:s');
            $post_data['otp'] = $otp;
            if ($check_user) {
                $update = $this->Common_model->updateRecords('login_otp', $post_data, array('mobile_no' => $mobile_no));
            } else {
                $add_otp = $this->Common_model->addRecords('login_otp', $post_data);
            }

            $check_number = $this->Common_model->getwhere('users', array('mobile_no' => $mobile_no));
            $user_number = $mobile_no;
            $user_country_isd_code = '91';
            $user_number_isd_code =  $user_country_isd_code . $user_number;
            if (!empty($check_number)){
                
                if (!empty($user_number_isd_code)) {
                    
                    $sms="your vneeka login verification otp is".$otp;
                    $response = sendsms($user_number,$user_country_isd_code,$sms);
                    // print_r($response);
                    $responseArray = array('status' => TRUE, 'message' => 'Your OTP has been sent successfully','otp'=>$otp);
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                } else {
                    $responseArray = array('status' => FALSE, 'message' => 'Your Number has been not registered!');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            }else {
                // $responseArray = array('status' => FALSE, 'message' => 'Your Number has been not registered!');
                // $this->response($responseArray, REST_Controller::HTTP_OK);
                if (!empty($user_number_isd_code)) {
                    $sms="your vneeka login verification otp is".$otp;
                    $response = sendsms($user_number,$user_country_isd_code,$sms);
                    // print_r($response);
                    $responseArray = array('status' => TRUE, 'message' => 'Your OTP has been sent successfully','otp'=>$otp);
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }else{
                    $responseArray = array('status' => FALSE, 'message' => 'Your Number has been not registered!');
                    $this->response($responseArray, REST_Controller::HTTP_OK);
                }
            }
        }
    }

    public function verify_login_opt_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('otp', 'OTP', 'required|trim');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
         if ($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        }else{
            $otp = trim($this->input->post('otp'));
            $mobile_no = trim($this->input->post('mobile_no'));
            $fcm_token=$this->input->post('fcm_token');
            $update = $this->Common_model->updateRecords('login_otp', array("fcm_token"=>$fcm_token), array('mobile_no' => $mobile_no));
            $check_opt = $this->Common_model->GetWhere('login_otp', array('otp' => $otp,'mobile_no'=>$mobile_no));
            if(isset($check_opt) && !empty($check_opt)) {
                 $checkuser = $this->Common_model->GetWhere('users', array('mobile_no' => $check_opt[0]['mobile_no']));
                    if(isset($checkuser) && !empty($checkuser)) {
                        $checkuserrow = $checkuser[0];
                        if ($checkuserrow['status'] == 1) {
                            $checkuserrow['is_registerd'] = true;
                            $this->Common_model->updateRecords('shops', array("fcm_token"=>$fcm_token), array('mobile_no' => $mobile_no));
                            $responseArray = array('status' => true, 'message' => 'OTP Verified Successfully.', 'data' => $checkuserrow,'profile_img_url'=>base_url().'uploads/customerprofilepic/');
                            $this->response($responseArray, REST_Controller::HTTP_OK);
                        }else{
                            $responseArray = array('status' => false, 'message' => 'Your account has been deactivated ,please contact with admin', 'data' => '');
                            $this->response($responseArray, REST_Controller::HTTP_OK);
                        }
                    }elseif (empty($checkuser)){
                        $notregisteredData = array();
                        $notregisteredData['is_registerd'] = false;
                        $responseArray = array('status' => true, 'message' => 'logged in successfully', 'data' => $notregisteredData);
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }else{
                        $responseArray = array('status' => false, 'message' => 'Oops something went wrong please try again.');
                        $this->response($responseArray, REST_Controller::HTTP_OK);
                    }
            }else{
                $responseArray = array('status' => false, 'message' => 'You Already Registered this Number.');
                $this->response($responseArray, REST_Controller::HTTP_OK);
            }
        }
    }

    public function shop_locator_get()
    {
        $allstore = $this->db->get_where("users")->result();
        if ($allstore) {
            $this->response(['success' => true, 'message' => "Shop found successfully.", 'data' => $allstore], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /*public function language_get()
    {
        $get_language = $this->db->get_where("language")->result();
        if($get_language) {
            $this->response(['success' => true, 'message' => "Language found successfully.", 'language' => $get_language,'img_url'=>base_url().'uploads/language/'], REST_Controller::HTTP_OK);
        } else {

            $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
        }
    }*/
    public function language_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('code', 'Code', 'required');
        if($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        }else{
            $code=$this->input->post('code');
            $get_language = $this->db->get_where("language",array("code"=>$code))->result();
            if($get_language) {
                $this->response(['success' => true, 'message' => "Language found successfully.", 'language' => $get_language,'img_url'=>base_url().'uploads/language/'], REST_Controller::HTTP_OK);
            } else {

                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        
    }
    public function faq_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Language', 'required');
         if($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        }else{
            $lang=$this->input->post('lang');
            $fileds=array("1"=>"1");
            $checaboutus= $this->Common_model->GetWhere('faqs_data',$fileds);
            $data_array=array();
            if(!empty($checaboutus))
            {
                foreach ($checaboutus as $key => $value){
                    if($lang=="hi")
                    {
                        $data_array[$key]['ans']=$value['ans_hindi'];
                        $data_array[$key]['qustion']=$value['qustion_hindi'];
                    }else{
                        $data_array[$key]['ans']=$value['ans'];
                        $data_array[$key]['qustion']=$value['qustion'];
                    }
                }
            }else{
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
    
            if(!empty($data_array)){
            $this->response(['success' => true, 'message' => "FAQ found successfully.", 'faq' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

    public function send_feedback_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('mobile_number', 'mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
         if($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
         }else{
            $insert_data=array();
            $insert_data['name'] = $this->input->post('name');
            $insert_data['email'] = $this->input->post('email');
            $insert_data['message'] = $this->input->post('message');
            $insert_data['mobile_number'] = $this->input->post('mobile_number');
            $result = $this->Common_model->addrecords('send_feed', $insert_data);
            if (!empty($result)) {
                $this->response(['success' => true, 'message' => "Feeback  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.",], REST_Controller::HTTP_NOT_FOUND);
            }
         }
    }

    public function sms_send_get()
    {
        $mobileno=isset($_GET['mobileno']) ? $_GET['mobileno'] : '';
        $message=isset($_GET['message']) ? $_GET['message'] : '';
        $contry=isset($_GET['contry']) ? $_GET['contry'] : '';

        if(!empty($mobileno) && !empty($message) && !empty($contry))
        {
            $sms_data=sendsms($mobileno,$message,$contry);
            if (!empty($sms_data) && $sms_data[0]) {
                $this->response(['success' => true, 'message' => "Message  has been Send successfully."], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Somthing went wrong.",], REST_Controller::HTTP_NOT_FOUND);
            }   
        }else{
            $this->response(['success' => false, 'message' => "required."], REST_Controller::HTTP_OK);       
        }
    }
    
    public function why_generic_pharma_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lang', 'Language', 'required');
         if($this->form_validation->run() == FALSE) {
            $errors = strip_tags(validation_errors());
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        }else{
            $lang=$this->input->post('lang');
            $fileds=array("1"=>"1");
            $generic_pharama= $this->Common_model->GetWhere('why_generic_pharma',$fileds);
            $data_array=array();
            if(!empty($generic_pharama))
            {
                foreach ($generic_pharama as $key => $value) {
                    if($lang=="hi")
                    {
                        $data_array[$key]['title']=$value['title_hindi'];
                        $data_array[$key]['description']=$value['description_hindi'];
                    }else{
                        $data_array[$key]['title']=$value['title'];
                        $data_array[$key]['description']=$value['description'];
                    }
                }
            }else{
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
    
            if(!empty($data_array)){
            $this->response(['success' => true, 'message' => "Whay Generic Pharama found successfully.", 'why_generic_pharma' => $data_array], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
            }
        }
        // $get_pharama = $this->db->get_where("why_generic_pharma")->result();

        // if($get_pharama) {
        //     $this->response(['success' => true, 'message' => "Generic_pharma found successfully.", 'pharama' => $get_pharama], REST_Controller::HTTP_OK);
        // } else {
        //     $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
        // }
    }
    public function medicin_request_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User Id', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        //$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('medicin_name', 'Medicin Name', 'required');
        $this->form_validation->set_rules('quantitiy', 'Quantitiy Name', 'required');
        
        if($this->form_validation->run() == FALSE){
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }else{
                $data_insert=array();
                $data_insert['user_id'] = $this->input->post('user_id');
                $data_insert['name'] = $this->input->post('name');
                $data_insert['mobile_no'] = $this->input->post('mobile_no');
                $data_insert['email'] = $this->input->post('email');
                $data_insert['medicin_name'] = $this->input->post('medicin_name');
                $data_insert['quantitiy'] = $this->input->post('quantitiy');

                $user_id['id']=$data_insert['user_id'];
                $mobile_no=$data_insert['mobile_no'];
                $checkuser_id = $this->Common_model->GetWhere('users', array('id'=>$user_id['id']));
                if(!empty($checkuser_id))
                {
                    $sms="your request has been sent succesfully";
                    $countrycode='91';
                    $medicins = $this->Common_model->addRecords('medicin_request', $data_insert);
                    if (!empty($medicins)) {
                        sendsms($mobile_no,$countrycode,$sms);
                        $this->response(['success' => true, 'message' => "Your request has been sent successfully."], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['success' => false, 'message' => "Record not found.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
                    }
                }else{
                    $this->response(['success' => false, 'message' => "User Id Invalid.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
                }
        }  
    }
    public function medicin_reminder_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User id', 'required');
        $this->form_validation->set_rules('reminde_me', 'Reminde Me', 'required');
        $this->form_validation->set_rules('reminder_discription', 'Reminder Discription', 'required');
        $this->form_validation->set_rules('set_time', 'Time', 'required');
        $this->form_validation->set_rules('set_date', 'Date', 'required');
        
        if($this->form_validation->run() == FALSE){
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }else{
                $data_insert=array();
                $data_insert['user_id']=$this->input->post('user_id');
                $user_id['id']=$data_insert['user_id'];
                $data_insert['reminde_me'] = $this->input->post('reminde_me');
                $data_insert['reminder_discription'] = $this->input->post('reminder_discription');
                $data_insert['set_time'] = $this->input->post('set_time');
                $date=$this->input->post('set_date');
                $data_insert['set_date'] = date('Y-m-d',strtotime($date));
                $checkuser_id = $this->Common_model->GetWhere('users', array('id' =>$user_id['id']));
                if(!empty($checkuser_id))
                {
                    $id=$this->input->post('id');
                   if(!empty($id))
                   {
                    $medicin_reminder = $this->Common_model->updateRecords('medicin_reminder', $data_insert,array("id"=>$id));
                   }else{
                        $medicin_reminder = $this->Common_model->addRecords('medicin_reminder', $data_insert);
                   }
                    if (!empty($medicin_reminder)) {
                        $this->response(['success' => true, 'message' => "Your reminder has been saved successfully."], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['success' => false, 'message' => "Oops something went wrong.", 'data' => ''], REST_Controller::HTTP_NOT_FOUND);
                    }
                }else{
                    $this->response(['success' => false, 'message' => "Invalid user id please try again."], REST_Controller::HTTP_NOT_FOUND);  
                }
        }  
    }
    public function medcin_reminder_delete_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'required');
         if($this->form_validation->run() == FALSE){
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }else{
            $id = $this->input->post('id');
            $delete_reminder=$this->Common_model->deleteRecords('medicin_reminder',array('id'=>$id));
            if(!empty($delete_reminder))
            {
                $this->response(['success' => true, 'message' => "Your reminder has been deleted successfully."], REST_Controller::HTTP_OK);
            }else{
                $this->response(['success' => true, 'message' => "Invalid reminder id."], REST_Controller::HTTP_OK);
            }
        }
    }
    public function reminder_list_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'User Id', 'required');
        if($this->form_validation->run() == FALSE){
            $response = array('status'=> false,'message'=>  validation_errors());
            $this->response($response);
        }else{
            $user_id['id']=$this->input->post('user_id');
            $checkuser_id = $this->Common_model->GetWhere('users', array('id' =>$user_id['id']));
            if(!empty($checkuser_id))
            {
                // $reminder_list = $this->db->get_where("medicin_reminder")->result();
                $reminder_list = $this->Common_model->GetWhere('medicin_reminder', array('user_id' =>$user_id['id']));
                if($reminder_list) {
                    $this->response(['success' => true, 'message' => "Reminder list found successfully.", 'reminder_list' => $reminder_list], REST_Controller::HTTP_OK);
                } else {
                    $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
                }
            }else{
                $this->response(['success' => false, 'message' => "Invalid user id."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    // public function media_file_images_get()
    // {
    //     $media_file_images = $this->db->get_where("media_file_images")->result();
    //     if($media_file_images) {
    //         $this->response(['success' => true, 'message' => "Media file video and images list found successfully.", 'media_file_images' => $media_file_images,'image_url'=> base_url() . 'uploads/media_file/'], REST_Controller::HTTP_OK);
    //     } else {
    //         $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }
    // public function media_file_videos_get()
    // {
    //     $media_file_video = $this->db->get_where("media_file_video")->result();
    //     if($media_file_video) {
    //         $this->response(['success' => true, 'message' => "Media file video and images list found successfully.", 'media_file_video' => $media_file_video,'vedio_url'=> base_url() . 'uploads/media_file/vedios/'], REST_Controller::HTTP_OK);
    //     } else {
    //         $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }
    public function media_files_post()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('file', 'File', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => false, 'message' =>  validation_errors());
            $this->response($response);
        } else {
            $file=$this->input->post('file');
            if($file=='vedio')
            {
                $media_file = $this->db->get_where("media_file_video")->result();
                $media_url='vedios/';
            }else{
                $media_file = $this->db->get_where("media_file_images")->result();
                 $media_url='';
            }
            if($media_file) {
                $this->response(['success' => true, 'message' => "Media file video and images list found successfully.", $file => $media_file,$file.'_url'=> base_url() . 'uploads/media_file/'.$media_url], REST_Controller::HTTP_OK);
            } else {
                $this->response(['success' => false, 'message' => "Record not found."], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    public function notificationdemo_get(){
        $data_insert=array();
        $fileds=array("title"=>"title","message"=>"message","product_id"=>"product_id","is_read"=>"is_read","create_date"=>"create_date");
        $notification_list= $this->Common_model->get_all_byColumn('notification_list',$fileds);
        
        //$facm_arra=array("cbMz0TCMaFg:APA91bHRullP3TZEPK3x9v_WxdTntAb8Kd4QzRLKLpNkxsfjrDyUEeWVt8XgRKFO0PAN1MzQqUe6C7y6RGwVOXqFJ3MZ_ixaZoJPiCJeAfkgONE-e-5BG8Z6w6yElzbkUxet4mbAKWYX","c51_cOaL3lE:APA91bHJGHJeY2FpZ_CVYVEPMZllxv3seCDRRVnseq32Y_Rh3Pe673CjIegesztNvpylIfhz48cTZ_58eJXRyCaOPFRjbxiZzuutoWd44CtfkkpO4duNVaJHD9CHrlsOHIjOWYV1McHY");
       // echo "<pre>";print_r($facm_arra);die;
        // if(!empty($facm_arra))
        // {
        //     foreach ($facm_arra as $key => $value) {
        //         //echo "<pre>";print_r($value);die;
        //             $message = "demo procless android notification";
        //             $not = array();
        //             $not['msg_type'] = "notification";
        //             $not['device_type'] = "android";
        //             $not['title'] = "title";
        //             $not['body'] = "demo procless android notification";
        //             $not['reg_id'] = $value;
        //             // $data["icon"] = "";
        //             $resp = push_notification_android($not);
        //             var_dump($resp);
        //     }
        // }die;
        //$fcm_tocken = "c51_cOaL3lE:APA91bHJGHJeY2FpZ_CVYVEPMZllxv3seCDRRVnseq32Y_Rh3Pe673CjIegesztNvpylIfhz48cTZ_58eJXRyCaOPFRjbxiZzuutoWd44CtfkkpO4duNVaJHD9CHrlsOHIjOWYV1McHY";

        if($notification_list) {
            $this->response(['success' => true, 'message' => "Notification has been sent successfully.",'notification_list'=>$notification_list], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Notification not send."], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function shipping_policy_get(){
        $fileds=array("1"=>"1");
        $shippping_policy= $this->Common_model->GetWhere('same_privacy_policy',$fileds);
        if($shippping_policy) {
            $this->response(['success' => true, 'message' => "Shippping policy found successfully.",'shippping_policy'=>$shippping_policy], REST_Controller::HTTP_OK);
        } else {
            $this->response(['success' => false, 'message' => "Shippping policy not found."], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    /*generated by Monika Barde*/

    public function addtocart_post(){
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        if(isset($data['user_id']) && !empty($data['user_id'])  && isset($data['auth_token']) && !empty($data['auth_token']) && isset($data['product_id']) && !empty($data['product_id'])  && isset($data['quantity']) && !empty($data['quantity'])){

            // print_r($data);
            // die;
            $userId = $data['user_id'];
            $auth_token = $data['auth_token'];
            $quantity = $data['quantity'];
            $product_id = $data['product_id'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if(isset($userData) && !empty($userData)){
                $productData = $this->Common_model->getSingleData('product', array('product_id' => $product_id, 'status' => 1));
                if(isset($productData) && !empty($productData)){

                    $cartData = $this->Common_model->getSingleData('cartdata', array('product_id' => $product_id, 'user_id' => $userId));
                    $insert_data = array();
                    if(isset($cartData) && !empty($cartData)){
                        $insert_data['product_quantitiy'] = $quantity;
                        $this->Common_model->updateRecords('cartdata', $insert_data, array('user_id' => $userId,'product_id'=>$product_id));
                    }else{
                        $insert_data['product_quantitiy'] = $quantity;
                        $insert_data['product_id'] =  $product_id;
                        $insert_data['user_id'] =  $userId;
                        // $this->Common_model->updateRecords('users', $insert_data, array('id' => $userId));
                        $result = $this->Common_model->addrecords('cartdata', $insert_data);   
                    }

                    $cartlistdata = $this->cartlistdata($userId);
                    $this->response(['success' => true, 'message' => "add to cart successfully", 'data' => $cartlistdata], REST_Controller::HTTP_OK);

                }else{
                    $this->response(['success' => false, 'message' => "Invalid product please try again.", 'data' => ''], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['success' => false, 'message' => "Oops Something went wrong.", 'data' => ''], REST_Controller::HTTP_OK);
        }
    }

    public function cartlistdata($userId){

        $cwhr = array();
        $cwhr[] = "user_id = " . $userId . "";

        // $whr[] = "categories_id=".;
        $cwhere = " WHERE " . implode(" AND ", $cwhr);
        $corderby = "";
        $cartproductsData = $this->Common_model->getwherecustomecol('cartdata', "*", $cwhere, $corderby);

        if(isset($cartproductsData) && !empty($cartproductsData)){
            foreach($cartproductsData as $key=>$cartproductsDataarray){
                $productData[$key] = $this->Common_model->getSingleData('product', array('product_id' => $cartproductsDataarray['product_id']));
                $cartproductsData[$key]['product_name'] = $productData[$key]['name'];
                $cartproductsData[$key]['description'] = $productData[$key]['description'];
                $cartproductsData[$key]['product_reg_id'] = $productData[$key]['product_reg_id'];
                $cartproductsData[$key]['currency'] = $productData[$key]['currency'];
                $cartproductsData[$key]['currency_symbol'] = $productData[$key]['currency_symbol'];
                $cartproductsData[$key]['mrp_price'] = $productData[$key]['mrp_price'];
                $cartproductsData[$key]['genric_price'] = $productData[$key]['genric_price'];
                $cartproductsData[$key]['total_genric_price'] = number_format($cartproductsDataarray['product_quantitiy'] * $productData[$key]['genric_price'],2);
            }

            return $cartproductsData;
        }else{
            return $cartproductsData;
        }
    }

    public function cartlistdataapi_post(){
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        if(isset($data['user_id']) && !empty($data['user_id'])  && isset($data['auth_token']) && !empty($data['auth_token'])){
            $userId = $data['user_id'];
            $auth_token = $data['auth_token'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if(isset($userData) && !empty($userData)){
                $cartlistdata = $this->cartlistdata($userId);
                $this->response(['success' => true, 'message' => "success", 'data' => $cartlistdata], REST_Controller::HTTP_OK);
            }else{
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }

        }else{
            $this->response(['success' => false, 'message' => "Invalid request data please try gain."], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function removecartproduct_post(){
        $pdata = file_get_contents("php://input");
        $data = json_decode($pdata, true);
        // print_r($data);
        if(isset($data['user_id']) && !empty($data['user_id'])  && isset($data['auth_token']) && !empty($data['auth_token']) && isset($data['product_id']) && !empty($data['product_id'])){
            $userId = $data['user_id'];
            $auth_token = $data['auth_token'];
            $product_id = $data['product_id'];
            $userData = $this->Common_model->getSingleData('users', array('id' => $userId, 'auth_token' => $auth_token));
            if(isset($userData) && !empty($userData)){
                $resp = $this->Common_model->deleteRecords('cartdata',array('user_id'=>$userId,'product_id'=>$product_id));
                if($resp){
                    $cartlistdata = $this->cartlistdata($userId);
                    $this->response(['success' => true, 'message' => "Medicine removed from cart successfully", 'data' => $cartlistdata], REST_Controller::HTTP_OK);
                }else{
                    $cartlistdata = $this->cartlistdata($userId);
                    $this->response(['success' => true, 'message' => "No record found", 'data' => $cartlistdata], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response(['success' => false, 'message' => "Invalid user id and auth token please try again.", 'data' => ''], REST_Controller::HTTP_OK);
            }

        }else{
            $this->response(['success' => false, 'message' => "Invalid request data please try gain."], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function sendMail_get(){
        // multiple recipients
$to  = 'monika.itspark@gmail.com' . ', '; // note the comma
$to .= 'monika.itspark@gmail.com';

// subject
$subject = 'Birthday Reminders for August';

// message
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Mary <monika.itspark@gmail.com>, Kelly <monika.itspark@gmail.com>' . "\r\n";
$headers .= 'From: Birthday Reminder <monika.itspark@gmail.com>' . "\r\n";
$headers .= 'Cc: monika.itspark@gmail.com' . "\r\n";
$headers .= 'Bcc: monika.itspark@gmail.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
    }
}
