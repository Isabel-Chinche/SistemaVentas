<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sumaq Goyita</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url(); ?>sistemaventas/assets/img/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <!-- Sweet Alert 2 CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/sweetalert2/sweetalert2.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- App CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" type="text/css">
  
</head>

<body class="signin">

  <div class="header py-6 py-lg-6 pt-lg-6">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-6 col-md-8 px-5">
            <h1 class="text-white" style="margin-top:50px; font-size: 50px">Bienvenido!</h1>

          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container mt--7 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" action="<?php echo base_url();?>Signin/signIn" method="post" class="pt-2">
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input class="form-control" name="email" placeholder="Email" type="email" required="">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control" name="password" placeholder="Contraseña" type="password" required="">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-danger mt-4">Cancelar</button>
                <button type="sub" class="btn btn-primary mt-4">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>  
    
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-scroll-lock/jquery-scrollLock.min.js"></script>
  <!-- Sweet Alert 2 -->
  <script src="<?php echo base_url(); ?>assets/vendor/sweetalert2/sweetalert2.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.2.0"></script>

  
</body>

</html>