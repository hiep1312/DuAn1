<?php
$role = $_GET["role"] ?? false;
$page = $_GET["page"] ?? false;
$function = $_GET["function"] ?? false;
if($role==="admin"){
    switch($page){
        case "dashboard":
            include "View/Admin/index.php";
            break;
        case "contacts":
            if($function==="add"){
                include "View/Admin/pages/Contacts/add.php";
            }else{
                include "View/Admin/pages/Contacts/index.php";
            }
            break;
        case "orders":
            if($function==="add"){
                include "View/Admin/pages/Orders/add.php";
            }else{
                include "View/Admin/pages/Orders/index.php";
            }
            break;
        case "orderitems":
            if($function==="add"){
                include "View/Admin/pages/Orderitems/add.php";
            }else{
                include "View/Admin/pages/Orderitems/index.php";
            }
            break;
        case "news":
            if($function==="add"){
                include "View/Admin/pages/News/add.php";
            }else{
                include "View/Admin/pages/News/index.php";
            }
            break;
        case "users":
            if($function==="add"){
                include "View/Admin/pages/Users/add.php";
            }else{
                include "View/Admin/pages/Users/index.php";
            }
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
    }
}else{
    switch($page){
        case "Contacts":
            include "View/User/Contact.php";
            break;
            case "Login":
            include "View/User/login-v3.php";
            break;
            case "Register":
            include "View/User/register-v3.php";
            break;
            case "Forgotpass":
            include "View/User/forgot_pass.php";
            break;
            case "Products":
            include "View/User/Products.php";
            break;
            case "About":
            include "View/User/About.php";
            break;
        default:
            include_once "View/User/404.php";
            break;
    }
//    include_once "View/User/404.php";
}