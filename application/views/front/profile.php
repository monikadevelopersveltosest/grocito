
	<style type="text/css">
	.mt-4, .my-4 {
	    margin-top: 1.5rem!important;
	}
	.bg-white{
	    background-color: #fff!important;
	}
	*, ::after, ::before {
	    box-sizing: border-box;
	}
	.form-box-title {
    border-bottom: 1px solid #eee;
    font-size: 15px;
    font-weight: 500;
    background: #f8f8f8;
   }
   .p-3 {
	    padding: 1rem!important;
	}
	.m-10{
	    margin: 10px;
	}
	.bgp{
		background-color: #f3f3f3;
	}
</style>
<link rel="stylesheet" href="<?php echo base_url();?>common_assets/editor/jodit.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<?php 
	$info_data = customerdata(customersessionid());
	// $shipping_data = customerdata(customersessionid());
	// $password_data = customerdata(customersessionid());
	 $multiple_address_data = $this->Common_model->getAllRecordsById('multiple_address',array('user_id' => customersessionid()));
// 	 print_r($multiple_address_data);
?>
<div class="container-fluid pt-10 bgp">
  	<div class="row content m-10">
    	<?php include('dashboardsidebar.php'); ?>
	    <div class="col-sm-12 col-lg-9">
	      <!-- dashboard box start -->
	      	<div class="row form-box bg-white mt-4">
	      		<div class="col-md-12 form-box-title px-3 py-2">
                    Basic info
                </div>
                <!-- <?php print_r($info_data);?> -->
                <div class="col-md-12">
					 <form action="" method="post" id="basicinfoform" enctype="multipart/form-data">
					 	<div class="row" >
					 		<div class="col-sm-6">

						      <label for="name">First Name:</label>
						      
						      <input type="text" class="form-control" id="first_name" value="<?php echo (isset($info_data['first_name']) ? $info_data['first_name'] : '');?>" placeholder="Enter First Name" name="first_name">
						    </div>
						    <div class="col-sm-6">
						      <label for="name">Last Name:</label>
						      <input type="text" class="form-control" id="blast" value="<?php echo (isset($info_data['last_name']) ? $info_data['last_name'] : '');?>" placeholder="Enter Last Name" name="last_name">
						    </div>
						    <div class="col-sm-6">
						      <label for="number">Number:</label>
						      <input type="number" class="form-control" id="bnumber" value="<?php echo (isset($info_data['mobile_no']) ? $info_data['mobile_no'] : '');?>" placeholder="Enter number" name="mobile_no">
						    </div>
						    <div class="col-sm-6">
						      <label for="email">Email:</label>
						      <input type="email" class="form-control" id="bemail" value="<?php echo (isset($info_data['email']) ? $info_data['email'] : '');?>" placeholder="Enter email" name="email">
						    </div>
						 
							<div class="col-sm-6"> 
								<label for="image">Image:</label>
								<input type="file" class="form-control" id="bimage" placeholder="Upload Image" name="image" >
							</div>
							<!-- <?php if(isset($info_data['image']) && !empty($info_data['image'])){ ?>
							<div class="col-sm-6">
								<img src="<?php echo base_url().'uploads/customerprofilepic/'.$info_data['image']?>" class="img-responsive">
							</div>
							<?php } ?> -->
							<div class="col-sm-6" style="padding-top: 10px"> 
					        
					        <button type="button" class="btn btn-success pull-right" id="changebasic" name="changebasic" value="changebasic">Submit</button>
						</div>
					    </div>
					  </form>
				</div>
			</div>

	      	<div class="row form-box bg-white mt-12">
	      		<div class="col-md-12 form-box-title px-3 py-2">
                    Shipping info
                </div>
               
              <!-- <form action="" method="post" id="shippinginfoform" enctype="multipart/form-data">
                      <div id="address_choice_options">
                      	<div class="row form-box-content p-3">
      						<div class="col-sm-12 col-md-9">
      							<label>Address</label>
      							
      							<input type="hidden" name="address" value="">
      							<input type="text" class="form-control" id="address" value="<?php echo (isset($info_data['address']) ? $info_data['address'] : '');?>" placeholder="Enter Your Address" name="address">
      						</div>
      						<div class="col-sm-12 col-md-3">
      							<label>PIN CODE</label>
      							<input type="hidden" name="zipcode" value="">
      							<input type="text" class="form-control" id="zipcode" value="<?php echo (isset($info_data['zipcode']) ? $info_data['zipcode'] : '');?>" placeholder="Enter PIN CODE" name="zipcode">
      						</div>
      						<div class="col-sm-12 col-md-6">
      							<label>Latitude</label>
      							<input type="hidden" name="latitude" value="">
      							<input type="text" class="form-control" id="latitude" value="<?php echo (isset($info_data['latitude']) ? $info_data['latitude'] : '');?>" placeholder="Enter Latitude" name="latitude">
      						</div>
      						<div class="col-sm-12 col-md-6">
      							<label>Longitude</label>
      							<input type="hidden" name="longitude" value="">
      							<input type="text" class="form-control" id="longitude" value="<?php echo (isset($info_data['longitude']) ? $info_data['longitude'] : '');?>" placeholder="Enter Longitude" name="longitude">
      						</div>
      						<div class="col-sm-12" style="padding-top: 10px"> 
      						    <button type="button" class="btn btn-success pull-right" name="changeshipping" id="changeshipping" value="changeshipping">Submit</button>
      						</div>
      					</div>	
      				</div>
      				</form>	 -->
				
                <div class="col-md-12" style="padding-top:0px">
                    <div class="col-md-12">
                        <a href="<?php echo base_url().'home/addmultiaddress'?>" class="btn btn-success pull-left" >Add Address</a>
                    </div>
                </div>
                	<?php 
                    $default_address_data = $this->Common_model->getsingledata('users',array('id' => customersessionid()));
                    ?>
                    

                    <?php 
                    $multiple_address_data = $this->Common_model->getAllRecordsById('multiple_address',array('user_id' => customersessionid()));   
                    // print_r($multiple_address_data);
                    foreach ($multiple_address_data as $addressarray)
                    {
                    ?>
                    <div class="row p-3">
                        <div class="col-md-12" style ="padding-left:35px;">
    						<label><strong>Address</strong></label>
    						<address> 
                          <b><?php echo $addressarray['name'];?></b> <b><?php echo $addressarray['phone'];?></b><br>
                            <?php echo $addressarray['address'];?> <br>
                            Zip Code : <?php echo $addressarray['zipcode'];?><br>
                            Latitude : <?php echo $addressarray['latitude'];?> <br>
                            Longitude : <?php echo $addressarray['longitude'];?>
                          </address>
                          <!--<button type="button" class="btn btn-link btn-icon"><i class="fa fa-pencil-square-o"></i> edit</button>-->
                          <a href="<?php echo base_url().'home/addmultiaddress/'.$addressarray['add_id']?>" class="" style ="color: #0a0a0a;" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>
                         
                          <!--<button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i> delete</button>-->
                          <a href="javascript:void(0)" href-add_id="<?php echo $addressarray['add_id']?>" class="text-danger btn_delete"  title="Delete"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete&nbsp;&nbsp;&nbsp;</a>
                          
                          


                          <?php if($addressarray['status'] == 1) { ?>
                              <a href="javascript:void(0)" href-add_id="<?php echo $addressarray['add_id']?>" class="remove_default_status " style ="color: #124b56;" href-status="0" ><i class="fa fa-toggle-on"></i>&nbsp;Default</a>
                          <?php  } ?>
                          <?php if($addressarray['status'] == 0) { ?>
                              <a href="javascript:void(0)" href-user_id ="<?php echo $addressarray['user_id'];?>" href-add_id="<?php echo $addressarray['add_id'];?>" class="reset_default" style ="color: #124b56;" href-status="1" ><i class="fa fa-toggle-off"></i>&nbsp;Set as Default</a>
                          <?php } ?>
                          
                          
    					</div>
                    </div>
                
                    <?php
                            }

                         ?>
               
                
                
                
   
			</div>
			<div class="row form-box bg-white mt-4">
	      		<div class="col-md-12 form-box-title px-3 py-2">
                    Change Password
                </div>
                <div class="col-md-12">
					 <form action="" method="post" id="changepwdform" enctype="multipart/form-data">
					 	<div class="row">
					 		
						    <div class="col-sm-6">
						      <label for="pwd">Current Password:</label>
						      <input type="password" class="form-control" placeholder="Enter Current password" name="current_password">
						      <!-- <input type="password" class="form-control" id="password" value="<?php echo (isset($password_data['password']) ? $password_data['password'] : '');?>" placeholder="Enter Current password" name="current_password"> -->
						    	
						    </div>
						    <div class="col-sm-6">
						      <label for="pwd">New Password:</label>
						      <input type="password" class="form-control"  placeholder="Enter New password" name="new_password">
						    </div>
						    <div class="col-sm-6">
						      <label for="pwd">Re-Enter New Password:</label>
						      <input type="password" class="form-control" placeholder="Enter New password" name="re_enter_password">
						    </div>
							<div class="col-sm-6" style="padding-top: 10px">
					    	<button type="button" class="btn btn-success pull-right" name="changepassword" id="changepassword" value="changepassword"> Update Password</button>
					    </div>
					    </div>
						
					   <!--  <button type="submit" class="btn btn-success pull-left">Change PassWord</button> -->
					  </form>
				</div>
			</div>
	  	</div>
  	</div>
