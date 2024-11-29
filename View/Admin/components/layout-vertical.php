<?php $BASE_URL = "./" ?>
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="?role=admin&page=dashboard" class="b-brand text-primary">
        <img src="<?= $BASE_URL ?>View/Admin/assets/images/logo-dark.svg" alt="anhloi" class="logo">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Nhà chính</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item">
          <a href="?role=admin&page=dashboard" class="pc-link"><span class="pc-micon"><i
                class="ti ti-dashboard"></i></span><span class="pc-mtext">Bảng điều khiển</span></a>
        </li>
        <li class="pc-item pc-caption">
          <label>Thành phần</label>
          <i class="ti ti-apps"></i>
        </li>
        <li class="pc-item">
          <a href="../DuAn1/View/Admin/pages/quanlytintuc/list.php" class="pc-link"><span class="pc-micon"><i
                class="ti ti-typography"></i></span><span class="pc-mtext">Tin tức</span><span class="pc-arrow"><i
                data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=news&function=add">Thêm sản phẩm</a></li>
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=news">Danh sách sản phẩm</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-regular fa-comments"></i></span><span
              class="pc-mtext">Bình luận</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=comments&function=add">Thêm bình luận</a></li>
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=comments">Danh sách bình luận</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-regular fa-cart-shopping"></i></span><span
              class="pc-mtext">Giỏ hàng</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=carts&function=add">Thêm sản phẩm</a></li>
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=carts">Danh sách sản phẩm</a></li>
          </ul>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#" class="pc-link"><span class="pc-micon"><i class="fa-regular fa-cart-flatbed-boxes"></i></span><span
              class="pc-mtext">Chi tiết giỏ hàng</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=cartItems&function=add">Thêm chi tiết sản phẩm</a></li>
            <li class="pc-item"><a class="pc-link" href="?role=admin&page=cartItems">Danh sách chi tiết sản phẩm</a></li>
          </ul>
        </li>
        <li class="pc-item">
          <a href="../../elements/bc_color.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
            <span class="pc-mtext">Color</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../../elements/icon-tabler.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
            <span class="pc-mtext">Icons</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Pages</label>
          <i class="ti ti-news"></i>
        </li>
        <li class="pc-item">
          <a href="../../pages/login-v3.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-lock"></i></span>
            <span class="pc-mtext">Login</span>
          </a>
        </li>
        <li class="pc-item">
          <a href="../../pages/register-v3.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-user-plus"></i></span>
            <span class="pc-mtext">Register</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>Other</label>
          <i class="ti ti-brand-chrome"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span
              class="pc-mtext">Menu
              levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i
                    data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                        data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i
                    data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                <li class="pc-item pc-hasmenu">
                  <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i
                        data-feather="chevron-right"></i></span></a>
                  <ul class="pc-submenu">
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                    <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="pc-item">
          <a href="../../other/sample-page.html" class="pc-link">
            <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
            <span class="pc-mtext">Sample page</span>
          </a>
        </li>
      </ul>
      <div class="pc-navbar-card bg-primary rounded">
        <h4 class="text-white">Upgrade To Pro</h4>
        <p class="text-white opacity-75">To get more features and components</p>
        <a href="https://codedthemes.com/item/berry-bootstrap-5-admin-template/" target="_blank"
          class="btn btn-light text-primary">Buy Now</a>
      </div>
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <li class="pc-h-item header-mobile-collapse">
          <a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup">
          <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="dropdown pc-h-item d-inline-flex d-md-none">
          <a class="pc-head-link head-link-secondary dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-search"></i>
          </a>
          <div class="dropdown-menu pc-h-dropdown drp-search">
            <form class="px-3">
              <div class="form-group mb-0 d-flex align-items-center">
                <i data-feather="search"></i>
                <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
              </div>
            </form>
          </div>
        </li>
        <li class="pc-h-item d-none d-md-inline-flex">
          <form class="header-search">
            <i data-feather="search" class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Search here. . .">
            <button class="btn btn-light-secondary btn-search"><i class="ti ti-adjustments-horizontal"></i></button>
          </form>
        </li>
      </ul>
    </div>
    <!-- [Mobile Media Block end] -->
    <div class="ms-auto">
      <ul class="list-unstyled">
        <li class="dropdown pc-h-item">
          <a class="pc-head-link head-link-secondary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-bell"></i>
          </a>
          <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header">
              <a href="#!" class="link-primary float-end text-decoration-underline">Mark as all read</a>
              <h5>All Notification <span class="badge bg-warning rounded-pill ms-1">01</span></h5>
            </div>
            <div class="dropdown-header px-0 text-wrap header-notification-scroll position-relative"
              style="max-height: calc(100vh - 215px)">
              <div class="list-group list-group-flush w-100">
                <div class="list-group-item list-group-item-action">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="user-avtar bg-light-success"><i class="ti ti-building-store"></i></div>
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <span class="float-end text-muted">3 min ago</span>
                      <h5>Store Verification Done</h5>
                      <p class="text-body fs-6">We have successfully received your request.</p>
                      <div class="badge rounded-pill bg-light-danger">Unread</div>
                    </div>
                  </div>
                </div>
                <div class="list-group-item list-group-item-action">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <img src="../../assets/images/user/avatar-3.jpg" alt="user-image_url" class="user-avtar">
                    </div>
                    <div class="flex-grow-1 ms-1">
                      <span class="float-end text-muted">10 min ago</span>
                      <h5>Joseph William</h5>
                      <p class="text-body fs-6">It is a long established fact that a reader will be distracted </p>
                      <div class="badge rounded-pill bg-light-success">Confirmation of Account</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="text-center py-2">
              <a href="#!" class="link-primary">Mark as all read</a>
            </div>
          </div>
        </li>
        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <img src="../../assets/images/user/avatar-2.jpg" alt="user-image_url" class="user-avtar">
            <span>
              <i class="ti ti-settings"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header">
              <h4>Good Morning, <span class="small text-muted"> John Doe</span></h4>
              <p class="text-muted">Project Admin</p>
              <hr>
              <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
                <div class="upgradeplan-block bg-light-warning rounded">
                  <h4>Explore full code</h4>
                  <p class="text-muted">Buy now to get full access of code files</p>
                  <a href="https://codedthemes.com/item/berry-bootstrap-5-admin-template/" target="_blank"
                    class="btn btn-warning">Buy Now</a>
                </div>
                <hr>
                <a href="../../application/account-profile-v1.html" class="dropdown-item">
                  <i class="ti ti-settings"></i>
                  <span>Account Settings</span>
                </a>
                <a href="../../application/social-profile.html" class="dropdown-item">
                  <i class="ti ti-user"></i>
                  <span>Social Profile</span>
                </a>
                <a href="../../pages/login-v1.html" class="dropdown-item">
                  <i class="ti ti-logout"></i>
                  <span>Logout</span>
                </a>

              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- [ Header ] end -->