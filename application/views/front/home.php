    
<!-- <modal popup start> -->

<div id="myModals" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content" style="background-color: #fff0; border: none;">
        	<!-- <div class="modal-header"> -->
	            <div class="modal-body" style="padding: 0px;">

	            	<?php 
				    $whrc = array('status'=>1);
				    $homepopupimage = $this->Common_model->GetWhere('homepopupimage', $whrc);
				    if(isset($homepopupimage) && !empty($homepopupimage)){ 
				        foreach ($homepopupimage as $homepopupimagedata) {
				    ?>
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="col-md-12" style="padding: 0px;">
	                              <img src="<?php echo base_url().'uploads/homepopupimage/'.$homepopupimagedata['image']; ?>" style="width:100%" class="img-responsive modalimg" alt="">
	                        </div>
	                    </div>
	                    <div class="col-md-12" style="padding-left: 22px;" align="center">
	                        <a href="<?php echo $homepopupimagedata['link']; ?>"><button type="submit" class="btn btn-primary" style="background:#124b56;">Go for Sale !</button></a>

	                    	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	                    </div>     
	                </div>
	                <?php } }?>

	            </div>
	        <!-- </div>     -->
        </div>

    </div>

</div>

<!-- <modal end> -->


	<!-- <cart inner section end> -->
	<!-- <menu start> -->
	<?php include('categoryslider.php');?>
    <!-- <menu end> -->
    	<!-- featured product -->
		
	<?php include('homebannerslider.php'); ?>
		<!-- featured product end -->
		<!-- featured product -->
		
	<?php include('homefeatured.php'); ?>
		<!-- featured product end -->
		<!-- featured product -->
	<?php include('homebannerslidersec.php'); ?>
		<!-- featured product end -->
	<?php include('homebestsellers.php'); ?>
	<!-- <best seller section 3images slider end> -->
		<!-- featured product -->
		
	<?php include('homebannersliderthird.php'); ?>
		<!-- featured product end -->
		<!-- treanding prodctus start -->
		
	<?php include('hometrendingproducts.php'); ?>
		<!-- treanding prodctus ends -->
		<!-- featured product -->
	<?php include('homebannersliderfourth.php'); ?>
		
		<!-- featured product end -->
		<!-- vertical ad end -->
		<!-- <client slider start> -->
	<?php include('homehappycustomers.php');?>	
		<!-- <client slider end> -->
		<!-- <slider4 start> -->
	<?php include('homebrands.php');?>
	
	
	<script type="text/javascript">
		$(window).on('load',function(){
          $('#myModals').modal('show');
        });
	</script>