<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown-content.text-left.st-drop {
    right: 20px;
}
a.st-ankr {
    color: #000;
    padding: 8px 0px;
}
</style>
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="overlayer" id="overlayer">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->


    <!--============= Header Section Starts Here =============-->
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <ul class="customer-support">
                        <li>
                            <a href="#0" class="mr-3"><i class="fas fa-phone-alt"></i><span class="ml-2 d-none d-sm-inline-block">Customer Support</span></a>
                        </li>
                        <li>
                            <i class="fas fa-globe"></i>
                            <select name="language" class="select-bar">
                                <option value="en">En</option>
                                <option value="Bn">Bn</option>
                                <option value="Rs">Rs</option>
                                <option value="Us">Us</option>
                                <option value="Pk">Pk</option>
                                <option value="Arg">Arg</option>
                            </select>
                        </li>
                    </ul>
                    <ul class="cart-button-area">
                        <li>
                            <a href="#0" class="vt-cash"><span class="amount">Virtual Cash &#8377 0.00</span></a>
                        </li>  
                        <li>
                            <a href="#0" class="cart-button"><i class="flaticon-shopping-basket"></i><span class="amount">08</span></a>
                        </li>                        
                        <li class="dropdown">
                            <a href="" class="user-button"><i class="flaticon-user"></i></a>
                             <div class="dropdown-content text-left st-drop">
                                <a href="javascript:void(0);" class="st-ankr">Profile</a>
                                <a href="javascript:void(0);" class="st-ankr">Dashboard</a>
                                <a href="javascript:void(0);" class="st-ankr">lorem</a>
                                <a href="javascript:void(0);" class="st-ankr">lorem</a>
                                <a href="javascript:void(0);" class="st-ankr">lorem</a>
                             </div>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="<?php echo base_url();?>home">
                            <img src="<?php echo base_url();?>fornt_new_assests/assets/images/logo/st-logo.png" alt="logo" class="logo-st">
                        </a>
                    </div>
                    <ul class="menu ml-auto">
                        <li>
                            <a href="#0">Home</a>
                            <ul class="submenu">
                            </ul>
                        </li>
                        <li>
                            <a href="product.html">Auction</a>
                        </li>
                        <li>
                            <a href="#0">Pages</a>
                            <ul class="submenu">
                                <li>
                                    <a href="#0">Product</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="product.html">Product Page 1</a>
                                        </li>
                                        <li>
                                            <a href="product-2.html">Product Page 2</a>
                                        </li>
                                        <li>
                                            <a href="product-details.html">Product Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">My Account</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="sign-up.html">Sign Up</a>
                                        </li>
                                        <li>
                                            <a href="sign-in.html">Sign In</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#0">Dashboard</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="dashboard.html">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="profile.html">Personal Profile</a>
                                        </li>
                                        <li>
                                            <a href="my-bid.html">My Bids</a>
                                        </li>
                                        <li>
                                            <a href="winning-bids.html">Winning Bids</a>
                                        </li>
                                        <li>
                                            <a href="notifications.html">My Alert</a>
                                        </li>
                                        <li>
                                            <a href="my-favorites.html">My Favorites</a>
                                        </li>
                                        <li>
                                            <a href="referral.html">Referrals</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <li>
                                    <a href="faqs.html">Faqs</a>
                                </li>
                                <li>
                                    <a href="error.html">404 Error</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                    </ul>
                    <form class="search-form white">
                        <input type="text" placeholder="Search for brand, model....">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <div class="search-bar d-md-none">
                        <a href="#0"><i class="fas fa-search"></i></a>
                    </div>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->

    <!--============= Cart Section Starts Here =============-->
    <div class="cart-sidebar-area">
        <div class="top-content">
            <a href="<?php echo base_url();?>home" class="logo">
                <img src="<?php echo base_url();?>fornt_new_assests/assets/images/logo/logo2.png" alt="logo">
            </a>
            <span class="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="bottom-content">
            <div class="cart-products">
                <h4 class="title">Shopping cart</h4>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/shop/shop01.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Color Pencil</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/shop/shop02.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Water Pot</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/shop/shop03.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Art Paper</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/shop/shop04.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Stop Watch</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/shop/shop05.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Comics Book</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="btn-wrapper text-center">
                    <a href="#0" class="custom-button"><span>Checkout</span></a>
                </div>
            </div>
        </div>
    </div>
    <!--============= Cart Section Ends Here =============-->


    <!--============= Banner Section Starts Here =============-->
    <section class="banner-section-2 bg_img" data-background="">
        <div class="container">
            <div class="row align-items-center justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner-content cl-white">
                        <h5 class="cate">Welcome to <b style="color: #f65275">leastquote</b>  Buyer's</h5>
                        <h1 class="title"><span class="d-xl-block">Hot Deal</span> For You</h1>
                        <p>
                            We’re constantly bringing new properties market so keep visiting our website that you don’t miss out on the next opportunity.
                        </p>
                       <!--  <a href="#0" class="custom-button yellow btn-large">Get Started</a> -->
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6 d-none d-lg-block">
                    <div class="banner-thumb">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/banner/banner-2.png" alt="banner">
                    </div>
                </div>                
            </div>
        </div>
        <div class="banner-shape-2 d-none d-lg-block">
            <img src="<?php echo base_url();?>fornt_new_assests/assets/css/img/banner-shape-2.png" alt="css">
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->


    <!--============= Hightlight Slider Section Starts Here =============-->
    <div class="browse-slider-section mt--140">
        <div class="container">
            <div class="section-header-2 mb-4">
                <div class="left">
                    <h6 class="title cl-white cl-lg-black pl-0">All Categories</h6>
                </div>
                <div class="slider-nav">
                    <a href="#0" class="bro-prev"><i class="flaticon-left-arrow"></i></a>
                    <a href="#0" class="bro-next active"><i class="flaticon-right-arrow"></i></a>
                </div>
            </div>
            <div class="m--15">
                <div class="browse-slider owl-theme owl-carousel">
                    <a href="#0" class="browse-item st-ht" data-toggle="modal" data-target="#requestModalCenter">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/06.png" alt="auction">
                        <span class="info">Home Appliance</span>
                    </a>
                    <a href="#0" class="browse-item st-ht" data-toggle="modal" data-target="#electronicModalCenter">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/04.png" alt="auction">
                        <span class="info">Electronics</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/01.png" alt="auction">
                        <span class="info">Automobile</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/06.png" alt="auction">
                        <span class="info">Hotal</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/pharmacy-img.png" alt="auction">
                        <span class="info">Pharamcy</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                         <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/pharmacy-img.png" alt="auction">
                        <span class="info">Healthcare services</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/01.png" alt="auction">
                        <span class="info">Travel</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/event-img.png" alt="auction">
                        <span class="info">Events</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/profess-img.png" alt="auction">
                        <span class="info">Professional services</span>
                    </a>
                    <a href="#0" class="browse-item st-ht">
                        <img src="<?php echo base_url();?>fornt_new_assests/assets/images/auction/fitness-img.png" alt="auction">
                        <span class="info">Fitness</span>
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
    <!--============= Hightlight Slider Section Ends Here =============-->


    <!--============= Feture Auction Section Starts Here =============-->
    <!-- <section class="feature-auction-section padding-bottom padding-top bg_img" data-background="<?php echo base_url();?>fornt_new_assests/assets/images/auction/featured/featured-bg-1.jpg">
        <div class="container">

            <div class="row justify-content-center mb-30-none">
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="<?php echo base_url();?>home/globalQuote" class="buyer-text"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/logo/global-img.png" alt="" class="img-glob"/>Global Request</a>
                           
                        </div>
                       
                    </div>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="<?php echo base_url();?>home/inShopRequest" class="buyer-text"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/logo/store-img.png" alt="" class="img-glob"/> Shop Request</a>
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>
    </section> -->
    <!--============= Feture Auction Section Ends Here =============-->


    <!-- modal for home appliance request -->
    <div class="modal fade" id="requestModalCenter" tabindex="-1" role="dialog" aria-labelledby="requestModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                     <div class="row justify-content-center mb-30-none">
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="<?php echo base_url();?>home/globalQuote" class="buyer-text"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/logo/global-img.png" alt="" class="img-glob"/>
                            <p class="title-st">Global Request</p>
                            </a>
                        </div>
                       
                    </div>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="<?php echo base_url();?>home/inShopRequest" class="buyer-text"><img src="<?php echo base_url();?>fornt_new_assests/assets/images/logo/store-img.png" alt="" class="img-glob"/>
                                <p class="title-st">Shop Request</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
              </div>
             
            </div>
          </div>
     </div>
    <!-- close -->

    <!-- modal for electronic -->
      <div class="modal fade" id="electronicModalCenter" tabindex="-1" role="dialog" aria-labelledby="electronicModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
              </div>
              <div class="modal-body">
                     <div class="row justify-content-center mb-30-none">
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="<?php echo base_url();?>home/demo" class="buyer-text"><img src="assets/images/logo/global-img.png" alt="" class="img-glob"/>
                            <p class="title-st">Global Request</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <div class="auction-item-2">
                        <div class="auction-thumb">
                            <a href="<?php echo base_url();?>home/inShopRequest" class="buyer-text"><img src="assets/images/logo/store-img.png" alt="" class="img-glob"/>
                                <p class="title-st">Shop Request</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
              </div>
            </div>
          </div>
        </div>
 <!-- modal for electronic close-->




  