<?php
    ini_set('display_errors', 0);
    require_once "init.php";
    require_once "Response.php";
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Content-Type: application/json; charset=UTF-8");
    $response = new Response();
    if($_GET['page']){
        $page = $_GET['page'];
        if($page === "News"){
            $connect = new NewsController();
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $id = !empty($_GET["id"]) ? $_GET["id"] : "all";
                if($id === "all"){
                    $data = $connect->getAll();
                    $response->setResponse(!$data?503:200, !$data?null:"Get All News Success!", $data);
                }else{
                    $data = $connect->getOne($id);
                    $response->setResponse(!$data?404:200, !$data?null:"Get News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
                if(isset($_GET["method"]) && $_GET["method"] === "PUT"){
                    $id = $_GET["id"];
                    if(empty($id)){
                        $response->setResponse(503);
                    }else{
                        $data = $connect->update($id, $_POST, $_FILES);
                        $response->setResponse(!$data?404:200, !$data?null:"PUT News Success!", $data);
                    }
                }elseif(!isset($_GET["method"])){
                    $data = $connect->create($_POST, $_FILES);
                    $response->setResponse(!$data?503:200, !$data?null:"POST News Success!");
                }else{
                    $response->setResponse(400);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
                $id = $_GET["id"];
                preg_match_all('/name="(\w+)"\s\n\s*([\w\s]+)/u',file_get_contents("php://input"), $dataRawRequest, PREG_SET_ORDER | PREG_UNMATCHED_AS_NULL);
                $_PUT = [];
                if($dataRawRequest===[]){
                    $_PUT = json_decode(file_get_contents("php://input"), true);
                }else{
                    foreach($dataRawRequest as $rawRequest) {
                        $_PUT[$rawRequest[1]] = trim($rawRequest[2]);
                    }
                }
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->update($id, $_PUT, []);
                    $response->setResponse(!$data?404:200, !$data?null:"PUT News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
                $id = $_GET["id"];
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->delete($id);
                    $response->setResponse(!$data?404:200, !$data?null:"DELETE News Success!", $data);
                }
                $response->sendResponse();

            }else{
                $response->setResponse(405);
                $response->sendResponse();
            }
        

        }elseif($page === "Comments"){
            $connect = new CommentsController();
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $id = !empty($_GET["id"]) ? $_GET["id"] : "all";
                if($id === "all"){
                    $data = $connect->getAll();
                    $response->setResponse(!$data?503:200, !$data?null:"Get All News Success!", $data);
                }else{
                    $data = $connect->getOne($id);
                    $response->setResponse(!$data?404:200, !$data?null:"Get News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $data = $connect->create($_POST);
                    $response->setResponse(!$data?503:200, !$data?null:"POST News Success!");
                    $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
                $id = $_GET["id"];
                preg_match_all('/name="(\w+)"\s\n\s*([\w\s]+)/u',file_get_contents("php://input"), $dataRawRequest, PREG_SET_ORDER | PREG_UNMATCHED_AS_NULL);
                $_PUT = [];
                if($dataRawRequest===[]){
                    $_PUT = json_decode(file_get_contents("php://input"), true);
                }else{
                    foreach($dataRawRequest as $rawRequest) {
                        $_PUT[$rawRequest[1]] = trim($rawRequest[2]);
                    }
                }
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->update($id, $_PUT);
                    $response->setResponse(!$data?404:200, !$data?null:"PUT News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
                $id = $_GET["id"];
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->delete($id);
                    $response->setResponse(!$data?404:200, !$data?null:"DELETE News Success!", $data);
                }
                $response->sendResponse();

            }else{
                $response->setResponse(405);
                $response->sendResponse();
            }
        }elseif($page === "Carts"){
            $connect = new CartsController();
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $id = !empty($_GET["id"]) ? $_GET["id"] : "all";
                if($id === "all"){
                    $data = $connect->getAll();
                    $response->setResponse(!$data?503:200, !$data?null:"Get All News Success!", $data);
                }else{
                    $data = $connect->getOne($id);
                    $response->setResponse(!$data?404:200, !$data?null:"Get News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $data = $connect->create($_POST);
                    $response->setResponse(!$data?503:200, !$data?null:"POST News Success!");
                    $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
                $id = $_GET["id"];
                preg_match_all('/name="(\w+)"\s\n\s*([\w\s]+)/u',file_get_contents("php://input"), $dataRawRequest, PREG_SET_ORDER | PREG_UNMATCHED_AS_NULL);
                $_PUT = [];
                if($dataRawRequest===[]){
                    $_PUT = json_decode(file_get_contents("php://input"), true);
                }else{
                    foreach($dataRawRequest as $rawRequest) {
                        $_PUT[$rawRequest[1]] = trim($rawRequest[2]);
                    }
                }
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->update($id, $_PUT);
                    $response->setResponse(!$data?404:200, !$data?null:"PUT News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
                $id = $_GET["id"];
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->delete($id);
                    $response->setResponse(!$data?404:200, !$data?null:"DELETE News Success!", $data);
                }
                $response->sendResponse();

            }else{
                $response->setResponse(405);
                $response->sendResponse();
            }
        }elseif ($page === "CartItems"){
            $connect =  new CartItemsController();
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $id = !empty($_GET["id"]) ? $_GET["id"] : "all";
                if($id === "all"){
                    $data = $connect->getAll();
                    $response->setResponse(!$data?503:200, !$data?null:"Get All News Success!", $data);
                }else{
                    $data = $connect->getOne($id);
                    $response->setResponse(!$data?404:200, !$data?null:"Get News Success!", $data);
                }
                $response->sendResponse();
                }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $data = $connect->create($_POST);
                    $response->setResponse(!$data?503:200, !$data?null:"POST News Success!");
                    $response->sendResponse();
                }elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
                $id = $_GET["id"];
                preg_match_all('/name="(\w+)"\s\n\s*([\w\s]+)/u',file_get_contents("php://input"), $dataRawRequest, PREG_SET_ORDER | PREG_UNMATCHED_AS_NULL);
                $_PUT = [];
                if($dataRawRequest===[]){
                    $_PUT = json_decode(file_get_contents("php://input"), true);
                }else{
                    foreach($dataRawRequest as $rawRequest) {
                        $_PUT[$rawRequest[1]] = trim($rawRequest[2]);
                    }
                }
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->update($id, $_PUT);
                    $response->setResponse(!$data?404:200, !$data?null:"PUT News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
                $id = $_GET["id"];
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->delete($id);
                    $response->setResponse(!$data?404:200, !$data?null:"DELETE News Success!", $data);
                }
                $response->sendResponse();
            }else{
                $response->setResponse(405);
                $response->sendResponse();
            }
        }elseif($page === "Categories"){
            $connect = new CategoriesController();
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $id = !empty($_GET["id"]) ? $_GET["id"] : "all";
                if($id === "all"){
                    $data = $connect->getAll();
                    $response->setResponse(!$data?503:200, !$data?null:"Get All News Success!", $data);
                }else{
                    $data = $connect->getOne($id);
                    $response->setResponse(!$data?404:200, !$data?null:"Get News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $data = $connect->create($_POST);
                    $response->setResponse(!$data?503:200, !$data?null:"POST News Success!");
                    $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
                $id = $_GET["id"];
                preg_match_all('/name="(\w+)"\s\n\s*([\w\s]+)/u',file_get_contents("php://input"), $dataRawRequest, PREG_SET_ORDER | PREG_UNMATCHED_AS_NULL);
                $_PUT = [];
                if($dataRawRequest===[]){
                    $_PUT = json_decode(file_get_contents("php://input"), true);
                }else{
                    foreach($dataRawRequest as $rawRequest) {
                        $_PUT[$rawRequest[1]] = trim($rawRequest[2]);
                    }
                }
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->update($id, $_PUT);
                    $response->setResponse(!$data?404:200, !$data?null:"PUT News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
                $id = $_GET["id"];
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->delete($id);
                    $response->setResponse(!$data?404:200, !$data?null:"DELETE News Success!", $data);
                }
                $response->sendResponse();

            }else{
                $response->setResponse(405);
                $response->sendResponse();
            }
        }elseif($page === "Promotions"){
            $connect = new PromotionsController();
            if($_SERVER['REQUEST_METHOD'] === 'GET'){
                $id = !empty($_GET["id"]) ? $_GET["id"] : "all";
                if($id === "all"){
                    $data = $connect->getAll();
                    $response->setResponse(!$data?503:200, !$data?null:"Get All News Success!", $data);
                }else{
                    $data = $connect->getOne($id);
                    $response->setResponse(!$data?404:200, !$data?null:"Get News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $data = $connect->create($_POST);
                    $response->setResponse(!$data?503:200, !$data?null:"POST News Success!");
                    $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
                $id = $_GET["id"];
                preg_match_all('/name="(\w+)"\s\n\s*([\w\s]+)/u',file_get_contents("php://input"), $dataRawRequest, PREG_SET_ORDER | PREG_UNMATCHED_AS_NULL);
                $_PUT = [];
                if($dataRawRequest===[]){
                    $_PUT = json_decode(file_get_contents("php://input"), true);
                }else{
                    foreach($dataRawRequest as $rawRequest) {
                        $_PUT[$rawRequest[1]] = trim($rawRequest[2]);
                    }
                }
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->update($id, $_PUT);
                    $response->setResponse(!$data?404:200, !$data?null:"PUT News Success!", $data);
                }
                $response->sendResponse();
            }elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
                $id = $_GET["id"];
                if(empty($id)){
                    $response->setResponse(503);
                }else{
                    $data = $connect->delete($id);
                    $response->setResponse(!$data?404:200, !$data?null:"DELETE News Success!", $data);
                }
                $response->sendResponse();

            }else{
                $response->setResponse(405);
                $response->sendResponse();
            }
        }else {
            $response->setResponse(404);
            $response->sendResponse();
        }
    }else{
        $response->setResponse(400);
        $response->sendResponse();
    }
