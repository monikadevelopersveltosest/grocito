<div class="content-wrapper">
  <section class="content-header">
    <h1> <img src="<?php echo base_url().'common_assets/images/user.png';?>" style="width: 30px">Seller<small></small></h1>
  </section>
  <section class="content">
    <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header col-md-6" style="float: left;">
          <h3 class="box-title"><a href="<?php echo base_url();?>adminnew/addseller" class="btn btn-primary">Add Seller</a></h3>
        </div>
        <div class="box-header col-md-6" style="float: right"></div>
        <div class="clearfix"></div>
        <div class="box-body table-responsive">
          <table id="customertable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>S.no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile_no</th>
                <th>Address</th>
                <!--<th>Date</th>-->
              <!--  <th>Status</th> -->
                <th>Action</th>                
              </tr>
            </thead>
            <tbody>
              <?php $count = 1; 
                if(!empty($seller_data)){
                  foreach ($seller_data as $getdata) { 
                   // p($getdata);

              ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php  echo (!empty($getdata['fname'])?$getdata['fname']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['email'])?$getdata['email']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['mobile'])?$getdata['mobile']:'none'); ?></td>
                <td><?php  echo (!empty($getdata['address'])?$getdata['address']:'none'); ?></td>
                <!--<td><?php  echo (!empty($getdata['create_at'])?$getdata['create_date']:'none'); ?></td>-->
                <td>
  
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
    var val = confirm("Are you sure, you want to delete user ?");
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>adminnew/change_status",
        data:{tablename:'users',id:id,status:3,whrcol:'id',whrstatuscol:'id',action:"Delete"},
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
        var val = confirm("Are you sure, you want to deactivate user ?");
        //e.preventDefault(); 
        var id = $(this).attr("href-data");
        //alert(href);
        //var btn = this;
        if(val){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>adminnew/change_status",
              data:{tablename:'users',id:id,status:0,whrcol:'id',whrstatuscol:'status',action:"Deactive"},
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
  $(".useractive").click(function(e){
    var val = confirm("Are you, sure you want to activate user ?");
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>adminnew/change_status",
        data:{tablename:'users',id:id,status:1,whrcol:'id',whrstatuscol:'status',action:"Active"},
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