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
<?php

$dom = Dom\HTMLDocument::createFromString(
    <<<'HTML'
        <main>
            <article>PHP 8.4 is a feature-rich release!</article>
            <article class="featured">PHP 8.4 adds new DOM classes that are spec-compliant, keeping the old ones for compatibility.</article>
        </main>
        HTML,
    LIBXML_NOERROR,
);

$node = HTMLDocument::querySelectorAll('main > article:last-child');
var_dump($node->classList->contains("featured"));

?>

</body>
</html>