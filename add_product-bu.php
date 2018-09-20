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
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>XUCMPC | Add Product</title>
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
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>XU</b>CMPC</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Add Product to the Database</p>
    <form method="POST">
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Barcode" name="pro_id" autocomplete="off" pattern="[0-9]{1,10}" autofocus required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Product Name" name="pro_name" style="visibility:visible;" pattern="[a-zA-Z ]{1,20}" autocomplete="off" required>
      </div>
	  <div class="form-group">
            <label>Type of Food</label>
            <select class="form-control select2" style="width: 100%;" name="pro_type">
                <option selected="selected">Dry Good</option>
                <option>Soup</option>
                <option>Seafood</option>
                <option>Meat</option>
                <option>Dairy</option>
                <option>Junk Food</option>
                <option>Veggies</option>
        </select>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Quantity" name="pro_qt" style="visibility:visible;" pattern="[0-9]{1,6}" autocomplete="off" required>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Price" name="pro_price" style="visibility:visible;" pattern="[0-9.]{1,10}" autocomplete="off" required>
      </div>
      <div class="row">
		<div class="col-xs-8">
			  <div class="checkbox icheck">
				<label>
				  <a href="admin.php"> <span class="glyphicon glyphicon-chevron-left" style="font-size:13px;"></span>Back to home page.</a>
				</label>
			  </div>
		</div>
			<div class="col-xs-4">
			  <button type="submit" class="btn btn-primary btn-block btn-flat" name="pro_button">Add</button>
			</div>
		
	</div>
    </form>
	<?php
	if(ISSET($_POST['pro_button']))
	{
		$Id_Pro = $_POST['pro_id'];
		$Type_Pro = $_POST['pro_type'];
		$Qt_Pro = $_POST['pro_qt'];
		$Name_Pro = $_POST['pro_name'];
		$Price_Pro = $_POST['pro_price'];
		$Insert_Query = "INSERT INTO product (ID, Product_name, Food_Type, Quantity, Price) VALUES 
            ($Id_Pro ,'$Name_Pro', '$Type_Pro', $Qt_Pro, $Price_Pro)";
         
		
		if ($con = mysqli_query($con,$Insert_Query) === TRUE) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Success!')
			window.location.href='add_product.php';axq
			</SCRIPT>");
		} else {
			echo "Error: " . $Insert_Query . "<br>" . $con->error;
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
