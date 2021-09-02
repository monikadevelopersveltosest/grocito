<!DOCTYPE html>
<html>
<head> 
	<title><?php echo getWebOptionValue('site_title');?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>front_assets/css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>front_assets/css/font1.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>front_assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>front_assets/css/responsive.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,700i&display=swap" rel="stylesheet">
	<!-- <slider camroll> -->
	<!-- <link href="<?php echo base_url()?>front_assets/css/camroll_slider.css" rel="stylesheet" type="text/css"> -->
	<!-- <link href="<?php echo base_url()?>front_assets/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>front_assets/css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>front_assets/css/owl.theme.default.css">
	<!-- <client slider font> -->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i&display=swap" rel="stylesheet">
	<!-- <client slider font> -->
		<!-- <md bootstrap start> -->
			<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
	<!-- Bootstrap core CSS -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
	<!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>common_assets/css/rating.css">
    
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    
    
		<!-- <md bootstrap end> -->
    <!-- <script type="text/javascript" src="<?php echo base_url()?>front_assets/js/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>front_assets/js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
	<!-- <slider camroll> -->
	<!-- <js start> -->
	
	<!-- <script type="text/javascript" src="http://htmldemo.magikthemes.com/ecommerce/eclipse-html-template/js/jquery.min.js"></script>  -->
	<!-- <loader start> -->
	<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/loader.js"></script>
	<!-- <loader end> -->
	<!-- <menu slider js start> -->
	<script src="<?php echo base_url()?>front_assets/js/slick.js"></script>
	<!-- <menu slider js end> -->
	<script src="<?php echo base_url()?>front_assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/bootstrap.min.js"></script>
	<!-- <js end> -->
	<script src="<?php echo base_url()?>common_assets/js/rating.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>common_assets/js/jstars.js" type="text/javascript"></script>
	
	
	<script type="text/javascript">
		var base_url = "<?php echo base_url(); ?>";
		var current_page_url = "<?php echo $_SERVER['REQUEST_URI'];?>";
	</script>
	<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
	<style>
	  .notifyjs-corner{
	    top: 45px !important;
	  }
	  /* Make the image fully responsive */
		.carousel-inner img {
		  width: 100%;
		  height: 100%;
		}
	  	#demos .owl-carousel .item{
		    min-height: 220	px;
		    /*background: #4DC7A0;*/
		    padding: 5px;/*
		    border: 1px solid #ccc;*/
		    cursor: pointer;
		}
		.body1 {
		    /*position: relative;*/
		    top: 0;
		    left: 0;
		    z-index: 0;
		    width: 100%;
		    height: 100%;
		    background-attachment: fixed;
		}
		.headertxtcl{
			color: #fff;
			font-weight: bold;
		}
		.cartt{
			color: #124b56;
		}
		.activecolors{
			color: #155724 !important;
		}
		.btn-base-1{
			background-color: #124b56;
    		color: #eeaf49;
		}
		.btn-base-1:hover {
    		color: #fff !important;
    	}
    	.bgp {
		    background-color: #f3f3f3;
		}
		.btn-info {
    		background-color: #eeaf49!important;
    	}
    	.reviewmodelh{
    		    background-color: #124b56 !important;
    			color: #fff !important;
    	}
    	.reviewmodelhtitle{
    		    padding: 5px 5px 5px 5px;
			    /* text-align: center; */
			    font-weight: 400;
    	}
    	.btn-success {
    		background-color: #124b56!important;
    	}
    	
    	
    	
    /*Youtube*/


.white-popup-block {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.mfp-hide {
    display: none !important;
}

#subscribe_youtube {
    position: fixed;
    right: -10px;
    top: 30%;
    max-width: 179px;
    z-index: 100;
    cursor: pointer;
}

.you{
	display: block;
    max-width: 100%;
    height: auto;
    width: 100%;
    
}

#subscribe_youtube:hover {
    right: 0px !important;
}




