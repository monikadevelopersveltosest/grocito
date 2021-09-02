<!-- <!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8"> -->
    
    <!--====== Title ======-->
   <!--  <title> Premio : Sign Up </title> -->
    
  <!--   <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!--====== Favicon Icon ======-->
  <!--   <link rel="shortcut icon" href="assets/images/pream-logo.png" type="image/png"> -->
        
    <!--====== Magnific Popup CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/magnific-popup.css"> -->
        
    <!--====== Slick CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/slick.css"> -->
        
    <!--====== Line Icons CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/LineIcons.css"> -->
        
    <!--====== Bootstrap CSS ======-->
   <!--  <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    
    <!--====== Default CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/default.css"> -->
    
    <!--====== Style CSS ======-->
<!--     <link rel="stylesheet" href="assets/css/style.css"> -->
    
    <style>
	.loginDiv{ max-width:500px; width:100%; padding:20px; margin:0 auto; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; margin-top:50px; margin-bottom:50px;}
	.footer-area {
    background-color: #f4f6f7;
    padding-top: 10px;
    padding-bottom: 10px;
}

label {
    display: inline-block;
    margin-bottom: .5rem;
    text-align: left !important;
}
.orrangrBG{ background-color:#ffc562;}
.RedBG{ background-color:#ff6d74;}
.blueBG{ background-color:#61a8e8;}
.hideclass{ display:none;}
.showclassd{ display:show;}
.formouter{ width:100%; margin:auto !important; border:1px #CCCCCC solid;  padding:20px;}
.btn1 {
 
  padding: 10px 16px;
  cursor: pointer;
  font-size: 16px;
 
}

/* Style the active class, and buttons on mouse-over */
.active, .btn1:hover {
 
  color: black;
  border-bottom:2px #17a2b8  solid;
}
.activeclass{ display:block;}
    #bt1{ margin-top:10px; background-color:#CCC; }
	#bt2{  margin-top:10px; background-color:#CCC; }
	#bt3{  margin-top:10px; background-color:#CCC;}
	#bt4{  margin-top:10px; background-color:#CCC;}

    		@media screen and (max-width: 900px) {
  .top-margin{margin-top:50px;}
  .about-text {
    font-size: 39px;
    margin: 0 auto;
    text-align: center;
    line-height: 500px;
    color: #FFF;
}
.about-img {
    width: 100%;
    background-image: url(assets/images/banner1.jpg);
    background-size: cover;
   height: 300px;
}
.about-text {
    font-size: 39px;
    margin: 0 auto;
    text-align: center;
    line-height: 300px;
    color: #FFF;
}
.menupadding{ padding:15px 0px 15px 0px;}

@media screen and (max-width:982px) {
	
	#bt1{ width:50%; margin-top:10px; background-color:#CCC; float:left;}
	#bt2{ width:46%; margin-top:10px; background-color:#CCC; float:left; margin-left:10px;}
	#bt3{ width:100%; margin-top:10px; background-color:#CCC;}
	#bt4{ width:100%; margin-top:10px; background-color:#CCC;}
	}

    </style>
    
<!-- </head>

<body> -->
<div class="container-fluid mt-100 border-top">
	<div class="container">
    <div class="row" style="min-height:380px;">
          <div class="col-lg-12">
            <form role="form" method="post" enctype="multipart/form-data" autocomplete="on">
               <?php if(!empty($error)){?> <div class="text-center text-danger"><?php  echo !empty($error) ? $error :'';?></div><?php }else{?>
                   <div class="text-center text-sucess"><?php  echo !empty($success) ? $success :'';?></div>
                   <?php } ?>
              <div class="row py-4 bg-white mt-3">
          			<div class="col-lg-12 text-center" id="mydiv">
            			<button type="button" class="btn  btn1 active" id="bt1">Vendor details</button>
            			<button type="button" class="btn  btn1" id="bt2">Bank Details</button>
            		<!-- 	<button type="button" class="btn  btn1" id="bt3">Employer Registration number</button> -->
                  <button type="button" class="btn  btn1" id="bt4">Membership details Type a message</button>
          			</div>
          			<div class="col-lg-12  activeclass hideclass pt-5" id="form1" >
            			<div class="formouter">
              			<div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class=" col-md-6">
                           <!--  <div class="form-group mt-2">
                              <label for="inputEmail4">Registration Number</label>
                              <input type="text" class="form-control" placeholder="Registration Number" name="shop_registration_no" required>
                            </div> -->
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Vendor Categories</label>
                              <!-- <input type="text" class="form-control" placeholder="Categories" name="shopcetegory_type_id"> -->
                              <select class="custom-select" id="validationTooltip04" required name="shopcetegory_type_id">
                                <option selected disabled value="">Select Any Vendore Categories Type</option>
                                <?php if(!empty($shopcategories_data)){ ?>
                                  <?php 
                                  foreach ($shopcategories_data as $shop_type_list1) {
                                    if($shop_data['shopcetegory_type_id'] == $shop_type_list1['category_name']){
                                      $duration1="selected";
                                    }else{
                                      $duration1="";
                                    }
                                  ?>
                                    <option value="<?php echo $shop_type_list1['category_name']; ?>" <?php echo $duration1; ?> ><?php echo $shop_type_list1['category_name'];?></option>
                                  <?php
                                  }
                                  ?>
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Membership</label>
                              <select class="custom-select" id="validationTooltip04" required name="membership-duration">
                                <option selected disabled value="">Select MemberShip Type</option>
                                 <?php if(!empty($membership)){ ?>
                                  <?php 
                                  foreach ($membership as $shop_type_list2) {
                                    if($shop_data['membership-duration'] == $shop_type_list2['duration']){
                                      $duration="selected";
                                    }else{
                                      $duration="";
                                    }
                                  ?>
                                    <option value="<?php echo $shop_type_list2['duration']; ?>" <?php echo $duration; ?>><?php echo $shop_type_list2['duration'];?></option>
                                  <?php
                                  }
                                  ?>
                                  <?php
                                  }
                                  ?>
                              </select>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Owner Name</label>
                              <input type="text" class="form-control" placeholder="Owner Name" name="owner_name" required>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Shop Name</label>
                              <input type="text" class="form-control" placeholder="Shop Name" name="shop_name" required>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Email ID</label>
                              <input type="email" class="form-control" placeholder="Email ID" name="email" required>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Password</label>
                              <input type="Password" class="form-control" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Owner Image</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="owner_image" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Employer Identification number</label>
                              <input type="text" class="form-control" placeholder="Aadhar Number" name="adhar_no" required>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Employer Identification number image</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name=" adhar_image" required>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                            <div class="form-group mt-2">
                              <label for="inputEmail4">Categories</label>
                              <?php
                                  if(isset($shop_data['shopping_categories']) && !empty($shop_data['shopping_categories'])){
                                    $shopping_categories = explode(',', $shop_data['shopping_categories']);
                                  }
                                  $whrc = array('status'=>1,'parent_category_id'=>0);
                                  $allcategories = $this->Common_model->GetWhere('categories', $whrc);
                                ?>
                                <select class="custom-select" id="validationTooltip04" required name="shopping_categories[]" data-placeholder="Select a categories">
                                  <option>Select Categories</option>
                                   <?php if(isset($allcategories) && !empty($allcategories)){ 
                                      foreach ($allcategories as $allcategoriesdata){
                                  ?>
                                    <option value="<?php echo $allcategoriesdata['category_name']; ?>" <?php echo (isset($shopping_categories) && !empty($shopping_categories) && in_array($allcategoriesdata['category_name'], $shopping_categories) ? 'selected' : '')?>><?php echo $allcategoriesdata['category_name']; ?></option>
                                  <?php } } ?>
                                </select>
                              <!-- input type="text" class="form-control" name="shopping_categories[]" placeholder=""> -->
                            </div>
                          </div>
                          <div class=" col-md-6">
                                <div class="form-group mt-2">
                                  <label for="inputEmail4">Mobile Number</label>
                                  <br><select name="country_code" class="" style="width:53px; height: 34px;display: initial;">
                                   <option>+1</option>
                                    <option>+91</option>
                                 </select>
                                  <input type="tel" class="form-control" style="width:84%; height: 34px; display: inline-block;" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" class="form-control" name="mobile_no" size="10" required />
                                 <!--  <input type="tel" class="form-control" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Mobile Number" name="mobile_no" required> -->
                                </div>
                               <!--  <div class="form-group mt-2">
                                  <label for="inputEmail4">GST Number</label>
                                  <input type="text" class="form-control" placeholder="GST Number" name="gst_number" required>
                                </div> -->
                                <div class="form-group mt-2">
                                  <label for="inputEmail4">Shop Image (265 * 165 px )</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="shop_image_mobile" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                                </div>
                               <!--  <div class="form-group mt-2">
                                  <label for="inputEmail4">Shop Image or Mobile</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="shop_image_desktop" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                                </div> -->
                                <!--  <div class="form-group mt-2">
                                  <label for="inputEmail4">Shop Logo (150 * 150 px)</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="shop_logo" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                                </div> -->
                                <!-- <?php if(!empty($shop_type_list)){ ?>
                                <div class="form-group mt-2">
                                  <label for="inputEmail4">Select Shop Type</label>
                                    <select class="custom-select" id="validationTooltip04" required name="shop_type_id">
                                      <option selected disabled value="">Select Any Shop Type</option>
                                        <?php 
                                          foreach ($shop_type_list as $shop_type_list) {
                                        ?>
                                          <option value="<?php echo $shop_type_list['shop_type_id']; ?>" <?php echo (isset($shop_data['shop_type_id']) && $shop_data['shop_type_id'] == $shop_type_list['shop_type_id'] ? "selected" : ''); ?> ><?php echo $shop_type_list['shop_type_name'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                              <?php }?> -->
                                <div class="form-group mt-2">
                                  <label for="inputEmail4">Tax identification number</label>
                                  <input type="text" class="form-control" placeholder="Pan number" name="pan_no" required>
                                </div>
                                <div class="form-group mt-2">
                                  <label for="inputEmail4">Tax identification number document (265 * 165 px )</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="pan_image" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                                </div>
                                <div class="form-group mt-2">
                                  <label>Business registered in</label>
                                  <input type="text" class="form-control" name="business-registerd" value="" placeholder="Business registered in">
                                </div>
                                  <div class="form-group mt-2">
                                    <label>Chain (owned . operated by parent company)</label>
                                    <input type="text" class="form-control" name="chain" value="" placeholder="Chain">
                                  </div>
                                 <div class="form-group mt-2">
                                  <label>Franchise (corporate brand)</label>
                                  <input type="text" class="form-control" name="franchise" value="" placeholder="Franchise">
                                </div>
                                 <div class="form-group mt-2">
                                  <label>Years in business</label>
                                    <select class="form-control" name="year_business">
                                      <option>Choose years in business range </option>
                                      <option>1-4</option>
                                      <option>5-8</option>
                                      <option>9-12</option>
                                      <option>13+</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                  <label>Short description of nature of business</label>
                                  <input name="desc" class="form-control" value="" required placeholder="Short description of nature of business">
                                  </div>
                                <!-- <div class="form-group mt-2">
                                  <label for="inputEmail4">Upload GST Documents</label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="gst_image" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                  </div>
                                </div> -->
                               <!--  <div class="form-group mt-2">
                                  <label for="inputEmail4">Address</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="shop_address" required></textarea>
                                </div> -->
                          </div>
                          <!--<div class=" col-md-12">-->
                          <!--  <div class="form-group mt-2">-->
                          <!--    <label for="inputEmail4">Address</label>-->
                          <!--    <textarea class="form-control" id="pac-input" name="shop_address" rows="3" required placeholder="Address"></textarea>-->
                          <!--  </div>-->
                          <!--</div>-->
                          <!--<div class=" col-md-6">-->
                          <!--   <div class="form-group mt-2">-->
                          <!--      <label>Latitude</label>-->
                          <!--      <input type="text" name="shop_latitude"  class="form-control" id="latitude"  value="22.71720790">-->
                          <!--  </div>-->
                          <!--</div> -->
                          <!--<div class=" col-md-6">-->
                          <!--   <div class="form-group mt-2">-->
                          <!--      <label>Longitude</label>-->
                          <!--      <input type="text" name="shop_longitude"  class="form-control" id="longitude"  value="75.86841130">-->
                          <!--  </div>-->
                          <!--</div>  -->
                          <div class="col-md-12">
                              <div class="form-group mt-2">
                                <label>Address</label>
                                <input name=" shop_address" class="form-control"  id="pac-input" value="Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India"  >
                              </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Latitude</label>
                                  <input type="text" name="shop_latitude"  class="form-control" id="latitude"  value="22.71720790">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Longitude</label>
                                  <input type="text" name="shop_longitude"  class="form-control" id="longitude"  value="75.86841130">
                                </div>
                              </div>
                            <div class="col-md-12 mt-40" style="height: 243px;" id="gmap"></div>
                          <!--<div class="col-lg-12 mt-40">-->
                          <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15007.934968313653!2d75.3605565!3d19.8829084!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x32871f1d6cd59956!2sLR%20Technology!5e0!3m2!1sen!2sin!4v1613394604407!5m2!1sen!2sin" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
                          <!--</div>-->
                        </div>
                      </div>
                    </div>
            			</div>
                 <!--  <div class="col-lg-12 text-right mt-10"><button type="button" class="btn btn-primary prev1">Previus</button></div> -->
          			  <div class="col-lg-12 text-right mt-10"><button type="button" class="btn btn-danger next1">Next</button></div>
          			</div>
          			<div class="col-lg-12 pt-5" id="form2" style="display: none;">
            			<div class="formouter">
              			<div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="form-group mt-2 col-md-6">
                            <label for="inputEmail4">Account Holder Name</label>
                            <input type="text" class="form-control" placeholder="Account Holder Name" name="account_holder_name" required>
                          </div>
                          <div class="form-group mt-2 col-md-6">
                            <label for="inputEmail4">Account Number</label>
                            <input type="text" class="form-control" placeholder="Account Number" name="bank_acc_no" required>
                          </div>
                          <div class="form-group  mt-2 col-md-6">
                            <label>Routing number</label>
                            <input type="text" class="form-control" name="routing-number" value="" required placeholder="Routing number">
                          </div>
                         <!--<div class="form-group mt-2 col-md-6">
                            <label for="inputEmail4">IFSC Code</label>
                            <input type="text" class="form-control" placeholder="IFSC Code" name="bank_ifsc_code" required>
                          </div>
                          <div class="form-group mt-2 col-md-6">
                            <label for="inputEmail4">Bank Name</label>
                            <input type="text" class="form-control" placeholder="Bank Name" name="bank_name" required>
                          </div>
                          <div class="form-group mt-2 col-md-6">
                            <label for="inputEmail4">Branch</label>
                            <input type="text" class="form-control" placeholder="Branch" name="bank_branch" required>
                          </div>
                          <div class="form-group mt-2 col-md-6">
                            <label for="inputEmail4">Cancel Check Image</label>
                            <input type="file" class="form-control" name="cancel_check_image" required>
                          </div> -->
                        </div>
                      </div>
                    </div>
            			</div>
                <!-- <div class="col-lg-12 text-right mt-10"><button type="button" class="btn btn-primary prev2">Previus</button></div> -->
          			<div class="col-lg-12 text-right mt-10"><button type="button" class="btn btn-danger next2">Next</button></div>
          			</div>			
          			<!-- <div class="col-lg-12 pt-5" id="form3" style="display: none;">
                      <div class="formouter">
                      	<div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                              <div class="form-group mt-2 col-md-6">
                                <div class="custom-file">
                                  <input type="text" class="form-control" name="desc" required>
                                </div>
                              </div>
                              <div class="form-group mt-2 col-md-6">
                                <div class="custom-file">
                                  <label for="inputEmail4">Upload image</label>
                                  <input type="file" class="custom-file-input" id="customFile" name="gumasta_image" required>
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
          			      </div>
              			<div class="col-lg-12 text-right mt-10"><button type="button" class="btn btn-danger next3">Next</button></div>
              	</div> -->
                <div class="col-lg-12 pt-5" id="form4" style="display: none;">
                      <div class="formouter">
                        			<div class="row">
                                <div class="col-lg-12">
                                  <div class="row">
                                			<div class="col-lg-4 mt-10">
                                        <div class="w-100 border shadow">
                                            <div class="w-100 orrangrBG p-3 text-white">
                                              <div class="w-100 text-center FontSize34">Standard</div>
                                              <div class="w-100 text-center FontSize22">Annual Fees</div>
                                              <div class="w-100 text-center FontSize28"><i class="fas fa-rupee-sign"></i> 5000</div>
                                              <div class="w-100 text-center FontSize22 mt-10"><button type="button" class="btn btn-outline-danger">Join <i class="fa fa-caret-right" aria-hidden="true"></i></button></div>
                                            </div>
                                            <div class="w-100 py-3 ">
                                              <div class="w-100 text-center FontSize16">Member Visit Fees</div>
                                              <div class="w-100 text-center FontSize14"><i class="fas fa-rupee-sign"></i> 5000</div>
                                              <div class="w-100 text-center FontSize16">Geust Visit Fees</div>
                                              <div class="w-100 text-center FontSize14"><i class="fas fa-rupee-sign"></i> 5000</div>
                                            </div>
                                  			</div>
                                      </div>
                                      <div class="col-lg-4 mt-10">
                                              <div class="w-100 border shadow">
                                              	<div class="w-100 RedBG p-3 text-white">
                                                  	<div class="w-100 text-center FontSize34">Standard Plus</div>
                                                      <div class="w-100 text-center FontSize22">Annual Fees</div>
                                                      <div class="w-100 text-center FontSize28"><i class="fas fa-rupee-sign"></i> 5000</div>
                                                      <div class="w-100 text-center FontSize22 mt-10"><button type="button" class="btn btn-outline-danger">Join <i class="fa fa-caret-right" aria-hidden="true"></i></button></div>
                                                </div>
                                                <div class="w-100 py-3 ">
                                                  <div class="w-100 text-center FontSize16">Member Visit Fees</div>
                                                  <div class="w-100 text-center FontSize14"><i class="fas fa-rupee-sign"></i> 5000</div>
                                                  <div class="w-100 text-center FontSize16">Geust Visit Fees</div>
                                                  <div class="w-100 text-center FontSize14"><i class="fas fa-rupee-sign"></i> 5000</div>
                                                </div>
                                  			      </div>
                                      </div>
                                      <div class="col-lg-4 mt-10">
                                        <div class="w-100 border shadow">
                                          <div class="w-100 orrangrBG p-3 text-white">
                                            <div class="w-100 text-center FontSize34">Prestige</div>
                                            <div class="w-100 text-center FontSize22">Annual Fees</div>
                                            <div class="w-100 text-center FontSize28"><i class="fas fa-rupee-sign"></i> 5000</div>
                                            <div class="w-100 text-center FontSize22 mt-10"><button type="button" class="btn btn-outline-danger">Join <i class="fa fa-caret-right" aria-hidden="true"></i></button></div>
                                          </div>
                                          <div class="w-100 py-3 ">
                                            <div class="w-100 text-center FontSize16">Member Visit Fees</div>
                                            <div class="w-100 text-center FontSize14"><i class="fas fa-rupee-sign"></i> 5000</div>
                                            <div class="w-100 text-center FontSize16">Geust Visit Fees</div>
                                            <div class="w-100 text-center FontSize14"><i class="fas fa-rupee-sign"></i> 5000</div>
                                          </div>
                                			  </div>
                                      </div>
                                      <div class="col-lg-12 text-right mt-10"><button type="submit" id="submit12" class="btn btn-danger" name="submit">Save</button></div>
                                  </div>
                                </div>
                              </div>
                			</div>
              	</div>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>
   <!--  <section class="footer-area bg-dark mt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    
                    <div class="copyright text-center fontsize14" >
                        <p class="text text-danger fontsize14"><a rel="nofollow" class="text-white fontsize14" href="#">© Copyright 2020. All Rights Reserved By Preamio </a> <br>Designed by <a href="#" rel="nofollow" class="text-white">IT Spark Technology</a>   </p>  
                    </div>
                </div>
            </div>
        </div> 
    </section> -->

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <!-- <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a> -->
    <!--====== Jquery js ======-->
   <!--  <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script> -->
    
    <!--====== Bootstrap js ======-->
    <!-- <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> -->
    
    <!--====== Slick js ======-->
   <!--  <script src="assets/js/slick.min.js"></script> -->
    
    <!--====== Magnific Popup js ======-->
    <!-- <script src="assets/js/jquery.magnific-popup.min.js"></script> -->
    
    <!--====== Ajax Contact js ======-->
    <!-- <script src="assets/js/ajax-contact.js"></script> -->
    
    <!--====== Isotope js ======-->
    <!-- <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script> -->
    
    <!--====== Scrolling Nav js ======-->
   <!--  <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script> -->
    
    <!--====== Main js ======-->
  <!--   <script src="assets/js/main.js"></script> -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1jqCFvq7QWDreBKSOQi0tgL6wYBdXbWA&libraries=places&callback=initMap" async defer></script>

    <script>
$(document).ready(function(){
  $( "#bt1" ).click(function(e) {
        $("#form1").addClass('activeclass').siblings().removeClass('hideclass');
			  $("#form2").hide();
			   $("#form3").hide();
			    $("#form4").hide();
            $( "#form1" ).toggle( "slow", function() {
    	});
     });
     
    $( "#bt2" ).click(function(e) {
                 $("#form1").hide();
			   $("#form3").hide();
			    $("#form4").hide();
            $( "#form2" ).toggle( "slow", function()
			
			
			 
			 {
    	});
    });
    
    // $( "#bt3" ).click(function(e) {
			 //     $("#form1").hide();
			 //   $("#form2").hide();
			 //    $("#form4").hide();
    //         $( "#form3" ).toggle( "slow", function()
			
	
																 
			
			
			 
			 // {
    // 	});
    // });

 $( "#bt4" ).click(function(e) {
			     $("#form1").hide();
			   $("#form2").hide();
			    $("#form3").hide();
            $( "#form4" ).toggle( "slow", function()
			
	
																 
			
			
			 
			 {
    	});
    });

   
});

</script>
    <script>
// Add active class to the current button (highlight it)
var header = document.getElementById("mydiv");
var btns = header.getElementsByClassName("btn1");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
$(".next1").click(function(){
  $("#form1").hide();
  $("#form2").show();
  $("#bt2").addClass("active");
  $("#bt1").removeClass("active");

});

$(".next2").click(function(){
  $("#form2").hide();
  $("#form4").show();
  $("#bt4").addClass("active");
  $("#bt2").removeClass("active");
});

/*$(".next3").click(function(){
  $("#form3").hide();
  $("#form4").show();
  $("#bt4").addClass("active");
  //$("#bt3").removeClass("active");
});*/
function initMap() {
    var latt = ($("#latitude").val() != "")? parseFloat($("#latitude").val()) : 22.71720790;
    var longg = ($("#longitude").val() != "")? parseFloat($("#longitude").val()) : 75.86841130;
    //console.log("latt =",latt," longg =",longg);
    var map = new google.maps.Map(document.getElementById('gmap'), {
      center: {lat: latt, lng: longg},
      zoom: 13
    });
    console.log(map);
    var input = document.getElementById('pac-input');
    var autocomplete = new google.maps.places.Autocomplete(input);
    // Bind the map's bounds (viewport) property to the autocomplete object,

    // so that the autocomplete requests use the current map bounds for the

    // bounds option in the request.

    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
      map: map,
      position : new google.maps.LatLng(latt, longg),
    });
    infowindow.open(map, marker);
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
    autocomplete.addListener('place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }
      $("#latitude").val(place.geometry.location.lat().toFixed(8));
      $("#longitude").val(place.geometry.location.lng().toFixed(8));
      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {

        map.setCenter(place.geometry.location);

        map.setZoom(17);  // Why 17? Because it looks good.

      }

      marker.setPosition(place.geometry.location);

      marker.setVisible(true);



      var address = '';

      if (place.address_components) {

        address = [

          (place.address_components[0] && place.address_components[0].short_name || ''),

          (place.address_components[1] && place.address_components[1].short_name || ''),

          (place.address_components[2] && place.address_components[2].short_name || '')

        ].join(' ');

      }



      infowindowContent.children['place-icon'].src = place.icon;

      infowindowContent.children['place-name'].textContent = place.name;

      infowindowContent.children['place-address'].textContent = address;

      infowindow.open(map, marker);

    });
}

</script>
</body>

</html>
