const FrameListProducts = document.getElementById("frameProducts");
let data;
const allProducts = async (reset = true, dataChange = null) => {
    if(reset===true) data = await new HTTPRequest("Products").getAll();
    else if(reset===false && dataChange!==null) data = await dataChange;
    else throw new Error("Invalid Parameter!");
    const frameProducts = document.createElement("div");
    frameProducts.className = "row";
    FrameListProducts.innerHTML = "";
    FrameListProducts.append(frameProducts);
    if(data.status===200){
        data.data.forEach(item => {
            const frameProduct = document.createElement("div");
            frameProduct.classList.value = "col-md-6 col-lg-4 mb-4";
            frameProduct.dataset.aos = "fade-up";
            frameProduct.dataset.aosDuration = "800";
            frameProduct.role = "button";
            frameProduct.onclick = () => {
                const webHistory = new WebHistory();
                webHistory.create(item, "?page=productdetails", false);
                location.reload();
            }
            // console.log(item.imageProducts.filter(img => img.location===0)?.[0])
            frameProduct.innerHTML = `
                    <div class="card h-100 border border-light bg-white">
                        <img src="${item.imageProducts.filter(img => img.location===0)?.[0]?.album.slice(1) ?? `https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg`}" class="card-img-top" style="max-height: 250px" alt="Ảnh sản phẩm">
                        <div class="card-body text-center px-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-primary">SL: ${item.stock_quantity ?? 0}</p>
                                <p class="${item.status?"text-success":"text-danger"}">${item.status?"Còn hàng":"Không còn hàng"}</p>
                            </div>
                            <p class="card-title h5">${item.name ?? "Sản phẩm không có tiêu đề"}</p>
                            <p class="card-text text-secondary">${item.brand ?? "Không xác định"}</p>
                            <p class="card-text text-danger fw-bold">${item.productVariants?.[0]?.price ?? 0}đ</p>
                        </div>
                    </div>
                `;
            frameProducts.prepend(frameProduct);
        });
    }else{
        const alert = document.createElement("div");
        alert.className = "alert alert-primary d-flex align-items-center";
        alert.role = "alert";
        alert.dataset.aos = "flip-up";
        alert.dataset.aosDuration = "1000";
        alert.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 50px;">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>
            Không tìm thấy sản phẩm nào!
          </div>`;
        frameProducts.replaceWith(alert);
    }
}
allProducts().then();

const categories = async () => {
    const data = await new HTTPRequest("Categories").getAll();
    const frameCategories = document.getElementById("categories");
    if(data.status===200){
        data.data.forEach(category => {
            const buttonCategory = document.createElement("button");
            buttonCategory.classList.value = "list-group-item list-group-item-action";
            buttonCategory.type = "button";
            buttonCategory.style.color = "#03346E";
            buttonCategory.textContent = category.name ?? "Không xác định";
            buttonCategory.addEventListener("click", async e => {
                if(buttonCategory.classList.contains("active")){
                    buttonCategory.classList.remove("active");
                    await allProducts(true);
                }else {
                    buttonCategory.classList.add("active");
                    buttonCategory.parentElement.querySelectorAll("button:not(:hover)").forEach(item => item.classList.remove("active"));
                    buttonCategory.setAttribute("style", "--bs-list-group-active-bg: #b8cdff; --bs-list-group-active-border-color: #1000da; --bs-list-group-active-color: #1000da")
                    const AllIdProducts = await new HTTPRequest("FilterCategories").getOne(category.category_id);
                    if (AllIdProducts.status === 200 || AllIdProducts.status === 404) {
                        const request = new HTTPRequest("Products");
                        const dataProduct = {
                            status: 404,
                            data: []
                        };
                        for (let id of AllIdProducts.data?.map(id => id.product_id) ?? []) {
                            const response = await request.getOne(id);
                            if (response.status === 200) {
                                dataProduct.status = 200;
                                dataProduct.data.push(response.data)
                            }
                        }
                        await allProducts(false, dataProduct);
                    }
                }
            }, false);
            frameCategories.prepend(buttonCategory);
        });
    }
}
categories().then();

const filterPrice = async () => {
    const data = new HTTPRequest("");
}