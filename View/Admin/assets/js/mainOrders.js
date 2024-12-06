const request = new HTTPRequest("OrdersDetails")
const tbody = document.querySelector("#view tbody")
const data = async ()=> {
   tbody.innerHTML = "";
   const res = await request.getAll("order_id");
   let index = 0;
   const now = new Date(Date.now());
   for (let [id, item] of Object.entries(res.data)){
        const row = document.createElement("tr");
        const title = item.map(title => `${title.title ?? "Không xác định"}(${title.material ?? "..."} - ${title.color ?? "..."})(${title.quantity})`);
        const total = item.reduce((total, priceCurrent) => (priceCurrent.price*priceCurrent.quantity) + total, 0);
        row.innerHTML = `
            <td>${index+=1}</td>
            <td>${item[0].name ?? "Không xác định"}</td>
            <td>${item[0].email ?? "Không xác định"}</td>
            <td>${item[0].phone ?? "Không xác định"}</td>
            <td>${item[0].address ?? "Không xác định"}</td>
            <td>${title.join(", ")?.slice(0, 30).concat("...")}</td>
            <td class="${item[0].status === 0 ? "text-secondary" : (item[0].status===1? "text-success" : "text-danger")} fw-bold">${item[0].status === 0 ? "Chờ xử lý" : (item[0].status===1? "Đã xác nhận" : "Đã bị hủy")}</td>
            <td>${item[0].total_amount ?? ""}</td>
            <td>${total}</td>
            <td>${item[0].created_at?.split("-").reverse().join("/") ?? `${now.getDate()}/${now.getMonth()}/${now.getFullYear()}`}</td>
            <td>${item[0].updated_at?.split("-").reverse().join("/") ?? ""}</td>
            <td>${item[0].description ?? ""}</td>
            <td>
                <div class="btn-group border border-none gap-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-info rounded" onclick="detailsRow(${item[0].order_id})">Chi tiết</button>
                    <button type="button" class="btn btn-outline-danger rounded" onclick="deleteRow(${item[0].order_id})">Xóa</button>
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
    const response = await new HTTPRequest("OrdersDetails").getOne(id);
    if(response.status===200){
        const info = document.createElement("div");
        info.classList.value = "row g-3";
        info.innerHTML = `
             <div class="mb-2 col-12 col-md-6">
                  <label for="name" class="form-label">Tên người đặt</label>
                  <input type="text" value="${response.data?.[0].name ?? "Không xác định"}" name="name" id="name" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" value="${response.data?.[0].email ?? ""}" name="email" id="email" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-4">
                  <label for="phone" class="form-label">Số điện thoại</label>
                  <input type="tel" value="${response.data?.[0].phone ?? ""}" name="phone" id="phone" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-8">
                  <label for="address" class="form-label">Địa chỉ</label>
                  <input type="text" value="${response.data?.[0].address ?? ""}" name="address" id="address" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-6">
                  <label for="created_at" class="form-label">Ngày đặt hàng</label>
                  <input type="date" value="${response.data?.[0].created_at ?? ""}" name="created_at" id="created_at" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-6">
                  <label for="updated_at" class="form-label">Ngày giao hàng</label>
                  <input type="date" value="${response.data?.[0].updated_at ?? ""}" name="updated_at" id="updated_at" class="form-control">
             </div>
             <div class="mb-2 col-12">
                  <label for="description" class="form-label">Ghi chú</label>
                  <textarea name="description" id="description" class="form-control" readonly>${response.data?.[0].description ?? ""}</textarea>
             </div>
        `;
        info.querySelector("#updated_at").addEventListener("change", async e => {
            const dataUpdatedAt = new FormData();
            dataUpdatedAt.append("updated_at", e.target.value);
            await new HTTPRequest("Orders").put(id, dataUpdatedAt, false);
            await data();
        }, false)
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
            formView.append(containerOrderItem, response.data.at(-1).item_id===item.item_id?"":lineRow);
        });
        if(response.data?.[0].status!==0){
            modal.querySelector("div.modal-footer").remove();
        }
        const handleSubmitView = async e => {
            e.preventDefault();
            const handleStatus = async (status, type) => {
                const data = new FormData();
                data.append("status", status);
                const response = await new HTTPRequest("Orders").put(id, data, false);
                if (response.status === 200) {
                    liveToast.setAttribute("style", "display: block; --bs-toast-bg: #b3ffabd9");
                    liveToast.querySelector("#message").textContent = type === "confirm" ? "Xác nhận đơn hàng thành công!" : "Từ chối đơn hàng thành công!";
                    modal.nextElementSibling.setAttribute("style", "");
                    modal.style.display = "none";
                } else {
                    liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
                    liveToast.querySelector("#message").textContent = type === "confirm" ? "Không thể xác nhận đơn hàng!" : "Không thể từ chối đơn hàng!";
                }
                setTimeout(() => liveToast.style.display = "none", 3000);
            }
            await handleStatus(e.submitter.name === "confirm" ? 1 : 2, e.submitter.name);
            await data();
            e.target.removeEventListener('submit', handleSubmitView);
        }
        formView.addEventListener('submit', handleSubmitView);
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
        const dataOld = await request.getOne(id);
        for(let {item_id: itemId} of dataOld.data){
            await new HTTPRequest("Orderitems").delete(itemId);
        }
        const response = await new HTTPRequest("Orders").delete(id);
        if(response.status===200){
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