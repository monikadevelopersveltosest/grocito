
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
// 	$info_data = customerdata(customersessionid());
	// $shipping_data = customerdata(customersessionid());
	// $password_data = customerdata(customersessionid());
// 	 $multiple_address_data = $this->Common_model->getsingledata('multiple_address',array('user_id' => customersessionid()));
?>
<div class="container-fluid pt-10 bgp">
  	<div class="row content m-10">
    	<?php include('dashboardsidebar.php'); ?>
	    <div class="col-sm-12 col-lg-9">
	      <!-- dashboard box start -->
	      	

	      	<div class="row form-box bg-white mt-12">
	      		<div class="col-md-12 form-box-title px-3 py-2">
                    Shipping info
                </div>
               
               
               
                
                
                
                <form action="" method="post" id="multi_addressform" enctype="multipart/form-data">
                <div id="address_choice_options">
                	<div class="row form-box-content p-3">
                        <div class="col-sm-12 col-md-3">

                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo (isset($multiple_address_data['name']) ? $multiple_address_data['name']: ''); ?>" placeholder="Enter Your Name" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo (isset($multiple_address_data['email']) ? $multiple_address_data['email'] : ''); ?>" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group has-feedback">
                                <label class="control-label">Phone</label>
                                <input type="number" min="0" class="form-control" placeholder="Phone" name="phone" value="<?php echo (isset($multiple_address_data['phone']) ? $multiple_address_data['phone'] : ''); ?>" >
                            </div>
                        </div>
						<div class="col-sm-12 col-md-9">
							<label>Address</label>
							<!--<input type="hidden" name="choice_no[]" value="<?php echo explode('_', $choice_option['name'])[1]; ?>">-->
							<input type="hidden" name="addressm" value="">
							<input type="hidden" name="add_id" value="<?php echo (isset($multiple_address_data['add_id']) && !empty($multiple_address_data['add_id']) ? $multiple_address_data['add_id'] : '' )?>">
							<input type="text" class="form-control" id="addressm" value="<?php echo (isset($multiple_address_data['address']) ? $multiple_address_data['address'] : '');?>" placeholder="Enter Your Address" name="addressm">
						</div>
						<div class="col-sm-12 col-md-3">
							<label>PIN CODE</label>
							<input type="hidden" name="zipcode" value="">
							<input type="text" class="form-control" id="pin_codem" value="<?php echo (isset($multiple_address_data['zipcode']) ? $multiple_address_data['zipcode'] : '');?>" placeholder="Enter PIN CODE" name="pin_codem">
						</div>
						<div class="col-sm-12 col-md-6">
							<label>Latitude</label>
							<input type="hidden" name="latitude" value="">
							<input type="text" class="form-control" id="latitudem" value="<?php echo (isset($multiple_address_data['latitude']) ? $multiple_address_data['latitude'] : '');?>" placeholder="Enter Latitude" name="latitudem">
						</div>
						<div class="col-sm-12 col-md-6">
							<label>Longitude</label>
							<input type="hidden" name="longitude" value="">
							<input type="text" class="form-control" id="longitudem" value="<?php echo (isset($multiple_address_data['longitude']) ? $multiple_address_data['longitude'] : '');?>" placeholder="Enter Longitude" name="longitudem">
						</div>
						<!--<div class="col-sm-12" style="padding-top: 10px"> -->
						<!--    <button type="button" class="btn btn-success pull-right" name="changeshipping" id="changeshipping" value="changeshipping">Submit</button>-->
						<!--</div>-->
						<div class="col-sm-12" style="padding-top: 10px"> 
						    <button type="button" class="btn btn-success pull-right" name="maddress" id="maddress" value="">Submit</button>
						</div>
					</div>	
				</div>
                
				
				
				
			</div>
			
	  	</div>
  	</div>
</div>
<script src="<?php echo base_url();?>common_assets/editor/jodit.min.js"></script>
<script>
	
     
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
		url: "<?php echo base_url()?>home/addmultiaddress",
		data:data,
		success : function(data){
		 	// alert(data);
		 	$.notify(data, "success");
		 	// setTimeout(function(){ window.location.reload(); },1000); 
		 	setTimeout(function(){ window.location.href = base_url+"profile"; }, 3000);
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
</script>