</div>
<script src="<?php echo base_url();?>common_assets/editor/jodit.min.js"></script>

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

<script>
	
	$(document).on("click", "#changebasic", function(){
		var form = $("#basicinfoform")[0];
		// alert(form);
  		var data = new FormData(form);
  		// alert(data);
  		$("#basicinfoform #changebasic").attr('disabled', true);
		$("#basicinfoform #changebasic").addClass('buttonload'); 
		$("#basicinfoform #changebasic").html('<i class="fa fa-spinner fa-spin"></i>Loading');

		$.ajax({
		enctype: 'multipart/form-data',
		processData: false,  // Important!
		contentType: false,
		cache: false,
		type: "POST",
		dataType: "html",
		url: "<?php echo base_url()?>home/changebasicinfo",
		data:data,
		success : function(data){
		 	// alert(data);
		 	$.notify(data, "success");
		 	setTimeout(function(){ window.location.reload(); },1000);   
		 	$("#changebasic").removeAttr('disabled');
            $("#changebasic").removeClass('buttonload');
            $("#changebasic").html('Submit');
		},
		error: function(data) {
		//$(".detail_submit_btn").removeAttr('disabled');
		// $.notify("Oops something went wrong please try again", "error");
		// alert("error");
			$("#changebasic").removeAttr('disabled');
            $("#changebasic").removeClass('buttonload');
            $("#changebasic").html('Submit');
		},
		});
	});

	$(document).on("click", "#changeshipping", function(){
		var form = $("#shippinginfoform")[0];
		$("#shippinginfoform #changeshipping").attr('disabled', true);
		$("#shippinginfoform #changeshipping").addClass('buttonload'); 
		$("#shippinginfoform #changeshipping").html('<i class="fa fa-spinner fa-spin"></i>Loading');
		// alert(form);
  		var data = new FormData(form);
  		// alert(data);

		$.ajax({
		enctype: 'multipart/form-data',
		processData: false,  // Important!
		contentType: false,
		cache: false,
		type: "POST",
		dataType: "html",
		url: "<?php echo base_url()?>home/changeshippinginfo",
		data:data,
		success : function(data){
		 	// alert(data);
		 	$.notify(data, "success");
		 	setTimeout(function(){ window.location.reload(); },1000);
		 	$("#changeshipping").removeAttr('disabled');
            $("#changeshipping").removeClass('buttonload');
            $("#changeshipping").html('Submit');
		},
		error: function(data) {
		//$(".detail_submit_btn").removeAttr('disabled');
		// $.notify("Oops something went wrong please try again", "error");
		// alert("error");
			$("#changeshipping").removeAttr('disabled');
            $("#changeshipping").removeClass('buttonload');
            $("#changeshipping").html('Submit');
		},
		});
    });

	$(document).on("click", "#changepassword", function(){
		var form = $("#changepwdform")[0];
		$("#changepwdform #changepassword").attr('disabled', true);
		$("#changepwdform #changepassword").addClass('buttonload'); 
		$("#changepwdform #changepassword").html('<i class="fa fa-spinner fa-spin"></i>Loading');
		// alert(form);
  		var data = new FormData(form);
  		// alert(data);

		$.ajax({
		enctype: 'multipart/form-data',
		processData: false,  // Important!
		contentType: false,
		cache: false,
		type: "POST",
		dataType: "html",
		url: "<?php echo base_url()?>home/changepwdinfo",
		data:data,
		success : function(data){
		 	//alert(data);
		 	$.notify(data, "success");
		 	setTimeout(function(){ window.location.reload(); },1000);
		 	$("#changepassword").removeAttr('disabled');
            $("#changepassword").removeClass('buttonload');
            $("#changepassword").html('Submit');
		},
		error: function(data) {
		//$(".detail_submit_btn").removeAttr('disabled');
		// $.notify("Oops something went wrong please try again", "error");
		// alert("error");
			$("#changepassword").removeAttr('disabled');
            $("#changepassword").removeClass('buttonload');
            $("#changepassword").html('Submit');
		},
		});
     });
     
     $(document).on("click", "#maddress", function(){
		var form = $("#multi_addressform")[0];
		// 		alert(form);
  		var data = new FormData(form);
  		// alert(data);
  		$("#multi_addressform #maddress").attr('disabled', true);
		$("#multi_addressform #maddress").addClass('buttonload'); 
		$("#multi_addressform #maddress").html('<i class="fa fa-spinner fa-spin"></i>Loading');

		$.ajax({
		enctype: 'multipart/form-data',
		processData: false,  // Important!
		contentType: false,
		cache: false,
		type: "POST",
		dataType: "html",
		url: "<?php echo base_url()?>home/profile",
		data:data,
		success : function(data){
		 	// alert(data);
		 	$.notify(data, "success");
		 	// setTimeout(function(){ window.location.reload(); },1000);   
		 	$("#maddress").removeAttr('disabled');
            $("#maddress").removeClass('buttonload');
            $("#maddress").html('Submit');
		},
		error: function(data) {
		//$(".detail_submit_btn").removeAttr('disabled');
		// $.notify("Oops something went wrong please try again", "error");
		// alert("error");
			$("#maddress").removeAttr('disabled');
            $("#maddress").removeClass('buttonload');
            $("#maddress").html('Submit');
		},
		});
	});
    
