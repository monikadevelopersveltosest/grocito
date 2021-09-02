<section>
	<div class="">
      <div class="waqar-5 owl-carousel owl-theme owl-responsive">
        <?php 
            $whrc = array('status'=>1);
            $homebannerslider = $this->Common_model->GetWhere('homebannerslider', $whrc);
            if(isset($homebannerslider) && !empty($homebannerslider)){ 
                foreach ($homebannerslider as $homebannersliderdata) {
            ?>
            <div class="item">
              <div class="column1">
          			<div class="ad-img-bx">
          				<img src="<?php echo base_url().'uploads/homebannerslider/'.$homebannersliderdata['image']; ?>" class="img-fluid">
          			</div>
              </div>
            </div>
          <?php } }?>
        <!-- <div class="item">
          <div class="column1">
			<div class="ad-img-bx">
				<img src="front_assets/images/kit.png" class="img-fluid">
			</div>
          </div>
        </div>
        <div class="item">
          <div class="column1">
			<div class="ad-img-bx">
				<img src="front_assets/images/nik.png" class="img-fluid">
			</div>
          </div>
        </div>
        <div class="item">
          <div class="column1">
          		<div class="ad-img-bx">
				<img src="front_assets/images/blb.png" class="img-fluid">
			</div>
          </div>
        </div>
        <div class="item">
          <div class="column1">
          		<div class="ad-img-bx">
				<img src="front_assets/images/kit.png" class="img-fluid">
			</div>
          </div>
        </div> -->
      </div>          
    </div>
</section>