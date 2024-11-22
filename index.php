<!-- 
<script>
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
         console.log(...formdata)
    };
    data();
</script>
<script>
    let data = async() =>{
        const formdata = new FormData();
        formdata.append("material", "OKela");
        formdata.append("color", "Red");
        formdata.append("price", 120000000);
        formdata.append("stock_quantity", 898);
        formdata.append("status", 1);
            "productVariant_id": 9,
            "product_id": 5,
            "material": "Velvet",
            "color": "Pink",
            "price": 180000,
            "price_reduced": 160000,
            "stock_quantity": 25,
            "start_at": "2024-01-01",
            "end_at": "2024-12-31",
            "status": 1*/
        formdata.append("updated_at", date("Y-m-d", time()))
        formdata.append("phone", "023412552");
        formdata.append("password", "12132447");
        let res= await fetch("http://localhost/Duan1_nhom7/DuAn1/Api/Productvariants/14",{
            method: "DELETE",
             body: formdata,
        });
        let data2 = await res.json();
        console.log(data2);
        console.log(...formdata)
    };
    data();
</script>
 -->
