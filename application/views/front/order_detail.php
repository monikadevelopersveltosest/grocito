<style type="text/css">
  .cont{
    margin-top: 13px;
      margin-bottom: 13px;
    background-color: #fff;
    box-sizing: border-box;
    box-shadow: 3px 9px 20px 1px #aaaaaa;
    padding: 18px 10px 10px 10px;
  }
  .img{
    width: 48px;
    height: 75px;
  }
  .ptitle{
    font-weight: 600;
    font-size: 14px;
  }
  .vartitle{
    font-size: 12px;
      font-weight: 400;
  }
  .returntext{
    font-size: 12px;
      font-weight: 400;
  }
  .returntxtdiv{
    margin-top: 10px;
      
  }
  .deliverydate{
    line-height: 10px;
  }
  ._30ud5x._3ELbo9 {
      background-color: #26a541;
      border: 2px solid #26a541;
  }
  ._30ud5x {
      height: 10px;
      width: 10px;
      border-radius: 50%;
      background-color: none;
      border: 2px solid #26a541;
      display: inline-block;
      margin-right: 8px;
  }
  ._30ud5x.VGlMMD {
      background-color: #ff6161;
      border: 2px solid #ff6161;
  }
  .deliverytitle{
      font-size:18px;
      font-weight:600;
      padding-bottom: 12px;
    }
  .nametitle{
    font-size: 14px;
    font-weight: 600;
    line-height: 20px;px;
  }
  .ntitle{
    font-family: Roboto,Arial,sans-serif;
    padding-top: 8px;
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    box-sizing: border-box;
  }
  .paymenttitle{
    font-size:18px;
      font-weight:600;
      padding-bottom: 12px;
  }
  .imgtitle{
    width: 25px;
    height:25;
  }
  .notifyjs-corner{
    top: 45px !important;
  }

</style>

<style type="text/css">
  .btn.btn-sm {
      padding: .5rem 1rem !important;
      font-size: .64rem !important;
  }
  .progressbar {
    margin: 0;
    padding: 0;
    counter-reset: step;
    width: 100%;
  }
  .progressbar li {
    list-style-type: none;
    width: 16.66%;
    float: left;
    font-size: 10px;
    font-weight: 600;
    position: relative;
    text-align: center;
    text-transform: uppercase;
    color: #7d7d7d;
  }
  .progressbar li:before {
    width: 30px;
    height: 30px;
    content: counter(step);
    counter-increment: step;
    line-height: 30px;
    border: 2px solid #7d7d7d;
    display: block;
    text-align: center;
    margin: 0 auto 10px auto;
    border-radius: 50%;
    background-color: white;
  }
  .progressbar li:after {
    width: 100%;
    height: 2px;
    content: '';
    position: absolute;
    background-color: #7d7d7d;
    top: 15px;
    left: -50%;
    z-index: -1;
  }
  .progressbar li:first-child:after {
    content: none;
  }
  .progressbar li.active {
    color: green;
  }
  .progressbar li.active:before {
    border-color: #55b776;
  }
  .progressbar li.active + li:after {
    background-color: #55b776;
  }
