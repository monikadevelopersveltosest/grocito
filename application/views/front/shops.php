<style>
    .im{
        height: 188px;
    }
    @media only screen and (max-width:424px){
    .im{
        height: 71px;
    }
    }
</style>
<?php include('categoryslider.php');?>
    <!-- <menu end> -->
    	<!-- featured product -->
<?php include('homebannerslider.php'); ?>
<!-- featured product -->
    <section class="featured-section fea2 popular_shop_high css_sec">
      <div class="">
        <div class="bx-style">
          <div class="col-lg-12">
            <div class="row heading-row" style="border: none; ">
              <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">
                <h4 class="sec-headings">
                  <i class="fa fa-percent" style="border: 1px dashed red; border-radius: 50%;">
                  </i>
                   Offer Near You</h4>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link text-right">
                    <a href="#">View All</a>
              </div>
            </div>
          </div>
          <div class="">
            <div class="waqar-16 owl-carousel owl-theme owl-responsive all-shops-section">
              <?php 
                if(isset($u_lat) && !empty($u_lat) && isset($u_long) && !empty($u_long)){
                  $shopidsa = array();
                  foreach($all_shop_data as $offer_shop_array){
                      // $shopidsa[] = $all_shop_array['shop_id'];

                    $whrc = array();
                    $cur_date = date("Y-m-d H:i:s"); 
                    $whrc[] = " status = 1";
                    $whrc[] = " added_by = 'shop'";
                    $whrc[] = " added_by_id in(".$offer_shop_array['shop_id'].")";
                    $whrc[] = " end_date >= '".$cur_date."'";
                    $wherec = " WHERE ".implode(" AND ", $whrc);
                    $orderbyc = " ORDER BY added_by_id DESC";
                    $coupondata = $this->Common_model->getwherecustomesingle('coupons',$wherec,$orderbyc);
                    if(isset($coupondata) && !empty($coupondata)){
              ?>
                <div class="item">
                  <div class="column1 featured-prd colmn2">
                    <a href="<?php echo base_url().'shopdetail?shop_id='.$offer_shop_array['shop_id'];?>">
                      <div class="shops-bx fon best_seller_s">
                        <div class="img-bx">
                         <img src="<?php echo base_url();?>uploads/shop_images/shop_image_mobile/<?php echo $offer_shop_array['shop_image_mobile']; ?>" class="img-fluid "> 
                        </div>
                        <div class="column-text text-center">
                          <h6><?php echo $offer_shop_array['shop_name']; ?></h6>
                          <p><?php echo $offer_shop_array['shopping_categories']; ?></p> 
                          <!-- <p>lorem ipsum sit amet</p>  -->
                        </div>
                        <div class="" style="">
                          <div class="rating-main">
                            <div class="rating text-white" style="display: inline-block;">
                              <i class="fa fa-star" aria-hidden="true"></i>
                              <span>5.0</span>
                            </div>
                          </div>
                          <div class="Offers pull-right">
                            <i class="fa fa-percent"></i>
                            <span style="float: right;"><?php echo $coupondata['offer_amount']; ?><?php echo  ($coupondata['offer_amount_type'] == 1 ? "%" : "FLAT"); ?> OFF</span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php
                    }
                      //p($coupondata);
                  }
                  // $shopids = implode(',', $shopidsa);
                }
              ?>
            </div>          
          </div>
        </div>
      </div>
    </section>
    <!-- featured product end -->
    <!-- <menu start> -->
    <section>
        <div class="">
        <div class="">
          <div class="col-lg-12">
            <div class="row heading-row specalize" style="border: none; ">
              <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">
                <h4 class="sec-headings">
                  <!-- <i class="fa fa-percent" style="border: 1px dashed red; border-radius: 50%;">
                  </i> -->
                  <img src="<?php echo base_url();?>front_assets/images/special.svg" style="height: 25px; width: 25px;">
                   Specialized</h4>
              </div>
              <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link text-right">
                    <a href="#">View All</a>
              </div> -->
            </div>
          </div>
          <div class="col-lg-12" style="padding: 0px">
            <div class="menus m-1">
              <!-- <ul class="customer-logos slider mb-0" style="padding-left: 0px;">
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/1.jpg" class="img-fluid menu-img">
                    <span >Mens</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/2.jpg" class="img-fluid menu-img">
                    <span >Womens</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/3.jpg" class="img-fluid menu-img">
                    <span >Kids</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/4.jpg" class="img-fluid menu-img">
                    <span >Furniture</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/5.jpg" class="img-fluid menu-img">
                    <span >Hardware's</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/6.jpg" class="img-fluid menu-img">
                    <span >Gifts</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/7.jpg" class="img-fluid menu-img">
                    <span >Goggles</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/8.jpg" class="img-fluid menu-img">
                    <span >Deo's</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/9.jpg" class="img-fluid menu-img">
                    <span >Watches</span>
                  </a>
                </li>
                <li class="slide text-center">
                  <a href="#">
                    <img src="<?php echo base_url();?>front_assets/images/slider1/10.jpg" class="img-fluid menu-img">
                    <span >Necklace's</span>
                  </a>
                </li>
              </ul> -->
              <?php
                if(isset($_GET['categories_id']) && !empty($_GET['categories_id'])){
                    $whrc = array('status'=>1,'parent_category_id'=>getcategoryidbyname($_GET['categories_id']));
                }else{
                   $whrc = array('status'=>1,'parent_category_id !='=>0);
                }
                
                $allsub1categories = $this->Common_model->GetWhere('categories',$whrc);
              ?>
              <ul class="customer-logos slider mb-0" style="padding-left: 0px;">
                <?php if(isset($allsub1categories) && !empty($allsub1categories)){ 
                    foreach ($allsub1categories as $allcategoriesdata){
                ?>
                <li class="slide text-center">
                  <a href="<?php echo base_url().'shops?special_cat_id='.$allcategoriesdata['category_name']?>">
                    <?php  echo (!empty($allcategoriesdata['category_image'])?'<img src='.base_url().'uploads/category/'.$allcategoriesdata['category_image'].' class="img-fluid menu-img">':'none'); ?>
                    <!-- <img src="front_assets/images/slider1/1.jpg" class="img-fluid menu-img"> -->
                    <span class="<?php echo (isset($_GET['special_cat_id']) && $_GET['special_cat_id'] == $allcategoriesdata['category_name'] ? 'activecolors' : ''); ?>" ><?php echo $allcategoriesdata['category_name']?></span>
                  </a>
                </li>
              <?php } } ?>
              </ul>
            </div>
          </div>
        </div>
        </div>
    </section>

    <!-- <menu end> -->
    <!-- featured product end -->
    <section class="all-shops-wt-fltr">
      <div class="filter-section filter_ss" style="padding-bottom: 8px;">
        <div class="filter-heading-bar">
          <div class="row">
            <div class="col-lg-6 col-6">
              <h4 class="sec-heading f-size">
                <img src="<?php echo base_url();?>front_assets/images/catogry/store.svg">
              All Shops</h4>
            </div>
            <div class="col-lg-6 col-6 filter-icon text-right">
              <div class="filter_btn">
              <!-- <sidebar toggle> -->
            <div id="myfilter" class=" filter1 text-left">

              <div class="top_menu">

              </div>
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()" style="border:none; color: #fff!important;">×</a>
              <form>
                <div class=" col-lg-12 catogry-select">
                  <div class="catgry">
                    <label>Catogary Select</label>
                    <select class="browser-default custom-select mb-2 catselect" name="categories_id" style="width: 100%; margin: 0 auto; border: 1px solid #d4d5d9;">
                      <option value="" selected>Choose option</option>
                      <?php if(isset($categorylist) && !empty($categorylist)){ 
                          foreach ($categorylist as $allcategoriesdatasec) {
                      ?>
                        <option value="<?php echo $allcategoriesdatasec['category_name']; ?>" <?php echo (isset($_GET['categories_id']) && $_GET['categories_id'] == $allcategoriesdatasec['category_name'] ? 'selected' : '');?>>
                            <?php echo $allcategoriesdatasec['category_name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class=" col-lg-12 pt-2 catogry-select">
                  <div class="catgry">
                    <label>Specialist catogary</label>
                    
                    <select name="special_cat_id" class="browser-default custom-select mb-2 specialsubcat" style="width: 100%; margin: 0 auto; border: 1px solid #d4d5d9;">
                      <option value="" selected>Choose option</option>
                          <?php  
                  	        
                  			 $subcategorylist = $this->Common_model->getwhrsubcatgo('categories');
                  		// 	$subcategory =  $this->Common_model->getwhere("categories",array('status'=>1,'parent_category_id'=>$categorylist['categories_id']));
                          foreach ($subcategorylist as $speccategoriesdat){
                      ?>
                        <option value="<?php echo $speccategoriesdat['category_name']; ?>" <?php echo (isset($_GET['special_cat_id']) && $_GET['special_cat_id'] == $speccategoriesdat['category_name'] ? 'selected' : '');?>>
                            <?php echo $speccategoriesdat['category_name']; ?>
                        </option>
                      <?php  } ?>
                      <!-- <option value="1" selected>Select Catogary</option>
                      <option value="2">Report a bug</option>
                      <option value="3">Feature request</option>
                      <option value="4">Feature request</option> -->
                    </select>
                  
                  </div>
                </div><?php } ?>
                <div class=" col-lg-12 pt-2 catogry-select">
                  <div class="f-location">
                    <label>Search Location</label>
                    <input type="text" placeholder="Search Location..." name="location">
                  </div>
                </div>
                <div class=" col-lg-12 pt-2 catogry-select">
                  <div class="f-submit">
                    <button type="button" class="btn btn-default btn11">Clear</button>
                    <button type="submit" class="btn btn-default btn22">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <button class="openbtn" onclick="openNav1()">
              <i class="fa fa-filter"></i>
              <span style="color: black;">Filters</span>
            </button>
            <!-- <sidebar toggle> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="all-shops-section">
        <div class="row shop_row">
          <?php foreach($all_shop_data as $all_shop_array){ 
                  $whrcsec = array();
                  $cur_date = date("Y-m-d H:i:s"); 
                  $whrcsec[] = " status = 1";
                  $whrcsec[] = " added_by = 'shop'";
                  $whrcsec[] = " added_by_id in(".$all_shop_array['shop_id'].")";
                  $whrcsec[] = " end_date >= '".$cur_date."'";
                  $wherecsec = " WHERE ".implode(" AND ", $whrcsec);
                  $orderbycsec = " ORDER BY added_by_id DESC";
                  $coupondatasec = $this->Common_model->getwherecustomesingle('coupons',$wherecsec,$orderbycsec);
          ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-sm-6 col-xs-6 col-6 mb-10">
              <a href="<?php echo base_url().'shopdetail?shop_id='.$all_shop_array['shop_id'];?>">
              <div class="shops-bx fon best_seller_s">
                <div class="img-bx im">
                 <img style="height: inherit;" src="<?php echo base_url();?>uploads/shop_images/shop_image_mobile/<?php echo $all_shop_array['shop_image_mobile']; ?>" class="img-fluid "> 
                </div>
                <!-- <div class="img-tag">
                  <div class="tag-text">Assured</div>
                </div> -->
                <div class="column-text text-center">
                  <h6><?php echo $all_shop_array['shop_name']; ?></h6>
                  <p><?php echo $all_shop_array['shopping_categories']; ?></p> 
                </div>
                <div class="" style="">
                  <div class="rating-main">
                    <div class="rating text-white" style="display: inline-block;">
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <span><?php echo (isset($all_shop_array['ratings']) && !empty($all_shop_array['ratings']) ? round($all_shop_array['ratings'],2) : 0.00); ?></span>
                    </div>
                  </div>
                  <?php if(isset($coupondatasec) && !empty($coupondatasec)){ ?>
                    <div class="Offers pull-right">
                      <i class="fa fa-percent"></i>
                      <span><?php echo $coupondatasec['offer_amount']; ?><?php echo ($coupondatasec['offer_amount_type'] == 1 ? "%" : "FLAT"); ?> OFF </span>
                    </div>
                  <?php } ?>
                </div>
              </div>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- Brands logo slider -->
    <!-- Popular Shop -->
    <section class="featured-section fea2 popular_shop_high" style="border-bottom: 1px solid #f3f1f1">
      <div class="">
        <div class="bx-style">
          <div class="col-lg-12">
              <div class="row heading-row" style="border: none; padding-top: 5px;">
                <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding-left: 0px;">
                  <h4 class="sec-headings asdd"><img src="<?php echo base_url();?>front_assets/images/catogry/store.svg" > Popular Shop</h4>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 view-all-link  text-right">
                  <a href="#">View All</a>
                </div>
              </div>
          </div>
          <div class="">
                  <div class="waqar-15 owl-carousel owl-theme owl-responsive all-shops-section">
                    <?php foreach($all_shop_data as $all_shop_arrayth){ 
                            $whrcsecth = array();
                            $cur_date = date("Y-m-d H:i:s"); 
                            $whrcsecth[] = " status = 1";
                            $whrcsec[] = " added_by = 'shop'";
                            $whrcsecth[] = " added_by_id in(".$all_shop_arrayth['shop_id'].")";
                            $whrcsecth[] = " end_date >= '".$cur_date."'";
                            $wherecsecth = " WHERE ".implode(" AND ", $whrcsecth);
                            $orderbycsecth = " ORDER BY added_by_id DESC";
                            $coupondatasecth = $this->Common_model->getwherecustomesingle('coupons',$wherecsecth,$orderbycsecth);
                            
                    ?>
                    <div class="item">
                      <div class="column1 featured-prd colmn2">
                        <a href="<?php echo base_url().'shopdetail?shop_id='.$all_shop_arrayth['shop_id'];?>">
                          <div class="shops-bx fon best_seller_s">
                            <div class="img-bx">
                             <img style="height: 149px;" src="<?php echo base_url();?>uploads/shop_images/shop_image_mobile/<?php echo $all_shop_arrayth['shop_image_mobile']; ?>" class="img-fluid "> 
                            </div>
                            <div class="column-text text-center">
                              <h6><?php echo $all_shop_arrayth['shop_name']; ?></h6>
                              <p><?php echo $all_shop_arrayth['shopping_categories']; ?></p>  
                            </div>
                            <div class="" style="">
                              <div class="rating-main">
                                <div class="rating text-white" style="display: inline-block;">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <span><?php echo (isset($all_shop_arrayth['ratings']) && !empty($all_shop_arrayth['ratings']) ? round($all_shop_arrayth['ratings'],2) : 0.00); ?></span>
                                </div>
                              </div>
                              <?php if(isset($coupondatasecth) && !empty($coupondatasecth)){ ?>
                                <div class="Offers pull-right">
                                  <i class="fa fa-percent"></i>
                                  <span><?php echo $coupondatasecth['offer_amount']; ?><?php echo ($coupondatasecth['offer_amount_type'] == 1 ? "%" : "FLAT"); ?> OFF </span>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <?php } ?>
                    <!-- <div class="item">
                      <div class="column1 featured-prd colmn2">
                        <a href="#">
                          <div class="shops-bx fon best_seller_s">
                            <div class="img-bx">
                             <img src="<?php echo base_url();?>front_assets/images/shopp/172b.png" class="img-fluid "> 
                            </div>
                            <div class="column-text text-center">
                              <h6>Milk Fresh</h6>
                              <p>lorem ipsum sit amet</p> 
                            </div>
                            <div class="" style="">
                              <div class="rating-main">
                                <div class="rating text-white" style="display: inline-block;">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <span>5.0</span>
                                </div>
                              </div>
                              <div class="Offers pull-right">
                                <i class="fa fa-percent"></i>
                                <span style="float: right;">50% OFF</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="item">
                      <div class="column1 featured-prd colmn2">
                        <a href="#">
                          <div class="shops-bx fon best_seller_s">
                            <div class="img-bx">
                             <img src="<?php echo base_url();?>front_assets/images/shopp/172a.png" class="img-fluid "> 
                            </div>
                            <div class="column-text text-center">
                              <h6>Milk Fresh</h6>
                              <p>lorem ipsum sit amet</p> 
                            </div>
                            <div class="" style="">
                              <div class="rating-main">
                                <div class="rating text-white" style="display: inline-block;">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <span>5.0</span>
                                </div>
                              </div>
                              <div class="Offers pull-right">
                                <i class="fa fa-percent"></i>
                                <span style="float: right;">50% OFF</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="item">
                      <div class="column1 featured-prd colmn2">
                        <a href="#">
                          <div class="shops-bx fon best_seller_s">
                            <div class="img-bx">
                             <img src="<?php echo base_url();?>front_assets/images/shopp/172.png" class="img-fluid "> 
                            </div>
                            <div class="column-text text-center">
                              <h6>Milk Fresh</h6>
                              <p>lorem ipsum sit amet</p> 
                            </div>
                            <div class="" style="">
                              <div class="rating-main">
                                <div class="rating text-white" style="display: inline-block;">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <span>5.0</span>
                                </div>
                              </div>
                              <div class="Offers pull-right">
                                <i class="fa fa-percent"></i>
                                <span style="float: right;">50% OFF</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="item">
                      <div class="column1 featured-prd colmn2">
                        <a href="#">
                          <div class="shops-bx fon best_seller_s">
                            <div class="img-bx">
                             <img src="<?php echo base_url();?>front_assets/images/shopp/l5.png" class="img-fluid "> 
                            </div>
                            <div class="column-text text-center">
                              <h6>Milk Fresh</h6>
                              <p>lorem ipsum sit amet</p> 
                            </div>
                            <div class="" style="">
                              <div class="rating-main">
                                <div class="rating text-white" style="display: inline-block;">
                                  <i class="fa fa-star" aria-hidden="true"></i>
                                  <span>5.0</span>
                                </div>
                              </div>
                              <div class="Offers pull-right">
                                <i class="fa fa-percent"></i>
                                <span style="float: right;">50% OFF</span>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div> -->
                  </div>          
              </div>
            </div>
          </div>
    </section>
    <script type="text/javascript">
      $(document).ready(function(){
          //Initialize Select2 Elements
        $(".catselect").on("change", function(){
            var cat = $(this).val();
            // alert(cat);
            // console.log(cat);

            $.ajax({
                  type: "POST",
                  url: "<?php echo base_url()?>home/subcatbycatname",
                  data: {cat:cat},
                  dataType: "html",
                  success : function(data){
                      // alert(data);
                      $('.specialsubcat').html(data);
                  },
                  error: function(data) {
                      $.notify(data.msg, "Empty");
                  },
              });
          });
      });
    </script>