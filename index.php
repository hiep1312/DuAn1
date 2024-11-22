<script>
    let data = async() =>{
        const formdata = new FormData();
        formdata.append("code","Minh Duc" );
        formdata.append("discount",2050 );
        formdata.append("usage_limit",20 );

        let res= await fetch("http://localhost/D%E1%BB%B1%20%C3%A1n%201/DuAn1/Api/Promotions",{
            method: "GET",
            // body: formdata
        });
        let data2 = await res.json();
        console.log(data2);
    };
    data();
</script>