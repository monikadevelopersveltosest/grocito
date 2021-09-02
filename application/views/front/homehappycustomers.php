<section id="demos" style="background-image: url(front_assets/images/parraback.jpg); padding: 0px 0px 0px 0; background-position: center;background-size: cover; background-attachment: fixed; ">
	    <div class="paralex-img" style="background-color: rgba(18, 75, 86, 0.82); padding: 20px 0px 20px 0px;">
			<div class="container-fluid">
			    <div class="row">
			        <div class="col-lg-8 offset-lg-2">
			        	<center class="c1">
			        		<h2>Happy Customer</h2>
			        	</center>
			            <div class="waqar-3 owl-carousel owl-theme">
				            <?php 
		                    $categorydata = $this->Common_model->getWhereData('testimonial',array(1=>1));
		                    if(isset($categorydata) && !empty($categorydata))
		                    {
		                    foreach ($categorydata as $categoryarray)
		                        {                               
		                    ?> 
		                    <div class="item item3">
				              <div class="column21 text-center">
					              	<img src="<?php echo base_url().'uploads/testimonial_image/'.$categoryarray['image']; ?>" class="img-fluid rounded-circle client-img">
					              	<h3><?php echo $categoryarray["name"]?></h3>
					              	<p><?php echo $categoryarray["description"]?></p>
					              	<div class="arow-down"></div>
				              </div>
				            </div>
				            <?php    
		                    }

		                    }
		                    ?> 
			            </div>
			        </div>          
			    </div>
		    </div>
	    </div>
</section>