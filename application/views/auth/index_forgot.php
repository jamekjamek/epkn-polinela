<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Forgot Password | PKN - Politeknik Negeri Lampung</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="../favicon.ico" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/ionicons/dist/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icon-kit/dist/css/iconkit.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/perfect-scrollbar/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/theme.min.css">
  <script src="<?= base_url('assets/') ?>src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <div class="auth-wrapper">
    <div class="container-fluid h-100">
      <div class="row flex-row h-100 bg-white">
        <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
          <div class="lavalite-bg" style="background-image: url('https://pmb.polinela.ac.id/wp-content/uploads/2021/01/pmb-polinela-1.jpg')">
            <div class="lavalite-overlay"></div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
          <div class="authentication-form mx-auto">
            <img src="<?= base_url('assets/') ?>img/auth/pkn-logo.png" alt="pkn-logo" width="339px">
            <h3 class="mt-2">Forgot Password PKN Polinela Apps</h3>
            <?php if ($this->session->flashdata('sukses')) { ?>
              <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('sukses') ?>
              </div>
            <?php } else if ($this->session->flashdata('error')) { ?>
              <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error') ?>
              </div>
            <?php  } ?>
            <form action="<?= site_url('auth/reset') ?>" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Masukan username anda" name="username">
                <i class="ik ik-lock"></i>
              </div>
              <div class="sign-btn text-center">
                <button class="btn btn-theme" type="submit">Continue</button>
              </div>
              <div class="sign-btn text-center">
                <a href="<?= site_url('') ?>">Continue with Login ?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script>
    window.jQuery || document.write(
      '<script src="<?= base_url('assets/') ?>src/js/vendor/jquery-3.3.1.min.js"><\/script>')
  </script>
  <script src="<?= base_url('assets/') ?>plugins/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/screenfull/dist/screenfull.js"></script>
  <script src="<?= base_url('assets/') ?>dist/js/theme.js"></script>
  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2000);
  </script>
</body>

</html>