</style>
<section class="main-container col1-layout main-container-small" >
    <div class="main container">
      <?php 
          $shippingifo = json_decode($orderdata['shipping_address'],true);
        ?>
      <div class="col-main" style="padding-top:10px;padding-bottom: 10px;">
          <div class="row cont">
             <input type="hidden" class="form-control" id="o_id" name="o_id" value="<?php echo $orderdata['id']; ?>">
             <div class="col-md-12 ">
              <div class="row">
                <div class="col-md-3"><a href="javascript:void(0)" class="btn btn-danger deleteselected"> <i class="fa fa-ban" aria-hidden="true"></i>&nbsp; Cancel Selected Order</a></div>
                <!-- <div class="col-md-3"><a href="javascript:void(0)" class="btn btn-warning returnselected"> <i class="fa fa-ban" aria-hidden="true"></i>&nbsp; Return Selected Order</a></div> -->
                <!-- <div class="col-md-3"><a href="javascript:void(0)" class="btn btn-success completeselected"> <i class="fa fa-success" aria-hidden="true"></i>&nbsp; Complete Selected Order</a></div> -->

                <input type="hidden" class="form-control" id="o_id" name="o_id" value="<?php echo $orderdata['id']; ?>">
              </div>
              <div class="row">
                <div class="col-md-12">
                    <input type="checkbox" id="checkAl" style="display: inline-block;"> Chek all
                </div>
                <div class="col-md-4">
                  <div class="ntitle">Invoice No. : <?php echo (isset($orderdata['invoice_no']) && !empty($orderdata['invoice_no']) ? $orderdata['invoice_no'] : ''); ?></div>
                  <div class="deliverytitle"><span >Delivery Address</span></div>
                  <div class="nametitle"><?php echo $shippingifo['name']; ?></div>
                  <div class="ntitle"><?php echo $shippingifo['address']; ?> - <?php echo $shippingifo['postal_code']; ?></div>
                  <div>
                    <div class="nametitle"><span >Phone</span></div>
                    <div class="ntitle"><?php echo $shippingifo['phone']; ?></div>
                  </div>
                </div>
                <div class="col-md-4">
                  <h4 class="paymenttitle">Payment Status</h4>
                  <div class="deliverydate">
                    <div class="_30ud5x VGlMMD _3ELbo9"></div>
                    <span class="ptitle"><?php echo $orderdata['payment_status']; ?></span>
                  </div>
                  <h4 class="paymenttitle">Delivery Status</h4>
                  <div class="deliverydate"><span class="ptitle"><?php echo $orderdata['delivery_status_name']; ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="deliverydate">
                    <h4 class="ptitle">Date :  <?php echo dateformatedmy($orderdata['create_date']); ?></h4>
                  </div>
                  <!-- <h4 class="paymenttitle">More Action</h4>
                  <div class="returntxtdiv"> <i class="fa fa-print"></i> <a href="<?php echo base_url().'home/invoiceprint?invoice='.base64_encode($orderdata['id']);?>" target="_blank" class="ptitle"> Print Invoice</a></div> -->

                  <!-- <div ><a href="javascript:void(0)" class="btn btn-primary deleteselected deletebutton"> <i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Cancel Selected Order</a></div>
                  <div class="crear-fix"></div>
                  <div><input type="checkbox" id="checkAl" style="display: block;"> <span >Check All</span></div> -->
                </div>
              </div>
             </div>
          </div>
        <?php 
          // $spdata = json_decode($orderdata['prduct_details'],true);
          $spdata = $product= $this->Common_model->getWhereData("order_products",array('order_id'=>$orderdata['id']));
        //   print_r($spdata);
          $subtotal = array();
          $s = 1;
        ?>
          <?php if(isset($spdata) && !empty($spdata)){ 
                  $pi = 0;
          ?>
          <?php foreach($spdata as $key=>$spdataarray){ 
              $product = $this->Common_model->getSingleRecordById("product",array('product_id'=>$spdataarray['product_id']));
              $product_variation = json_decode($spdataarray['variations'],true);

              $checkproductReviewrating = $this->Common_model->GetWhere('productreviewrating', array('user_id'=>customersessionid(),'order_id'=>$orderdata['id'],'product_id'=>$spdataarray['product_id']));
              // print_r($product_variation);
          ?>
              <div class="row cont">
                   <div class="col-md-12 ">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="ntitle"><input type="checkbox" id="checkItem" name="check" value="<?php echo $spdataarray["id"]; ?>" style="display: inline-block">  Item Id : <?php echo (isset($spdataarray['id']) && !empty($spdataarray['id']) ? $spdataarray['id'] : ''); ?></div>
                      </div>
                      <div class="col-md-2">
                        <img class="img" src="<?php echo base_url()?>uploads/product_images/<?php echo $spdataarray['main_image'];?>" class="img-responsive">
                      </div>
                      <div class="col-md-4">
                        <h4 class="ptitle"><?php echo $spdataarray['product_name']; ?></h4>
                        <p class="vartitle"><?php if(isset($spdataarray['color']) && !empty($spdataarray['color'])){?>
                                <p><span class="pr-4 d-block"></span> <span><?php echo " COLOR : ".getcolornamebyid($spdataarray['color']); ?></span></p>
                          <?php }?>
                          <?php if(isset($product_variation) && !empty($product_variation)){ 
                                  foreach($product_variation as $kv=>$product_variation_array){
                                    foreach($product_variation_array as $kv2=>$product_variation_array2)
                            ?>
                              <p><span class="pr-4 d-block"></span> <span><?php echo $kv2 ." : ".$product_variation_array2; ?></span></p>
                            <?php } } ?>
                        </p>
                        <p> quantity : <?php echo $spdataarray['quantity']?></p>
                      </div>
                      <div class="col-md-2">

                        <p> MRP : ₹:<?php echo $spdataarray['mrp_price']; ?></p>
                        <p> Discount : <?php echo $spdataarray['discount'] . (isset($spdataarray['discount_type']) && $spdataarray['discount_type'] == 1 ? '%' :'' ); ?></p>
                        <p> Mart Price : ₹:<?php echo $spdataarray['price'];?></p>
                      </div>
                      <div class="col-md-4">
                        
                        <div class="returntxtdiv"><span class="returntext">Return policy ended in 7 days</span></div>
                        <?php if($orderdata['delivery_status'] == 4 && empty($checkproductReviewrating)){ ?>
                              <a href="javascript:void(0)" class="addproductreview" href-id="<?=$spdataarray['product_id']?>">Rate & Review Product</a>
                        <?php } ?>
                        
                        <?php if($spdataarray['product_delivery_status'] == 1 || $spdataarray['product_delivery_status'] == 2 || $spdataarray['product_delivery_status'] == 3){ ?>
                              <!-- <a href="javascript:void(0)" class="cancelproduct" href-id="<?=$spdataarray['id']?>">Cancel</a> -->
                              <!-- <input type="checkbox" id="checkItem" name="check" value="<?php echo $spdataarray["id"]; ?>" style="display: block;"> -->
                        <?php } ?>
                        <?php if($spdataarray['product_delivery_status'] == 4){ ?>
                              <br>
                              <a href="javascript:void(0)" class="ReturnorReplace" href-opid="<?=$spdataarray['id']?>" >Return & Replace</a>
                        <?php } ?>

                        <?php if($spdataarray['product_delivery_status'] == 5){ ?>
                              <br>
                              <a href="javascript:void(0)" >Cancelled </a>
                        <?php } ?>
                        <?php if($spdataarray['product_delivery_status'] == 6){ ?>
                              <br>
                              <a href="javascript:void(0)" > Returned </a>
                        <?php } ?>
                      </div>
                    </div>
                   </div>
              </div>
          <?php 
              $subtotal[] = $spdataarray['subtotal_price'];
              $discount_amount[] = $spdataarray['discount_amount'];
              $s++; 
          } ?>
          <?php } ?>

        <div class="row count content">
          <!-- this row will not appear when printing -->
        
          <?php 
            $delivery_status = $this->Common_model->getwhere("delivery_status",array('1'=>1));
          ?>
            <!-- <ul class="progressbar">
                <li class="active">Pending</li>
                <li class="active">Accept By Delivery Boy</li>
                <li>Dispatch By Shop</li>
                <li>Completed</li>
                <li>Return</li>
                <li>Cancel</li>
            </ul> -->
            <ul class="progressbar">
                <?php if(isset($delivery_status) && !empty($delivery_status)){ 
                      foreach($delivery_status as $ked=>$delivery_status_array){
                ?>
                  
                    <?php if($delivery_status_array['ds_id'] == $orderdata['delivery_status']){ ?>
                          
                        <?php if($delivery_status_array['ds_id'] !=4 ){ ?>
                          <li class="active">
                              <?php echo $delivery_status_array['delivery_status_name'];?>
                          </li>
                        <?php }else{ ?> 
                          <li class="active"><?php echo $delivery_status_array['delivery_status_name'];?>
                          </li>
                        <?php }?>
                      
                    <?php }else{ ?>
                        <?php if($delivery_status_array['ds_id'] < $orderdata['delivery_status']){ ?>
                            <li class="active"><?php echo $delivery_status_array['delivery_status_name'];?></li>
                        <?php }else{ ?>
                            <li><?php echo $delivery_status_array['delivery_status_name'];?></li>
                        <?php }?>
                    <?php } ?>
                  
                <?php } } ?>
            </ol>
          <?php
            $checkshopReviewrating = $this->Common_model->GetWhere('shopreviewrating', array('user_id'=>customersessionid(),'order_id'=>$orderdata['id']));
            // $checkshopReviewrating = 
          ?>
          <!--Rating section start -->
          <?php if($orderdata['delivery_status'] == 4 && empty($checkshopReviewrating)){ ?>
            <!-- <div id="ratingSection">
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
                      <input type="hidden" class="form-control" id="order_id" name="order_id" value="<?php echo $orderdata['id']; ?>">
                      <input type="hidden" name="action" value="saveRating">
                    </div>
                    <div class="form-group">
                      <label for="comment">Comment*</label>
                      <textarea class="form-control" rows="3" id="comment" name="comment" required></textarea>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-success saveReview" id="saveReview">Submit</button>
                    </div>      
                  </form>
                </div>
              </div>    
            </div> -->
          <?php }?>
        </div>
    </div>
  </div>
