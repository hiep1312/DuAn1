<<<<<<< HEAD
=======
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
<form action="" enctype="multipart/form-data" id="form" method="post">
    <input type="file" name="file[]" id="file" multiple>
    <button type="submit">Gui</button>
</form>
<script>
    document.getElementById("form").addEventListener("submit", async e => {
        e.preventDefault();
        const formdata = new FormData(e.target);
        const res = await fetch("http://localhost/DuAn1/temp.php", {
            method: "POST",
            body: formdata
        });
        const data = await res.json();
        console.log(data)
    });
</script>
<?php
echo "<pre>";
    print_r(array_keys([13, 213, 54, 13, 54, 12, 32, 53], 13));
?>
</body>
</html>
>>>>>>> 9cd35bed520c7f5df90adb311be8dec4540d92de
