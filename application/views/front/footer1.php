<?php  $session_userdata = $this->session->userdata(USER_SESSION); ?>
<!-- <foooter section start> -->
			<footer style="color: white;">
				<div class="container">
					<div class="row pt-20">
						<div class="col-lg-2">
							<div class="footer-main f">
								<h4>Menu</h4>
								<ul>
									<li><a href="<?php echo base_url(); ?>">Home</a></li>
									<li><a href="<?php echo base_url(); ?>aboutus">About Us</a></li>
									<li><a href="<?php echo base_url(); ?>shops">shops</a></li>
									<li><a href="<?php echo base_url(); ?>clearance_product">Clearance Product</a></li>
									<li><a href="<?php echo base_url(); ?>privacy_policy">Privacy Policy</a></li>
									<li><a href="<?php echo base_url(); ?>terms_condition">Terms & condition</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="footer-main f">
								<h4>Merchant Central</h4>
								<ul>
									<li><a href="<?php echo base_url(); ?>home/sell_on_indocliq">Sell on Indocliq</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="footer-main2 f">
								<h4>Help</h4>
								<ul>
									<!-- <li><a href="#">Faqs</a></li> -->
									<li><a href="<?php echo base_url(); ?>contact"><i class="fa fa-phone"></i> &nbsp;&nbsp;Contact Us</a></li>
									<?php if(isset($session_userdata) && !empty($session_userdata)){ ?>
									<li><a href="<?php echo base_url().'support_ticket';?>"><i class="fa fa-support"></i> &nbsp;&nbsp;Support</a></li>
									<?php } ?>
									<!-- <li><a href="#">bb Wallet Faqs</a></li>
									<li><a href="#">bb wallet t&Cs</a></li>
									<li><a href="#">Vender Connect</a></li> -->
								</ul>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="footer-main3 f">
								<h4>Contact Us</h4>
								<div class="main-t">
									<i class="fa fa-phone"></i>
									<div class="f-number">
										99xxxxxx72, 94xxxxxx58
									</div>
								</div>
								<div class="main-t">
									<i class="fa fa-envelope"></i>
									<div class="f-number">
										info@eshop.com
									</div>
								</div>
								<div class="main-t">
									<i class="fa fa-map-marker"></i>
									<div class="f-number">
										160/4, Piplia Rao, Vishnupuri i-Bus Stop, Bhanwarkua,    Indore (M.P.)
									</div>
								</div>
								<div class="main-t">
									<i class="fa fa-clock-o"></i>
									<div class="f-number">
										Opening Hours
										Mon-Sat:8:00AM-8:00PM
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="footer-main4 f" style="display: inline-block;">
								<h4>Get Social With Us</h4>
								<div class="f1">
									<i class="fa fa-facebook"></i>
								</div>
								<div class="f1">
									<i class="fa fa-google"></i>
								</div>
							</div>
							<div class="payment">
								<h5>Payment Option</h5>
								<img src="front_assets/images/visa.png">
								<img src="front_assets/images/mesto1.png">
								<img src="front_assets/images/paytm.png">
							</div>
						</div>
					</div>
				</div>
			</footer>
		<!-- <foooter section end> -->
	<!-- <bottom section start> -->
			<section class="copyright">
				<div class="container">
					<div class="bottom-s text-center">
						<p>© Copyright 2019. All Rights Reserved. by <a href="https://itsparktechnology.com/"> It Spark Technology</a></p>
					</div>
				</div>
			</section>
	<!-- <bottom section end> -->
		</div>
		
	<script src="<?php echo base_url();?>common_assets/notify/notify.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>front_assets/js/commonjsnirbhay.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>front_assets/css/mdb.min.js"></script>
		<!-- <md bootstrap end> -->
	<script type="text/javascript" src="<?php echo base_url();?>front_assets/js/slider.js"></script>
	<!-- <slider js end> -->
	<script type="text/javascript" src="<?php echo base_url();?>front_assets/js/owl.carousel.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>front_assets/js/jquery.flexslider.js"></script>
	<script>
	    showPosition();
	    function showPosition() {
	        if(navigator.geolocation) {
	            navigator.geolocation.getCurrentPosition(showMap, showError);
	        } else {
	            alert("Sorry, your browser does not support HTML5 geolocation.");
	        }
	    }
	     
	    // Define callback function for successful attempt
	    function showMap(position) {
	        // Get location data
	        lat = position.coords.latitude;
	        long = position.coords.longitude;
	        $("#latitude").val(lat);
	        $("#longitude").val(long);
	        var latlong = new google.maps.LatLng(lat, long);
	        
	        var myOptions = {
	            center: latlong,
	            zoom: 16,
	            mapTypeControl: true,
	            navigationControlOptions: {
	                style:google.maps.NavigationControlStyle.SMALL
	            }
	        }
	        
	        var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
	        var marker = new google.maps.Marker({ position:latlong, map:map, title:"You are here!" });
	    }
	     
	    // Define callback function for failed attempt
	    function showError(error) {
	        if(error.code == 1) {
	            // result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
	        } else if(error.code == 2) {
	            // result.innerHTML = "The network is down or the positioning service can't be reached.";
	        } else if(error.code == 3) {
	            // result.innerHTML = "The attempt timed out before it could get the location data.";
	        } else {
	            // result.innerHTML = "Geolocation failed due to unknown error.";
	        }
	    }

	    $(".loginModal").click(function(){

	    	var clickbutton = $(this).attr('href-btntype');
	    	//alert(clickbutton);
	    	$(".clickbutton").val(clickbutton);
	    })
	</script>
</body>

</html>