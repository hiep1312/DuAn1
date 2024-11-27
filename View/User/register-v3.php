
<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>
<?php
include "../../components/head-page-meta.php"
?>

<?php
include "../../components/head-css.php"
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
                <img src="../Admin/assets/images/logo-dark.svg" alt="image" class="img-fluid brand-logo">
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-secondary mt-5"><b>Đăng ký</b></h2>
                    <p class="f-16 mt-2">Nhập thông tin đăng nhập để tiếp tục</p>
                  </div>
                </div>
              </div>
              <button type="button" class="btn mt-2 bg-light-primary bg-light text-muted" style="width: 100%">
                <img src="#" alt="image">Đăng ký với google
              </button>
              <div class="saprator mt-3">
                <span>or</span>
              </div>
              <h5 class="my-4 d-flex justify-content-center">Đăng ký với địa chỉ gmail</h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="First Name" >
                    <label for="floatingInput">Tên</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput1" placeholder="Last Name" >
                    <label for="floatingInput1">Họ</label>
                  </div>
                </div>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput2" placeholder="Email Address / Username" >
                <label for="floatingInput2">Email Address / Tên(biệt danh)</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput3" placeholder="Password" >
                <label for="floatingInput3">Mật khẩu</label>
              </div>
              <div class="form-check mt-3s">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" >
                <label class="form-check-label" for="customCheckc1">
                  <span class="h5 mb-0">Tôi đồng ý <span>Điều khoản và cá nhân</span></span>
                </label>
              </div>
              <div class="d-grid mt-4">
                <button type="button" class="btn btn-secondary p-2"><a role="button" style="text-decoration: none;" href="login-v3.php">Đăng ký</a></button>
              </div>
              <hr >
              <h5 class="d-flex justify-content-center"><a role="button" style="text-decoration: none;" href="login-v3.php">Bạn đã có tài khoản?</a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include "../../components/footer-js.php"
?> 
    
    
  </body>
  <!-- [Body] end -->
</html>
