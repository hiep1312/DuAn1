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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa chi tiết đơn hàng</h1>
                    <button type="button" class="btn-close button-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id="formEdit" method="POST" class="row g-3" enctype="multipart/form-data">
                        <div class="col-md-6 my-2">
                                    <label for="order_id" class="form-label">Trạng thái đơn hàng: </label>
                                    <select name="order_id" id="order_id" class="form-select">
                                        <option  value="">Mặc định</option>
                                    </select>
                        </div>
                        <div class="col-md-6 my-2">
                                    <label for="product_id" class="form-label">Tên sản phẩm: </label>
                                    <select name="product_id" id="product_id" class="form-select">
                                        <option  value="">Mặc định</option>
                                    </select>
                        </div>
                        <div class="my-2">
                                    <label for="quantity" class="form-label">Số lượng: </label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Mời bạn tổng số lương:">
                        </div>
                        <div class="my-2">
                                    <label for="price" class="form-label">Giá: </label>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Mời bạn tổng giá:">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary button-close" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" form="formEdit">Cập nhật</button>
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
                            <h5 class="m-b-10">Chi Tiết Đơn hàng</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Danh sách chi tiết đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Danh sách chi tiết đơn hàng</h1>
        <div class="table-responsive" id="view">
            <table class="table table-hover table-striped table-bordered border-light text-center">
                <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Trạng thái đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
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
                <img src="<?= $BASE_URL ?>View/Admin/assets/images/logo-dark.svg" class="rounded me-2" alt="Logo">
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
<script src="<?= $BASE_URL ?>View/Admin/assets/js/mainOrderitems.js"></script>
</body>
</html>