<?php

class Carts extends Management
{
    
    public function getDataById($id, $mode = []){
        $this->sql = "SELECT * FROM {$this->tableName} WHERE `cart_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
    public function getAllDataCarts($mode = []){
        $this->sql = "SELECT ct.cart_id, ct.user_id, us.name, ct.productVariant_id, pv.product_id, pd.name as title, pv.material, pv.color, ct.quantity, ct.price, ct.created_at FROM `carts` as ct
                LEFT JOIN `users` as us ON us.user_id = ct.user_id
                LEFT JOIN `productvariants` as pv ON pv.productVariant_id = ct.productVariant_id
                LEFT JOIN `products` as pd ON pd.product_id = pv.product_id";
        return $this->connect->executeSQL($this->sql, [], true, $mode);
    }
    public function getDataByUserId($id, $mode = []){
        $this->sql = "SELECT ct.cart_id, ct.user_id, us.name, ct.productVariant_id, pv.product_id, pd.name as title, pv.material, pv.color, ct.quantity, ct.price, ct.created_at FROM `carts` as ct
                LEFT JOIN `users` as us ON us.user_id = ct.user_id
                LEFT JOIN `productvariants` as pv ON pv.productVariant_id = ct.productVariant_id
                LEFT JOIN `products` as pd ON pd.product_id = pv.product_id
                WHERE ct.user_id = ?";
        return $this->connect->executeSQL($this->sql, [$id], true, $mode);
    }
    public function addData($data, $mode = []){
        $this->sql = "INSERT INTO {$this->tableName}(`user_id`, `productVariant_id`, `quantity`, `price`, `created_at`) VALUES (?,?,?,?,?)";
        $params = [$data['user_id'], $data['productVariant_id'], $data['quantity'], $data['price'], date("Y-m-d", time())];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function updateData($id, $data, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `user_id`=?,`productVariant_id`=?,`quantity`=?,`price`=?,`created_at`=? WHERE `cart_id`=?";
        $params = [$data['user_id'], $data['productVariant_id'], $data['quantity'], $data['price'], $data['created_at'], $id];
        return $this->connect->executeSQL($this->sql, $params, false, $mode);
    }

    public function deleteDataById($id, $mode = []){
        $this->sql = "UPDATE {$this->tableName} SET `user_id` = NULL WHERE `cart_id` = ?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "UPDATE {$this->tableName} SET `productVariant_id` = NULL WHERE `cart_id` = ?";
        $this->connect->executeSQL($this->sql, [$id], false, $mode);
        $this->sql = "DELETE FROM {$this->tableName} WHERE `cart_id` = ?";
        return $this->connect->executeSQL($this->sql, [$id], false, $mode);
    }
}