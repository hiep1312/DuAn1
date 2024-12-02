document.addEventListener("DOMContentLoaded", () => {
const validate = new Validate();
const checkforms = {
    "#name": {
        type: "paragraph",
        message: ["Mời bạn nhập đủ họ và tên ạ!!", "Họ và tên đầy đã đủ!!"],
        options: 2,
    },
    "#email": {
        type: "email",
    },
    "#phone": {
        type: "phone",
        message: ["Mời bạn nhập sdt", "Số điện thoại đã đạt đủ tiêu chuẩn!!!"],
    },
    "#address": {
        type: "paragraph",
        message: ["Vd: Hà Nội, Hải Phòng ...?", "Địa chỉ tồn tại!!!"],
        options: 2,
    },
    "#bio": {
        type: "paragraph",
        message: ["Vd: Sở thích, Tính cách ...?", "Thêm thành công thông tin này!!"],
        options: 2,
    },
    "#avatar": {
        type: "image",
    },
}
validate.checkFormAndDisplay(checkforms);

document.getElementById("formAdd").addEventListener("submit", async e=> {
    e.preventDefault();
    if(validate.checkForm(checkforms, true)){
        const formdata = new FormData(e.target);
        const keysToDelete = [];
        formdata.forEach((value, key) => {
            if (value === "") {
                keysToDelete.push(key);
            }
        });
        keysToDelete.forEach(key => formdata.delete(key));
        const request = new HTTPRequest("Users");
        const res = await request.put(accessToken.getInfo().user_id, formdata, true);
        const alert = document.getElementById('alert');
        if (request.getStatus() == 200) {
            alert.classList.add('alert-success');
            alert.textContent = "Thêm mới tài khoản thành công~~";
        }else {
            alert.classList.add('alert-danger');
            alert.textContent = "Thêm mới tài khoản không thành công~~";
        }
    }
}, false);
const profiledata = async ()=>{
    const formAdd = document.getElementById('formAdd');
    const request = new HTTPRequest('Users');
    await accessToken.handleTokenLocal();
    const dataOld = await  request.getOne(accessToken.getInfo().user_id);
    formAdd.querySelector(`#avatar`).value = "";
    document.querySelector("#img").src = dataOld.data.avatar?dataOld.data.avatar.slice(1):'https://media.saco.asia/media/uploads/gbimg/other/sacoinc-404-page.png';
    formAdd.querySelector("#name").value = dataOld.data.name ?? "";
    formAdd.querySelector("#email").value = dataOld.data.email ?? "";
    formAdd.querySelector("#phone").value = dataOld.data.phone ?? "";
    formAdd.querySelector("#address").value = dataOld.data.address ?? "";
    formAdd.querySelector("#bio").value = dataOld.data.bio ?? "";
    formAdd.querySelector("#role_id").value = dataOld.data.role_id === 1 ? "Quản trị viên" : "Người dùng";
    formAdd.querySelector("#created_at").value = dataOld.data.created_at ?? "";
}
profiledata().then();
document.getElementById("avatar").addEventListener("change", e => {
    const viewImg = document.getElementById("img");
    const fileUpload = e.target.files;
    const image = fileUpload.item(0);
    viewImg.src = URL.createObjectURL(image);
    viewImg.onload = () => {
        URL.revokeObjectURL(image);
    };
}, false);
    if(!localStorage.getItem('sessionId')){
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
        formAdd.replaceWith(alert);
    }
});