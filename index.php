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
<!--<script>
    let data = async() =>{
        const formdata = new FormData();
        formdata.append("name", "Duc lucifer dau cuc");
        formdata.append("email", "dculf12@gmail.com");
        formdata.append("phone", "023412552");
        formdata.append("password", "12132447");
        let res= await fetch("http://localhost/Duan1_nhom7/DuAn1/Api/Users/15",{
            method: "PUT",
            body: formdata,
        });
        let data2 = await res.json();
        console.log(data2);
        // console.log(...formdata)
    };
    data();
</script>-->
<!--<script>
    let data = async() =>{
        const formdata = new FormData();
        formdata.append("material", "OKela");
        formdata.append("color", "Red");
        formdata.append("price", 120000000);
        formdata.append("stock_quantity", 898);
        formdata.append("status", 1);
           /* "productVariant_id": 9,
            "product_id": 5,
            "material": "Velvet",
            "color": "Pink",
            "price": 180000,
            "price_reduced": 160000,
            "stock_quantity": 25,
            "start_at": "2024-01-01",
            "end_at": "2024-12-31",
            "status": 1*/
        // formdata.append("updated_at", date("Y-m-d", time()))
        // formdata.append("phone", "023412552");
        // formdata.append("password", "12132447");
        let res= await fetch("http://localhost/Duan1_nhom7/DuAn1/Api/Productvariants/14",{
            method: "DELETE",
            // body: formdata,
        });
        let data2 = await res.json();
        console.log(data2);
        // console.log(...formdata)
    };
    data();
</script>-->