</section>
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
                <label for="comment">Review (MAX 200 char)</label>
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

<!--ReturnorReplaceModal rating model -->
<div class="modal fade" id="ReturnorReplaceModal" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header reviewmodelh">
        <h4 class="modal-title reviewmodelhtitle">Return Or Replace Reson</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12" align="center">
            <form id="replaceorreturnorderform" method="POST">          
              <!-- <div class="form-group">
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
                <input type="hidden" name="action" value="saveRating">
              </div> -->    
              <!-- <div class="form-group">
                <label for="usr">Title*</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div> -->
              <input type="hidden" class="form-control order_product_id" id="order_product_id" name="order_product_id" value="">
              <input type="hidden" class="form-control user_id" id="user_id" value="<?php echo customersessionid();?>">
              
              <div class="col-md-12">
                <label for="comment">Enter Reson</label>
                <textarea  rows="3" id="reson" name="reson" class="form-control Comment"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-success submitreturnreson" id="submitreturnreson">Submit</button> <!-- <button type="button" class="btn btn-info" id="cancelReview">Cancel</button> -->
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
<!--ReturnorReplaceModal rating model end-->
<script type="text/javascript">
  $('a.addproductreview').click(function(){
    var pid = $(this).attr("href-id");
    $(".product_id").val(pid);
    $("#reviewModal").modal("show");
  });
  $('a.ReturnorReplace').click(function(){
    var opid = $(this).attr("href-opid");
    $(".order_product_id").val(opid);
    $("#ReturnorReplaceModal").modal("show");
  });
</script>

<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});

$(".deleteselected").click(function(e){
    // alert("hi");
    var ids = new Array();
    var o_id = $("#o_id").val();
    // alert(o_id); 
    $("input:checkbox[name=check]:checked").each(function () {
      ids.push($(this).val());
        // alert(" Value: " + $(this).val());
    });


      if(ids.length > 0){
        // console.log(ids);
        var val = confirm("Sure you want to Cancel Order ?");
        if(val){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>home/ChangeMultipleOrderStatus",
              data:{table:'orders',pid:ids,o_id:o_id,action:"cancel",dstatus:5},
              dataType:'json',
              success: function(response) {
                if (response.status == 1){
                  $.notify(response.msg, "success");
                  setTimeout(function(){location.reload()},1000);
                }else{
                  $.notify(response.msg, "error");
                }
              }
            });
        }
      }else{
        alert('please select any one product.');
      }
    
});
</script>