<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>
<?php
include "../../layouts/head-page-meta.php"
?>

<?php
include "../../layouts/head-css.php"
?>

  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
      <div class="auth-wrapper v3">
        <div class="auth-form">
          <div class="card mt-5">
            <div class="card-body">
              <a href="#" class="d-flex justify-content-center mt-3">
                <img src="../assets/images/logo-dark.svg" alt="image" class="img-fluid brand-logo">
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-secondary mt-5"><b>Quên mật khẩu</b></h2>
                    <p class="f-16 mt-2">Nhập email để lấy lại mật khẩu</p>
                  </div>
                </div>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput2" placeholder="Email Address / Username" >
                <label for="floatingInput2">Email Address</label>
              </div>
              <div class="d-grid mt-4">
                <button type="button" class="btn btn-secondary p-2"><a role="button" style="text-decoration: none;" href="#">Gửi</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include "../../layouts/footer-js.php"
?>
    
    
  </body>
  <!-- [Body] end -->
</html>
