const formOrder = document.getElementById("formOrder");
const webHistory = new WebHistory();
const validate = new Validate();
const vouchers = webHistory.get()?.vouchers ?? {};
const form = {
    "#name": {
        type: "paragraph",
        message: ["Tên không được bỏ trống", " "],
        options: 1
    },
    "#phone": {
        type: "phone",
        message: ["Số điện thoại không được để trống và phải hợp lệ!", " "],
    },
    "#email": {
        type: "email",
        message: ["Email không được để trống và phải hợp lệ!", " "]
    },
    "#address": {
        type: "paragraph",
        message: ["Địa chỉ không được để trống!", " "],
        options: 1
    }
};
validate.checkFormAndDisplay(form);
if(webHistory.get() && localStorage.getItem("sessionId")){
    formOrder.addEventListener("submit", async e => {
        if(validate.checkForm(form)){
            const formdata = new FormData(e.target);
            const keysToDelete = [];
            formdata.forEach((value, key) => {
                if (value === "") {
                    keysToDelete.push(key);
                }
            });
            keysToDelete.forEach(key => formdata.delete(key));
            const request = new HTTPRequest("Users");
            await request.put(accessToken.getInfo().user_id, formdata,false);
            const now = new Date(Date.now());
            now.setDate(now.getDate() + 5);
            const description= document.getElementById("description");
            if(request.getStatus()===200){
                const changeToOrder = async () => {
                    const data = new FormData();
                    data.append("user_id", accessToken.getInfo().user_id);
                    data.append("status", "0");
                    data.append("total_amount", "0");
                    data.append("updated_at", now.getFullYear() + "-" + now.getMonth() + "-" + now.getDate());
                    description.value.trim()!=="" && data.append("description", description.value.trim());
                    await new HTTPRequest("Orders").post(data, false);
                    const orderId = await new HTTPRequest("Orders").getAll();
                    let total = 0;
                    let priceReduceVouchers;
                    if(Object.keys(vouchers).length>0){
                        const vouchersCurrent = await new HTTPRequest("Promotions").getOne(vouchers.promo_id);
                        if(vouchersCurrent.data.usage_limit===0){
                            if(window.confirm("Vouchers đã hết lượt sử dụng! Bạn có muốn quay về áp dụng khuyến mãi khác không?")){
                                webHistory.create(null, "?page=cart", false);
                                location.reload();
                            }else{
                                await viewInfo();
                            }
                        }else{
                            const formdataUpdateVouchers = new FormData();
                            formdataUpdateVouchers.append("usage_limit", vouchersCurrent.data.usage_limit - 1);
                            await new HTTPRequest("Promotions").put(vouchersCurrent.data.promo_id, formdataUpdateVouchers, false);
                            priceReduceVouchers = vouchersCurrent.data.discount;
                        }
                    }
                    for(let item of webHistory.get().data){
                        const request = new HTTPRequest("Carts");
                        const cart = await request.delete(item.cart_id);
                        request.tableName = "Orderitems";
                        delete cart.data.cart_id;
                        delete cart.data.created_at;
                        total += cart.data.quantity;
                        cart.data.order_id = orderId.data?.at(-1).order_id;
                        if(priceReduceVouchers){
                            cart.data.price = (cart.data.price-priceReduceVouchers<=0)?0:cart.data.price-priceReduceVouchers;
                            if(cart.data.price-priceReduceVouchers<=0) priceReduceVouchers = priceReduceVouchers - cart.data.price;
                            else priceReduceVouchers = 0;
                        }
                        request.changeToData(cart.data);
                        await request.post();
                    }
                    data.set("total_amount", total);
                    await new HTTPRequest("Orders").put(orderId.data?.at(-1).order_id, data, false);
                    webHistory.create(null, "?page=order", false);
                    location.reload();
                }
                await changeToOrder();
            }
        }
    }, false);
    const getInfo = async () => {
        await accessToken.handleTokenLocal();
        formOrder.querySelector("#name").value = accessToken.getInfo().name ?? "";
        formOrder.querySelector("#phone").value = accessToken.getInfo().phone ?? "";
        formOrder.querySelector("#email").value = accessToken.getInfo().email ?? "";
        formOrder.querySelector("#address").value = accessToken.getInfo().address ?? "";
    }
    getInfo().then();
    const viewInfo = async () => {
        const nameProducts = document.getElementById("nameProducts");
        const count = document.getElementById("count");
        const totalMoney = document.getElementById("totalMoney");
        const info = webHistory.get();
        const filterName = Array.from(info.data).map(name => `${name.title ?? "Không xác định"}(${name.material ?? "..."} - ${name.color ?? "..."})(${name.quantity ?? 0})`);
        nameProducts.textContent = filterName.join(", ");
        const total = Array.from(info.data).reduce((total, count) => count.quantity + total, 0);
        count.textContent = total;
        let money = Array.from(info.data).reduce((total, money) => (money.price*money.quantity) + total, 0);
        if(Object.keys(vouchers).length>0){
            if(vouchers?.usage_limit>0){
                money = (money-vouchers.discount)<=0?0:money-vouchers.discount;
            }
        }
        totalMoney.textContent = money + 30000;
    }
    viewInfo().then();
}else{
    webHistory.create(null, "?page=cart", false);
    location.reload();
}
if(webHistory.get()?.pay){
    const cartInHistory = webHistory.get();
    window.addEventListener("unload", async e => {
        navigator.sendBeacon(`http://localhost/DuAn1/Api/BackDataProduct/${cartInHistory.data[0].cart_id}`);
    });
}