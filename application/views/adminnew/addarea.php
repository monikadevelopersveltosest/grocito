<?php //$this->load->view('adminnew/nav'); ?>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

    <?php 
    if($area_data) { 
      ?>

      <h1>Edit Categories</h1>

      <?php 

        }

        else

        {

      ?>

      <h1>Add Area</h1>

      <?php 

        }

      ?>

    </section>



    <!-- Main content -->

    <section class="content">



      <!-- SELECT2 EXAMPLE -->

      <div class="box box-default">

        

        <!-- /.box-header -->

        <div class="box-body">

          <div class="row">

          <?php 

            if(isset($success) && !empty($success))

            {
              echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button><h4><i class="fa fa-spinner fa-spin"></i>'.$success.'</h4></div>';
            echo '<meta http-equiv="refresh" content="2;url='.base_url('adminnew/areas').'">';
              ?>

              <!-- <div class="alert alert-success" align="center"> -->

              <!-- <strong><?php //echo $success; ?></strong> -->

              <!-- </div> -->
            <?php   
            }
            if(isset($error) && !empty($error)){
            ?>
              <div class="alert alert-danger" align="center">
                <strong><?php echo $error; ?></strong>
                </div>
            <?php } ?>
          <form role="form" enctype="multipart/form-data" method="post" action="">
            <div class="col-md-6">
              <div class="form-group">
                <label>Area Name</label>
                <input type="text" class="form-control" name="area_name" value="<?php echo (!empty($area_data) && !empty($area_data['area_name']) ? $area_data['area_name'] : "" )?>" required>
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="form-group">
                <label>Zip Code</label>
                <input type="text" class="form-control" name="area_zipcode" value="<?php echo (!empty($area_data) && !empty($area_data['area_zipcode']) ? $area_data['area_zipcode'] : "" )?>" required>
              </div>
            </div> -->
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <select name="city" class="form-control" required>
                  <option>Select City</option>
                  <?php 
                    if(!empty($all_city)){
                      foreach($all_city as $key=> $value){
                        ?>
                        <option <?php echo !empty($area_data['city']) && $area_data['city']==$value['name'] ? 'selected' : ''; ?> ><?php echo $value['name']; ?></option>
                        <?php
                      }
                    }
                  ?>
                </select>
                <!-- <input type="text" class="form-control" name="city" value="<?php echo (!empty($area_data) && !empty($area_data['city']) ? $area_data['city'] : "" )?>" required> -->
              </div>
            </div>
            <div class="col-md-12 mt-5">
              <input type="hidden" name="area_id" value="<?php echo (!empty($area_data) && !empty($area_data['area_id']) ? $area_data['area_id'] : "" )?>">
               <button type="submit" name="submit"  class="btn btn-primary">Save</button>
                      <!-- <button type="reset" class="btn btn-primary">Reset</button> -->
            </div>
          </form>

          <!-- /.col -->

          </div>

          <!-- /.row -->

        </div>

        <!-- /.box-body -->

      </div>

      <!-- /.box -->





    </section>

    <!-- /.content -->

  </div>

  <script type="text/javascript">
    $('#shop_id').change(function(){
    var shop_id = $(this).val();    
    if(shop_id){
        $.ajax({
           type:"POST",
           url:"<?php echo base_url()?>adminnew/GetParentCategories",
           data:{shop_id:shop_id},
           success:function(res){               
            if(res){

                $("#parent_id").html(res);
           
            }else{
               $("#parent_id").empty();
            }
           }
        });
    }else{
        $("#parent_id").empty();
    }      
   });
  </script>