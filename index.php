<?php
<<<<<<< HEAD
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
=======
    $role = $_GET["role"] ?? false;
    $page = $_GET["page"] ?? false;
    $function = $_GET["function"] ?? false;
    if($role==="admin"){
        switch($page){
            case "dashboard":
                include_once "View/Admin/index.php";
                break;
            case "productvariants":
                if($function==="add"){
                    include_once "View/Admin/pages/Productvariants/add.php";
                }else{
                    include_once "View/Admin/pages/Productvariants/index.php";
                }
                break;
            case "products":
                if($function==="add"){
                    include_once "View/Admin/pages/Products/add.php";
                }else{
                    include_once "View/Admin/pages/Products/index.php";
                }
                break;
            case "imageproducts":
                if($function==="add"){
                    include_once "View/Admin/pages/Imageproducts/add.php";
                }else{
                    include_once "View/Admin/pages/Imageproducts/index.php";
                }
                break;
            default:
                include "View/Admin/index.php";
                break;
        }
    }else{
        include_once "View/User/404.php";
    }
>>>>>>> af1d7b335a119224c5a0d4f5cb5babc2b21b62cd
