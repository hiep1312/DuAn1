const frameOrder = document.getElementById("frameOrder");
if(localStorage.getItem("sessionId")){
    const viewAllOrder = async () => {
        frameOrder.innerHTML = "";
        const request = new HTTPRequest("OrdersUser");
        await accessToken.handleTokenLocal();
        const data = await request.getOne(accessToken.getInfo().user_id);
        const imageAll = await new HTTPRequest("imageproducts").getAll();
        if(data.status===200){
            for(let item of data.data){
                const row = document.createElement("tr");
                console.log(data.data);
                row.innerHTML = `
                <td><img src="${imageAll.data?.filter(img => (img.location===0 && img.product_id===item.product_id))?.[0].album.slice(1) ?? `https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg`}" alt="Ảnh sản phẩm" class="img-thumbnail" style="max-width: 100px; max-height: 80px"></td>
                <td>${item.name ?? "Không xác định"}</td>
                <td>${item.price ?? 0}₫</td>
                <td>
                    <input type="number" class="form-control text-center" value="${item.quantity ?? 1}" style="width: 80px;" disabled>
                </td>
                <td>${item.price*item.quantity}₫</td>
                <td class="${item.status===0?"text-secondary":(item.status===1?"text-success":"text-danger")}"><strong>${item.status===0?"Đang chờ xử lý":(item.status===1?"Đã chấp nhận":"Bị từ chối")}</strong></td>
                <td>${item.updated_at?.split('-').reverse().join("/") ?? "Không xác định"}</td>
                <td><a role="button" class="text-decoration-none">Chi tiết</a></td>
            `;
                frameOrder.prepend(row);
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
            Không có đơn hàng nào cả! Hãy mua hàng nhé!
          </div>`;
            col.append(alert);
            frameOrder.prepend(row);
        }
    }
    viewAllOrder().then();
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
