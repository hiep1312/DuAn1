<?php
    $BASE_URL = "./";
    include $BASE_URL . "View/User/header.php";
?>
<section class="custom-section-bg text-white" style="z-index: 1">
      <div class="color-cover custom-padding">
        <div class="container">
            <nav class="navbar " style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                <div class="container-fluid">
                  <ol class="breadcrumb" data-aos="fade-right" data-aos-duration="1000">
                    <li class="breadcrumb-item" >
                      <a href="?page=news" class="mb-0 font-krona-one border-text text-decoration-none" style="text-wrap: nowrap">
                          Tin tức
                        <span class="px-2 text-light"><i class="fa-solid fa-chevron-right"></i></span>
                      </a>
                    </li>
                    <li class="breadcrumb-item active text-white" id="currentNews"></li>
                  </ol>
                  <span class="d-flex me-5" role="search" data-aos="fade-left" data-aos-duration="1000" id="createAt"></span>
                </div>
            </nav>
            <h1 data-aos="fade-up" class="font-krona-one h3-text text-center" id="titleNews"></h1>
            <p class="text-center text-light-emphasis" data-aos="fade-down" id="authorNews"></p>
        </div>
      </div>
    </section>
    <section data-aos="fade-up" data-aos-delay="400" class="article-container" id="contentNews"></section>
  <section class="custom-section-bg text-white" style="z-index: 1">
      <div class="color-cover">
        <div class="container">
            <div class="mb-3 py-3 position-relative">
                <h4 data-aos="fade-right" data-aos-duration="800">Bình luận</h4>
                <form action="" enctype="multipart/form-data" method="post" class="mt-1" id="formComments">
                    <div class="mb-3" data-aos="slide-up" data-aos-duration="800">
                        <textarea rows="3" name="content" id="content" class="form-control"></textarea>
                    </div>
                    <div class="mb-3 text-center" data-aos="slide-up" data-aos-duration="1000">
                        <button type="submit" class="btn btn-primary">Bình luận</button>
                    </div>
                    <div class="alert alert-dismissible fade show d-none" role="alert" id="message">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </form>
            </div>
            <div class="row g-3" id="frameViewComments">
            </div>
            <div class="text-center my-3" data-aos="slide-up">
                <button type="button" class="btn" id="moreComments" style="--bs-btn-color: #6EACDA; --bs-btn-border-color: #6EACDA; --bs-btn-hover-bg: #6EACDA; --bs-btn-hover-border-color: #6EACDA; --bs-btn-active-bg: #6EACDA; --bs-btn-active-border-color: #6EACDA;">Xem thêm bình luận</button>
            </div>
        </div>
      </div>
</section>
    <section class="our-blog">
      <div class="container">
        <h4 data-aos="fade-up" class="font-krona-one fw-light text-center">Tin tức liên quan</h4>
        <div class="row blog-cards mt-5" id="frameNewsOther">
        </div>
      </div>
    </section>

    <!-- Section 10 CTA -->
    <section class="container custom-padding-cta">
      <div class="bg-img-c">
        <div class="color-cover">
          <!-- Row -->
          <div class="row d-flex align-items-center py-4 py-lg-0 h-100">
            <!-- Col 1 -->
            <div data-aos="fade-up" class="col-lg-8 px-4 px-lg-5">
              <h4 class="text-white h4-text font-krona-one cta-text">
                Bạn có bất kỳ thắc mắc về trang web không xin hãy <i class="fa-solid fa-hand-point-right"></i>
              </h4>
            </div>
            <!-- Col 2 -->
            <div
              data-aos="fade-up"
              class="col-lg-4 px-4 px-lg-5 d-flex justify-content-lg-end mt-3 mt-lg-0"
            >
              <a
                class="btn-cta font-krona-one h5-text button-text"
                href="?page=contacts"
              >
                <span class="me-2">Liên hệ</span>
                <i class="fa-solid fa-arrow-right" style="color: #232520"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="<?= $BASE_URL ?>JS/Validate.js"></script>
    <script src="<?= $BASE_URL ?>View/User/dist/js/NewsDetails.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>