<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Giriş Yap</title>
 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/6/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="http://localhost/6/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/6/public/admin/css/adminlte.min.css">
  
  <style>
   #background-slider {
        background-size: cover;
        background-position: center;
        transition: background-image 1s ease-in-out;
        height: 100vh; /* Tam ekran yüksekliği */
        width: 100%; /* Tam genişlik */
    }
    .overlay-gradient-bottom {
        background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));
    }
  </style>
</head>

<body  >


<div class="row min-vh-100 no-gutters">
    <div class="col-lg-7 col-12 order-lg-2 order-1 position-relative overlay-gradient-bottom background-walk-y" id="background-slider">
        <div class="absolute-bottom-right index-2">
            <div class="text-light p-5 pb-2">
            <div class="mb-5 pb-3">
            <?php if ($time->getHour() > 5 && $time->getHour() <= 11){ ?>
                                <h1 class="mb-2 display-4 font-weight-bold">Günaydın</h1>
                            <?php }elseif($time->getHour() > 11 && $time->getHour() <= 16){ ?>
                                <h1 class="mb-2 display-4 font-weight-bold">Tünaydın</h1>
                            <?php }elseif($time->getHour() > 16 && $time->getHour() <= 22){ ?>
                                <h1 class="mb-2 display-4 font-weight-bold">iyi Akşamlar </h1>
                            <?php }else{ ?>
                                <h1 class="mb-2 display-4 font-weight-bold">İyi Geceler</h1>
                            <?php } ?>

                            <h5 class="font-weight-normal text-muted-transparent"><?= $time; ?></h5>
                        </div>
              
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-12 order-lg-1 order-2">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
                </div>
                <div class="card-body">
                    <?= $this->include("admin/layout/partials/errors");?>
                    <p class="login-box-msg">Giriş Yap Sayfasına Hoşgeldiniz</p>
                    <form   method="post"  action="<?= base_url(route_to('admin_login')); ?>">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Şifre">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember"> Beni Hatırla </label>
                                </div>
                            </div>
                            <div class="col-5">
                                <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                            </div>
                        </div>
                    </form>
                    <p class="mb-1">
                        <a href="<?= base_url(route_to('admin_forgot_password')); ?>">Şifremi Unuttum</a>
                    </p>
                    <p class="mb-0">
                        <a href="<?= base_url(route_to('admin_register')); ?>" class="text-center">Hesabın Yok Mu? Hemen Üye Ol</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
 <script>
    const baseURL = '<?= base_url(); ?>';
    const images = [
        `${baseURL}/public/admin/img/manzara.jpg`,
        `${baseURL}/public/admin/img/manzara1.jpg`,
        `${baseURL}/public/admin/img/manzara2.jpg`,
        `${baseURL}/public/admin/img/manzara3.jpg`,
        `${baseURL}/public/admin/img/manzara4.jpg`,
    ];

    let currentIndex = 0;
    const backgroundSlider = document.getElementById('background-slider');

    function changeBackgroundImage() {
        currentIndex = (currentIndex + 1) % images.length;
        backgroundSlider.style.backgroundImage = `url(${images[currentIndex]})`;
    }

    // İlk arka plan resmi ayarı
    backgroundSlider.style.backgroundImage = `url(${images[currentIndex]})`;

    // Her 5 saniyede bir resmi değiştir
    setInterval(changeBackgroundImage, 5000);
 </script>
<script src="http://localhost/6/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="http://localhost/6/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/6/public/admin/js/adminlte.min.js"></script>

</body>
</html>



