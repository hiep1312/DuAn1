<!-- <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" id="form">
    <input type="file" name="file[]" id="file" multiple>
    <button type="submit">Send</button>
</form>


<script>
    document.getElementById("form").addEventListener("submit", async e => {
        e.preventDefault();
        const formdata = new FormData();
        /*formdata.append("title", "Toi qua met moi");
        formdata.append("content", "Chan qua");*/
        const json = JSON.stringify({
            title: "Toi qua met moi",
            content: "Chan qua"
        });
        console.log(...formdata, json);
        const res = await fetch("http://localhost/DuAn1/Api/News/24", {
            method: "PUT",
            body: formdata
        });
        const data = await res.text();
        console.log(data);
    }, false);
    (async () => {
        const res = await fetch("http://localhost/DuAn1/Api/News");
        const data = await res.json();
        console.log(data.data);
    })();
    /*(async function () {
        const formdata = new FormData();
        formdata.append("name", "Le Danh Hiep");
        formdata.append("age", 19);
        const res = await fetch("http://localhost/DuAn1/Api/News", {
            method: "GET"
        });
        const data = res.json();
        console.log(data);

    })();*/
</script>
</body>
</html>

 -->
<script>
    const formdata = new FormData();
    formdata.append("user_id", 1);
    formdata.append("name", "Nguyen Tang Thanh");
    formdata.append("phone", "234234535")
    let data = async ()=>{
        let res = await fetch("http://localhost/Duan1_nhom7/DuAn1/Api/Contacts/6", {
            method: "DELETE",
            body: formdata
        })
        let contact = await res.json();
        // document.writeln(<pre/>);
        console.log(contact)
    }
    data();
</script>