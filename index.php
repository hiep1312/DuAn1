<!doctype html>
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
    <input type="file" name="file[]" id="file" multiple accept="application/pdf">
    <button type="submit">Send</button>
</form>
<iframe src="" id="img" frameborder="0" width="300" height="500"></iframe>

<script>
    document.getElementById("file").addEventListener("change", e => {
        const file = e.target.files;
        const img = document.getElementById("img");
        const imgView = URL.createObjectURL(file[0]);
        img.src = imgView;
        img.onload = () => {
            URL.revokeObjectURL(imgView);
        }
    });
    document.getElementById("form").addEventListener("submit", async e => {
        e.preventDefault();
        const formdata = new FormData();
        const person = {
            name: "Le Danh Hiep",
            age: 19,
            address: "Ha Noi",
            phone: "0397435442"
        }
        formdata.append("title", "Toi qua met moi");
        formdata.append("content", "Chan qua");
        formdata.append("file", JSON.stringify(person));
        formdata.append("file2[]", e.target[0].files.item(0));
        formdata.append("file2[]", e.target[0].files.item(1));
        formdata.append("file2[]", e.target[0].files.item(2));
        console.log(...formdata.entries());
        /*const json = JSON.stringify({
            title: "Toi qua met moi",
            content: "Chan qua"
        });*/
        const res = await fetch("http://localhost/DuAn1/temp.php", {
            method: "POST",
            body: formdata
        });
        const data = await res.json();
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
<?php
?>
</body>
</html>


