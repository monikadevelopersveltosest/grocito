<!-- Content Wrapper. Contains page content -->
<style type="text/css">
.pt-10{
    padding-top: 10px;
}
.pb-10{
    padding-bottom: 10px;
}
.inner-div{
	background-color: white;
	box-shadow: 1px 1px 3px 0px #ccc;
	padding: 8px 15px;
	border-radius: 7.5px;
	transition: all 500ms ease 0s;
	margin: 5px;
}
.inner-div:hover{
	transform: scale(1.1,1.1);
}
.pt-50{
	padding-top: 50px;
}
.inner-div p{
	color: #c5c5c5;
}
.inner-div h4{
	color: #717175;
	font-weight: 600;
	font-size: 20px;
}
.text-d p{
	font-size: 16px;
	padding: 10px;
	color: #262b36;
	font-weight: bold;
}
.pt-15{
	padding-top: 15px;
}
.sec-right-video{
	background-color: white;
	padding: 30px 20px;
	box-shadow: 1px 1px 3px 0px #ccc;
	border-right: 10px;
}
.box.latestNews {
    border-radius: 7px;
    border: none;
}
.refer{
	background-color: #898fff;
	padding: 6px;
}
.refer p{
	color: white;
	font-size: 20px;
}
.refers{
	margin-top: 10px;
	border:1px dashed #ccc;
}
.refers .panel-body{
    padding: 50px 0px 122px 0px;
}
.sub_heading{
	font-size: 25px;
	padding-bottom: 15px;
}
.form-group .copytarget{
	padding: 10px 10px;
	background-color: white;
	box-shadow: 1px 1px 3px 0px #ccc;
}
.btn-cls-learn{
	padding-top: 15px;
}
.amount_detail{
	padding: 20px;
	margin-top: 20px;
	background-color: white;
	box-shadow: 1px 1px 3px 0px #ccc;

}


.panel-green .panel-heading {
    background-color: #5cb85c;
    border-color: #5cb85c;
    color: #fff;
}
.home-page .fast-view-panel {
    height: 130px;
}
.panel-yellow .panel-heading {
    background-color: #f0ad4e;
    border-color: #f0ad4e;
    color: #fff;
}
.panel-red .panel-heading {
    background-color: #d9534f;
    border-color: #d9534f;
    color: #fff;
}

</style>
<script src="<?php echo base_url();?>backend_assets/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>backend_assets/highcharts/data.js"></script>
<script src="<?php echo base_url();?>backend_assets/highcharts/drilldown.js"></script>
<div class="content-wrapper" style="background-color: #fff8f1;" >
  <section class="top_sec pt-50 p10">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading fast-view-panel">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-clock-o fa-5x" style="font-size: 4em;"></i>
                        </div>
                        <div class="col-xs-9 text-right" style="padding-right: 9px;">
                            <div class="huge">
                                <div style="font-size: 25px;"><?= date('d.m.Y'); ?></div>
                                <div style="font-size: 16px;"><?= date('H:i:s'); ?></div>
                            </div>
                            <div style="padding-left: 6px;">Last login!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading fast-view-panel">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x" style="font-size: 4em;"></i>
                        </div>
                        <div class="col-xs-9 text-right" style="padding-right: 9px;">
                            <div class="huge"><?php echo $pd =  $this->Common_model->getRecordCount('users',array('status'=>1));?></div>
                            <div style="padding-left: 8px;">Sallers</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('adminnew/sellerlist') ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading fast-view-panel">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x" style="font-size: 4em;"></i>
                        </div>
                        <div class="col-xs-9 text-right" style="padding-right: 9px;">
                            <div class="huge"><?php echo $pd =  $this->Common_model->getRecordCount('users',array('status'=>1));?></div>
                            <div style="padding-left: 8px;">Users</div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('adminnew/Customerslist') ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="pull-right dropdown show">
                  <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-calendar"></i><i class="caret"></i>
                  </a>
                    <ul id="range" class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <li><a href="#" data-value="day">Today</a></li>
                        <li><a href="#" data-value="week">Week</a></li>
                        <li class="active"><a href="#" data-value="month">Month</a></li>
                        <li><a href="#" data-value="year">Year</a></li>
                    </ul>
                </div>
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Area Chart</h3>
              </div>
              <div class="panel-body">
                <div id="chart-sale" style="width: 100%; height: 260px;"></div>
              </div>
            </div>
        </div>
    </div>
  </section>
</div>
<!-- /.content-wrapper -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script> 

<script>
    
    /*
     * Chart for orders by mount/year 
     */
   /* $(function () {
    Highcharts.chart('container-by-month', {
    title: {
    text: 'Monthly Orders',
            x: - 20
    },
            subtitle: {
            text: 'Source: Orders table',
                    x: - 20
            },
            xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
            title: {
            text: 'Orders'
            },
                    plotLines: [{
                    value: 0,
                            width: 1,
                            color: '#808080'
                    }]
            },
            tooltip: {
            valueSuffix: ' Orders'
            },
            legend: {
            layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
            },
            series: [
<?php foreach ($ordersByMonth['years'] as $year) { ?>
                {
                name: '<?= $year ?>',
                        data: [<?= implode(',', $ordersByMonth['orders'][$year]) ?>]
                },
<?php } ?>
            ]
    });
    });*/
    $('#range a').on('click', function(e) {
    e.preventDefault();
    
    $(this).parent().parent().find('li').removeClass('active');
    
    $(this).parent().addClass('active');
    
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>/adminnew/ajax_data?range='+$(this).attr('data-value'),
        dataType: 'json',
        success: function(json) {
            console.log(json['membership']);
            if (typeof json['vendors'] == 'undefined' || typeof json['membership'] == 'undefined') { return false; }
            var option = {  
                shadowSize: 0,
                colors: ['#9FD5F1', '#1065D2'],
                bars: { 
                    show: true,
                    fill: true,
                    lineWidth: 1
                },
                grid: {
                    backgroundColor: '#FFFFFF',
                    hoverable: true
                },
                points: {
                    show: false
                },
                xaxis: {
                    show: true,
                    ticks: json['xaxis']
                }
            }
            
            $.plot('#chart-sale', [json['vendors'],json['membership']], option);   //json['customer']
                    
            $('#chart-sale').bind('plothover', function(event, pos, item) {
                $('.tooltip').remove();
              
                if (item) {
                    $('<div id="tooltip" class="tooltip top in"><div class="tooltip-arrow"></div><div class="tooltip-inner">' + item.datapoint[1].toFixed(2) + '</div></div>').prependTo('body');
                    
                    $('#tooltip').css({
                        position: 'absolute',
                        left: item.pageX - ($('#tooltip').outerWidth() / 2),
                        top: item.pageY - $('#tooltip').outerHeight(),
                        pointer: 'cusror'
                    }).fadeIn('slow');  
                    
                    $('#chart-sale').css('cursor', 'pointer');      
                } else {
                    $('#chart-sale').css('cursor', 'auto');
                }
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
           alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
    $('#range .active a').trigger('click');

</script>
