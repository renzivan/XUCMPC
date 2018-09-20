<!DOCTYPE html>

<?php
//renz. prevent other users to visit this page
include('php/session.php');

//get privilege
if($getPrivilege==0){
    header("location: index2.php");
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
  <title>XUCMPC | Load Center</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>XU</b>CMPC</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Add Load to User</p>
    <form method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Load" name="add_load" style="visibility:visible;" pattern="[0-9]{1,6}" autocomplete="off"  title="Use only numbers and the limit is 6 characters" autofocus required>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Card No." name="add_id" autocomplete="off" pattern="[0-9]{1,20}" title="Use only numbers and the limit is 20 characters" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
         <span id='message'></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <a href="admin.php"> <span class="glyphicon glyphicon-chevron-left" style="font-size:13px;"></span>Back to home page.</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="check();" name="add_button">Add</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
	<?php
	if(ISSET($_POST['add_button']))
	{
		$Id_Add = $_POST['add_id'];
		$Load_Add = $_POST['add_load'];
		$x = 0;
		$y = 0;
		$Load_Total_d = "SELECT Load_Balance,Total_Load from user WHERE ID = $Id_Add";
		$Load_Total_result = mysqli_query($con,$Load_Total_d);
		if ($Load_Total_data = mysqli_fetch_assoc($Load_Total_result))
		{
			$x = $Load_Total_data['Load_Balance'];
		}
		$Load_Total_result2 = mysqli_query($con,$Load_Total_d);
		if ($Load_Total_data2 = mysqli_fetch_assoc($Load_Total_result2))
		{
			$y = $Load_Total_data2['Total_Load'];
		}		
		$x += $Load_Add;
		$y += $Load_Add;
		$update_query = "UPDATE user SET Load_Balance=$x, Total_Load=$y WHERE ID = $Id_Add";
		
		if ($con = mysqli_query($con,$update_query) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Success!')
			window.location.href='load_center.php';axq
			</SCRIPT>");
		} else {
			echo "Error: " . $update_query . "<br>" . $con->error;
		}

		$con->close();
	}
	?>
</div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->


<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
