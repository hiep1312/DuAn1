
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

<!--<script>-->
<!--    let data = async() =>{-->
<!--        const formdata = new FormData();-->
<!--        formdata.append("name", "Nguyen Chi Binh");-->
<!--        formdata.append("phone", "023842347234");-->
<!--        formdata.append("password", "123456789");-->
<!--        let res= await fetch("http://localhost/Duan1_nhom7/DuAn1/Api/Users",{-->
<!--            method: "POST",-->
<!--            body: formdata,-->
<!--        });-->
<!--        let users = await res.json();-->
<!--        console.log(users);-->
<!--    };-->
<!--    data();-->
<!--</script>-->

<!--
<form action="" enctype="multipart/form-data" id="form" method="post">
    <input type="file" name="file[]" id="file" multiple>
    <button type="submit">Gui</button>
</form>
<script>
    document.getElementById("form").addEventListener("submit", async e => {
        e.preventDefault();
        const formdata = new FormData(e.target);
        const res = await fetch("http://localhost/DuAn1/Api/Users", {
            method: "POST",
            body: formdata
        });
        const data = await res.json();
        console.log(data)
    });
</script>-->

</body>
</html>
<script>
    let data = async() =>{
        const formdata = new FormData();
        formdata.append("comment", "Hôm nay ăn j");
        // formdata.append("descriptions", "OKOKOKOK");
        // formdata.append("start_date", "2024-01-01");
        // formdata.append("usage_limit", 16);
        let res= await fetch("http://localhost/Duan1_nhom7/DuAn1/Api/Productvariants",{
            method: "GET",
            // body: formdata,
        });
        let data2 = await res.json();
        console.log(data2);
        // console.log(...formdata)
    };
    data();
</script>