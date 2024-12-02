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
        <div class="container py-4">
            <h2 data-aos="fade-up" class="text-light font-krona-one border-text border-info hero-text mb-2 text-center" style="--secondary-color: #ff0077">Đơn hàng</h2>
            <hr class="border border-custom border-2 opacity-75" data-aos="fade-down">
            <h5 class="mb-4">Đơn hàng</h5>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <table class="table table-striped text-center align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Trạng thái</th>
                            <th>Ngày nhận hàng</th>
                            <th>Công cụ</th>
                        </tr>
                        </thead>
                        <tbody class="table-info" id="frameOrder">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    </body>
    <script src="<?= $BASE_URL ?>View/User/dist/js/Order.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>