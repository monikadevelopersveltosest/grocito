    <!-- <menu start> -->

	<!-- <menu start> -->
	<?php include('clearance_product_slider.php');?>
    <!-- <menu end> -->

    

    <!-- <menu end> -->

    <!-- featured product end -->

  

    <!-- Brands logo slider -->

    <!-- Popular Shop -->

    <section class="featured-section fea2 popular_shop_high" >

      <div class="">

        <div class="bx-style">

          <div class="col-lg-12">

              <div class="row heading-row" style="border: none; padding-top: 5px;">

                <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">

                  <!-- <h4 class="sec-headings asdd"><img src="<?php echo base_url();?>front_assets/images/catogry/store.svg" > Shops</h4> -->

                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link  text-right">

                  <!-- <a href="#">View All</a> -->

                </div>

              </div>

          </div>

          <div class="">

                  <div class="waqar-15 owl-carousel owl-theme owl-responsive all-shops-section">



                    <?php 

                    // $getclearance = $this->Common_model->getwhrclearance('product');
                    $whrp = array();
                    $whrp[] = "clearance_status = 1";
                    if(isset($_GET['categories_id']) && !empty($_GET['categories_id'])){
                        $catid = $_GET['categories_id'];
                        if(!empty($catid)){
                            $whrp[] = "categories_id = ".$catid."";
                        }
                    }
                    $wherep = " WHERE ".implode(" AND ", $whrp);
                    // die;
                    $getclearance = $this->Common_model->getwhrcshopidbyproduct($wherep);

                    // print_r($getclearance);

                    $getshopclearance = $this->Common_model->getwhrshopclearance('shops');

                    // print_r($getshopclearance);
                    if(isset($getclearance) && !empty($getclearance)){
                      $scid = array();
                        foreach ($getclearance as $scc) {
                          $scid[] = $scc['shop_id'];
                        }
                        // print_r($scid);
                        $scidi = implode(",", $scid);
                        // print_r($scidi);
                        $scidii = "'" . str_replace(",", "','", $scidi) . "'";
                        // print_r($scidii);

                      }

                      $whrcc = " WHERE shop_id in (".$scidii.") and status =1";

                      // print_r($scidii);
                      $allcategoriesc = $this->Common_model->getwhrshopid($whrcc);
                      // print_r($allcategoriesc);
                      // die;



                      foreach ($allcategoriesc as $allcategoriesc) {
                      ?>
                    </div>          

              </div>

            </div>

          </div>

    </section>

    <!-- Popular Shop -->

    

    <!-- Clearance Product -->

    

    <section class="featured-section dfsd sec_arreng">

    	<div class="">

    		<div class="col-lg-12">
    		    
    		    

          		<div class="row heading-row">

    	      		<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">
                        
                        <h4 class="sec-heading f-size">
                            <img src="<?php echo base_url();?>front_assets/images/catogry/store.svg">
                          <?php echo $allcategoriesc['shop_name']?></h4>
    	      			<!--<h4 class="sec-heading"><?php echo $allcategoriesc['shop_name']?></h4>-->

    	      		</div>

    	      		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link text-right">

    	      			<!--<a href="">View All</a>-->
    	      			<a href="<?php echo base_url().'clearance_detail?shop_id='.$allcategoriesc['shop_id'];?>">View All</a>
    	      		
                             
    	      		</div>

          		</div>

    		</div>

    		<div class="bx-style">

    			<div class="col-lg-12" style="padding-left: 0!important; padding-right: 0!important;">

    		          <div class="waqar-2 owl-carousel owl-theme owl-responsive">

    		          	<?php

    		          		// $cols = "product_id,product_reg_id,shop_id,name,unit_price,	discount,discount_type,status,num_of_sale,main_image";

    		          		// $whrtp = array();

    		          		// $whrtp[] = " status = 1 ";

    		          		// $wheretp = " WHERE ".implode(" AND ", $whrtp);

    		          		// $orderbytp = " ORDER BY num_of_sale	DESC LIMIT 0,10 ";

    		          		// $best_shop_data = $this->Common_model->getwherecustomecol('product',$cols,$wheretp,$orderbytp);

                    $whrp2 = array();
                    $whrp2[] = "clearance_status = 1";
                    $whrp2[] = "shop_id = ".$allcategoriesc['shop_id']."";
                    $whrp2[] = "status = 1";
                    if(isset($_GET['categories_id']) && !empty($_GET['categories_id'])){
                        if(!empty($catid)){
                            $whrp2[] = "categories_id = ".$catid."";
                        }
                    }
                    $wherep2 = " WHERE ".implode(" AND ", $whrp2);  
                    // $whrp = " WHERE shop_id = ".$allcategoriesc['shop_id']." and status = 1 and clearance_status = 1";
                    $best_shop_data = $this->Common_model->getwhrclearanceproduct($wherep2);

                    // print_r($best_shop_data);

    		          		if(isset($best_shop_data) && !empty($best_shop_data)){

    		          			foreach ($best_shop_data as $best_product_array) {

    		          	?>

    						<div class="item">

    						  <div class="column1 featured-prd">

    						  		<!-- <div class="offer-tag"><?php echo $best_product_array['discount']; ?><?php echo  ($best_product_array['discount_type'] == 1 ? "% OFF" : "FLAT OFF"); ?> </div> -->

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



    		          </div>          

    	        </div>

            </div>

        </div>

        <?php } ?>

    </section>



    <!-- Clearance Product -->

    

    