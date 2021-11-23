<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url(); ?>/Template_mhs/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?=base_url(); ?>/Template_mhs/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url(); ?>/Template_mhs/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url(); ?>/Template_mhs/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url(); ?>/Template_mhs/template/unib.png" />
</head>


<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-3 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo" style="">
                <img src="<?=base_url(); ?>/unib.png" alt="logo">
              </div>
              <h4 class="text-center" >Silahkan Login</h4>
            
              <div class="autohide">
                  <?php echo  session()->getflashdata('massage') ?>
              </div>

              <form action="<?php echo base_url('Rumahku/cek_login'); ?>" class="pt-4" method="POST"  >
                    <div class="form-group">
                       <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password" autofocus required>
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                    </div>
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url(); ?>/Template_mhs/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url(); ?>/Template_mhs/template/js/off-canvas.js"></script>
  <script src="<?=base_url(); ?>/Template_mhs/template/js/hoverable-collapse.js"></script>
  <script src="<?=base_url(); ?>/Template_mhs/template/js/template.js"></script>
  <script src="<?=base_url(); ?>/Template_mhs/template/js/settings.js"></script>
  <script src="<?=base_url(); ?>/Template_mhs/template/js/todolist.js"></script>
  
  <script>
     window.setTimeout(function() {
          $(".autohide").fadeTo(500, 0).slideUp(500, function() {
              $(this).remove();
          });
      }, 8000);
  </script>
</body>

</html>