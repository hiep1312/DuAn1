const formOrder = document.getElementById("formOrder");
const webHistory = new WebHistory();
const validate = new Validate();
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
            if(request.getStatus()===200){
                const changeToOrder = async () => {
                    const data = new FormData();
                    data.append("user_id", accessToken.getInfo().user_id);
                    data.append("status", "0");
                    data.append("total_amount", "0");
                    data.append("updated_at", now.getFullYear() + "-" + now.getMonth() + "-" + now.getDate());
                    await new HTTPRequest("Orders").post(data, false);
                    const orderId = await new HTTPRequest("Orders").getAll();
                    let total = 0;
                    for(let item of webHistory.get().data){
                        const request = new HTTPRequest("CartItems");
                        const cartItems = await request.delete(item.item_id);
                        request.tableName = "Carts";
                        await request.delete(item.cart_id);
                        request.tableName = "Orderitems";
                        delete cartItems.data.cart_id;
                        delete cartItems.data.item_id;
                        total += cartItems.data.quantity;
                        cartItems.data.order_id = orderId.data?.at(-1).order_id;
                        request.changeToData(cartItems.data);
                        await request.post();
                    }
                    data.set("total_amount", total);
                    await new HTTPRequest("Orders").put(orderId.data?.at(-1).order_id, formdata, false);
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
        const filterName = [];
        Array.from(info.data)?.forEach(name => filterName.includes(name.name) || filterName.push(name.name))
        nameProducts.textContent = filterName.join(", ");
        const total = Array.from(info.data).reduce((total, count) => count.quantity + total, 0);
        count.textContent = total;
        const money = Array.from(info.data).reduce((total, money) => (money.price*money.quantity) + total, 0);
        totalMoney.textContent = money;
    }
    viewInfo().then();
    document.getElementById("transfer").addEventListener("click", e => {
        e.preventDefault();
        alert("Phương thức này hiện đang bị khóa!");
    }, false);
    console.log(webHistory.get());
}else{
    webHistory.create(null, "?page=cart", false);
    location.reload();
}
