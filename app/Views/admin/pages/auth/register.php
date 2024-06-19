<?php $this->extend("admin/layout/main");?>
<?php $this->section("content");?>
<div class="register-box">
<?= $this->include("admin/layout/partials/errors");?>

  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
    
     
      <p class="login-box-msg"><?=lang("Register.view.register")?></p>

      <form method="POST" action="<?= base_url(route_to('admin_register')); ?>">

      
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="first_name" placeholder="<?=lang("Register.view.first_name")?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="sur_name" placeholder="<?=lang("Register.view.last_name")?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="<?=lang("Register.view.email")?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="<?=lang("Register.view.password")?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" class="form-control" name="password2" placeholder="<?=lang("Register.view.password2")?>">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                    <a href=""><?=lang("Register.view.contract")?></a>
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?=lang("Register.view.buton")?></button>
        </div>
        <!-- /.col -->
    </div>
</form>


     

      <a href="login.html" class="text-center"><?=lang("Register.view.member")?></a>
    </div>
    <!-- /.form-box -->
  </div>
</div>
<?php $this->endSection();?>