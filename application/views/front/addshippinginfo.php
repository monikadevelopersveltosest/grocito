<?php  $session_userdata = $this->session->userdata(USER_SESSION); ?>
<style type="text/css">
    .sct-color-2 {
        background-color: #fcfcfc;
    }
    .slice-xs {
        padding-top: 1rem;
        padding-bottom: 1rem;
        position: relative;
    }
    .border-bottom {
        border-bottom: 1px solid #dee2e6!important;
    }
    .viewcarttitle{
        font-size: 16px;
        font-weight: 600;
    }
    .active{
        color: green;
    }
    .defaultbkganchor{
        background-color: #124b56;
        color: #fff;
    }
    @media (max-width: 768px){
        .col-md-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
        .col-xs-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
        .btn-base-1{
            font-size: 12px;
        }
    }
    .hideaddress{
        display: none;
    }
    .addnewaddressview{
       display: none; 
    }
        
    
</style>
<section class="slice-xs sct-color-2 border-bottom">
    <div class="container container-sm">
        <div class="row cols-delimited">
            
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon mb-0 text-center">
                            <i class="fa fa-shopping-cart" style="text-align: center !important;float: none"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="viewcarttitle">1. My Cart</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="icon-block icon-block--style-1-v5 text-center active">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="fa fa-truck active"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="viewcarttitle">2. Shipping info</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="block-content d-none d-md-block">
                            <h3 class="viewcarttitle">3. Payment</h3>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<section class="py-4 gry-bg" id="cart-summary">
        <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-xl-8">
                    <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
                    <?php if(isset($error) && !empty($error)){ ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                    <?php }?>
                    <form class="form-default" data-toggle="validator" action="" role="form" method="POST">
                        <div class="form-default bg-white p-4">
                            <div class="row align-items-center pt-4">
                                <div class="col-md-6">
                                    <a href="<?php echo base_url()?>shops" class="link link--style-3">
                                        <i class="la la-mail-reply"></i>
                                        Return to shop
                                    </a>
                                </div>

                                <div class="col-md-6 text-right">
                                    <?php if(isset($session_userdata) && !empty($session_userdata)){ ?> 
                                        <!-- <a href="<?php echo base_url()?>addshippinginfo" class="btn btn-styled btn-base-1" >Continue to Payment</a> -->
                                        <button type="submit" name="submitshippinginfo" value="submitshippinginfo" class="btn btn-styled btn-base-1"> Continue to Payment</button> 
                                    <?php }else{ ?>
                                        
                                        <a href="javascript:void(0)" class="btn btn-styled btn-base-1 loginModal" href-btntype="continueshipping">Continue to Shipping</a>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                                
                                                    <!-- <input type="hidden" class="form-control" name="name" value="<?php echo (isset($customerData['first_name']) ? $customerData['first_name'] .' '.$customerData['last_name'] : ''); ?>" placeholder="Enter Your Name" required>
                                                
                                                    <input type="hidden" class="form-control" name="email" value="<?php echo (isset($customerData['email']) ? $customerData['email'] : ''); ?>" placeholder="Email" required>
                                                
                                                    <input type="hidden" class="form-control" placeholder="postal_code" name="postal_code" value="<?php echo (isset($customerData['zipcode']) ? $customerData['zipcode'] : ''); ?>" zipcoderequired>
                                                
                                                    <input type="hidden"  class="form-control" placeholder="Phone" name="phone" value="<?php echo (isset($customerData['zipcode']) ? $customerData['zipcode'] : ''); ?>" required>
                                                    <input type="hidden" class="form-control" name="address" value="<?php echo (isset($customerData['address']) ? $customerData['address'] : ''); ?>" placeholder="Address" required> -->
                                                
                                                <!-- <input type="text" class="form-control" name="first_name"> -->
                                                <!-- <input type="hidden" class="form-control" id="latitude" value="<?php echo (isset($customerData['latitude']) ? $customerData['latitude'] : '');?>" placeholder="Enter Latitude" name="latitude"> -->
                                            
                                            
                                                <!-- <input type="text" class="form-control" name="first_name"> -->
                                                <!-- <input type="hidden" class="form-control" id="longitude" name="longitude" value="<?php echo (isset($customerData['longitude']) ? $customerData['longitude'] : '');?>" placeholder="Enter Longitude" > -->
                                            
                                        
                                        <!--<div class="row" style="padding: 10px">-->
                                        <!--    <div class="col-md-12" style="height: 243px;" id="gmap"></div>-->
                                        <!--    <div id="infowindow-content">-->
                                        <!--      <img src="" width="16" height="16" id="place-icon">-->
                                              <!-- <span id="place-name"  class="title">Indore</span><br> -->
                                        <!--      <span id="place-address"><?php echo (!empty($customerData) && !empty($customerData['address']) ? $customerData['address'] : "Indore Railway Station, Chhoti Gwaltoli, Indore, Madhya Pradesh, India" )?></span>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        </div>
                                        
                                    </div>
                                    <?php 
                                    $default_address_data = $this->Common_model->getsingledata('multiple_address',array('user_id' => customersessionid(),'status'=>1));
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12" style ="padding-left:35px;">
                                            <input type="radio" name="address_id" value="<?php echo $default_address_data['add_id'];?>" checked>
                                            <label><strong>Shipping Address (Default)</strong></label>
                                            <address>
                                            <b><?php echo $default_address_data['name'];?> </b> <?php echo $default_address_data['phone'];?> <br>
                                            <?php echo $default_address_data['address'];?> <br>
                                            Zip Code : <?php echo $default_address_data['zipcode'];?><br>
                                            Latitude : <?php echo $default_address_data['latitude'];?> <br>
                                            Longitude : <?php echo $default_address_data['longitude'];?>
                                          </address>
                                          <!--<button type="button" class="btn btn-link btn-icon"><i class="fa fa-pencil-square-o"></i> edit</button>-->
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12" style ="padding-left:35px;">
                                            <a href="javascript:void(0)" id="changeaddress" class="btn btn-styled defaultbkganchor"> Change Or Add New</a>
                                        </div>
                                    </div>
                                    <div class="row hideaddress">
                                    <?php 
                                        $multiple_address_data = $this->Common_model->getAllRecordsById('multiple_address',array('user_id' => customersessionid(),'status !='=>1));   
                                        foreach ($multiple_address_data as $addressarray)
                                        {
                                        ?>
                                        
                                            <div class="col-md-12" style ="padding-left:35px; padding-bottom: 25px;">
                                                <input type="radio" name="address_id" >
                                                <label><strong>Address</strong></label>
                                                <address>
                                                <b><?php echo $addressarray['name'];?> </b> <?php echo $addressarray['phone'];?> <br>
                                                <?php echo $addressarray['address'];?> <br>
                                                Zip Code : <?php echo $addressarray['zipcode'];?><br>
                                                Latitude : <?php echo $addressarray['latitude'];?> <br>
                                                Longitude : <?php echo $addressarray['longitude'];?>
                                              </address>
                                              <!--<button type="button" class="btn btn-link btn-icon"><i class="fa fa-pencil-square-o"></i> edit</button>-->
                                              <!--<a href="<?php echo base_url().'home/addmultiaddress/'.$addressarray['add_id']?>" class="" style ="color: #0a0a0a;" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>-->
                                             
                                              <!--<button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i> delete</button>-->
                                              <!--<a href="javascript:void(0)" href-add_id="<?php echo $addressarray['add_id']?>" class="text-danger btn_delete"  title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete&nbsp;&nbsp;&nbsp;</a>-->
                                              
                                              
                                              <!-- <?php if($addressarray['status'] == 1) { ?>
                                                  <a href="javascript:void(0)" href-add_id="<?php echo $addressarray['add_id']?>" class="remove_default_status " style ="color: #124b56;" href-status="0" ><i class="fa fa-toggle-on"></i>&nbsp;Default</a>
                                              <?php  } ?>
                                              <?php if($addressarray['status'] == 0) { ?>
                                                  <a href="javascript:void(0)" href-user_id ="<?php echo $addressarray['user_id'];?>" href-add_id="<?php echo $addressarray['add_id'];?>" class="reset_default" style ="color: #124b56;" href-status="1" ><i class="fa fa-toggle-off"></i>&nbsp;Set as Default</a>
                                              <?php } ?> -->
                                              
                                              
                                            </div>
                                        
                                    
                                        <?php } ?>
                                    </div>

                                    <div class="row addnewaddressview">
                                        <div class="col-md-12" style ="padding-left:35px;">
                                        <input type="radio" name="address_id" value="newadd" ></span>ADD NEW Address</span>
                                        <!-- <div class="col-md-12" style ="padding-left:35px;"> -->
                                        <!-- <input type="radio" name="address_id" value="<?php echo $default_address_data['add_id'];?>" checked></span>ADD NEW Address</span>
                                        <div class="col-md-6">
                                          <label>Enter Name</label>
                                          <input type="text" class="form-control" name="name" value="<?php echo (isset($customerData['first_name']) ? $customerData['first_name'] .' '.$customerData['last_name'] : ''); ?>" placeholder="Enter Your Name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Enter Email</label>
                                            <input type="text" class="form-control" name="mobile_no" value="<?php echo (isset($customerData['mobile_no']) ? $customerData['mobile_no'] : ''); ?>" placeholder="Email" required>
                                        </div>
                                        <div class="col-md-6">    
                                            <input type="text" class="form-control" name="email" value="<?php echo (isset($customerData['email']) ? $customerData['email'] : ''); ?>" placeholder="Email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="postal_code" name="postal_code" value="<?php echo (isset($customerData['zipcode']) ? $customerData['zipcode'] : ''); ?>" zipcoderequired>
                                        </div>
                                        
                                        <div class="col-md-6">    
                                            <input type="text" class="form-control" name="address" value="<?php echo (isset($customerData['address']) ? $customerData['address'] : ''); ?>" placeholder="Address" required>
                                        </div>
                                        </div> -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="" placeholder="Enter Your Name" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="" placeholder="Email" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Postal code</label>
                                                    <input type="text" class="form-control" placeholder="postal_code" name="postal_code" value="" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">Phone</label>
                                                    <input type="number" min="0" class="form-control" placeholder="Phone" name="phone" value="" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <input type="text" class="form-control" name="address" value="" placeholder="Address" >
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center pt-4">
                                <div class="col-md-6">
                                    <a href="<?php echo base_url()?>shops" class="link link--style-3">
                                        <i class="la la-mail-reply"></i>
                                        Return to shop
                                    </a>
                                </div>

                                <div class="col-md-6 text-right">
                                    <?php if(isset($session_userdata) && !empty($session_userdata)){ ?> 
                                        <!-- <a href="<?php echo base_url()?>addshippinginfo" class="btn btn-styled btn-base-1" >Continue to Payment</a> -->
                                        <button type="submit" name="submitshippinginfo" value="submitshippinginfo" class="btn btn-styled btn-base-1"> Continue to Payment</button> 
                                    <?php }else{ ?>
                                        
                                        <a href="javascript:void(0)" class="btn btn-styled btn-base-1 loginModal" href-btntype="continueshipping">Continue to Shipping</a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- </form> -->
                </div>

                <div class="col-xl-4 ml-lg-auto">
                    <?php include('partials/cart_summery.php');?>
                </div>
            </div>
        </div>
    </section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlk9jl3b8NvuKXQm6rft78c5T_PLe7gRg&libraries=places&callback=initMap" async defer></script>

<script type="text/javascript">

    $('.btn_delete').click(function(){
        var id = $(this).attr("href-id");
        //alert(id);
        $.ajax({
            type: 'POST',
            url:"<?php echo base_url()?>home/deleterecord",
            data:{id:id,table:'multiple_address',colwhr:'id'},
            dataType: 'json',
            success : function(data){
                if (data.status == 1){
                    //formSuccess();
                    // submitMSG(true,'Success');
                    setTimeout(function(){ window.location.reload(); },1000);
                    $.notify({
                        icon: 'ti-gift',
                        message: data.msg
                    },{type: 'success',timer: 1000});
                } else {
                    $.notify({
                        icon: 'ti-info-alt',
                        message: data.msg
                    },{type: 'danger',timer: 1000});                    
                }
            },
            error: function(data) {
                $.notify({
                        icon: 'ti-info-alt',
                        message: data.msg
                    },{type: 'danger',timer: 1000});
            },

        });
    });
    
    $(".reset_default").click(function(e){
        // var val = confirm("Sure you want to Default ?");
        var id = $(this).attr("href-add_id");
        // var f_name = $("#f_name").val(); 
        var userid = $(this).attr("href-user_id");
        
        if(id){
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>home/reset_status",
            data:{tablename:'multiple_address',add_id:id,userid:userid,status:0,whrcol:'add_id',whrcolu:'user_id',whrstatuscol:'status',action:"Default"},
            dataType:'json',
            success: function(response) {
            	// alert(data);
              if (response.status == 1){
              	// alert(data);
                $.notify(response.msg, "success");
                setTimeout(function(){location.reload()},1000);
              }else{
                $.notify(response.msg, "error");
              }
            }
          });
        }
    });
    
    $(".default_status").click(function(e){
        // var val = confirm("Sure you want to Add In Stock clearacne ?");
        var id = $(this).attr("href-id");
        if(id){
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>home/change_status",
            data:{tablename:'multiple_address',id:id,status:1,whrcol:'id',whrstatuscol:'status',action:"Default"},
            dataType:'json',
            success: function(response) {
              if (response.status == 1){
                $.notify(response.msg, "success");
                setTimeout(function(){location.reload()},1000);
              }else{
                $.notify(response.msg, "error");
              }
            }
          });
        }
    });

    $(".remove_default_status").click(function(e){
        // var val = confirm("Sure you want to Remove From Stock clearacne ?");
        var id = $(this).attr("href-add_id");
        if(id){
          $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>home/change_status",
            data:{tablename:'multiple_address',id:id,status:0,whrcol:'add_id',whrstatuscol:'status',action:"Default"},
            dataType:'json',
            success: function(response) {
              if (response.status == 1){
                $.notify(response.msg, "success");
                setTimeout(function(){location.reload()},1000);
              }else{
                $.notify(response.msg, "error");
              }
            }
          });
        }
    });
</script>

<script type="text/javascript">
function initMap() {
    var latt = ($("#latitude").val() != "")? parseFloat($("#latitude").val()) : 22.71720790;
    var longg = ($("#longitude").val() != "")? parseFloat($("#longitude").val()) : 75.86841130;
    console.log("latt =",latt," longg =",longg);
    var map = new google.maps.Map(document.getElementById('gmap'), {
      center: {lat: latt, lng: longg},
      zoom: 13
    });
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

$(".defaultbkganchor").click(function(){

    // var clickbutton = $(this).attr('href-btntype');
    // //alert(clickbutton);
    // $(".clickbutton").val(clickbutton);
    $(".defaultbkganchor").css("display","none");
    $(".hideaddress").css("display","block");
    $(".addnewaddressview").css("display","block");
})
</script>