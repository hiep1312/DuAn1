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
    <div class="modal fade show position-fixed" id="modal" tabindex="-1" data-bs-theme="dark">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chi tiết đơn hàng</h1>
                    <button type="button" class="btn-close button-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formDetails" method="POST" enctype="multipart/form-data">
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-danger" form="formDetails" name="cancel">Hủy đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-primary-custom custom-padding h-full w-100" style="z-index: 1" id="frame">
        <div class="container py-4">
            <h2 data-aos="fade-up" class="text-light font-krona-one border-text border-info hero-text mb-2 text-center" style="--secondary-color: #ff0077">Đơn hàng</h2>
            <hr class="border border-custom border-2 opacity-75" data-aos="fade-down">
            <h5 class="mb-4">Đơn hàng</h5>
            <div class="table-responsive">
                <table class="table table-striped text-center align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th>Ghi chú</th>
                        <th>Ngày đặt</th>
                        <th>Ngày nhận hàng</th>
                        <th>Trạng thái</th>
                        <th>Công cụ</th>
                    </tr>
                    </thead>
                    <tbody class="table-info" id="frameOrder">
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="toast-container position-fixed bottom-0 end-0 p-3" data-bs-theme="dark">
        <div id="liveToast" class="toast" role="alert">
            <div class="toast-header">
                <img src="<?= $BASE_URL ?>View/User/assets/image/logo2.png" style="max-height: 70px; max-width: 100px;" class="rounded me-2" alt="Logo">
                <strong class="me-auto"></strong>
                <small>Now</small>
                <button type="button" class="btn-close button-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body" id="message">

            </div>
        </div>
    </div>
    </body>
    <script src="<?= $BASE_URL ?>View/User/dist/js/Order.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>