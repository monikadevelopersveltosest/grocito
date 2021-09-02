<style type="text/css">
	.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
	    color: #495057;
	    background-color: #80808059 !important;
	}
	.shop_rating .ratingg .dfs .fa {
	    color: #fff;
	    cursor: pointer;
	}
	.ratingy{
		color: orange !important;
	}
</style>
<section>
	<div class="container-fluid">
		<div class="row sec_shop ">
			<div class="col-lg-3">
				<div class="shop_img">
					<img src="<?php echo base_url().'uploads/shop_images/shop_image_desktop/'.$shop_data['shop_image_desktop']; ?>" class="img-fluid img-thumbnail big-img">
					<img src="<?php echo base_url().'uploads/shop_images/shop_image_mobile/'.$shop_data['shop_image_mobile']; ?>" class="img-fluid img-thumbnail small-img" style="display: none;width: 100%;">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="sec_shop_detail">
					<div class="shop_name">
						<h4><?php echo $shop_data['shop_name']; ?></h4>
						<!-- <div class="swit">sweets snakes</div> -->
						<p><?php echo $shop_data['shopping_categories']; ?></p>
						<p><?php echo $shop_data['shop_address']; ?></p>
					</div>
					<div class="shop_rating" data-toggle="modal" data-target="#shop_rating">
						<div class="ratingg">
							<div class="review-block-rate dfs">
								<div class="jstars" data-value="<?=$shop_data['ratings']?>"><?=round($shop_data['ratings'],2)?></div>
								
							</div>

							<!-- <div class="dfs">
						        <i class="fa fa-star"></i>
						        <i class="fa fa-star"></i>
						        <i class="fa fa-star"></i>
						        <i class="fa fa-star"></i>
						        <i class="fa fa-star-half-o"></i>
						        4.4
						    </div> -->
						    <div class="ratie">
						    	100+Ratings
						    </div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="asda">
					<?php 
						$whrc = array();
		                    $cur_date = date("Y-m-d H:i:s"); 
		                    $whrc[] = " status = 1";
		                    $whrc[] = " added_by = 'shop'";
		                    $whrc[] = " added_by_id in(".$shop_data['shop_id'].")";
		                    $whrc[] = " end_date >= '".$cur_date."'";
		                    $wherec = " WHERE ".implode(" AND ", $whrc);
		                    $orderbyc = " ORDER BY added_by_id DESC";
		                    $coupondata = $this->Common_model->getwherecustomesingle('coupons',$wherec,$orderbyc);
		                    if(isset($coupondata) && !empty($coupondata)){
					?>
					<div class="offer-shop">
						<h6 style="display: inline-flex;">
							<div class="Offers shop_offer">
	                            <i class="fa fa-percent"></i>
	                            <span style="float: right;"></span>
	                        </div>
						OFFER</h6>
						<p>
							<?php echo $coupondata['offer_amount']; ?><?php echo  ($coupondata['offer_amount_type'] == 1 ? "%" : "FLAT"); ?> OFF on orders above <br>
							<i class="fa fa-inr" aria-hidden="true"></i>&nbsp;<?php echo $coupondata['min_total_amount']; ?>

						</p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row" style="border-bottom: 1px solid #f3f1f1;">
			<div class="col-lg-2 l_s">
				<div class="heading-left-sec">
					<h4><a href="<?php echo base_url(); ?>shopdetail?shop_id=<?php echo $shop_id; ?>" class="nav-link"  style="color: #fff">All Products</a></h4>
				</div>
				<div class="catogaries1">
				    <ul class="nav nav-tabs" role="tablist">
				    	<?php 
				    		//$whrc = array('status'=>1,'parent_category_id'=>0);
				    		if(isset($shopping_categories) && !empty($shopping_categories)){
				    			$scid = array();
				    			foreach ($shopping_categories as $scc) {
				    				$scid[] = $scc['categories_id'];
				    			}
				    			// print_r($scid);

				    			$scidi = implode(",", $scid);
				    // 			print_r($scidi);
				    			$scidii = "'" . str_replace(",", "','", $scidi) . "'";
                                // print_r($scidii);
				    		}

				    		$whrcc = " WHERE parent_category_id in (".$scidii.") AND parent_category_id !=0";
				    // 		print_r($whrcc);
				    		$allcategoriesc = $this->Common_model->getwhrcategoiesbycatid($whrcc);
				    // 		print_r($allcategoriesc);
                              if(isset($allcategoriesc) && !empty($allcategoriesc)){
                              	// print_r($allcategoriesc);
                              	// die;
                              	foreach ($allcategoriesc as $allcategoriesdata){
                        ?>
                        		<li class="nav-item">

								    <a href="<?php echo base_url(); ?>shopdetail?shop_id=<?php echo $shop_id; ?>&categories_id=<?php echo $allcategoriesdata['categories_id']; ?>" class="nav-link  <?php echo (isset($_GET['categories_id']) && $_GET['categories_id'] == $allcategoriesdata['parent_category_id'] ? 'active' : ''); ?>"  >
								      	<div class="icon-img">
								    		<?php  echo (!empty($allcategoriesdata['category_image'])?'<img src='.base_url().'uploads/category/'.$allcategoriesdata['category_image'].' class="img-fluid menu-img">':'none'); ?>
								    	</div>
								      <?php echo $allcategoriesdata['category_name']; ?>
								  	</a>
					    		</li>
                    	<?php } } ?>
					</ul>
				</div>
			</div>
			<div class="col-lg-10">
				<div class="col-lg-12" style="padding-left: 0!important; padding-right: 0!important;">
					<!-- <tab content start> -->
					<?php 

						  $whrc = array('status'=>1,'shop_id'=>$shop_id);
						  if(isset($_GET['categories_id']) && !empty($_GET['categories_id'])){
						  	$whrc['sub_categories_id'] = $_GET['categories_id'];
						  }
                          $allproducts = $this->Common_model->GetWhere('product', $whrc);
                          // p($allproducts);
                    ?>
					<div class="tab-content  tab_border">
					   <div id="page" class="tab-pane active contentss">
					      <!-- <> -->
					      <!--<br>-->
					      <div class="row shop_row shop_detail_page" style="padding-top: 10px;">
					      	<?php if(isset($allproducts) && !empty($allproducts)){ ?>
					      	<?php foreach ($allproducts as $allproductsarray) { ?>
							    <div class="col-lg-3 col-6 mb-10">
							      
							      <div class="shops-bx fon best_seller_s">
							      	<?php if(isset($allproductsarray['discount']) && $allproductsarray['discount'] > 0){ ?>
							      		<div class="offer-tag"><?php echo $allproductsarray['discount']; ?><?php echo  ($allproductsarray['discount_type'] == 1 ? "% OFF" : "FLAT OFF"); ?> </div>
							      	<?php } ?>
							      	<a href="<?php echo base_url().'productdetail?pid='.$allproductsarray['product_id']; ?>">
							        <div class="img-bx">
							         	<img src="<?php echo base_url().'uploads/product_images/'.$allproductsarray['main_image'];?>" class="img-fluid "> 
							        </div>
							        <div class="column-text text-center">
							          <h6><?php echo $allproductsarray['name']; ?></h6>
							          <!-- <p>lorem ipsum sit amet</p> --> 
							        </div>
							        </a>
							        <!-- <price & add to cart> -->
							        <div class="main_secc  text-center">
							            <div class="price">Rs.<?php echo $allproductsarray['unit_price']; ?></div>
							            <!-- <div class="oldprice">$1695</div> -->
							            <div class="add2cart pull-right">
							               <a href="<?php echo base_url().'productdetail?pid='.$allproductsarray['product_id'];?>" class="cartt">Buy Now</a>
							            </div>
							            <div class="add2cart3 pull-right">
							               <a href="#" class="icon_cart">
							               <i class="fa fa-shopping-cart"></i>
							               </a>
							            </div>
						           </div>
							        <!-- <price & add to cart> -->
							      </div>
							      <!-- </a> -->
							    </div>
					      	<?php } }?>
						  </div>
					    </div>
					</div>
					<!-- <tab content end> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <product page end> -->
<?php include('homebrands.php');?>