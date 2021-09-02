<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
  .row.content {min-height: 550px}
  
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
  .page-title {
      position: relative;
  }
  .btn-secondary {
    background-color: #124b56!important;
  }
  .btn-secondary:hover {
    background-color: #124b56 !important;
  }
  .btn-secondary:not([disabled]):not(.disabled).active, .btn-secondary:not([disabled]):not(.disabled):active, .show>.btn-secondary.dropdown-toggle {
      background-color: #124b56 !important;
  }
</style>
<div class="container-fluid pt-10 bgp">
  <div class="row content">
    <?php include('dashboardsidebar.php'); ?>
    <div class="col-sm-12 col-lg-9">
      <div class="page-title">
        <div class="row">
          <h6 style="font-weight: 600">Purchase history</h6 style="font-weight: 600">
        </div>
      </div>
      <!-- dashboard box start -->
      <div class="row" style="background-color: #fff;border-radius: 0.25rem;margin-top: 10px">
        <div class="table-responsive">          
          <table class="table">
            <thead>
              <tr>
                <th>Invoice Id</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Delivery Status</th>
                <th>Payment Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(isset($orders) && !empty($orders)){ ?>
              <?php foreach($orders as $ordersarray){ ?>
                <tr>
                  <td><a href="<?php echo base_url().'home/invoice?invoice='.base64_encode($ordersarray['id']); ?>" style="color: #124b56;font-weight: 600;"><?php echo (isset($ordersarray['invoice_no']) && !empty($ordersarray['invoice_no']) ? $ordersarray['invoice_no'] : ''); ?></a></td>
                  <td><?php echo (isset($ordersarray['create_date']) && !empty($ordersarray['create_date']) ? $ordersarray['create_date'] : ''); ?></td>
                  <td><?php echo $ordersarray['grand_total']; ?></td>
                  <td><?php echo (isset($ordersarray['delivery_status_name']) && !empty($ordersarray['delivery_status_name']) ? $ordersarray['delivery_status_name'] : ''); ?></td>
                  <td><?php echo (isset($ordersarray['payment_status']) && !empty($ordersarray['payment_status']) ? $ordersarray['payment_status'] : ''); ?></td>
                  <td>
                    <div class="dropdown show">
                      <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 8px 8px">
                        <i class="fa fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url().'home/invoice?invoice='.base64_encode($ordersarray['id']); ?>">view</a>
                        <a class="dropdown-item" href="#">Delete</a>
                      </div>
                    </div>
                  </td>
                  
                </tr>
            <?php } }  ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- dashboard box End -->
    </div>
  </div>
</div>
