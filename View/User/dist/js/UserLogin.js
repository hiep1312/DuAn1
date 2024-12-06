document.addEventListener("DOMContentLoaded", () => {
    const validate = new Validate();
    const checkforms = {
        "#email": {
            type: "email",
            message: ["Email không hợp lệ!", "Vui lòng nhập đúng định dạng email!"],
        },
        "#password": {
            type: "textLimit",
            message: ["Mật khẩu phải đủ từ 6 kí tự!", "Mật khẩu không hợp lệ!"],
            options: 6,
        },
    };
    validate.checkFormAndDisplay(checkforms);
    document.getElementById("formAdd").addEventListener("submit", async (e) => {
        e.preventDefault();
        if (validate.checkForm(checkforms, true)) {
            const formdata = new FormData(e.target); // Lấy dữ liệu từ form trước khi gửi
            const request = new HTTPRequest("Login");
                const res = await request.post(formdata, false);
                const alert = document.getElementById("alert");
                if ( request.getStatus() === 200 && res.message === true) {
                    await accessToken.handleTokenLocal(res.data);
                    accessToken.removeToken();
                    accessToken.saveToken();
                    alert.classList.add("alert-secondary");
                    alert.textContent = "Đăng nhập thành công ~~";
                    setTimeout(() => {
                        window.location.href = "?page=home";
                    }, 4000);
                } else {
                    alert.classList.add("alert-danger");
                    alert.textContent = "Tài khoản hoặc mật khẩu không đúng!";
                }
        }
    });
});
