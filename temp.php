<?php
    header("Access-Control-Allow-Origin: *");
    http_response_code(200);
    header('Content-Type: text/html; charset=utf-8');
    echo json_encode([
        "data" => $_POST,
        "data2" => $_FILES,
    ], JSON_UNESCAPED_UNICODE);