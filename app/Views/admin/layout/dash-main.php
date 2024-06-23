<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("public/plugins/fontawesome-free/css/all.min.css")?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("public/admin/css/adminlte.min.css")?>">
  <?php $this->renderSection("style"); ?>
</head>
<body class="hold-transition sidebar-mini">
  <?php if(session()->isLogin){
    echo $this->include("admin/layout/partials/navbar");
    echo $this->include("admin/layout/partials/sidebar");
  }
  ?>

<?php $this->renderSection("content"); ?>
<?php if(session()->isLogin){
    echo $this->include("admin/layout/partials/footer");
   
  }
  ?>


<script src="<?= base_url("public/plugins/jquery/jquery.min.js")?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("public/plugins/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("public/admin/js/adminlte.min.js")?>"></script>
<?php $this->renderSection("script"); ?>
</body>
</html>