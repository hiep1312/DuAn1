<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>
<section class="thanhtoan-section custom-padding">
    <h2 data-aos="fade-up" class="text-light font-krona-one border-text border-info hero-text mb-5 text-center" style="--secondary-color: #ff0077">Thanh toán</h2>
    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data" id="formOrder">
            <div class="row justify-content-around">
                <div class="col-lg-5 bg-dark-subtle rounded p-4">
                    <h4 class="fs-3 mb-3 text-dark">Thông tin thanh toán</h4>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên của bạn *:">
                        <label for="name" class="text-secondary">Tên của bạn*: </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại">
                        <label for="phone" class="text-secondary">Số điện thoại*: </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email*: ">
                        <label for="email" class="text-secondary">Email*: </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ*: ">
                        <label for="address" class="text-secondary">Địa chỉ*: </label>
                    </div>
                    <p class="text-dark">Thông tin bổ sung</p>
                    <p class="text-dark">Ghi chú đơn hàng (tùy chọn)</p>
                    <textarea class="form-control" name="description" id="description" placeholder="Nội dung*: ghi chú địa điểm cụ thể..." rows="2" aria-label="Ghi chú"></textarea>
                </div>
                <div class="col-lg-6 p-4 border border-light rounded">
                    <h4 class="fs-3 mb-4">Đơn hàng của bạn</h4>
                    <div class="donhang row gap-3">
                        <span class="text-white">Tên sản phẩm: <span id="nameProducts"></span></span>
                        <span class="text-white">Số lượng: <span id="count"></span></span>
                        <span class="text-white">Phí giao hàng: <span>30000</span>₫</span>
                        <span class="text-white">Tổng tiền: <span id="totalMoney"></span>₫</span>
                        <hr class="mb-4">
                        Phương thức thanh toán:
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="cash" checked>
                            <label class="form-check-label" for="cash">
                                Thanh toán bằng tiền mặt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="transfer">
                            <label class="form-check-label" for="transfer">
                                Thanh toán qua tài khoản ngân hàng
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success mt-4">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<script src="<?= $BASE_URL ?>JS/Validate.js"></script>
<script src="<?= $BASE_URL ?>View/User/dist/js/Pay.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>