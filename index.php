<?php
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