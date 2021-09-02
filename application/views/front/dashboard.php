<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
  .row.content {height: 550px}
  
  /* Set gray background color and 100% height */
  .sidenav {
    background-color: #f1f1f1;
    height: 100%;
  }
      
  /* On small screens, set height to 'auto' for the grid */
  @media screen and (max-width: 767px) {
    .row.content {height: auto;} 
  }

  /*dashbord css*/
  
  .dashboard-widget {
      /*background: #fff;*/
      padding: 20px 15px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.02);
      transition: all 0.3s;
      -webkit-transition: all 0.3s;
  }
  .c-pointer {
      cursor: pointer;
  }
  .dashboard-widget a, .dashboard-widget a:hover {
      color: #fff;
  }
  .d-block {
    display: block!important;
  }
  .dashboard-widget i {
    width: 44px;
    height: 44px;
    line-height: 46px;
    background: rgba(255, 255, 255, .3);
    border-radius: 50%;
    font-size: 16px;
    margin-bottom: 15px;
    color: #fff;
  }
  .fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
  }
  .dashboard-widget .title {
      font-size: 15px;
      font-weight: 700;
  }
  .d-block {
      display: block!important;
  }
  .text-center {
      text-align: center!important;
  }
  .fltn{
    float: none !important;
  }
</style>
<div class="container-fluid pt-10 bgp">
  <div class="row content">
    <?php include('dashboardsidebar.php'); ?>
    <div class="col-sm-12 col-lg-9">
      <!-- dashboard box start -->
      <div class="row">
        <div class="col-sm-3">
           
          <div class="dashboard-widget text-center commonfroncolort mt-4 c-pointer">
            <a href="<?= base_url('orderhistory?delivery_status=1') ?>" class="d-block">
                <i class="fa fa-building"></i>
                <span class="d-block title"><?php echo $pd =  $this->Common_model->getRecordCount('orders',array('user_id'=>customersessionid(),'status'=>1,'delivery_status'=>1)); 
                ?></span>
                <span class="d-block sub-title">Pending Orders</span>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="dashboard-widget text-center commonfroncolort mt-4 c-pointer">
            <a href="<?= base_url('orderhistory?delivery_status=2') ?>" class="d-block">
                <i class="fa fa-building"></i>
                <span class="d-block title"><?php echo $this->Common_model->getRecordCount('orders',array('user_id'=>customersessionid(),'status'=>1,'delivery_status'=>2)); ?></span>
                <span class="d-block sub-title">Accepted orders</span>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="dashboard-widget text-center commonfroncolort mt-4 c-pointer">
            <a href="<?= base_url('orderhistory?delivery_status=4') ?>" class="d-block">
                <i class="fa fa-building"></i>
                <span class="d-block title"><?php echo $this->Common_model->getRecordCount('orders',array('user_id'=>customersessionid(),'status'=>1,'delivery_status'=>4)); ?></span>
                <span class="d-block sub-title">Completed Orders</span>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="dashboard-widget text-center commonfroncolort mt-4 c-pointer">
            <a href="<?= base_url('orderhistory?delivery_status=5') ?>" class="d-block">
                <i class="fa fa-building"></i>
                <span class="d-block title"><?php echo $this->Common_model->getRecordCount('orders',array('user_id'=>customersessionid(),'status'=>1,'delivery_status'=>5)); ?></span>
                <span class="d-block sub-title">Cancel Orders</span>
            </a>
          </div>
        </div>
      </div>
      <!-- dashboard box End -->
    </div>
  </div>
</div>
