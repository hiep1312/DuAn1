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
          <div class="card my-5">
            <div class="card-body">
              <a href="#" class="d-flex justify-content-center">
                <img src="../Admin/assets/images/logo-dark.svg" alt="image" class="img-fluid brand-logo">
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-secondary mt-5"><b>Xin chào, mừng quay trở lại</b></h2>
                    <p class="f-16 mt-2">Nhập thông tin đăng nhập để tiếp tục</p>
                  </div>
                </div>
              </div>
              <div class="d-grid">
                <button type="button" class="btn mt-2 bg-light-primary bg-light text-muted">
                  <img src="../assets/images/authentication/google-icon.svg" alt="image">Đăng nhập với Google
                </button>
              </div>
              <div class="saprator mt-3">
                <span>or</span>
              </div>
              <h5 class="my-4 d-flex justify-content-center">Đăng nhập với địa chỉ gmail</h5>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Email address / Username" >
                <label for="floatingInput">Email address / Tên(biệt danh)</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput1" placeholder="Password" >
                <label for="floatingInput1">Mật khẩu</label>
              </div>
              <div class="d-flex mt-1 justify-content-between">
                <div class="form-check">
                  <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" >
                  <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                </div>
                <h5 class="text-secondary"><a role="button" style="text-decoration: none;" href="../Admin/pages/forgot_pass.php">Quên mật khẩu?</a></h5>
              </div>
              <div class="d-grid mt-4">
                <button type="button" class="btn btn-secondary"><a role="button" style="text-decoration: none;" href="Home1.php">Đăng nhập</a></button>
              </div>
              <hr >
              <h5 class="d-flex justify-content-center"><a href="register-v3.php" role="button" style="text-decoration: none;">Bạn chưa có đăng nhập?</a></h5>
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
