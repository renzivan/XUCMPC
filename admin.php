<!DOCTYPE html>
<?php 
//renz. prevent other users to visit this page
include('php/session.php');
date_default_timezone_set('Asia/Bangkok');
$date = date('m/d/Y');
if(isset($_POST['submit']))
{
	$date = $_POST['dick_date'];
	$product_query_date = "SELECT SUM(th.Quantity) as total, pro.Product_Name as name FROM transaction_history as th, product as pro 
						WHERE th.Product_Name = pro.ID AND th.Date_Added = '$date' GROUP BY name ORDER BY total DESC LIMIT 10";
//// Edited 25/02/2018
	$least_seller_date = mysqli_query($con,"SELECT SUM(th.Quantity) as total, pro.Product_Name as name FROM transaction_history as th, product as pro 
						WHERE th.Product_Name = pro.ID AND th.Date_Added = '$date' GROUP BY name ORDER BY total ASC LIMIT 10");
	$least_seller_date2 = mysqli_query($con,"SELECT SUM(th.Quantity) as total, pro.Product_Name as name FROM transaction_history as th, product as pro 
						WHERE th.Product_Name = pro.ID AND th.Date_Added = '$date' GROUP BY name ORDER BY total ASC LIMIT 10");
////
}
else{
	$product_query_date = "SELECT SUM(th.Quantity) as total, pro.Product_Name as name FROM transaction_history as th, product as pro 
						WHERE th.Product_Name = pro.ID AND th.Date_Added = '$date' GROUP BY name ORDER BY total DESC LIMIT 10";
//// Edited 25/02/2018
	$least_seller_date = mysqli_query($con,"SELECT SUM(th.Quantity) as total, pro.Product_Name as name FROM transaction_history as th, product as pro 
						WHERE th.Product_Name = pro.ID AND th.Date_Added = '$date' GROUP BY name ORDER BY total ASC LIMIT 10");
	$least_seller_date2 = mysqli_query($con,"SELECT SUM(th.Quantity) as total, pro.Product_Name as name FROM transaction_history as th, product as pro 
						WHERE th.Product_Name = pro.ID AND th.Date_Added = '$date' GROUP BY name ORDER BY total ASC LIMIT 10");
////
}
$active_d = "SELECT COUNT(Status) as total FROM user WHERE Status = 'Active'";
$inactive_d = "SELECT COUNT(Status) as total FROM user WHERE Status = 'Inactive'";
$status_d = "SELECT Status as name FROM user GROUP BY name";
$total_member_query = "SELECT COUNT(Status) as total FROM user";
$product_query = "SELECT Product_Name as name, Quantity_Sold as total FROM product ORDER BY Quantity_Sold DESC LIMIT 10 ";
$product_query_line = "SELECT Product_Name as name, Quantity as stock, Quantity_Sold as sold FROM product ORDER BY Quantity_Sold";
//// Edited 25/02/2018
$least_seller_result =	mysqli_query($con,"SELECT Product_Name as name, Quantity_Sold as total FROM product ORDER BY Quantity_Sold ASC LIMIT 10");
$least_seller_result2 =	mysqli_query($con,"SELECT Product_Name as name, Quantity_Sold as total FROM product ORDER BY Quantity_Sold ASC LIMIT 10");
///
$result = mysqli_query($con,$active_d);
$inresult = mysqli_query($con,$inactive_d);
$total_member_result = mysqli_query($con,$total_member_query);
$product_result = mysqli_query($con,$product_query);
$product_result2 = mysqli_query($con,$product_query);
$product_result_date = mysqli_query($con,$product_query_date);
$product_result_date2 = mysqli_query($con,$product_query_date);
$product_result_line = mysqli_query($con,$product_query_line);
$product_result_line2 = mysqli_query($con,$product_query_line);
$product_result_line3 = mysqli_query($con,$product_query_line);
$status_result = mysqli_query($con,$status_d);
$Colawr = array("#00a65a", "#f56954"); 
$Colawr_Counter = 0;

$active_data = mysqli_fetch_assoc($result);
$inactive_data = mysqli_fetch_assoc($inresult);
$total_member_data = mysqli_fetch_assoc($total_member_result);


/*
$sql1 = "SELECT * FROM user WHERE Username = '$user_check'";
$result1 = @mysqli_query($con,$sql1);
$row1 = @mysqli_fetch_array($result1,MYSQLI_ASSOC);

$count = @mysqli_num_rows($result1);
*/
//get privilege
if($getPrivilege==0){
    header("location: cardholder.php");
}elseif($getPrivilege==1){
    header("location: cashier.php");
}elseif($getPrivilege==2){

}
//prevent end
//end renz
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>XUCMPC | <?php echo $session_fname; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>XU</b>CMPC</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> 

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs" ><?php echo $session_fname." ".$session_lname; ?></span><span style="font-size:10px; padding-left:5px;" class="glyphicon glyphicon-chevron-down"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="padding-top: 20%;">
                <p>
                  <?php echo $session_fname." ".$session_lname; ?> - Administrator
                  <small>Member since <?php echo $getDate; ?> </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
       -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="inventory.php">
            <i class="fa fa-dashboard"></i> <span>Inventory</span>
          </a>
        </li>
		<li>
          <a href="user_list.php">
            <i class="fa fa-dashboard"></i> <span>User List</span>
          </a>
        </li>
		<li>
          <a href="manual_admin.php">
            <i class="fa fa-dashboard"></i> <span>User Manual</span>
          </a>
        </li>
		
       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Control panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4><?php echo $total_member_data['total']; ?></h4>

              <p>Registered Accounts</p>
            </div>
            <div class="icon">
              <!-- <a href="register.php"><i class="ion ion-person-add"></i><a/> -->
            </div>
            <a href="register.php" class="small-box-footer">Create Account <i class="glyphicon glyphicon-plus"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Account</h4>

              <p>View All Accounts</p>
            </div>
            <div class="icon">
            </div>
            <a href="pages/scan.php" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Loading Center</h4>

              <p>Reload Account</p>
            </div>
            <div class="icon">
            </div>
            <a href="load_center.php" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>Product Center</h4>

              <p>Add Product</p>
            </div>
            <div class="icon">
            </div>
            <a href="add_product.php" class="small-box-footer">Click here <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sales</h3> <br/> 
               <span class="fa fa-genderless" style="color:#d5d9e0;"></span>Stock<br>
               <span class="fa fa-genderless" style="color:#54a1c8;"></span>Sold

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.nav-tabs-custom -->
		  <!-- BAR CHART2 -->
          <div class="box box-success">
            <div class="box-header with-border">
			  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
				  <form method="post" action="admin.php">
                  <input type="text" id="datepicker" name="dick_date" value="<?php echo $date; ?>">
				  <button type="submit" name="submit">Submit</button>
				  </form>
              </div>
			  <h3 class="box-title">Best Seller On A Specific Date</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart2" style="height:230px"></canvas>
              </div>
            </div>
			 <h4 class="box-title">&nbsp &nbsp Least Seller On A Specific Date</h3>
			<div class="box-body">
              <div class="chart">
                <canvas id="leastSeller2" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
			  <h3 class="box-title">Best Seller Of All Time</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
			  <h3 class="box-title">Least Seller Of All Time</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="leastSeller" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          


        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- DONUT CHART -->
          <div class="box box-danger">
		  <div class="row" style="margin-left: 0px;margin-right: 0px;">
            <div class="box-header with-border">
              <h3 class="box-title">Status</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body col-md-8">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
			<div class="col-md-4">
                  <ul class="chart-legend clearfix">
				  <?php
					while ($status_data = mysqli_fetch_assoc($status_result))
					{
						echo "<li><i class='fa fa-circle-o' style='color: ".$Colawr[$Colawr_Counter++].";'></i> ".$status_data['name']."</li>"; 
					}
					?>
                  </ul>
            </div>
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
        
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; AdminLTE</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<script>
  $(function () {
	//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  format: ('mm/dd/yyyy')
	})
	$('#datepicker2').datepicker({
      autoclose: true,
	  format: ('mm/dd/yyyy')
	})
	$('#calendar').datepicker({
	  format: ('mm/dd/yyyy'),
	  todayHighlight: true
    })
	///////////////////////////
	///////////////////////////
	
    var areaChartData = {
      labels  : [<?php while ($product_data = mysqli_fetch_assoc($product_result)){  echo "'".$product_data['name']."',"; } ?>],
	  datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		  data                : [<?php while ($product_data2 = mysqli_fetch_assoc($product_result2)){ echo $product_data2['total'].","; } ?>]
        }
      ]
    }
	var areaChartData2 = {
      labels  : [<?php while ($product_data_date = mysqli_fetch_assoc($product_result_date)){  echo "'".$product_data_date['name']."',"; } ?>],
	  datasets: [
        {
          label               : 'Electronics',
          fillColor           : '#00a65a',
          strokeColor         : '#00a65a',
          pointColor          : '#00a65a',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		  data                : [<?php while ($product_data_date2 = mysqli_fetch_assoc($product_result_date2)){ echo $product_data_date2['total'].","; } ?>]
        }
      ]
    }
	var areaChartOptions = {
	  
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
	
    //-------------
    //- LINE CHART -
    //--------------
	var lineChartData = {
      labels  : [<?php while ($product_data_line = mysqli_fetch_assoc($product_result_line)){  echo "'".$product_data_line['name']."',"; } ?>],
      datasets: [
        {
          label               : 'Quantity',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php while ($product_data_line2 = mysqli_fetch_assoc($product_result_line2)){ echo $product_data_line2['stock'].","; } ?>]
        },
        {
          label               : 'Quantity_Sold',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php while ($product_data_line3 = mysqli_fetch_assoc($product_result_line3)){ echo $product_data_line3['sold'].","; } ?>]
        }
      ]
    }
	
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(lineChartData, lineChartOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
	  
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }
    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
	//-------------
    //- BAR CHART2 -
    //-------------
	var barChartCanvas2                   = $('#barChart2').get(0).getContext('2d')
    var barChart2                         = new Chart(barChartCanvas2)
    var barChartData2                     = areaChartData2
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    barChart2.Bar(barChartData2, barChartOptions)
	//---------------
    //- Least Seller -
    //---------------
	var leastSellerCanvas                   = $('#leastSeller').get(0).getContext('2d')
    var leastSeller                         = new Chart(leastSellerCanvas)
    var leastSellerData                     = {
      labels  : [<?php while ($least_seller_data = mysqli_fetch_assoc($least_seller_result)){  echo "'".$least_seller_data['name']."',"; } ?>],
	  datasets: [
        {
          label               : 'Electronics',
          fillColor           : '#00a65a',
          strokeColor         : '#00a65a',
          pointColor          : '#00a65a',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		  data                : [<?php while ($least_seller_data2 = mysqli_fetch_assoc($least_seller_result2)){ echo $least_seller_data2['total'].","; } ?>]
        }
      ]
    }
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    leastSeller.Bar(leastSellerData, barChartOptions)
	//----------------
    //- Least Seller2 -
    //----------------
	var leastSellerCanvas2                   = $('#leastSeller2').get(0).getContext('2d')
    var leastSeller2                         = new Chart(leastSellerCanvas2)
    var leastSellerData2                     = {
      labels  : [<?php while ($leastseller_date = mysqli_fetch_assoc($least_seller_date)){  echo "'".$leastseller_date['name']."',"; } ?>],
	  datasets: [
        {
          label               : 'Electronics',
          fillColor           : '#00a65a',
          strokeColor         : '#00a65a',
          pointColor          : '#00a65a',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
		  data                : [<?php while ($leastseller_data2 = mysqli_fetch_assoc($least_seller_date2)){ echo $leastseller_data2['total'].","; } ?>]
        }
      ]
    }
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    leastSeller2.Bar(leastSellerData2, barChartOptions)
	//-------------
    //- PIE CHART -
    //-------------

	

    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : <?php echo "'".$inactive_data['total']."'"; ?>,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Inactive'
      },
      {
        value    : <?php echo "'".$active_data['total']."'"; ?>,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Active'
      },
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

  })
</script>
</body>
</html>
