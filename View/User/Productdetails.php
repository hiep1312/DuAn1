<?php
    $BASE_URL = "./";
    include $BASE_URL . "View/User/header.php";
?>
    <div class="modal fade" tabindex="-1" style="top: 25vh;" id="messageSuccessAddToCart" data-bs-theme="dark">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><img src="./View/User/assets/image/logo2.png" alt="Logo" style="max-width: 70px;"></h5>
                    <button type="button" class="btn-close btnClose" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success d-flex align-items-center aos-init aos-animate" role="alert" data-aos="flip-up" data-aos-duration="1000">
                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 40px;">
                            <path style="fill: currentcolor;" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </svg>
                        <div>
                            Thêm giỏ hàng thành công!
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary btnClose" data-bs-dismiss="modal">Đóng thông báo</button>
                </div>
            </div>
        </div>
    </div>
<section class="chitiet-section custom-padding">
    <div class="container">
        <h2 class="text-uppercase mb-3" data-aos="fade-right">Chi tiết sản phẩm</h2>
        <div class="card-group row g-3" data-aos="fade-up">
            <div class="card col-12 col-md-6 col-lg-4">
                <div id="carouselImage" class="carousel slide">
                    <div class="carousel-inner" id="frameViewImg" style="max-height: 200px">

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImage" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Quay lại</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselImage" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Tiếp theo</span>
                    </button>
                </div>
                <div id="imgSmall" class="row row-cols-3 justify-content-start mt-2 g-2"></div>
            </div>
            <div class="card text-light col-12 col-md-6 col-lg-4">
                <div>
                    <div class="tieude text-center" id="title">
                        <li style="list-style: none;"><b></b></li>
                    </div>
                    <hr>
                </div>
                <div class="row g-2">
                    <div class="text-info" id="countItem">
                        <span>Số lượng hàng:</span> <strong></strong>
                    </div>
                    <div id="material">
                        <span>Chất liệu:</span>
                        <div class="row justify-content-center align-items-center row-cols-auto gap-2 my-2"></div>
                    </div>
                    <div id="color">
                        <span>Màu sắc:</span>
                        <div class="row justify-content-center align-items-center row-cols-auto gap-2 my-2">

                        </div>
                    </div>
                    <div id="brand">
                        <span>Thương hiệu:</span> <strong></strong>
                    </div>
                    <div id="status">
                        <span>Tình trạng:</span> <strong></strong>
                    </div>
                    <div id="countOrder">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="quantity" class="col-form-label" style="margin-left: 2px;">Số lượng: </label>
                            </div>
                            <div class="col-3">
                                <input type="number" id="quantity" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
                    <div id="price">
                        <span>Giá:</span> <strong>0</strong>đ
                    </div>
                </div>
                <div class="row gap-2 justify-content-center row-cols-auto mt-3">
                    <button type="button" class="btn btn-primary px-4 py-2" id="order">Mua ngay</button>
                    <button type="button" class="btn btn-outline-info px-4 py-2" id="addToCart">Thêm giỏ hàng</button>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-4">
                <div class="card-body text-light pt-0 ps-2 row g-2">
                    <p class="card-title h5">Chính sách</p>
                    <p class="card-text"><i class="fas fa-shield-alt"></i> Trả góp 0% (áp dụng cho thẻ tín dụng)</p>
                    <p class="card-text"><i class="fas fa-shield-alt"></i> Đổi mới trong 7 ngày nếu lỗi nhà sản xuất</p>
                    <p class="card-text"><i class="fas fa-shield-alt"></i> Tư vấn hỗ trợ kĩ thuật 24/7 khi sử dụng</p>
                    <p class="card-text"><i class="fas fa-shield-alt"></i> Đầy Đủ COCQ nhập khẩu</p>
                    <div class="text-center mt-4">
                        <p class="text-uppercase fw-bold">Bạn cần hỗ trợ?</p>
                        <div class="text-center"><a href="?page=Contacts" class="btn text-info fw-bold">Liên hệ ngay</a></div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="container">
    <p class="fw-bold" style="color: #a5cf44;" data-aos="fade-right" data-aos-duration="800">Mô Tả</p>
    <div class="border rounded border-light p-3 rounded-1" id="description" data-aos="fade-up" data-aos-duration="1000">

    </div>
</div>

<div class="container my-5">
    <p class="fw-bold" style="color: #a5cf44;" data-aos="fade-right" data-aos-duration="800">Đánh giá</p>
    <div class="container-fluid border rounded border-light p-3 rounded-1" data-aos="fade-up" data-aos-duration="1000">
        <div class="d-flex justify-content-between">
            <p class="fw-bold h5">Đánh giá mới nhất</p>
            <a class="text-info text-decoration-none" data-bs-toggle="offcanvas" href="#offcanvas" role="button">
                Xem tất cả đánh giá
                <i class="fas fa-chevron-circle-right"></i>
            </a>
        </div>
        <hr>
        <div class="row mt-3 g-3" id="reviews">

        </div>
        <hr>
        <h5 data-aos="slide-up" data-aos-duration="800">Thêm đánh giá</h5>
        <form enctype="multipart/form-data" method="post" class="mt-1" id="formReviews" style="--bs-form-invalid-color: #ff0077; --bs-form-invalid-border-color: #ff0077">
            <div class="mb-3" data-aos="slide-up" data-aos-duration="800">
                <textarea rows="3" name="comment" id="comment" class="form-control" aria-label="Đánh giá"></textarea>
            </div>
            <div class="mb-3" data-aos="slide-up" data-aos-duration="1000">
                <button type="submit" class="btn btn-primary">Đánh giá</button>
            </div>
        </form>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" data-bs-theme="dark">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-light" id="titleOffcanvas">Tất cả đánh giá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="row g-3" id="allReviews"></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <p class="h2 text-center" data-aos="fade-up" data-aos-duration="1000">Sản phẩm tương tự</p>
    <div
        class="row blog-cards mt-5 d-flex justify-content-center" id="productOther">

    </div>
</div>
<script src="<?= $BASE_URL ?>JS/Validate.js"></script>
<script src="<?= $BASE_URL ?>View/User/dist/js/Productdetails.js"></script>
<?php
    include $BASE_URL . "View/User/footer.php"
?>