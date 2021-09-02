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
                        <li>
                            <a href="sign-in.html" class="user-button"><i class="flaticon-user"></i></a>
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
                                <!-- <li>
                                    <a href="index.html">Home Page One</a>
                                </li>
                                <li>
                                    <a href="index-2.html">Home Page Two</a>
                                </li>
                                <li>
                                    <a href="index-3.html">Home Page Three</a>
                                </li>
                                <li>
                                    <a href="index-4.html">Home Page Four</a>
                                </li>
                                <li>
                                    <a href="index-5.html">Home Page Five</a>
                                </li> -->
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
            <a href="index.html" class="logo">
                <img src="<?php echo base_url();?>home/fornt_new_assests/assets/images/logo/logo2.png" alt="logo">
            </a>
            <span class="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="bottom-content">
            <div class="cart-products">
                <h4 class="title">Shopping cart</h4>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="assets/images/shop/shop01.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Color Pencil</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="assets/images/shop/shop02.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Water Pot</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="assets/images/shop/shop03.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Art Paper</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="assets/images/shop/shop04.jpg" alt="shop"></a>
                    </div>
                    <div class="content">
                        <h4 class="title"><a href="#0">Stop Watch</a></h4>
                        <div class="price"><span class="pprice">$80.00</span> <del class="dprice">$120.00</del></div>
                        <a href="#" class="remove-cart">Remove</a>
                    </div>
                </div>
                <div class="single-product-item">
                    <div class="thumb">
                        <a href="#0"><img src="assets/images/shop/shop05.jpg" alt="shop"></a>
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

    <!--============= Feture Auction Section Starts Here =============-->
    <section class="feature-auction-section padding-bottom padding-top bg_img stt-quote" data-background="assets/images/auction/featured/featured-bg-1.jpg">
        <div class="container">
           <!--  <div class="section-header">
                <h2 class="title">Featured Items</h2>
                <p>Bid and win great deals,Our auction process is simple, efficient, and transparent.</p>
            </div> -->
            <div class="row justify-content-center mb-30-none">
                <div class="col-sm-10 col-md-12 col-lg-12">
                  <div class="quote-form"> 
                    <h3 class="st-req">Global Request</h3>
                      <form class="login-form">
                        <div class="form-group mb-30">
                            <label for="login-name"></label>
                            <select >
                                <option>--Select Category--</option>
                                <option>Home Appliance</option>
                                <option>Electronics</option>
                                <option>Automobiles</option>
                            </select>
                        </div>
                        <div class="form-group mb-30">
                            <label for="login-name"></label>
                            <select >
                                <option>--Select product--</option>
                                <option>Fridge</option>
                                <option>Microwave</option>
                                <option>Watches</option>
                                <option>Mobiles</option>
                            </select>
                        </div>
                        <div class="form-group mb-30">
                            <label for="login-name"></label>
                            <select >
                                <option>--Select Brand--</option>
                                <option>Fridge</option>
                                <option>Microwave</option>
                                <option>Watches</option>
                                <option>Mobiles</option>
                            </select>
                        </div>
                        <div class="form-group mb-30">
                            <label for="price"></label>
                            <input type="text" id="price" placeholder="Max Price in Rupees ">
                        </div>
                        <div class="form-group">
                            <label for="login-pass"></label>
                            <textarea name="message" id="message" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group mb-30">
                            <label for="login-name"></label>
                            <select >
                                <option>--Select city--</option>
                                <option>Indore</option>
                                <option>Bhopal</option>
                                <option>Sagar</option>
                            </select>
                        </div>
                        <div class="form-group mb-30">
                            <label for="login-name"></label>
                            <select >
                                <option>--Select Area--</option>
                                <option>Lorem</option>
                                <option>Lorem</option>
                                <option>Lorem</option>
                                <option>Lorem</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                           <a href="buyer-home.html" class="custom-button st-btn " data-toggle="modal" data-target="#exampleModal">Sent Request</a>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
            <!-- <div class="load-wrapper">
                <a href="#0" class="normal-button">See All Auction</a>
            </div> -->
        </div>
    </section>
    <!--============= Feture Auction Section Ends Here =============-->


   
    <!--============= Footer Section Ends Here =============-->
    