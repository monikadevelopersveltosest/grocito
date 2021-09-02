<section class="f-aftr-ad">
	<div class="">
          <div class="waqar-6 owl-carousel owl-theme owl-responsive">
            <?php 
            $whrcs = array('status'=>1);
            $homebannerslidersec = $this->Common_model->GetWhere('homebannerslidersec', $whrcs);
            if(isset($homebannerslidersec) && !empty($homebannerslidersec)){ 
                foreach ($homebannerslidersec as $homebannerslidersecdata) {
            ?>
                  <div class="item">
                    <div class="column1">
              				<div class="ad-img-bx">
              					<img src="<?php echo base_url().'uploads/homebannerslidersec/'.$homebannerslidersecdata['image']; ?>" class="img-fluid">
              				</div>
                    </div>
                  </div>
            <?php } } ?>
                  <!-- <div class="item">
                    <div class="column1">
      				<div class="ad-img-bx">
      					<img src="front_assets/images/bag.png" class="img-fluid">
      				</div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="column1">
      				<div class="ad-img-bx">
      					<img src="front_assets/images/ibl.png" class="img-fluid">
      				</div>
                    </div>
                  </div> -->
          </div>          
        </div>
</section>