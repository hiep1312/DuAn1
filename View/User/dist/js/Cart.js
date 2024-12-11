const frameCart = document.getElementById("frameCart");
const total = document.querySelector("#total strong");
const voucher = document.querySelector("#voucher strong");
const buttonOrder = document.getElementById("buttonOrder");
if(!localStorage.getItem("sessionId")){
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
            Bạn cần đăng nhập để xem giỏ hàng!
          </div>`;
    document.getElementById("frame").replaceWith(alert);
}
const viewAllCart = async () => {
    frameCart.innerHTML = `
        <tr>
            <td colspan="6">
                <nav class="navbar bg-body-tertiary">
                     <div class="container-fluid">
                          <div>
                               <button class="btn btn-primary" id="continue">Tiếp tục mua hàng</button>
                               <button class="btn btn-secondary" id="deleteAll">Xóa hết</button>
                          </div>
                         <div class="d-flex">
                             <span class="input-group">
                                  <input class="form-control" type="search" placeholder="Voucher" aria-label="Voucher">
                                  <button class="btn btn-warning" type="button" id="applyVoucher">Áp dụng</button>
                             </span>
                        </div>
                    </div>
                </nav>
            </td>
        </tr>
    `;
    const applyVoucher = document.getElementById("applyVoucher");
    await accessToken.handleTokenLocal();
    const data = await new HTTPRequest("CartsDetails").getOne(accessToken.getInfo().user_id);
    frameCart.querySelector("button#continue").addEventListener("click", e => {
        new WebHistory().create(null, "?page=category", false);
        location.reload();
    });
    frameCart.querySelector("button#deleteAll").addEventListener("click", async e => {
        if(window.confirm("Bạn có chắc chắn muốn xóa tất cả sản phẩm không?")){
            const dataNews = await new HTTPRequest("CartsDetails").getOne(accessToken.getInfo().user_id);
            if(dataNews.status===200){
                for(let item of dataNews.data){
                    const request = new HTTPRequest("Carts");
                    const dataOld = await request.delete(item.cart_id);
                    request.tableName = "Productvariants";
                    const dataCurrentProductvariants = await request.getOne(dataOld.data.productVariant_id);
                    const formdataUpdateProduct = new FormData();
                    if(dataCurrentProductvariants.data.status===0) formdataUpdateProduct.append("status", 1);
                    formdataUpdateProduct.append("stock_quantity", (dataCurrentProductvariants.data.stock_quantity+dataOld.data.quantity));
                    await request.put(dataCurrentProductvariants.data.productVariant_id, formdataUpdateProduct, false);
                    request.tableName = "Products";
                    const dataCurrentProducts = await request.getOne(dataCurrentProductvariants.data.product_id);
                    if(dataCurrentProducts.data.status===0) dataCurrentProducts.set("status", 1);
                    formdataUpdateProduct.set("stock_quantity", (dataCurrentProducts.data.stock_quantity+dataOld.data.quantity));
                    await request.put(dataCurrentProducts.data.product_id, formdataUpdateProduct, false);
                }
                viewAllCart();
            }
        }
    });
    let totalMoney = 0;
    voucher.innerHTML = "";
    if(data.status===200){
        for(let item of data.data){
            const row = document.createElement("tr");
            const image = await new HTTPRequest("Imageproducts").getAll();
            totalMoney += (item.quantity*item.price);
            row.innerHTML = `
                <td style="color: black"><img src="${image.data?.filter(img => (img.location===0 && img.product_id===item.product_id))?.[0]?.album.slice(1) ?? `https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg`}" alt="Ảnh sản phẩm" class="img-thumbnail" style="max-width: 100px; max-height: 80px"></td>
                <td>${item.name ?? "Không xác định"}<br>(${item.material ?? "..."} - ${item.color ?? "..."})</td>
                <td>${item.price ?? "..."}₫</td>
                <td>
                    <input type="number" class="form-control text-center" value="${item.quantity ?? 1}" style="width: 80px;">
                </td>
                <td>${item.quantity*item.price}₫</td>
                <td><button class="btn btn-danger btn-sm">Xóa</button></td>
            `;
            row.querySelector("input[type=number]").addEventListener("beforeinput", e => {
                const number = /^[\s\d]+$/;
                if(!number.test(e.data) && e.inputType!=="deleteContentBackward"){
                    e.preventDefault();
                }
            });
            row.querySelector("input[type=number]").addEventListener("change", async e => {
                const request = new HTTPRequest("Carts");
                const formdata = new FormData();
                formdata.append("quantity", e.target.value);
                await request.put(item.cart_id, formdata, false);
                viewAllCart();
            });
            row.querySelector("button").addEventListener("click", async e => {
                const request = new HTTPRequest("Carts");
                const dataOld = await request.delete(item.cart_id);
                request.tableName = "Productvariants";
                const dataCurrentProductvariants = await request.getOne(dataOld.data.productVariant_id);
                const formdataUpdateProduct = new FormData();
                if(dataCurrentProductvariants.data.status===0) formdataUpdateProduct.append("status", 1);
                formdataUpdateProduct.append("stock_quantity", (dataCurrentProductvariants.data.stock_quantity+dataOld.data.quantity));
                await request.put(dataCurrentProductvariants.data.productVariant_id, formdataUpdateProduct, false);
                request.tableName = "Products";
                const dataCurrentProducts = await request.getOne(dataCurrentProductvariants.data.product_id);
                if(dataCurrentProducts.data.status===0) dataCurrentProducts.set("status", 1);
                formdataUpdateProduct.set("stock_quantity", (dataCurrentProducts.data.stock_quantity+dataOld.data.quantity));
                await request.put(dataCurrentProducts.data.product_id, formdataUpdateProduct, false);
                viewAllCart();
            });
            frameCart.prepend(row);
        }
        const webHistory = new WebHistory();
        let vouchersOld = {};
        applyVoucher.addEventListener("click", async e => {
            const input = e.target.previousElementSibling.value;
            if(input.trim().length !== 0){
                const request = new HTTPRequest("Vouchers");
                const allVouchers = await request.getOne(accessToken.getInfo().user_id);
                const messageSucces = document.getElementById("messageVoucher");
                messageSucces.classList.add("show");
                messageSucces.style.display = "block";
                messageSucces.querySelectorAll(".btnClose").forEach(close => close.addEventListener("click", () => {
                    messageSucces.classList.remove("show");
                    messageSucces.style.display = "none";
                }));
                if(allVouchers.status===200){
                    const check = Array.from(allVouchers.data).filter(voucher => voucher.code===input);
                    if(check.length > 0){
                        if(check[0].usage_limit<=0){
                            messageSucces.querySelector(".modal-body").innerHTML = `
                                <div class="alert alert-info d-flex align-items-center aos-init aos-animate" role="alert" data-aos="flip-up" data-aos-duration="1000">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 40px;">
                                        <path style="fill: currentcolor;" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </svg>
                                    <div>
                                        Khuyến mãi đã hết lượt sử dụng!
                                    </div>
                                </div>
                            `;
                        }else{
                            if(vouchersOld.code!==check[0].code){
                                if(vouchersOld.code){
                                    totalMoney = vouchersOld.totalOld;
                                }
                                vouchersOld.code = check[0].code;
                                vouchersOld.totalOld = totalMoney;
                                vouchersOld.promo_id = check[0].promo_id;
                                vouchersOld.user_id = check[0].user_id;
                                vouchersOld.discount = check[0].discount;
                                vouchersOld.usage_limit = check[0].usage_limit;
                                messageSucces.querySelector(".modal-body").innerHTML = `
                                <div class="alert alert-info d-flex align-items-center aos-init aos-animate" role="alert" data-aos="flip-up" data-aos-duration="1000">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 40px;">
                                        <path style="fill: currentcolor;" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                    <div>
                                        Áp dụng khuyến mãi thành công!
                                    </div>
                                </div>
                            `;
                                const priceVoucher = check[0].discount ?? 0;
                                totalMoney = (totalMoney - priceVoucher)<=0?0:totalMoney - priceVoucher;
                                total.innerHTML = totalMoney + "đ";
                                voucher.innerHTML = "-" + priceVoucher + "đ";
                            }else{
                                messageSucces.querySelector(".btnClose").click();
                            }
                        }
                    }else{
                        messageSucces.querySelector(".modal-body").innerHTML = `
                            <div class="alert alert-info d-flex align-items-center aos-init aos-animate" role="alert" data-aos="flip-up" data-aos-duration="1000">
                                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 40px;">
                                    <path style="fill: currentcolor;" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </svg>
                                <div>
                                    Không tìm thấy khuyến mãi!
                                </div>
                            </div>
                        `;
                    }
                }else{
                    messageSucces.querySelector(".modal-body").innerHTML = `
                            <div class="alert alert-info d-flex align-items-center aos-init aos-animate" role="alert" data-aos="flip-up" data-aos-duration="1000">
                                <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 40px;">
                                    <path style="fill: currentcolor;" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                </svg>
                                <div>
                                    Không tìm thấy khuyến mãi!
                                </div>
                            </div>
                    `;
                }
            }else{
                alert("Vui lòng điền khuyến mãi trước khi áp dụng nó!");
                e.target.previousElementSibling.focus();
            }
        }, false);
        if(webHistory.get()?.code){
            setTimeout(() => {
                applyVoucher.previousElementSibling.value = webHistory.get().code;
                applyVoucher.click();
            }, 1500);
        }
        buttonOrder.addEventListener("click", async e => {
            const dataNews = await new HTTPRequest("CartsDetails").getOne(accessToken.getInfo().user_id);
            if(dataNews.status===200){
                dataNews.vouchers = vouchersOld;
                new WebHistory().create(dataNews, "?page=pay", false);
                location.reload();
            }
        }, false)
    }else{
        const row = document.createElement("tr");
        const col = document.createElement("td");
        col.colSpan = 6;
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
            Không có sản phẩm nào trong giỏ hàng! Hãy thêm sản phẩm ngay đi nào!
          </div>`;
        col.append(alert);
        frameCart.prepend(row);
    }
    total.innerHTML = totalMoney + "đ";
}
viewAllCart().then();