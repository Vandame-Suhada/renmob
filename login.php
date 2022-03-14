<?php
session_start();
$_SESSION['username']='';
unset ($_SESSION['username']);
session_destroy();
if(isset($_SESSION['username'])){
  header('location:index.php');}
  require_once("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Renmob</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Icons -->
    <link rel="icon" type="image/png" href="img/logo.png">
	
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <style type="text/css">
    .form-conatiner{
      padding: 30px 25px;
      margin-top: 25vh;
    }
  </style>

</head>
<body style="background: url('img/Background_login.png') no-repeat">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <!-- form start-->
          <form action="login_proses.php" class="form-conatiner" method="post">
            <h2>Login</h2><br>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" placeholder="username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" id="form-password" placeholder="Password">
            </div>
            <div>
              <input type="checkbox" id="form-checkbox"> Show password
            </div class="form-group has-feedback">
              <input type="submit" class="btn btn-info btn-block" name="submit" value="Login">
          </form>
        <!-- form end-->
        </div>
        <div class="col-md-2 col-sm-4 col-xs-12"></div>
    </div>
  </div>
</body>
</html>

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){   
        $('#form-checkbox').click(function(){
          if($(this).is(':checked')){
            $('#form-password').attr('type','text');
          }else{
            $('#form-password').attr('type','password');
          }
        });
      });
    </script>