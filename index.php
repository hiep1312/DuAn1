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
        default:
            include "View/Admin/index.php";
    }
}else{
    switch($page){
        case "Contacts":
            include "View/User/Contact.php";
            break;
        default:
            include_once "View/User/404.php";
            break;
    }
//    include_once "View/User/404.php";
}