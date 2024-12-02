<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>
<body>
<section class="custom-section-bg h-full w-100" style="z-index: 1">
    <div class="container py-4">
        <h2 data-aos="fade-up" class="text-light font-krona-one border-text border-info hero-text mb-2 text-center" style="--secondary-color: #ff0077">Danh mục</h2>
        <div class="row justify-content-between align-items-center my-4">
            <form method="post" enctype="multipart/form-data" class="col-12 col-md-6 col-xl-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Từ khóa" aria-label="Username" aria-describedby="basic-addon1">
                    <span class="input-group-text" role="button" id="basic-addon1"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>
                </div>
            </form>
            <form method="post" enctype="multipart/form-data" class="col-12 mt-3 mt-md-0 col-md-6 col-xl-8">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="me-3">
                        <label class="form-label mb-0 me-2">Bộ lọc:</label>
                        <select class="form-select d-inline-block w-auto">
                            <option value="">Chọn</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label mb-0 me-2">Sắp xếp:</label>
                        <select class="form-select d-inline-block w-auto">
                            <option value="all">Không có</option>
                            <option value="cheap">Rẻ -> Cao</option>
                            <option value="expensive">Cao -> Rẻ</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="row g-3">
            <!-- Sidebar -->
            <div class="col-md-4 col-lg-3">
                <div class="py-2 px-3 fs-5" style="background-color: #E2E2B6; color: #1000da; font-weight: 700">Loại sản phẩm</div>
                <ul class="list-group" style="--bs-list-group-border-radius: 0;" id="categories">
                </ul>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="col-md-8 col-lg-9" id="frameProducts">

            </div>
        </div>
    </div>
</section>
<script src="<?= $BASE_URL ?>View/User/dist/js/Products.js"></script>
<?php
include $BASE_URL . "View/User/footer.php"
?>