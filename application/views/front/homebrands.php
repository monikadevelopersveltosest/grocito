<section class="featured-section2">
	<div class="col-lg-12">
          <div class="waqar-4 owl-carousel owl-theme owl-responsive">
            <?php 
              $categorydata = $this->Common_model->getWhereData('brand_logo',array(1=>1));
              if(isset($categorydata) && !empty($categorydata))
              {
              foreach ($categorydata as $categoryarray)
                  {                               
              ?>
              <div class="item">
                <div class="column4">
  	              	<img src="<?php echo base_url().'uploads/brand_image/'.$categoryarray['image']; ?>" class=" img4 img-fluid">
                </div>
              </div>
              <?php    
              }

              }
              ?>
          </div>          
    </div>
</section>