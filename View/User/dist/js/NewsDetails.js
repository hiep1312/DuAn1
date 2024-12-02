const webHistory = new WebHistory();
const item = webHistory.get();
const title = document.getElementById("titleNews");
const author = document.getElementById("authorNews");
const content = document.getElementById("contentNews");
const date = document.getElementById("createAt");
const currentNews = document.getElementById("currentNews");
const frameViewComments = document.getElementById("frameViewComments");
let index = 1;
if(item && item.news_id!==undefined){
    const now = new Date(Date.now());
    currentNews.textContent = item.title?.slice(0, 20).concat("...") ?? "Không tìm thấy";
    title.textContent = item.title ?? "Không tìm thấy tiêu đề tin tức";
    author.textContent = "Tác giả: Không tìm thấy tác giả";
    content.innerHTML = item.content ?? "Không tìm thấy nội dung tin tức";
    date.textContent = item.created_at?.split('-').reverse().join("/") ?? (now.getDate() + "/" + now.getMonth() + "/" + now.getFullYear());
    if(item.user_id){
        new HTTPRequest("Users").getOne(item.user_id).then(person => {
            author.textContent = "Tác giả: " + person.data.name;
        });
    }
}else{
    location.assign("?page=404");
}
const validate = new Validate();
validate.checkAndDisplay("#content", "paragraph", ["Bình luận không được để trống!", " "], 1);
const formComments = document.getElementById("formComments");
formComments.addEventListener("submit", async e => {
    e.preventDefault();
    const message = document.createElement("div");
    message.role = "alert";
    message.id = "message";
    message.classList.value = "alert alert-dismissible fade show";
    const btnClose = document.createElement("button");
    btnClose.type = "button";
    btnClose.className = "btn-close";
    btnClose.dataset.bsDismiss = "alert";
    message.append(btnClose);
    if(validate.check("#content", "paragraph", 1)){
        const formdata = new FormData(e.target);
        formdata.append("news_id", item.news_id);
        const request = new HTTPRequest("Comments");
        const response = await request.post(formdata, false);
        validate.resetForm(formComments);
        const alert = document.createElement("strong");
        if(request.getStatus()===200){
            message.classList.add("alert-success");
            alert.textContent = "Bình luận thành công!";
            frameViewComments.innerHTML = "";
            index = 1;
            viewAllComments(index);
        }else{
            message.classList.add("alert-danger");
            alert.textContent = "Bình luận thất bại!";
        }
        message.prepend(alert);
        formComments.append(message);
        setTimeout(() => message.remove(), 3000);
    }else{
        validate.resetForm(formComments);
        message.classList.add("alert-danger");
        const alert = document.createElement("strong");
        alert.textContent = "Bình luận thất bại!";
        message.prepend(alert);
        formComments.append(message);
        setTimeout(() => message.remove(), 3000);
    }
}, false)

let allDataComments;
async function viewAllComments(location){
    if(location===1) allDataComments = await new HTTPRequest("NewsComments").getOne(item.news_id);
    if(allDataComments.status===404){
        document.getElementById("moreComments").remove();
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
        frameViewComments.append(alert);
    }
    let dataComments = Object.create(null);
    Object.assign(dataComments, allDataComments);
    dataComments.data = dataComments.data.slice((location-1) * 10, location * 10);
    if(allDataComments.data?.slice(location* 10, (location+1) * 10).length === 0) document.getElementById("moreComments").remove();
    if(allDataComments.data.length > 0){
        const now = new Date(Date.now());
        dataComments.data.forEach(comment => {
            const frameComment = document.createElement("div");
            frameComment.dataset.aos = "slide-up";
            frameComment.dataset.aosDuration = "1000";
            frameComment.className = "col-12";
            frameComment.innerHTML = `
                <img src="${comment.avatar?.slice(1) ??`https://cdn-media.sforum.vn/storage/app/media/THANHAN/avatar-trang-99.jpg`}" style="border-radius: 50%; width: 37px; height: 30px;" alt="Ảnh đại diện"> <strong>${comment.name ?? "Không xác định"}:</strong>
                <span>${comment.content ?? "Không tìm thấy bình luận"}<br></span>
                <div class="d-flex justify-content-between p-3">
                    <a class="ms-4 text-decoration-none" role="button">Trả lời</a>
                    <span class="me-3">${comment.created_at?.split('-').reverse().join("/") ?? (now.getDate() + "/" + now.getMonth() + "/" + now.getFullYear())}</span>
                </div>
            `;
            frameViewComments.append(frameComment);
        });
    }
}
viewAllComments(index).then();
document.getElementById('moreComments').addEventListener("click", () => viewAllComments(++index).then(), false)
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
    formComments.replaceWith(alert);
}

const NewsOther = async () => {
    const request = new HTTPRequest("News");
    const frameNewsOther = document.getElementById("frameNewsOther");
    const AllDataNews = await request.getAll();
    const newsRelate = [];
    const relate1 = AllDataNews.data[Math.floor(Math.random()*AllDataNews.data.length)].news_id;
    const relate2 = AllDataNews.data[Math.floor(Math.random()*AllDataNews.data.length)].news_id;
    const relate3 = AllDataNews.data[Math.floor(Math.random()*AllDataNews.data.length)].news_id;
    newsRelate.push(relate1, relate2===relate1?AllDataNews.data[Math.floor(Math.random()*AllDataNews.data.length)].news_id:relate2, (relate3===relate1 || relate3===relate2)?AllDataNews.data[Math.floor(Math.random()*AllDataNews.data.length)].news_id:relate3);
    console.log(newsRelate);
    for(let item of newsRelate){
        const data = await request.getOne(item);
        if(Object.keys(data.data).length > 0){
            const card = document.createElement("a");
            card.className = "col-lg-4 col-md-6 text-decoration-none";
            card.role = "button";
            card.addEventListener("click", () => NewsDetails(data.data), false);
            card.dataset.aos = "fade-up";
            card.dataset.aosDuration= "1400";
            card.innerHTML = `
               <div class="blog-card bg-primary-custom">
                <div class="box-image">
                <img
                  class="img-hover"
                  src="${data.data.image_url?data.data.image_url.slice(1):"https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg"}"
                  alt="Ảnh tin tức" />
              </div>
              <p class="blog-card-title font-krona-one text-start h5-text">${data.data.title ?? "Không tìm thấy tiêu đề tin tức"}</p>
            </div>`;
            frameNewsOther.append(card);
        }
    }
}
NewsOther().then();

function NewsDetails(info){
    if(typeof info !== "object"){
        console.warn("Invalid Parameter News Details!");
    }else{
        const webHistory = new WebHistory();
        webHistory.create(info, "?page=newsdetails", false);
        location.reload();
    }
}