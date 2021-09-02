<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'custom404';
$route['translate_uri_dashes'] = TRUE;
$route['index'] = 'home';

// $route['(:any)'] = 'home/$1';

$route['dashboard'] = 'home/dashboard';
$route['profile'] = 'home/profile';
$route['shops'] = 'home/shops';
$route['clearance_product'] = 'home/clearance_product';
$route['clearance_products'] = 'home/clearance_products';
$route['shopdetail?(:any)'] = 'home/shopdetail';
$route['clearance_detail?(:any)'] = 'home/clearance_detail';
$route['addmultiaddress'] = 'home/addmultiaddress';
$route['contact'] = 'home/contact';
$route['cart'] = 'home/cart';
$route['productdetail?(:any)'] = 'home/productdetail';
$route['addshippinginfo'] = 'home/addshippinginfo';
$route['paymentcheckout'] = 'home/paymentcheckout';
$route['orderhistory'] = 'home/orderhistory';
$route['aboutus'] = 'home/aboutus';
$route['support_ticket'] = 'home/support_ticket';
$route['support_chat?(:any)'] = 'home/support_chat';
$route['terms_condition'] = 'home/terms_condition';
$route['career'] = 'home/career';
$route['privacy_policy'] = 'home/privacy_policy';
$route['green_grocery'] = 'home/green_grocery';
$route['sendemaildemo'] = 'home/sendemaildemo';
$route['order_detail'] = 'home/order_detail';
$route['orderdetail'] = 'home/order_detail';

