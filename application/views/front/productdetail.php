<link rel="stylesheet" href="<?php echo base_url()?>front_assets/css/owl.theme.css" type="text/css">

<link rel="stylesheet" href="<?php echo base_url()?>front_assets/css/flexslider.css" type="text/css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>front_assets/css/prd-view.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">

<style type="text/css">
	.product-view .new-label {
        width: auto !important;
        padding-right: 5px;
        padding-left: 5px;
        left: 49px !important;
    }
	.input-text{

		height: 37px;

	    border-color: #77776647;

	    width: 19%;

	}

	.checkbox-color label {

	    width: 2.25rem;

	    height: 2.25rem;

	    float: left;

	    padding: 0.375rem;

	    margin-right: 0.375rem;

	    display: block;

	    font-size: 0.875rem;

	    text-align: center;

	    opacity: 0.7;

	    border: 2px solid #d3d3d3;

	    border-radius: 50%;

	    -webkit-transition: all 0.3s ease;

	    -moz-transition: all 0.3s ease;

	    -o-transition: all 0.3s ease;

	    -ms-transition: all 0.3s ease;

	    transition: all 0.3s ease;

	    transform: scale(0.95);

	}

	.checkbox-color input {

	    left: -9999px;

	    position: absolute;

	}

	.checkbox-color input:checked ~ label {

	    transform: scale(1.1);

	    opacity: 1;

	}

	label {

	    font-weight: 400;

	    font-size: 0.8rem;

	    text-transform: none;

	    color: rgba(0, 0, 0, 0.7);

	}

	input {

	    -webkit-writing-mode: horizontal-tb !important;

	    text-rendering: auto;

	    color: -internal-light-dark-color(black, white);

	    letter-spacing: normal;

	    word-spacing: normal;

	    text-transform: none;

	    text-indent: 0px;

	    text-shadow: none;

	    display: inline-block;

	    text-align: start;

	    -webkit-appearance: textfield;

	    background-color: -internal-light-dark-color(white, black);

	    -webkit-rtl-ordering: logical;

	    cursor: text;

	    margin: 0em;

	    font: 400 13.3333px Arial;

	    padding: 1px 0px;

	    border-width: 2px;

	    border-style: inset;

	    border-color: initial;

	    border-image: initial;

	}

	input[type="radio" i] {

	    background-color: initial;

	    cursor: default;

	    -webkit-appearance: radio;

	    box-sizing: border-box;

	    margin: 3px 3px 0px 5px;

	    padding: initial;

	    border: initial;

	}

	.list-inline {

	    padding-left: 0;

	    list-style: none;

	}

	label {

	    font-weight: 400;

	    font-size: 0.8rem;

	    text-transform: none;

	    color: rgba(0, 0, 0, 0.7);

	}



	.checkbox-color input:checked ~ label:after {

	    content: "\f00c";

	    font-family: "FontAwesome";

	}

	.checkbox-color input:checked ~ label:after {

	    /*content: "\f121";

	    font-family: "Ionicons";*/

	    position: absolute;

	    top: 50%;

	    left: 50%;

	    transform: translate(-50%, -50%);

	    color: rgba(255, 255, 255, 0.7);

	    font-size: 14px;

	}



	.checkbox-alphanumeric input:checked ~ label {

	    transform: scale(1);

	}

	.checkbox-alphanumeric--style-1 label {

	    width: auto;

	    padding-left: 1rem;

	    padding-right: 1rem;

	    border-radius: 2px;

	}



	.checkbox-alphanumeric label {

	    width: 2.25rem;

	    height: 2.25rem;

	    float: left;

	    padding: 0.375rem 0;

	    margin-right: 0.375rem;

	    display: block;

	    color: #818a91;

	    font-size: 0.875rem;

	    font-weight: 400;

	    text-align: center;

	    background: transparent;

	    text-transform: uppercase;

	    border: 1px solid #e6e6e6;

	    border-radius: 2px;

	    -webkit-transition: all 0.3s ease;

	    -moz-transition: all 0.3s ease;

	    -o-transition: all 0.3s ease;

	    -ms-transition: all 0.3s ease;

	    transition: all 0.3s ease;

	    transform: scale(0.95);

	}

	.checkbox-alphanumeric input {

	    left: -9999px;

	    position: absolute;

	}

	.btn-anim-primary, .form-control:focus, .sub-cat-featured a:hover, .brands-collapse-box li:hover, .widget-profile-menu a.active, button.paction.add-wishlist:hover, button.paction.add-compare:hover, .all-category-menu ul li.active, .all-category-menu ul li.active:before, .product-gal-thumb a img.xactive, label.payment_option input:checked + span, .link--bb-1, .ribbon.bg-base-1:before, .ribbon.bg-base-1:after, .btn-base-1, .card-hover--animation-1:hover .btn, .delimiter-left-thick--style-1, .checkbox input[type="checkbox"]:checked + label::before, .checkbox input[type="radio"]:checked + label::before, .checkbox-primary input[type="checkbox"]:checked + label::before, .checkbox-primary input[type="radio"]:checked + label::before, .radio-primary input[type="radio"]:checked + label::before, input:checked + .toggle-switch-slider:before, input:checked + .toggle-switch-slider, .checkbox-alphanumeric input:checked ~ label, .checkbox-color input:checked ~ label, a > .feature--boxed-border:hover, .icon-block--style-1-v3 .block-icon, .icon-block--style-1-v5.block-bordered-grid-animated:hover .block-inner::after, .icon-block--style-2-v2.active .block-icon, .icon-block--style-2-v2:hover .block-icon, .icon-block--style-4:hover .block-icon::after, .pagination > .active .page-link, .pagination > .active .page-link:focus, .pagination > .active .page-link:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover, .pricing-plans--style-2 .block-pricing.active .plan-title, .nav-tab-image-wrapper:hover .nav-tab-image, .tabs--style-1 .nav-tabs > li > a.active, .tabs--style-1 .nav-tabs > li:first-child > a.active, .tabs--style-2 .nav-tabs .nav-item.show .nav-link, .tabs--style-2 .nav-tabs .nav-link.active, .tabs--style-2 .nav-tabs .nav-link:hover, .timeline-img, .dropzone, .milestone-counter .milestone-delimiter, .search-widget .form-control:focus, .search-widget--style-5 .form-control:focus, .search-widget--style-5 .form-control:hover, .typeface-palette a.active > .typeface-entry, .typeface-palette a.active:hover > .typeface-entry, .section-title-1 li a.active, .section-title-1 li a:hover, .bg-base-1 .btn-base-1, .product-box-2 .add-to-cart, .seller-shop-menu li.active a, .seller-shop-menu li a:hover {

	    border-color: #e62e04;

	}

	.align-items-center {

	    -ms-flex-align: center!important;

	    align-items: center!important;

	}

	.pr-3, .px-3 {

	    padding-right: 1rem!important;

	}

	.input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control {

	    position: relative;

	    -ms-flex: 1 1 auto;

	    flex: 1 1 auto;

	    width: 1%;

	    margin-bottom: 0;

	}

	.col-lg-6{

	float: left;

	}

	.product-shop{

	padding: 50px;

	}
	
	.discountt{
	    width: auto !important;
        padding-right: 5px;
        padding-left: 5px;
        left: 49px !important;
        font-size: 11px;
    	font-family: 'Open Sans', sans-serif;
    	color: #fff;
    	background: #ffc60a;
    	text-transform: uppercase;
    	padding: 0px;
    	text-align: center;
    	display: block;
    	position: absolute;
        
        margin-bottom: 10%;
    	font-weight: bold;
    	letter-spacing: 1px;
    	line-height: normal;
    	width: 45px;
    	height: 25px;
    	line-height: 25px;
    	left: 15px;
	}

	@media screen and (max-width){

	   .product-shop{

	padding: 20px;

	} 

	}

