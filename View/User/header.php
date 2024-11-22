<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trang chủ - Kalimba</title>
    <link
      href="library/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="library/aos@3.0.0-beta.6/dist/aos.css" />
    <!-- <link
      rel="stylesheet"
      href="library/font-awesome/6.6.0/css/all.min.css"
    /> -->
    <link rel="stylesheet" href="dist/css/style.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
  </head>
  <body>
    <!-- Scroll indicator -->
    <div id="scroll-indicator">
      <svg width="50" height="50" viewBox="0 0 100 100">
        <circle
          cx="50"
          cy="50"
          r="45"
          stroke="#767676"
          stroke-width="5"
          fill="none"
        />
        <circle
          id="progress-circle"
          cx="50"
          cy="50"
          r="45"
          stroke="#c4fb6d"
          stroke-width="5"
          fill="none"
          stroke-dasharray="283"
          stroke-dashoffset="283"
        />
        <image
          href="assets/icons/arrowUp.png"
          x="30"
          y="30"
          height="40px"
          width="40px"
        />
      </svg>
    </div>

    <!-- Header -->
    <header class="navbar navbar-expand-lg bg-primary-custom">
      <div class="container">
        <a
          data-aos="fade-right"
          class="navbar-brand text-white ms-2 pt-0"
          href="Home1.php"
        >
          <img src="./assets/image/logo1.png" style="width: 150px" alt="" />
        </a>
        <!-- Button Burger Menu -->
        <button
          class="navbar-toggler border-0"
          type="button"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas-background"></div>

        <!-- Sidebar for mobile -->
        <nav class="offcanvas-menu" id="navbarNav">
          <div class="offcanvas-header border-0">
            <!-- <h5 class="offcanvas-title text-black">Title</h5> -->
            <img
              class="offcanvas-title"
              src="assets/image/logo.png"
              style="width: 130px"
              alt=""
            />
            <button type="button" class="btn-close" aria-label="Close"></button>
          </div>
          <ul class="navbar-nav mx-3">
            <li class="nav-item dropdown">
              <a
                class="nav-link font-krona-one text-uppercase text-white dropdown-toggle"
                style="font-size: 12px"
                href="Home1.php"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Trang chủ
              </a>
              <ul
                class="dropdown-menu bg-primary-custom"
                style="border: none"
                aria-labelledby="navbarDropdown"
              >
              <li>
                <a
                  class="dropdown-item font-krona-one text-uppercase text-white"
                  style="font-size: 12px"
                  href="Home1.php"
                  >Trang chủ</a
                >
              </li> 
              <!-- <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="Home2.php"
                    >Trang chủ 2</a
                  >
                </li>
                <!-- <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="Home3.php"
                    >Trang chủ 3</a
                  >
                </li> -->
                <!-- <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="LandingPage.php"
                    >Trang Đích</a
                  >
                </li>
              </ul> -->
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link font-krona-one text-uppercase text-white dropdown-toggle"
                style="font-size: 12px"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Danh sách trang
              </a>
              <ul
                class="dropdown-menu bg-primary-custom"
                style="border: none"
                aria-labelledby="navbarDropdown"
              >
                <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="About.php"
                    >Giới thiệu</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="Pricing.php"
                    >Giỏ Hàng</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="Single-work.php"
                    >Đơn hàng</a
                  >
                </li>
                <!-- <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="Reviews.php"
                    >Đánh giá</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="Blog.php"
                    >Bài viết</a
                  >
                </li> -->
                <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="Post.php"
                    >Tin tức</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item font-krona-one text-uppercase text-white"
                    style="font-size: 12px"
                    href="404.php"
                    >Lỗi truy cập</a
                  >
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link font-krona-one text-uppercase text-white dropdown-toggle"
                style="font-size: 12px"
                href="Products.php"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Sản Phẩm
              </a>
              <ul
                class="dropdown-menu bg-primary-custom"
                style="border: none"
                aria-labelledby="navbarDropdown"
              >
                <div>
                  <h6
                    class="text-white font-krona-one fw-light"
                    style="font-size: 12px"
                  >
                    Gỗ
                  </h6>
                  <a class="dropdown-item text-white" href="#">Design</a>
                  <a class="dropdown-item text-white" href="#">Graphic</a>
                  <a class="dropdown-item text-white" href="#">Ideas</a>
                  <a class="dropdown-item text-white" href="#">Brainstorm</a>
                </div>
                <div>
                  <h6
                    class="text-white font-krona-one fw-light mt-3"
                    style="font-size: 12px"
                  >
                    Thép
                  </h6>
                  <a class="dropdown-item text-white" href="#">Email</a>
                  <a class="dropdown-item text-white" href="#">Content</a>
                  <a class="dropdown-item text-white" href="#">Digital</a>
                  <a class="dropdown-item text-white" href="#">All-in-One</a>
                </div>
                <div>
                  <h6
                    class="text-white font-krona-one fw-light mt-3"
                    style="font-size: 12px"
                  >
                    Nhựa
                  </h6>
                  <a class="dropdown-item text-white" href="#">Social Media</a>
                  <a class="dropdown-item text-white" href="#">Search Engine</a>
                  <a class="dropdown-item text-white" href="#">Social Ads</a>
                  <a class="dropdown-item text-white" href="#">Affiliate</a>
                </div>
                <div>
                  <h6
                    class="text-white font-krona-one fw-light mt-3"
                    style="font-size: 12px"
                  >
                    Tre, Lứa
                  </h6>
                  <a class="dropdown-item text-white" href="#">Web Design</a>
                  <a class="dropdown-item text-white" href="#">Maintenance</a>
                  <a class="dropdown-item text-white" href="#">Copywriting</a>
                  <a class="dropdown-item text-white" href="#">Media</a>
                </div>
              </ul>
            </li>

            <li class="nav-item">
              <a
                class="nav-link font-krona-one text-uppercase text-white"
                style="font-size: 12px"
                href="OurWorks.php"
                >Khuyến mãi</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link font-krona-one text-uppercase text-white"
                style="font-size: 12px"
                href="Contact.php"
                >Liên hệ</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link text-white font-krona-one text-uppercase ms-3"
                style="font-size: 20px"
                href="Pricing.php"
                ><i class="fa-solid fa-cart-shopping"></i></a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link text-white font-krona-one text-uppercase ms-3"
                style="font-size: 20px"
                href="../Admin/pages/login-v3.php"
                ><i class="fa-solid fa-user"></i></a
              >
            </li>
          </ul>
        </nav>

        <!-- Navbar for large screens -->
        <nav class="d-none d-lg-block py-3 transition-fade-down">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown" style="z-index: 100">
              <a
                class="nav-link d-flex align-items-center gap-3 text-white font-krona-one text-uppercase me-4"
                href="Home1.php"
                id="navbarDropdownLg"
                role="button"
                aria-expanded="false"
                style="font-size: 12px"
              >
                <p class="mb-0">Trang chủ</p>
                <!-- <img
                  src="assets/icons/IconArrowDown.png"
                  alt="Dropdown Icon"
                  class="dropdown-icon"
                /> -->
              </a>
              <ul
                class="dropdown-menu bg-primary-custom"
                style="z-index: 100"
                aria-labelledby="navbarDropdownLg"
              >
                <!-- <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="Home2.php"
                    >Trang chủ 2</a
                  >
                </li>
                <!-- <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="Home3.php"
                    >Trang chủ 3</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="LandingPage.php"
                    >Trang đích</a
                  >
                </li> -->
                <!-- <li><hr class="dropdown-divider" /></li> -->
              </ul>
            </li>
            <li class="nav-item dropdown" style="z-index: 100">
              <a
                class="nav-link d-flex align-items-center gap-3 text-white font-krona-one text-uppercase me-4"
                href="#"
                id="navbarDropdownLg"
                role="button"
                aria-expanded="false"
                style="font-size: 12px"
              >
                <p class="mb-0">Danh sách trang</p>
                <img
                  src="assets/icons/IconArrowDown.png"
                  alt="Dropdown Icon"
                  class="dropdown-icon"
                />
              </a>
              <ul
                class="dropdown-menu bg-primary-custom"
                style="z-index: 100"
                aria-labelledby="navbarDropdownLg"
              >
                <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="About.php"
                    >Giới thiệu</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="Pricing.php"
                    >Giỏ hàng</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="Single-work.php"
                    >Đơn hàng</a
                  >
                </li>
                <!-- <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="Reviews.php"
                    >Đánh giá</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="Blog.php"
                    >Bài viết</a
                  >
                </li> -->
                <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="Post.php"
                    >Tin tức</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-white font-krona-one text-uppercase"
                    style="font-size: 12px; z-index: 100"
                    href="404.php"
                    >Lỗi 404</a
                  >
                </li>
                <!-- <li><hr class="dropdown-divider" /></li> -->
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link d-flex align-items-center gap-3 text-white font-krona-one text-uppercase me-4"
                href="Products.php"
                id="servicesDropdown"
                role="button"
                aria-expanded="false"
                style="font-size: 12px"
              >
                <p class="mb-0">Sản phẩm</p>
                <img
                  src="assets/icons/IconArrowDown.png"
                  alt="Dropdown Icon"
                  class="dropdown-icon"
                />
              </a>
              <div
                class="dropdown-menu-services p-3 dropdown-services"
                aria-labelledby="servicesDropdown"
              >
                <div class="row">
                  <div class="col-lg-3">
                    <h6 class="dropdown-header font-krona-one fw-light">
                        Chất liệu = Gỗ
                    </h6>
                    <a class="dropdown-item" href="#">Design</a>
                    <a class="dropdown-item" href="#">Graphic</a>
                    <a class="dropdown-item" href="#">Ideas</a>
                    <a class="dropdown-item" href="#">Brainstorm</a>
                  </div>
                  <div class="col-lg-3">
                    <h6 class="dropdown-header font-krona-one fw-light">
                      Chất liệu = Thép
                    </h6>
                    <a class="dropdown-item" href="#">Email</a>
                    <a class="dropdown-item" href="#">Content</a>
                    <a class="dropdown-item" href="#">Digital</a>
                    <a class="dropdown-item" href="#">All-in-One</a>
                  </div>
                  <div class="col-lg-3">
                    <h6 class="dropdown-header font-krona-one fw-light">
                      Chất liệu = tre, lứa
                    </h6>
                    <a class="dropdown-item" href="#">Social Media</a>
                    <a class="dropdown-item" href="#">Search Engine</a>
                    <a class="dropdown-item" href="#">Social Ads</a>
                    <a class="dropdown-item" href="#">Affiliate</a>
                  </div>
                  <div class="col-lg-3">
                    <h6 class="dropdown-header font-krona-one fw-light">
                      Chất liệu = Nhôm
                    </h6>
                    <a class="dropdown-item" href="#">Web Design</a>
                    <a class="dropdown-item" href="#">Maintenance</a>
                    <a class="dropdown-item" href="#">Copywriting</a>
                    <a class="dropdown-item" href="#">Media</a>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a
                class="nav-link text-white font-krona-one text-uppercase me-4"
                style="font-size: 12px"
                href="OurWorks.php"
                >Khuyến mãi</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link text-white font-krona-one text-uppercase"
                style="font-size: 12px"
                href="Contact.php"
                >Liên hệ</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link text-white font-krona-one text-uppercase ms-3"
                style="font-size: 20px"
                href="Pricing.php"
                ><i class="fa-solid fa-cart-shopping"></i></a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link text-white font-krona-one text-uppercase ms-3"
                style="font-size: 20px"
                href="../Admin/pages/Account/login-v3.php"
                ><i class="fa-solid fa-user"></i></a
              >
            </li>
          </ul>
        </nav>
      </div>
    </header>