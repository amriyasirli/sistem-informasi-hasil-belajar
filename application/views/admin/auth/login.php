
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; SIHABEL</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-2 m-3">
            <img src="<?= base_url('assets/') ?>/img/logo-smkn1.png" alt="logo" width="280" class="bg-info shadow-light rounded p-1 mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">SIHABEL</span></h4>
            <p class="text-muted">Selamat Datang di <i class="font-weight-bold">Sistem Informasi Hasil Belajar Siswa</i> SMKN 1 Panyabungan.</p>
            
            <?= $this->session->flashdata('pesan') ?>
            <form method="post" action="<?= base_url('Auth')?>" class="needs-validation" novalidate="">
              <div class="form-group">
                <label for="email">Username</label>
                <input type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="">
                <?= form_error('username') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="">
                <?= form_error('password') ?>
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <div class="mt-5 text-center">
                <!-- Belum punya akun? <a href="auth-register.html">Buat akun </a> -->
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; SMKN 1 Panyabungan. <br>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="https://smkn1panyabungan.sch.id/wp-content/uploads/2017/09/video-profil.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h2 class="mb-2 display-4 font-weight-bold">Selamat Datang di </h2>
                <h3 class="font-weight-normal text-muted-transparent">SMKN 1 Panyabungan</h3>
              </div>
              <!-- Photo by <a class="text-light bb" target="_blank" href="#">Yuli Anjelina</a>  -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url('assets/admin/') ?>/js/scripts.js"></script>
  <script src="<?= base_url('assets/admin/') ?>/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