</style>

<style type="text/css">
	.back {
	text-decoration: none;
	display: inline-block;
	display: block;
	padding :8px;
	position: absolute;
	left: 21px;
	top: 80px;
	color: #000;
	/* z-index: 999999; */
	font-size: 25px;
	}

	.back:hover {
	  background-color: #ddd;
	  color: black;
	}

	.back {
	  background-color: #f1f1f1;
	  color: black;
	}
	@media screen and (max-width: 560px){
    .back{
	display: block;
    position: absolute;
    left: 10px;
    top: 54px;
    color: #000;
    /*z-index: 999999;*/
    font-size: 25px;
	}
}
</style>

 <!-- <product detail  start> -->

  <?php 

    $qty = 0;

   foreach (json_decode($product_data['variations']) as $key => $variation) {

        $qty += $variation->qty;

    }

  ?>

<section class="main-container col1-layout">

 <div class="main container">

    <div class="col-main">
        

       <div class="row">

          <div class="product-view">

			<div class="product-essential">

			<!-- <form action="#" method="post"  id="product_addtocart_form" style="padding-top: 24px;"> -->

			   <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                
			   <div class="product-img-box col-lg-6">
			   	  

			      <div class="product-image">

			         <div class="large-image">

			            <a href="<?php echo base_url()?>uploads/product_images/<?php echo $product_data['main_image']?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20" style="position: relative; display: block;"> <img src="<?php echo base_url()?>uploads/product_images/<?php echo $product_data['main_image']?>" style="display: block;" class="img-responsive"> </a> 

			            <div class="mousetrap" style="background-image: url(&quot;.&quot;);z-index: 999;position: absolute; height: 405px;left: 0px;top: 0px;cursor: pointer;"></div>

			         </div>

			         <div class="flexslider flexslider-thumb">

			            <ul class="previews-list slides">

			               <li><a href='<?php echo base_url()?>uploads/product_images/<?php echo $product_data['main_image']?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo base_url()?>uploads/product_images/<?php echo $product_data['main_image']?>' "><img src="<?php echo base_url()?>uploads/product_images/<?php echo $product_data['main_image']?>" alt = "Thumbnail 1"/></a></li>

			            <?php if(isset($product_data['product_images']) && !empty($product_data['product_images'])){ 

			            	foreach (json_decode($product_data['product_images'],true) as $pimg) {

			            ?>

			               <li><a href='<?php echo base_url()?>uploads/product_images/<?php echo $pimg;?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo base_url()?>uploads/product_images/<?php echo $pimg;?>' "><img src="<?php echo base_url()?>uploads/product_images/<?php echo $pimg;?>" alt = "Thumbnail 1"/></a></li>

			            <?php } }?>

			               <!-- <li><a href='<?php echo base_url()?>front_assets/images/products-images/p10.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo base_url()?>front_assets/images/products-images/p10.jpg' "><img src="<?php echo base_url()?>front_assets/images/products-images/p10.jpg" alt = "Thumbnail 2"/></a></li>

			               <li><a href='<?php echo base_url()?>front_assets/images/products-images/p3.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo base_url()?>front_assets/images/products-images/p3.jpg' "><img src="<?php echo base_url()?>front_assets/images/products-images/p3.jpg" alt = "Thumbnail 1"/></a></li>

			               <li><a href='<?php echo base_url()?>front_assets/images/products-images/p4.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo base_url()?>front_assets/images/products-images/p4.jpg' "><img src="<?php echo base_url()?>front_assets/images/products-images/p4.jpg" alt = "Thumbnail 2"/></a></li>

			               <li><a href='<?php echo base_url()?>front_assets/images/products-images/p5.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo base_url()?>front_assets/images/products-images/p5.jpg' "><img src="<?php echo base_url()?>front_assets/images/products-images/p5.jpg" alt = "Thumbnail 2"/></a></li> -->

			            </ul>

			         </div>

			      </div>

			      <!-- end: more-images -->

			      <div class="clear"></div>

			   	</div>

			   	<div class="product-shop col-lg-6">

					<!-- <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div> -->

					<div class="product-name">

					 <h1><?php echo $product_data['name'];?></h1>

					</div>

					<div class="ratings">

					    <?php

					    $pid = $_GET['pid'];

					    $whr = array();

                        $whr[] = "status = 1";

                        

                        if(isset($_GET['pid']) && !empty($_GET['pid'])){

                        	$whr[] = "product_id = ".$pid."";

                        }

                        // print_r($whr);	

                        $where = " WHERE ".implode(" AND ", $whr);	

                        $data['ratingavg'] = $this->Common_model->getwhrproductratingaverage($where);  

                        $abcdef = $data['ratingavg'][0];

                        $dsasssd = $abcdef['rating'];

                        // print_r()

					    ?>

					 <div class="rating-box">

					    <div style="width:<?php if(isset($dsasssd) && !empty($dsasssd)){ echo $dsasssd; } else { echo $dsasssd = 0 ;}?>%" class="rating"></div>

					 </div>

					 

					 

					 

					  <?php $pid = $_GET['pid'];

					        $data = array();

                        	$userid = customersessionid();

                            $whr = array();

                            $whr[] = "status = 1";

                            // $whr[] = "user_id = ".$userid."";

                            if(isset($_GET['pid']) && !empty($_GET['pid'])){

                            		$whr[] = "product_id = ".$pid."";

                            	}

                            $where = " WHERE ".implode(" AND ", $whr);	

					        $data['rating'] = $this->Common_model->getwhrproductrating($where); 

					        

                            $abcd = $data['rating'][0];

                            $dsas = $abcd['rating'];

			            ?>   

					 <p class="rating-links"> <a href="#"><?php echo $dsas;?> Review(s)</a> <span class="separator"></span> <a href="#"></a> </p>

				    
        			  	 

					</div>
					

					<!--<?php echo $rating ;?>-->

					<p class="" style="font-weight: 600"><span><?php echo ($product_data['quantity'] > 0 ?'In stock' : 'Out of stock'); ?> </span></p>

					<div class="price-block" >
						<!-- <div class="price-box"> -->
					<?php if(isset($product_data['discount']) && $product_data['discount'] > 0){ ?>
        			      	    <div class="discountt"> <?php echo $product_data['discount']; ?> <?php echo (isset($product_data['discount_type']) && $product_data['discount_type'] == 1 ? '% Discount':'Rs Discount'); ?> 
        			      	    </div>
        			  	  <?php } ?>
        			</div>
        			<!-- </div>  	  	 -->
					<div class="price-block" style="padding-top:30px">
                    
					 <div class="price-box">
                            
                        


					    <!-- <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $315.99 </span> </p> -->

					    <p class="special-price"> <!-- <span class="price-label">Special Price</span> --> <span class="price">Rs. <?php echo $product_data['unit_price']?> </span> 
					        
        			  	  </p>
                         
					 </div>
					 
					
					 
					 

					</div>

					<div class="short-description">

					 <h2>Quick Overview</h2>

					 <p><?php echo $product_data['short_description']; ?>

					 </p>

					 <!-- <p class="dw-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

					    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

					    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

					    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

					    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

					    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

					 </p> -->

					</div>

					<form id="option-choice-form">

						<div class="col-md-12">



					    <input type="hidden" name="id" value="<?php echo $product_data['product_id']; ?>">

						<?php foreach(json_decode($product_data['choice_options']) as $key => $choice){   ?>

					        <div class="row no-gutters">

					            <div class="col-2">

					                <div class="product-description-label mt-2 "><?php echo $choice->title ?>:</div>

					            </div>

					            <div class="col-10">

					                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">

					                    <?php foreach($choice->options as $key => $option){ ?>

					                        <li>

					                            <input type="radio" id="<?php echo $choice->name; ?>-<?php echo $option; ?>" name="<?php echo $choice->name; ?>" value="<?php echo $option; ?>" <?php if($key == 0){ echo 'checked'; }?>>

					                            <label for="<?php echo $choice->name; ?>-<?php echo $option; ?>"><?php echo $option; ?></label>

					                        </li>

					                    <?php } ?>

					                </ul>

					            </div>

					        </div>

					  	<?php } ?>

					  	<?php if(count(json_decode($product_data['colors'])) > 0){ ?>

					        <div class="row no-gutters">

					            <div class="col-2">

					                <div class="product-description-label mt-2">Colors:</div>

					            </div>

					            <div class="col-10">

					                <ul class="list-inline checkbox-color mb-1">

					                    <?php foreach(json_decode($product_data['colors']) as $keyc => $color){ ?>

					                        <li>

					                            <input type="radio" id="<?php echo $product_data['product_id']?>-color-<?php echo $keyc; ?>" name="color" value="<?php echo $color;?>" <?php if($keyc == 0){ echo 'checked'; } ?>>

					                            <label style="background: <?php echo $color;?>;" for="<?php echo $product_data['product_id']; ?>-color-<?php echo $keyc; ?>" data-toggle="tooltip"></label>

					                        </li>

					                    <?php } ?>

					                </ul>

					            </div>

					        </div>

					   	<?php } ?>

					    <hr>

					    	<div class="col-md-12" style="padding: 0px">



					    		<label for="qty"> Quantity : <?php if(count(json_decode($product_data['variations'], true)) >= 1){ ?>

						            (<span id="available-quantity"><?php echo $qty; ?></span> available)

						        <?php } ?></label>

							    <div class="col-md-12" style="padding: 0px">

							       <div class="custom pull-left">

							          <!-- <input type="text" class="input-text qty input-number" title="Qty" value="1" maxlength="12" id="qty" name="quantity"> -->

							         

							          	<input type="text" name="quantity" class="input-text input-number text-center" placeholder="1" id="qty" value="1" min="1" max="10" >

							          

							          	<button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.;return false;" class="increase items-count btn-number" type="button" data-type="plus" data-field="quantity"><i class="fa fa-plus">&nbsp;</i></button>

							          



							          	<button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count btn-number" type="button" data-type="minus " data-field="quantity"><i class="fa fa-minus">&nbsp;</i></button>

							          

							       </div>



							    </div>

					    	</div>

					    	<div class="clearfix"></div>

						    <div class="col-md-12 no-gutters d-none" id="chosen_price_div" style="padding: 0px">

						        <div class="col-md-12" style="padding: 22px 0px 17px 0px;">

						            <span class="product-description-label">Total Price:</span>

						            <span class="product-price">

						                <strong id="chosen_price" style="color: #ff0000">

										</strong>

						            </span>

						        </div>

						    </div>

						</div>

						<div class="add-to-box col-md-12">

						 <div class="add-to-cart">

						    <div class="">
						    

						       <button onClick="addToCart()" id="adcart" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> ADD TO CART</span></button> 
								
								 <!-- <a href="javascript:void(0)" class="button btn-cart loginModal" href-btntype="adtocart">ADD TO CART</a> -->

                            
						    </div>
						    <div class="row">
                    			<div class="col-lg-12">
                                    <span id="msg"></span>
                                </div>
                            </div>


						 </div>
                            
                        <div class="add-to-cart buyy">

						    <div class="">
						    	<?php  $session_userdata = $this->session->userdata(USER_SESSION); ?>
                            <?php if(isset($session_userdata) && !empty($session_userdata)){ ?>     
						       <a onClick="buynow()" class="btn btn-cart buy" style ="background:#d22334;"  title="Buy Now" type="button"><span><i class="fa fa-play"></i> &nbsp;&nbsp;Buy Now</span></a> 
                                
                            <?php }else{ ?>

                        	 <a href="javascript:void(0)" onClick="addToCart()" id="adtocart" class="btn btn-cart buy loginModal" href-btntype="buynw">Buy Now</a>

                                <?php }?>
                                 
                                 

                                  
						    </div>
						    
						 </div>
                            
						</div>

					</form>

			   </div>

			<!-- </form> -->

			</div>

			<div class="product-collateral">

				<div class="col-sm-12 wow bounceInUp animated">

				   <ul id="product-detail-tab" class="nav nav-tabs product-tabs">

				      <li class=" nav-item active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>

				      <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>

				      <li> <a href="#product_tabs_custom" data-toggle="tab">Return Policy</a> </li>

				   </ul>

				   <div id="productTabContent" class="tab-content show1">

				      <div class="tab-pane active" id="product_tabs_description">

				         <div class="std">

				          <p class="col-md-12"><?php echo $product_data['description']; ?></p>

				            

				         </div>

				      </div>

				      <div class="tab-pane fade" id="product_tabs_tags">

				      </div>

				      

				      <div class="tab-pane fade" id="reviews_tabs">

				         <div class="box-collateral box-reviews" id="customer-reviews">

				            <div class="box-reviews1">

				               <div class="form-add">

				                  <form id="review-form" method="post" action="#">

				                  </form>

				               </div>

				            </div>

				            <div class="box-reviews2">

				               <h3>Customer Reviews</h3>

				               <div class="box visible">

				                  <ul>

				                      

				                        <?php $pid = $_GET['pid'];

                					        $data = array();

                                        	$whr = array();

                                            $whr[] = "status = 1";

                                            if(isset($_GET['pid']) && !empty($_GET['pid'])){

                                            		$whr[] = "product_id = ".$pid."";

                                            	}

                                            $where = " WHERE ".implode(" AND ", $whr);	

                                            $datareview = $this->Common_model->getwhrproductratingdetail($where); 

                                            // print_r($data['review']);

                                            // print_r($datareview);

                                            // die;

                                            if(isset($datareview) && !empty($datareview)){

                                               

                                                foreach ($datareview as $reviewarray) {

                            

                			            ?> 

				                      

				                     <li>

				                        <table class="ratings-table">

				                           <colgroup>

				                              <col width="1">

				                              <col>

				                           </colgroup>

				                           <tbody>

				                              <tr>

				                                 <th>review</th>

				                                 <td>

				                                    

				                                    <div class="rating-box">

				                                       <div class="rating" style="width:<?php echo $reviewarray['ratingper']; ?>%;"></div>

				                                    </div>

				                                    

				                                    

				                                 </td>

				                              </tr>

				                           </tbody>

				                        </table>

				                        <div class="review">

				                           <h6><a href="#/catalog/product/view/id/61/"><?php echo $reviewarray['title']; ?></a></h6>

				                           <small>Review by <span>Leslie Prichard </span>on <?php echo $reviewarray['create_date']; ?> </small>

				                           <div class="review-txt"> <?php echo $reviewarray['review']; ?></div>

				                        </div>

				                     </li>

				                     

				                     <?php } } ?>

				                     <!--<li class="even">-->

				                     <!--   <table class="ratings-table">-->

				                     <!--      <colgroup>-->

				                     <!--         <col width="1">-->

				                     <!--         <col>-->

				                     <!--      </colgroup>-->

				                     <!--      <tbody>-->

				                     <!--         <tr>-->

				                     <!--            <th>review</th>-->

				                     <!--            <td>-->

				                     <!--               <div class="rating-box">-->

				                     <!--                  <div class="rating" style="width:100%;"></div>-->

				                     <!--               </div>-->

				                     <!--            </td>-->

				                     <!--         </tr>-->

				                     <!--      </tbody>-->

				                     <!--   </table>-->

				                     <!--   <div class="review">-->

				                     <!--      <h6><a href="#/catalog/product/view/id/60/">Amazing</a></h6>-->

				                     <!--      <small>Review by <span>Sandra Parker</span>on 1/3/2014 </small>-->

				                     <!--      <div class="review-txt"> Minimalism is the online ! </div>-->

				                     <!--   </div>-->

				                     <!--</li>-->

				                     <!--<li>-->

				                     <!--   <table class="ratings-table">-->

				                     <!--      <colgroup>-->

				                     <!--         <col width="1">-->

				                     <!--         <col>-->

				                     <!--      </colgroup>-->

				                     <!--      <tbody>-->

				                     <!--         <tr>-->

				                     <!--            <th>review</th>-->

				                     <!--            <td>-->

				                     <!--               <div class="rating-box">-->

				                     <!--                  <div class="rating" style="width:80%;"></div>-->

				                     <!--               </div>-->

				                     <!--            </td>-->

				                     <!--         </tr>-->

				                     <!--      </tbody>-->

				                     <!--   </table>-->

				                     <!--   <div class="review">-->

				                     <!--      <h6><a href="#/catalog/product/view/id/59/">Nicely</a></h6>-->

				                     <!--      <small>Review by <span>Anthony  Lewis</span>on 1/3/2014 </small>-->

				                     <!--      <div class="review-txt"> Unbeatable service and selection. This store has the best business model I have seen on the net. They are true to their word, and go the extra mile for their customers. I felt like a purchasing partner more than a customer. You have a lifetime client in me. </div>-->

				                     <!--   </div>-->

				                     <!--</li>-->

				                  </ul>

				               </div>

				               <div class="actions"> <a class="button view-all" id="revies-button"><span><span>View all</span></span></a> </div>

				            </div>

				            <div class="clear"></div>

				         </div>

				      </div>

				      <div class="tab-pane fade" id="product_tabs_custom">

				         <div class="product-tabs-content-inner clearfix">

				            <p><?php echo $product_data['return_policy']; ?>

				            </p>

				         </div>

				      </div>

				   </div>

				</div>

			</div>

          </div>

       </div>

       <div>

          <!-- <a href="<?php echo base_url().'shopdetail?shop_id='.$product_data['shop_id'];?>" class="backbtn"> -->

          	<a href="<?php echo base_url().'shopdetail?shop_id='.$product_data['shop_id'];?>" class="back">&laquo; Back</a>

             <!-- <img src="<?php echo base_url()?>front_assets/images/back.svg"> -->

          <!-- <i class="fa fa-arrow-left"></i> -->

          </a>

       </div>

    </div>

 </div>

