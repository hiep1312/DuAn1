<?php
$role = $_GET["role"] ?? false;
$page = $_GET["page"] ?? false;
$function = $_GET["function"] ?? false;
if($role==="admin"){
    switch($page){
        case "dashboard":
            include "View/Admin/index.php";
            break;
        case "comments":
            if($function==="add"){
                include "View/Admin/pages/Comments/add.php";
            }else{
                include "View/Admin/pages/Comments/index.php";
            }
            break;
            case "carts":
                if($function==="add"){
                    include "View/Admin/pages/Carts/add.php";
                }else{
                    include "View/Admin/pages/Carts/index.php";
                }
                break;
            case "cartItems":
                if($function==="add"){
                    include "View/Admin/pages/CartItems/add.php";
                }else{
                    include "View/Admin/pages/CartItems/index.php";
                }
                break;
        default:
            include "View/Admin/index.php";
    }
}else{
    switch($page){
        case "Contact":
            include "View/User/Contact.php";
            break;
        case "Products":
            include "View/User/Products.php";
            break;
        default:
            include_once "View/User/404.php";
            break;
    }
}
