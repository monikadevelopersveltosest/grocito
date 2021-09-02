<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="sec">
			<?php $spdata = $this->session->userdata('cart');
			$s = array();
				// print_r($spdata)
			?>
			<h5>My Cart (<?php echo (isset($spdata) && !empty($spdata) ? count($spdata) : 0); ?>items)</h5>
			<i class="fa fa-close popup-none close_btn"></i>
		</div>
		<div style="overflow-y: scroll; max-height: 278px; padding: 5px;">
			<?php if(isset($spdata) && !empty($spdata)){ 
					$pi = 0;
			?>
				<?php foreach($spdata as $key=>$spdataarray){ ?>
					<div class="sec1">
						<div class="cart-img1">
							<img src="<?php echo base_url()?>uploads/product_images/<?php echo $spdataarray['main_image'];?>" class="img-fluid ">
						</div>
					    
					     <div class="sec1-text">
					        <a href=""><span style=""><?php echo $spdataarray['name'];?></span></a>
					        <a href=""><span style=""><?php echo $spdataarray['quantity'] .'*'. $spdataarray['price']; ?></span></a>
					    </div>
					    <div class="price-close-btn pull-right">
					    	<p>
					    		<span><?php echo $spdataarray['subtotal_price']; ?></span>
					    		<a href="javascript:void(0)" class="remove_cart_product" href-pindex="<?php echo $key; ?>" ><i class="fa fa-close " ></i></a>
					    	</p>
					    </div>
					</div>
				<?php $s[] = $spdataarray['subtotal_price']; 
					  $pi++; 
					} 
				?>
			<?php } ?>
			
		</div>
		<div class="sec5 p-3">
			<span style="padding-left: 10px;"><strong>TOTAL</strong></span>
			<h6 style="float: right; padding-right: 35px;"><span>Rs . <?php echo array_sum($s);?></span></h6>
		</div>
		<div class="sec4 text-center">
			<!-- <button type="button" class="btn btn-default d2 ml-3">Checkout</button> -->
			
			<?php 
			    if(isset($spdata) && !empty($spdata)){
			?>
			<a href="<?php echo base_url().'cart';?>" class="btn btn-default d2 ml-3">Checkout</a>
			<?php }else{ ?>
			<div class="btn btn-default d2 ml-3">Checkout</div>
			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.remove_cart_product').click(function(e){
		var pindex = $(this).attr('href-pindex');
		// alert(pindex);
		$.ajax({
           type:"POST",
           url: '<?php echo base_url();?>home/removeCartProduct',
           data: {pindex:pindex},
           success: function(data){
               // $('#addToCart-modal-body').html(null);
               // $('.c-preloader').hide();
               // $('#modal-size').removeClass('modal-lg');
               // $('#addToCart-modal-body').html(data);
               updateNavCart();
               // $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);
           }
       });
	});

	function updateNavCart(){
	    $.post('<?php echo base_url()?>home/updateNavCart','', function(data){
	        $('#cart_items').html(data);
	    });
	    $.post('<?php echo base_url()?>home/cartcount','', function(data){
	    	$(".cartcount").text(data);
	    });
	}
	$(".close_btn").click(function(){
	   $(".ddd").css("display", "none");
	});
	$(".cart").click(function(){
	   $(".ddd").css("display", "block");
	});
</script>