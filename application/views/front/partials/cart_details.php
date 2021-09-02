<?php  $session_userdata = $this->session->userdata(USER_SESSION); ?>
<div class="container">
    <div class="row cols-xs-space cols-sm-space cols-md-space">
        <div class="col-xl-8">
            <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
            <div class="form-default bg-white p-4">
                <div class="">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-image"></th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price d-lg-table-cell">Price </th>
                                    <th class="product-quanity d-md-table-cell">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $spdata = $this->session->userdata('cart'); 
                                $total = 0;
                                ?>
                                <?php if(isset($spdata) && !empty($spdata)){ 
                                        $pi = 0;
                                ?>
                                <?php foreach($spdata as $key=>$spdataarray){ 
                                    $product= $this->Common_model->getSingleRecordById("product",array('product_id'=>$spdataarray['id']));
                                ?>
                                    <tr class="cart-item">
                                        <td class="product-image">
                                            <a href="#" class="mr-3">
                                                <img src="<?php echo base_url()?>uploads/product_images/<?php echo $spdataarray['main_image'];?>" style="width: 50px;height: 50px">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <span class="pr-4 d-block"><?php echo $spdataarray['name']; ?></span>
                                        </td>

                                        <td class="product-price d-lg-table-cell">
                                            <span class="pr-3 d-block"><?php echo $spdataarray['price']; ?></span>
                                        </td>

                                        <td class="product-quantity  d-md-table-cell">
                                            <div class="input-group input-group--style-2 pr-4" style="width: 165px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number sub" type="button" data-type="minus" data-field="quantity[<?php echo $key; ?>]">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity[<?php echo $key; ?>]" class="form-control input-number" placeholder="1" value="<?php echo $spdataarray['quantity']?>" min="1" max="10" onchange="updateQuantity(<?php echo $key;?>, this)" style="margin-top: 7px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus" data-field="quantity[<?php echo $key; ?>]">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="product-total">
                                            <span><?php echo $spdataarray['subtotal_price'];?></span>
                                        </td>
                                        <td class="product-remove">
                                            <a href="#" onclick="removeFromCartView(event,<?php echo $key; ?>" class="text-right pl-4">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row align-items-center pt-4">
                    <div class="col-6">
                        <a href="<?php echo base_url()?>" class="link link--style-3">
                            <i class="la la-mail-reply"></i>
                            Return to shop
                        </a>
                    </div>
                    <!-- <div class="col-6 text-right">
                        <a href="#" class="btn btn-styled btn-base-1 loginModal" href-btntype="continueshipping">Continue to Shipping</a>
                    </div> -->

                    <!-- <?php if(isset($session_userdata) && !empty($session_userdata)){ ?> 
                        <a href="<?php echo base_url()?>addshippinginfo" class="btn btn-styled btn-base-1" >Continue to Shipping</a>   
                    <?php }else{ ?>
                        
                        <a href="javascript:void(0)" class="btn btn-styled btn-base-1 loginModal" href-btntype="continueshipping">Continue to Shipping</a>
                    <?php }?> -->
                    <div class="col-md-6 text-right ">
                        <?php if(isset($session_userdata) && !empty($session_userdata)){ ?> 
                            <a href="<?php echo base_url()?>addshippinginfo" class="btn btn-styled btn-base-1" >Continue to Shipping</a>   
                        <?php }else{ ?>
                            
                            <a href="javascript:void(0)" class="btn btn-styled btn-base-1 loginModal" href-btntype="continueshipping">Continue to Shipping</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>

        <div class="col-xl-4 ml-lg-auto">
            <?php include('cart_summery.php'); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    cartQuantityInitialize();
    $(".loginModal").click(function(){

        var clickbutton = $(this).attr('href-btntype');
        // alert(clickbutton);
        $(".clickbutton").val(clickbutton);
    })
    $(".loginModal").on("click", function() { 
        $('#loginModal').modal('show'); 
    });
</script>
