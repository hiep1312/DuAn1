const request = new HTTPRequest("CartsDetails");
const tbody = document.querySelector("#view tbody");
const dataUsers = async (id) => {
  if (id) return await new HTTPRequest("Users").getOne(id);
  return null;
};
const data = async ()=> {
  tbody.innerHTML = "";
  const res = await request.getAll("user_id");
  let index = 0;
  const now = new Date(Date.now());
  for (let [id, item] of Object.entries(res.data)){
    const row = document.createElement("tr");
    const title = item.map(title => `${title.title ?? "Không xác định"}(${title.material ?? "..."} - ${title.color ?? "..."})(${title.quantity})`);
    const total = item.reduce((total, priceCurrent) => (priceCurrent.price*priceCurrent.quantity) + total, 0);
    const totalQuantity = item.reduce((total, quantityCurrent) => quantityCurrent.quantity + total, 0);
    const info = await dataUsers(accessToken.getInfo().user_id);
    row.innerHTML = `
            <td>${index+=1}</td>
            <td>
                ${info?`<div class="accordion" id="accordionProducts">
                  <div class="accordion-item collapsed">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${item.cart_id}">
                        ${info.data.name ?? ""}
                      </button>
                    </h2>
                    <div id="collapse${item.cart_id}" class="accordion-collapse collapse">
                      <div class="accordion-body text-start fw-bold">
                        <div class="row justify-content-between">
                            <span class="text-info col-4">Email: </span>
                            <span class="col-8 text-truncate">${info.data.email ?? ""}</span>
                        </div>
                        <div class="row justify-content-between">
                            <span class="text-info col-4">SĐT: </span>
                            <span class="col-8 text-truncate">${info.data.phone ?? ""}</span>
                        </div>
                        <div class="row justify-content-between">
                            <span class="text-info col-4">Địa chỉ: </span>
                            <span class="col-8 text-truncate">${info.data.address ?? ""}</span>
                        </div>
                        <div class="row justify-content-between">
                            <span class="text-info col-4">Mô tả: </span>
                            <span class="col-8 text-truncate">${info.data.bio ?? ""}</span>
                        </div>
                        <div class="row justify-content-between">
                            <span class="text-info col-4">Tài khoản: </span>
                            <span class="col-8 text-truncate">${info.data.role_id===1?"Quản trị viên":"Người dùng"}</span>
                        </div>
                        <div class="row justify-content-between">
                            <span class="text-info col-4">Trạng thái: </span>
                            <span class="col-8 text-truncate">${info.data.status?"Bình thường":"Khóa"}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>`: ""}
            </td>
            <td>${title.join(", ")?.slice(0, 30).concat("...")}</td>
            <td>${totalQuantity}</td>
            <td>${total}</td>
            <td>${item?.at(-1).created_at?.split("-").reverse().join("/") ?? `${now.getDate()}/${now.getMonth()}/${now.getFullYear()}`}</td>
            <td>
                <div class="btn-group border border-none gap-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info rounded" onclick="detailsRow(${item[0].user_id})">Chi tiết</button>
                    <button type="button" class="btn btn-outline-danger rounded" onclick="deleteRow(${item[0].user_id})">Xóa</button>
                </div>
            </td>
        `
    tbody.append(row);
  }
}
data().then();
const liveToast = document.getElementById("liveToast");
liveToast.querySelector('.button-close').addEventListener("click", e => {
  liveToast.style.display = "none";
}, false);
const modal = document.getElementById("modal");
const formView = document.getElementById("formDetails");
async function detailsRow(id){
  formView.innerHTML = "";
  modal.setAttribute("style", "display: block; top: 2.7vh; filter: blur(0); opacity: 1;");
  modal.nextElementSibling.setAttribute("style", "filter: blur(5px); opacity: 0.5;");
  modal.querySelectorAll(".button-close").forEach(buttonClose => {
    buttonClose.addEventListener("click", e => {
      modal.style.display = "none";
      modal.nextElementSibling.setAttribute("style", "");
    }, false);
  });
  const response = await new HTTPRequest("CartsDetails").getOne(id);
  if(response.status===200){
    const info = document.createElement("div");
    info.classList.value = "row g-3";
    info.innerHTML = `
             <div class="mb-2 col-12 col-md-6">
                  <label for="name" class="form-label">Tên người dùng</label>
                  <input type="text" value="${response.data?.[0].name ?? "Không xác định"}" name="name" id="name" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" value="${response.data?.[0].email ?? "Không xác định"}" name="email" id="email" class="form-control" readonly>
             </div>
        `;
    const line = document.createElement("hr");
    line.className = "border border-1 opacity-50 mt-4";
    line.setAttribute("style", "--bs-border-color: #ff0077;");
    formView.append(info, line);
    response.data.forEach(item => {
      const containerOrderItem = document.createElement("div");
      containerOrderItem.classList.value = "mt-2 row g-3";
      containerOrderItem.innerHTML = `
                <div class="mb-2 col-12 col-md-6">
                  <label for="title${item.item_id}" class="form-label">Tên sản phẩm</label>
                  <input type="text" value="${item.title ?? "Không xác định"}" name="title" id="title${item.item_id}" class="form-control" readonly>
                </div>
                <div class="mb-2 col-12 col-md-6">
                  <label for="type${item.item_id}" class="form-label">Loại sản phẩm</label>
                  <input type="text" value="${item.material ?? '...'} - ${item.color ?? '...'}" name="type" id="type${item.item_id}" class="form-control" readonly>
                </div>
                <div class="mb-2 col-12 col-md-6">
                  <label for="price${item.item_id}" class="form-label">Giá</label>
                  <input type="number" value="${item.price ?? 0}" name="price" id="price${item.item_id}" class="form-control" readonly>
                </div>
                <div class="mb-2 col-12 col-md-6">
                  <label for="quantity${item.item_id}" class="form-label">Số lượng</label>
                  <input type="number" value="${item.quantity ?? 0}" name="quantity" id="quantity${item.item_id}" class="form-control" readonly>
                </div>
                <div class="mb-2 col-12">
                  <label for="total${item.item_id}" class="form-label">Tổng tiền</label>
                  <input type="number" value="${item.price*item.quantity}" name="total" id="total${item.item_id}" class="form-control" readonly>
                </div>
            `;
      const lineRow = document.createElement("hr");
      lineRow.className = "mt-4";
      formView.append(containerOrderItem, response.data.at(-1).cart_id===item.cart_id?"":lineRow);
    });
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
            Không tìm thấy dữ liệu!
          </div>`;
    formView.replaceWith(alert);
  }
}
async function deleteRow(id){
  if(window.confirm("Bạn có chắc chắn muốn xóa không!")){
    const DataId = await request.getOne(id);
    for(let item of DataId.data){
      await new HTTPRequest("Carts").delete(item.cart_id);
    }
    if(request.getStatus()===200){
      liveToast.setAttribute("style", "display: block; --bs-toast-bg: #b3ffabd9");
      liveToast.querySelector("#message").textContent = "Xóa đơn hàng thành công!";
    }else{
      liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
      liveToast.querySelector("#message").textContent = "Xóa đơn hàng thất bại!";
    }
    setTimeout(() => liveToast.style.display = "none", 3000);
    await data();
  }
}