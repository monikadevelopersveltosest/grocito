<section class="featured-section sec_arreng">
	<div class="">
		<div class="bx-style">
			<div class="col-lg-12 rspn-set">
	      		<div class="row heading-row">
		      		<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">
		      			<h4 class="sec-heading">Featured Shops</h4>
		      		</div>
		      		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link text-right">
		      			<a href="<?php echo base_url().'shops'?>">View All</a>
		      		</div>
	      		</div>
			</div>
			<div class="">
				<div class="waqar-2 owl-carousel owl-theme owl-responsive prics">
					<?php 
						// $fproducts = $this->Common_model->getWhereDatanew('product',array('status'=>1,'featured_status'=>1),'product_id,main_image,shop_id,unit_price,quantity,name,discount,discount_type',20);
					$whrfs = array();
			    	$u_lat = '';
			    	$u_long = '';
			    	$whrfs[] = 'status = 1';
			    	$whrfs[] = 'featured_status = 1';
					$wherefs = " WHERE ".implode(" AND ", $whrfs);
    				$colsfs = "s.*";
					$orderbyfs = "ORDER BY shop_id ASC limit 0,10";
    				$featured_shop_data = $this->Common_model->getshopswhr($colsfs,$wherefs,$orderbyfs);
						if(isset($featured_shop_data) && !empty($featured_shop_data)){
						foreach($featured_shop_data as $featured_shop_dataar){
							  $whrcsecfsc = array();
			                  $cur_datefsc = date("Y-m-d H:i:s"); 
			                  $whrcsecfsc[] = " status = 1";
			                  $whrcsecfsc[] = " added_by = 'shop'";
			                  $whrcsecfsc[] = " added_by_id in(".$featured_shop_dataar['shop_id'].")";
			                  $whrcsecfsc[] = " end_date >= '".$cur_datefsc."'";
			                  $wherecsecfsc = " WHERE ".implode(" AND ", $whrcsecfsc);
			                  $orderbycsecfsc = " ORDER BY added_by_id DESC";
			                  $coupondatasecfsc = $this->Common_model->getwherecustomesingle('coupons',$wherecsecfsc,$orderbycsecfsc);
								// p($fproductsa);
					?>
						<div class="item">
						  <div class="column1 featured-prd">
						  		<a href="<?php echo base_url().'shopdetail?shop_id='.$featured_shop_dataar['shop_id'];?>">
					              <div class="shops-bx fon best_seller_s">
					                <div class="img-bx">
					                 <img style="height: 90px;" src="<?php echo base_url();?>uploads/shop_images/shop_image_mobile/<?php echo $featured_shop_dataar['shop_image_mobile']; ?>" class="img-fluid "> 
					                </div>
					                <!-- <div class="img-tag">
					                  <div class="tag-text">Assured</div>
					                </div> -->
					                <div class="column-text text-center">
					                  <h6><?php echo $featured_shop_dataar['shop_name']; ?></h6>
					                  <p><?php echo $featured_shop_dataar['shopping_categories']; ?></p> 
					                </div>
					                <div class="" style="">
					                  <div class="rating-main">
					                    <div class="rating text-white" style="display: inline-block;">
					                      <i class="fa fa-star" aria-hidden="true"></i>
					                      <span><?php echo (isset($featured_shop_dataar['ratings']) && !empty($featured_shop_dataar['ratings']) ? round($featured_shop_dataar['ratings'],2) : 0.00); ?></span>
					                    </div>
					                  </div>
					                  <?php if(isset($coupondatasecfsc) && !empty($coupondatasecfsc)){ ?>
					                    <div class="Offers pull-right">
					                      <i class="fa fa-percent"></i>
					                      <span><?php echo $coupondatasecfsc['offer_amount']; ?><?php echo ($coupondatasecfsc['offer_amount_type'] == 1 ? "%" : "FLAT"); ?> OFF </span>
					                    </div>
					                  <?php } ?>
					                </div>
					              </div>
					              </a>
						  </div>
						</div>
					<?php } }?>
					<!-- <div class="item">
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
					      	<img src="front_assets/images/product/f3.jpg" class="img-fluid">
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