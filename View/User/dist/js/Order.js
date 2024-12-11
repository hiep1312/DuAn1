const frameOrder = document.getElementById("frameOrder");
let dataOld = null;
let imageAllOld = null;
if(localStorage.getItem("sessionId")){
    const checkUnlike = (obj1, obj2) => {
        return JSON.stringify(obj1) === JSON.stringify(obj2);
    }
    const viewAllOrder = async () => {
        const request = new HTTPRequest("OrdersUser");
        await accessToken.handleTokenLocal();
        const data = await request.getOne(accessToken.getInfo().user_id);
        const imageAll = await new HTTPRequest("Imageproducts").getAll();
        if(!checkUnlike(data, dataOld) || !checkUnlike(imageAll, imageAllOld)){
            frameOrder.innerHTML = "";
            dataOld = data;
            imageAllOld = imageAll;
            if(data.status===200){
                Object.entries(Object.groupBy(data.data, item => item.order_id)).forEach(orderItem => {
                    const row = document.createElement("tr");
                    let name = [];
                    orderItem[1].forEach(info => {
                        name.push(`${info.title ?? "Không xác định"}(${info.material ?? "..."} - ${info.color ?? "..."})(${info.quantity ?? 0})`);
                    });
                    const totalPrice = orderItem[1].reduce((total, price) => (price.price*price.quantity)+total, 0);
                    const totalQuantity = orderItem[1].reduce((total, quantity) => (quantity.quantity)+total, 0);
                    row.innerHTML = `
                    <td><img src="${imageAll.data?.filter(img => (img.location===0 && img.product_id===orderItem[1][0].product_id))?.[0]?.album.slice(1) ?? `https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg`}" alt="Ảnh sản phẩm" class="img-thumbnail" style="max-width: 100px; max-height: 80px"></td>
                    <td>${name.join(", ")}</td>
                    <td>
                        <input type="number" class="form-control text-center" value="${totalQuantity ?? 1}" style="width: 80px;" disabled>
                    </td>
                    <td>${totalPrice ?? 0}đ + <span class="text-danger">30000đ(ship)</span></td>
                    <td>${orderItem[1][0].description?.slice(0, 15).concat("...") ?? ""}</td>
                    <td>${orderItem[1][0].created_at?.split('-').reverse().join("/") ?? "Không xác định"}</td>
                    <td>${orderItem[1][0].updated_at?.split('-').reverse().join("/") ?? "Không xác định"}</td>
                    <td class="${orderItem[1][0].status===0?"text-secondary":(orderItem[1][0].status===1?"text-success":"text-danger")}"><strong>${orderItem[1][0].status===0?"Đang chờ xử lý":(orderItem[1][0].status===1?"Đã xác nhận":"Đã hủy")}</strong></td>
                    <td><a role="button" class="text-decoration-none">Chi tiết</a></td>
                `;
                    row.querySelector("a[role=button]").addEventListener("click", () => detailsOrder(orderItem[1][0].order_id));
                    frameOrder.prepend(row);
                });
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
                Không có đơn hàng nào cả! Hãy mua hàng nhé!
              </div>`;
                col.append(alert);
                frameOrder.prepend(row);
            }
        }
    }
    viewAllOrder().then();

    const detailsOrder = async (id) => {
        const modal = document.getElementById("modal");
        const formView = document.getElementById("formDetails");
        const liveToast = document.getElementById("liveToast");
        liveToast.querySelector('.button-close').addEventListener("click", e => {
            liveToast.style.display = "none";
        }, false);
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
        if (response.status === 200) {
            const info = document.createElement("div");
            info.classList.value = "row g-3";
            info.innerHTML = `
             <div class="mb-2 col-12 col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" value="${response.data?.[0].email ?? ""}" name="email" id="email" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-6">
                  <label for="phone" class="form-label">Số điện thoại</label>
                  <input type="tel" value="${response.data?.[0].phone ?? ""}" name="phone" id="phone" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12">
                  <label for="address" class="form-label">Địa chỉ</label>
                  <input type="text" value="${response.data?.[0].address ?? ""}" name="address" id="address" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-6">
                  <label for="created_at" class="form-label">Ngày đặt hàng</label>
                  <input type="date" value="${response.data?.[0].created_at ?? ""}" name="created_at" id="created_at" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12 col-md-6">
                  <label for="updated_at" class="form-label">Ngày giao hàng</label>
                  <input type="date" value="${response.data?.[0].updated_at ?? ""}" name="updated_at" id="updated_at" class="form-control" readonly>
             </div>
             <div class="mb-2 col-12">
                  <label for="description" class="form-label">Ghi chú</label>
                  <textarea name="description" id="description" class="form-control" readonly>${response.data?.[0].description ?? ""}</textarea>
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
                  <input type="number" value="${item.price * item.quantity}" name="total" id="total${item.item_id}" class="form-control" readonly>
                </div>
            `;
                const lineRow = document.createElement("hr");
                lineRow.className = "mt-4";
                formView.append(containerOrderItem, response.data.at(-1).item_id === item.item_id ? "" : lineRow);
            });
            if(response.data?.[0].status!==0){
                modal.querySelector("div.modal-footer").remove();
            }
            const handleSubmitView = async (e) => {
                e.preventDefault();
                const checkStatus = await new HTTPRequest("Orders").getOne(id);
                if(checkStatus.data.status!==0){
                    liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
                    liveToast.querySelector("#message").textContent = "Hủy đơn hàng không thành công! Bởi vì đơn hàng đã được xác nhận";
                    modal.nextElementSibling.setAttribute("style", "");
                    modal.style.display = "none";
                    setTimeout(() => liveToast.style.display = "none", 3000);
                    viewAllOrder();
                }else{
                    const data = new FormData();
                    data.append("status", 2);
                    const response = await new HTTPRequest("Orders").put(id, data, false);
                    if (response.status === 200) {
                        liveToast.setAttribute("style", "display: block; --bs-toast-bg: #b3ffabd9");
                        liveToast.querySelector("#message").textContent = "Hủy đơn hàng thành công!";
                        modal.nextElementSibling.setAttribute("style", "");
                        modal.style.display = "none";
                    } else {
                        liveToast.setAttribute("style", "display: block; --bs-toast-bg: #ffababd9");
                        liveToast.querySelector("#message").textContent = "Không thể hủy đơn hàng!";
                    }
                    setTimeout(() => liveToast.style.display = "none", 3000);
                    viewAllOrder();
                    e.target.removeEventListener("submit", handleSubmitView);
                }
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
    setInterval(viewAllOrder, 5000);
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
            Bạn cần đăng nhập để xem đơn hàng!
          </div>`;
    document.getElementById("frame").replaceWith(alert);
}