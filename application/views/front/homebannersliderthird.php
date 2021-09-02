<section>
	<div class="">
          <div class="waqar-7 owl-carousel owl-theme owl-responsive">
            <?php 
            $whrct = array('status'=>1);
            $homebannersliderthird = $this->Common_model->GetWhere('homebannersliderthird', $whrct);
            if(isset($homebannersliderthird) && !empty($homebannersliderthird)){ 
                foreach ($homebannersliderthird as $homebannersliderthirddata) {
            ?>
                  <div class="item">
                    <div class="column1">
                      <div class="ad-img-bx">
                        <img src="<?php echo base_url().'uploads/homebannersliderthird/'.$homebannersliderthirddata['image']; ?>" class="img-fluid">
                      </div>
                    </div>
                  </div>
            <?php } } ?>
            <!-- <div class="item">
              <div class="column1">
				<div class="ad-img-bx">
					<img src="front_assets/images/gift2.jpg" class="img-fluid">
				</div>
              </div>
            </div>
            <div class="item">
              <div class="column1">
				<div class="ad-img-bx">
					<img src="front_assets/images/gift.jpg" class="img-fluid">
				</div>
              </div>
            </div>
            <div class="item">
              <div class="column1">
				<div class="ad-img-bx">
					<img src="front_assets/images/gift3.jpg" class="img-fluid">
				</div>
              </div>
            </div> -->
          </div>          
        </div>
</section>