let objHistory = new WebHistory().get();
const title = document.querySelector("#title b");
const countItem = document.querySelector("#countItem strong");
const frameMaterial =  document.querySelector("#material div");
const frameColor = document.querySelector("#color div");
const brand = document.querySelector("#brand strong");
const status = document.querySelector("#status strong");
const description = document.getElementById("description");
const btnOrder = document.getElementById("order");
const btnAddToCart = document.getElementById("addToCart");
const quantity = document.getElementById("quantity");
const price = document.querySelector("#price strong");
if(objHistory){
    const checkUnlike = (obj1, obj2) => {
        return JSON.stringify(obj1)===JSON.stringify(obj2);
    }
    const getInfoProduct = async (dataNews = null) => {
        if(!checkUnlike(objHistory, dataNews)){
            if(dataNews){
                new WebHistory().create(dataNews, '?page=productdetails', false);
                objHistory = dataNews;
            }
            title.textContent = objHistory.name;
            countItem.textContent = objHistory.stock_quantity ?? "Không xác định";
            brand.textContent = objHistory.brand ?? "Không xác định";
            status.textContent = objHistory.status?"Còn hàng":"Không còn hàng";
            status.classList.add(objHistory.status?"text-info":"text-danger");
            description.innerHTML = objHistory.description ?? "Không có mô tả";
            price.innerHTML = objHistory.productVariants?.[0].price ?? 0;
            let checkSelect = false;
            let priceSelect = null;
            let typeSelect = null;
            let materialSelect = null;
            let colorSelect = null;
            const variants = (data, typeExtra, frameVariantMain, frameVariantExtra) => {
                frameVariantMain.innerHTML = "";
                data.forEach(variantMain => {
                    const buttonMain = document.createElement("button");
                    buttonMain.classList.value = "btn btn-success fw-bold px-3 py-2";
                    buttonMain.setAttribute("style", "--bs-btn-active-bg: #ff0077");
                    buttonMain.textContent = variantMain[0];
                    buttonMain.disabled = variantMain[1].filter(item => item.status===1 && objHistory.status===1).length===0?true:false;
                    buttonMain.addEventListener("click", e => {
                        checkSelect = false;
                        priceSelect = null;
                        typeSelect = null;
                        materialSelect = null;
                        colorSelect = null;
                        quantity.value = 1;
                        countItem.textContent = variantMain[1].reduce((total, item) => total + (item.stock_quantity ?? 0), 0) || "Không xác định";
                        if(buttonMain.style.background==="rgb(255, 0, 119)"){
                            buttonMain.style.background = "";
                            const variantExtraClick = Array.from(frameVariantExtra.querySelectorAll("button")).filter(btn => btn.style.background==="rgb(255, 0, 119)") ?? [];
                            if(variantExtraClick.length > 0) variantExtraClick[0] = variantExtraClick[0].textContent;
                            variants(typeExtra==="color"?Object.entries(AllColor):Object.entries(AllMaterial), typeExtra==="color"?"material":"color", frameVariantExtra, frameVariantMain);
                            countItem.textContent = objHistory.stock_quantity ?? "Không xác định";
                            const btnClick = Array.from(frameVariantExtra.querySelectorAll("button")).find(btn => btn.textContent===variantExtraClick[0]);
                            btnClick.click();
                            btnClick.style.background = "#ff0077";
                        }else{
                            buttonMain.style.background = "#ff0077";
                            frameVariantMain.querySelectorAll("button:not(:hover)").forEach(btn => btn.style.background = "");
                            frameVariantExtra.innerHTML = "";
                            variantMain[1].forEach(extra => {
                                const buttonExtra = document.createElement("button");
                                buttonExtra.classList.value = "btn btn-success fw-bold px-3 py-2";
                                buttonExtra.setAttribute("style", "--bs-btn-active-bg: #ff0077");
                                buttonExtra.textContent = extra[typeExtra];
                                buttonExtra.disabled = extra.status?false:true;
                                buttonExtra.addEventListener("click", e => {
                                    countItem.textContent = extra.stock_quantity ?? "Không xác định";
                                    if(buttonExtra.style.background==="rgb(255, 0, 119)") {
                                        buttonExtra.style.background = "";
                                        checkSelect = false;
                                        priceSelect = null;
                                        typeSelect = null;
                                        materialSelect = null;
                                        colorSelect = null;
                                        quantity.value = 1;
                                    }else{
                                        buttonExtra.style.background = "#ff0077";
                                        frameVariantExtra.querySelectorAll("button:not(:hover)").forEach(btn => btn.style.background = "");
                                        checkSelect = true;
                                        priceSelect = extra.price;
                                        typeSelect = extra.productVariant_id;
                                        materialSelect = extra.material;
                                        colorSelect = extra.color;
                                        price.innerHTML = extra.price;
                                        quantity.max = parseInt(countItem.textContent);
                                    }
                                })
                                frameVariantExtra.append(buttonExtra);
                            });
                        }
                    }, false);
                    frameVariantMain.append(buttonMain);
                });
            }
            quantity.addEventListener("input", e => {
                if(e.target.value.trim()===""){
                    e.target.value = 1;
                }
                if(e.target.value.trim().startsWith('0')){
                    e.target.value = e.target.value.trim().length>1?e.target.value.replace('0', ''):e.target.value.replace('0', '1');
                }
                if(e.target.valueAsNumber > parseInt(countItem.textContent)){
                    e.target.valueAsNumber = parseInt(countItem.textContent);
                }
            }, false);
            const AllMaterial = Object.groupBy(objHistory.productVariants, (variant => variant.material));
            if(Object.keys(AllMaterial).length > 0){
                variants(Object.entries(AllMaterial), "color", frameMaterial, frameColor);
            }
            const AllColor = Object.groupBy(objHistory.productVariants, (variant => variant.color));
            if(Object.keys(AllColor).length > 0){
                variants(Object.entries(AllColor), "material", frameColor, frameMaterial);
            }
            const response = {data: []};
            const addToCart = async (pay = false) => {
                const getQuantityCurrent = await new HTTPRequest('Products').getOne(objHistory.product_id);
                const getQuantityCurrentVariant = await new HTTPRequest("Productvariants").getOne(typeSelect);
                if(getQuantityCurrent?.data.stock_quantity >= quantity.valueAsNumber && getQuantityCurrentVariant?.data.stock_quantity >= quantity.valueAsNumber){
                    const formdataChangeQuantity = new FormData();
                    if(getQuantityCurrentVariant.data.stock_quantity-quantity.valueAsNumber===0) formdataChangeQuantity.append("status", 0);
                    formdataChangeQuantity.append('stock_quantity', (getQuantityCurrentVariant.data.stock_quantity-quantity.valueAsNumber));
                    await new HTTPRequest('Productvariants').put(typeSelect, formdataChangeQuantity, false);
                    if(getQuantityCurrent.data.stock_quantity-quantity.valueAsNumber===0) formdataChangeQuantity.set("status", 0);
                    formdataChangeQuantity.set('stock_quantity', (getQuantityCurrent.data.stock_quantity-quantity.valueAsNumber));
                    await new HTTPRequest('Products').put(objHistory.product_id, formdataChangeQuantity, false);
                    const formdataCheckCart = new FormData();
                    formdataCheckCart.append("user_id", accessToken.getInfo().user_id);
                    formdataCheckCart.append("productVariant_id", typeSelect);
                    const checkExist = await new HTTPRequest("CheckCart").post(formdataCheckCart);
                    if(checkExist.data && !pay){
                        const formdataChangeCart = new FormData();
                        formdataChangeCart.append("quantity", (checkExist.data.quantity+quantity.valueAsNumber));
                        formdataChangeCart.append("price", (checkExist.data.price+priceSelect))
                        await new HTTPRequest("Carts").put(checkExist.data.cart_id, formdataChangeCart, false);
                    }else{
                        const formdataCart = new FormData();
                        await accessToken.handleTokenLocal();
                        formdataCart.append("user_id", accessToken.getInfo().user_id);
                        const request = new HTTPRequest("Carts");
                        formdataCart.append("productVariant_id", typeSelect);
                        formdataCart.append("quantity", quantity.value);
                        formdataCart.append("price", priceSelect);
                        await request.post(formdataCart, false);
                    }
                    const productNews = await new HTTPRequest("Products").getOne(objHistory.product_id);
                    if(pay) {
                        const dataNew = await new HTTPRequest("Carts").getAll();
                        response.data.push({
                            cart_id: dataNew.data.at(-1).cart_id,
                            user_id: accessToken.getInfo().user_id,
                            productVariant_id: typeSelect,
                            quantity: quantity.valueAsNumber,
                            price: priceSelect,
                            title: productNews.data.name,
                            material: materialSelect,
                            color: colorSelect
                        });
                        response.pay = true;
                    }
                    productNews.data.productVariants = productNews.data.productVariants.map(item => {
                        delete item.product_id;
                        return item;
                    });
                    productNews.data.imageProducts = productNews.data.imageProducts.map(item => {
                        delete item.product_id;
                        return item;
                    });
                    await getInfoProduct(productNews.data);
                }else{
                    alert("Đã xảy ra lỗi! Vui lòng cập nhật lại trang web!");
                    new WebHistory().create(getQuantityCurrent ?? null,"?page=productdetails", false);
                    location.reload();
                }
            }
            if(localStorage.getItem("sessionId")){
                btnOrder.addEventListener("click", e => {
                    if(checkSelect && priceSelect && typeSelect && materialSelect && colorSelect){
                        addToCart(true).then(() => {
                            new WebHistory().create(response,"?page=pay", false);
                            location.reload();
                        })
                    }else{
                        alert("Vui lòng chọn chất liệu và màu sắc trước khi tiếp tục!");
                    }
                }, false);
                btnAddToCart.addEventListener("click", e => {
                    if(checkSelect && priceSelect && typeSelect && materialSelect && colorSelect){
                        addToCart().then();
                        const messageSucces = document.getElementById("messageSuccessAddToCart");
                        messageSucces.classList.add("show");
                        messageSucces.style.display = "block";
                        messageSucces.querySelectorAll(".btnClose").forEach(close => close.addEventListener("click", () => {
                            messageSucces.classList.remove("show");
                            messageSucces.style.display = "none";
                        }));
                    }else{
                        alert("Vui lòng chọn chất liệu và màu sắc trước khi tiếp tục!");
                    }
                })
            }else{
                const alert = document.createElement("div");
                alert.className = "alert alert-warning d-flex align-items-center  mt-3";
                alert.role = "alert";
                alert.dataset.aos = "flip-up";
                alert.dataset.aosDuration = "1000";
                alert.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 50px;">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>
            Bạn cần đăng nhập để mua hàng!
          </div>`;
                btnOrder.parentElement.replaceWith(alert);
            }
        }
    }
    getInfoProduct().then();
    const changeData = async () => {
        const dataNews = await new HTTPRequest('Products').getOne(objHistory.product_id);
        dataNews.data.productVariants = dataNews.data.productVariants.map(item => {
            delete item.product_id;
            return item;
        });
        dataNews.data.imageProducts = dataNews.data.imageProducts.map(item => {
            delete item.product_id;
            return item;
        });
        await getInfoProduct(dataNews.data);
    }
    setInterval(changeData, 5000);
}else{
    new WebHistory().create(null, "?page=category", false);
    location.reload();
}
const imageProduct = async () => {
    const frameImg = document.getElementById("imgSmall");
    const frameViewImg = document.getElementById("frameViewImg");
    const imageProducts = objHistory.imageProducts;
    imageProducts.forEach((image, i) => {
        const divViewImg = document.createElement("div");
        divViewImg.classList.value = "carousel-item" + ((i===0)?" active":"");
        const viewImg = document.createElement("img");
        viewImg.src = image.album?.slice(1) ?? `https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg`;
        viewImg.classList.value = "d-block w-100";
        viewImg.alt = "Ảnh sản phẩm";
        divViewImg.append(viewImg);
        frameViewImg.append(divViewImg);
        const img = document.createElement("img");
        img.src = image.album?.slice(1) ?? `https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg`;
        img.alt = "Ảnh sản phẩm";
        img.style.maxHeight = "75px";
        img.classList.value = "img-fluid rounded";
        img.role = "button";
        img.onclick = () => {
            frameViewImg.querySelectorAll("div.active").forEach(carouselItem => carouselItem.classList.remove("active"));
            divViewImg.classList.add("active");
        }
        frameImg.append(img);
    });
}
imageProduct().then();

const frameReviews = document.getElementById("reviews");
const frameAllReviews = document.getElementById("allReviews");
const viewReviews = async () => {
    const data = await new HTTPRequest("ProductReviews").getOne(objHistory.product_id);
    const now = new Date(Date.now());
    frameReviews.innerHTML = "";
    frameAllReviews.innerHTML = "";
    if(data.status===200){
        const handleReview = (review, frame) => {
            const frameReview = document.createElement("div");
            frameReview.classList.value = "col-12";
            frameReview.innerHTML = `
                <img src="${review.avatar?.slice(1) ?? `https://cdn-media.sforum.vn/storage/app/media/THANHAN/avatar-trang-99.jpg`}" style="border-radius: 50%; width: 37px; height: 30px;" alt="Ảnh đại diện"> <strong>${review.name ?? "Không xác định"}:</strong>
                <span>${review.comment}<br></span>
                <div class="d-flex justify-content-end p-2">
                    <span class="me-3">${review.created_at?.split('-').reverse().join("/") ?? (now.getDate() + "/" + now.getMonth() + "/" + now.getFullYear())}</span>
                </div>
            `;
            frame.append(frameReview);
        }
        data.data.slice(0, 5).forEach(review => handleReview(review, frameReviews));
        data.data.forEach(review => handleReview(review, frameAllReviews));
    }else{
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
            Không có bình luận! Hãy là người người bình luận đầu tiên nhé
          </div>`;
        frameReviews.append(alert);
    }
}
viewReviews().then();


const formReviews = document.getElementById("formReviews");
if(localStorage.getItem("sessionId")){
    const validate = new Validate();
    const formValidate = {
        "#comment": {
            type: "paragraph",
            message: ["Đánh giá không được để trống!", " "],
            options: 1
        }
    };
    validate.checkFormAndDisplay(formValidate);
    formReviews.addEventListener("submit", async e => {
        e.preventDefault();
        if(validate.checkForm(formValidate)){
            const formdata = new FormData(e.target);
            formdata.append("product_id", objHistory.product_id);
            await accessToken.handleTokenLocal();
            formdata.append("user_id", accessToken.getInfo().user_id);
            const request = new HTTPRequest("Reviews");
            await request.post(formdata, false);
            const alert = document.createElement("div");
            alert.classList.value = "alert alert-dismissible fade show";
            alert.role = "alert";
            alert.innerHTML = `<button type="button" class="btn-close" data-bs-dismiss="alert"></button>`;
            const message = document.createElement("strong");
            if(request.getStatus()===200){
                alert.classList.add("alert-success");
                message.textContent = "Bình luận thành công!";
                validate.resetForm(formReviews);
                viewReviews().then();
            }else{
                alert.classList.add("alert-danger");
                message.textContent = "Bình luận thất bại!";
            }
            alert.prepend(message);
            formReviews.append(alert);
            setTimeout(() => alert.remove(), 3000);
        }
    }, false);
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
            Bạn cần đăng nhập để bình luận!
          </div>`;
    formReviews.replaceWith(alert);
}


const frameProductOther = document.getElementById("productOther");
const viewProductOther = async () => {
    frameProductOther.innerHTML = "";
    const data = await new HTTPRequest("Products").getAll();
    if(data.status===200){
        const dataView = [];
        const product1 = data.data[Math.floor(Math.random()*data.data.length)];
        const product2 = data.data[Math.floor(Math.random()*data.data.length)];
        const product3 = data.data[Math.floor(Math.random()*data.data.length)];
        dataView.push(product1, product2===product1?data.data[Math.floor(Math.random()*data.data.length)]:product2, (product3===product1 || product3===product2)?data.data[Math.floor(Math.random()*data.data.length)]:product3);
        for(let product of dataView){
            const card = document.createElement("div");
            card.className = "col-12 col-md-6 col-lg-4";
            card.dataset.aos = "fade-up";
            card.dataset.aosDuration = "1400";
            card.innerHTML = `
            <div class="card h-100 text-light">
                <img src="${product.imageProducts?.filter(img => img.location===0)?.[0]?.album?.slice(1) ?? "https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg"}" class="card-img-top" alt="Ảnh sản phẩm" style="max-height: 300px">
                <div class="card-body text-center">
                    <h5 class="card-title h4">${product.name ?? "Không xác định"}</h5>
                    <p class="card-text text-danger fw-bold fs-5">${product.productVariants?.[0]?.price ?? 0}đ</p>
                    <div class="card-text">
                        <a role="button" class="btn btn-primary">Chi tiết</a>
                    </div>
                </div>
            </div>
            `;
            card.querySelector("a[role=button]").addEventListener("click", e => {
                new WebHistory().create(product, "?page=productdetails", false);
                location.reload();
            }, false);
            frameProductOther.append(card);
        }
    }else{
        const alert = document.createElement("div");
        alert.className = "alert alert-danger d-flex align-items-center";
        alert.role = "alert";
        alert.dataset.aos = "flip-up";
        alert.dataset.aosDuration = "1000";
        alert.innerHTML = `
          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" style="width: 50px;">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>
            Không tìm thấy sản phẩm khác!
          </div>`;
        frameReviews.append(alert);
    }
}
viewProductOther().then();

quantity.addEventListener("beforeinput", e => {
    const number = /^[\s\d]+$/;
    if(!number.test(e.data) && e.inputType!=="deleteContentBackward" && !/^\s*[1-9][0-9]\s*$/.test(e.target.value)){
        e.preventDefault();
    }
});