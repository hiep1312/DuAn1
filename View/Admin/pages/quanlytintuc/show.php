<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
<?php 
    include "../../layouts/head-page-meta.php"
?>

<?php 
    include "../../layouts/head-css.php"
?>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
<?php 
    include "../../layouts/layout-vertical.php"
?>
  <!-- <img src="../../assets/images/logo-dark.svg" alt="sdasdas"> -->
  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Chi tiết tin tức</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../index.php">Trang Chủ</a></li>
                <li class="breadcrumb-item" aria-current="page">Chi tiết tin tức</li>
                <li class="breadcrumb-item"><a href="../../elements/quanlytintuc/list.php">Danh sách tin tức</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <h1 class="my-4">Chi tiết tin tức</h1>
    <!-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
          Menu
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a href="list.html"><li><button class="dropdown-item" type="button">Danh sach khoa hoc</button></li></a>
          <a href="register.html"><li><button class="dropdown-item" type="button">Register</button></li></a>
        </ul>
      </div> -->
      <form action="" id="frmnews" method="POST" class="d-flex gap-3 flex-column" enctype="multipart/form-data">
            <input type="text" name="title" id="title" class="form-control" placeholder="Mời bạn nhập tiêu đề tin tức">
            <input type="text" name="content" id="content" class="form-control" placeholder="Mời bạn nhập mô tả">
            <input type="file" name="image_url"  id="image_url" class="form-control" placeholder="Mời bạn nhập ảnh bài viết">
            <input type="date" name="created_at" id="created_at" class="form-control" placeholder="Mời bạn nhập thời gian đăng tin tức">
            <select name="status" id="status" class="form-select">
              <option value="1">Xuất bản</option>
              <option value="0">Khóa</option>
            </select>
            <img src="" width="300" id="img" alt="anhloi">
            <div class= "d-none mb-3" id="message">
            
          </div>
        </form>

        <script>
      
      const title = document.getElementById('title')
      const content = document.getElementById('content')
      const image_url = document.getElementById('image_url')
      const img = document.getElementById('img')
      const created_at = document.getElementById('created_at')
      const status = document.getElementById('status')
      const url = new URL(window.location.href);  
      const id = url.searchParams.get('id'); // 'id' là tên của tham số trong URL  
      console.log(id);  
      // console.log(productId);
      const getNewsById = async (productId)=>{
          const res = await fetch(`http://localhost/Duan1_nhom7/DuAn1/Api/News/${id}`)
          const products = await res.json()
          title.value = products.data.title
          content.value = products.data.content
          img.src = '../../../'+products.data.image_url
          created_at.value = products.data.created_at
          status.value = products.data.status
      }
      
      getNewsById(id)
      console.log(getNewsById());
      const frmnews = document.getElementById('frmnews')
      document.getElementById("image_url").addEventListener("change", e => {
      const file = e.target;
      const fileList = file.files
      const img = document.getElementById("img");
      img.src = URL.createObjectURL(fileList[0]);
      img.onload = () => {
          URL.revokeObjectURL(fileList[0]);
      }
  })
  </script>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->
<?php 
    include "../../layouts/footer-block.php"
?> 
<?php 
    include "../../layouts/footer-js.php"
?> 
  
</body>
<!-- [Body] end -->

</html>