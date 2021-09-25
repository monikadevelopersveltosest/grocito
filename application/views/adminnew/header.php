<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Grocito.com| Dashboard</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/Ionicons/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins  
       folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/dist/css/skins/_all-skins.min.css">
<!-- Morris chart -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/morris.js/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/jvectormap/jquery-jvectormap.css">
<!-- Date Picker -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url();?>backend_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>backend_assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>backend_assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>backend_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap-notify -->
<script src="<?php echo base_url();?>backend_assets/dist/js/bootstrap-notify.js"></script>
<script src="<?php echo base_url();?>backend_assets/dist/js/nicEdit-latest.js"></script>

<!--<script src="<?php echo base_url();?>backend_assets/js/cities.js"></script>-->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- Google Font -->
<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";
</script>
<style type="text/css">
    .skin-blue .main-header .navbar {
      background-color: #f65275  !important;
    }
    .skin-blue .main-header .logo {
      background-color: #FFF !important;
    }
    .skin-blue .main-header .navbar .sidebar-toggle:hover {
          background: rgba(0,0,0,0.1);
    }
    .skin-blue .sidebar-menu>li.active>a {
      border-left-color: #005551 !important;
    }
    .p10{
      padding : 10px;
    }
    .badge-red{
      background-color: red;
    }
    .error{
      color: red;
    }
    .fa-toggle-on{
      color: #00a65a;
      font-size: 24px;
    }
    .fa-eye{
      color: #eeaf49;
      font-size: 24px;
    }
    .fa-trash{
      color: red;
      font-size: 24px;
    }
    .fa-pencil-square-o{
      font-size: 24px;
    }
    .fa-toggle-off{
      font-size: 24px;
    }
    .skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a, .skin-blue .sidebar-menu>li.menu-open>a {
    color: #fff;
    background: #f65275;
    }
</style>
<style type="text/css">
  .pagination{
    width: auto !important;
    float: right !important;
    
  }
  .pagination p a{
  
    padding: 10px;
    
  }
  .current{
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
  }


</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?php  $session_userdata = $this->session->userdata(ADMIN_SESSION); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url();?>admin" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>ES</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><img src="<?php echo base_url();?>fornt_new_assests/logo/logo.png<?php //echo base_url().'uploads/'. getWebOptionValue('backlogo');?>" alt="<?php echo  "Grocito.com"; //getWebOptionValue('site_title');?>"></span> </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav"> <!--old image user2-160x160.jpg-->
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url();?>backend_assets/dist/img/avtar.jpg" class="user-image" alt="User Image"> <span class="hidden-xs"><?php echo (isset($session_userdata) && !empty($session_userdata) ? $session_userdata['first_name'] ." ". $session_userdata['last_name'] : '');?></span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li> <a href="<?php echo base_url();?>adminnew/manageprofile" class="btn btn-default btn-flat" style="width:100%;"><i class="fa fa-user"></i> My Profile</a> </li>
            <li> <a href="<?php echo base_url();?>adminnew/manageprofile" class="btn btn-default btn-flat" style="width:100%;"><i class="fa fa-key"></i> Password</a> </li>
            <li> <a href="<?php echo base_url();?>adminnew/logout" class="btn btn-default btn-flat" style="width:100%;"><i class="fa fa-sign-out"></i> Sign out</a> </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <style type="text/css">
   @media (max-width: 767px){
    .skin-blue .main-header .navbar .dropdown-menu li a{
        color: #000 !important;
    }
  }
  @media (max-width: 991px){
      .navbar-custom-menu>.navbar-nav>li>.dropdown-menu {
      background: #eee !important;
  }
}
  </style>
