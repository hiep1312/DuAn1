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
                <h5 class="m-b-10">Danh sách tin tức</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../dashboard/chart/index.php">Trang Chủ</a></li>
                <li class="breadcrumb-item" aria-current="page">Danh sách tin tức</li>
                <li class="breadcrumb-item"><a href="../../elements/quanlytintuc/add.php">Thêm tin tức mới</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <div class="modal fade" id="updateProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Cập nhật tin tức</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeform()"></button>
            </div>
            <div class="modal-body">
                            <!-- Horizontal Form -->
              <form id="frmnews" method="post" class="d-flex gap-3 flex-column" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="title" class="col-sm-2 col-form-label">Tiêu đề tin tức</label>
                  <div class="col-sm-10">
                  <input type="text" name="title" id="title" class="form-control" placeholder="Mời bạn nhập tiêu đề tin tức">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="content" class="col-sm-2 col-form-label">Mô tả</label>
                  <div class="col-sm-10">
                  <input type="text" name="content" id="content" class="form-control" placeholder="Mời bạn nhập mô tả">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="price" class="col-sm-2 col-form-label">Ảnh tin tức</label>
                  <div class="col-sm-10">
                  <input type="file" name="image_url"  id="image_url" class="form-control" placeholder="Mời bạn nhập ảnh bài viết">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="mota" class="col-sm-2 col-form-label">Thời gian đăng tin tức</label>
                  <div class="col-sm-10">
                  <input type="date" name="created_at" id="created_at" class="form-control" placeholder="Mời bạn nhập thời gian đăng tin tức">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="status" class="col-sm-2 col-form-label">Trạng thái</label>
                  <div class="col-sm-10">
                    <select name="status" id="status" class="form-select">
                      <option value="1">Xuất bản</option>
                      <option value="0">Khóa</option>
                    </select>
                  </div>
                </div>
                <img src="" width="300" id="img" alt="anhloi">
                <!-- <div class="text-center"> -->
                    <button type="submit" class="btn btn-outline-primary">Cập nhật mới</button>
                <!-- </div> -->
                <div class= "d-none mb-3" id="message">
            
                </div>
              </form><!-- End Horizontal Form -->
            </div>
          </div>
        </div>
      </div>

      <h1 class="my-4">Danh sách tin tức</h1>
    <!-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
          Menu
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a href="add.html"><li><button class="dropdown-item" type="button">Them moi khoa hoc</button></li></a>
          <a href="register.html"><li><button class="dropdown-item" type="button">Register</button></li></a>
        </ul>
      </div> -->
    <table class="table table-light table-hover table-striped table-bodered text-center">
        <thead class="table table-dark">
            <tr>
                <th>STT</th>
                <th>Tiêu đề tin tức</th>
                <th>Mô tả</th>
                <th>Ảnh tin tức</th>
                <th>Ngày đăng tin tức</th>
                <th>Trạng thái</th>
                <th>Công cụ</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
    <script>
           const getNewss = async()=>{
                const tbody = document.querySelector('tbody')
                try {
                    const res = await fetch('http://localhost/Duan1_nhom7/DuAn1/Api/News')
                    const newss = await res.json()
                    console.log(newss);
                    newss.data.forEach((news, index)=>{
                        const tr = document.createElement('tr')
                        tr.innerHTML = `
                            <td>${index+1}</td>
                            <td>${news.title}</td>
                            <td>${news.content}</td>
                            <td> <img src="../../../${news.image_url}" witdh="100px" height="50px" id="img" alt="anhloi"></td>  
                            <td class="w-40">${news.created_at}</td>
                            <td >${news.status}</td>
                            <td>
                            <div class="btn-group border border-light gap-2" role="group" aria-label="Third group">
                                  <button class="badge rounded-pill text-bg-info p-2 fs-5"  onclick="updateProduct(${news.news_id})">Update</button> 
                                  <button class="badge rounded-pill text-bg-danger p-2 fs-5" onclick="Deletenews(${news.news_id})">Delete</button>
                            </div>
                            </td>
                        `
                        tbody.append(tr)
                    })
                } catch (error) {
                    alert('Loi!!')
                }
            }
            getNewss()
            const Deletenews= async (id)=>{
                if(confirm('Bạn có chắc muốn xóa chứ???')){
                    try {
                       const res = await fetch(`http://localhost/Duan1_nhom7/DuAn1/Api/News/${id}`, {
                        method: 'DELETE',
                       })
                    if(res.ok){
                        alert(`Delete thành công!!!!`)
                        location.reload();
                    }else{
                        alert(`Delete không thành công!!!!`)
                    }
                } catch (error) {
                    alert(`Delete không thành công!!!!`)
                }
                }
            }
    // End danh sách tin tức
    
    // Bắt đầu update tin tức
        let newsId;
        const title = document.getElementById('title')
        const content = document.getElementById('content')
        const image_url = document.getElementById('image_url')
        const img = document.getElementById('img')
        const created_at = document.getElementById('created_at')
        const status = document.getElementById('status')
        const message = document.getElementById('message')
        // const params = new URLSearchParams(location.search);
        // const id = params.get('news_id'); // Lấy giá trị của tham số "news_id"
        // console.log('ID:', id);
        // let id;
        // console.log(id);
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
        
        // getNewsById(productId)
        // console.log(getNewsById());
        
        document.getElementById("image_url").addEventListener("change", e => {
        const file = e.target;
        const fileList = file.files
        const img = document.getElementById("img");
        img.src = URL.createObjectURL(fileList[0]);
        img.onload = () => {
            URL.revokeObjectURL(fileList[0]);
        }
    })
    // const getNewsId = (id)=>{
    //       getNewsById(id);
    //       id = id;
    //       console.log(id);
    // }
    // getNewsById(id)
     
    const updateProduct = (id)=>{
          const update = document.getElementById('updateProduct')
          // console.log(update);
          update.classList.add('show')
          update.style.display = 'block'
          newsId = id; // Gán id vào biến toàn cục
          // console.log('ID hiện tại:', newsId);
          // getNewsById(id);
          getNewsById(id);
        }
      // console.log(updateProduct(newId));
      
        const closeform=()=>{
          const update = document.getElementById('updateProduct')
          // console.log(update);
          update.classList.remove('show')
          update.style.display = 'none'
        }
        const frmnews = document.getElementById('updateProduct')
        frmnews.addEventListener('submit', async (e)=>{ 
            e.preventDefault()
              message.innerHTML = ''
              message.classList.add('d-none')
              const formdata = new FormData(e.target);
              console.log(...formdata.entries());
              // console.log(newID);
              // const productId = id
              if(validate(title.value, content.value)){
                try {
                       const res = await fetch(`http://localhost/Duan1_nhom7/DuAn1/Api/News/${newsId}/PUT`, {
                          method: 'POST',
                          body: formdata
                       })
                    if(res.ok){
                        setTimeout(() => {
                            location = 'list.php'
                        }, 500);
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
                    // console.log(hello);
                    
                } catch (error) {
                  message.innerHTML = `
                            <pre>Cập nhật mới không thành công mời nhập lại!@!!</pre>
                        `
                        console.error('Lỗi:', error);
                         alert('Lỗi xảy ra: ' + error.message);
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
        // End update tiin tức
      
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