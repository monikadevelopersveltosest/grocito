<style>
  /* Make the image fully responsive */

	.body1 {
	    /*position: relative;*/
	    top: 0;
	    left: 0;
	    z-index: 0;
	    width: 100%;
	    height: 100%;
	    background-attachment: fixed;
	}
	.pb-50{
		padding-bottom: 50px;
	}
	.right_text h3{
		font-weight: bold;
		color: #124b56;
	}
	.right_text p{
		/*text-align: justify;*/
		color: #757979;
		font-weight: 600;
	}
	.gift-sec .fa{
		font-size: 60px;
		color: #eeaf49;
	}
	.gift-sec p{
		font-size: 13px;
		color: #888;
		line-height: 22px;
	}
	.gift-sec h6{
		font-weight: bold;
		color: #de941be6;
		padding-top: 15px;
		padding-bottom: 10px;
		font-size: 20px;
	}
	.main_heading{
		padding: 50px;
	}
	.main_heading h2{
		font-weight: 600;
		color: #4b4c4c;
	}
	/*<>*/
	.bg-back{
		height: 225px; 
		background-size: cover; 
		background-position: center center; 
		background-repeat: no-repeat;
	}
	.bg-img-text{
		padding-top: 86px; 
		color: white;
	}
	@media screen and (max-width: 768px){
		.bg-back{
			height: 81px;
		}
		.bg-img-text{
			padding-top: 23px;
	}
		.bg-img-text h2{
			font-size: 21px;
		}

	}
	.bg{
		position: relative;
	}
		.bg-back:before{
		content: '';
	    position: absolute;
	    left: 0;
	    top: 0;
	    background-color: rgba(0, 0, 0, 0.53); 
	    width: 100%;
	    height: 100%;	
		}
		.bg-img-text h2{
			display: inline-block;
			border-bottom: 2px solid #62e6ff;
		}

</style>
	<!-- <mobile fixed nav start> -->
	<div id="stickymenu_bottom_mobile">
      <div class="row align-items-center justify-content-center hidden-md-up text-center no-gutters">
        <div class="stickymenu-item col">
          <a href="#"><i class="icon-house"></i><span>Home</span></a>
        </div>
        <div class="stickymenu-item col">
          <a href="#">
          	<i class="icon-heart"></i><span>Search</span></a>
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
	<div class="ddd" style="display: none;z-index: 999;">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sec">
					<h5>My Cart (3items)</h5>
					<i class="fa fa-close popup-none close_btn"></i>
				</div>
				<div style="overflow-y: scroll; max-height: 278px; padding: 5px;">
					<div class=" sec1 p-1">
					    <img src="images/cart/c1.png" class="img-fluid cart-img1">
					     <div class="sec1-text  ">
					        <a href=""><span style="">Gropers Mother's Choice<br> American</span></a>
					    </div>
					    <div class="price-close-btn pull-right">
					    	<p>
					    		<span>$300</span>
					    		<i class="fa fa-close cls1"></i>
					    	</p>
					    </div>
					</div>
					<div class="sec2 p-1">
					    <img src="images/cart/c4.jpg" class="img-fluid cart-img1">
					    <div class="price-close-btn pull-right">
					    	<p>
					    		<span>$350</span>
					    		<i class="fa fa-close cls2"></i>
					    	</p>
					    </div>
					    <div class="sec1-text  mt-2">
					        <a href=""><span>Gropers Mother's Choice American</span></a>
					    </div>
					</div>
					<div class="sec3 p-1">
					    <img src="images/cart/c1.png" class="img-fluid cart-img1">
					    <div class="price-close-btn pull-right">
					    	<p>
					    		<span>$360</span>
					    		<i class="fa fa-close cls3"></i>
					    	</p>
					    </div>
					    <div class="sec1-text  mt-2">
					        <a href="" ><span>Gropers Mother's Choice American</span></a>
					    </div>
					</div>
				</div>
				<div class="sec5 p-3">
					<span style="padding-left: 10px;"><strong>TOTAL</strong></span>
					<h6 style="float: right; padding-right: 35px;"><span>$1250</span></h6>
				</div>
				<div class="sec4 text-center">
					<button type="button" class="btn btn-default d2 ml-3">Checkout</button>
				</div>
			</div>
		</div>
	</div>
	<!-- <cart inner section end> -->
		<!-- <map start>-->
	<section class="bg">
		<div class="container-fluid" style="padding-left: 0!important; padding-right: 0!important;">
			<div class="bg-back" style="background-image: url(front_assets/images/about/bg-back.jpg);">
				<div class="row text-center">
					<div class="col-md-12 bg-img-text">
						<h2>About Us</h2>
					</div>
				</div>
			</div>
			<!-- <div class="overlay" style="position: absolute; left: 0; top: 0; background-color: rgba(0,0,0,.6);"></div> -->
		</div>
	</section>	
	<!-- <map start>-->
		<!-- <sec2 start> -->
		<section class="pt-50 pb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="left_img">
							<img src="<?php echo base_url();?>front_assets/images/about/left_img.jpg" class="img-fluid">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="right_text">
							<h3>Why should I use multivendore.com?</h3>
							<p>multivendor.com allows you to walk away from the drudgery of grocery shopping and welcome an easy relaxed way of browsing and shopping for groceries. Discover new products and shop for all your food and grocery needs from the comfort of your home or office. No more getting stuck in traffic jams, paying for parking, standing in long queues and carrying heavy bags – get everything you need, when you need, right at your doorstep. Food shopping online is now easy as every product on your monthly shopping list, is now available online at multivendor.com, India’s best online grocery store.About multivendor</p>
							<p>you will find everything you are looking for. Right from fresh Fruits and Vegetables, Rice and Dals, Spices and Seasonings to Packaged products, Beverages, Personal care products, Meats – we have it all.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- <sec2 end> -->
		<section class=" pb-50" >
			<div class="container" style="box-shadow: 1px 1px 5px 0px #ccc; padding-bottom: 50px;">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="main_heading">
							<h2>What We Provide?</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="gift-sec text-center">
							<i class="fa fa-gift " aria-hidden="true"></i>
							<h6>Best Prices & Offers</h6>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="gift-sec text-center">
							<i class="fa fa-truck"></i>
							<h6>Free & Next Day Delivery</h6>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="gift-sec text-center">
							<i class="fa fa-shopping-basket"></i>
							<h6>100% Satisfaction Guarantee</h6>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="gift-sec text-center">
							<i class="fa fa-tag"></i>
							<h6>Great Daily Deals Discount</h6>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="gift-sec text-center">
							<i class="fa fa-globe"></i>
							<h6>Wide Assortment</h6>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="gift-sec text-center">
							<i class="fa fa-retweet"></i>
							<h6>Easy Returns</h6>
							<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
						</div>
					</div>
				</div>




			</div>
		</section>
	<!-- <address detail sec start> -->
	
	<!-- <address detail sec end> -->