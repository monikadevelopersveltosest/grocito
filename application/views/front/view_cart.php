<?php  $session_userdata = $this->session->userdata(USER_SESSION); ?>

<style type="text/css">

    .sct-color-2 {

        background-color: #fcfcfc;

    }

    .slice-xs {
        padding-top: 1rem;
        padding-bottom: 1rem;
        position: relative;
    }

    .border-bottom {

        border-bottom: 1px solid #dee2e6!important;
    }

    .viewcarttitle{

        font-size: 16px;

        font-weight: 600;
    }

    .active{
        color: green;
    }
    

    @media (max-width: 768px){

        .col-md-4 {

            -ms-flex: 0 0 33.333333%;

            flex: 0 0 33.333333%;

            max-width: 33.333333%;

        }

        .col-xs-4 {

            -ms-flex: 0 0 33.333333%;

            flex: 0 0 33.333333%;

            max-width: 33.333333%;

        }

        .btn-base-1{

            font-size: 12px;

        }

        .returshpres{
            text-align: center !important;
        }
    }
</style>

<section class="slice-xs sct-color-2 border-bottom">

    <div class="container container-sm">

        <div class="row cols-delimited">

            

                <div class="col-md-4 col-xs-4 col-sm-4">

                    <div class="icon-block icon-block--style-1-v5 text-center active">

                        <div class="block-icon mb-0 text-center">

                            <i class="fa fa-shopping-cart active" style="text-align: center !important;float: none"></i>

                        </div>

                        <div class="block-content d-none d-md-block">

                            <h3 class="viewcarttitle">1. My Cart</h3>

                        </div>

                    </div>

                </div>



                <div class="col-md-4 col-xs-4 col-sm-4">

                    <div class="icon-block icon-block--style-1-v5 text-center">

                        <div class="block-icon c-gray-light mb-0">

                            <i class="fa fa-truck"></i>

                        </div>

                        <div class="block-content d-none d-md-block">

                            <h3 class="viewcarttitle">2. Shipping info</h3>

                        </div>

                    </div>

                </div>



                <div class="col-md-4 col-xs-4 col-sm-4">

                    <div class="icon-block icon-block--style-1-v5 text-center">

                        <div class="block-icon c-gray-light mb-0">

                            <i class="fa fa-credit-card"></i>

                        </div>

                        <div class="block-content d-none d-md-block">

                            <h3 class="viewcarttitle">3. Payment</h3>

                        </div>

                    </div>

                </div>

        </div>

    </div>
</section>

<section class="py-4 gry-bg" id="cart-summary">

        <div class="container">

                <div class="row cols-xs-space cols-sm-space cols-md-space">

                <div class="col-xl-8">

                    <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->

                    <div class="form-default bg-white p-4">
                        <div class="row align-items-center pt-4">

                            
                                <div class="col-md-6 col-sm-6 text-left returshpres">
                                    <a href="<?php echo base_url()?>shops" class="link link--style-3">

                                        <i class="la la-mail-reply"></i>

                                        Return to shop

                                    </a>
                                </div>    
                                <div class="col-md-6 col-sm-6 text-right returshpres">

                                    <?php if(isset($session_userdata) && !empty($session_userdata)){ ?> 

                                        <a href="<?php echo base_url()?>addshippinginfo" class="btn btn-styled btn-base-1" >Continue to Shipping</a>   

                                    <?php }else{ ?>

                                        

                                        <a href="javascript:void(0)" class="btn btn-styled btn-base-1 loginModal" href-btntype="continueshipping">Continue to Shipping</a>

                                    <?php }?>

                                </div>



                            

                        </div>
                        <div class="">

                            <div class="table-responsive">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th class="product-image"></th>

                                            <th class="product-name">Product</th>

                                            <th class="product-price  d-lg-table-cell">Price </th>

                                            <th class="product-quanity  d-md-table-cell">Quantity</th>

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



                                                <td class="product-price  d-lg-table-cell">

                                                    <span class="pr-3 d-block"><?php echo $spdataarray['price']; ?></span>

                                                </td>



                                                <td class="product-quantity d-md-table-cell">

                                                    <div class="input-group input-group--style-2 pr-4" style="width: 165px;">

                                                        <span class="input-group-btn">

                                                            <button class="btn btn-number sub" type="button" data-type="minus" data-field="quantity[<?php echo $key;?>]">

                                                                <i class="fa fa-minus"></i>

                                                            </button>

                                                        </span>

                                                        <input type="text" name="quantity[<?php echo $key; ?>]" class="form-control input-number" placeholder="1" value="<?php echo $spdataarray['quantity']?>" min="1" max="10" onchange="updateQuantity(<?php echo $key;?>, this)" style="margin-top: 7px;">

                                                        <span class="input-group-btn">

                                                            <button class="btn btn-number add" type="button" data-type="plus" data-field="quantity[<?php echo $key;?>]">

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

                            
                                <div class="col-md-6 col-sm-6 text-left returshpres">
                                    <a href="<?php echo base_url()?>shops" class="link link--style-3">

                                        <i class="la la-mail-reply"></i>

                                        Return to shop

                                    </a>
                                </div>    
                                <div class="col-md-6 col-sm-6 text-right returshpres">

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

                    <?php include('partials/cart_summery.php');?>

                </div>

            </div>

        </div>