</header>
<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <li  > 
        <a href="<?php echo base_url();?>adminnew"><i class="fa fa-user"></i> <span>Dashboard</span></a> 
      </li>
      <li  > 
        <a href="<?php echo base_url();?>adminnew/orderlist"><i class="fa fa-user"></i> <span>Orders</span></a> 
      </li>
      <li class="treeview"> 
      <a href="#">
            <i class="fa fa-user"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        <ul class="treeview-menu">
          <li>
          <a href="<?php echo base_url();?>adminnew/sellerlist"><i class="fa fa-user"></i> <span>sellers</span></a> 

          </li>
          <li>
          <a href="<?php echo base_url();?>adminnew/Customerslist"><i class="fa fa-user"></i> <span>Customers</span></a> 

          </li>
        
        </ul>
      </li>
      <li> 
        <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Subscription Plan</span></a> 
      </li>
      <li> 
  <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Subscribed Seller</span></a> 
      </li>
      <li> 
        <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Payment Gateway</span></a> 
      </li>
      <li> 
        <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Business Type</span></a> 
      </li>
      <li> 
        <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Slider</span></a> 
      </li>
      <li> 
        <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Push Notification</span></a> 
      </li>
      <li> 
        <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Refer and Earn Commission</span></a> 
      </li>
      <li> 
        <a href="<?php echo base_url();?>adminnew/productlist"><i class="fa fa-user"></i> <span>Payment History</span></a> 
      </li>
      <li class="treeview"> 
      <a href="#">
            <i class="fa fa-user"></i>
            <span>Track Page View</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        <ul class="treeview-menu">
          <li>
          <a href="<?php echo base_url();?>adminnew/sellerlist"><i class="fa fa-user"></i> <span>Store View</span></a> 

          </li>
          <li>
          <a href="<?php echo base_url();?>adminnew/Customerslist"><i class="fa fa-user"></i> <span>Product View</span></a> 

          </li>
        
        </ul>
      </li>
      <li>
          <a href="<?php echo base_url();?>adminnew/faqlist1"><i class="fa fa-user"></i> <span>FAQ</span></a> 

          </li>
          <li>
          <a href="<?php echo base_url();?>adminnew/Customerslist"><i class="fa fa-user"></i> <span>About Us</span></a> 

          </li>
          <li>
          <a href="<?php echo base_url();?>adminnew/Customerslist"><i class="fa fa-user"></i> <span>Private Policy</span></a> 

          </li>
          <li>
          <a href="<?php echo base_url();?>adminnew/Customerslist"><i class="fa fa-user"></i> <span>Terms and Condition</span></a> 

          </li>
          <li class="treeview"> 
      <a href="#">
            <i class="fa fa-user"></i>
            <span>Help & Support</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        <ul class="treeview-menu">
          <li>
          <a href="<?php echo base_url();?>adminnew/sellerlist"><i class="fa fa-user"></i> <span>Contact Number</span></a> 

          </li>
          <li>
          <a href="<?php echo base_url();?>adminnew/Customerslist"><i class="fa fa-user"></i> <span>Email</span></a> 

          </li>
        
        </ul>
      </li>
      
      
     <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>-->
        <!--  <ul class="treeview-menu">
            <li > 
              <a href="<?php echo base_url();?>adminnew/commonsettings"><i class="fa fa-circle-o"></i> <span>Common Setting</span></a> 
            </li>
            <!--<li><a href="<?php echo base_url();?>adminnew/homebannerslider"><i class="fa fa-circle-o"></i>Home Banners</a></li>
            <li><a href="<?php echo base_url();?>adminnew/homebannerslidersec"><i class="fa fa-circle-o"></i>Home Banners 2</a></li>
            <li><a href="<?php echo base_url();?>adminnew/homebannersliderthird"><i class="fa fa-circle-o"></i>Home Banners 3</a></li>
            <li><a href="<?php echo base_url();?>adminnew/homebannersliderfourth"><i class="fa fa-circle-o"></i>Home Banners 4</a></li>
            <li><a href="<?php echo base_url();?>adminnew/homepopupimage"><i class="fa fa-circle-o"></i>Home Popup Image</a></li>
            <li><a href="<?php echo base_url();?>adminnew/landingpagslider"><i class="fa fa-circle-o"></i> Landing Slider Image</a></li>-->
          </ul>
      </li>
    </ul>
  </section>
</aside>