.navbar-main, a {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;}
      
      
    @media screen and (max-width: 767px){
      .you{
          display: none;  
      }
    }
       
  	</style>
  	<style>
  		@media screen and (max-width: 768px){
        .dropbtn{
          padding-left: 25px!important;
        }
      }
  	</style>
  <?php  $session_userdata = $this->session->userdata(USER_SESSION); ?>
</head>
<body>
	<div class="body1">
	<!-- <> -->
	<div id="load"></div>
    <div id="contents">
    </div>
	<!-- <> -->
	<!-- <header start> -->
	<header class="header" style="position: sticky; top: 0; left: 0;z-index: 10000; height: 100%; width: 100%;">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 pt-1">
						<!-- <> -->
						<div id="mySidebar" class="sidebar">
							<div class="top_menu">
								<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>" class="img-responsive img-fluid">
							</div>
							<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="border:none; color: #fff !important;">×</a>
							<?php if(isset($session_userdata) && !empty($session_userdata)){ ?>
									<a href="<?php echo base_url().'dashboard';?>">
										<i class="fa fa-home"></i>
									Dashboard
									</a>
									<a href="<?php echo base_url().'profile';?>">
										<i class="fa fa-user"></i>
									My Profile
									</a>
							<?php } ?>
							<a href="<?php echo base_url(); ?>">
								<i class="fa fa-home"></i>
							Home
							</a>
							<!-- <a href="#"><i class="fa fa-shopping-cart"></i>Shop</a> -->
							<a href="<?php echo base_url(); ?>shops"> <i class="fa fa-home"></i> Shops</a>
							<a href="<?php echo base_url(); ?>aboutus"><i class="fa fa-info"></i>About Us</a>
							<a href="<?php echo base_url(); ?>contact"><i class="fa fa-phone"></i>Contact Us</a>
							<a href="#"> <i class="fa fa-building"></i>How It Work</a>
							<a href="<?php echo base_url(); ?>terms_condition"><i class="fa fa-file"></i>Terms & Condition</a>
							<a href="<?php echo base_url(); ?>privacy_policy"><i class="fa fa-file"></i>Privacy Policy</a>
							<?php if(isset($session_userdata) && !empty($session_userdata)){ ?>
								<a href="<?php echo base_url().'orderhistory';?>"><i class="fa fa-shopping-cart"></i>Orders</a>
								<a href="<?php echo base_url().'support_ticket';?>"><i class="fa fa-support"></i>Support</a>
							
								<a href="<?php echo base_url();?>home/logout"><i class="fa fa-sign-out"></i>Logout</a>
							<?php } ?>
						</div>
						<button class="openbtn" onclick="openNav()" >☰</button>
						<!-- <> -->
						<div class="logo">
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url().'uploads/'. getWebOptionValue('front_logo');?>" class="img-responsive img-fluid"></a>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						<div class="search ser pt-6">
							<form action="<?php echo base_url().'shops';?>">
							    <input type="text" name="tags" value="<?php echo (isset($_GET['tags']) && !empty($_GET['tags']) ? $_GET['tags'] : '')?>" placeholder="Search...">
							    <button type="submit" class="top-btn">
							    	<i class="fa fa-search"></i>
							    </button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 text_center">
						<div class="login-btn">
							<i class="fa fa-search search_show"></i>
							<?php if(isset($session_userdata) && !empty($session_userdata)){ ?>
									<a href="<?php echo base_url()?>home/logout" class="headertxtcl">
									    <span class="responsive_none"><i class="fa fa-sign-out"></i> Logout</span>
									    <i class="fa fa-sign-out logoutresponsiveicon responsive_block" aria-hidden="true" style="display: none;"></i>
								    </a>
							<?php }else{ ?>
									<a type="button" class="sign_in loginModal" href-btntype="signin">
									    <span class="responsive_none">Login / Signup</span>
									    <i class="fa fa-sign-in" aria-hidden="true" style="display: none;"></i>
								    </a>
							<?php }?>
						</div>
						<div class="cart">
							
							<i class="fa fa-shopping-cart pr-2"></i>
							<h5 class="">cart</h5>
							<h5 class="" style="color: white">&nbsp;<?php $spdata = $this->session->userdata('cart');?>
							(<span class="cartcount"><?php echo (isset($spdata) && !empty($spdata) ? count($spdata) : 0); ?></span>)</h5>
						</div>
					</div>
				</div>

				<!--model start -->
				<div class="modal" id="loginModal">
					<div class="modal-dialog">
					  <div class="modal-content">
					  	<!-- login model start -->
				        <div class="modal-body" id="login">
				        	<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="model-right">
					        	<div class="modal-header text-center">
						        	<button type="button" class="close close_m1 btn_a1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none" style="height: 100%; width: 100%;">
						        		<h4>Sign In</h4>
						        	</div>

						        </div>
						        <div class="col-md-12 submitloginbypassworderror"></div>
								<form action="" id="loginformpassword" class="d_none" method="post">
									<input type="hidden" name="clickbutton" class="clickbutton" value="">
									<div class="md-form">
						            	<i class="fa fa-user prefix grey-text m-number"></i>
				                        <input type="text" id="materialRegisterFormPhone" class="form-control loginmoibleno">
				                        <label for="materialRegisterFormPhone">Mobile Number...</label>
				                    </div>
				                    <div class="md-form">
				                    	<i class="fa fa-lock prefix grey-text m-number"></i>
						                <input type="password" id="materialRegisterFormPassword" class="form-control loginpassword" aria-describedby="materialRegisterFormPasswordHelpBlock">
						                <label for="materialRegisterFormPassword">Password</label>
						            </div>
									<div class="form-group form-check" style="margin-bottom: 0!important;">
										<label class="form-check-label float-right for_get fff">
										  <a class="forget_pass" style="color: red;">Forget ?</a>
										</label>
									</div>
									<div class="form-group form_submit">
										  <button type="button" class="btn btn-primary btn_l submitloginbypassword" style="background-color: #10414a!important;">Login</button>
									</div>
									<div class="form-group text-center" style="color: #919191;">
										  <h6 style="font-size: 12px;">OR</h6>
									</div>
									<div class="form-group form_submit">
										  <button type="button" class="btn  otp_btns loginbyotp" style="background-color: unset!important; color: black; width: 100%;">Login By OTP</button>
									</div>
									<!-- <div class="form-group text-center" style="width: 100%;">
										  <a class="otpsent otp_btns">Login By OTP</a>
									</div> -->
									<div class="form-group text-center create">
										  Click for <a class="sign_up" >  Create an account</a>
									</div>
								</form>
							</div>
						</div>
						<!-- login model End -->
						<!-- signup model start -->
				        <div class="modal-body d-none" id="signup">
				        	<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="model-right">
					        	<div class="modal-header text-center" style="padding: 0!important;">
						        	<button type="button" class="close close_m1 btn_a1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none">
						        		<h4>Sign up</h4>
						        	</div>
						        </div>
						        <div class="col-md-12 submitregistermsg"></div>
								<form  id="formregister" class="d_none">
									<!-- <div class="form-group">
									<input type="text" class="form-control" placeholder="Name...." id="email">
									</div> -->

									<!-- <div class="md-form">
							          <i class="fa fa-user prefix grey-text m-number"></i>
							          
							          <input type="text" id="form3" class="form-control validate rfirstname">
							          <label for="form3">Enter First name</label>

							          <input type="text" id="formlastname" class="form-control validate rlastname">
							          <label for="formlastname">Enter Last name</label>
                                    </div> -->
                                    <div class="form-row">
						                <div class="col">
						                    <!-- First name -->
						                    <div class="md-form">
						                    	<i class="fa fa-user prefix grey-text m-number"></i>
						                        <input type="text" id="RegisterFormFirstName" class="form-control rfirstname">
						                        <label for="RegisterFormFirstName">First name</label>
						                    </div>
						                </div>
						                <div class="col">
						                    <!-- Last name -->
						                    <div class="md-form">
						                        <input type="email" id="RegisterFormLastName" class="form-control rlastname">
						                        <label for="RegisterFormLastName">Last name</label>
						                    </div>
						                </div>
						            </div>
                                    <div class="md-form">
							          <i class="fa fa-mobile prefix grey-text m-number"></i>
							          <input type="text" id="orangeForm-name" class="form-control validate rmobilenumber">
							          <label for="orangeForm-name">Enter Mobile Number...</label>
							        </div>
							        <div class="md-form">
								        <i class="fa fa-lock prefix grey-text m-number"></i>
								        <input type="password" id="orangeForm-pass" class="form-control validate rpassword">
								        <label  for="orangeForm-pass">Enter Password</label>
							        </div>
							        <!-- <div class="md-form">
							          <i class="fa fa-map prefix grey-text m-number"></i>
							          <input type="text" id="pac-input" class="form-control validate">
							          <label for="orangeForm-name">Address</label>
							        </div> -->
							        <div class="col-md-12" style="padding: 0px">
						              <div class="col-md-6">
						                <div class="form-group">
						                  <input type="hidden" name="latitude"  class="form-control" id="latitude"  value="">
						                </div>
						              </div>
						              <div class="col-md-6">
						                <div class="form-group">
						                  <input type="hidden" name="longitude"  class="form-control" id="longitude"  value="">
						                </div>
						              </div>
						            </div>

						            <!-- <div class="col-md-12 col-md-offset-2" style="height: 243px;" id="embedMap"></div> -->
						            <div class="form-group form_submit">
										  <button type="button" class="btn submitregister btn-primary btn_l" style="background-color: #10414a!important;">Submit</button>
									</div>
									
									<div class="form-group text-center">
										  Already have Account?  <a class="signin"> sign in</a>
									</div>
								</form>
							</div>
						</div>
						<!-- login model End -->
						<!-- <forget
						 password start> -->
						<div class="modal-body d-none" id="forgat">
							<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="modal-right" style="padding: 0px 8px;">
					        	<div class="modal-header text-center">
						        	<button type="button" class="close close_m1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none" style="height: 100%; width: 100%; padding-top: 8px;">
						        		<h5>Forgot Your Password?</h5>
						        	</div>
						        </div>
								<form action="" id="forgotpasswordform" class="d_none">
									<!-- <div class="form-group">
									<input type="email" class="form-control" placeholder="Enter Mobile Number...." id="email"> -->
									<div class="md-form phone_nu">
						                <input type="text" id="fomrsphonenoforgot" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
						                <label for="fomrsphonenoforgot">Phone number</label>
                                    </div>
									<div class="form-group form-check">
									</div>
									<div class="form form_submit">
										<button type="submit" class="btn btn-default btn_l btn_submit fogotpasswordsubmit" style="background-color: #10414a!important;">Submit</button>
									</div>
									<div class="form-group text-center mt-3">
										  click for <a class="sign_up" > sign up</a>
									</div>
								</form>
				        	</div>
						</div>
						<!-- <forget password end> -->
						<!-- <sent otp start> -->
						<div class="modal-body d-none" id="loginotp">
							<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="modal-right" style="padding: 0px 8px;">
					        	<div class="modal-header text-center">
						        	<button type="button" class="close close_m1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none" style="height: 100%; width: 100%; padding-top: 8px;">
						        		<h5>Enter Mobile No.</h5>
						        	</div>
						        </div>
						        <div class="col-md-12 loginbyotpsubmitmsg"></div>
								<form action="" class="d_none">
									<!-- <div class="form-group">
									<input type="email" class="form-control" placeholder="Enter Mobile Number...." id="email"> -->
									<div class="md-form phone_nu">
						                <input type="text" id="loginbyotpmobile" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
						                <label for="fomrsloginotp">Enter Mobile No.</label>
                                    </div>
									<div class="form-group form-check">
									</div>
									<div class="form form_submit">
										  <button type="submit" class="btn btn-default btn_l loginbyotpsubmit" style="background-color: #10414a!important;">Submit</button>
									</div>
									<div class="form-group text-center mt-3">
										  click for <a class="sign_up" > sign up</a>
									</div>
								</form>
				        	</div>
						</div>
						<div class="modal-body d-none" id="verifyloginotpmodel">
							<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="modal-right" style="padding: 0px 8px;">
					        	<div class="modal-header text-center">
						        	<button type="button" class="close close_m1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none" style="height: 100%; width: 100%; padding-top: 8px;">
						        		<h5>Enter OTP.</h5>
						        	</div>
						        </div>
						        <div class="col-md-12 verifyloginotpmsg"></div>
								<form action="/action_page.php" class="d_none">
									<!-- <div class="form-group">
									<input type="email" class="form-control" placeholder="Enter Mobile Number...." id="email"> -->
									<input type="hidden" name="clickbutton" class="clickbutton" value="">

									<div class="md-form phone_nu">
						                <input type="text" id="loginotpval" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
						                <label for="fomrsloginotp">Enter OTP.</label>
                                    </div>
									<div class="form-group form-check">
									</div>
									<div class="form form_submit">
										  <button type="submit" class="btn btn-default btn_l verifyloginotp" style="background-color: #10414a!important;">Submit</button>
									</div>
									<div class="form-group text-center mt-3">
										  click for <a class="sign_up" >sign up</a>
									</div>
								</form>
				        	</div>
						</div>
						<!-- <sent otp start> -->
							<!-- <sent otp start> -->
						<div class="modal-body d-none" id="registerotp">
							<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="modal-right" style="padding: 0px 8px;">
					        	<div class="modal-header text-center">
						        	<button type="button" class="close close_m1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none" style="height: 100%; width: 100%; padding-top: 8px;">
						        		<h5>Enter OTP</h5>
						        	</div>
						        </div>
						        <div class="col-md-12 submitregisterotpmsg"></div>
								<form action="" >
									<div class="md-form phone_nu">
						                <input type="password" id="fomrsregisterotp" class="form-control registerinputopt" aria-describedby="materialRegisterFormPhoneHelpBlock">
						                <label for="fomrsregisterotp">Enter OTP</label>
                                    </div>
									<div class="form-group form-check">
									</div>
									<div class="form form_submit">
										<button type="button" class="btn btn-default btn_l submitregisterotp" style="background-color: #10414a!important;">Submit</button>
									</div>
									<div class="form-group text-center mt-3">
										  click for <a class="sign_up" > sign up</a>
									</div>
								</form>
				        	</div>
						</div>	
						<!-- <sent otp start> -->

						<div class="modal-body d-none" id="forgototpmodel">
							<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="modal-right" style="padding: 0px 8px;">
					        	<div class="modal-header text-center">
						        	<button type="button" class="close close_m1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none" style="height: 100%; width: 100%; padding-top: 8px;">
						        		<h5>Enter OTP</h5>
						        	</div>
						        </div>
						        <div class="col-md-12 verifyForgotOtpmsg"></div>
								<form action="" class="d_none">
									<!-- <div class="form-group">
									<input type="email" class="form-control" placeholder="Enter Mobile Number...." id="email"> -->
									<div class="md-form phone_nu">
						                <input type="text" id="forgototpval" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
						                <label for="fomrsloginotp">Enter OTP</label>
                                    </div>
									<div class="form-group form-check">
									</div>
									<div class="form form_submit">
										  <button type="button" class="btn btn-default btn_l verifyForgotOtp" style="background-color: #10414a!important;">Verify</button>
									</div>
									<!-- <div class="form-group text-center mt-3">
										  click for <a class="sign_up"></a>
									</div> -->
								</form>
				        	</div>
						</div>

						<div class="modal-body d-none" id="changeforgotpassword">
							<div class="model-left text-center">
				        		<img src="<?php echo base_url().'uploads/'.getWebOptionValue('front_logo');?>">
				        	</div>
				        	<div class="modal-right" style="padding: 0px 8px;">
					        	<div class="modal-header text-center">
						        	<button type="button" class="close close_m1" data-dismiss="modal">&times;</button>
						        	<div class="login_sign_btn d_none" style="height: 100%; width: 100%; padding-top: 8px;">
						        		<h5>Set New Password</h5>
						        	</div>
						        </div>
						        <div class="col-md-12 changeforgotpasswrodmsg"></div>
								<form action="" class="d_none">
									<!-- <div class="form-group">
									<input type="email" class="form-control" placeholder="Enter Mobile Number...." id="email"> -->
									<div class="md-form phone_nu">
						                <input type="password" id="fnewpassword" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
						                <label for="fomrsloginotp">Enter New Password</label>
                                    </div>
                                    <div class="md-form phone_nu">
						                <input type="password" id="fcpassword" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
						                <label for="fomrsloginotp">Confirm Password</label>
                                    </div>
									<div class="form-group form-check">
									</div>
									<div class="form form_submit">
										  <button type="button" class="btn btn-default btn_l changeforgotpasswrodsubmit" style="background-color: #10414a!important;">Submit</button>
									</div>
									<!-- <div class="form-group text-center mt-3">
										  click for <a class="sign_up"></a>
									</div> -->
								</form>
				        	</div>
						</div>
					  </div>
					</div>
				</div>
				<!-- model end -->
			

				<!-- <on load modal popup start> -->
					<!-- <div class="container">
					  <div class="modal" id="irfan">
					    <div class="modal-dialog models_p modal-lg">
					      <div class="modal-content">
					          <button type="button" class="close clsl" data-dismiss="modal">&times;</button>
					        <div class="modal-body">
					          <img src="<?php echo base_url()?>front_assets/images//o.jpg" class="img-fluid" style="height: 100%;
					          width: 100%;">
					        </div>
					      </div>
					    </div>
					  </div>
                    </div> -->
				<!-- <onload modal popup end> -->
			</div>
		</div>
	</header> 
	<!-- <header end> -->

 
 <a href="<?php echo base_url(); ?>clearance_product" target="" id="subscribe_youtube" class="">
      <img class="img-responsive you" src="<?php echo base_url();?>front_assets/images/clearanceimg4.png" alt="subscribe" title="Products">

  </a>  


	<!-- <mobile fixed nav start> -->
	<div id="stickymenu_bottom_mobile">
      <div class="row align-items-center justify-content-center hidden-md-up text-center no-gutters">
        <div class="stickymenu-item col">
          <a href="#"><i class="icon-house"></i><span>Home</span></a>
        </div>
        <div class="stickymenu-item col">
          <a href="<?php echo base_url(); ?>clearance_product">
          	<img src="<?php echo base_url();?>front_assets/images/clearanceimg3.png" style="height: 23px; vertical-align: top;"><span>Clearance Product</span></a>
        </div>
        <div class="stickymenu-item col">
          <a href="#" class="nov-toggle-page" data-target="#mobile-pageaccount"><i class="icon-settings"></i><span>Setting</span></a>
        </div>
        <div class="stickymenu-item col">
        	<div id="_mobile_back_top">
        		<div id="back-top">
				    <span>
				    	<a href="" class="scrollTop">
				    		<i class="icon-up"></i><span>On Top</span></i>
				    	</a>				      
				    </span>
    				<!-- <span class="text">On Top</span> -->
  				</div>
  			</div>
  		</div>
      </div>
    </div>
	<!-- <mobile fixed nav end > -->
	<!-- <cart inner section start> -->
	<div class="ddd" id="cart_items" style="display: none;z-index: 999;">
		<?php include('partials/cart.php'); ?>
	</div>