</section>

<script type="text/javascript">

    cartQuantityInitialize();

    function removeFromCartView(e, key){

        e.preventDefault();

        removeFromCart(key);
    }



    function updateQuantity(key, element){

        //alert(key);

        $.post('<?php echo base_url();?>home/updateQuantity', {key:key, quantity: element.value}, function(data){

            // updateNavCart();

            $('#cart-summary').html(data);

        });



        // $.post("demo_test.asp", function(data, status){

        //     alert("Data: " + data + "\nStatus: " + status);

        //   });
    }



    function showCheckoutModal(){

        $('#GuestCheckout').modal();
    }



    // $('.add').click(function () {

    //      alert($(this).prev().val());



    //         if ($(this).prev().val() < 100) {

    //         $(this).prev().val(+$(this).prev().val() + 1);

    //         }

    // });

    // $('.sub').click(function () {

    //         if ($(this).next().val() > 1) {

    //         if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);

    //         }

    // });



    function cartQuantityInitialize(){

        $('.btn-number').click(function(e) {

            // alert('hid');

            e.preventDefault();



            fieldName = $(this).attr('data-field');

            // alert(fieldName);

            type = $(this).attr('data-type');

            // alert(type);

            var input = $("input[name='" + fieldName + "']");

            var currentVal = parseInt(input.val());

            // alert(currentVal);

            if (!isNaN(currentVal)) {

                if (type == 'minus'){



                    if (currentVal > input.attr('min')) {

                        input.val(currentVal - 1).change();

                    }

                    if (parseInt(input.val()) == input.attr('min')) {

                        $(this).attr('disabled', true);

                    }



                } else if (type == 'plus') {



                    if (currentVal < input.attr('max')) {

                        input.val(currentVal + 1).change();

                    }

                    if (parseInt(input.val()) == input.attr('max')) {

                        $(this).attr('disabled', true);

                    }



                }

            } else {

                input.val(0);

            }

        });



        $('.input-number').focusin(function() {

            $(this).data('oldValue', $(this).val());

        });



        $('.input-number').change(function() {



            minValue = parseInt($(this).attr('min'));

            maxValue = parseInt($(this).attr('max'));

            valueCurrent = parseInt($(this).val());



            name = $(this).attr('name');

            if (valueCurrent >= minValue) {

                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')

            } else {

                alert('Sorry, the minimum value was reached');

                $(this).val($(this).data('oldValue'));

            }

            if (valueCurrent <= maxValue) {

                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')

            } else {

                alert('Sorry, the maximum value was reached');

                $(this).val($(this).data('oldValue'));

            }





        });

        $(".input-number").keydown(function(e) {

            // Allow: backspace, delete, tab, escape, enter and .

            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||

                // Allow: Ctrl+A

                (e.keyCode == 65 && e.ctrlKey === true) ||

                // Allow: home, end, left, right

                (e.keyCode >= 35 && e.keyCode <= 39)) {

                // let it happen, don't do anything

                return;

            }

            // Ensure that it is a number and stop the keypress

            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

                e.preventDefault();

            }

        });
    }
</script>