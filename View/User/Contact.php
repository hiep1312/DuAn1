<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>
<section class="bg-secondary-opacity-custom">
      <div class="container custom-padding">
        <!-- Contact Section -->
        <div class="row">
          <!-- Contact Information -->
          <div class="col-lg-6 mb-4 padding-right-c">
            <h1
              data-aos="fade-up"
              class="h-text font-krona-one text-uppercase mb-3"
            >
              Liên hệ chúng tôi
            </h1>
            <p data-aos="fade-up" data-aos-delay="200">
              <form>
                <div class="mb-3">
                  <div class="mb-3">
                    <label for="nameContacts"  class="form-label">Name</label>
                    <input type="text" placeholder="Tên của bạn" class="form-control" id="nameContacts">
                  </div>
                  <label for="emailContacts" class="form-label">Email address</label>
                  <input type="email" placeholder="name123@gmail.com" class="form-control" id="emailContacts" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text text-light">Chúng tôi sẽ không bao giờ chia sẻ email này cho bất kì ai</div>
                </div>
                <div class="mb-3">
                  <label for="phoneContacts" class="form-label">Phone</label>
                  <input type="text" class="form-control" placeholder="Mời bạn nhập sdt" id="phoneContacts">
                </div>
                <div class="mb-3">
                  <label for="messageContacts" class="form-label">Message</label>
                  <textarea class="form-control" id="messageContacts" placeholder="Ý kiến muốn đóng góp hoặc yêu cầu của bạn" rows="3"></textarea>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </p>
          </div>
          <!-- Office Information -->
          <div class="row col-lg-6 mb-4"> 
          <div class="col-lg-6 mb-4">
            <h6 data-aos="fade-up" class="text-uppercase mb-3 font-krona-one">
              Office
            </h6>
            <p data-aos="fade-up" data-aos-delay="200">
              Đường 48, Trịnh Văn Bô, <br />
              Hoài Đức, Hà Nội <br />
              Duan1_nhom7
            </p>
            <h6
              data-aos="fade-up"
              class="text-uppercase mt-4 mb-3 font-krona-one"
            >
              Giờ làm việc
            </h6>
            <p data-aos="fade-up" data-aos-delay="200">
              Thứ Hai – Thứ 6 (9h - 5h)
            </p>
          </div>
          <!-- Connect Information -->
          <div class="col-lg-6 mb-4">
<h6 data-aos="fade-up" class="text-uppercase mb-3 font-krona-one">
              Kết nối
            </h6>
            <div
              data-aos="fade-up"
              data-aos-delay="200"
              class="d-flex align-items-center gap-3"
            >
              <i class="fa-regular fa-envelope" style="color: #c4fb6d"></i>
              <p class="mb-0">ledan1234@gmail.com</p>
            </div>
            <div
              data-aos="fade-up"
              data-aos-delay="200"
              class="d-flex align-items-center gap-3"
            >
              <i class="fa-solid fa-phone" style="color: #c4fb6d"></i>
              <p class="mb-0">+789 456 123</p>
            </div>
            <div
              data-aos="fade-up"
              data-aos-delay="200"
              class="d-flex align-items-center gap-3"
            >
              <i class="fa-solid fa-phone" style="color: #c4fb6d"></i>
              <p class="mb-0">+123 456 789</p>
            </div>
            <h6
              data-aos="fade-up"
              class="text-uppercase mt-4 mb-3 font-krona-one"
            >
              Tuyển dụng
            </h6>
            <p data-aos="fade-up" data-aos-delay="200">
              Xem
              <a href="#" class="text-secondary-color text-decoration-none"
                >Chi tiết tuyển dụng</a
              >.
            </p>
          </div>
          <div class="map_contact lg-container-fluid">
          <iframe 
              ata-aos="fade-up" data-aos-delay="200"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8671759619015!2d105.74328887503171!3d21.037999980613627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455e940879933%3A0xcf10b34e9f1a03df!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1731549795417!5m2!1svi!2s"
              width="450"
              height="300"
              loading="lazy"
          ></iframe>
          </div>
          </div>
      </div>
      </div>
      
    </section>
<?php
include $BASE_URL . "View/User/footer.php"
?>
