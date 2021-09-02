<section class="featured-section dfsd sec_arreng">
	<div class="">
		<div class="col-lg-12">
      		<div class="row heading-row">
	      		<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">
	      			<h4 class="sec-heading">Trending Product</h4>
	      		</div>
	      		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link text-right">
	      			<a href="#">View All</a>
	      		</div>
      		</div>
		</div>
		<div class="bx-style">
			<div class="col-lg-12" style="padding-left: 0!important; padding-right: 0!important;">
		          <div class="waqar-2 owl-carousel owl-theme owl-responsive">
		          	<?php
		          		$cols = "product_id,product_reg_id,shop_id,name,unit_price,	discount,discount_type,status,num_of_sale,main_image";
		          		$whrtp = array();
		          		$whrtp[] = " status = 1 ";
		          		$wheretp = " WHERE ".implode(" AND ", $whrtp);
		          		$orderbytp = " ORDER BY num_of_sale	DESC LIMIT 0,10 ";
		          		$best_shop_data = $this->Common_model->getwherecustomecol('product',$cols,$wheretp,$orderbytp);
		          		if(isset($best_shop_data) && !empty($best_shop_data)){
		          			foreach ($best_shop_data as $best_product_array) {
		          	?>
						<div class="item">
						  <div class="column1 featured-prd">
						  		<div class="offer-tag"><?php echo $best_product_array['discount']; ?><?php echo  ($best_product_array['discount_type'] == 1 ? "% OFF" : "FLAT OFF"); ?> </div>
						  		<a href="<?php echo base_url().'productdetail?pid='.$best_product_array['product_id'];?>" class="icon_cart">
						      	<img src="<?php echo base_url()?>uploads/product_images/<?php echo $best_product_array['main_image']?>" class="img-fluid">
						      	<div class="text-center">
						            <h6><?php echo (isset($best_product_array['name']) ? $best_product_array['name'] : '');?></h6>
						            <!-- <p>Full Printed Tees</p> -->
						        </div>
						    	</a>
						        <div class="pb-2" style="display: block;">
						            <div class="rateOprd" style="display: inline-block;">
						          		Rs.<?php echo (isset($best_product_array['unit_price']) ? $best_product_array['unit_price'] : '');?>
						          	</div>
						          	<div class="add2cart pull-right">
						          		<a href="<?php echo base_url().'productdetail?pid='.$best_product_array['product_id'];?>" class="cartt">Buy Now</a>
						          	</div>
						          	<div class="add2cart2 cart_index pull-right">
						          		<a href="<?php echo base_url().'productdetail?pid='.$best_product_array['product_id'];?>" class="icon_cart">
						          			<i class="fa fa-shopping-cart"></i>
						          		</a>
						          	</div>
						        </div>
						      	<div class="text-center t1 d-none" style="border-top: 1px solid #ccc;">
						      	   <button type="button" class="btn btn-default">Quick more</button>
						      	</div>
						  </div>
						</div>
		        	<?php  } } ?>
		            <!-- <div class="item">
		              <div class="column1 featured-prd">
		              		<div class="offer-tag">15% OFF</div>
			              	<img src="front_assets/images/product/f1.jpeg" class="img-fluid">
			              	<div class="text-center">
				                <h6>T-Shirts</h6>
				                <p>Full Printed Tees</p>
			                </div>
			                <div class="pb-2" style="display: block;">
				                <div class="rateOprd" style="display: inline-block;">
				              		Rs.1699
				              	</div>
				              	<div class="add2cart pull-right">
				              		<a href="#" class="cartt">Add To Cart</a>
				              	</div>
				              	<div class="add2cart2 cart_index pull-right">
				              		<a href="#" class="icon_cart">
				              			<i class="fa fa-shopping-cart"></i>
				              		</a>
				              	</div>
			                </div>
			              	<div class="text-center t1 d-none" style="border-top: 1px solid #ccc;">
			              	   <button type="button" class="btn btn-default">Quick more</button>
			              	</div>
		              </div>
		            </div>
		            <div class="item">
		              <div class="column1 featured-prd">
		              		<div class="offer-tag">15% OFF</div>
		              		<div class="featured-prd-img">
			              		<img src="front_assets/images/product/f2.jpg" class="img-fluid">
			              	</div>
			              	<div class="text-center">
				                <h6>T-Shirts</h6>
				                <p>Full Printed Tees</p>
			                </div>
			                <div class="pb-2" style="display: block;">
				                <div class="rateOprd" style="display: inline-block;">
				              		Rs.1699
				              	</div>
				              	<div class="add2cart pull-right">
				              		<a href="#" class="cartt">Add To Cart</a>
				              	</div>
				              	<div class="add2cart2 cart_index pull-right">
				              		<a href="#" class="icon_cart">
				              			<i class="fa fa-shopping-cart"></i>
				              		</a>
				              	</div>
			                </div>
			              	<div class="text-center t1 d-none" style="border-top: 1px solid #ccc;">
			              	   <button type="button" class="btn btn-default">Quick more</button>
			              	</div>
		              </div>
		            </div>
		            <div class="item">
		              <div class="column1 featured-prd">
		              		<div class="offer-tag">15% OFF</div>
			              	<img src="front_assets/images/product/f7.jpg" class="img-fluid">
			              	<div class="text-center">
				                <h6>T-Shirts</h6>
				                <p>Full Printed Tees</p>
			                </div>
			                <div class="pb-2" style="display: block;">
				                <div class="rateOprd" style="display: inline-block;">
				              		Rs.1699
				              	</div>
				              	<div class="add2cart pull-right">
				              		<a href="#" class="cartt">Add To Cart</a>
				              	</div>
				              	<div class="add2cart2 cart_index pull-right">
				              		<a href="#" class="icon_cart">
				              			<i class="fa fa-shopping-cart"></i>
				              		</a>
				              	</div>
			                </div>
			              	<div class="text-center t1 d-none" style="border-top: 1px solid #ccc;">
			              	   <button type="button" class="btn btn-default">Quick more</button>
			              	</div>
		              </div>
		            </div>
		            <div class="item">
		              <div class="column1 featured-prd">
		              		<div class="offer-tag">15% OFF</div>
			              	<img src="front_assets/images/product/f5.jpg" class="img-fluid">
			              	<div class="text-center">
				                <h6>T-Shirts</h6>
				                <p>Full Printed Tees</p>
			                </div>
			                <div class="pb-2" style="display: block;">
				                <div class="rateOprd" style="display: inline-block;">
				              		Rs.1699
				              	</div>
				              	<div class="add2cart pull-right">
				              		<a href="#" class="cartt">Add To Cart</a>
				              	</div>
				              	<div class="add2cart2 cart_index pull-right">
				              		<a href="#" class="icon_cart">
				              			<i class="fa fa-shopping-cart"></i>
				              		</a>
				              	</div>
			                </div>
			              	<div class="text-center t1 d-none" style="border-top: 1px solid #ccc;">
			              	   <button type="button" class="btn btn-default">Quick more</button>
			              	</div>
		              </div>
		            </div>
		            <div class="item">
		              <div class="column1 featured-prd">
		              		<div class="offer-tag">15% OFF</div>
			              	<img src="front_assets/images/product/f6.jpg" class="img-fluid">
			              	<div class="text-center">
				                <h6>T-Shirts</h6>
				                <p>Full Printed Tees</p>
			                </div>
			                <div class="pb-2" style="display: block;">
				                <div class="rateOprd" style="display: inline-block;">
				              		Rs.1699
				              	</div>
				              	<div class="add2cart pull-right">
				              		<a href="#" class="cartt">Add To Cart</a>
				              	</div>
				              	<div class="add2cart2 cart_index pull-right">
				              		<a href="#" class="icon_cart">
				              			<i class="fa fa-shopping-cart"></i>
				              		</a>
				              	</div>
			                </div>
			              	<div class="text-center t1 d-none" style="border-top: 1px solid #ccc;">
			              	   <button type="button" class="btn btn-default">Quick more</button>
			              	</div>
		              </div>
		            </div> -->
		            
		          </div>          
	        </div>
        </div>
    </div>
</section>