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
<div id="temp">
    <h3>Xin chào</h3>
    <p>Tôi là ai</p>
</div>
<script>
    let data =  document.getElementById("temp").innerHTML;
    document.getElementById("temp").innerHTML = data.replaceAll(/<\/?\w+>/g, "");

</script>

</body>
</html>