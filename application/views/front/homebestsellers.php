<style>
    .im{
        height: 133px;
    }
    @media only screen and (max-width:424px){
    .im{
        height: 71px;
    }
    }
</style>

<section id="demos" class="best-seller-sec" style="padding: 7px 0;">
	<div class="">
		<div class="col-lg-12">
	      		<div class="row heading-row">
		      		<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">
		      			<h4 class="sec-heading">Best Seller</h4>
		      		</div>
		      		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link text-right">
		      			<a href="#">View All</a>
		      		</div>
	      		</div>
			</div>
      <div class="">
        <div class="bx-style sec_p">
          <div class="waqar-1 owl-carousel owl-theme owl-responsive">
          	<?php 
						// $fproducts = $this->Common_model->getWhereDatanew('product',array('status'=>1,'featured_status'=>1),'product_id,main_image,shop_id,unit_price,quantity,name,discount,discount_type',20);
			$whrbs = array();
	    	$whrbs[] = 'status = 1';
			$wherebs = " WHERE ".implode(" AND ", $whrbs);
			$colsbs = "s.*";
			$orderbybs = "ORDER BY order_counts DESC limit 0,10";
			$best_shop_data = $this->Common_model->getshopswhr($colsbs,$wherebs,$orderbybs);
				if(isset($best_shop_data) && !empty($best_shop_data)){
				foreach($best_shop_data as $best_shop_dataar){
					  $whrcsecbsc = array();
	                  $cur_datebsc = date("Y-m-d H:i:s");
	                  $whrcsecbsc[] = " status = 1";
	                  $whrcsecbsc[] = " added_by = 'shop'";
	                  $whrcsecbsc[] = " added_by_id in(".$best_shop_dataar['shop_id'].")";
	                  $whrcsecbsc[] = " end_date >= '".$cur_datebsc."'";
	                  $wherecsecbsc = " WHERE ".implode(" AND ", $whrcsecbsc);
	                  $orderbycsecbsc = " ORDER BY added_by_id DESC ";
	                  $coupondatasecbsc = $this->Common_model->getwherecustomesingle('coupons',$wherecsecbsc,$orderbycsecbsc);
						// p($fproductsa);
			?>
	            <div class="item items">
	              <div class="column1 fon best_seller_s">
	              	<a href="<?php echo base_url().'shopdetail?shop_id='.$best_shop_dataar['shop_id'];?>">
		              	<img  src="<?php echo base_url();?>uploads/shop_images/shop_image_mobile/<?php echo $best_shop_dataar['shop_image_mobile']; ?>" class="img-fluid img_size im">
		                <h6><?php echo $best_shop_dataar['shop_name']; ?></h6>
		                <p><?php echo $best_shop_dataar['shopping_categories']; ?></p>
		                <div class="pb-2" style="display: block;">
			                <div class="rating text-white" style="display: inline-block;">
			              		<i class="fa fa-star" aria-hidden="true"></i>
			              		<span><?php echo (isset($best_shop_dataar['ratings']) && !empty($best_shop_dataar['ratings']) ? round($best_shop_dataar['ratings'],2) : 0.00); ?></span>
			              	</div>
			              	<!-- <div class="time pull-right">
			              		<span>48 MINS</span>
			              	</div> -->
		                </div>
		              	<!-- <div class="text-center t1 d-none" style="border-top: 1px solid #ccc;">
		              	   <button type="button" class="btn btn-default">Quick more</button>
		              	</div> -->
		            </a>
	              </div>
	            </div>
            <?php } } ?>
          </div>          
        </div>
      </div>
    </div>
</section>