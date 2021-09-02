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
							<a href="<?php echo base_url().'shops?categories_id='.$allcategoriesdata['category_name']; ?>" >
								<?php  echo (!empty($allcategoriesdata['category_image'])?'<img style="height:38px;" src='.base_url().'uploads/category/'.$allcategoriesdata['category_image'].' class="img-fluid menu-img">':'none'); ?>
								<!-- <img src="front_assets/images/slider1/1.jpg" class="img-fluid menu-img"> -->
								<span class="<?php echo (isset($_GET['categories_id']) && $_GET['categories_id'] == $allcategoriesdata['category_name'] ? 'activecolors' : ''); ?>"><?php echo $allcategoriesdata['category_name']?></span>
							</a>
						</li>
					<?php } } ?>
						<!-- <li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/2.jpg" class="img-fluid menu-img">
								<span >Womens</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/3.jpg" class="img-fluid menu-img">
								<span >Kids</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/4.jpg" class="img-fluid menu-img">
								<span >Furniture</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/5.jpg" class="img-fluid menu-img">
								<span >Hardware's</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/6.jpg" class="img-fluid menu-img">
								<span >Gifts</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/7.jpg" class="img-fluid menu-img">
								<span >Goggles</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/8.jpg" class="img-fluid menu-img">
								<span >Deo's</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/9.jpg" class="img-fluid menu-img">
								<span >Watches</span>
							</a>
						</li>
						<li class="slide text-center">
							<a href="#">
								<img src="front_assets/images/slider1/10.jpg" class="img-fluid menu-img">
								<span >Necklace's</span>
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
    </div>
</section>