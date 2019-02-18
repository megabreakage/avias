<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Avias - Login</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url("images/logo2.png")?>">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
    <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
  </head>

  <body class="fixed-nav sticky-footer bg-dark landing" id="page-top">
    <div class="container">
      <div class="col-md-4 offset-md-4 pt login">
        <form id="login">
          <div class="row">
            <div class="col-md-12">
              <h5>Login</h5>
            </div>
            <div class="col-md-12 pt">
              <input class="form-control" type="text" name="username" placeholder="Username">
            </div>
            <div class="col-md-12 pt">
              <input class="form-control" type="password" name="password" placeholder="password">
            </div>
            <div class="col-md-12 pt">
              <div class="row">
                <div class="col-md-6">
                  Forgot password? <a href="auth/reset">Reset</a>
                </div>
                <div class="col-md-6 text-right">
                  <button type="submit" class="aviaBtn btn btn-primary">Login</button>
                </div>
              </div>
            </div>
            <div class="col-md-12 pt">
              <div id="login_response" class="col-md-12 pb alert alert-danger text-center hidden">
                Username or password missmatch!
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('js/login.js')?>"></script>
</html>
