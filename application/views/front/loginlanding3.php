<!-- <!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8"> -->
    
    <!--====== Title ======-->
   <!--  <title>Welcome to Premio </title> -->
    
  <!--   <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!--====== Favicon Icon ======-->
   <!--  <link rel="shortcut icon" href="assets/images/pream-logo.png" type="image/png"> -->
        
    <!--====== Magnific Popup CSS ======-->
   <!--  <link rel="stylesheet" href="assets/css/magnific-popup.css"> -->
        
    <!--====== Slick CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/slick.css"> -->
        
    <!--====== Line Icons CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/LineIcons.css"> -->
        
    <!--====== Bootstrap CSS ======-->
   <!--  <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    
    <!--====== Default CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/default.css"> -->
    
    <!--====== Style CSS ======-->
   <!--  <link rel="stylesheet" href="assets/css/style.css"> -->
    
    <style>
	.loginDiv{ max-width:500px; width:100%; padding:20px; margin:0 auto; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; margin-top:50px; margin-bottom:50px;}
	.footer-area {
    background-color: #f4f6f7;
    padding-top: 10px;
    padding-bottom: 10px;
}
    		@media screen and (max-width: 900px) {
  .top-margin{margin-top:50px;}
  .about-text {
    font-size: 39px;
    margin: 0 auto;
    text-align: center;
    line-height: 500px;
    color: #FFF;
}
.about-img {
    width: 100%;
    background-image: url(assets/images/banner1.jpg);
    background-size: cover;
   height: 300px;
}
.about-text {
    font-size: 39px;
    margin: 0 auto;
    text-align: center;
    line-height: 300px;
    color: #FFF;
}
.menupadding{ padding:15px 0px 15px 0px;}


    </style>
<div class="container-fluid mt-100 border-top">
	<div class="container">
    	<div class="row">
            <div class="col-lg-12">
                <div class="loginDiv">
                   <?php if(!empty($error)){?> <div class="text-center text-danger"><?php  echo !empty($error) ? $error :'';?></div><?php }else{?>
                   <div class="text-center text-sucess"><?php  echo !empty($success) ? $success :'';?></div>
                   <?php } ?>
                    <!-- <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group mt-10" style="margin-top:20px;">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-danger mt-20">Submit</button>
                    </form> -->
                    <form  id="loginform" method="post" style="padding: 15px;">
                         <div class="form-group has-feedback">
                            <label>Otp</label>
                            <input type="number" class="form-control" id="password" name="otp" placeholder="OTP">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                      <div class="row">
                        <!-- <div class="col-xs-8">
                          <div class="checkbox icheck">
                            <label>
                              <input type="checkbox"> Remember Me
                            </label>
                          </div>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-xs-4">
                          <button type="submit" class="btn btn-success btn-block btn-flat">Send</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
   <!--  <section class="footer-area bg-dark mt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright text-center fontsize14" >
                        <p class="text text-danger fontsize14"><a rel="nofollow" class="text-white fontsize14" href="#">© Copyright 2020. All Rights Reserved By Preamio </a> <br>Designed by <a href="#" rel="nofollow" class="text-white">IT Spark Technology</a>   </p>  
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

   <!--  <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a> -->

    <!--====== BACK TOP TOP PART ENDS ======-->    

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
   <!--  <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script> -->
    
    <!--====== Bootstrap js ======-->
   <!--  <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> -->
    
    <!--====== Slick js ======-->
   <!--  <script src="assets/js/slick.min.js"></script> -->
    
    <!--====== Magnific Popup js ======-->
   <!--  <script src="assets/js/jquery.magnific-popup.min.js"></script> -->
    
    <!--====== Ajax Contact js ======-->
   <!--  <script src="assets/js/ajax-contact.js"></script> -->
    
    <!--====== Isotope js ======-->
    <!-- <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script> -->
    
    <!--====== Scrolling Nav js ======-->
   <!--  <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script> -->
    
    <!--====== Main js ======-->
    <!-- <script src="assets/js/main.js"></script>
    
</body>

</html> -->
