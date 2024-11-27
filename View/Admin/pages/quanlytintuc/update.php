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



  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Cập nhật tin tức</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../index.php">Trang Chủ</a></li>
                <li class="breadcrumb-item" aria-current="page">Cập nhật tin tức</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <h1 class="my-4">Cập nhật tin tức</h1>
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
            <button type="submit" class="btn btn-outline-success">Cập nhật mới</button>
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
        const message = document.getElementById('message')
        const params = new URLSearchParams(location.search)
        const productId = params.get('id')
        // console.log(productId);
        const getNewsById = async (productId)=>{
            const res = await fetch(`http://localhost/Duan1_nhom7/DuAn1/Api/News/${productId}`)
            const products = await res.json()
            title.value = products.data.title
            content.value = products.data.content
            img.src = '../../../'+products.data.image_url
            created_at.value = products.data.created_at
            status.value = products.data.status
        }
        
        getNewsById(productId)
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
        frmnews.addEventListener('submit', async (e)=>{ 
            e.preventDefault()
              message.innerHTML = ''
              message.classList.add('d-none')
              const formdata = new FormData(e.target);
              console.log(...formdata.entries());
            if(validate(title.value, content.value)){
                try {
                       const res = await fetch(`http://localhost/Duan1_nhom7/DuAn1/Api/News/${productId}/PUT`, {
                        method: 'POST',
                        body: formdata
                       })
                    if(res.ok){
                        location = 'list.php'
                        message.innerHTML = 
                        `
                            <pre>Cập nhật mới thành công!@!!</pre>
                        `
                        message.classList.remove('d-none')
                        message.classList.remove('text-danger')
                        message.classList.add('text-info')
                    }else{
                      message.innerHTML = `
                            <pre>Cập nhật mới không thành công mời nhập lại!@!!</pre>
                        `
                        message.classList.remove('d-none')
                        message.classList.add('text-danger')
                    }
                } catch (error) {
                  message.innerHTML = `
                            <pre>Cập nhật mới không thành công mời nhập lại!@!!</pre>
                        `
                        message.classList.remove('d-none')
                        message.classList.add('text-danger')
                }
            }else{
                message.innerHTML = `
                        
                        <div class="alert alert-primary alert-dismissible fade show mb-3 w-100" role="alert">
                        <ul class="text-danger">
                            <li class="py-3">Tiêu đề tin tức không được để trống </li>
                            <li class="pb-3">Mô tả không được để trống </li>
                            <li>Ảnh bài viết không được để trống </li>
                        </ul>
                        <button type="button" class="btn-close fade" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `
                    message.classList.remove('d-none')
                    message.classList.add('text-danger')
            }
        })
        const validate =(title, content)=>{
            return (
                title.trim().length>0&&content.trim().length>0
            )
        }
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