<?php
    $BASE_URL = "./";
    include $BASE_URL . "View/User/header.php";
?>
<section class="custom-section-bg text-white" style="z-index: 1">
  <div class="color-cover custom-padding">
    <div class="container">
      <h1
        data-aos="fade-up"
        class="font-krona-one h1-text text-center">
        Tin Tức
      </h1>
    </div>
</section>
<!-- Main -->
<div class="container">
  <div class="row g-3 justify-content-center" id="frameNews">
  </div>
</div>
<div class="text-center my-2" data-aos="slide-up">
    <button type="button" class="btn" id="moreNews" style="--bs-btn-color: #6EACDA; --bs-btn-border-color: #6EACDA; --bs-btn-hover-bg: #6EACDA; --bs-btn-hover-border-color: #6EACDA; --bs-btn-active-bg: #6EACDA; --bs-btn-active-border-color: #6EACDA;">Xem thêm</button>
</div>

<!-- Tin tức liên quan -->
<section class="our-blog custom-padding">
  <div class="container">
    <h5>Tin tức nổi bật</h5>
    <div class="row blog-cards mt-5" id="frameNewsOther">

    </div>
  </div>
</section>
<script src="<?= $BASE_URL ?>View/User/dist/js/News.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>