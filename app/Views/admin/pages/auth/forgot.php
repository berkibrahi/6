<?php $this->extend("admin/layout/main");?>
<?php $this->section("title");?>
<title>Şifremi Unuttum</title>
<?php $this->endSection();?>
<?php $this->section("content");?>
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
        <a href="<?= base_url(route_to('admin_login')); ?>">Giriş Yap</a>
      </p>
    </div>
  
    <!-- /.login-card-body -->
  </div>
</div>

<?php $this->endSection();?>

