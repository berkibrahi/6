<?php $this->extend("admin/layout/main");?>
<?php $this->section("title");?>
<title>Şifre Yenileme</title>
<?php $this->endSection();?>
<?php $this->section("content");?>
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
    <?= $this->include("admin/layout/partials/errors");?>
      <p class="login-box-msg">Yeni şifrenize yalnızca bir adım kaldı,5 dakika içinde şifrenizi değiştirebilirsiniz.</p>
      <form action="<?= base_url(route_to('admin_reset_password')); ?>" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  name="password2"  placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">şifreyi değiştir</button>
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
<?php $this->endSection();?>