</script>

<script>
    function delete_row(em){
		$(em).closest('.row').remove();
	}

    var i = $('input[name="address[]"').last().val();
	// alert(i);
    if(isNaN(i)){
		i =0;
	}
	function add_more_address(){   
		i++ ;
		$('#address_choice_options').append('<div class="row form-box-content p-3"><div class="col-sm-12 col-md-9"><label>Address</label><input type="hidden" name="address[]" value="'+i+'"><input type="text" class="form-control" name="address[]" value="" placeholder="Enter Your Address"></div><div class="col-sm-12 col-md-3"><label>PIN CODE</label><input type="text" class="form-control tagsInput" name="zipcode[]'+i+'" placeholder="Enter PIN CODE" onchange="update_sku()"></div><div class="col-sm-12 col-md-6"><label>Latitude</label><input type="text" class="form-control" name="latitude[]'+i+'" value="" placeholder="Enter Your Latitude"></div><div class="col-sm-12 col-md-6"><label>Longitude</label><input type="text" class="form-control" name="longitude[]'+i+'" value="" placeholder="Enter Your Longitude"></div><div class="col-sm-12 col-md-12"><button type="button" class="btn btn-success pull-right" name="maddress" id="maddress" value="">Submit</button></div><div class="col-sm-12 col-md-6"><button type="button" onclick="delete_row(this)" class="btn btn-link btn-icon text-danger"><i class="fa fa-trash-o"></i></button></div><div class="col-sm-12 col-md-6"><button type="button" href-id="<?php echo $multiple_address_data['id']?>" href-act="Delete" class="btn btn-danger pull-right btn_delete" title="Delete User"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;DELETE</button></div>');
		
        
	}

</script>