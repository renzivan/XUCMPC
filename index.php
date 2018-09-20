
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>XUCMPC | Log in</title>
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>XU</b>CMPC</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

  <!--Added by renz -->
  

  <?php
      include "php/connection.php";
      session_start();
      $_SESSION['$ID_cardholder_session'] = "Inactive Acc.";  
      if($_SERVER["REQUEST_METHOD"] == "POST") {
                  // username and password sent from form 
                  
                  $myusername = @mysqli_real_escape_string($con,$_POST['username']);
                  $mypassword = @mysqli_real_escape_string($con,$_POST['password']); 
                  
                  $sql = "SELECT * FROM user WHERE BINARY ID = '$myusername' and BINARY Password = '$mypassword' and Status = 'Active'";
                  $result = @mysqli_query($con,$sql);
                  $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
                  
                  $count = @mysqli_num_rows($result);

                  //get privilege
                  $getPrivilege = $row['Privilege'];
                  
                  // If result matched $myusername and $mypassword, table row must be 1 row
                
                  if($count == 1) {
                     $_SESSION['login_user'] = $myusername;
                     
                     if($getPrivilege==0){
                        header("location: cardholder.php");
                     }elseif($getPrivilege==1){
                        header("location: cashier.php"); 
                     }elseif($getPrivilege==2){
                        header("location: admin.php");
                     }
                     
                  }else {
                      echo "<p style='color:red'>Username or password does not match. Or the account has been deactivated</p>";
                  }
     }


  ?>


    <form action="" method="post" name="login">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" autofocus autocomplete="off" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button name ="submit" type="submit" class="btn btn-primary btn-block btn-flat" value="Login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
