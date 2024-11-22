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
    a{
      text-decoration: none;
      color: black;
    }
    a:hover{
      color: darkorange;
    }
</style>
<body>
  <section class="bg-primary-custom custom-padding h-full w-100" style="z-index: 1">
  <div class="container py-4">
      <h2 class="transition-fade-left text-white font-krona-one border-text hero-text mb-0 d-flex justify-content-center">Đơn hàng</h2>
    <hr class="border border-custom border-2 opacity-75">
        

        <!-- Giỏ hàng -->
         <h5 class="mb-4">Đơn hàng</h5>
        <div class="row justify-content-center">
            <!-- Danh sách sản phẩm -->
            <div class="col-md-12">
                
                <table class="table table-striped text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ẢNH</th>
                            <th>SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>TỔNG</th>
                            <th>HD</th>
                        </tr>
                    </thead>
                    <tbody class="table-info">
                        <tr>
                            <td><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>Đàn Kalimba Gecko 10 Phím K10B</td>
                            <td>4.900.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td>4.900.000₫</td>
                            <td><a href="#" role="button" >Chi tiết</a></td>
                        </tr>
                        <tr>
                            <td><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>Đàn Kalimba Gecko 17 Phím K17CAP</td>
                            <td>4.000.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td>4.000.000₫</td>
                            <td><a href="#" >Chi tiết</a></td>
                        </tr>
                        <tr>
                            <td><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>Đàn Kalimba Gecko 17 Phím K17CAP</td>
                            <td>4.000.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td>4.000.000₫</td>
                            <td><a href="#" >Chi tiết</a></td>
                        </tr>
                        <tr>
                            <td><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>Đàn Kalimba Gecko 17 Phím K17CAP</td>
                            <td>4.000.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td>4.000.000₫</td>
                            <td><a href="#" >Chi tiết</a></td>
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
    
  </section>
</body>

<?php
include "footer.php"
?>