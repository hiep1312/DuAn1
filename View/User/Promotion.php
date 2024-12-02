<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>

<section class="custom-section-bg text-white" style="z-index: 1">
  <div class="color-cover custom-padding">
    <div class="container">
      <h1
        data-aos="fade-up"
        class="font-krona-one h1-text text-uppercase text-center">
        Khuyến mãi của tôi
      </h1>
      <!-- <p
            data-aos="fade-up"
            data-aos-delay="200"
            class="sub-text-medium text-center"
          >
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
          </p> -->
    </div>
</section>

<section class="our-works-section custom-padding" id="frame">
  <div class="container">
    <div class="row g-5 mt-4" id="framePromotion">

    </div>
</section>
    <script src="<?= $BASE_URL ?>View/User/dist/js/Promotion.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>