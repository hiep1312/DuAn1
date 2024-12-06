<?php $BASE_URL = "./"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <?php
        include $BASE_URL . "View/Admin/components/head-page-meta.php";
        include $BASE_URL . "View/Admin/components/head-css.php"
    ?>
    <script  src="<?= $BASE_URL ?>JS/Validate.js"></script>
</head>
<body>
<?php include $BASE_URL . "View/Admin/components/layout-vertical.php" ?>

<div class="pc-container pb-1">
    <div class="modal fade show position-fixed" id="modal" tabindex="-1">
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" form="formDetails" name="cancel">Từ chối đơn hàng</button>
                    <button type="submit" class="btn btn-primary" form="formDetails" name="confirm">Xác nhận đơn hàng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Đơn hàng</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Danh sách đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Danh sách đơn hàng</h1>
        <div class="table-responsive" id="view">
            <table class="table table-hover table-striped table-bordered border-light text-center">
                <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Tên sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Tổng số lượng</th>
                    <th>Giá</th>
                    <th>Ngày tạo</th>
                    <th>Ngày giao hàng dự kiến</th>
                    <th>Ghi chú</th>
                    <th>Công cụ</th>
                </tr>
                </thead>
                <tbody class="table-group-divider table-light">

                </tbody>
            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
            <div class="btn-group" role="group" id="framePage">
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
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
</div>
<?php
include $BASE_URL . "View/Admin/components/footer-block.php";
include $BASE_URL . "View/Admin/components/footer-js.php"
?>
<script src="<?= $BASE_URL ?>View/Admin/assets/js/mainOrders.js"></script>
</body>
</html>