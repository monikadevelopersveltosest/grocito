<style type="text/css">
	.sidebar--style-3 {
	    background: #fcfcfc;
	    border: 1px solid #f1f1f1;
	    /* border-radius: 0.25rem; */
	    padding: 2rem !important;
	}
	.widget-profile-box .image {
	    height: 80px;
	    width: 80px;
	    margin: 0 auto;
	    border-radius: 50%;
	    border: 5px solid #eeeeee;
	    background-size: cover;
	    background-repeat: no-repeat;
	    background-position: center;
	}
	.widget-profile-box .name {
	    font-size: 16px;
	    font-weight: 600;
	    margin-top: 12px;
	}
	.sidebar-widget-title {
	    position: relative;
	}
	.sidebar-widget-title:before {
	    content: "";
	    width: 100%;
	    height: 1px;
	    background: #eee;
	    position: absolute;
	    left: 0;
	    right: 0;
	    top: 50%;
	}
	.sidebar-widget-title span {
	    background: #fff;
	    text-transform: uppercase;
	    font-size: 11px;
	    font-weight: 600;
	    letter-spacing: 0.2em;
	    position: relative;
	    padding: 8px;
	    color: #dadada;
	}
	ul.categories {
	    padding: 0;
	    margin: 0;
	    list-style: none;
	}
	ul.categories--style-3 > li {
	    border: 0;
	}
	.widget-profile-menu a.active {
	    background: #f3f3f3;
	    border-left: 3px solid transparent;
	}
	ul.categories--style-3 > li > a {
	    display: block;
	    padding: 0.625rem 1rem;
	}
	ul.categories > li > a {
	    display: block;
	    padding: 0.75rem 0;
	    color: #818a91;
	    font-size: 0.875rem;
	    font-family: "Open Sans", sans-serif;
	}
	.widget-profile-menu a {
	    padding: 0.55rem 1.2rem!important;
	    font-size: 13px!important;
	    font-weight: 500 !important;
	    color: #777 !important;
	    border-left: 3px solid transparent;
	    border-radius: 0 !important;
	}
	a, a:hover {
	    transition: all 0.3s;
	    -webkit-transition: all 0.3s;
	    -moz-transition: all 0.3s;
	}
	.pace .pace-progress, .widget-profile-menu a:hover {
	    background: #124b56 !important;
	    color: #fff !important;
	}
	.widget-profile-menu a.active{
		border-color: #124b56;
	}
	.widget-profile-menu a i {
	    opacity: 0.6;
	    font-size: 13px!important;
	    top: 0!important;
	    width: 18px;
	    height: 18px;
	    text-align: center;
	    line-height: 18px;
	    display: inline-block;
	    margin-right: 0.5rem !important;
	}
</style>
<?php 
	$info_data = customerdata(customersessionid());
?>
<div class="col-lg-3 d-none d-lg-block">
    <div class="sidebar--style-3 no-border stickyfill p-0" style="background-color: #fff">
	    <div class="widget mb-0">
	        <div class="widget-profile-box text-center p-3">
	           <div class="image" >
		           <?php if(!empty($info_data["image"])){ ?>
						<img src="<?php echo base_url().'uploads/customerprofilepic/'.$info_data['image']?>" height="55" width="54" style="padding-top: 9px"> 
					<?php }else{ ?>
						<img src="<?php echo base_url(); ?>front_assets/images/icon/defaultuserimg.jpg" height="55" width="54" style="padding-top: 9px"> 
					<?php } ?>
				</div>		
	            <div class="name"><?php echo $info_data["first_name"]?> <?php echo $info_data["last_name"]?></div>
	        </div>
	        <div class="sidebar-widget-title py-3">
	            <span>Menu</span>
	        </div>.
	        <div class="widget-profile-menu py-3">
	            <ul class="categories categories--style-3">
	                <li>
	                    <a href="<?php echo base_url().'dashboard';?>" class="<?php echo (checkTabActive(array("dashboard"))) ? "active" : ""; ?>">
	                        <i class="fa fa-dashboard"></i>
	                        <span class="category-name">
	                            Dashboard
	                        </span>
	                    </a>
	                </li>
	                <li>
	                    <a href="<?php echo base_url().'profile';?>" class="<?php echo (checkTabActive(array("profile"))) ? "active" : ""; ?>">
	                        <i class="fa fa-user"></i>
	                        <span class="category-name">
	                            Manage Profile
	                        </span>
	                    </a>
	                </li>
					<li>
	                    <a href="<?php echo base_url().'orderhistory';?>" class="<?php echo (checkTabActive(array("orderhistory"))) ? "active" : ""; ?>">
	                        <i class="fa fa-file-text"></i>
	                        <span class="category-name">
	                            Purchase History
	                        </span>
	                    </a>
	                </li>
	                <!-- <li>
	                    <a href="http://localhost/myproject/activeecomn/wishlists" class="">
	                        <i class="fa fa-heart-o"></i>
	                        <span class="category-name">
	                            Wishlist
	                        </span>
	                    </a>
	                </li> -->
	                <li>
	                    <a href="<?php echo base_url().'support_ticket';?>" class="<?php echo (checkTabActive(array("support_ticket","support_chat"))) ? "active" : ""; ?>">
	                        <i class="fa fa-support"></i>
	                        <span class="category-name">
	                            Support Ticket
	                        </span>
	                    </a>
	                </li>
	            </ul>
	        </div>
	                    
	    </div>
	</div>
</div>