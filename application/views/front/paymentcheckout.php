<?php  $session_userdata = $this->session->userdata(USER_SESSION); 
       $addressarray = $this->session->userdata('shippinginfo');
       // print_r($addressarray);die();
//          $msg = $this->session->userdata('usermessage'); 
//        // $msg="if lines are longer than 70 characters";
// echo $msg;
//                         // use wordwrap() if lines are longer than 70 characters
//                             $msg = wordwrap($msg,70); 
//                             $email=$addressarray['email'];
//                             mail($email,"My subject",$msg); 
//                             // die();
      
?>

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
    }

    label.payment_option {
        position: relative;
        cursor: pointer;
    }
    label {
        display: inline-block;
        margin-bottom: .5rem;
    }
    label.payment_option input {
        opacity: 0;
        position: absolute;
    }
    input[type=radio] {
        box-sizing: border-box;
        padding: 0;
    }
    label.payment_option span img {
        width: auto;
        height: auto;
        max-height: 100%;
    }
    img {
        vertical-align: middle;
        border-style: none;
    }
    label.payment_option input:checked + span:before {
        position: absolute;
        height: 100%;
        width: 100%;
        background: rgba(255,255,255,0.8);
        content: "";
        top: 0;
        left: 0;
    }
    label.payment_option input:checked + span:after {
        position: absolute;
        content: "";
        left: calc(50% - 6px);
        top: calc(50% - 12px);
        width: 12px;
        height: 24px;
        border: solid #28a745;
        border-width: 0 4px 4px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        box-shadow: 2px 3px 5px rgb(94, 146, 106);
    }
    button, input {
        overflow: visible;
    } 
    .paymenttitle{
        padding-bottom: 10px;
        font-size: 1.75em;
        font-weight: 300 !important;
    }
    
</style>
<section class="slice-xs sct-color-2 border-bottom">
    <div class="container container-sm">
        <div class="row cols-delimited">
            
                <div class="col-md-4 col-xs-4 col-sm-4">
                    <div class="icon-block icon-block--style-1-v5 text-center">
                        <div class="block-icon mb-0 text-center">
                            <i class="fa fa-shopping-cart" style="text-align: center !important;float: none"></i>
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
                    <div class="icon-block icon-block--style-1-v5 text-center active">
                        <div class="block-icon c-gray-light mb-0">
                            <i class="fa fa-credit-card active"></i>
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
                    <?php if(isset($error) && !empty($error)){ ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                    <?php }?>
                    <?php

                    if(isset($success) && !empty($success))
                    {
                    // echo $success;die();
                       
                    ?>
                        <script type="text/javascript"> 
                            // swal({
                            //   title: "Placed Order",
                            //   text: "<?php echo $success;?>",
                            //   timer: 20000,
                            //   showConfirmButton: false;
                            // });
                            swal({
                                title: "Placed Order",
                                text: "<?php echo $success;?>",
                                type: "success",
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'Go, Now !',
                                closeOnConfirm: false
                                },
                             function (isConfirm) {
                                  window.location.href="<?php echo base_url();?>";
                              });
                            
                        </script>
                    <?php  
                    }      
                   ?>
                    <div class="col-xl-12 bg-white p-4" >
                        <label><strong>Shipping Address</strong></label>
                        <address>
                        <b><?php echo $addressarray['name'];?> </b> <?php echo $addressarray['phone'];?> <br>
                        <?php echo $addressarray['address'];?> <br>
                        Zip Code : <?php echo $addressarray['postal_code'];?>
                     </address>
                    </div>
                    <div class="clearfix"></div>
                    <form class="form-default" data-toggle="validator" action="" role="form" method="POST">
                        <div class="form-default bg-white p-4">
                            <div class="">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="paymenttitle">Select Payment Option : </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                <label class="payment_option mb-4" data-toggle="tooltip" data-title="Cash on Delivery" data-original-title="" title="">
                                                    <input type="radio" id="" name="payment_option" value="cash" checked="">
                                                    <span>
                                                        <img src="<?php echo base_url().'front_assets/images/cod.png'; ?>" class="img-fluid" >
                                                        <h5></h5>
                                                    </span>
                                                    <span>&nbsp;Cash on Delivery</span>
                                                </label>
                                            </div>
                                            <div class="col-5">

                                                <label class="payment_option mb-4" data-toggle="tooltip" data-title="Paytm" data-original-title="" title="">
                                                    <input type="radio" id="" name="payment_option" value="paytm" >
                                                    <span>
                                                        <img src="<?php echo base_url().'front_assets/images/paytm.jpg';?>" class="img-fluid">
                                                    </span>
                                                    <span>&nbsp;Pay with Paytm</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>

                            <div class="row align-items-center pt-4">
                                <div class="col-md-6">
                                    <a href="<?php echo base_url()?>shops" class="link link--style-3">
                                        <i class="la la-mail-reply"></i>
                                        Return to shop
                                    </a>
                                </div>

                                <div class="col-md-6 text-right ">
                                    <?php if(isset($session_userdata) && !empty($session_userdata)){ ?> 
                                        <!-- <a href="<?php echo base_url()?>addshippinginfo" class="btn btn-styled btn-base-1" >Continue to Payment</a> -->
                                        <button type="submit" name="submitCheckout" value="submitCheckout" class="btn btn-styled cmfimorder btn-base-1">Confirm Order</button> 
                                    <?php }else{ ?>
                                        
                                        <a href="javascript:void(0)" class="btn btn-styled btn-base-1 loginModal" href-btntype="continueshipping">Continue to Shipping</a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- </form> -->
                </div>

                <div class="col-xl-4 ml-lg-auto">
                    <?php include('partials/cart_summery.php');?>
                </div>
            </div>
        </div>
    </section>
    
     <script type="text/javascript">
    $(".cmfimorder").click(function(){
        // var id = $(this).attr("href-id");
    
    //   swal({
    //       title: "successfully",
    //       text: " Your Order  has been created successfully",
    //       timer: 20000,
    //       showConfirmButton: false
    //     });

     
    });

    
    </script>