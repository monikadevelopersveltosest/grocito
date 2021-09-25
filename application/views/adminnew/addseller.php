<div class="content-wrapper">
  <section class="content-header">
    <h1> <img src="<?php echo base_url().'common_assets/images/user.png';?>" style="width: 30px">Add Seller<small></small></h1>
  </section>
  <section class="content">
  <div class="box box-default">
      <div class="box-body">
        <div class="row" style="margin: 0px">
          <?php if(isset($success) && !empty($success)){ ?>
            <div class="alert alert-success" align="center">
              <strong><?php echo $success; ?></strong>
            </div>
          <?php } 
            if(isset($error) && !empty($error)){
          ?>
            <div class="alert alert-danger" align="center">
              <strong><?php echo $error; ?></strong>
            </div>
          <?php } ?>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Seller Detail</a></li>
              <form role="form" enctype="multipart/form-data" method="post" action="" autocomplete="on">
                <div class="tab-content" style="padding: 0px">
                  <div class="active tab-pane" style="margin: 10px" id="activity">
                      <div class="col-md-6">
                        <!-- <div class="form-group">
                          <label>Registration Number</label>
                          <input type="text" class="form-control" name="shop_registration_no" value="<?php echo (!empty($shop_data) && !empty($shop_data['shop_registration_no']) ? $shop_data['shop_registration_no'] : '' ); ?>" >
                        </div> -->
                        <div class="form-group">
                            <div class="form-group">
                            <div class="form-group">
                            <label>Upload Store Logo</label>
                            <input type="file" name="image" class="form-control" value ="<?php  echo (!empty($shop_data) && !empty($shop_data['image']['name']) ? $shop_data['image']['name'] : '' )?>" >
                          </div>
                          <div class="form-group">
                          <label>Create Store Link</label>
                          <input type="text" class="form-control" name="storeLink" value="<?php  echo (!empty($shop_data) && !empty($shop_data['storeLink']) ? $shop_data['storeLink'] : '' )?>" required>
                        </div>
                         <div class="form-group">
                          <label>Business Name</label>
                          <input type="text" class="form-control" name="businessname" value="<?php echo (!empty($shop_data) && !empty($shop_data['businessname']) ? $shop_data['businessname'] : '' ); ?>" required>
                        </div>
                        <div class="form-group">
                          <label>Business Category</label>
                          <input type="text" class="form-control" name="businesscategory" value="<?php echo (!empty($shop_data) && !empty($shop_data['businesscategory']) ? $shop_data['businesscategory'] : '' )?>" required>
                        </div>
                          <div class="form-group">
                            <label>Select Product/Service</label>
                            <input type="text" class="form-control" name="product" value="<?php echo (!empty($shop_data) && !empty($shop_data['product']) ? $shop_data['product'] : '' )?>" required>
                          </div>
                          <div class="form-group">
                            <label>Store Live Location</label>
                            <input type="text" class="form-control" name="livelocation" value="<?php echo (!empty($shop_data) && !empty($shop_data['livelocation']) ? $shop_data['livelocation'] : '' )?>" required>
                          </div>
                          <div class="form-group">
                            <label>GSTIN</label>
                            <input type="text" class="form-control" name="gstin_number_or_other" value="<?php echo (!empty($shop_data) && !empty($shop_data['gstin_number_or_other']) ? $shop_data['gstin_number_or_other'] : '' )?>" required>
                          </div>
                          <div class="col-md-12" style="margin: 10px">
                  <?php if(isset($shop_data['shop_id']) && !empty($shop_data['shop_id'])){ ?>
                    <input type="hidden" name="shop_id" value="<?php echo (!empty($shop_data) && !empty($shop_data['shop_id']) ? $shop_data['shop_id'] : "" )?>">
                    <button type="submit" name="update"  class="btn btn-primary pull-right">Update</button>
                  <?PHP  }else{ ?>
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                  <?php } ?>
                </div>
              </form>

          </div>
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
        data:{tablename:'users',id:id,status:3,whrcol:'id',whrstatuscol:'status',action:"Delete"},
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