</section>

  <!-- featured product end -->

  <!-- featured product -->

<?php include('homebannersliderfourth.php'); ?>

<?php include('homebrands.php');?>

<script src="<?php echo base_url()?>front_assets/js/sweetalert2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/cloud-zoom.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>front_assets/css/mdb.min.js"></script>

<script type="text/javascript">

	cartQuantityInitialize();

	function addToCart(){

	    if(checkAddToCartValidity()){

	        $('#addToCart').modal();

	        // $('.c-preloader').show();

	        $("#adcart").attr('disabled', true);

	        $("#adcart").addClass('buttonload'); 

	        $("#adcart").html('<i class="fa fa-spinner fa-spin"></i>Loading');

	        $.ajax({

	           type:"POST",

	           url: '<?php echo base_url();?>home/addToCart',

	           data: $('#option-choice-form').serializeArray(),

	           success: function(data){
	               
	               $("#adcart").notify(data.msg,'success');

	               $('#addToCart-modal-body').html(null);

	               $('.c-preloader').hide();

	               $('#modal-size').removeClass('modal-lg');


                    


	               $('#addToCart-modal-body').html(data);

	               updateNavCart();

	               $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);

	               	$("#adcart").removeAttr('disabled');

					$("#adcart").removeClass('buttonload');

					$("#adcart").html('Add to cart');
					
					

	           }

	       });

	    }

	    else{

	        showFrontendAlert('warning', 'Please choose all the options');

	    }

	}
	
	
    function buynow(){

	    if(checkAddToCartValidity()){

	        $('#addToCart').modal();

	       // $('.c-preloader').show();

	        $(".buy").attr('disabled', true);

	        $(".buy").addClass('buttonload'); 

	        $(".buy").html('<i class="fa fa-spinner fa-spin"></i>Loading');

	        $.ajax({

	           type:"POST",

	           url: '<?php echo base_url();?>home/addToCart',

	           data: $('#option-choice-form').serializeArray(),

	           success: function(data){
                    // alert(data);
	               $('#addToCart-modal-body').html(null);

	               $('.c-preloader').hide();

	               $('#modal-size').removeClass('modal-lg');


                    setTimeout(function(){window.location.href=base_url+"cart"},1000);


	               $('#addToCart-modal-body').html(data);

	               updateNavCart();

	               $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);

	               	$(".buy").removeAttr('disabled');

					$(".buy").removeClass('buttonload');

					$(".buy").html('Buy Now');

	           }

	       });

	    }

	    else{

	        showFrontendAlert('warning', 'Please choose all the options');

	    }

	}


	function checkAddToCartValidity(){

	    var names = {};

	    $('#option-choice-form input:radio').each(function() { // find unique names

	          names[$(this).attr('name')] = true;

	    });

	    var count = 0;

	    $.each(names, function() { // then count them

	          count++;

	    });

	    if($('input:radio:checked').length == count){

	        return true;

	    }

	    return false;

	}
	



	$('#option-choice-form input').on('change', function(){

		// alert('hi');

        getVariantPrice();

    });



    function getVariantPrice(){

        if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){

            $.ajax({

               type:"POST",

               url: '<?php echo base_url();?>home/variant_price',

               data: $('#option-choice-form').serializeArray(),

               dataType:'json',

               success: function(data){

                   $('#option-choice-form #chosen_price_div').removeClass('d-none');

                   $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);

                   $('#available-quantity').html(data.quantity);

               }

           });

        }

    }



    function cartQuantityInitialize(){

        $('.btn-number').click(function(e) {

        	//alert('hid');

            e.preventDefault();



            fieldName = $(this).attr('data-field');

            //alert(fieldName);

            type = $(this).attr('data-type');

            //alert(type);

            var input = $("input[name='" + fieldName + "']");

            var currentVal = parseInt(input.val());

            //alert(currentVal);

            if (!isNaN(currentVal)) {

                if (type == 'minus'){



                    if (currentVal > input.attr('min')) {

                        input.val(currentVal - 1).change();

                    }

                    if (parseInt(input.val()) == input.attr('min')) {

                        $(this).attr('disabled', true);

                    }



                } else if (type == 'plus') {



                    if (currentVal < input.attr('max')) {

                        input.val(currentVal + 1).change();

                    }

                    if (parseInt(input.val()) == input.attr('max')) {

                        $(this).attr('disabled', true);

                    }



                }

            } else {

                input.val(0);

            }

        });



        $('.input-number').focusin(function() {

            $(this).data('oldValue', $(this).val());

        });



        $('.input-number').change(function() {



            minValue = parseInt($(this).attr('min'));

            maxValue = parseInt($(this).attr('max'));

            valueCurrent = parseInt($(this).val());



            name = $(this).attr('name');

            if (valueCurrent >= minValue) {

                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')

            } else {

                alert('Sorry, the minimum value was reached');

                $(this).val($(this).data('oldValue'));

            }

            if (valueCurrent <= maxValue) {

                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')

            } else {

                alert('Sorry, the maximum value was reached');

                $(this).val($(this).data('oldValue'));

            }





        });

        $(".input-number").keydown(function(e) {

            // Allow: backspace, delete, tab, escape, enter and .

            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||

                // Allow: Ctrl+A

                (e.keyCode == 65 && e.ctrlKey === true) ||

                // Allow: home, end, left, right

                (e.keyCode >= 35 && e.keyCode <= 39)) {

                // let it happen, don't do anything

                return;

            }

            // Ensure that it is a number and stop the keypress

            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

                e.preventDefault();

            }

        });

    }

</script>

<script type="text/javascript">

	function showFrontendAlert(type, message){

	    if(type == 'danger'){

	        type = 'error';

	    }

	    swal({

	        position: 'top-end',

	        type: type,

	        title: message,

	        showConfirmButton: false,

	        timer: 1500

	    });

	}

</script>



