let index = 1;
let allData;
const newsHot = [8, 9, 10];
const viewAllNews = async (location) => {
    const frameNews = document.getElementById("frameNews");
    const request = new HTTPRequest("News");
    if(location===1) allData = await request.getAll();
    let dataNews = Object.create(null);
    Object.assign(dataNews, allData);
    dataNews.data = dataNews.data.slice((location-1) * 10, location * 10);
    if(allData.data?.slice(location* 10, (location+1) * 10).length === 0) document.getElementById("moreNews").parentElement.remove();
    if(dataNews){
        dataNews.data.forEach(newsLetter => {
            const news = document.createElement("div");
            news.className = "col-12 col-md-6";
            news.innerHTML = `
                <div class="card article-card text-light" data-aos="fade-down" data-aos-duration="1400">
                    <div class="anhtintuc">
                      <img src="${newsLetter.image_url?newsLetter.image_url.slice(1):"https://news.khangz.com/wp-content/uploads/2021/10/404-not-found-la-gi-1.jpg"}" class="card-img-top" alt="Ảnh tin tức">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">${newsLetter.title ?? "Không tìm thấy tiêu đề tin tức"}</h5>
                      <p class="card-text text-secondary">${newsLetter.content?.replaceAll(/<\/?\w+>/g, "")?.slice(0, 100).concat("...") ?? "Không tìm thấy mô tả"}</p>
                      <a role="button" class="btn btn-secondary">Chi tiết</a>
                    </div>
                </div>
            `;
            news.firstElementChild.lastElementChild.lastElementChild.addEventListener("click", () => NewsDetails(newsLetter), false);
            frameNews.append(news);
        })
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
            Đã xảy ra lỗi trong quá trình tìm kiếm tin tức!
          </div>`;
        frameNews.parentElement.nextElementSibling.outerHTML = "";
        frameNews.replaceWith(alert);
    }
}
viewAllNews(index).then();

document.getElementById("moreNews").addEventListener("click", e => {
    viewAllNews(++index).then();
}, false);

const NewsOther = async () => {
    const request = new HTTPRequest("News");
    const frameNewsOther = document.getElementById("frameNewsOther");
    for(let item of newsHot){
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