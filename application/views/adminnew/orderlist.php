<div class="content-wrapper">
  <section class="content-header">
    <h1> <img src="<?php echo base_url().'common_assets/images/user.png';?>" style="width: 30px">Orders<small></small></h1>
  </section>
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header col-md-6" style="float: left;">
         <!-- <h3 class="box-title"><a href="<?php //echo base_url();?>adminnew/AddCustomer" class="btn btn-primary">Add Customer</a></h3>-->
        </div>
        <div class="box-header col-md-6" style="float: right"></div>
        <div class="clearfix"></div>
        <div class="box-body table-responsive">
          <table id="customertable" class="table table-bordered table-hover">
            <thead>
              <tr>
              <th>Id</th>

                <th>order Id</th>
                <th>total Quantity</th>
                <th>user ID</th>
                
                <th>Delivery Address</th>
                <th>Status</th>
                <th>total order</th>

                <!--<th>Date</th>-->
              <!--  <th>Status</th> -->
                <th>Action</th>                
              </tr>
            </thead>
            <tbody>
              <?php $count = 1; 
                if(!empty($order_data)){
                  foreach ($order_data as $getdata) { 
                   // p($getdata);

              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php  echo (!empty($getdata['id'])?$getdata['id']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['order_id'])?$getdata['order_id']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['user_id'])?$getdata['user_id']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['delivery_address'])?$getdata['delivery_address']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['status'])?$getdata['status']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['order_total'])?$getdata['order_total']:'none'); ?></td>

                <td>
                     <!--<a href="<?php echo base_url() ?>adminnew/AddCustomer/<?php echo  $getdata['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
                     <?php  if($getdata['status']==0){?>
     <a href="javascript:void(0)" href-data="<?php  echo  $getdata['id']; ?>" class="orderactive" title="Change status"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>

                  <?php } if($getdata['status']==1){?>
                    <a href="javascript:void(0)" href-data="<?php  echo  $getdata['id']; ?>" class="orderdeactive" title="Change status"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>

                  <?php }?>
             
                    <!--<a href="<?php echo base_url() ?>adminnew/AddCustomer/<?php echo  $getdata['id']; ?>" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->

                    <a href="javascript:void(0)" href-data="<?php echo  $getdata['id']; ?>" class="delete" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>

             <?php $count++; } } ?>  
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $(function () {

    $('#customertable').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": true,

      "ordering": true,

      "info": true,

      "autoWidth": false

    });
  });
  $(".delete").click(function(e){
    var val = confirm("Are you sure, you want to delete order ?");
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>adminnew/change_status",
        data:{tablename:'orders',id:id,status:3,whrcol:'id',whrstatuscol:'id',action:"Delete"},
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
  });
  $(".deactive").click(function(e){
        var val = confirm("Are you sure, you want to deactivate order ?");
        //e.preventDefault(); 
        var id = $(this).attr("href-data");
        //alert(href);
        //var btn = this;
        if(val){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>adminnew/change_status",
              data:{tablename:'orders',id:id,status:0,whrcol:'id',whrstatuscol:'status',action:"Deactive"},
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
  });
  $(".orderactive").click(function(e){
    var val = confirm("Are you, sure you want to activate order ?");
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>adminnew/change_status",
        data:{tablename:'orders',id:id,status:1,whrcol:'id',whrstatuscol:'status',action:"Active"},
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
  });
</script>