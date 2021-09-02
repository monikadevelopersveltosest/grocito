<style type="text/css">
  ol.progtrckr li.progtrckr-done {
      color: black;
      border-bottom: 4px solid yellowgreen;
  }
  ol.progtrckr[data-progtrckr-steps="5"] li {
      width: 19%;
  }

  ol.progtrckr li {
      display: inline-block;
      text-align: center;
      line-height: 3.5em;
  }
  ol.progtrckr li.progtrckr-done:before {
      content: "\2713";
      color: white;
      background-color: yellowgreen;
      height: 2.2em;
      width: 2.2em;
      line-height: 2.2em;
      border: none;
      border-radius: 2.2em;
  }
  ol.progtrckr li:before {
      position: relative;
      bottom: -6.5em;
      float: left;
      left: 50%;
      line-height: 1em;
  }
  :after, :before {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
  }
  ol.progtrckr li:after {
      content: "\00a0\00a0";
  }
  :after, :before {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
  }
  ol.progtrckr li.progtrckr-todo {
      color: silver;
      border-bottom: 4px solid silver;
  }
  ol.progtrckr li.progtrckr-todo:before {
      content: "\039F";
      color: silver;
      background-color: white;
      font-size: 2.2em;
      bottom: -1.2em;
  }
  ol.progtrckr li:before {
      position: relative;
      bottom: -2.5em;
      float: left;
      left: 50%;
      line-height: 1em;
  }
  :after, :before {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
  }
  ol.progtrckr li:after {
      content: "\00a0\00a0";
  }
  :after, :before {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
  }
  ol.progtrckr li.truck:before {
    bottom: -6.5em !important;
  }
  .btn.btn-sm {
    padding: .5rem 1rem !important;
    font-size: .64rem !important;
}
</style>
<div class="container-fluid pt-10 bgp">
  <div class="row content">
    <?php include('dashboardsidebar.php'); ?>
      <div class="col-sm-12 col-lg-9" style="background-color: #fff;border-radius: 0.25rem;margin-top: 10px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
         <!--  <h3>
            Invoice
            <small><?php echo (isset($orderdata) ? $orderdata['invoice_no']: ''); ?></small>
          </h3> -->
          <!-- <ol class="breadcrumb">
            <li><a href="<?php echo base_url()?>shop"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url()?>shop/orderhistory">Orderhistory</a></li>
            <li class="active">Invoice</li>
          </ol> -->
        </section>
        <?php 
          $shop_data = $this->Common_model->getSingleRecordById('shops',array('shop_id' => $orderdata['seller_id']));

          $shippingifo = json_decode($orderdata['shipping_address'],true);
        ?>

       <!-- Main content -->
       <style type="text/css">
         .invoice .row1{
          border-bottom: 1px solid #124b56;
          padding-top: 10px;
          background-color: #666666ba;
          color: #fff;
          margin-bottom: 10px;
         }
         .invoice_no{
           font-weight: 600;
         }
       </style>
      <section class="invoice">
        <!-- title row -->
        <div class="row row1">
          <div class="col-md-12">
            <h3 class="page-header">
              <i class="fa fa-globe"></i> <?php echo getWebOptionValue('site_title');?>
              <small class="pull-right">Date: <?php echo dateformatedmy($orderdata['create_date']); ?></small>
            </h3>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-md-4 invoice-col">
            From
            <address>
              <strong><?php echo $shop_data['shop_name'];?></strong><br>
              <?php echo $shop_data['shop_address'];?><br>
              Phone: <?php echo base64_decode($shop_data['mobile_no']); ?><br>
              Email: <?php echo $shop_data['email']; ?>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-md-4 invoice-col">
            To
            <address>
              <strong><?php echo $shippingifo['name']; ?></strong><br>
              <?php echo $shippingifo['address']; ?><br>
              <?php echo $shippingifo['postal_code']; ?><br>
              Phone: <?php echo $shippingifo['phone']; ?><br>
              Email: <?php echo $shippingifo['email']; ?>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-md-4 invoice-col">
            <b class="invoice_no">Invoice NO. <?php echo (isset($orderdata) ? $orderdata['invoice_no']: ''); ?></b><br>
            <br>
            <b>Payment status:</b> <?php echo $orderdata['payment_status']; ?><br>
            <b>Deliery status:</b> <?php echo $orderdata['delivery_status_name']; ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-md-12 table-responsive">
            <table class="table">
              <thead>
              <tr>
                <th>S.NO</th>
                <th class="product-name">Product</th>
                <th class="product-name">Variations</th>
                <th class="product-price d-lg-table-cell">MRP </th>
                <th class="product-price d-lg-table-cell">Discount</th>
                <th class="product-price d-lg-table-cell">Price</th>
                <th class="product-quanity d-md-table-cell">QTY</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Action</th>
              </tr>
              </thead>
              <tbody>
              <?php 
                $spdata = json_decode($orderdata['prduct_details'],true);
                $subtotal = array();
                $s = 1;
              ?>
                <?php if(isset($spdata) && !empty($spdata)){ 
                        $pi = 0;
                ?>
                <?php foreach($spdata as $key=>$spdataarray){ 
                    $product = $this->Common_model->getSingleRecordById("product",array('product_id'=>$spdataarray['id']));
                    $product_variation = json_decode($spdataarray['variations'],true);

                    $checkproductReviewrating = $this->Common_model->GetWhere('productreviewrating', array('user_id'=>customersessionid(),'order_id'=>$orderdata['id'],'product_id'=>$spdataarray['id']));
                    // print_r($product_variation);
                ?>
                    <tr class="cart-item">
                        <td class="product-image">
                          <?php echo $s; ?>
                        </td>

                        <td class="product-name">
                            <span class="pr-4 d-block"><?php echo $spdataarray['name']; ?></span>
                        </td>

                        <td class="product-name">
                          <?php if(isset($spdataarray['color']) && !empty($spdataarray['color'])){?>
                                <p><span class="pr-4 d-block"></span> <span><?php echo " COLOR : ".getcolornamebyid($spdataarray['color']); ?></span></p>
                          <?php }?>
                          <?php if(isset($product_variation) && !empty($product_variation)){ 
                                  foreach($product_variation as $kv=>$product_variation_array){
                                    foreach($product_variation_array as $kv2=>$product_variation_array2)
                            ?>
                              <p><span class="pr-4 d-block"></span> <span><?php echo $kv2 ." : ".$product_variation_array2; ?></span></p>
                            <?php } } ?>
                        </td>

                        <td class="product-price d-lg-table-cell">
                            <span class="pr-3 d-block"><?php echo $spdataarray['mrp_price']; ?></span>
                        </td>
                        <td class="product-price d-lg-table-cell">
                            <span class="pr-3 d-block"><?php echo $spdataarray['discount'] . (isset($spdataarray['discount_type']) && $spdataarray['discount_type'] == 1 ? '%' :'' ); ?></span>
                        </td>
                        <td class="product-price d-lg-table-cell">
                            <span class="pr-3 d-block"><?php echo $spdataarray['price']; ?></span>
                        </td>
                        <td class="product-quantity  d-md-table-cell"><span class="pr-3 d-block"><?php echo $spdataarray['quantity']?></span>
                        </td>
                        <td class="product-total">
                            <span><?php echo $spdataarray['subtotal_price'];?></span>
                        </td>
                        <!-- <td class="product-remove">
                            <a href="#" onclick="removeFromCartView(event,<?php echo $key; ?>" class="text-right pl-4">
                                <i class="la la-trash"></i>
                            </a>
                        </td> -->
                        
                          <td>
                            <?php if($orderdata['delivery_status'] == 4 && empty($checkproductReviewrating)){ ?>
                              <a href="javascript:void(0)" class="addproductreview" href-id="<?=$spdataarray['id']?>">Add Review</a>
                            <?php } ?>
                          </td>
                        
                    </tr>
                <?php 
                    $subtotal[] = $spdataarray['subtotal_price'];
                    $discount_amount[] = $spdataarray['discount_amount'];
                    $s++; 
                } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-md-6">
            <p class="lead">Payment Methods: <b><?php echo $orderdata['payment_type']; ?></b></p>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <!-- <p class="lead">Amount Due 2/22/2014</p> -->

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td><?php echo CURRENCY ." ".array_sum($subtotal); ?></td>
                </tr>
                
                <tr>
                  <th>Coupon Discount</th>
                  <td><?php echo CURRENCY ." ".$orderdata['coupon_discount']; ?></td>
                </tr>
                <tr>
                  <th>Shipping Charge</th>
                  <td><?php echo CURRENCY ." ".$orderdata['shipping_charge']; ?></td> 
                </tr>
                <tr>
                  <th>Total:</th>
                  <td><?php echo CURRENCY ." ".$orderdata['grand_total']; ?></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <!-- <h2 class="page-header">
                <i class="fa fa-globe"></i> 
                <small class="pull-right">Date: 2/10/2014</small>
              </h2> -->

            </div>
          </div>
          <?php 
            $delivery_status = $this->Common_model->getwhere("delivery_status",array('ds_id !='=>5));
          ?>
          <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
                <ol class="progtrckr" data-progtrckr-steps="5">
                    <?php if(isset($delivery_status) && !empty($delivery_status)){ 
                          foreach($delivery_status as $ked=>$delivery_status_array){
                    ?>
                      
                        <?php if($delivery_status_array['ds_id'] == $orderdata['delivery_status']){ ?>
                              
                            <?php if($delivery_status_array['ds_id'] !=4 ){ ?>
                              <li class="progtrckr-done truck">
                                  <img src="<?php echo base_url().'common_assets/images/truckgiff.gif';?>"><br><?php echo $delivery_status_array['delivery_status_name'];?>
                              </li>
                            <?php }else{ ?> 
                              <li class="progtrckr-done"><?php echo $delivery_status_array['delivery_status_name'];?>
                              </li>
                            <?php }?>
                          
                        <?php }else{ ?>
                            <?php if($delivery_status_array['ds_id'] < $orderdata['delivery_status']){ ?>
                                <li class="progtrckr-done"><?php echo $delivery_status_array['delivery_status_name'];?></li>
                            <?php }else{ ?>
                                <li class="progtrckr-todo"><?php echo $delivery_status_array['delivery_status_name'];?></li>
                            <?php }?>
                        <?php } ?>
                      
                    <?php } } ?>
                </ol>
                                <!--<ol class="progtrckr" data-progtrckr-steps="5">
                    <li class="progtrckr-done">Order Processing</li>
                    <li class="progtrckr-done">Pre-Production</li>
                    <li class="progtrckr-done">In Production</li>
                    <li class="progtrckr-todo">Shipped</li>
                    <li class="progtrckr-todo">Completed</li>
                </ol>-->


            </div>
          </div>  
        </section>
        <?php
          $checkshopReviewrating = $this->Common_model->GetWhere('shopreviewrating', array('user_id'=>customersessionid(),'order_id'=>$orderdata['id']));
          // $checkshopReviewrating = 
        ?>
        <!--Rating section start -->
        <?php if($orderdata['delivery_status'] == 4 && empty($checkshopReviewrating)){ ?>
          <div id="ratingSection">
            <div class="row">
              <div class="col-sm-12">
                <form id="ratingForm" method="POST">          
                  <div class="form-group">
                    <h4>Rate this Shop</h4>
                    <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
                      <span class="fa fa-star" aria-hidden="true"></span>
                    </button>
                    <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                    <input type="hidden" class="form-control" id="shop_id" name="shop_id" value="<?php echo $orderdata['seller_id']; ?>">
                    <input type="hidden" class="form-control" id="order_id" name="order_id" value="<?php echo $orderdata['id']; ?>">
                    <!-- <input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $_GET['item_id']; ?>"> -->
                    <input type="hidden" name="action" value="saveRating">
                  </div>    
                  <!-- <div class="form-group">
                    <label for="usr">Title*</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                  </div> -->
                  <div class="form-group">
                    <label for="comment">Comment*</label>
                    <textarea class="form-control" rows="3" id="comment" name="comment" required></textarea>
                  </div>
                  <div class="form-group">
                    <button type="button" class="btn btn-success saveReview" id="saveReview">Submit</button> <!-- <button type="button" class="btn btn-info" id="cancelReview">Cancel</button> -->
                  </div>      
                </form>
              </div>
            </div>    
          </div>
        <?php }?>
        <!--Rating section end -->
        <div class="row no-print">
          <div class="col-md-12">
            <!-- <a href="javascript:void(0)" class="btn btn-default pull-right addfeedback"><i class="fa fa-print"></i>Add Feedback</a> -->
            <a href="<?php echo base_url().'home/invoiceprint?invoice='.base64_encode($orderdata['id']);?>" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
          </div>
        </div>
      </section>
    </div>
  </div>
    <!-- /.content -->
  <div class="clearfix"></div>
</div>
<!--Review rating model -->
<div class="modal fade" id="reviewModal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header reviewmodelh">
        <h4 class="modal-title reviewmodelhtitle">Add Review</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12" align="center">
            <form id="productratingForm" method="POST">          
              <div class="form-group">
                <h4>Rate this product</h4>
                <button type="button" class="btn btn-warning btn-sm prateButton" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm prateButton" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm prateButton" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm prateButton" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-default btn-grey btn-sm prateButton" aria-label="Left Align">
                  <span class="fa fa-star" aria-hidden="true"></span>
                </button>
                <input type="hidden" class="form-control prating" name="rating" value="1">
                <input type="hidden" class="form-control product_id" id="product_id" name="product_id" value="">
                <input type="hidden" class="form-control" id="order_id" name="order_id" value="<?php echo $orderdata['id']; ?>">
                <!-- <input type="hidden" class="form-control" id="itemId" name="itemId" value="<?php echo $_GET['item_id']; ?>"> -->
                <input type="hidden" name="action" value="saveRating">
              </div>    
              <!-- <div class="form-group">
                <label for="usr">Title*</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div> -->
              <div class="col-md-12">
                <label for="comment">Comment (MAX 200 char)</label>
                <textarea  rows="3" id="comment" name="comment" class="form-control comment"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-success saveProductReview" id="saveProductReview">Submit</button> <!-- <button type="button" class="btn btn-info" id="cancelReview">Cancel</button> -->
              </div>      
            </form>
          </div>
        </div> 
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<!--Review rating model end-->
<script type="text/javascript">
  $('a.addproductreview').click(function(){
    var pid = $(this).attr("href-id");
    $(".product_id").val(pid);
    $("#reviewModal").modal("show");
  });
</script>