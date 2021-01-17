<?php
  if(isset($_SESSION['user'])){
    header('Location: ' . BASEURL);
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register Gan</title>

  <!-- Custom fonts for this template-->
  <link href="<?= ASSET ?>css/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= ASSET ?>css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= ASSET ?>css/bootstrap-select.css">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat akun Gan!</h1>
              </div>
              <form class="user" method="post" action="<?= BASEURL ?>auth/_register">
                <input type="hidden" id="baseurl" value="<?= BASEURL ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" required placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" required placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="notlp" required placeholder="Nomor Telepon">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="alamat" required placeholder="Alamat Lengkap">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="provinsi" class="selectpicker provinsi" data-live-search="true" required title="Provinsi" data-size="7">
                      <?php foreach($data['provinsi'] as $p) : ?>
                        <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select name="kabupaten" class="selectpicker kabupaten" id="kabupaten" data-live-search="true" required title="Kabupaten" data-size="7">
                      <option value=""></option>
                    </select>
                  </div>                      
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="password" required placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password2" required placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login">Dah punya akun? Login aja gan!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= ASSET ?>js/jquery.js"></script>
  <script src="<?= ASSET ?>js/bootstrap.bundle.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= ASSET ?>js/jquery.easing.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= ASSET ?>js/sb-admin-2.js"></script>
  <script src="<?= ASSET ?>js/bootstrap-select.js"></script>
  <script src="<?= ASSET ?>js/i18n/defaults-id_ID.js"></script>
  <script src="<?= ASSET ?>js/script.js"></script>

</body>

</html>
