<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://localhost/6/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://localhost/6/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://localhost/6/public/admin/css/adminlte.min.css">
  
 
</head>
<body class="hold-transition register-page">

<div class="register-box">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    
    <div class="card-body">
    <?= $this->include("admin/layout/partials/errors");?>
      <p class="login-box-msg">Şifrenizi mi unuttunuz? Burada kolayca yeni bir şifre alabilirsiniz.</p>
      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">yeni şifre isteği</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="login.html">Giriş Yap</a>
      </p>
    </div>
  
    <!-- /.login-card-body -->
  </div>
</div>

<!-- jQuery -->
<script src="https://localhost/6/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://localhost/6/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

<script src="https://localhost/6/public/admin/js/adminlte.min.js"></script>

</body>
</html>

