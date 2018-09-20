<!DOCTYPE html>

<?php
//renz. prevent other users to visit this page
include('php/session.php');
/*
$sql1 = "SELECT * FROM user WHERE Username = '$user_check'";
$result1 = @mysqli_query($con,$sql1);
$row1 = @mysqli_fetch_array($result1,MYSQLI_ASSOC);

$count = @mysqli_num_rows($result1);
*/

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
  <title>XUCMPC | Registration</title>
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
    <p class="login-box-msg">Register new user</p>


    <!-- renz -->
    
    <!-- check password -->
    <script type="text/javascript">
    var check = function() {
      if (document.getElementById('reg_password').value ==
        document.getElementById('reg_password2').value) {
        document.getElementById('message').style.color = 'green';
        } else {
          document.getElementById('message').style.color = 'red';
         // document.getElementById('message').innerHTML = 'Password does not match.';
          alert("Password does not match.")
          }
      }
    </script>

    <form action="php/addUser.php" method="POST">
      <div class="form-group has-feedback">
        <select type="text" class="form-control" name="reg_type" onchange="if (this.value=='1' || this.value=='2'){this.form['reg_load'].style.visibility='hidden'}else {this.form['reg_load'].style.visibility='visible'};">
          <option value="0">Student</option>
          <option value="1">Cashier</option>
          <option value="2">Administrator</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Load" name="reg_load" style="visibility:visible;" autocomplete="off">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="First Name" autofocus name="reg_fname" pattern="[a-zA-Z]{1,}" autocomplete="off" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Last Name" name="reg_lname"pattern="[a-zA-Z]{1,}" autocomplete="off" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="MI" name="reg_mname" pattern="[a-zA-Z.]{1,}" autocomplete="off" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Suffix" name="reg_suffix" autocomplete="off" pattern="[a-zA-Z.]{1,}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="reg_password" name="reg_password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" id="reg_password2" name="reg_password2" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Card No." name="reg_idno" pattern="[0-9]{1,10}" autocomplete="off" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
         <span id='message'></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <!--<input type="checkbox"> I agree to the <a href="#">terms</a>-->
              <a href="admin.php"> <span class="glyphicon glyphicon-chevron-left" style="font-size:13px;"></span>Back to home page.</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="check();" name="reg_button">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
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
