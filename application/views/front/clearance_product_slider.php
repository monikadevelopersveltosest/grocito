<section>
    <div class="">
		<div class="">
			<div class="col-lg-12" style="padding: 0px">
				<div class="menus m-1">
					<?php 
						$whrc = array('status'=>1,'parent_category_id'=>0);
						$allcategories = $this->Common_model->GetWhere('categories', $whrc);
					?>
					<ul class="customer-logos slider mb-0" style="padding-left: 0px;">
						<?php if(isset($allcategories) && !empty($allcategories)){ 
								foreach ($allcategories as $allcategoriesdata) {
						?>
						<li class="slide text-center">
							<a href="<?php echo base_url().'clearance_product?categories_id='.$allcategoriesdata['category_name']; ?>" >
							    <!--<?php echo base_url().'shops?categories_id='.$allcategoriesdata['category_id']; ?>-->
								<?php  echo (!empty($allcategoriesdata['category_image'])?'<img style="height:38px;" src='.base_url().'uploads/category/'.$allcategoriesdata['category_image'].' class="img-fluid menu-img">':'none'); ?>
								<!-- <img src="front_assets/images/slider1/1.jpg" class="img-fluid menu-img"> -->
								<span class="<?php echo (isset($_GET['categories_id']) && $_GET['categories_id'] == $allcategoriesdata['category_name'] ? 'activecolors' : ''); ?>"><?php echo $allcategoriesdata['category_name']?></span>
							</a>
						</li>
					<?php } } ?>
					
					</ul>
				</div>
			</div>
		</div>
    </div>
</section>