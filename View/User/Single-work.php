<?php
include "header.php"
?>

<style>
    .border-custom{
        border-color: #c4fb6d !important;
    }
    #addon-wrapping:hover{
        background-color: #c4fb6d;
        color: #fff;
    }
    
</style>
<body>
  <section class="bg-primary-custom custom-padding h-full w-100" style="z-index: 1">
  <div class="container py-4">
      <h2 class="transition-fade-left text-white font-krona-one border-text hero-text mb-0 d-flex justify-content-center">GIỎ HÀNG</h2>
    <hr class="border border-custom border-2 opacity-75">
        

        <!-- Giỏ hàng -->
        <div class="row">
            <!-- Danh sách sản phẩm -->
            <div class="col-md-8">
                <h5 class="mb-4">GIỎ HÀNG</h5>
                <table class="table table-striped text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ẢNH</th>
                            <th>SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>TỔNG</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-info">
                        <tr>
                            <td><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>Đàn Kalimba Gecko 10 Phím K10B (Gỗ Bạch Dương – Mbira Thumb Finger Piano 10 Keys)</td>
                            <td>4.900.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td>4.900.000₫</td>
                            <td><a href="#" >Chi tiết sản phẩm</a></td>
                        </tr>
                        <tr>
                            <td><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>Đàn Kalimba Gecko 17 Phím K17CAP (Gỗ Long Não – Tone C hoặc B tùy chọn)</td>
                            <td>4.000.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td>4.000.000₫</td>
                            <td><a href="#" >Chi tiết sản phẩm</a></td>
                        </tr>
                        
                <tr>
                    
                </tr>
                    </tbody>
                </table>

                <!-- Nút hành động -->
                
            </div>
            
            </div>
          </div>
        </div>

            
    </div>
    
  </section>
</body>

<?php
include "footer.php"
?>