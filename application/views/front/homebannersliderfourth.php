<section class="above_cl" style="padding-bottom: 9px;">
	<div class="">
          <div class="waqar-11 owl-carousel owl-theme owl-responsive">
            <?php 
            $whrcs = array('status'=>1);
            $homebannersliderfourth = $this->Common_model->GetWhere('homebannersliderfourth', $whrcs);
            if(isset($homebannersliderfourth) && !empty($homebannersliderfourth)){ 
                foreach ($homebannersliderfourth as $homebannersliderfourthdata) {
            ?>
                  <div class="item">
                    <div class="column1">
                      <div class="ad-img-bx">
                        <img src="<?php echo base_url().'uploads/homebannersliderfourth/'.$homebannersliderfourthdata['image']; ?>" class="img-fluid">
                      </div>
                    </div>
                  </div>
            <?php } } ?>
            <!-- <div class="item">
              <div class="column1">
				<div class="ad-img-bx">
					<img src="front_assets/images/per.png" class="img-fluid">
				</div>
              </div>
            </div>
            <div class="item">
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