<style type="text/css">
    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 99;
    }
    .card > .card-title, .card > .card-header {
        padding: 1.5rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        margin-bottom: 0;
    }
    .card {
        position: relative;
        border: 1px solid #f1f1f1;
        border-radius: 0.25rem;
        background: #fff;
        -webkit-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }
    .card-body {
        position: relative;
        padding: 1.5rem 1.5rem;
    }
    .table-cart {
        width: 100%;
    }
    table {
        display: table;
        border-collapse: separate;
        border-spacing: 2px;
        border-color: grey;
    }
    .pr-4, .px-4 {
        padding-right: 1.5rem!important;
    }
    .input-group {
        /* position: relative; */
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-align: stretch;
        align-items: stretch;
        width: 100%;
    }
    .input-group--style-2 .input-group-btn:not(:last-child) > .btn {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-right-color: #FFF;
    }

    .input-group--style-2 .input-group-btn > .btn {
        border-radius: 50%;
        background: transparent;
        border-color: #e6e6e6;
        color: #818a91;
        font-size: 0.625rem;
        padding-top: 0.6875rem;
        padding-bottom: 0.6875rem;
        cursor: pointer;
    }
    .btn {
        position: relative;
        font-size: 0.875rem;
        font-family: "Open Sans", sans-serif;
        font-style: normal;
        text-align: center;
        border-radius: 2px;
        outline: none;
        -webkit-transition: all 0.2s linear;
        transition: all 0.2s linear;
    }
    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .input-group--style-2 .form-control {
        border-left: 0;
        border-right: 0;
    }
    .input-group--style-2 .input-group-btn:not(:first-child) > .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        border-left-color: #FFF;
    }
    .input-group--style-2 .input-group-btn > .btn {
        border-radius: 50%;
        background: transparent;
        border-color: #e6e6e6;
        color: #818a91;
        font-size: 0.625rem;
        padding-top: 0.6875rem;
        padding-bottom: 0.6875rem;
        cursor: pointer;
    }
    .couoncodeapply {
        background-color: #00c851!important;
        border-radius: .125rem;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        color: #fff!important;
        display: inline-block;
        padding: 12PX 23PX;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .removecouponcode{
        background-color: #00c851!important;
        border-radius: .125rem;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
        color: #fff!important;
        display: inline-block;
        padding: 12PX 23PX;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>
<div class="card sticky-top">
    <div class="card-title">
        <div class="row align-items-center">
            <div class="col-6">
                <h3 class="heading heading-3 strong-400 mb-0">
                    <span>Summary</span>
                </h3>
            </div>
            <?php $spdata = $this->session->userdata('cart');
                $couponcoded = $this->session->userdata('couponcode');
            $s = array();
                // print_r($spdata)
            ?>
            <div class="col-6 text-right">
                <span class="badge badge-md badge-success"><?php echo (isset($spdata) && !empty($spdata) ? count($spdata) : 0); ?> Items</span>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="product-name">Product</th>
                    <th class="product-total text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($spdata) && !empty($spdata)){ 
                                                $pi = 0;
                ?>
                <?php foreach($spdata as $key=>$spdataarray){ 
                    $product= $this->Common_model->getSingleRecordById("product",array('product_id'=>$spdataarray['id']));
                ?>
                    <tr class="cart_item">
                        <td class="product-name">
                            <?php echo $spdataarray['name']; ?>
                            <strong class="product-quantity"><?php echo $spdataarray['price']; ?> × <?php echo $spdataarray['quantity']; ?></strong>
                        </td>
                        <td class="product-total text-right">
                            <span class="pl-4"><?php echo $spdataarray['subtotal_price'];?></span>
                        </td>
                    </tr>
                <?php $s[] = $spdataarray['subtotal_price']; } } ?>
            </tbody>
        </table>

        <table class="table">
            <tfoot>
                <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td class="text-right">
                        <span class="strong-600"><?php echo array_sum($s);?></span>
                    </td>
                </tr>

                <tr class="cart-shipping">
                    <th>Tax</th>
                    <td class="text-right">
                        <span class="text-italic">include GST</span>
                    </td>
                </tr>

                <tr class="cart-shipping">
                    <th>Shipping Charge</th>
                    <td class="text-right">
                        <span class="text-italic">0.00</span>
                    </td>
                </tr>
                <?php 
                    // print_r($s);
                    $totalamount =  array_sum($s);
                if(isset($session_userdata) && !empty($session_userdata)){ 
                        if(isset($couponcoded) && !empty($couponcoded)){
                            $offter_amount = $couponcoded['offer_amount'];
                            
                            $offteramount_type = $couponcoded['offer_amount_type'];
                            if($offteramount_type == 1){
                                $offter_amount = $totalamount * $couponcoded['offer_amount']/100;
                            }
                            $totalamount = $totalamount - $offter_amount;
                        ?>
                            <tr class="couponcodetr">
                                <th>Coupon Code (<?php echo $couponcoded['coupon_code']?>)</th>
                                <td class="text-right">
                                    <?php echo $offter_amount; ?>
                                    <a href="javascript:void(0)" class="removecouponcode">Remove</a>
                                </td>
                            </tr>
                        <?php    
                            }
                            else{
                        ?>
                            <tr class="couponcodetr">
                                <th><input type="text" class="form-control" name="couponcode" id="couponcode" placeholder="Enter Coupon Code"></th>
                                <td class="text-right">
                                    <a href="javascript:void(0)" class="couoncodeapply">Apply</a>
                                </td>
                            </tr>
                <?php } } ?>
                <tr class="cart-total">
                    <th><span class="strong-600">Total</span></th>
                    <td class="text-right">
                        <strong><span><?php echo $totalamount;?></span></strong>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
