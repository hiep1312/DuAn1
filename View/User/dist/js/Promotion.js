const framePromotion = document.getElementById("framePromotion");
if(localStorage.getItem("sessionId")){
    const viewAllPromotion = async () => {
        framePromotion.innerHTML = "";
        const request = new HTTPRequest("Vouchers");
        await accessToken.handleTokenLocal();
        const data = await request.getOne(accessToken.getInfo().user_id);
        if(data.status===200){
            for(let item of data.data){
                const div = document.createElement("div");
                div.className = "col-12 col-md-6 col-lg-4 d-flex flex-column mt-4 mt-lg-4";
                console.log(item);
                div.innerHTML = `
                    <div data-aos="fade-up" class="card text-primary-custom text-light">
                        <img src="https://inhophuc.com/wp-content/uploads/2023/11/in-voucher-3.jpg" class="card-img-top rounded-3" alt="Ảnh khuyến mãi">
                        <div class="card-body">
                          <h5 class="font-krona-one text-center h5-text">
                            ${item.code ?? "Không xác định"}
                          </h5>
                          <div class="text-bg-danger text-center bg-opacity-50 p-2 border border-3 border-warning border-end-0 border-top-0 border-bottom-0">Giảm ${item.discount ?? 0}đ</div>
                        </div>
                      <div class="d-flex justify-content-center gap-2 pb-5">
                        <a role="button" class="btn btn-outline-light">Chi tiết</a>
                        <a href="?page=cart" class="btn btn-primary">Áp dụng ngay</a>
                      </div>
                    </div>
            `;
                framePromotion.prepend(div);
            }
        }else{
            const row = document.createElement("tr");
            const col = document.createElement("td");
            col.colSpan = 7;
            row.append(col);
            const alert = document.createElement("div");
            alert.className = "alert alert-info d-flex align-items-center";
            alert.role = "alert";
            alert.dataset.aos = "flip-up";
            alert.dataset.aosDuration = "1000";
            alert.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 50px;">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg>
          <div>
            Không có khuyến mãi nào cả!
          </div>`;
            col.append(alert);
            framePromotion.prepend(row);
        }
    }
    viewAllPromotion().then();
}else{
    const alert = document.createElement("div");
    alert.className = "alert alert-warning d-flex align-items-center";
    alert.role = "alert";
    alert.dataset.aos = "flip-up";
    alert.dataset.aosDuration = "1000";
    alert.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 50px;">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>
            Bạn cần đăng nhập để xem khuyến mãi!
          </div>`;
    document.getElementById("frame").replaceWith(alert);
}
