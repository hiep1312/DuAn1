<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>
    <style>
        .border-custom{
            border-color: #ff0077 !important;
        }
    </style>
    <body>
    <section class="bg-primary-custom custom-padding h-full w-100" style="z-index: 1" id="frame">
        <div class="container">
            <h2 data-aos="fade-up" class="text-light font-krona-one border-text border-info hero-text mb-2 text-center" style="--secondary-color: #ff0077">Giỏ hàng</h2>
            <hr class="border border-custom border-2 opacity-75" data-aos="fade-down">
            <div class="alert" data-aos="fade-left">
                <strong id="productAddToCart">“Đàn Kalimba Gecko 17 Phím K17CAP (Gỗ Long Não – Tone C hoặc B tùy chọn)”</strong> đã được thêm vào giỏ hàng.
            </div>
            <div class="row justify-content-center" data-aos="slide-up" data-aos-duration="800">
                <div class="col-md-8">
                    <h5 class="mb-4">Giỏ hàng</h5>
                    <table class="table table-striped text-center align-middle" style="--bs-emphasis-color: white">
                        <thead class="table-light align-middle">
                        <tr>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody id="frameCart">

                        </tbody>
                    </table>
                </div>
                <!-- Tổng giỏ hàng -->
                <div class="col-md-4">
                    <h5 class="mb-4">Thanh toán</h5>
                    <div class="card border bg-white">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between mb-3" id="total">
                                <span>Tổng:</span>
                                <strong>đ</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-5" id="voucher">
                                <span>Khuyến mãi:</span>
                                <strong class="text-success">đ</strong>
                            </div>
                            <button class="btn btn-warning w-100" id="buttonOrder">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    <script src="<?= $BASE_URL ?>View/User/dist/js/Cart.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>