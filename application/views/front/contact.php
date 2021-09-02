<section>
	<div class="container-fluid" style="padding-left: 0!important; padding-right: 0!important;">
		<div class="col-lg-12" style="padding-left: 0!important; padding-right: 0!important;">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14721.963391078383!2d75.8766191!3d22.7099903!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xde0646c82299c250!2sIT%20Spark%20Technology!5e0!3m2!1sen!2sin!4v1572331542162!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
	</div>
</section>	
<!-- <map start>-->
<!-- <address detail sec start> -->
<section>
	<div class="container pt-3 pb-5">
		<!-- <div class="row">
			<h3><strong style="font-weight: 600;">Contact us</strong></h3>
		</div> -->
		<div class="row">
			<div class="col-lg-6">
				<h3><strong style="font-weight: 600;">Contact us</strong></h3>
				<div class="address-left">
					<p> Enormous is not just about  design; it's more than that. We offer   integral communication services, and we're responsible for our process and   results. We thank each client and their projects.</p>
					<div class="row pt-3">
						<div class="col-lg-6">
							<div class="location">
								<div class="location_main">
									<!-- <div class="icon_v"> -->
										<i class="fa fa-map-marker"></i>
									<!-- </div> -->
									<h5><strong>Our Address</strong></h5>
								</div>
								<p>Flat No. 102 , Ankita Apartment, Scheme No. 114 Part -1 INDORE Madhya Pradesh India : 452011
								</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="location">
								<div class="location_main">
									<!-- <div class="icon_v"> -->
										<i class="fa fa-phone"></i>
									<!-- </div> -->
									
									<h5><strong>Our phone</strong></h5>
								</div>
								<h6>0731-4999125
								</h6>
							</div>
						</div>
					</div>
					<div class="row pt-3">
						<div class="col-lg-6">
							<div class="location">
								<div class="location_main">
									<!-- <div class="icon_v"> -->
										<i class="fa fa-envelope"></i>
									<!-- </div> -->
									<h5><strong>Our Email</strong></h5>
								</div>
								<p>info@multivender.com
								</p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="location">
								<div class="location_main">
									<!-- <div class="icon_v"> -->
										<i class="fa fa-comments-o"></i>
									<!-- </div> -->
									<h5><strong>Our Support</strong></h5>
								</div>
								<h6>Support Ticket
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<form action="" method="post" id="contactinfoform" enctype="multipart/form-data">
				<div class="contact_form">
					<div class="row row11">
						<div class="col-lg-12">
						  <div class="form-group">
						  	<label for="comment">Name:</label>
						    <input type="text" class="form-control" placeholder="Enter your name.." name="name" id="ename" required>
						  </div>
					    </div>
					</div>
					<div class="row">
						<div class="col-lg-6">
						  <div class="form-group">
						  	<label for="comment">Email:</label>
						    <input type="email" class="form-control" placeholder="Email.." name="email" id="eemail" required>
						  </div>
					    </div>
					    <div class="col-lg-6">
						  <div class="form-group">
						  	<label for="comment">Phone:</label>
						    <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="Phone.." name="number" id="enumber" required pattern="[0-9.]{10}">
						  </div>
					  </div>
					</div>
					
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
							  <label for="comment">Comment:</label>
							  <textarea class="form-control" placeholder="MESSAGE." rows="4" name="message" id="emessage" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<button type="button" name="contact" id="contact" value="contact" class="btn btn-default contact" style="width: 100%;background-color: #124b56!important; margin: 0!important;">Send Message</button>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
		                    <span id="msg"></span>
		                </div>
	                </div>
				</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).on("click", ".contact", function() {
    	//   console.log("inside";   <-- here it is
        // alert("inside");
        $(".contact").attr('disabled', true);
        $(".contact").addClass('buttonload'); 
        $(".contact").html('<i class="fa fa-spinner fa-spin"></i>Loading');
       
        var ename = $("#ename").val();
        var eemail = $("#eemail").val();
        var enumber = $("#enumber").val();
        var emessage = $("#emessage").val();
        // if(ename && eemail){

	        $.ajax({
	            type: 'POST',
	            url:"<?php echo base_url()?>home/contactinfo",
	            data:{name:ename,email:eemail,number:enumber,message:emessage},
	            dataType: 'json',
	            success : function(data)
	            {
	            	// alert(data); 
	              if(data.status==1){
	                // notify('success',data.msg,'Success');
	                $(".contact").notify(data.msg,'success');
	                $(".contact").removeAttr('disabled');
                    $(".contact").removeClass('buttonload');
                    $(".contact").html('Submit');

                 	$("#ename").val('');
			      	$("#eemail").val('');
			       	$("#enumber").val('');
			        $("#emessage").val('');
	                // $("#contactform").reset();
	                // $("#msg").html(data.msg);
	                // window.location.href = "<?php echo base_url()?>contactus";
	                // setTimeout(function(){ window.location.reload(); },1000);    
	              }
	              if(data.status==0){
	              	$(".contact").removeAttr('disabled');
                    $(".contact").removeClass('buttonload');
                    $(".contact").html('Submit');
	                 //$("#emsg").html(data.msg);
	                 // notify('error',data.msg,'Success');
	                 $(".contact").notify(data.msg,'error');
	                 $.notify({
                        icon: 'ti-gift',
                        message: data.msg
                    	},{type: 'success',timer: 1000});
	              } //   console.log("inside";
	                // alert(data); 
	            },
	            error: function(data) 
	            {
	            	$(".contact").removeAttr('disabled');
                    $(".contact").removeClass('buttonload');
                    $(".contact").html('Submit');
	            },
	        });
     //    }else{
     //    $(".contact").notify("Email and name are required ",'error');
    	// }
	});
</script>