<?php
$role = $_GET["role"] ?? false;
$page = $_GET["page"] ?? false;
$function = $_GET["function"] ?? false;
if ($role === "admin") {
    switch ($page) {
        case "dashboard":
            include "View/Admin/index.php";
            break;
        case "reviews":
            if ($function == "add") {
                include_once "View/Admin/pages/Reviews/add.php";
            } else {
                include_once "View/Admin/pages/Reviews/index.php";
            }
            break;
        case "categories":
            if ($function == "add") {
                include_once "View/Admin/pages/Categories/add.php";
            } else {
                include_once "View/Admin/pages/Categories/index.php";
            }
            break;
        case "promotions":
            if ($function == "add") {
                include_once "View/Admin/pages/Promotions/add.php";
            } else {
                include_once "View/Admin/pages/Promotions/index.php";
            }
            break;
        default:
            include "View/Admin/index.php";
            break;
    }
} else {
    switch ($page) {
        case "productdetails":
            include_once "View/User/chitietsp1.php";
            break;
        default:
            include "View/User/404.php";
            break;
    }
}
